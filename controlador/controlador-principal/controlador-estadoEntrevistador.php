<?php
@include '../../modelo/conexion.php';

// Obtener los datos del POST QUE MANDA AJAX
$id = $_POST['id'];
$estado = $_POST['estado'];

// Actualizar el estado en la base de datos
$sql = "UPDATE entrevistador SET estado='$estado' WHERE id_entrevistador=$id";

if ($conn->query($sql) === TRUE) {
    echo "Estado actualizado correctamente";
} else {
    echo "Error al actualizar el estado: " . $conn->error;
}

$conn->close();
?>
