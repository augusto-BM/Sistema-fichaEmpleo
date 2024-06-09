<?php
@include '../../modelo/conexion.php';
session_start();

// Realizas la consulta SQL para obtener los datos
$sql = "SELECT sedes.sede, redes.red_social, COALESCE(total_registros, 0) AS total
FROM (
    SELECT DISTINCT sede FROM fichaempleo
) AS sedes
CROSS JOIN (
    SELECT 'Bumeran' AS red_social, 1 AS orden
    UNION SELECT 'Facebook', 2
    UNION SELECT 'Instagram', 3
    UNION SELECT 'Tiktok', 4
    UNION SELECT 'Otros', 5
) AS redes
LEFT JOIN (
    SELECT sede, fuente_trabajo, COUNT(*) AS total_registros
    FROM fichaempleo
    WHERE fuente_trabajo IN ('Bumeran', 'Facebook', 'Instagram', 'Tiktok', 'Otros')
    GROUP BY sede, fuente_trabajo
) AS conteo
ON sedes.sede = conteo.sede AND redes.red_social = conteo.fuente_trabajo
ORDER BY sedes.sede, redes.orden;";

// Ejecutar la consulta y obtener los resultados
$resultados = $conn->query($sql);

// Inicializar un array para almacenar los datos
$datos_grafico = array();

// Verificar si se encontraron resultados
if ($resultados) {
  // Recorrer cada fila de resultados
  while ($fila = $resultados->fetch_assoc()) {
    $sede = $fila['sede'];
    $red_social = $fila['red_social'];
    $total = intval($fila['total']);

    // Si la sede no existe en el array de datos, agregarla con un array vacío de redes sociales
    if (!isset($datos_grafico[$sede])) {
      $datos_grafico[$sede] = array('sede' => $sede, 'redes_sociales' => array());
    }

    // Agregar la red social y su total al array de redes sociales de la sede
    $datos_grafico[$sede]['redes_sociales'][] = array('red_social' => $red_social, 'total' => $total);
  }
} else {
  echo "Error en la consulta SQL: " . $conn->error;
}

// Devolver los datos en formato JSON
echo json_encode(array_values($datos_grafico)); // Convertir el array asociativo a un array indexado antes de codificar como JSON

// Cerrar la conexión
$conn->close();
