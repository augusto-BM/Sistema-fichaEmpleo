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
    <title>Adminitrador Principal</title>
    <link rel="icon" href="../../login/icono.ico" type="image/x-icon">

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="./css-principal/modal_ver_y_editar.css"> <!-- Archivo CSS externo -->

    <link rel="stylesheet" href="./style.css">


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


    <!-- SCRIPT AJAX LIBRERIA DATATABLES - TABLA PRINCIPAL-->
    <script src="./js-principal/tabla-principal.js"></script>
    <!-- -------------------------- -->

    <!-- SCRIPT AJAX - ESTADO DEL BOTON Y DEL POSTULANTE -->
    <script src="./js-principal/estadoBontonTablaPrincipal.js"></script>
    <!-- ----------------------------------------------------------- -->

    <!-- SCRIPT AJAX - ESTADO DEL BOTON Y DEL POSTULANTE DESDE MODAL NO SELECCIONADOS-->
    <script src="./js-principal/estadoBontonModalTablaNoSeleccionados.js"></script>
    <!-- ----------------------------------------------------------- -->

    <!-- SCRIPT AJAX - VER INFORMACION DE UN POSTULANTE SELECCIONADO -->
    <script src="./js-principal/verInformacionPostulanteSeleccionadol.js"></script>
    <!-- ----------------------------------------------------------- -->

    <!-- SCRIPT AJAX - EDITAR INFORMACION DE UN POSTULANTE SELECCIONADO -->
    <script src="./js-principal/editarInformacionTablaPrincipal.js"></script>
    <!-- -------------------------------------------------------------- -->

    <!-- SCRIPT AJAX - VER INFORMACION DE TODOS LOS POSTULANTES NO SELECCIONADOS -->
    <script src="./js-principal/verInformacionTablaModalNoSeleccionados.js"></script>
    <!-- ------------------------------------------------------------------ -->



</head>

