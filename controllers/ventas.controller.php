<?php

class ctrVentas {
  public function ctrRegistrarVenta($datos){
    $table = "ventas";
    $respuesta = (new mdlVentas)->mdlRegistrarVenta($datos);
    return $respuesta;
  }



}

