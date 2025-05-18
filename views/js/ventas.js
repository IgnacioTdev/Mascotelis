$(document).ready(function () {
  $('#tablaVentas').DataTable();

  $('#formVenta').on('submit', function (e) {
    e.preventDefault();

    let datos = $(this).serialize();

    $.ajax({
      type: 'POST',
      url: 'ajax/ajaxVentas.php',
      data: datos,
      success: function (response) {
        let response = JSON.parse(response);
        if (response === 'ok') {
          alert("✅ Venta registrada correctamente.");
          $('#formVenta')[0].reset();
          location.reload();
        } else {
          alert("❌ Error al registrar la venta:\n" + response.status);
        }
      },
      error: function () {
        alert("❌ Error en la petición AJAX (venta).");
      }
    });
  });
});
