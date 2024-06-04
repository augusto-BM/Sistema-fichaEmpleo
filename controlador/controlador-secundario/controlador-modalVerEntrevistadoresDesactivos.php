<?php
  @include "../../modelo/conexion.php";
  session_start();

    $NOMBRE_EMPRESA = $_SESSION['nombre_sesion']; 
?>
<div class="table-responsive col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <!-- Necesario Clase busqueda: tabla -->
  <table class="table student_list table-borderless tabla table-striped tabla w-100" id="myTable2">
    <thead class="table-dark ">
    <style>.centrado { text-align: center !important; vertical-align: middle !important;}</style>
      <tr class="align-middle centrado">
        <th style="display: none;">ID</th>
        <th>Nombre</th>
        <th>Apellido paterno</th>
        <th>Apellido materno</th>
        <th>Sede</th>
        <th style="display: none;"> </th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include '../../modelo/conexion.php';
      $sql = "SELECT * FROM entrevistador WHERE sede = '$NOMBRE_EMPRESA'AND estado='inactivo'";
      $resultado = mysqli_query($conn, $sql);
      if ($resultado && mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
      ?>
          <tr class="bg-white align-middle">
            <td class="user_id" style="display: none;"><?php echo $fila['id_entrevistador']; ?></td>
            <td class=""><?php echo $fila['nombre_entrevistador']; ?></td>
            <td class=""><?php echo $fila['apellido_paterno_entrevistador']; ?></td>
            <td class=""><?php echo $fila['apellido_materno_entrevistador']; ?></td>
            <td class=""><?php echo $fila['sede']; ?></td>
            <td style="display: none;">
              <a href="" class=" btn-ver me-0"><i class="far fa-eye" style="color: #2E59EA;"></i></a>
              <a href="" class="btn-editar ms-0"><i class="far fa-pen" style="color: #EAD42E;"></i></a>
            </td>
            <td>
              <button style="width: 100px;" class="btn <?php echo ($fila['estado'] == 'activo') ? 'btn-success' : 'btn-danger'; ?> estadoBtn" onclick="cambiarEstado(this)" data-id="<?php echo $fila['id_entrevistador']; ?>">
                <?php echo ($fila['estado'] == 'activo') ? 'Activo' : 'Inactivo'; ?>
              </button>
            </td>
          </tr>
      <?php
        }
      } else {
        // Si no hay resultados, imprimir una fila indicando que no hay datos
        echo '<tr>';
        echo '<td colspan="6">No hay datos disponibles</td>'; // Ajusta el colspan según el número de columnas en tu tabla
        echo '</tr>';
    }
      ?>

    </tbody>
  </table>
</div>
