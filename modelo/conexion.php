<?php

$host = 'localhost'; // Host de la base de datos MySQL
$usuario = 'root'; // Usuario de MySQL
$contrasena = ''; // Contraseña de MySQL
$base_de_datos = 'sis_fichaempleo'; // Nombre de la base de datos

//La variable "conn" permitirá crear una conexión con nnuestra BD.
$conn = mysqli_connect($host,$usuario,$contrasena,$base_de_datos);

// Verificar si la conexión fue exitosa
if (!$conn) {
    echo "Error en la conexion a la base de datos: ";
    exit();
}

// Establecer la codificación de caracteres
mysqli_set_charset($conn, "utf8");



?>