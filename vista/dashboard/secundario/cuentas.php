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
    <title>Usuarios - <?php echo $NOMBRE_SEDE_LOGUEADO; ?></title>
    <link rel="icon" href="../../login/icono.ico" type="image/x-icon">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./style.css">


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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

    <!-- SCRIPT AJAX TABLA CUENTAS -->
    <script src="./js-principal/tabla-cuentas.js"></script>

    <!-- SCRIPT AJAX - ESTADO DEL BOTON Y DE LA CUENTA -->
    <script src="./js-principal/estadoBotonCuentas.js"></script>

    <!-- SCRIPT AJAX - VER INFORMACION CUENTA SELECCIONADO-->
    <script src="./js-principal/verInformacionCuentaSeleccionado.js"></script>

    <!-- SCRIPT AJAX - EDITAR INFORMACION CUENTA SELECCIONADO-->
    <script src="./js-principal/editarInformacionCuentaSeleccionado.js"></script>

    <!-- SCRIPT AJAX - VER INFORMACION DE TODOS LAS CUENTAS DESACTIVOS -->
    <script src="./js-principal/verInformacionTablaModalCuentasNoSeleccionado.js"></script>


</head>

<body class="bg-content">
    <!-- EMPIEZA sidebar -->
    <?php @include './php-principal/sidebar.php' ?>
    <!-- FINALIZA sidebar -->
    <main class="dashboard d-flex">

        <!-- MODAL PARA VER LA TABLA COMPLETA DE LOS CUENTAS DESACTIVOS -->
        <?php @include './php-principal/modal_ver_cuentas_desactivos.php' ?>

        <!-- MODAL PARA VER LA INFORMACION COMPLETA DE LA CUENTA SELECCIONADO -->
        <?php @include './php-principal/modal_ver_cuenta_seleccionado.php' ?>

        <!--  MODAL PARA EDITAR LA INFORMACION COMPLETA DE LA CUENTA  -->
        <?php @include './php-principal/modal_editar_cuenta_seleccionado.php' ?>

        <!-- start content page -->
        <div class="container-fluid px">

            <!-- ***** MODAL DE ALERTA DE PROCESO EXITOSO USANDO SESSION Y SWEET ALERT2 ***** -->
            <?php @include './php-principal/modal_alerta_exitoso_conSession.php' ?>

            <!-- EMPEZAR TABLA DE DLISTA DE ENTREVISTADORES -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Lista de usuarios - <?php echo $_SESSION['nombre_sesion']; ?></div>

                <div class="btn-add d-flex gap-3 align-items-center">

                    <!-- *** MODAL PARA CREAR ENTREVISTADORES ***-->
                    <?php @include './php-principal/modal_crear_cuentas.php' ?>
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
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                            <th>Sede</th>
                            <th> </th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../../modelo/conexion.php';

                        //SENTENCIA PARA RECUPERAR EL ID DE LA SEDE 
                        $sql_id_sede = "SELECT id_sede FROM sede WHERE nombre_sede = '$NOMBRE_SEDE_LOGUEADO'";
                        $resultado_id_sede = mysqli_query($conn, $sql_id_sede);
                        if (mysqli_num_rows($resultado_id_sede) > 0) {
                            // Extraer el ID de la sede
                            $fila_id = mysqli_fetch_assoc($resultado_id_sede);
                            $solo_id_sede = $fila_id['id_sede'];
                            /* echo "El ID de la sede '$nombre_sede' es: $id_sede"; */
                        } else {
                            echo "No se encontró ninguna sede con el nombre '$NOMBRE_SEDE_LOGUEADO'";
                        }

                        $sql = "SELECT * FROM login WHERE estado = 'activo' AND id_sede = '$solo_id_sede'";

                        $sql_cedes = "SELECT id_sede, nombre_sede FROM sede WHERE estado = 'activo'";
                        $cedes = array();


                        $sql_roles = "SELECT id_rol, rol FROM rol";
                        $roles = array();

                        /* $result_roles = $conn->query($sql_roles); */

                        $resultado = mysqli_query($conn, $sql);

                        // Obtener los nombres de los cedes
                        $resultado_cedes = mysqli_query($conn, $sql_cedes);
                        if ($resultado_cedes && mysqli_num_rows($resultado_cedes) > 0) {
                            while ($fila_cede = mysqli_fetch_assoc($resultado_cedes)) {
                                $cedes[$fila_cede['id_sede']] = $fila_cede['nombre_sede'];
                            }
                        }

                        // Obtener los nombres de los roles
                        $resultado_roles = mysqli_query($conn, $sql_roles);
                        if ($resultado_roles && mysqli_num_rows($resultado_roles) > 0) {
                            while ($fila_rol = mysqli_fetch_assoc($resultado_roles)) {
                                $roles[$fila_rol['id_rol']] = $fila_rol['rol'];
                            }
                        }

                        if ($resultado && mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {

                                if (!is_null($fila['id_sede'])) {
                                    $idSede = $fila['id_sede'];
                                    if ($idSede == 2) {
                                        $nombreCede = "Administrador";
                                    } elseif ($idSede == 1) {
                                        $nombreCede = "Postulante";
                                    } else {
                                        if (isset($cedes[$idSede])) {
                                            $nombreCede = $cedes[$idSede];
                                        } else {
                                            $nombreCede = ""; // Si el ID de la sede no está definido en $cedes, asignamos una cadena vacía.
                                        }
                                    }
                                } else {
                                    $nombreCede = ""; // Si el ID de la sede es nulo, asignamos una cadena vacía.
                                }

                                if (!is_null($fila['id_rol']) && isset($roles[$fila['id_rol']])) {
                                    $nombreRol = $roles[$fila['id_rol']];
                                } else {
                                    $nombreRol = "No asignado";
                                }
                        ?>

                                <tr class="bg-white align-middle">
                                    <td class="user_id" style="display: none;"><?php echo $fila['id']; ?></td>
                                    <td class=""><?php echo $fila['usuario']; ?></td>
                                    <td class=""><?php echo $fila['contraseña']; ?></td>
                                    <td class=""><?php echo $nombreRol; ?></td>
                                    <td class=""><?php echo $nombreCede; ?></td>
                                    <td class="">
                                        <a href="" class=" btn-ver me-0"><i class="far fa-eye" style="color: #2E59EA;"></i></a>
                                        <a href="" class="btn-editar ms-0"><i class="far fa-pen" style="color: #EAD42E;"></i></a>
                                    </td>
                                    <td>
                                        <button style="width: 100px;" class="btn <?php echo ($fila['estado'] == 'activo') ? 'btn-success' : 'btn-danger'; ?> estadoBtn" onclick="cambiarEstado(this)" data-id="<?php echo $fila['id']; ?>">
                                            <?php echo ($fila['estado'] == 'activo') ? 'Activo' : 'Inactivo'; ?>
                                        </button>
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
        <!-- end contentpage -->
    </main>

</body>

</html>