$(document).ready(function() {
    $('.btn-verDesactivo').click(function(e) {
        e.preventDefault();
        //console.log('Ver');

        var user_id = $(this).closest('tr').find('.user_id').text();
        //console.log(user_id);
        $.ajax({
            method: "POST",
            url: '../../../controlador/controlador-principal/controlador-modalVerDesactivos.php',
            data: {
                'click_btn_verDesactivo': true,
                'user_id': user_id,
            },
            success: function(response) {
                console.log(response);
                $('.ver_info_postulanteDesactivos').html(response);
                $('#ver_info_postulanteDesactivos').modal('show');
            }
        });
    });
});