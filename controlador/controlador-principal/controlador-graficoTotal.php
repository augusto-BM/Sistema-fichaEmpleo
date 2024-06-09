<?php
@include '../../modelo/conexion.php';

session_start();

// Realizas la consulta SQL para obtener los datos agrupados por sede
$sql = "SELECT sede, COUNT(id) AS total FROM fichaempleo GROUP BY sede";

// Ejecutas la consulta y obtienes el resultado
$resultado = $conn->query($sql);

// Inicializar un array para almacenar los datos
$data = array();

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Recorrer cada fila de resultados
    while ($fila = $resultado->fetch_assoc()) {
        // Almacenar el total y el nombre de la sede en el arreglo
        $nombre_sede = $fila['sede'];
        $total_postulantes = intval($fila['total']);
        // Construir el array de datos en el formato requerido
        $data[] = array(
            'value' => $total_postulantes,
            'name' => $nombre_sede
        );
    }
} else {
    echo "No se encontraron resultados.";
}

// Convertir a JSON y devolver
echo json_encode($data);

// Cerrar la conexión
$conn->close();
?>