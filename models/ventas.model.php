<?php
require_once "conexion.php";

class mdlVentas
{
  public function mdlRegistrarVentas($table, $datos)
  {
    $stmt = (new Conexion)->conectar()->prepare("
      INSERT INTO $table VALUES (NULL, :nombreProducto, :cantidad, 1)
      ");

    $stmt->bindParam("nombreProducto", $datos["nombreProducto"], PDO::PARAM_STR);
    $stmt->bindParam("cantidad", $datos["cantidad"], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }

  public function mdlListarVentas($table)
  {
    $stmt = (new Conexion)->conectar()->prepare("
    SELECT $table.ID_Venta, ventas.cantidad, ventas.nombreProducto, clientes.Nombre_Cliente
    FROM ventas
    INNER JOIN clientes ON ventas.Cliente_ID = clientes.ID_Cliente
");
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
