<div class="menu">
    <ion-icon name="menu-outline"></ion-icon>
    <ion-icon name="close-outline"></ion-icon>
</div>
<div class="barra-lateral">
    <div class="general">
        <h1 class="E-classe text-center ms-auto me-auto  h5 mb-4"><b>DASHBOARD</b></h1>

        <div class="">
            <span><?php echo $_SESSION['nombre_sesion']; ?></span>
        </div>
        <h1 class="E-classe text-center ms-auto me-auto h6 nombre-lugar mb-4 "><b>GENERAL</b></h1>
        <img class="rounded-circle" src="./imagen-principal/admin-logo.png" alt="img-admin" height="120" width="120">
    </div>
    <div class="linea"></div>

    <nav class="navegacion">
        <ul>
            <li>
                <a href="principal.php">
                    <i class="fas fa-home-lg-alt me-2"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <li>
                <a href="entrevistadores.php">
                    <i class="fas fa-user-tie me-2"></i>
                    <span>Entrevistadores</span>
                </a>
            </li>
            <li>
                <a href="cuentas.php">
                    <i class="fas fa-user-shield me-2"></i>
                    <span>Cuentas</span>
                </a>
            </li>
            <li>
                <a href="empresas.php">
                    <i class="fas fa-usd-square me-2"></i>
                    <span>Empresas</span>
                </a>
            </li>
            <li>
                <a href="graficos.php">
                    <i class="fas fa-file-chart-line me-2"></i>
                    <span>Graficos</span>
                </a>
            </li>
        </ul>

    </nav>

    <div>
        <div class="linea"></div>
        <div class="usuario">
            <ul class="logout d-flex justify-content-center list-unstyled sidebar-cerrar-sesion">
                <li class=" h7"><a class="nav-link" href="../../../vista/login/cerrar-sesion.php"><span>Cerrar Sesion</span><i class="fal fa-sign-out-alt ms-2"></i></a></li>
            </ul>
        </div>
    </div>

</div>