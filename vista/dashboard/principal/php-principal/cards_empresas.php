<div class="cards row gap-3 justify-content-center mt-2">

  <?php
  include '../../../modelo/conexion.php';
  $sql_empresas = "SELECT * FROM sede WHERE estado = 'activo' AND id_Sede > 2";

  $resultado_empresas = mysqli_query($conn, $sql_empresas);

  // Lista de colores predefinidos
  $colores = array('#af64f9', '#0081e3', '#5a23a2', '#00cc66', '#ff6666', '#9933ff', '#ffcc00', '#33ccff', '#00ff99');


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
        $color_fondo = $colores[$index_color]; // Asignar color estático a cada empresa

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

        <div class="card__items position-relative col-sm-12 col-md-6 col-lg-6 col-xl-6" style="background-color: <?php echo $color_fondo; ?>" onclick="redirectToEmpresa(<?php echo $id_empresa; ?>)">
          <div class="card__background"></div> <!-- Nuevo div para la imagen de fondo -->
          <div class="card__empresas d-flex flex-column gap-2 mt-3">
            <span><?php echo $row_empresa['nombre_sede']; ?></span>
            <p class="pasaron"><?php echo $total_seleccionados; ?> <i class="pasaron fas fa-user-check h3"></i></p>
            <p class="asistieron">Hoy: <?php echo $total_registros_empresas; ?></b> postulantes</p>
          </div>
        </div>
      <?php
      // Incrementamos el índice del color y lo ajustamos si excede el tamaño de la lista
      $index_color = ($index_color + 1) % count($colores);
      }
      ?>
    </div>
  <?php
  } else {
    echo "No hay empresas disponibles.";
  }

  ?>
</div>
<script>
  function redirectToEmpresa(idEmpresa) {
    // Redirigir a la página deseada pasando el ID de la empresa como parámetro
    window.location.href = 'prueba.php?id_empresa=' + idEmpresa;
  }
</script>

<!--  <div class=" card__items card__items--imfca position-relative col-sm-12 col-md-6 col-lg-6 col-xl-6" id="card-imfcaContacto">
    <div class="card__students d-flex flex-column gap-2 mt-3 ">
      <span>Imfca Contanto</span>
      <p class="pasaron"><?php /* echo  $row_imfca_seleccionados['total'] */ ?> <i class="pasaron fas fa-user-check h3"></i></p>
      <p class="asistieron">Hoy: <b> &nbsp;<?php /* echo  $row_imfca['total'] */ ?></b> postulantes</p>
    </div>

  </div>

  <div class=" card__items card__items--jbg position-relative col-sm-12 col-md-6 col-lg-6 col-xl-6" id="card-jbgOperator">
    <div class="card__Course d-flex flex-column gap-2 mt-3">
      <span>JBG Operator</span>
      <p class="pasaron"><?php /* echo  $row_jbg_seleccionados['total'] */ ?> <i class="pasaron fas fa-user-check h3"></i></p>
      <p class="asistieron">Hoy: <b> &nbsp;<?php /* echo  $row_jbg['total']  */ ?> </b> postulantes</p>
    </div>
  </div>

  <div class=" card__items card__items--bkn position-relative col-sm-12 col-md-6 col-lg-6 col-xl-6" id="card-bkn">
    <div class="card__payments d-flex flex-column gap-2 mt-3">
      <span>BKN</span>
      <p class="pasaron"><?php /* echo  $row_bkn_seleccionados['total'] */ ?> <i class="pasaron fas fa-user-check h3"></i></p>
      <p class="asistieron">Hoy: <b> &nbsp;<?php /* echo  $row_bkn['total'] */ ?> </b> postulantes</p>
    </div>
  </div>
</div> -->