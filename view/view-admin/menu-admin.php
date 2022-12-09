<?php
session_start();
$iduser = $_SESSION['iduser'];



//verificacion si existe la session de algun usuario.
if (!isset($_SESSION['iduser'])) {
    // $_SESSION['user'] = false;
    header("Location: ../../index.php");
}


require '../../controller/conexion.php';
$consultan = "SELECT primer_nomb,primer_ape  FROM perfil WHERE iduser='$iduser'";
$query_cons = mysqli_query($con, $consultan);
$datac = mysqli_fetch_array($query_cons);
//traspaso a variable más sensillo.
$nombre = $datac['primer_nomb'];
$apellido = $datac['primer_ape'];
$espacio = " ";

$name = $nombre . $espacio . $apellido;

?>


<!Doctype html>
<html lang="es" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg">

<head>
    <title>Bufete Legal</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- App favicon -->
    <link rel="icon" href="assets/I-images/favicon.ico" type="assets/I-image/x-icon">

    <!-- aos css -->
    <link rel="stylesheet" href="assets/libs/aos/aos.css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php
        include_once 'menu-superior.php';
        ?>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-default-143.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-default-143x27.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-default-143.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-default-143x27.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="?controlador=inicio2">
                                <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Inicio</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="?controlador=mostrar-dash">
                                <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Graficos</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="?controlador=bitacora">
                                <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Bitacora</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="?controlador=copia">
                                <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Copia de la base de datos</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content overflow-hidden">

            <div class="page-content">
                <div class="container-fluid">


                    <!-- contenido aquí end page title -->
                    <?php
                    $controlador = "inicio";
                    if (($_GET['controlador'] != "")) {
                        $controlador = $_GET['controlador'];
                    }

                    include_once($controlador . ".php");
                    ?>




                </div>
                <!-- end main content-->
            </div>
        </div>
        <!-- END layout-wrapper -->


        <!-- Theme Settings -->


        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="assets/js/plugins.js"></script>

        <!-- aos js -->
        <script src="assets/libs/aos/aos.js"></script>
        <!-- prismjs plugin -->
        <script src="assets/libs/prismjs/prism.js"></script>
        <!-- animation init -->
        <script src="assets/js/pages/animation-aos.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
</body>

</html>