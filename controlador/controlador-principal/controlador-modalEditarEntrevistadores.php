<?php
@include '../../modelo/conexion.php';

session_start();
//AL APRETAR EL BOTON DE EDITAR
if (isset($_POST['click_btn_editar'])) {

    $id = $_POST['user_id'];        //Obtener el id del usuario mediante  ajax    
    $array_datos_obtenidos = [];    //Array para almacenar los datos obtenidos de la base de datos  

    $sql = "SELECT * FROM entrevistador WHERE id_entrevistador = '$id'";
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

    $id = $_POST["id_entrevistador"]; //Este es el input invisible que contiene el id del usuario en el modal editar
    echo $id;
    $nombre_entrevistador = $_POST["nombre_entrevistador"];
    $apellido_paterno_entrevistador = $_POST["apellido_paterno_entrevistador"];
    $apellido_materno_entrevistador	 = $_POST["apellido_materno_entrevistador"];
    $sede = $_POST["sede"];
    /* $estado = "inactivo"; */

    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql_editar = "UPDATE entrevistador SET nombre_entrevistador = '$nombre_entrevistador', apellido_paterno_entrevistador = '$apellido_paterno_entrevistador', apellido_materno_entrevistador = '$apellido_materno_entrevistador', sede = '$sede' WHERE id_entrevistador = '$id'";
    
    $query = mysqli_query($conn, $sql_editar);
    if ($query) {
        $_SESSION['mensaje'] = "Datos actualizados correctamente";
        header("Location: ../../vista/dashboard/principal/entrevistadores.php");
    } else {
        $_SESSION['mensaje'] = "Error al actualizar los datos";
        header("Location: ../../vista/dashboard/principal/entrevistadores.php");
    }
    
}

?>


