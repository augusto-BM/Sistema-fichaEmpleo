
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FICHA POSTULANTE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css-principal/imprimirFicha.css">
</head>
<style>
  @media print {

    /* Ocultar encabezados y pies de página predeterminados del navegador */
    @page {
      /* Eliminar los márgenes predeterminados */
      size: A4;
      margin: 0;
    }

    .boton {
      display: none;
      visibility: none;
    }

    /* Eliminar los márgenes del cuerpo de la página */
    /* body {
        margin: 0; 
      } */
  }
</style>
<br></br>
<body>
  <div class="contenedor-principal table-responsive col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <?php
  @include '../../../../modelo/conexion.php';
  // Verificar si se ha pasado un ID como parámetro en la URL
  if (isset($_GET['user_id'])) {
    // Recuperar el ID de la URL
    $id = $_GET['user_id'];

    $sql = "SELECT * FROM fichaEmpleo WHERE id = '$id'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {

      while ($fila = mysqli_fetch_array($resultado)) {
          $id_entrevistador = $fila['id_entrevistador'] ?? 'No asignado';
  
  ?>

    <div class="container">
      <div class="row"></div>
      <div class="col-md-6 ">
        <h1 class="titulo-principal">Ficha de Empleo</h1>
      </div>
      <div class="col-md-6 ">
        <div class="form-group">
          <label for="cargo">Cargo al cual postula:</label>
          <input class="text-center" type="text" name="cargo" id="cargo" value="<?php echo  $fila['cargoPostulante'] ?>" readonly>
        </div>
      </div>
    </div>

    <div class="importante mx-auto">
      <p><u>IMPORTANTE:</u></p>
      <p>En caso de ser contratado, esta solicitud formará parte de su archivo individual permanente. Llénala con cuidado y con los datos correctos. Todas las preguntas deben ser contestadas. Si no le corresponde alguna de ellas, debe señalarlo expresamente.</p>
    </div>

    <div class="container mx-auto">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nombres</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td ><?php echo  $fila['nombrePostulante'] ?></td>
            <td ><?php echo  $fila['ApPaternoPostulante'] ?></td>
            <td ><?php echo  $fila['ApMaternoPostulante'] ?></td>
          </tr>
        </tbody>
      </table>
      <table class="table table-bordered" id="tablaFecha" style="width: 30%; float: right;">
        <thead>
          <tr>
            <th scope="col">Fecha</th>
        </thead>
        <tbody>
          <tr class="text-center">
            <td scope="row"><?php echo  $fila['fecha'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="container mx-auto">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">N° DNI/CEDULA</th>
            <th scope="col">Nacionalidad</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Estado Civil</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td><?php echo  $fila['nroDni_Cedula'] ?></td>
            <td><?php echo  $fila['Nacionalidad'] ?></td>
            <td><?php echo  $fila['fechaNacimiento'] ?></td>
            <td><?php echo  $fila['EstadoCivil'] ?></td>

          </tr>
        </tbody>
      </table>
    </div>

    <div class="container mx-auto">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Edad</th>
            <th scope="col">¿Tienes hijos?</th>
            <th scope="col">Direccion exacta</th>
            <th scope="col">Distrito</th>
            <th scope="col">Ciudad</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td><?php echo  $fila['Edad'] ?></td>
            <td><?php echo  $fila['nroHijos'] ?></td>
            <td scope="row"><?php echo  $fila['direccion'] ?></td>
            <td><?php echo  $fila['distrito'] ?>/td>
            <td><?php echo  $fila['ciudad'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="container mx-auto">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Celular</th>
            <th scope="col">Correo</th>
            <th scope="col">¿Estas estudiando?</th>
            <th scope="col">Fuente de trabajo</th>
            <th scope="col">Sede</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td><?php echo  $fila['celular'] ?></td>
            <td><?php echo  $fila['correo'] ?></td>
            <td><?php echo  $fila['estudios'] ?></td>
            <td><?php echo  $fila['fuente_trabajo'] ?></td>
            <td><?php echo  $fila['sede'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="container mx-auto">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nombre de la Empresa</th>
            <th scope="col">Cargo</th>
            <th scope="col">(Mes y año) <br>Desde &nbsp;&nbsp;&nbsp;Hasta</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="container mx-auto">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">POSITIVOS</th>
            <th scope="col">NEGATIVOS</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>1. <?php echo  $fila['cualidadPositiva_a'] ?></td>
            <td>1. <?php echo  $fila['cualidadNegativa_a'] ?></td>
          </tr>
          <tr class="text-center">
            <td>2. <?php echo  $fila['cualidadPositiva_b'] ?></td>
            <td>2. <?php echo  $fila['cualidadNegativa_b'] ?></td>
          </tr>

        </tbody>
      </table>
    </div>
    <?php


}
}
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- //SCRIPT PARA IMPRIMIR -->
        <script>
      window.onload = function() {
        window.print();
      };
    </script>

    <!-- SCRIPT PARA REDIRECCIONAR SI SE CANCELA -->
       <script>
      // Función para redireccionar cuando se cancela la impresión
      function redireccionarAlCancelar() {
        /* window.location.href = '../principal.php'; */ // Reemplaza 'tu_pagina_destino.html' con la URL de la página a la que deseas redirigir
        window.close();
      }

      // Evento que se dispara antes de imprimir
      window.onbeforeprint = function() {
        // No es necesario hacer nada si se está imprimiendo
      };

      // Evento que se dispara cuando se cancela la impresión
      window.onafterprint = function() {
        redireccionarAlCancelar(); // Llama a la función de redireccionamiento
      };
    </script>

</body>


</html>