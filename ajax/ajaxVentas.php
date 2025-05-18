<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../controllers/ventas.controller.php";
require_once "../models/ventas.model.php";

// Log para depuración:
file_put_contents(__DIR__ . "/debug.log", print_r($_POST, true), FILE_APPEND);

class ajaxVentas
{
  public $_nombreProducto;
  public $_cantidad;
  public $_Cliente_ID;

  public function ajaxNuevaVenta()
  {
    $datos = array(
      "nombreProducto" => $this->_nombreProducto,
      "cantidad" => $this->_cantidad,
      "Cliente_ID" => $this->_Cliente_ID
    );
    $respuesta = (new ctrVentas)->ctrRegistrarVenta($datos);

    header('Content-Type: application/json');
    if ($respuesta === "ok") {
      echo json_encode(array("status" => "ok"));
    } else {
      echo json_encode(array("status" => "error"));
    }
    exit;
  }
}

// Instanciación y llamada según POST
if (isset($_POST['nombreProducto']) && isset($_POST['cantidad'])) {
  $venta = new ajaxVentas();
  $venta->_nombreProducto = $_POST['nombreProducto'];
  $venta->_cantidad = $_POST['cantidad'];
  $venta->_Cliente_ID = $_POST['Cliente_ID']; // Cliente_ID es opcional
  $venta->ajaxNuevaVenta();
} else {
  header('Content-Type: application/json');
  echo json_encode(["status" => "error", "mensaje" => "Faltan datos (POST)"]);
  exit;
}
