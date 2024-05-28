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
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                    <input type="hidden" id="entrevistador_id" name="id_entrevistador">
                                    <div class="nombre-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;" ><label for="nombres" class="col-form-label">Nombre:</label></div>
                                    <div class="input-nombreEnt" ;"><input style="margin-bottom: 5px" class="form-control" type="text" id="nombres" name="nombres" placeholder="Ingresa tu nombre" onkeypress="return soloLetras(event)" value="<?php echo $fila['nombre_entrevistador'] ?>" readonly>
                                    </div>
                                    </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="apelliPaterno-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;" ><label for="apellido-paterno" class="col-form-label">Apellido paterno:</label></div>
                                    <div class="input-apellPaternoEnt"><input style="margin-bottom: 5px"  class="form-control"  type="text" id="apellido-paterno" name="apellido_paterno" placeholder="Ingresa tu apellido paterno" onkeypress="return soloLetras(event)" value="<?php echo $fila['apellido_paterno_entrevistador'] ?>" readonly></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="apelliMaterno-entrevistador" style="text-align:center; background-color:#CFE2FF;border: 1px solid #9ec5fe;margin-bottom: 5px;" ><label for=" apellido-materno" class="col-form-label">Apellido Materno:</label></div>
                                    <div class="input-apellMaternoEnt"><input style="margin-bottom: 5px" class="form-control" type="text" id="apellido-materno" name="apellido_materno" placeholder="Ingresa tu apellido materno" onkeypress="return soloLetras(event)" value="<?php echo $fila['apellido_materno_entrevistador'] ?>" readonly></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="sede-entrevistador" style="text-align:center; background-color:#CFE2FF;border: 1px solid #9ec5fe ; margin-bottom: 5px;" ><label for=" sede" class="col-form-label">Sede:</label></div>
                                    <div class="input-sedeEnt"><input style="margin-bottom: 5px" class="form-control" type="text" name="sede" id="sede" value="<?php echo $fila['sede'] ?>" readonly></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

<?php

        }
    }
}
?>