$(document).ready(function() {
    $('.btn-editar').click(function(e) {
        e.preventDefault();
        //console.log('Ver');
        var user_id = $(this).closest('tr').find('.user_id').text();
        //console.log(user_id);
        $.ajax({
            method: "POST",
            url: '../../../controlador/controlador-secundario/controlador-modalEditarCuentas.php',
            data: {
                'click_btn_editar': true,
                'user_id': user_id,
            },
            success: function(response) {
                //console.log(response);
                $('#loginId').val(response[0]['id']);
                $('#usuario').val(response[0]['usuario']);
                $('#contraseña').val(response[0]['contraseña']);
                $('#rol').val(response[0]['id_rol']);
                $('#sede').val(response[0]['id_sede']);
            
                $('#editar_info_cuenta').modal('show');
            }
        });
    });
});