<body class="bg-content">

    <main class="dashboard d-flex">

        <!-- ------- MODAL PARA VER LISTADO DE LA TABLA DE POSTULANTES DESACTIVOS --------->
        <?php @include './php-principal/modal_ver_postulantes_inactivos.php' ?>
        <!-- ---------------------------------------------------------------------- -->

        <!-- ------- MODAL PARA VER LA INFORMACION COMPLETA DEL POSTULANTE SELECCIONADO -->
        <?php @include './php-principal/modal_ver_postulante_seleccionado.php' ?>
        <!-- -------------------------------------------------------------------------- -->

        <!-- ------ MODAL PARA EDITAR LA INFORMACION COMPLETA DEL POSTULANTE SELECCIONADO  ----->
        <?php @include './php-principal/modal_editar_postulante_seleccionado.php' ?>
        <!-- -------------------------------------------------------------------------- -->

        <!-- EMPIEZA sidebar -->
        <?php @include './php-principal/sidebar.php' ?>
        <!-- FINALIZA sidebar -->

        <!-- EMPIEZA EL CONTENIDO PRINCIPAL -->
        <div class="container">

            <!-- HEADER -->
            <header>
                <nav class="navbar container navbar-light bg-white position-sticky top-0">
                    <div class=""><i class="fal fa-caret-circle-down h5 d-none d-md-block menutoggle fa-rotate-90 icono-contraer"></i>
                        <i class="fas fa-bars h4  d-md-none hamburguesa"></i>
                    </div>
                </nav>
            </header>

            <!-- --------- CARDS DE LAS INFO DE LAS EMPRESAS -------->
            <?php @include './php-principal/cards_empresas.php' ?>
            <!--  ------------------------------------------------ -->
            <div class="principal-contenedor">
                <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                    <div class="title h6 fw-bold">Dashboard - <?php echo $_SESSION['nombre_sede']; ?></div>
                    <div class="btn-postulantes-desactivos">
                        <a href="" class="btn-verDesactivo"><i class="fas fa-user-slash me-5 h4"></i></a>
                    </div>
                </div>

                <!-- ***** MODAL DE ALERTA DE PROCESO EXITOSO USANDO SESSION Y SWEET ALERT2 ***** -->
                <?php @include './php-principal/modal_alerta_exitoso_conSession.php' ?>
                <!-- ************************************************************************** -->

                <!-- BUSQUEDA POR RANGO DE FECHAS -->
                <div class="alert alert-primary col-12 filtradoFecha" role="alert">
                    <div class="fecha_col">
                        <label for="filtroFecha">Selecciona filtro:</label>
                        <select id="filtroFecha">
                            <option value="">Ninguno</option>
                            <option value="hoy">Hoy</option>
                            <option value="semana">Esta semana</option>
                            <option value="tresMeses">Últimos 3 meses</option>
                        </select>
                    </div>
                    <div class="fecha_col">
                        <label for="fechaInicio">Desde:</label>
                        <input type="date" id="fechaInicio">
                    </div>
                    <div class="fecha_col">
                        <label for="fechaFin">Hasta:</label>
                        <input type="date" id="fechaFin">
                    </div>
                </div>
                <!-- ------------------------- -->

                <div class="table-responsive col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <!-- Necesario Clase busqueda: tabla -->
                    <table class="table student_list table-borderless table-striped tabla w-100" id="myTable">
                        <thead class="table-dark">
                            <style>.centrado { text-align: center !important; vertical-align: middle !important;}</style>
                            
                            <tr class="align-middle"><!--  -->
                                <th class="centrado" style="display: none;">ID</th>
                                <th class="centrado">Nombre</th>
                                <th class="centrado">Dni</th>
                                <th class="centrado">Cargo</th>
                                <th class="centrado">Fecha</th>
                                <th class="centrado">Proceso</th>
                                <th class="centrado">Entrevistador</th>
                                <th> </th>
                                <th class="centrado">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../../../modelo/conexion.php';
                            $sql = "SELECT * FROM fichaempleo WHERE proceso = 'Seleccionado' OR proceso = 'Postulante'/* ORDER BY fecha DESC, id DESC */";
                            
                            $sql_entrevistadores = "SELECT id_entrevistador, nombre_entrevistador FROM entrevistador";

                            $resultado = mysqli_query($conn, $sql);
                            $entrevistadores = array();

                            // Obtener los nombres de los entrevistadores
                            $resultado_entrevistadores = mysqli_query($conn, $sql_entrevistadores);
                            if ($resultado_entrevistadores && mysqli_num_rows($resultado_entrevistadores) > 0) {
                                while ($fila_entrevistador = mysqli_fetch_assoc($resultado_entrevistadores)) {
                                    $entrevistadores[$fila_entrevistador['id_entrevistador']] = $fila_entrevistador['nombre_entrevistador'];
                                }
                            }

                            if ($resultado && mysqli_num_rows($resultado) > 0) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {

                                    if (!is_null($fila['id_entrevistador']) && isset($entrevistadores[$fila['id_entrevistador']])) {
                                        $entrevistador = $entrevistadores[$fila['id_entrevistador']];
                                    } else {
                                        $entrevistador = "No asignado";
                                    }
                            ?>
                                    <tr class="bg-white align-middle">
                                        <td class="user_id" style="display: none;"><?php echo $fila['id']; ?></td>
                                        <td class=""><?php echo $fila['nombrePostulante']; ?></td>
                                        <td class=""><?php echo $fila['nroDni_Cedula']; ?></td>
                                        <td class=""><?php echo $fila['cargoPostulante']; ?></td>
                                        <td class=""><?php echo $fila['fecha']; ?></td>
                                        <td class=""><?php echo $fila['proceso']; ?></td>
                                        <td class=""><?php echo $entrevistador; ?></td>
                                        <td class="">
                                            <a href="" class=" btn-ver me-0"><i class="far fa-eye" style="color: #2E59EA;"></i></a>
                                            <a href="" class="btn-editar ms-0"><i class="far fa-pen" style="color: #EAD42E;"></i></a>
                                        </td>
                                        <td>
                                            <?php
                                            echo "<a class='me-1'onclick='activar(this)' data-id='" . $fila['id'] . "'><i class='fas fa-check' style='color: #44c426'></i></a>";
                                            echo "<a class='ms-1'onclick='desactivar(this)' data-id='" . $fila['id'] . "'><i class='fas fa-times' style='color: #ff2a2a'></i></a>";
                                            ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            mysqli_free_result($resultado);
                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- TERMINA EL CONTENIDO PRINCIPAL  -->
    </main>
</body>

</html>