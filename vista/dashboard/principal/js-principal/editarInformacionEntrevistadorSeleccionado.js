$(document).ready(function() {
    $('.btn-editar').click(function(e) {
        e.preventDefault();
        //console.log('Ver');
        var user_id = $(this).closest('tr').find('.user_id').text();
        //console.log(user_id);
        $.ajax({
            method: "POST",
            url: '../../../controlador/controlador-principal/controlador-modalEditarEntrevistadores.php',
            data: {
                'click_btn_editar': true,
                'user_id': user_id,
            },
            success: function(response) {
                //console.log(response);
                $.each(response, function(key, value) {
                    //console.log(value['nombrePostulante']);

                    $('#entrevistador_id').val(value['id_entrevistador']);
                    $('#nombre_entrevistador').val(value['nombre_entrevistador']);
                    $('#apellido_paterno_entrevistador').val(value['apellido_paterno_entrevistador']);
                    $('#apellido_materno_entrevistador').val(value['apellido_materno_entrevistador']);
                    $('#sede').val(value['sede']);
                });
                $('#editar_info_entrevistador').modal('show');
            }
        });
    });
});