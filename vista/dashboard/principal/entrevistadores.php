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



        <!-- MODAL PARA VER LA INFORMACION COMPLETA DEL ENTREVISTADOR -->
        <!--<div class="modal fade" id="ver_info_postulante" tabindex="-1" aria-labelledby="ver_info_postulanteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header d-flex justify-content-center">
                        <h1 class="modal-title fs-5" id="ver_info_postulante">Informacion del Postulante</h1>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" id="user_id" name="id_postulante">
                        <div class="ver_info_postulante">
                        
                        </div>
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-  MODAL PARA EDITAR LA INFORMACION COMPLETA DEL ENTREVISTADOR  -->
        <div class="modal fade" id="editar_info_entrevistador" tabindex="-1" aria-labelledby="editar_info_entrevistadorLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center >
                            <h5 class=" modal-title " id=" editar_info_entrevistadorLabel">Editar Información del Entrevistador</h5>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="../../../controlador/controlador-principal/controlador-modalEditarEntrevistadores.php">
                        <div class="modal-body">
                        <input type="hidden" id="user_id" name="id_postulante">
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
                            <select name="sede" id="sede" class="form-select">
                                <option value="Imfca Contacto">Imfca Contacto</option>
                                <option value="JBG Operator">JBG Operator</option>
                                <option value="BKN">BKN</option>
                            </select>
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
        <!-- start sidebar -->
        <div class="bg-sidebar vh-100 w-50 position-fixed">
            <div class="log d-flex justify-content-between">
                <h1 class="E-classe text-start ms-3 ps-1 mt-3 h6 fw-bold">Dashboard</h1>
                <i class="far fa-times h4 me-3 close align-self-end d-md-none"></i>
            </div>
            <div class="img-admin d-flex flex-column align-items-center text-center gap-2">
                <img class="rounded-circle" src="./imagen-admin/admin-logo.png" alt="img-admin" height="120" width="120">
                <h2 class="h6 fw-bold"><?php echo $_SESSION['nombre_sesion']; ?></h2>
                <span class="h7 admin-color">General</span>
            </div>
            <div class=" bg-list d-flex flex-column align-items-center fw-bold gap-2 mt-4 ">
                <ul class="d-flex flex-column list-unstyled sidebar-opciones">
                    <li class="h7"><a class="nav-link text-dark" href="./principal.php"><i class="fal fa-home-lg-alt me-2"></i> <span>Inicio</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="./entrevistadores.php"><i class="fal fa-bookmark me-2"></i> <span>Entrevistadores</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="./postulantes.php"><i class="far fa-graduation-cap me-2"></i> <span>Desactivos</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="payment_details.php"><i class="fal fa-usd-square me-2"></i> <span>Estadistica</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href=""><i class="fal fa-file-chart-line me-2"></i> <span>Graficos</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href=""><i class="fal fa-sliders-v-square me-2"></i> <span>Configuracion</span></a></li>
                </ul>
                <ul class="logout d-flex justify-content-start list-unstyled sidebar-cerrar-sesion">
                    <li class=" h7"><a class="nav-link" href="../../../vista/login/cerrar-sesion.php"><span>Cerrar Sesion</span><i class="fal fa-sign-out-alt ms-2"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px">

            <header>
                <nav class="navbar container-fluid navbar-light bg-white position-sticky top-0">
                    <div class=""><i class="fal fa-caret-circle-down h5 d-none d-md-block menutoggle fa-rotate-90 icono-contraer"></i>
                        <i class="fas fa-bars h4  d-md-none"></i>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <form class="d-flex align-items-center">
                            <input class="form-control me-2 light-table-filter" data-table="tabla" type="search" placeholder="Buscar..." aria-label="Search">
                            <i class="fal fa-search position-relative"></i>
                        </form>
                        <i class="fal fa-bell"></i>
                    </div>
                </nav>
            </header>

            <!-- <div class="cards row gap-3 justify-content-center mt-5">
                <div class=" card__items card__items--blue col-md-3 position-relative">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                        <i class="far fa-graduation-cap h3"></i>
                        <span>Students</span>
                    </div>
                    <div class="card__nbr-students">
                        <span class="h5 fw-bold nbr">13</span>
                    </div>
                </div>

                <div class=" card__items card__items--rose col-md-3 position-relative">
                    <div class="card__Course d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-bookmark h3"></i>
                        <span>Course</span>

                    </div>
                    <div class="card__nbr-course">
                        <span class="h5 fw-bold nbr">5</span>
                    </div>
                </div>

                <div class=" card__items card__items--yellow col-md-3 position-relative">
                    <div class="card__payments d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-usd-square h3"></i>
                        <span>Payments</span>

                    </div>
                    <div class="card__payments">
                        <span class="h5 fw-bold nbr">DHS 556,000</span>
                    </div>

                </div>

                <div class="card__items card__items--gradient col-md-3 position-relative">
                    <div class="card__users d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-user h3"></i>
                        <span>Users</span>
                        <i class="fal fa-usd-square h3"></i>
                        <span>Payments</span>
                    </div>
                    <span class="h5 fw-bold nbr">3</span>
                </div>
            </div> -->

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

            <!-- start student list table -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Lista de Entrevistadores</div>
                <div class="btn-add d-flex gap-3 align-items-center">

                    <!-- *** MODAL PARA CREAR ENTREVISTADORES ***-->
                    <div class="button-add-student">
                        <button type="button" class="btn btn-success me-5" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">➕ Registrar <i class="fa-solid fa-square-plus"></i></button>
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
                </div>
            </div>
            <div class="table-responsive">
                <!-- Necesario Clase busqueda: tabla -->
                <table class="table student_list table-borderless tabla">
                    <thead class="table-dark ">
                        <tr class="align-middle"><!--  -->
                            <th>ID</th>
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
                        $sql = "SELECT * FROM entrevistador ORDER BY id_entrevistador DESC";
                        $resultado = mysqli_query($conn, $sql);
                        if ($resultado && mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                        ?>


                                <tr class="bg-white align-middle">
                                    <td class="user_id"><?php echo $fila['id_entrevistador']; ?></td>
                                    <td class=""><?php echo $fila['nombre_entrevistador']; ?></td>
                                    <td class=""><?php echo $fila['apellido_paterno_entrevistador']; ?></td>
                                    <td class=""><?php echo $fila['apellido_materno_entrevistador']; ?></td>
                                    <td class=""><?php echo $fila['sede']; ?></td>
                                    <td class="d-md-flex gap-3 mt-3">
                                        <a href="" class=" btn-ver"><i class="far fa-eye" style="color: #2E59EA;"></i></a>
                                        <a href="" class="btn-editar"><i class="far fa-pen" style="color: #EAD42E;"></i></a>

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




        <!-- <footer class="footer">
            <div class="container-fluid">
                <div class="row text-body-secondary">
                    <div class="col-6 text-start ">
                        <a class="text-body-secondary" href=" #">
                            <strong>Administrador - General</strong>
                        </a>
                    </div>
                    <div class="col-6 text-end text-body-secondary d-none d-md-block">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="text-body-secondary" href="#">Contactanos</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body-secondary" href="#">Sobre Nosotros</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-body-secondary" href="#">Terminos y condiciones</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer> -->
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="./script.js"></script>

    <script src="../busqueda.js"></script>

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
                }
            };
            xhr.send("id=" + id + "&estado=" + nuevoEstado);
        }
    </script>


    <!-- SCRIPT AJAX - VER INFORMACION -->
         <script>
        $(document).ready(function() {
            $('.btn-ver').click(function(e) {
                e.preventDefault();
                //console.log('Ver');

                var user_id = $(this).closest('tr').find('.user_id').text();
                //console.log(user_id);
                $.ajax({
                    method: "POST",
                    url: '../../../controlador/controlador-principal/controlador-modalVer.php',
                    data: {
                        'click_btn_ver': true,
                        'user_id': user_id,
                    },
                    success: function(response) {
                        console.log(response);
                        $('.ver_info_postulante').html(response);
                        $('#ver_info_postulante').modal('show');
                    }
                });
            });
        });
    </script>

    <!-- SCRIPT AJAX - EDITAR INFORMACION -->
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

                            $('#user_id').val(value['id_entrevistador']);
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


</body>

</html>