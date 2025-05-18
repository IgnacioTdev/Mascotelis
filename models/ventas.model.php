<?php
require_once "conexion.php";

class mdlVentas {
    public function mdlRegistrarVentas($table, $datos){
      $stmt= (new Conexion)->conectar()->prepare("
      INSERT INTO $table VALUES (NULL, :fechaVenta, :total, 1)
      ");

      $stmt->bindParam("fechaVenta",$datos["fechaVenta"], PDO::PARAM_STR);
      $stmt->bindParam("total",$datos["total"], PDO::PARAM_STR);

      if ($stmt -> execute()){
        return "ok";
      
      }else{
        return "error";
      }


    }



}

