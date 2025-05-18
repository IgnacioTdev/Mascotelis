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
  public $_producto_id;
  public $_cantidad;

  public function ajaxNuevaVenta()
  {
    $datos = array(
      "producto_id" => $this->_producto_id,
      "cantidad" => $this->_cantidad
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
if (isset($_POST['producto_id']) && isset($_POST['cantidad'])) {
  $venta = new ajaxVentas();
  $venta->_producto_id = $_POST['producto_id'];
  $venta->_cantidad = $_POST['cantidad'];
  $venta->ajaxNuevaVenta();
} else {
  header('Content-Type: application/json');
  echo json_encode(["status" => "error", "mensaje" => "Faltan datos (POST)"]);
  exit;
}
