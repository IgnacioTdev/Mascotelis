<?php
require_once 'controllers/productos.controller.php';
require_once 'controllers/ventas.controller.php';

$productos = (new ctrProductos)->ctrListarProductos(); 

?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestión de Productos y Ventas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <!-- FontAwesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-4">🐾 Registrar Producto</h2>
    <form id="formProducto" method="POST">
      <div class="row g-3">
        <div class="col-md-4">
          <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto" required>
        </div>
        <div class="col-md-2">
          <input type="text" name="codigo" class="form-control" placeholder="Código" required>
        </div>
        <div class="col-md-2">
          <input type="number" name="stock" class="form-control" placeholder="Stock" required>
        </div>
        <div class="col-md-2">
          <input type="number" step="0.01" name="precio_venta" class="form-control" placeholder="Precio venta" required>
        </div>
        <div class="col-md-2">
          <input type="hidden" name="tipoOperacion" value="nuevoProducto">
          <button type="submit" class="btn btn-primary w-100">Guardar</button>
        </div>
      </div>
    </form>

    <hr class="my-4">

    <h2 class="mb-4">Lista de Productos</h2>
    <table class="table table-bordered" id="tablaProductos">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Código_Producto</th>
          <th>Cantidad_Stock</th>
          <th>Precio_Venta</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($productos as $p): ?>
          <tr>
            <td><?= $p['ID_Producto'] ?></td>
            <td><?= $p['Nombre'] ?></td>
            <td><?= $p['codigo'] ?></td>
            <td><?= $p['stock'] ?></td>
            <td><?= $p['precio_venta'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <hr class="my-4">

    <h2 class="mb-4">Registrar Venta</h2>
    <form id="formVenta" method="POST">
      <div class="row g-3">
        <div class="col-md-4">
          <select name="producto_id" class="form-select" required>
            <option value="">Seleccionar producto</option>
            <?php foreach ($productos as $p): ?>
              <option value="<?= $p['ID_Producto'] ?>">
                <?= $p['Nombre'] ?> (Stock: <?= $p['Cantidad_Stock'] ?>)
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-2">
          <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" required>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-success w-100">Vender</button>
        </div>
      </div>
    </form>

    <hr class="my-4">

    <h2 class="mb-4">🛒 Historial de Ventas</h2>
    <table class="table table-bordered" id="tablaVentas">
      <thead>
        <tr>
          <th>ID Venta</th>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Total</th>
          <th>Fecha</th>
        </tr>
      </thead>
    
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#tablaProductos').DataTable();
      $('#tablaVentas').DataTable();
    });
  </script>
  <!-- Librerías necesarias -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>  
<!-- Scripts separados -->
<script src="views/js/productos.js"></script>
<script src="views/js/ventas.js"></script>
</body>
</html>
