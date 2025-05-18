<?php
require_once "conexion.php";

class mdlVentas {

  static public function mdlRegistrarVenta($datos) {
    $db = Conexion::conectar();
    $db->beginTransaction();

    try {
      // Insertar la venta
      $stmtVenta = $db->prepare("
        INSERT INTO Ventas (Cliente_ID, Total)
        VALUES (NULL, :total)
      ");
      $stmtVenta->bindParam(":total", $datos["total"], PDO::PARAM_STR);
      $stmtVenta->execute();
      $idVenta = $db->lastInsertId();

      // Insertar el detalle
      $stmtDetalle = $db->prepare("
        INSERT INTO Detalle_Ventas (Venta_ID, Producto_ID, Cantidad, Precio_Unitario)
        VALUES (:venta_id, :producto_id, :cantidad, :precio)
      ");
      $stmtDetalle->bindParam(":venta_id", $idVenta, PDO::PARAM_INT);
      $stmtDetalle->bindParam(":producto_id", $datos["producto_id"], PDO::PARAM_INT);
      $stmtDetalle->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
      $stmtDetalle->bindParam(":precio", $datos["precio_unitario"], PDO::PARAM_STR);
      $stmtDetalle->execute();

      // Actualizar stock
      $stmtStock = $db->prepare("
        UPDATE Productos
        SET Cantidad_Stock = Cantidad_Stock - :cantidad
        WHERE ID_Producto = :producto_id
      ");
      $stmtStock->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
      $stmtStock->bindParam(":producto_id", $datos["producto_id"], PDO::PARAM_INT);
      $stmtStock->execute();

      $db->commit();
      return "ok";

    } catch (Exception $e) {
      $db->rollBack();
      return "error: " . $e->getMessage();
    }
  }

  static public function mdlListarVentas() {
    $stmt = Conexion::conectar()->prepare("
      SELECT 
        v.ID_Venta,
        p.Nombre,
        dv.Cantidad,
        dv.Precio_Unitario * dv.Cantidad AS Total,
        v.Fecha_Venta
      FROM Ventas v
      JOIN Detalle_Ventas dv ON v.ID_Venta = dv.Venta_ID
      JOIN Productos p ON p.ID_Producto = dv.Producto_ID
      ORDER BY v.ID_Venta DESC
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
