<?php
require_once "conexion.php";

class mdlVentas
{
  public function mdlRegistrarVentas($table, $datos)
  {
    $stmt = (new Conexion)->conectar()->prepare("
      INSERT INTO $table VALUES (NULL, :producto_id, :cantidad, 1)
      ");

    $stmt->bindParam("producto_id", $datos["producto_id"], PDO::PARAM_STR);
    $stmt->bindParam("cantidad", $datos["cantidad"], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }
}
