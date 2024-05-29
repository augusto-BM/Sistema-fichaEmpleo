<div class="modal fade" id="editar_info_entrevistador" tabindex="-1" aria-labelledby="editar_info_entrevistadorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center>
                            <h5 class=" modal-title" id="editar_info_entrevistadorLabel">Editar Información del Entrevistador</h5>

                <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="../../../controlador/controlador-principal/controlador-modalEditarEntrevistadores.php">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" id="entrevistador_id" name="id_entrevistador">
                            <div class="">
                                <div class="nombre-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px; "><label for="recipient-name" class="col-form-label">Nombre:</label></div>
                                <input type="text" class="form-control" style="margin-bottom: 5px;" id="nombre_entrevistador" name="nombre_entrevistador">
                            </div>
                            <div class="">
                                <div class="apelliPaterno-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="recipient-name" class="col-form-label">Apellido paterno:</label></div>
                                <input type="text" class="form-control" style="margin-bottom: 5px;" id="apellido_paterno_entrevistador" name="apellido_paterno_entrevistador">
                            </div>
                            <div class="">
                                <div class="apelliMaterno-entrevistador" style="text-align:center; background-color:#CFE2FF;border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="recipient-name" class="col-form-label">Apellido Materno:</label></div>
                                <input type="text" class="form-control" style="margin-bottom: 5px;" id="apellido_materno_entrevistador" name="apellido_materno_entrevistador">
                            </div>

                            <div class="">
                                <div class="sede-entrevistador" style="text-align:center; background-color:#CFE2FF;border: 1px solid #9ec5fe"><label for="recipient-name" class="col-form-label">Sede</label></div>
                                <select style="margin-bottom: 5px;" name="sede" id="sede" class="form-select">
                                    <option value="Imfca Contacto">Imfca Contacto</option>
                                    <option value="JBG Operator">JBG Operator</option>
                                    <option value="BKN">BKN</option>
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