<?php
@include '../../modelo/conexion.php';
session_start();

// Realizas la consulta SQL para obtener los datos
$sql = "SELECT redes.red_social, sedes.sede, COALESCE(total_registros, 0) AS total
        FROM (
            SELECT 'bumeran' AS red_social
            UNION SELECT 'facebook'
            UNION SELECT 'instagram'
            UNION SELECT 'tiktok'
            UNION SELECT 'otros'
        ) AS redes
        CROSS JOIN (
            SELECT DISTINCT sede FROM fichaempleo
        ) AS sedes
        LEFT JOIN (
            SELECT sede, fuente_trabajo, COUNT(*) AS total_registros
            FROM fichaempleo
            WHERE fuente_trabajo IN ('bumeran', 'facebook', 'instagram', 'tiktok', 'otros')
            GROUP BY sede, fuente_trabajo
        ) AS conteo
        ON redes.red_social = conteo.fuente_trabajo AND sedes.sede = conteo.sede";

// Ejecutas la consulta y obtienes el resultado
$resultado = $conn->query($sql);

// Inicializar arrays para almacenar los datos
$data = array(
    "redes_sociales" => array(),
    "sedes" => array(),
    "conteos" => array()
);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Recorrer cada fila de resultados
    while($fila = $resultado->fetch_assoc()) {
        // Almacenar los datos en los arreglos
        $red_social = $fila['red_social'];
        $sede = $fila['sede'];
        $total = $fila['total'];
        
        // Verificar si la sede ya está en el array de sedes
        if (!in_array($sede, $data['sedes'])) {
            // Si no está, añadir la sede al array de sedes
            $data['sedes'][] = $sede;
        }
        
        // Obtener el índice de la sede en el array de sedes
        $indice_sede = array_search($sede, $data['sedes']);
        
        // Almacenar el conteo en el array de conteos
        $data['conteos'][$indice_sede][] = $total;
        
        // Almacenar la red social solo si aún no se ha agregado
        if (!in_array($red_social, $data['redes_sociales'])) {
            $data['redes_sociales'][] = $red_social;
        }
    }
} else {
    echo "No se encontraron resultados.";
}

// Convertir a JSON y devolver
echo json_encode($data);

// Cerrar la conexión
$conn->close();
?>
