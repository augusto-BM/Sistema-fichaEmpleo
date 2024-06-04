<div class="button-add-student">
    <button type="button" class="btn btn-success me-5" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fas fa-user-plus" style='color:#fff;'></i> Registrar <i class="fa-solid fa-square-plus"></i></button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo usuario</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <?php
                        $sql_cedes = "SELECT id_sede, nombre_sede FROM sede WHERE estado = 'activo' AND nombre_sede = '$NOMBRE_SEDE_LOGUEADO'";
                        $result = $conn->query($sql_cedes);

                        $sql_roles = "SELECT id_rol, rol FROM rol WHERE id_rol=2";
                        $result_roles = $conn->query($sql_roles);

                        ?>
                        <div class="card-body">
                            <form method="POST" action="../../../controlador/controlador-principal/controlador-agregarCuentas.php" enctype="multipart/form-data">
                                <div class="">
                                    <div class="nombre-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="recipient-name" class="col-form-label">Usuario:</label></div>
                                    <input type="text" class="form-control" id="usuario" name="usuario" style="margin-bottom: 5px;">
                                </div>
                                <div class="">
                                    <div class="nombre-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"> <label for="recipient-name" class="col-form-label">Contraseña:</label></div>
                                    <input type="text" class="form-control" id="contraseña" name="contraseña" style="margin-bottom: 5px;">
                                </div>
                                <div class="">
                                    <div class="nombre-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="recipient-name" class="col-form-label">Rol:</label></div>
                                    <select name="rol" id="rol" class="form-select" style="margin-bottom: 5px;">
                                        <?php
                                        // Verificar si se encontraron resultados
                                        if ($result_roles->num_rows > 0) {
                                            while ($row = $result_roles->fetch_assoc()) {
                                                echo "<option value='" . $row['id_rol'] . "'>" . $row['rol'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No hay roles</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="">
                                    <div class="nombre-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="recipient-name" class="col-form-label">Sede</label></div>
                                    <select name="sede" id="sede" class="form-select" style="margin-bottom: 5px;">
                                        <?php
                                        // Verificar si se encontraron resultados
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id_sede'] . "'>" . $row['nombre_sede'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No hay sedes activas</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="submit" class="btn btn-success">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>