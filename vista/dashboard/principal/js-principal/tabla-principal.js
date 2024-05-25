const configurarDataTble = {
    //scrollX: "2000px", 
    dom: 'Bfrtip',
    buttons: [{
        extend: 'excelHtml5',
        text: '<i class="fas fa-file-excel h4 text-success"></i>',
        className: 'excelButton',
        exportOptions: {
            modifier: {
                search: 'applied',
                order: 'applied'
            }
        },
        filename: function() {
            var d = new Date();
            var fecha = 'F(' + d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear().toString().substr(-2) + ')';
            var hora = 'T(' + d.getHours() + 'h ' + d.getMinutes() + 'm ' + d.getSeconds() + 's)';
            return 'Administrador Principal - ' + fecha + ' - ' + hora;
        }
    }, {
        extend: 'pdfHtml5',
        text: '<i class="fas fa-file-pdf h4 text-danger"></i>',
        className: 'pdfButton',
        exportOptions: {
            modifier: {
                search: 'applied',
                order: 'applied'
            }
        },
        filename: function() {
            var d = new Date();
            var fecha = 'F(' + d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear().toString().substr(-2) + ')';
            var hora = 'T(' + d.getHours() + 'h ' + d.getMinutes() + 'm ' + d.getSeconds() + 's)';
            return 'Administrador Principal - ' + fecha + ' - ' + hora;
        },

    }],
    "order": [
        [0, "desc"],
        [4, "desc"]
    ], // 0 es el índice de la columna del ID
    lengthMenu: [
        [3, 5, 10, 25, 50, -1],
        [3, 5, 10, 25, 50, "All"]
    ],
    columnDefs: [{
            className: "centrado",
            targets: [0, 1, 2, 3, 4, 5, 6, 7, 8]
        },
        {
            orderable: false,
            targets: [1, 2, 3, 5, 6, 7, 8]
        },
        {
            width: "15px",
            targets: [8],

            width: "35px",
            targets: [6]
        }
        //{searchable: false, targets: [1]}
    ],
    pageLength: 50,
    destroy: true,
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Ningun postulante encontrado",
        "infoFiltered": "(Filtrados desde _MAX_ registros totales)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar : ",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
};

//FUNCION SE EJECUTA CUANDO CARGA LA PAGINA MUESTRA LA TABLA LISTADA
$(document).ready(function() {
    var TablaPostulantes = $('#myTable').DataTable(configurarDataTble);

    // Función que se ejecuta para la búsqueda de información por fechas
    $("#fechaInicio, #fechaFin").change(function() {
        TablaPostulantes.draw();
    });

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var fechaInicio = new Date($('#fechaInicio').val());
            var fechaFin = new Date($('#fechaFin').val());

            // La fecha de la fila se encuentra en la quinta columna (índice 4)
            var fechaFila = new Date(data[4]);

            // Si no se especificó ninguna fecha de inicio o fin, mostrar todas las filas
            if (isNaN(fechaInicio.getTime()) && isNaN(fechaFin.getTime())) {
                return true;
            }
            // Si no se especificó ninguna fecha de inicio, mostrar las filas hasta la fecha de fin
            else if (isNaN(fechaInicio.getTime()) && fechaFila <= fechaFin) {
                return true;
            }
            // Si no se especificó ninguna fecha de fin, mostrar las filas desde la fecha de inicio
            else if (fechaInicio <= fechaFila && isNaN(fechaFin.getTime())) {
                return true;
            }
            // Si se especificaron ambas fechas, mostrar solo las filas en ese rango
            else if (fechaInicio <= fechaFila && fechaFila <= fechaFin) {
                return true;
            }
            // No mostrar las filas que no cumplen ninguna de las condiciones anteriores
            return false;
        }
    );

    $('#filtroFecha').change(function() {
        var hoy = new Date();
        var fechaInicio;
        var fechaFin = hoy;

        switch (this.value) {
            case 'hoy':
                fechaInicio = hoy;
                break;
            case 'semana':
                // Restar 6 días a la fecha actual para obtener el inicio de la semana
                fechaInicio = new Date();
                fechaInicio.setDate(hoy.getDate() - 6);
                break;
            case 'tresMeses':
                // Restar 3 meses a la fecha actual para obtener la fecha de inicio
                fechaInicio = new Date();
                fechaInicio.setMonth(hoy.getMonth() - 3);
                break;
            default:
                // Si no se seleccionó ninguna opción, borrar las fechas de inicio y fin
                fechaInicio = '';
                fechaFin = '';
                break;
        }
        // Actualizar los campos de entrada de fecha
        $('#fechaInicio').val(fechaInicio ? fechaInicio.toISOString().substring(0, 10) : '');
        $('#fechaFin').val(fechaFin ? fechaFin.toISOString().substring(0, 10) : '');

        // Redibujar la tabla
        TablaPostulantes.draw();
    });

});


//FUNCION QUE SE EJECUTA SOLO CUANDO ABRIMOS EL MODAL VER POSTULANTE DESACTIVOS
$('#ver_info_postulanteDesactivos').on('shown.bs.modal', function() {
    var table = $('#myTable').DataTable(configurarDataTble); // Obtén la instancia de DataTables
    table.draw(); // Fuerza un renderizado de la tabla
});