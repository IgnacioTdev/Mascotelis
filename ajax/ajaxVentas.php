<?php
require_once "../controllers/ventas.controller.php";
require_once "../models/ventas.model.php";

class ajaxVentas
{
  public $_id;
  public $_fechaVenta;
  public $_total;

  public function ajaxNuevaVenta()
  {
    $datos = array("fechaVenta" => $this->_fechaVenta, "total" => $this->_total);
    $respuesta = (new ctrVentas)->ctrRegistrarVenta($datos);
    echo $respuesta;
  }
}
