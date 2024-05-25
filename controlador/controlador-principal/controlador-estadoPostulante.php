<?php
@include '../../modelo/conexion.php';


// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del POST QUE MANDA AJAX
$id = $_POST['id'];
$estado = $_POST['estado'];

// Actualizar el estado en la base de datos
$sql = "UPDATE fichaempleo SET proceso='$estado' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Estado actualizado correctamente";
} else {
    echo "Error al actualizar el estado: " . $conn->error;
}

$conn->close();
?>
