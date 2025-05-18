<?php

class ctrProductos
{

  public function ctrRegistrarProducto($datos)
  {
    $table = "productos";
    $respuesta = (new mdlProductos)->mdlRegistrarProducto($table, $datos);
    return $respuesta;
  }

  public function ctrListarProductos()
  {
    $table = "productos";
    $respuesta = (new mdlProductos)->mdlListarProductos($table);
    return $respuesta;
  }
}
