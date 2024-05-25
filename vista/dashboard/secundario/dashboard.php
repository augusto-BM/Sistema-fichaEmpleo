<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<body class="bg-content">
    <main class="dashboard d-flex">
        <!-- start sidebar -->
        <div class="bg-sidebar vh-100 w-50 position-fixed">
            <div class="log d-flex justify-content-between">
                <h1 class="E-classe text-start ms-3 ps-1 mt-3 h6 fw-bold">Dashboard</h1>
                <i class="far fa-times h4 me-3 close align-self-end d-md-none"></i>
            </div>
            <div class="img-admin d-flex flex-column align-items-center text-center gap-2">
                <img class="rounded-circle" src="../assets/img/img-admin.jpeg" alt="img-admin" height="120" width="120">
                <h2 class="h6 fw-bold">Administrador</h2>
                <span class="h7 admin-color">General</span>
            </div>
            <div class=" bg-list d-flex flex-column align-items-center fw-bold gap-2 mt-4 ">
                <ul class="d-flex flex-column list-unstyled">
                        <li class="h7"><a class="nav-link text-dark" href="dashboard.php"><i
                            class="fal fa-home-lg-alt me-2"></i> <span>Inicio</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="course.php"><i
                                class="fal fa-bookmark me-2"></i> <span>Course</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="./postulantes.php"><i
                                class="far fa-graduation-cap me-2"></i> <span>Students</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="payment_details.php"><i
                                class="fal fa-usd-square me-2"></i> <span>Payment</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href=""><i
                                class="fal fa-file-chart-line me-2"></i> <span>Report</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href=""><i
                                class="fal fa-sliders-v-square me-2"></i> <span>Settings</span></a></li>
                </ul>
                <ul class="logout d-flex justify-content-start list-unstyled">
                    <li class=" h7"><a class="nav-link text-dark" href="../index.php"><span>Logout</span><i
                                class="fal fa-sign-out-alt ms-2"></i></a></li>
                </ul>
            </div>

        </div>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px">
              <nav class="navbar container-fluid navbar-light bg-white position-sticky top-0">
                <div class=""><i class="fal fa-caret-circle-down h5 d-none d-md-block menutoggle fa-rotate-90"></i>
                    <i class="fas fa-bars h4  d-md-none"></i></div>
                <div class="d-flex align-items-center gap-4">
                    <form class="d-flex align-items-center">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <i class="fal fa-search position-relative"></i>
                    </form>
                    <i class="fal fa-bell"></i>
                </div>
            </nav>

            <div class="cards row gap-3 justify-content-center mt-5">
<!--                 <div class=" card__items card__items--blue col-md-3 position-relative">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                        <i class="far fa-graduation-cap h3"></i>
                        <span>Students</span>
                    </div>
                    <div class="card__nbr-students">
                        <span class="h5 fw-bold nbr">13</span>
                    </div>
                </div> -->

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
            </div>

        </div>
        <!-- end contentpage -->
    </main>
    <script src="./script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>