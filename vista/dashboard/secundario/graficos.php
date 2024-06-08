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
    <title>Graficos - <?php echo $NOMBRE_SEDE_LOGUEADO; ?></title>
    <link rel="icon" href="../../login/icono.ico" type="image/x-icon">

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="./css-principal/modal_ver_y_editar.css"> <!-- Archivo CSS externo -->

    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./css-principal/graficos.css" />


    <script src="./script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


</head>

<body class="bg-content">

    <main class="dashboard d-flex">


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
            <!--  ------------------------------------------------ -->
            <div class="principal-contenedor">
                <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                    <div class="title h6 fw-bold">Graficos - <?php echo $_SESSION['nombre_sesion']; ?></div>
                </div>
            </div>

            <div class="graficos" style="margin: 20px;">
                <div class="row my-1">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="mx-auto" id="chart3" style="width: 600px; height: 400px;"></div>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="mx-auto" id="chart4" style="width: 600px; height: 400px;"></div>
                    </div>
                </div>

                <!-- <div class="row my-4">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div id="chart1" class="chart"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div id="chart2" class="chart"></div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div id="chart3" class="chart"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div id="chart4" class="chart"></div>
                    </div>
                </div> -->
            </div>

        </div>
        <!-- TERMINA EL CONTENIDO PRINCIPAL  -->
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.0/echarts.min.js"></script>
    <!-- JavaScript -->
    <script src="./js-principal/graficos.js"></script>

    <script>
        // Función para obtener datos mediante AJAX
        function fetchDataRedesSociales() {
            $.ajax({
                url: '../../../controlador/controlador-secundario/controlador-graficoRedes.php',
                type: 'GET',
                success: function(response) {
                    // Parsear la respuesta JSON
                    var data = JSON.parse(response);

                    // Actualizar gráfico con los nuevos datos
                    updateRedesSociales(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error al obtener datos:', error);
                }
            });
        }
        function fetchDataTotal() {
            $.ajax({
                url: '../../../controlador/controlador-secundario/controlador-graficoTotal.php',
                type: 'GET',
                success: function(response) {
                    // Parsear la respuesta JSON
                    var data = JSON.parse(response);

                    // Actualizar gráfico con los nuevos datos
                    updateTotal(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error al obtener datos:', error);
                }
            });
        }


        // Llamar a la función fetchData al cargar la página para obtener datos inicialmente
        window.addEventListener("load", () => {
            fetchDataRedesSociales();
            fetchDataTotal();
            // Opcional: configurar intervalo para actualizar datos periódicamente
            // setInterval(fetchData, 30000); // por ejemplo, para actualizar cada 30 segundos
        });
    </script>

</body>

</html>