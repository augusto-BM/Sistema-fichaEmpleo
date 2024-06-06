<?php
@include '../../modelo/conexion.php';
session_start();

// Realizas la consulta SQL para obtener los datos
$sql = "SELECT redes.red_social, COALESCE(total_registros, 0) AS total
        FROM (
            SELECT 'bumeran' AS red_social
            UNION SELECT 'facebook'
            UNION SELECT 'instagram'
            UNION SELECT 'tiktok'
            UNION SELECT 'otros'
        ) AS redes
        LEFT JOIN (
            SELECT fuente_trabajo, COUNT(*) AS total_registros
            FROM fichaempleo
            WHERE sede = 'Imfca Contacto'
            AND fuente_trabajo IN ('bumeran', 'facebook', 'instagram', 'tiktok', 'otros')
            GROUP BY fuente_trabajo
        ) AS conteo
        ON redes.red_social = conteo.fuente_trabajo";

// Ejecutas la consulta y obtienes el resultado
$resultado = $conn->query($sql);

// Inicializar un array para almacenar los datos
$data = array(
    "redes_sociales" => array(),
    "conteos" => array()
);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Recorrer cada fila de resultados
    while($fila = $resultado->fetch_assoc()) {
        // Almacenar los datos en el arreglo
        $data['redes_sociales'][] = $fila['red_social'];
        $data['conteos'][] = $fila['total'];
    }
} else {
    echo "No se encontraron resultados.";
}
// Convertir a JSON y devolver
echo json_encode($data);
// Cerrar la conexión
/* $conn->close(); */
?>

