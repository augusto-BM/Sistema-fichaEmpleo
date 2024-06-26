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
    <title>Graficos - <?php echo $_SESSION['nombre_sede']; ?></title>
    <link rel="icon" href="../../login/icono.ico" type="image/x-icon">

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="./css-principal/modal_ver_y_editar.css"> <!-- Archivo CSS externo -->

    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./css-principal/graficos.css" />

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- LIBRERIA APACHE EACHARTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.0/echarts.min.js"></script>
    <!-- DIBUJAR LOS GRAFICOS -->
    <script src="./js-principal/graficos.js"></script>
    <!-- SOLICITUD AJAX DE LOS GRAFICOS EN PHP -->
    <script src="./js-principal/graficoAjax.js"></script>


</head>

<body class="bg-content">

    <!-- EMPIEZA sidebar -->
    <?php @include './php-principal/sidebar.php' ?>
    <!-- FINALIZA sidebar -->

    <main class="dashboard d-flex">
        <!-- EMPIEZA EL CONTENIDO PRINCIPAL -->
        <div class="container">
            <div class="principal-contenedor">
                <div class="student-list-header d-flex py-2">
                    <div class="title h6 fw-bold">Graficos - <?php echo $_SESSION['nombre_sede']; ?></div>
                </div>
            </div>

            <div class="graficos" style="margin: 20px;">
                <div class="row ">
                    <div class="col-sm-12 col-md-8">
                        <div class="text-center" id="graficoRedesSociales" style="width: 600px; height: 400px;"></div>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-sm-12 col-md-8">
                        <div class="text-center" id="graficoTotal" style="width: 600px; height: 400px;"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- TERMINA EL CONTENIDO PRINCIPAL  -->
    </main>
</body>

</html>