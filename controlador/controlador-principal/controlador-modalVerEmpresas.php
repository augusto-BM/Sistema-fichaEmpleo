<?php
@include '../../modelo/conexion.php';

if (isset($_POST['click_btn_ver'])) {
    $id = $_POST['user_id'];
    $sql = "SELECT * FROM sede WHERE id_sede = '$id'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {

        while ($fila = mysqli_fetch_array($resultado)) {
?>
            <div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                    <input type="hidden" id="sede_id" name="id_sede">
                                    <div class="nombre-empresa" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;" ><label for="sede" class="col-form-label">Empresa:</label></div>
                                    <div class="input-nombreEnt" ;"><input style="margin-bottom: 5px" class="form-control" type="text" id="sede" name="sede" placeholder="Ingresa la sede" value="<?php echo $fila['nombre_sede'] ?>" readonly>
                                    </div>
                                    </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="nombre-lugar" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;" ><label for="lugar" class="col-form-label">Lugar:</label></div>
                                    <div class="input-lugar"><input style="margin-bottom: 5px"  class="form-control"  type="text" id="lugar" name="lugar" placeholder="Ingresa el lugar" value="<?php echo $fila['lugar_sede'] ?>" readonly></div>
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