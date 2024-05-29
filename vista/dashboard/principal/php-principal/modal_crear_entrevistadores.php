<div class="button-add-student">
    <button type="button" class="btn btn-success me-5" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fas fa-user-plus" style='color:#fff;'></i> Registrar <i class="fa-solid fa-square-plus"></i></button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Entrevistador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="../../../controlador/controlador-principal/controlador-agregarEntrevistadores.php" enctype="multipart/form-data">
                                <div class="">
                                    <div class="nombre-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="recipient-name" class="col-form-label">Nombre:</label></div>
                                    <input type="text" class="form-control" id="nombre_entrevistador" name="nombre_entrevistador" style="margin-bottom: 5px;">
                                </div>
                                <div class="">
                                    <div class="nombre-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"> <label for="recipient-name" class="col-form-label">Apellido paterno:</label></div>
                                    <input type="text" class="form-control" id="apellido_paterno_entrevistador" name="apellido_paterno_entrevistador" style="margin-bottom: 5px;">
                                </div>
                                <div class="">
                                    <div class="nombre-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="recipient-name" class="col-form-label">Apellido Materno:</label></div>
                                    <input type="text" class="form-control" id="apellido_materno_entrevistador" name="apellido_materno_entrevistador" style="margin-bottom: 5px;">
                                </div>
                                <div class="">
                                    <div class="nombre-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;"><label for="recipient-name" class="col-form-label">Sede</label></div>
                                    <select name="sede" id="sede" class="form-select" style="margin-bottom: 5px;">
                                        <option value="Imfca Contacto">Imfca Contacto</option>
                                        <option value="JBG Operator">JBG Operator</option>
                                        <option value="BKN">BKN</option>
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