<?php
require_once "models/ventas.model.php";
require_once "models/productos.model.php"; // para recuperar precio si es necesario

class ctrVentas {

  public function ctrRegistrarVenta() {
    if (
      isset($_POST["producto_id"]) &&
      isset($_POST["cantidad"])
    ) {
      // Obtener precio actual del producto
      $productoID = $_POST["producto_id"];
      $productos = mdlProductos::mdlListarProductos();
      $producto = array_filter($productos, fn($p) => $p["ID_Producto"] == $productoID);
      $producto = array_values($producto)[0] ?? null;

      if (!$producto) return "error: producto no encontrado";

      $cantidad = $_POST["cantidad"];
      $precio = $producto["Precio_Venta"];
      $total = $precio * $cantidad;

      $datos = [
        "producto_id" => $productoID,
        "cantidad" => $cantidad,
        "precio_unitario" => $precio,
        "total" => $total
      ];

      return mdlVentas::mdlRegistrarVenta($datos);
    }
  }

  public function ctrListarVentas() {
    return mdlVentas::mdlListarVentas();
  }
}
