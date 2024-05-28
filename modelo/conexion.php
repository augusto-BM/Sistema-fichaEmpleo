<?php

$host = 'localhost'; // Host de la base de datos MySQL
$usuario = 'root'; // Usuario de MySQL
$contrasena = ''; // Contraseña de MySQL
$base_de_datos = 'sis_fichaempleo'; // Nombre de la base de datos

//La variable "conn" permitirá crear una conexión con nnuestra BD.
$conn = mysqli_connect('localhost','root','','sis_fichaempleo');

// Verificar si la conexión fue exitosa
if (!$conn) {
    echo "Error en la conexión a la base de datos: ";
    exit();
}


?>