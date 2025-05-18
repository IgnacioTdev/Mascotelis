<?php
class Conexion {
    public static function conectar() {
        try {
            $link = new PDO(
                "mysql:host=localhost;dbname=tiendademascotas",
                "root",
                "",
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );
            return $link;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>