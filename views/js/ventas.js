$(document).ready(function () {
  $('#tablaVentas').DataTable();

  $('#formVenta').on('submit', function (e) {
    e.preventDefault();

    let datos = $(this).serialize();
    console.log(datos);

    $.ajax({
      type: 'POST',
      url: 'ajax/ajaxVentas.php',
      data: datos,
      dataType: 'json', // <-- Muy importante para que jQuery lo convierta a objeto automáticamente

      success: function (response) {
        console.log(response);
        if (response.status === 'ok') {
          alert("✅ Venta registrada correctamente.");
          $('#formVenta')[0].reset();
          location.reload();
        } else {
          alert("❌ Error al registrar la venta:\n" + (response.mensaje || 'Error desconocido'));
        }
      },
      error: function () {
        alert("❌ Error en la petición AJAX (venta).");
      }
    });
  });
});