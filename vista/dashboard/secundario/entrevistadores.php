<?php
@include "../../../modelo/conexion.php";
session_start();
if (!isset($_SESSION['nombre_sesion'])) {
    header('location:../../../index.php');
}
$NOMBRE_SEDE_LOGUEADO = $_SESSION['nombre_sesion'];

?>
<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrevistadores</title>
    <link rel="icon" href="../../login/icono.ico" type="image/x-icon">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./style.css">


    <script src="./script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

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
    <script src="./js-principal/tabla-entrevistadores.js"></script>

    <!-- SCRIPT AJAX - ESTADO DEL BOTON Y DEL ENTREVISTADOR -->
    <script src="./js-principal/estadoBotonEntrevistadores.js"></script>

    <!-- SCRIPT AJAX - VER INFORMACION ENTREVISATDOR SELECCIONADO-->
    <script src="./js-principal/verInformacionEntrevistadorSeleccionado.js"></script>

    <!-- SCRIPT AJAX - EDITAR INFORMACION ENTREVISTADOR SELECCIONADO-->
    <script src="./js-principal/editarInformacionEntrevistadorSeleccionado.js"></script>

    <!-- SCRIPT AJAX - VER INFORMACION DE TODOS LOS ENTREVISTADORES DESACTIVOS -->
    <script src="./js-principal/verInformacionTablaModalEntrevistadoresNoSeleccionado.js"></script>


</head>

<body class="bg-content">

    <main class="dashboard d-flex">

        <!-- MODAL PARA VER LA TABLA COMPLETA DE LOS ENTREVISTADORES DESACTIVOS -->
        <?php @include './php-principal/modal_ver_entrevistadores_desactivos.php' ?>


        <!-- MODAL PARA VER LA INFORMACION COMPLETA DEL ENTREVISTADOR SELECCIONADO -->
        <?php @include './php-principal/modal_ver_entrevistador_seleccionado.php' ?>

        <!--  MODAL PARA EDITAR LA INFORMACION COMPLETA DEL ENTREVISTADOR  -->
        <?php @include './php-principal/modal_editar_entrevistador_seleccionado.php' ?>


        <!-- EMPIEZA sidebar -->
        <?php @include './php-principal/sidebar.php' ?>
        <!-- FINALIZA sidebar -->

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

            <!-- ***** MODAL DE ALERTA DE PROCESO EXITOSO USANDO SESSION Y SWEET ALERT2 ***** -->
            <?php @include './php-principal/modal_alerta_exitoso_conSession.php' ?>

            <!-- EMPEZAR TABLA DE DLISTA DE ENTREVISTADORES -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Lista de Entrevistadores</div>

                <div class="btn-add d-flex gap-3 align-items-center">

                    <!-- *** MODAL PARA CREAR ENTREVISTADORES ***-->
                    <?php @include './php-principal/modal_crear_entrevistadores.php' ?>
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
                        $sql = "SELECT * FROM entrevistador WHERE estado = 'activo' AND sede = '$NOMBRE_SEDE_LOGUEADO' /* ORDER BY id_entrevistador DESC */";
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

</body>

</html>