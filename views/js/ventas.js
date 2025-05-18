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
        let res = JSON.parse(response);
        if (res.status === 'ok') {
          alert("✅ Venta registrada correctamente.");
          $('#formVenta')[0].reset();
          location.reload();
        } else {
          alert("❌ Error al registrar la venta:\n" + res.status);
        }
      },
      error: function () {
        alert("❌ Error en la petición AJAX (venta).");
      }
    });
  });
});
