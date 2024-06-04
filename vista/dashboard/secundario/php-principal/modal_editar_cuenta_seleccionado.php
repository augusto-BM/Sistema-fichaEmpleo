<div class="modal fade" id="editar_info_cuenta" tabindex="-1" aria-labelledby="editar_info_cuentaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center>
                            <h5 class=" modal-title" id="editar_info_empresaLabel">Editar Información de la Cuenta</h5>

                <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="../../../controlador/controlador-secundario/controlador-modalEditarCuentas.php">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $sql_cedes = "SELECT id_sede, nombre_sede FROM sede WHERE estado = 'activo' AND id_Sede > 2";
                            $result = $conn->query($sql_cedes);

                            $sql_roles = "SELECT id_rol, rol FROM rol";
                            $result_roles = $conn->query($sql_roles);

                            ?>
                            <input type="hidden" id="loginId" name="id_login">
                            <div class="">
                                <div class="nombre-usuario" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="sede" class="col-form-label">Usuario:</label></div>
                                <input type="text" class="form-control" style="margin-bottom: 5px;" id="usuario" name="usuario">
                            </div>
                            <div class="">
                                <div class="nombre-contraseña" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="lugar" class="col-form-label">Contraseña:</label></div>
                                <input type="text" class="form-control" style="margin-bottom: 5px;" id="contraseña" name="contraseña">
                            </div>
                            <div class="">
                                <div class="nombre-rol" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="lugar" class="col-form-label">Rol:</label></div>
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
                                <div class="nombre-sede" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="lugar" class="col-form-label">Sede:</label></div>
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
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="click_btn_editar_cambios">Guardar Cambios</button>
                </div>
            </form>

        </div>
    </div>
</div>