<?php
require_once "conexion.php";

class mdlVentas
{
  public function mdlRegistrarVentas($table, $datos)
  {
    $stmt = (new Conexion)->conectar()->prepare("
      INSERT INTO $table VALUES (NULL, :nombreProducto, :cantidad, 1)
      ");

    $stmt->bindParam("nombreProducto", $datos["nombreProducto"], PDO::PARAM_STR);
    $stmt->bindParam("cantidad", $datos["cantidad"], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
  }

  public function mdlListarVentas($table)
  {
    $stmt = (new Conexion)->conectar()->prepare("
      SELECT * FROM $table
      ");
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
