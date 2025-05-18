<?php
require_once "../controllers/ventas.controller.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $registro = (new ctrVentas)->ctrRegistrarVenta();
  echo json_encode(["status" => $registro]);
}
