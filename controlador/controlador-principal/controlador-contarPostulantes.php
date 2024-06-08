<?php

/* include '../../../modelo/conexion.php';

$contar_imfca  = "SELECT COUNT(id) as total FROM fichaempleo WHERE sede = 'Imfca Contacto' AND fecha = CURDATE()";
$contar_imfca_seleccionados  = "SELECT COUNT(id) as total FROM fichaempleo WHERE sede = 'Imfca Contacto' AND fecha = CURDATE() AND proceso = 'Seleccionado'";

$contar_jbg  = "SELECT COUNT(id) as total FROM fichaempleo WHERE sede = 'JBG Operator' AND fecha = CURDATE()";
$contar_jbg_seleccionados  = "SELECT COUNT(id) as total FROM fichaempleo WHERE sede = 'JBG Operator' AND fecha = CURDATE() AND proceso = 'Seleccionado'";

$contar_bkn  = "SELECT COUNT(id) as total FROM fichaempleo WHERE sede = 'BKN' AND fecha = CURDATE()";
$contar_bkn_seleccionados  = "SELECT COUNT(id) as total FROM fichaempleo WHERE sede = 'BKN' AND fecha = CURDATE() AND proceso = 'Seleccionado'";


$result_imfca = mysqli_query($conn, $contar_imfca);
$result_imfca_seleccionados = mysqli_query($conn, $contar_imfca_seleccionados);

$result_jbg = mysqli_query($conn, $contar_jbg);
$result_jbg_seleccionados = mysqli_query($conn, $contar_jbg_seleccionados);

$result_bkn = mysqli_query($conn, $contar_bkn);
$result_bkn_seleccionados = mysqli_query($conn, $contar_bkn_seleccionados);

// Verificar si la consulta fue exitosa
if ($result_imfca && $result_jbg && $result_bkn && $result_imfca_seleccionados && $result_jbg_seleccionados && $result_bkn_seleccionados) {

    $row_imfca = mysqli_fetch_assoc($result_imfca);
    $row_imfca_seleccionados = mysqli_fetch_assoc($result_imfca_seleccionados);

    $row_jbg = mysqli_fetch_assoc($result_jbg);
    $row_jbg_seleccionados = mysqli_fetch_assoc($result_jbg_seleccionados);

    $row_bkn = mysqli_fetch_assoc($result_bkn);
    $row_bkn_seleccionados = mysqli_fetch_assoc($result_bkn_seleccionados);
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
} */
?>