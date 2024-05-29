
<?php
@include '../../modelo/conexion.php';
session_start();

?>

<?php
    // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

        $nombre_sede = $_POST["nombre_sede"];
        $lugar_sede = $_POST["lugar_sede"];
        $estado = "activo";
        
        // Preparar la consulta SQL para insertar los datos en la tabla
        $sql_entrevistadores = "INSERT INTO sede (nombre_sede, lugar_sede, estado) 
                VALUES ('$nombre_sede','$lugar_sede','$estado')";
        $query = mysqli_query($conn, $sql_entrevistadores);

        
        // Ejecutar la consulta y verificar si fue exitosa
        if ($query) {
            $_SESSION['mensaje'] = "Empresa registrado exitosamente";
            header("Location: ../../vista/dashboard/principal/empresas.php");
        } else {
            $_SESSION['mensaje'] = "Error al registrar empresas";
            header("Location: ../../vista/dashboard/principal/empresas.php");
        }
        
    }
    
    ?>

