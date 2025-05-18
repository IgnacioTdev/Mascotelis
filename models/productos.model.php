<?php
require_once "conexion.php";

class mdlProductos {

  public function mdlListarProductos($table){
     $stmt = (new Conexion)->conectar()->prepare("
      SELECT * FROM  $table"
    );
    $stmt ->execute();
    return $stmt->fetchAll();

  }

  public function mdlRegistrarProducto($table, $datos) {
    $stmt = (new Conexion)->conectar()->prepare("
      INSERT INTO $table VALUES(NULL,:nombre, :codigo, :stock, :precio,1)
    ");

    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
    $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
    $stmt->bindParam(":precio", $datos["precio_venta"], PDO::PARAM_INT);

    if ($stmt -> execute()){
      return "ok";
      
    }else{
      return "error";
    }
  }  
} // <-- Aquí cierra la clase mdlProductos
?>