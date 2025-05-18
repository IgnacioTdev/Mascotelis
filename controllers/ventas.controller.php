<?php

class ctrVentas
{

  public function ctrRegistrarVenta($datos)
  {
    $table = "ventas";
    $respuesta = (new mdlVentas)->mdlRegistrarVentas($table, $datos);
    return $respuesta;
  }

  public function ctrListarVentas()
  {
    $table = "ventas";
    $respuesta = (new mdlVentas)->mdlListarVentas($table);
    return $respuesta;
  }

  public function ctrListasClientes()
  {
    $table = "clientes";
    $respuesta = (new mdlVentas)->mdlListarClientes($table);
    return $respuesta;
  }
}
