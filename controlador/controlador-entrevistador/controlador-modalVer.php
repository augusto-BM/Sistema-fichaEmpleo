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
                
                <div class="table-responsive">
                    <table class="table  table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th>Nombres</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Sede:</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" id="nombres" name="nombres" placeholder="Ingresa tu nombre" onkeypress="return soloLetras(event)" value="<?php echo  $fila['nombre_entrevistador'] ?>" readonly>

                                    </input>
                                </td>
                                <td>
                                    <input type="text" id="apellido-paterno" name="apellido_paterno" placeholder="Ingresa tu apellido paterno" onkeypress="return soloLetras(event)" value="<?php echo  $fila['apellido_paterno_entrevistador'] ?>" readonly>

                                    </input>

                                </td>
                                <td>
                                    <input type="text" id="apellido-materno" name="apellido_materno" placeholder="Ingresa tu apellido materno" onkeypress="return soloLetras(event)" value="<?php echo  $fila['apellido_materno_entrevistador'] ?>" readonly>

                                    </input>

                                </td>
                                <td>
                                    <input name="sede" id="sede" class="" value="<?php echo  $fila['sede'] ?>" readonly>

                                    </input>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                </div>
                </form>

    <?php


        }
    }
}
    ?>