$(document).ready(function () {
  $(".btn-editar").click(function (e) {
    e.preventDefault();
    //console.log('Ver');
    var user_id = $(this).closest("tr").find(".user_id").text();
    //console.log(user_id);
    $.ajax({
      method: "POST",
      url: "../../../controlador/controlador-principal/controlador-modalEditar.php",
      data: {
        click_btn_editar: true,
        user_id: user_id,
      },
      success: function (response) {
        //console.log(response);
        $.each(response, function (key, value) {
          //console.log(value['nombrePostulante']);

          $("#user_id").val(value["id"]);

          $("#sede").val(value["sede"]);
          $("#cargo").val(value["cargoPostulante"]);
          $("#fecha-hoy").val(value["fecha"]);

          $("#nombres").val(value["nombrePostulante"]);
          $("#apellido-paterno").val(value["ApPaternoPostulante"]);
          $("#apellido-materno").val(value["ApMaternoPostulante"]);

          $("#dni").val(value["nroDni_Cedula"]);
          $("#nacionalidad").val(value["Nacionalidad"]);
          $("#fecha-nacimiento").val(value["fechaNacimiento"]);
          $("#estado_civil").val(value["EstadoCivil"]);
          $("#edad").val(value["Edad"]);

          $("#hijosSelect").val(value["nroHijos"]);

          $("#direccion").val(value["direccion"]);
          $("#distrito").val(value["distrito"]);
          $("#ciudad").val(value["ciudad"]);

          $("#celular").val(value["celular"]);
          $("#correo").val(value["correo"]);

          $("#estudios").val(value["estudios"]);
          $("#fuente_trabajo").val(value["fuente_trabajo"]);

          $("#positivos_1").val(value["cualidadPositiva_a"]);
          $("#positivos_2").val(value["cualidadPositiva_b"]);
          $("#negativos_1").val(value["cualidadNegativa_a"]);
          $("#negativos_2").val(value["cualidadNegativa_b"]);

          $("#empresa_experiencia").val(value["empresa_que_trabajo"]);
          $("#cargo_experiencia").val(value["cargo_que_trabajo"]);
          $("#fecha_cargo_desde").val(value["desde"]);
          $("#fecha_cargo_hasta").val(value["hasta"]);

          // Verificar si el valor de id_entrevistador es NULL
          if (value["id_entrevistador"] === null) {
            // Establecer la opción "No asignado" como seleccionada
            $("#entrevistador").val("NULL");
          } else {
            // Asignar el valor del id_entrevistador al select
            $("#entrevistador").val(value["id_entrevistador"]);
          }
        });
        $("#editar_info_postulante").modal("show");
      },
    });
  });
  
});
