<div class="modal fade" id="editar_info_empresa" tabindex="-1" aria-labelledby="editar_info_empresaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center>
                            <h5 class=" modal-title" id="editar_info_empresaLabel">Editar Información de la Empresa</h5>

                <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="../../../controlador/controlador-secundario/controlador-modalEditarEmpresas.php">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" id="sede_id" name="id_sede">
                            <div class="">
                                <div class="nombre-cede" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px; "><label for="recipient-name" class="col-form-label">Empresa:</label></div>
                                <input type="text" class="form-control" style="margin-bottom: 5px;" id="nombre_sede" name="nombre_sede" oninput="soloLetras(this)" onkeyup="validarEmpresa(this);">
                            </div>
                            <div class="">
                                <div class="nombre-lugar" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="recipient-name" class="col-form-label">Lugar:</label></div>
                                <input type="text" class="form-control" style="margin-bottom: 5px;" id="lugar_sede" name="lugar_sede" oninput="soloLetras(this)">
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