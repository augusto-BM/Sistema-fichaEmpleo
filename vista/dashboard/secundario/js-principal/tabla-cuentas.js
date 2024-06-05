const configurarDataTable = {
    //scrollX: "2000px", 
    dom: 'Blfrtip',
    buttons: [{
        extend: 'excelHtml5',
        text: '<i class="fas fa-file-excel h4 text-success"></i>',
        titleAttr:'Exportar a Excel',
        className: 'excelButton',
        exportOptions: {
            columns:[1,2,3,4],
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
        titleAttr:'Exportar a Pdf',
        className: 'pdfButton',
        exportOptions: {
            columns:[1,2,3,4],
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
        [4, "asc"]
    ], 
    lengthMenu: [
        [3, 5, 10, 25, 50, -1],
        [3, 5, 10, 25, 50, "All"]
    ],
    columnDefs: [{
            className: "centrado",
            targets: [0, 1, 2, 3, 4, 5, 6]
        },
        {
            orderable: false,
            targets: [1,2, 3, 5,6]
        },
        /* {
            width: "15px",
            targets: [6],

            width: "35px",
            targets: [5]
        } */
        //{searchable: false, targets: [1]}
    ],
    pageLength: 50,
    destroy: true,
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Ninguna cuenta encontrada",
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
    var TablaPostulantes = $('#myTable').DataTable(configurarDataTable);
});

const configurarDataTableDesactivo = {
    //scrollX: "2000px", 
    dom: 'Blfrtip',
    buttons: [{
        extend: 'excelHtml5',
        text: '<i class="fas fa-file-excel h4 text-success"></i>',
        titleAttr:'Exportar a Excel',
        className: 'excelButton',
        exportOptions: {
            columns:[1,2,3,4],
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
        titleAttr:'Exportar a Pdf',
        className: 'pdfButton',
        exportOptions: {
            columns:[1,2,3,4],
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
        [4, "asc"]

    ],
    lengthMenu: [
        [3, 5, 10, 25, 50, -1],
        [3, 5, 10, 25, 50, "All"]
    ],
    columnDefs: [{
            className: "centrado",
            targets: [0, 1, 2, 3, 4, 5, 6]
        },
        {
            orderable: false,
            targets: [1,2, 3, 5,6]
        },
        /* {
            width: "15px",
            targets: [6],

            width: "35px",
            targets: [5]
        } */
        //{searchable: false, targets: [1]}
    ],
    pageLength: 50,
    destroy: true,
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Ninguna cuenta encontrada",
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
//FUNCION QUE SE EJECUTA SOLO CUANDO ABRIMOS EL MODAL VER POSTULANTE DESACTIVOS
$('#ver_info_entrevistadoresDesactivos').on('shown.bs.modal', function() {
    var table = $('#myTable2').DataTable(configurarDataTableDesactivo);
    // Fuerza un renderizado de la tabla para que se ajuste al contenedor
    table.draw();
});