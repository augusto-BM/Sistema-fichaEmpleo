<div class="table-responsive col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <!-- Necesario Clase busqueda: tabla -->
  <table class="table student_list table-borderless table-striped tabla" id="mytablaDesacivos">
    <thead class="table-dark ">
      <style>
        .centrado {
          text-align: center !important;
          vertical-align: middle !important;
        }
      </style>
      <tr class="align-middle"><!--  -->
        <th class="centrado">ID</th>
        <th class="centrado">Nombre</th>
        <th class="centrado">Cargo</th>
        <th class="centrado">Fecha</th>
        <th class="centrado">Proceso</th>
        <th class="centrado">Entrevistador</th>
        <th> </th>
        <th class="centrado">Estado</th>
      </tr>
    </thead>
    <tbody>
      <?php
      @include '../../modelo/conexion.php';
      $sql = "SELECT * FROM fichaempleo WHERE proceso = 'No seleccionado'";
      $sql_entrevistadores = "SELECT id_entrevistador, nombre_entrevistador FROM entrevistador";

      $resultado = mysqli_query($conn, $sql);
      $entrevistadores = array();

      // Obtener los nombres de los entrevistadores
      $resultado_entrevistadores = mysqli_query($conn, $sql_entrevistadores);
      if ($resultado_entrevistadores && mysqli_num_rows($resultado_entrevistadores) > 0) {
        while ($fila_entrevistador = mysqli_fetch_assoc($resultado_entrevistadores)) {
          $entrevistadores[$fila_entrevistador['id_entrevistador']] = $fila_entrevistador['nombre_entrevistador'];
        }
      }

      if (isset($_POST['click_btn_verDesactivo'])) {

        if ($resultado && mysqli_num_rows($resultado) > 0) {
          while ($fila = mysqli_fetch_assoc($resultado)) {
            if (!is_null($fila['id_entrevistador']) && isset($entrevistadores[$fila['id_entrevistador']])) {
              $entrevistador = $entrevistadores[$fila['id_entrevistador']];
            } else {
              $entrevistador = "No asignado";
            }
      ?>
            <tr class="bg-white align-middle">
              <td class="user_id"><?php echo $fila['id']; ?></td>
              <td class=""><?php echo $fila['nombrePostulante']; ?></td>
              <td class=""><?php echo $fila['cargoPostulante']; ?></td>
              <td class=""><?php echo $fila['fecha']; ?></td>
              <td class=""><?php echo $fila['proceso']; ?></td>
              <td class=""><?php echo $entrevistador; ?></td>
              <td class="">

              </td>
              <td>
                <?php
                echo "<a onclick='activarDesdeModal(this)' data-id='" . $fila['id'] . "'><i class='fas fa-check' style='color: #44c426'></i></a>";
                ?>
              </td>
            </tr>
        <?php
          }
        }
        ?>
    </tbody>
  </table>
</div>
<?php
      }
?>