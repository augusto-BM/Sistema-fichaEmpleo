<?php
@include '../../modelo/conexion.php';

if (isset($_POST['click_btn_ver'])) {
    $id = $_POST['user_id'];
    $sql = "SELECT * FROM fichaEmpleo WHERE id = '$id'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {

        while ($fila = mysqli_fetch_array($resultado)) {
            $id_entrevistador = $fila['id_entrevistador'] ?? 'No asignado';
?>

            <div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th>Sede:</th>
                                <th>Cargo cual postula:</th>
                                <th>Fecha:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input name="sede" id="sede" class="" value="<?php echo  $fila['sede'] ?>" readonly>

                                    </input>
                                </td>
                                <td>
                                    <input name="cargo" id="cargo" class="form-input" value="<?php echo  $fila['cargoPostulante'] ?>" readonly>

                                    </input>
                                </td>
                                <td>
                                    <input type="date" id="fecha-hoy" name="fecha_hoy" class="form-control" value="<?php echo  $fila['fecha'] ?>" readonly>

                                    </input>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table  table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th>Nombres</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" id="nombres" name="nombres" placeholder="Ingresa tu nombre" onkeypress="return soloLetras(event)" value="<?php echo  $fila['nombrePostulante'] ?>" readonly>

                                    </input>
                                </td>
                                <td>
                                    <input type="text" id="apellido-paterno" name="apellido_paterno" placeholder="Ingresa tu apellido paterno" onkeypress="return soloLetras(event)" value="<?php echo  $fila['ApPaternoPostulante'] ?>" readonly>

                                    </input>

                                </td>
                                <td>
                                    <input type="text" id="apellido-materno" name="apellido_materno" placeholder="Ingresa tu apellido materno" onkeypress="return soloLetras(event)" value="<?php echo  $fila['ApMaternoPostulante'] ?>" readonly>

                                    </input>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th>N°<br>DNI/CEDULA:</th>
                                <th>Nacionalidad:</th>
                                <th>Fecha de <br>Nacimiento:</th>
                                <th>Estado civil /<br>compromiso:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="dni" id="dni" placeholder="Ingresa tu DNI/Cédula" onkeypress="return soloNumeros(event)" value="<?php echo  $fila['nroDni_Cedula'] ?>" readonly>

                                    </input>
                                </td>
                                <td>
                                    <input name="nacionalidad" id="nacionalidad" value=" <?php echo  $fila['Nacionalidad'] ?>" readonly>

                                    </input>
                                </td>
                                <td>
                                    <input type="date" id="fecha-nacimiento" name="fecha_nacimiento" value="<?php echo  $fila['fechaNacimiento'] ?>" readonly>


                                    </input>
                                </td>
                                <td>
                                    <input name="estado_civil" id="estado_civil" value="<?php echo  $fila['EstadoCivil'] ?>" readonly>

                                    </input>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table  table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th>Celular:</th>
                                <th>Correo:</th>
                                <th>Edad:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input name="celular" id="celular" value="<?php echo  $fila['celular'] ?>" readonly></input>
                                </td>
                                <td>
                                    <input name="correo" id="correo" value="<?php echo  $fila['correo'] ?>" readonly></input>
                                </td>
                                <td>
                                    <input name="edad" id="edad" value="<?php echo  $fila['Edad'] ?>" readonly>

                                    </input>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th>Dirección exacta:</th>
                                <th>Distrito:</th>
                                <th>Ciudad:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" id="direccion" name="direccion" placeholder="Ingresa tu dirección" value="<?php echo $fila['direccion'] ?>" readonly></input>
                                </td>
                                <td>
                                    <input name="distrito" id="distrito" value="<?php echo $fila['distrito'] ?>" readonly>

                                    </input>
                                </td>
                                <td>
                                    <input type="text" id="ciudad" name="ciudad" placeholder="Ingresa tu ciudad" value="<?php echo $fila['ciudad'] ?>" readonly></input>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-info">
                                <th>¿Tienes hijos?:</th>
                                <th>¿Estas estudiando?:</th>
                                <th>Donde viste el trabajo?:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input name="hijos" id="hijosinput" value="<?php echo  $fila['nroHijos'] ?>" readonly>

                                </td>
                                <td>
                                    <input type="text" id="estudios" name="estudios" placeholder="Detalla que estas estudiando" value="<?php echo $fila['estudios'] ?>" readonly>
                                    </input>
                                </td>
                                <td>
                                    <input class="form-input" name="fuente_trabajo" id="fuente_trabajo" value="<?php echo $fila['fuente_trabajo'] ?>" readonly> </input>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="4" class="table-info">Indique ultima experiencia relevante a cargo</th>
                            </tr>
                            <tr>
                                <th>Nombre de la empresa:</th>
                                <th>Cargo:</th>
                                <th>Desde:</th>
                                <th>Hasta:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" id="ciudad" name="empresa" placeholder="Ingresa nombre de la empresa" readonly>

                                </td>
                                <td>
                                    <input type="text" id="ciudad" name="cargo" placeholder="Ingresa el cargo" readonly>

                                </td>
                                <td>
                                    <input class="fecha_cargo_desde" type="month" id="fecha_cargo_desde" name="fecha_cargo_desde" readonly>
                                </td>
                                <td>
                                    <input class="fecha_cargo_hasta" type="month" id="fecha_cargo_hasta" name="fecha_cargo_hasta" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr class="separador" />

                <div class="table-responsive">
                    <table class="table table-bordered caption-top">
                        <thead>
                            <caption>Describre 2 cualidades positivas y negativas que tienes</caption>
                            <tr class="table-info cualidades-title">
                                <th>POSITIVAS:</th>
                                <th>NEGATIVAS:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input class="cualidades" type="text" name="positivos_1" id="positivos_1" placeholder="1. " value="<?php echo $fila['cualidadPositiva_a'] ?>" readonly></input>

                                </td>
                                <td>
                                    <input class="cualidades" type="text" name="negativos_1" id="negativos_1" placeholder="1. " value="<?php echo $fila['cualidadNegativa_a'] ?>" readonly></input>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="cualidades" type="text" name="positivos_2" id="positivos_2" placeholder="2. " value="<?php echo $fila['cualidadPositiva_b'] ?>" readonly></input>
                                </td>
                                <td>
                                    <input class="cualidades" type="text" name="negativos_2" id="negativos_2" placeholder="2. " value="<?php echo $fila['cualidadNegativa_b'] ?>" readonly></input>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>

<?php


        }
    }
}
?>