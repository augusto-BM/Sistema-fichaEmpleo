
<?php
@include '../../modelo/conexion.php';
session_start();

?>

<?php
    // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

        $nombre_entrevistador = $_POST["nombre_entrevistador"];
        $apellido_paterno_entrevistador = $_POST["apellido_paterno_entrevistador"];
        $apellido_materno_entrevistador	 = $_POST["apellido_materno_entrevistador"];
        $sede = $_POST["sede"];
        $estado = "activo";
        
        // Preparar la consulta SQL para insertar los datos en la tabla
        $sql_entrevistadores = "INSERT INTO entrevistador (nombre_entrevistador, apellido_paterno_entrevistador, apellido_materno_entrevistador, sede, estado) 
                VALUES ('$nombre_entrevistador','$apellido_paterno_entrevistador','$apellido_materno_entrevistador', '$sede', '$estado')";
        $query = mysqli_query($conn, $sql_entrevistadores);

        
        // Ejecutar la consulta y verificar si fue exitosa
        if ($query) {
            $_SESSION['mensaje'] = "Entrevistador registrado exitosamente";
            header("Location: ../../vista/dashboard/principal/entrevistadores.php");
        } else {
            $_SESSION['mensaje'] = "Error al registrar entrevistador";
            header("Location: ../../vista/dashboard/principal/entrevistadores.php");
        }
        
    }
    
    ?>

