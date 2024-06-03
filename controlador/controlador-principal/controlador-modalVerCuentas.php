<?php
@include '../../modelo/conexion.php';

if (isset($_POST['click_btn_ver'])) {
    $id = $_POST['user_id'];
    $sql = "SELECT * FROM login WHERE id = '$id'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {

        while ($fila = mysqli_fetch_array($resultado)) {
?>
            <div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $sql_cedes = "SELECT id_sede, nombre_sede FROM sede WHERE estado = 'activo' AND id_Sede > 2";
                            $result = $conn->query($sql_cedes);

                            $sql_roles = "SELECT id_rol, rol FROM rol WHERE id_rol=2";
                            $result_roles = $conn->query($sql_roles);

                            ?>
                            <div class="">
                                <input type="hidden" id="login_id" name="id_login">
                                <div class="nombre-usuario" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="sede" class="col-form-label">Usuario:</label></div>
                                <div class="input-nombreEnt" ;"><input style="margin-bottom: 5px" class="form-control" type="text" id="usuario" name="usuario" placeholder="Ingresa el usuario" value="<?php echo $fila['usuario'] ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="nombre-contraseña" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="lugar" class="col-form-label">Contraseña:</label></div>
                                    <div class="input-contraseña"><input style="margin-bottom: 5px" class="form-control" type="text" id="contraseña" name="contraseña" placeholder="Ingresa el lugar" value="<?php echo $fila['contraseña'] ?>" readonly></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="nombre-rol" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="lugar" class="col-form-label">Rol:</label></div>
                                    <div class="input-rol"><input style="margin-bottom: 5px" class="form-control" type="text" id="rol" name="rol" placeholder="Ingresa el rol" value="<?php echo $fila['id_rol'] ?>" readonly></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="nombre-sede" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="lugar" class="col-form-label">Sede:</label></div>
                                    <div class="input-sede"><input style="margin-bottom: 5px" class="form-control" type="text" id="sede" name="sede" placeholder="Ingresa la sede" value="<?php echo $fila['id_sede'] ?>" readonly></div>
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