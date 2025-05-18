<?php
require_once "/controllers/productos.controller.php";
require_once "/models/productos.model.php";


class ajaxProductos
{
    public $_id;
    public $_nombre;
    public $_codigo;
    public $_stock;
    public $_precio_venta;


    public function ajaxNuevoProducto()
    {

        $datos = array("nombre" => $this->_nombre, "codigo" => $this->_codigo, "stock" => $this->_stock, "precio_venta" => $this->_precio_venta);
        $respuesta = (new ctrProductos)->ctrRegistrarProducto($datos);
        echo $respuesta;
    }

    public function ajaxeditarProducto() {}

    public function ajaxeliminarProducto() {}
    public function ajaxactualizarProducto() {}
}

$tipoOperacion = $_POST["tipoOperacion"];

if ($tipoOperacion == "nuevoProducto") {

    $nuevoProducto = (new ajaxProductos);
    $nuevoProducto->_nombre = $_POST["nombre"];
    $nuevoProducto->_codigo = $_POST["codigo"];
    $nuevoProducto->_stock = $_POST["stock"];
    $nuevoProducto->_precio_venta = $_POST["precio_venta"];
    $nuevoProducto->ajaxNuevoProducto();
}

if ($tipoOperacion == "editProducto") {

    $editProducto = (new ajaxProductos);
    $editProducto->_id = $_POST["id"];
    $editProducto->ajaxeditarProducto();
}

if ($tipoOperacion == "eliminarProducto") {

    $eliminarProducto = (new ajaxProductos);
    $eliminarProducto->_id = $_POST["id"];
    $eliminarProducto->ajaxeliminarProducto();
}

if ($tipoOperacion == "actualizarProducto") {

    $actualizarProducto = (new ajaxProductos);
    $actualizarProducto->_id = $_POST["id"];
    $actualizarProducto->ajaxactualizarProducto();
}
