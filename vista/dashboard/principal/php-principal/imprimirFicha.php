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
<br></br><br></br>

<body>
  <div class="contenedor-principal table-responsive col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="container">
      <div class="row"></div>
      <div class="col-md-6 ">
        <h1 class="titulo-principal">Ficha de Empleo</h1>
      </div>
      <div class="col-md-6 ">
        <div class="form-group">
          <label for="cargo">Cargo al cual postula:</label>
          <input type="text" name="cargo" id="cargo" required>
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
          <tr>
            <td scope="row"></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
      <table class="table table-bordered" id="tablaFecha" style="width: 30%; float: right;">
        <thead>
          <tr>
            <th scope="col">Fecha</th>
        </thead>
        <tbody>
          <tr>
            <td scope="row"></td>
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
            <th scope="col">Estado Civil/Compromiso</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
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
            <th scope="col">Edad</th>
            <th scope="col">¿Tienes hijos? ¿Cuántos?</th>
          </tr>
        </thead>
        <tbody>
          <tr>
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
            <th scope="col">Direccion exacta</th>
            <th scope="col">Distrito</th>
            <th scope="col">Ciudad</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="row"></td>
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
            <th scope="col">Celular</th>
            <th scope="col">Correo</th>
            <th scope="col">¿Estas estudiando? ¿Que estudias?</th>
          </tr>
        </thead>
        <tbody>
          <tr>
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
            <th scope="col">Bumeran</th>
            <th scope="col">Facebook</th>
            <th scope="col">Tik Tok</th>
            <th scope="col">Instagram</th>
            <th scope="col">Otros</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
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
            <th scope="col">Nombre de la Empresa</th>
            <th scope="col">Cargo</th>
            <th scope="col">(Mes y año) <br>Desde &nbsp;&nbsp;&nbsp;Hasta</th>
          </tr>
        </thead>
        <tbody>
          <tr>
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
          <tr>
            <td>1. </td>
            <td>2. </td>
          </tr>
          <tr>
            <td>1. </td>
            <td>2. </td>
          </tr>

        </tbody>
      </table>
    </div>

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
        window.location.href = '../principal.php'; // Reemplaza 'tu_pagina_destino.html' con la URL de la página a la que deseas redirigir
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