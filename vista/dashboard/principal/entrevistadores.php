<?php
@include "../../../modelo/conexion.php";
session_start();
if (!isset($_SESSION['nombre_sesion'])) {
    header('location:../../../index.php');
}

?>
<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrevistadores</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./style.css">
</head>

<body class="bg-content">

    <main class="dashboard d-flex">

        <!-- MODAL PARA VER LA TABLA COMPLETA DE LOS ENTREVISTADORES DESACTIVOS -->
        <div class="modal fade" id="ver_info_entrevistadoresDesactivos" tabindex="-1" aria-labelledby="ver_info_entrevistadoresDesactivosLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content ">
                    <div class="modal-header d-flex justify-content-center">
                        <h1 class="modal-title fs-5" id="ver_info_entrevistadoresDesactivos">Entrevistadores Inactivos</h1>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close" onclick="location.reload()"></button>
                    </div>
                    <div class="modal-body">
                        <div class="ver_info_entrevistadoresDesactivos">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="location.reload()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL PARA VER LA INFORMACION COMPLETA DEL ENTREVISTADOR SELECCIONADO -->
        <div class="modal fade" id="ver_info_entrevistador" tabindex="-1" aria-labelledby="ver_info_entrevistadorLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title fs-5" id="ver_info_entrevistador">Informacion del Entrevistador</h5>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="user_id" name="id_postulante">
                        <div class="ver_info_entrevistador">

                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--  MODAL PARA EDITAR LA INFORMACION COMPLETA DEL ENTREVISTADOR  -->
        <div class="modal fade" id="editar_info_entrevistador" tabindex="-1" aria-labelledby="editar_info_entrevistadorLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center>
                            <h5 class=" modal-title" id="editar_info_entrevistadorLabel" >Editar Información del Entrevistador</h5>

                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="../../../controlador/controlador-principal/controlador-modalEditarEntrevistadores.php">
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                            <input type="hidden" id="entrevistador_id" name="id_entrevistador">
                            <div class="">
                            <div class="nombre-entrevistador" style="text-align:center; background-color:#CFE2FF; border: 1px solid #9ec5fe; margin-bottom: 5px;" ><label for="recipient-name" class="col-form-label">Nombre:</label></div>
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

        <!-- EMPIEZA sidebar -->
        <?php @include './php-principal/sidebar.php' ?>
        <!-- FINALIZA sidebar -->
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px">

            <!-- HEADER -->
            <header>
                <nav class="navbar container navbar-light bg-white position-sticky top-0">
                    <div class=""><i class="fal fa-caret-circle-down h5 d-none d-md-block menutoggle fa-rotate-90 icono-contraer"></i>
                        <i class="fas fa-bars h4  d-md-none"></i>
                    </div>
                </nav>
            </header>

            <!-- *********** ALERTA DE EXITO MENSAJE DE SESION *********-->
            <?php
            if (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] != "") {
            ?>
                <script>
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "<?php echo $_SESSION['mensaje']; ?>",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                </script>
            <?php
                unset($_SESSION['mensaje']);
            }
            ?>
            <!-- ************************************************** -->

            <!-- EMPEZAR TABLA DE DLISTA DE ENTREVISTADORES -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Lista de Entrevistadores</div>
                <div class="btn-add d-flex gap-3 align-items-center">

                    <!-- *** MODAL PARA CREAR ENTREVISTADORES ***-->
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
                                        <form method="POST" action="../../../controlador/controlador-principal/controlador-agregarEntrevistadores.php" enctype="multipart/form-data">
                                            <div class="">
                                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre_entrevistador" name="nombre_entrevistador">
                                            </div>
                                            <div class="">
                                                <label for="recipient-name" class="col-form-label">Apellido paterno:</label>
                                                <input type="text" class="form-control" id="apellido_paterno_entrevistador" name="apellido_paterno_entrevistador">
                                            </div>
                                            <div class="">
                                                <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
                                                <input type="text" class="form-control" id="apellido_materno_entrevistador" name="apellido_materno_entrevistador">
                                            </div>
                                            <div class="">
                                                <label for="recipient-name" class="col-form-label">Sede</label>
                                                <select name="sede" id="sede" class="form-control">
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
                    <!-- *************************************** -->
                    <div class="btn-postulantes-desactivos">
                        <a href="" class="btn-verDesactivo"><i class="fas fa-user-slash me-5 h4"></i></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <!-- Necesario Clase busqueda: tabla -->
                <table class="table student_list table-borderless tabla table-striped tabla w-100" id="myTable">
                    <thead class="table-dark ">
                        <style>
                            .centrado {
                                text-align: center !important;
                                vertical-align: middle !important;
                            }
                        </style>

                        <tr class="align-middle centrado"><!--  -->
                            <th style="display: none;">ID</th>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Sede</th>
                            <th> </th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../../modelo/conexion.php';
                        $sql = "SELECT * FROM entrevistador WHERE estado = 'activo'/* ORDER BY id_entrevistador DESC */";
                        $resultado = mysqli_query($conn, $sql);
                        if ($resultado && mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>


                                <tr class="bg-white align-middle">
                                    <td class="user_id" style="display: none;"><?php echo $fila['id_entrevistador']; ?></td>
                                    <td class=""><?php echo $fila['nombre_entrevistador']; ?></td>
                                    <td class=""><?php echo $fila['apellido_paterno_entrevistador']; ?></td>
                                    <td class=""><?php echo $fila['apellido_materno_entrevistador']; ?></td>
                                    <td class=""><?php echo $fila['sede']; ?></td>
                                    <td class="">
                                        <a href="" class=" btn-ver me-0"><i class="far fa-eye" style="color: #2E59EA;"></i></a>
                                        <a href="" class="btn-editar ms-0"><i class="far fa-pen" style="color: #EAD42E;"></i></a>
                                    </td>
                                    <td>
                                        <!-- <button style="width: 100px;" class="btn btn-success estadoBtn" onclick="cambiarEstado(this)" data-id="<?php echo $fila['id_entrevistador']; ?>">Activo</button> -->
                                        <button style="width: 100px;" class="btn <?php echo ($fila['estado'] == 'activo') ? 'btn-success' : 'btn-danger'; ?> estadoBtn" onclick="cambiarEstado(this)" data-id="<?php echo $fila['id_entrevistador']; ?>">
                                            <?php echo ($fila['estado'] == 'activo') ? 'Activo' : 'Inactivo'; ?>
                                        </button>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            // Si no hay resultados, imprimir una fila indicando que no hay datos
                            echo '<tr>';
                            echo '<td colspan="6">No hay datos disponibles</td>'; // Ajusta el colspan según el número de columnas en tu tabla
                            echo '</tr>';
                        }
                        mysqli_free_result($resultado);
                        mysqli_close($conn);

                        ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- end contentpage -->
    </main>
    <script src="./script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- DATA TABLES -->
    <!--     <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>-->

    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/b-1.7.1/b-html5-1.7.1/datatables.min.js"></script>

    <!-- JSZip (necesario para Buttons) -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <!-- DataTables Buttons extension -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <!-- jsPDF and pdfmake for PDF export -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/b-1.7.1/b-html5-1.7.1/datatables.min.css" />
    <!-- SCRIPT AJAX TABLA ENTREVISTADORES -->
    <script>
        const configurarDataTable = {
            //scrollX: "2000px", 
            dom: 'Blfrtip',
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
                [0, "desc"]
            ], // 0 es el índice de la columna del ID
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
                    targets: [1, 2, 3, 4, 5, 6]
                },
                {
                    width: "15px",
                    targets: [6],

                    width: "35px",
                    targets: [5]
                }
                //{searchable: false, targets: [1]}
            ],
            pageLength: 50,
            destroy: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Ningun entrevistador encontrado",
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
                [0, "desc"]
            ], // 0 es el índice de la columna del ID
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
                    targets: [1, 2, 3, 4, 5, 6]
                },
                {
                    width: "15px",
                    targets: [6],

                    width: "35px",
                    targets: [5]
                }
                //{searchable: false, targets: [1]}
            ],
            pageLength: 50,
            destroy: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Ningun entrevistador encontrado",
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
    </script>

    <!-- SCRIPT AJAX - ESTADO DEL BOTON Y DEL ENTREVISTADOR -->
    <script>
        function cambiarEstado(btn) {
            var nuevoEstado;
            if (btn.classList.contains("btn-success")) {
                btn.classList.remove("btn-success");
                btn.classList.add("btn-danger");
                btn.textContent = "Inactivo";
                nuevoEstado = "inactivo";
            } else {
                btn.classList.remove("btn-danger");
                btn.classList.add("btn-success");
                btn.textContent = "Activo";
                nuevoEstado = "activo";
            }

            // Envía una solicitud AJAX al servidor para actualizar el estado en la base de datos
            var id = btn.getAttribute("data-id"); // supongamos que el botón tiene un atributo data-id que almacena el ID correspondiente en la base de datos
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../../../controlador/controlador-principal/controlador-estadoEntrevistador.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText); // puedes mostrar alguna respuesta del servidor en la consola para depurar
                    // Si el nuevo estado es 'inactivo', elimina la fila de la tabla
                    if (nuevoEstado === 'inactivo') {
                        var table = $('#myTable').DataTable();
                        var row = $(btn).closest('tr');
                        table.row(row).remove().draw();
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Entrevistador ha sido desactivado",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    } else if (nuevoEstado === 'activo') {
                        var table1 = $('#myTable2').DataTable();
                        var row = $(btn).closest('tr');
                        table1.row(row).remove().draw();
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Entrevistador ha sido activado",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                }
            };
            xhr.send("id=" + id + "&estado=" + nuevoEstado);
        }
    </script>

    <!-- SCRIPT AJAX - VER INFORMACION ENTREVISATDOR SELECCIONADO-->
    <script>
        $(document).ready(function() {
            $('.btn-ver').click(function(e) {
                e.preventDefault();
                //console.log('Ver');

                var user_id = $(this).closest('tr').find('.user_id').text();
                //console.log(user_id);
                $.ajax({
                    method: "POST",
                    url: '../../../controlador/controlador-principal/controlador-modalVerEntrevistadores.php',
                    data: {
                        'click_btn_ver': true,
                        'user_id': user_id,
                    },
                    success: function(response) {
                        /* console.log(response); */
                        $('.ver_info_entrevistador').html(response);
                        $('#ver_info_entrevistador').modal('show');
                    }
                });
                // Se limpia los valores del modal ver cuando se cierra el modal
                $("#ver_info_entrevistador").on("hidden.bs.modal", function() {
                    $(this).find(".ver_info_entrevistador").empty();
                });
            });
        });
    </script>

    <!-- SCRIPT AJAX - EDITAR INFORMACION ENTREVISTADOR SELECCIONADO-->
    <script>
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
    </script>

    <!-- SCRIPT AJAX - VER INFORMACION DE TODOS LOS ENTREVISTADORES DESACTIVOS -->
    <script>
        $(document).ready(function() {
            $('.btn-verDesactivo').click(function(e) {
                e.preventDefault();
                //console.log('Ver');

                var user_id = $(this).closest('tr').find('.user_id').text();
                //console.log(user_id);
                $.ajax({
                    method: "POST",
                    url: '../../../controlador/controlador-principal/controlador-modalVerEntrevistadoresDesactivos.php',
                    data: {
                        'click_btn_verDesactivo': true,
                        'user_id': user_id,
                    },
                    success: function(response) {
                        console.log(response);
                        $('.ver_info_entrevistadoresDesactivos').html(response);
                        $('#ver_info_entrevistadoresDesactivos').modal('show');
                    }
                });
            });
        });
    </script>

</body>

</html>