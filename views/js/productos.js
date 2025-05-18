$(document).ready(function () {
  $('#tablaProductos').DataTable();

  $('#formProducto').on('submit', function (e) {
    e.preventDefault();
    console.log("guardar")
    
    let datos = new FormData($(this)[0]);

    $.ajax({
      type: 'POST',
      url: 'ajax/ajaxProductos.php',
      data: datos,
      processData: false,
      contentType: false,
      success: function (response) {
        
        console.log(response)
        if (response === 'ok') {
          alert("✅ Producto registrado correctamente.");
          $('#formProducto')[0].reset();
          location.reload();
        } else {
          alert("❌ Error al registrar el producto:\n" + response.status);
        }
      },
      error: function () {
        alert("❌ Error en la petición AJAX (producto).");
      }
    });
  });
});
