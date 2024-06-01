$(document).ready(function() {
    $('.btn-editar').click(function(e) {
        e.preventDefault();
        //console.log('Ver');
        var user_id = $(this).closest('tr').find('.user_id').text();
        //console.log(user_id);
        $.ajax({
            method: "POST",
            url: '../../../controlador/controlador-principal/controlador-modalEditarEmpresas.php',
            data: {
                'click_btn_editar': true,
                'user_id': user_id,
            },
            success: function(response) {
                //console.log(response);
                $('#sede_id').val(response[0]['id_sede']);
                $('#nombre_sede').val(response[0]['nombre_sede']);
                $('#lugar_sede').val(response[0]['lugar_sede']);
            
                $('#editar_info_empresa').modal('show');
            }
        });
    });
});