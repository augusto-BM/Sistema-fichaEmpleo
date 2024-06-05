<?php
@include '../../modelo/conexion.php';

session_start();

// AL APRETAR EL BOTON DE EDITAR
if (isset($_POST['click_btn_editar'])) {

  $id = $_POST['user_id']; // Obtener el id del usuario mediante ajax    
  $array_datos_obtenidos = []; // Array para almacenar los datos obtenidos de la base de datos  

  $sql = "SELECT * FROM fichaempleo WHERE id = '$id'";
  $resultado = mysqli_query($conn, $sql);

  if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_array($resultado)) {
      array_push($array_datos_obtenidos, $fila);
    }
    header('Content-Type: application/json');
    echo json_encode($array_datos_obtenidos);
  }
}

// AL APRETAR EL BOTON DE GUARDAR CAMBIOS EN EL MODAL EDITAR
if (isset($_POST['click_btn_editar_cambios'])) {

  $id = $_POST["id_postulante"]; // Este es el input invisible que contiene el id del usuario en el modal editar

  // Verificar si los campos existen antes de usarlos
  $entrevistador = isset($_POST["entrevistador"]) ? $_POST["entrevistador"] : null;
  $sede = isset($_POST["sede"]) ? $_POST["sede"] : '';
  $cargo = isset($_POST["cargo"]) ? $_POST["cargo"] : '';
  $fecha_hoy = isset($_POST["fecha_hoy"]) ? $_POST["fecha_hoy"] : '';

  $nombres = isset($_POST["nombres"]) ? $_POST["nombres"] : '';
  $apellido_paterno = isset($_POST["apellido_paterno"]) ? $_POST["apellido_paterno"] : '';
  $apellido_materno = isset($_POST["apellido_materno"]) ? $_POST["apellido_materno"] : '';

  $dni = isset($_POST["dni"]) ? $_POST["dni"] : '';
  $nacionalidad = isset($_POST["nacionalidad"]) ? $_POST["nacionalidad"] : '';
  $fecha_nacimiento = isset($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : '';
  $estado_civil = isset($_POST["estado_civil"]) ? $_POST["estado_civil"] : '';

  $celular = isset($_POST["celular"]) ? $_POST["celular"] : '';
  $correo = isset($_POST["correo"]) ? $_POST["correo"] : '';
  $edad = isset($_POST["edad"]) ? $_POST["edad"] : '';

  $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : '';
  $distrito = isset($_POST["distrito"]) ? $_POST["distrito"] : '';
  $ciudad = isset($_POST["ciudad"]) ? $_POST["ciudad"] : '';

  $hijos = isset($_POST["hijos"]) ? $_POST["hijos"] : 0; // Si no hay hijos, el valor predeterminado es 0
  $estudios = isset($_POST["estudios"]) ? $_POST["estudios"] : '';
  $fuente_trabajo = isset($_POST["fuente_trabajo"]) ? $_POST["fuente_trabajo"] : '';

  $empresa_experiencia = isset($_POST["empresa_experiencia"]) ? $_POST["empresa_experiencia"] : '';
  $cargo_experiencia = isset($_POST["cargo_experiencia"]) ? $_POST["cargo_experiencia"] : '';
  $fecha_cargo_desde = isset($_POST["fecha_cargo_desde"]) ? $_POST["fecha_cargo_desde"] : '';
  $fecha_cargo_hasta = isset($_POST["fecha_cargo_hasta"]) ? $_POST["fecha_cargo_hasta"] : '';

  $positivos_1 = isset($_POST["positivos_1"]) ? $_POST["positivos_1"] : '';
  $positivos_2 = isset($_POST["positivos_2"]) ? $_POST["positivos_2"] : '';
  $negativos_1 = isset($_POST["negativos_1"]) ? $_POST["negativos_1"] : '';
  $negativos_2 = isset($_POST["negativos_2"]) ? $_POST["negativos_2"] : '';

  if ($entrevistador !== null) {
    // Verificar si el entrevistador existe en la tabla `entrevistador`
    $result = mysqli_query($conn, "SELECT id_entrevistador FROM entrevistador WHERE id_entrevistador = '$entrevistador'");
    if (mysqli_num_rows($result) == 0) {
      $_SESSION['mensaje'] = "Error: El entrevistador seleccionado no existe.";
      header("Location: ../../vista/dashboard/principal/principal.php");
      exit();
    }
  }

  //SENTENCIA PARA RECUPERAR EL ID DE LA SEDE PARA DEVOLVERLO POR GET A EMPRESA SELECCIONADA
  $sql_sede = "SELECT id_sede FROM sede WHERE nombre_sede = '$sede'";
  $resultado_sede = mysqli_query($conn, $sql_sede);
  if (mysqli_num_rows($resultado_sede) > 0) {
    // Extraer el ID de la sede
    $fila = mysqli_fetch_assoc($resultado_sede);
    $id_sede = $fila['id_sede'];
    /* echo "El ID de la sede '$nombre_sede' es: $id_sede"; */
  } else {
    echo "No se encontró ninguna sede con el nombre '$nombre_sede'";
  }

  // Preparar la consulta SQL para actualizar los datos en la tabla
  $sql_editar = "UPDATE fichaempleo SET 
        id_entrevistador = " . ($entrevistador !== null ? "'$entrevistador'" : "NULL") . ",
        sede = '$sede',
        cargoPostulante = '$cargo',
        fecha = '$fecha_hoy',
    
        nombrePostulante = '$nombres',
        ApPaternoPostulante = '$apellido_paterno',
        ApMaternoPostulante = '$apellido_materno',
    
        nroDni_Cedula = '$dni',
        Nacionalidad = '$nacionalidad',
        fechaNacimiento = '$fecha_nacimiento',
        EstadoCivil = '$estado_civil',
    
        celular = '$celular',
        correo = '$correo',
        Edad = '$edad',
    
        direccion = '$direccion',
        distrito = '$distrito',
        ciudad = '$ciudad',
    
        nroHijos = '$hijos',
        estudios = '$estudios',
        fuente_trabajo = '$fuente_trabajo',
    
        empresa_que_trabajo = '$empresa_experiencia',
        cargo_que_trabajo = '$cargo_experiencia',
        desde = '$fecha_cargo_desde',
        hasta = '$fecha_cargo_hasta',
    
        cualidadPositiva_a = '$positivos_1',
        cualidadPositiva_b = '$positivos_2',
        cualidadNegativa_a = '$negativos_1',
        cualidadNegativa_b = '$negativos_2'
        WHERE id = '$id'";

  $query = mysqli_query($conn, $sql_editar);
  if ($query) {
    $_SESSION['mensaje'] = "Datos actualizados correctamente";
  } else {
    $_SESSION['mensaje'] = "Error al actualizar los datos";
  }
  header("Location: ../../vista/dashboard/principal/empresaSeleccionada.php?id_empresa=$id_sede");
}
