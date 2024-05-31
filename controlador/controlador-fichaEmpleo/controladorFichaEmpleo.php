
<?php
@include './modelo/conexion.php';
?>

<?php
    // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Obtener los datos del formulario y limpiarlos
        $id_postulante = 2;
        $proceso = "Postulante";
        $estado = "inactivo";
        $sede = $_POST["sede"];
        $cargo = $_POST["cargo"];
        $fecha_hoy = $_POST["fecha_hoy"];
        $nombres = $_POST["nombres"];
        $apellido_paterno = $_POST["apellido_paterno"];
        $apellido_materno = $_POST["apellido_materno"];
        $dni = $_POST["dni"];
        $nacionalidad = $_POST["nacionalidad"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $estado_civil = $_POST["estado_civil"];
        $edad = $_POST["edad"];
        $hijos = isset($_POST["hijos"]) ? $_POST["hijos"] : 0; // Si no hay hijos, el valor predeterminado es 0
        $direccion = $_POST["direccion"];
        $distrito = $_POST["distrito"];
        $ciudad = $_POST["ciudad"];
        $celular = $_POST["celular"];
        $correo = $_POST["correo"];
        $estudios = $_POST["estudios"];
        $fuente_trabajo = $_POST["fuente_trabajo"];
        $positivos_1 = $_POST["positivos_1"];
        $positivos_2 = $_POST["positivos_2"];
        $negativos_1 = $_POST["negativos_1"];
        $negativos_2 = $_POST["negativos_2"];
        $empresa_experiencia = $_POST["empresa_experiencia"];
        $cargo_experiencia = $_POST["cargo_experiencia"];
        $fecha_cargo_desde = $_POST["fecha_cargo_desde"];
        $fecha_cargo_hasta = $_POST["fecha_cargo_hasta"];

        
        // Preparar la consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO fichaempleo (id_postulante, sede, cargoPostulante, nombrePostulante, ApPaternoPostulante, ApMaternoPostulante, fecha, nroDni_Cedula, Nacionalidad, fechaNacimiento, EstadoCivil, Edad, nroHijos, direccion, distrito, ciudad, celular, correo, estudios, fuente_trabajo, cualidadPositiva_a, cualidadPositiva_b, cualidadNegativa_a, cualidadNegativa_b, empresa_que_trabajo, cargo_que_trabajo, desde, hasta, proceso, estado) 
                VALUES ('$id_postulante','$sede','$cargo', '$nombres', '$apellido_paterno', '$apellido_materno', '$fecha_hoy', '$dni', '$nacionalidad', '$fecha_nacimiento', '$estado_civil', '$edad', '$hijos', '$direccion', '$distrito', '$ciudad', '$celular', '$correo', '$estudios', '$fuente_trabajo', '$positivos_1', '$positivos_2', '$negativos_1', '$negativos_2', '$empresa_experiencia', '$cargo_experiencia', '$fecha_cargo_desde', '$fecha_cargo_hasta','$proceso', '$estado')";
        $query = mysqli_query($conn, $sql);

        
        // Ejecutar la consulta y verificar si fue exitosa
        if ($query) {
?>
            <script>
                /* Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "El registro ha sido exitoso",
                    showConfirmButton: false,
                    timer: 3000
                }); */
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "El registro ha sido exitoso",
                    showCancelButton: true,
                    cancelButtonText: "LLenar otro formulario",
                    confirmButtonText: "Cerrar Sesión",
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6"
                    /* ,customClass: {
                        // Clase personalizada para el botón Cerrar Sesión
                        confirmButton: 'btn-danger', 
                        // Clase personalizada para el botón LLenar otro formulario
                        cancelButton: 'btn-success' 
                    } */
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirigir a cerrar sesion
                        window.location.href = "../login/cerrar-sesion.php";
                    } else {

                    }
                });
            </script>
            
        <?php

        }else{

        ?>

        <script>

            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Algo salio mal, no se ha hecho el registro!",
            footer: '<a href="#">Comuniquese con soporte!!!</a>'
            });
        </script>

        <?php


        }
    }

    ?>

