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

      <li class="h7"><a class=" nav-link text-dark" href="#"><i class="fal fa-usd-square me-2"></i> <span>Estadistica</span></a></li>
      <li class="h7"><a class=" nav-link text-dark" href="#"><i class="fal fa-file-chart-line me-2"></i> <span>Graficos</span></a></li>
      <li class="h7"><a class=" nav-link text-dark" href="#"><i class="fal fa-sliders-v-square me-2"></i> <span>Configuracion</span></a></li>
    </ul>
    <ul class="logout d-flex justify-content-start list-unstyled sidebar-cerrar-sesion">
      <li class=" h7"><a class="nav-link" href="../../../vista/login/cerrar-sesion.php"><span>Cerrar Sesion</span><i class="fal fa-sign-out-alt ms-2"></i></a></li>
    </ul>
  </div>
</div>