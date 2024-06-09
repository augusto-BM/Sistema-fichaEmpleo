// Función para obtener datos mediante AJAX
function fetchDataRedesSociales() {
  $.ajax({
      url: '../../../controlador/controlador-principal/controlador-graficoRedes.php',
      type: 'GET',
      success: function(response) {
          // Parsear la respuesta JSON
          var data = JSON.parse(response);

          // Actualizar gráfico con los nuevos datos
          updateRedesSociales(data);
      },
      error: function(xhr, status, error) {
          console.error('Error al obtener datos:', error);
      }
  });
}
function fetchDataTotal() {
  $.ajax({
      url: '../../../controlador/controlador-principal/controlador-graficoTotal.php',
      type: 'GET',
      success: function(response) {
          // Parsear la respuesta JSON
          var data = JSON.parse(response);

          // Actualizar gráfico con los nuevos datos
          updateTotal(data);
      },
      error: function(xhr, status, error) {
          console.error('Error al obtener datos:', error);
      }
  });
}

// Llamar a la función fetchData al cargar la página para obtener datos inicialmente
window.addEventListener("load", () => {
  fetchDataRedesSociales();
  fetchDataTotal();
  // Opcional: configurar intervalo para actualizar datos periódicamente
  // setInterval(fetchData, 30000); // por ejemplo, para actualizar cada 30 segundos
});