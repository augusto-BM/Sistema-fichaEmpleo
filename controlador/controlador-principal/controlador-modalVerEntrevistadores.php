<?php
@include '../../modelo/conexion.php';

if (isset($_POST['click_btn_ver'])) {
    $id = $_POST['user_id'];
    $sql = "SELECT * FROM entrevistador WHERE id_entrevistador = '$id'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {

        while ($fila = mysqli_fetch_array($resultado)) {
?>
            <div>
                <div class="modal-body">
                    <input type="hidden" id="entrevistador_id" name="id_entrevistador">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingresa tu nombre" onkeypress="return soloLetras(event)" value="<?php echo  $fila['nombre_entrevistador'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido paterno:</label>
                        <input type="text" class="form-control" id="apellido-paterno" name="apellido_paterno" placeholder="Ingresa tu apellido paterno" onkeypress="return soloLetras(event)" value="<?php echo  $fila['apellido_paterno_entrevistador'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
                        <input type="text" class="form-control" id="apellido-materno" name="apellido_materno" placeholder="Ingresa tu apellido materno" onkeypress="return soloLetras(event)" value="<?php echo  $fila['apellido_materno_entrevistador'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sede</label>
                        <input type="text" class="form-control" name="sede" id="sede" value="<?php echo  $fila['sede'] ?>" readonly>
                    </div>
                </div>
            </div>


<?php


        }
    }
}
?>