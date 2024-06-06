
<?php
@include '../../modelo/conexion.php';
session_start();
?>

<?php
    // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $rol	 = $_POST["rol"];
        $sede = $_POST["sede"];
        $estado = "activo";
        
        // Preparar la consulta SQL para insertar los datos en la tabla
        $sql_entrevistadores = "INSERT INTO login (usuario, contraseña, id_rol, id_sede, estado) 
                VALUES ('$usuario','$contraseña','$rol', '$sede', '$estado')";
        $query = mysqli_query($conn, $sql_entrevistadores);

        
        // Ejecutar la consulta y verificar si fue exitosa
        if ($query) {
            $_SESSION['mensaje'] = "Entrevistador registrado exitosamente";
            header("Location: ../../vista/dashboard/principal/cuentas.php");
        } else {
            $_SESSION['mensaje'] = "Error al registrar entrevistador";
            header("Location: ../../vista/dashboard/principal/cuentas.php");
        }
        
    }
    
    ?>

