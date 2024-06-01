<div class="cards row gap-3 justify-content-center mt-2">

  <?php
  include '../../../modelo/conexion.php';

  //RECUPERAMOS EL NOMBRE DE LA EMPRESA POR SESION
  $NOMBRE_EPRESA = $_SESSION['nombre_sesion']; 
  
  $sql_empresas = "SELECT * FROM sede WHERE estado = 'activo' AND nombre_sede = '$NOMBRE_EPRESA'";

  $resultado_empresas = mysqli_query($conn, $sql_empresas);

  // Verificar si hay resultados
  if (mysqli_num_rows($resultado_empresas) > 0) {

  ?>
    <div class="row gap-3 justify-content-center mt-2">
      <?php

      $index_color = 0; // Variable para controlar el índice del color

      // Iterar sobre los resultados y mostrar cada empresa dinámicamente
      while ($row_empresa = mysqli_fetch_assoc($resultado_empresas)) {

        $nombre_empresa = $row_empresa['nombre_sede'];
        $id_empresa = $row_empresa['id_sede']; // ID de la empresa

        // Consulta para contar los postulantes de hoy de cada empresa
        $contar_empresas = "SELECT COUNT(id) as total FROM fichaempleo WHERE sede = '$nombre_empresa' AND fecha = CURDATE()";
        $resultado_contar_empresas = mysqli_query($conn, $contar_empresas);
        $row_contar_empresas = mysqli_fetch_assoc($resultado_contar_empresas);
        $total_registros_empresas = $row_contar_empresas['total'];

        // Consulta para contar los postulantes de hoy que hayan sido seleccionados de cada empresa
        $contar_seleccionados = "SELECT COUNT(id) as total FROM fichaempleo WHERE sede = '$nombre_empresa' AND fecha = CURDATE() AND proceso = 'Seleccionado'";
        $resultado_seleccionados = mysqli_query($conn, $contar_seleccionados);
        $row_seleccionados = mysqli_fetch_assoc($resultado_seleccionados);
        $total_seleccionados = $row_seleccionados['total'];

      ?>

        <div class="card__items position-relative col-sm-12 col-md-6 col-lg-6 col-xl-6" style="background-color: #48344E;" onclick="redirectToEmpresa(<?php echo $id_empresa; ?>)">
          <div class="card__background"></div> <!-- Nuevo div para la imagen de fondo -->
          <div class="card__empresas d-flex flex-column gap-2 mt-3">
            <span><?php echo $row_empresa['nombre_sede']; ?></span>
            <p class="pasaron"><?php echo $total_seleccionados; ?> <i class="pasaron fas fa-user-check h3"></i></p>
            <p class="asistieron">Hoy: <?php echo $total_registros_empresas; ?></b> postulantes</p>
          </div>
        </div>
      <?php

      }
      ?>
    </div>
  <?php
  } else {
    echo "No hay empresas disponibles.";
  }

  ?>
</div>
<!-- <script>
  function redirectToEmpresa(idEmpresa) {
    // Redirigir a la página deseada pasando el ID de la empresa como parámetro
    window.location.href = 'empresaSeleccionada.php?id_empresa=' + idEmpresa;
  }
</script>
 -->
