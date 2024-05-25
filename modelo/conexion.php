<?php

//La variable "conn" permitirá crear una conexión con nnuestra BD.
$conn = mysqli_connect('localhost','root','','sis_fichaempleo');

// Verificar si la conexión fue exitosa
if (!$conn) {
    echo "Error en la conexión a la base de datos: ";
    exit();
}


?>