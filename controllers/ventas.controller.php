<?php

class ctrVentas {
  public function ctrRegistrarVenta($datos){
    $table = "ventas";
    $respuesta = (new mdlVentas)->mdlRegistrarVentas($datos);
    return $respuesta;
  }



}

