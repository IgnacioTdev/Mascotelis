<?php

class ctrVentas {

  public function ctrRegistrarVenta($datos){
    $table = "ventas";
    $respuesta = (new mdlVentas)->mdlRegistrarVentas($table, $datos);
    return $respuesta;
  }
}

