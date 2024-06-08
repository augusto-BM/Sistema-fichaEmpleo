<?php
@include '../../modelo/conexion.php';

session_start();

$NOMBRE_SEDE_LOGUEADO = $_SESSION['nombre_sesion'];
// Realizas la consulta SQL para obtener los datos
$sql = "SELECT COUNT(id) AS total FROM fichaempleo WHERE sede = '$NOMBRE_SEDE_LOGUEADO'";

// Ejecutas la consulta y obtienes el resultado
$resultado = $conn->query($sql);

// Inicializar un array para almacenar los datos
$data = array();

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Recorrer cada fila de resultados
    while ($fila = $resultado->fetch_assoc()) {
        // Almacenar el total y el nombre de la empresa en el arreglo
        $data['total'] = intval($fila['total']); // Convertir el total a entero
        $data['nombre_empresa'] = $NOMBRE_SEDE_LOGUEADO;
    }
} else {
    echo "No se encontraron resultados.";
}
// Convertir a JSON y devolver
echo json_encode($data);
// Cerrar la conexión
/* $conn->close(); */
