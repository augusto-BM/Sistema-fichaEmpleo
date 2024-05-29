<div class="cards row gap-3 justify-content-center mt-2">
  <?php @include '../../../controlador/controlador-principal/controlador-contarPostulantes.php' ?>

  <?php
  include '../../../modelo/conexion.php';
  $sql_empresas = "SELECT * FROM sede WHERE estado = 'activo' AND id_Sede > 2";

  $resultado_empresas = mysqli_query($conn, $sql_empresas);


 // Verificar si hay resultados
if(mysqli_num_rows($resultado_empresas) > 0) {
  ?>
  <div class="cards row gap-3 justify-content-center mt-2">
    <?php
    // Iterar sobre los resultados y mostrar cada empresa dinámicamente
    while($row_empresa = mysqli_fetch_assoc($resultado_empresas)) {
      ?>
      <div class="card__items position-relative col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card__students d-flex flex-column gap-2 mt-3">
          <span><?php echo $row_empresa['nombre_sede']; ?></span>
          <p class="pasaron">5 <i class="pasaron fas fa-user-check h3"></i></p>
          <p class="asistieron">Hoy:20</b> postulantes</p>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <?php
} else {
  // Si no hay empresas en la base de datos, mostrar un mensaje indicando que no hay datos
  echo "No hay empresas disponibles.";
}

  ?>
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
      <p class="asistieron">Hoy: <b> &nbsp;<?php /* echo  $row_jbg['total']  */?> </b> postulantes</p>
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