<?php
@include '../../modelo/conexion.php';

session_start();
//AL APRETAR EL BOTON DE EDITAR
if (isset($_POST['click_btn_editar'])) {

    $id = $_POST['user_id'];        //Obtener el id del usuario mediante  ajax    
    $array_datos_obtenidos = [];    //Array para almacenar los datos obtenidos de la base de datos  

    $sql = "SELECT * FROM login WHERE id = '$id'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {

        while ($fila = mysqli_fetch_array($resultado)) {
            array_push($array_datos_obtenidos, $fila);
            header('Content-Type: application/json');
            echo json_encode($array_datos_obtenidos);
        }
    }
}

//AL APRETAR EL BOTON DE GUARDAR CAMBIOS EN EL MODAL EDITAR
if (isset($_POST['click_btn_editar_cambios'])) {

    $id = $_POST["id_login"]; //Este es el input invisible que contiene el id del usuario en el modal editar
    echo $id;
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $rol = $_POST["rol"];
    $sede = $_POST["sede"];

    /* $estado = "inactivo"; */

    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql_editar = "UPDATE login SET usuario = '$usuario', contraseña = '$contraseña', id_rol = '$rol', id_sede = '$sede' WHERE id = '$id'";
    
    $query = mysqli_query($conn, $sql_editar);
    if ($query) {
        $_SESSION['mensaje'] = "Datos actualizados correctamente";
        header("Location: ../../vista/dashboard/secundario/cuentas.php");
    } else {
        $_SESSION['mensaje'] = "Error al actualizar los datos";
        header("Location: ../../vista/dashboard/secundario/cuentas.php");
    }
    
}

?>


