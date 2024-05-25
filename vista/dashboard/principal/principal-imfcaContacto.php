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
    <title>Adminitrador Principal - Imfca Contacto</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- 
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css"> -->

    <link rel="stylesheet" href="./style.css">
</head>

<body class="bg-content">

    <main class="dashboard d-flex">

        <!-- ------- MODAL PARA VER LA INFORMACION DE POSTULANTES DESACTIVOS --------->
        <div class="modal fade" id="ver_info_postulanteDesactivos" tabindex="-1" aria-labelledby="ver_info_postulanteDesactivosLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content ">
                    <div class="modal-header d-flex justify-content-center">
                        <h1 class="modal-title fs-5" id="ver_info_postulanteDesactivos">Postulantes Inactivos</h1>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close" onclick="location.reload()"></button>
                    </div>
                    <div class="modal-body">
                        <div class="ver_info_postulanteDesactivos">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="location.reload()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ---------------------------------------------------------------------- -->

        <!-- ------- MODAL PARA VER LA INFORMACION COMPLETA DEL POSTULANTE SELECCIONADO -->
        <div class="modal fade" id="ver_info_postulante" tabindex="-1" aria-labelledby="ver_info_postulanteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header d-flex justify-content-center">
                        <a href="#" class="btn btn-success" onclick="imprimirFicha()"><i class="fas fa-print"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <h1 class="modal-title fs-5" id="ver_info_postulante">Informacion del Postulante</h1>

                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="ver_info_postulante">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------------------------------------------------------- -->

        <!-- ------ MODAL PARA EDITAR LA INFORMACION COMPLETA DEL POSTULANTE SELECCIONADO  ----->
        <div class="modal fade" id="editar_info_postulante" tabindex="-1" aria-labelledby="editar_info_postulanteLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl"> <!-- modal-xl para un modal más grande -->
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center"">
                                    <h5 class=" modal-title " id=" editar_info_postulanteLabel">Editar Información del Postulante</h5>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form class="contenedor-formulario" action="../../../controlador/controlador-principal/controlador-modalEditar.php" method="POST" class="formulario" id="editarForm">
                        <div class="modal-body">
                            <input type="hidden" id="user_id" name="id_postulante">
                            <!-- ID entrevistador:-->

                            <div class="row mb-3">
                                <div class="opciones col-md-6">
                                    <label for="entrevistador" class="form-label">Entrevistador</label>
                                    <select name="entrevistador" id="entrevistador" class="form-select">
                                        <!-- <option value="NULL">No asignado</option> -->
                                        <?php
                                        // Consulta para obtener los datos de los entrevistadores
                                        $sql_entrevistadores = "SELECT id_entrevistador, nombre_entrevistador 
                                        FROM entrevistador WHERE estado = 'activo'";

                                        $resultado_entrevistadores = mysqli_query($conn, $sql_entrevistadores);
                                        if ($resultado_entrevistadores && mysqli_num_rows($resultado_entrevistadores) > 0) {
                                            while ($fila_entrevistador = mysqli_fetch_assoc($resultado_entrevistadores)) {
                                        ?>
                                                <option value="<?php echo $fila_entrevistador['id_entrevistador']; ?>"><?php echo $fila_entrevistador['nombre_entrevistador']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="opciones col-md-4 ">
                                    <label for="sede" class="form-label">Sede:</label>
                                    <select name="sede" id="sede" class="form-select">
                                        <option value="Imfca Contacto">Imfca Contacto</option>
                                        <option value="JBG Operator">JBG Operator</option>
                                        <option value="BKN">BKN</option>

                                    </select>
                                </div>
                                <div class="opciones col-md-4 ">
                                    <label for="cargo" class="form-label">Cargo al cual postula</label>
                                    <select name="cargo" id="cargo" class="form-select">
                                        <option value="Asesor">Asesor</option>
                                        <option value="Backoffice">Backoffice</option>
                                        <option value="Mantenimiento">Mantenimiento</option>
                                        <option value="Recursos">Recursos</option>
                                        <option value="Soporte">Soporte</option>
                                    </select>
                                </div>
                                <div class="opciones col-md-4">
                                    <label for="fecha-hoy" class="form-label">Fecha:</label>
                                    <input type="date" id="fecha-hoy" name="fecha_hoy" class="form-control" value="">
                                </div>
                            </div>
                            <hr class="separador" />

                            <!-- DATOS PERSONALES => NOMBRES Y APELLIDOS -->
                            <div class="row primera-seccion">
                                <div class="opciones col-md-4 ">
                                    <label for="nombres" class="form-label">Nombres:</label>
                                    <input type="text" id="nombres" name="nombres" placeholder="Ingresa tu nombre" class="form-control" value="">
                                </div>
                                <div class="opciones col-md-4">
                                    <label for="apellido-paterno" class="form-label">Apellido Paterno:</label>
                                    <input type="text" id="apellido-paterno" name="apellido_paterno" placeholder="Ingresa tu apellido paterno" class="form-control" value="">
                                </div>
                                <div class="opciones col-md-4">
                                    <label for="apellido-materno" class="form-label">Apellido Materno:</label>
                                    <input type="text" id="apellido-materno" name="apellido_materno" placeholder="Ingresa tu apellido materno" class="form-control" value="">
                                </div>

                            </div>
                            <hr class="separador" />

                            <!-- DATOS PERSONALES => DNI,NACIONALIDAD,FECHA NAC, ESTADO CIVIL Y EDAD -->
                            <div class="row segunda-seccion">
                                <div class="opciones col-md-3">
                                    <label for="dni">Nº DNI/Cédula: </label>
                                    <br>
                                    <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingresa tu DNI/Cédula" value="">
                                </div>
                                <div class="opciones col-md-2">
                                    <label for="nacionalidad">Nacionalidad:</label>
                                    <select class="form-select" name="nacionalidad" id="nacionalidad">
                                        <option value="CHL">Chile</option>
                                        <option value="COL">Colombia</option>
                                        <option value="ECU">Ecuador</option>
                                        <option value="ECU">España</option>
                                        <option value="MEX">México</option>
                                        <option value="PRY">Paraguay</option>
                                        <option value="PER" selected>Perú</option>
                                        <option value="URY">Uruguay</option>
                                        <option value="VEN">Venezuela</option>
                                        <option value="ARG">Argentina</option>
                                        <option value="BOL">Bolivia</option>
                                    </select>
                                </div>

                                <div class="opciones col-md-3">
                                    <label for="fecha-nacimiento">Fecha de nacimiento:</label>
                                    <input type="date" class="form-control" id="fecha-nacimiento" name="fecha_nacimiento">
                                </div>

                                <div class="opciones col-md-2">
                                    <label for="estado-civil">Estado Civil / Compromiso:</label>
                                    <select class="form-select" name="estado_civil" id="estado_civil">
                                        <option value="Soltero(a)">Soltero(a)</option>
                                        <option value="Casado(a)">Casado(a)</option>
                                        <option value="Viudo(a)">Viudo(a)</option>
                                        <option value="Divorciado(a)">Divorciado(a)</option>
                                    </select>
                                </div>

                                <div class="opciones col-md-2">
                                    <label for="edad">Edad:</label>
                                    <select class="form-select" name="edad" id="edad">
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>

                            </div>
                            <hr class="separador" />

                            <h4 class="titulo-tercera-seccion">¿Tienes hijos? ¿Cuántos?:</h4>
                            <div class="row tercera-seccion">
                                <div class="opciones col-md-12 form-check">
                                    <select class="form-select" name="hijos" id="hijosSelect">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="separador" />

                            <!-- DATOS PERSONALES => DIRECCION,DISTRITO,CIUDAD-->
                            <div class="row cuarta-seccion">
                                <div class="opciones col-md-6">
                                    <label for="direccion">Dirección exacta:</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa tu dirección">
                                </div>
                                <div class="opciones col-md-2">
                                    <label for="distrito">Distrito:</label>
                                    <select class="form-control" name="distrito" id="distrito">
                                        <option value="Lima">Lima</option>
                                        <option value="Ancón">Ancón</option>
                                        <option value="Ate">Ate</option>
                                        <option value="Barranco">Barranco</option>
                                        <option value="Breña">Breña</option>
                                        <option value="Carabayllo">Carabayllo</option>
                                        <option value="Chaclacayo">Chaclacayo</option>
                                        <option value="Chorrillos">Chorrillos</option>
                                        <option value="Cieneguilla">Cieneguilla</option>
                                        <option value="Comas">Comas</option>
                                        <option value="El Agustino">El Agustino</option>
                                        <option value="Independencia">Independencia</option>
                                        <option value="Jesús María">Jesús María</option>
                                        <option value="La Molina">La Molina</option>
                                        <option value="La Victoria">La Victoria</option>
                                        <option value="Lince">Lince</option>
                                        <option value="Los Olivos">Los Olivos</option>
                                        <option value="Lurigancho">Lurigancho</option>
                                        <option value="Lurín">Lurín</option>
                                        <option value="Magdalena del Mar">Magdalena del Mar</option>
                                        <option value="Miraflores">Miraflores</option>
                                        <option value="Pachacámac">Pachacámac</option>
                                        <option value="Pucusana">Pucusana</option>
                                        <option value="Pueblo Libre">Pueblo Libre</option>
                                        <option value="Puente Piedra">Puente Piedra</option>
                                        <option value="Punta Hermosa">Punta Hermosa</option>
                                        <option value="Punta Negra">Punta Negra</option>
                                        <option value="Rímac">Rímac</option>
                                        <option value="San Bartolo">San Bartolo</option>
                                        <option value="San Borja">San Borja</option>
                                        <option value="San Isidro">San Isidro</option>
                                        <option value="San Juan de Lurigancho">San Juan de Lurigancho</option>
                                        <option value="San Juan de Miraflores">San Juan de Miraflores</option>
                                        <option value="San Luis">San Luis</option>
                                        <option value="San Martín de Porres">San Martín de Porres</option>
                                        <option value="San Miguel">San Miguel</option>
                                        <option value="Santa Anita">Santa Anita</option>
                                        <option value="Santa María del Mar">Santa María del Mar</option>
                                        <option value="Santa Rosa">Santa Rosa</option>
                                        <option value="Santiago de Surco">Santiago de Surco</option>
                                        <option value="Surquillo">Surquillo</option>
                                        <option value="Villa El Salvador">Villa El Salvador</option>
                                        <option value="Villa María del Triunfo">Villa María del Triunfo</option>
                                    </select>

                                </div>
                                <div class="opciones col-md-4">
                                    <label for="ciudad">Ciudad:</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa tu ciudad">
                                </div>
                            </div>
                            <hr class="separador" />

                            <!-- DATOS PERSONALES => CELULAR Y CORREO ELECTRONICO -->
                            <div class="row quinta-seccion">
                                <div class="opciones col-md-6">
                                    <label for="celular">Celular:</label>
                                    <input type="text" class="form-control" id="celular" name="celular" placeholder="Ingresa tu número de celular">
                                </div>
                                <div class="opciones col-md-6">
                                    <label for="correo">Correo:</label>
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo electrónico">
                                </div>

                            </div>
                            <hr class="separador" />

                            <h4 class="titulo-sexta-seccion">¿Estás estudiando? ¿Qué estudias?:</h4>
                            <div class="row sexta-seccion">
                                <div class="col-md-12 form-check opciones">
                                    <input type="text" class="form-control" id="estudios" name="estudios" placeholder="Detalla que estas estudiando">
                                </div>
                            </div>
                            <hr class="separador" />

                            <h4 class="titulo-sexta-seccion">¿Dónde viste la oferta de trabajo?</h4>
                            <div class="row sexta-seccion">
                                <div class="col-md-12 form-check opciones">
                                    <!-- <input type="text" id="fuente_trabajo" value="fuente_trabajo"> -->
                                    <select class="form-select" name="fuente_trabajo" id="fuente_trabajo">
                                        <option value="bumeran">Bumeran</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="tiktok">Tik Tok</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="otros">Otros</option>
                                    </select>
                                </div>

                            </div>
                            <hr class="separador" />

                            <h4 class="titulo-septima-seccion">Describe 2 cualidades positivas y negativas que tienes</h4>
                            <div class="row septima-seccion">
                                <div class="opciones col-md-6 ">
                                    <div class="form-group">
                                        <label for="nombres">POSITIVOS</label>
                                        <input type="text" class="form-control mb-3" name="positivos_1" id="positivos_1" placeholder="1. ">
                                        <input type="text" class="form-control mb-3" name="positivos_2" id="positivos_2" placeholder="2. ">
                                    </div>
                                </div>
                                <div class="opciones col-md-6">
                                    <div class="form-group">
                                        <label for="apellido-paterno">NEGATIVOS</label>
                                        <input type="text" class="form-control mb-3" name="negativos_1" id="negativos_1" placeholder="1. ">
                                        <input type="text" class="form-control mb-3" name="negativos_2" id="negativos_2" placeholder="2. ">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" name="click_btn_editar_cambios">Guardar Cambios</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- -------------------------------------------------------------------------------- -->

        <!-- EMPIEZA sidebar -->
        <div class="bg-sidebar vh-100 w-50 position-fixed">
            <div class="log d-flex justify-content-between">
                <h1 class="E-classe text-start ms-3 ps-1 mt-3 h6 fw-bold">Dashboard</h1>
                <i class="far fa-times h4 me-3 close align-self-end d-md-none"></i>
            </div>
            <div class="img-admin d-flex flex-column align-items-center text-center gap-2">
                <img class="rounded-circle" src="./imagen-principal/admin-logo.png" alt="img-admin" height="120" width="120">
                <h2 class="h6 fw-bold"><?php echo $_SESSION['nombre_sesion']; ?></h2>
                <span class="h7 admin-color">General</span>
            </div>
            <div class=" bg-list d-flex flex-column align-items-center fw-bold gap-2 mt-4 ">
                <ul class="d-flex flex-column list-unstyled sidebar-opciones">
                    <li class="h7"><a class="nav-link text-dark" href="./principal.php"><i class="fal fa-home-lg-alt me-2"></i> <span>Inicio</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="./Entrevistadores.php"><i class="fal fa-bookmark me-2"></i> <span>Entrevistadores</span></a></li>
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
        <!-- FINALIZA sidebar -->

        <!-- EMPIEZA EL CONTENIDO PRINCIPAL -->
        <div class="container">

            <!-- HEADER -->
            <header>
                <nav class="navbar container navbar-light bg-white position-sticky top-0">
                    <div class=""><i class="fal fa-caret-circle-down h5 d-none d-md-block menutoggle fa-rotate-90 icono-contraer"></i>
                        <i class="fas fa-bars h4  d-md-none"></i>
                    </div>
                    <!-- <div class="d-flex align-items-center gap-4">
                            <form class="d-flex align-items-center">
                                <input class="form-control me-2 light-table-filter" data-table="tabla" type="search" placeholder="Buscar..." aria-label="Search">
                                <i class="fal fa-search position-relative"></i>
                            </form>
                        </div> -->
                </nav>
            </header>

            <!--CARDS DE LAS INFO DE LAS EMPRESAS -->
            <div class="cards row gap-3 justify-content-center mt-2">
                <div class=" card__items card__items--imfca position-relative col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card__students d-flex flex-column gap-2 mt-3 ">
                        <span>Imfca Contanto</span>
                        <!-- <i class="far fa-user h3"></i> -->
                        <p class="pasaron">5 <i class="pasaron fas fa-user-check h3"></i></p>
                        <p class="asistieron">Hoy: <b> &nbsp;10</b> postulantes</p>

                        <!--<i class="far fa-user total"><b> 100 total</b></i>-->
                    </div>
                    <!--<div class="card__nbr-students"><span class="h5 fw-bold nbr">120</span></div> -->
                </div>

            </div>

            <div class="principal-contenedor">
                <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                    <div class="title h6 fw-bold">Dashboard <?php echo $_SESSION['nombre_sede']; ?> - Imfca Contacto</div>
                    <div class="btn-postulantes-desactivos">
                        <a href="" class="btn-verDesactivo"><i class="fas fa-user-slash me-5 h4"></i></a>
                    </div>
                </div>

                <!-- *********** MODAL DE ALERTA DE PROCESO EXITOSO USANDO SESSION Y SWEET ALERT2 ************************ -->
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
                <!-- ***************************************************************************************************** -->

                <!-- BUSQUEDA POR RANGO DE FECHAS -->
                <div class="alert alert-primary col-12 filtradoFecha" role="alert">
                    <label for="filtroFecha">Selecciona filtro:</label>
                    <select id="filtroFecha">
                        <option value="">Ninguno</option>
                        <option value="hoy">Hoy</option>
                        <option value="semana">Esta semana</option>
                        <option value="tresMeses">Últimos 3 meses</option>
                    </select>
                    <label for="fechaInicio">Desde:</label>
                    <input type="date" id="fechaInicio">
                    <label for="fechaFin">Hasta:</label>
                    <input type="date" id="fechaFin">
                </div>
                <!-- ------------------------- -->

                <div class="table-responsive col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <!-- Necesario Clase busqueda: tabla -->
                    <table class="table student_list table-borderless table-striped tabla w-100" id="myTable">
                        <thead class="table-dark">
                            <style>
                                .centrado {
                                    text-align: center !important;
                                    vertical-align: middle !important;
                                }
                            </style>
                            <tr class="align-middle"><!--  -->
                                <th class="centrado">ID</th>
                                <th class="centrado">Nombre</th>
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
                            $sql = "SELECT * FROM fichaEmpleo WHERE sede = 'Imfca Contacto' AND (proceso = 'Seleccionado' OR proceso = 'Postulante')   /* ORDER BY fecha DESC, id DESC */";
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
                                        <td class="user_id"><?php echo $fila['id']; ?></td>
                                        <td class=""><?php echo $fila['nombrePostulante']; ?></td>
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
                            } else {
                                // Si no hay resultados, imprimir una fila indicando que no hay datos
                                /* echo '<tr>';
                                    echo '<td colspan="7">No hay datos disponibles</td>'; // Ajusta el colspan según el número de columnas en tu tabla
                                    echo '</tr>'; */
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

    <script src="./script.js"></script>
    <script>
        function imprimirFicha() {
            // Redireccionar a la página que contiene la ficha de empleo
            window.location.href = "./php-principal/imprimirFicha.php";
        }
    </script>

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
    <script src="./js-principal/verInformacionTablaPrincipal.js"></script>
    <!-- ----------------------------------------------------------- -->

    <!-- SCRIPT AJAX - EDITAR INFORMACION DE UN POSTULANTE SELECCIONADO -->
    <script src="./js-principal/editarInformacionTablaPrincipal.js"></script>
    <!-- -------------------------------------------------------------- -->

    <!-- SCRIPT AJAX - VER INFORMACION DE TODOS LOS POSTULANTES DESACTIVOS -->
    <script src="./js-principal/verInformacionTablaModalNoSeleccionados.js"></script>
    <!-- ------------------------------------------------------------------ -->
</body>

</html>