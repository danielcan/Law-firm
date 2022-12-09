<?php
session_start();
$iduser = $_SESSION['iduser'];



//verificacion si existe la session de algun usuario.
if (!isset($_SESSION['iduser'])) {
    // $_SESSION['user'] = false;
    header("Location: ../../index.php");
}


require '../../controller/conexion.php';
//$consultan = "SELECT primer_nomb,primer_ape  FROM perfil WHERE iduser='$iduser'";
$consultan = "SELECT  abogado.IdAbo, perfil.primer_nomb, perfil.primer_ape  FROM perfil, usuario, abogado WHERE usuario.IdUser='$iduser' AND usuario.IdUser = perfil.IdUser AND perfil.IdPer = abogado.IdPer";
$query_cons = mysqli_query($con, $consultan);
$datac = mysqli_fetch_array($query_cons);
//traspaso a variable más sensillo.
$idabog = $datac['IdAbo'];
$nombre = $datac['primer_nomb'];
$apellido = $datac['primer_ape'];

$espacio = " ";

//concatenación del nombre 
$name = $nombre . $espacio . $apellido;

$_SESSION['idabo'] = $idabog;

//verificacion de vista del usuario
$vistaconsulta = "SELECT * FROM `configuracion` WHERE IdUser = $iduser";
$query_vista = mysqli_query($con, $vistaconsulta);
$datavista = mysqli_fetch_array($query_vista);

if (mysqli_num_rows($query_vista) > 0) {

    $_SESSION['Solicitudes'] = $datavista['Solicitudes'];
    $_SESSION['Asignacion'] = $datavista['Asignacion'];
    $_SESSION['Miscitas'] = $datavista['Miscitas'];
    $_SESSION['Usuario'] = $datavista['Usuario'];
    $_SESSION['Confi'] = $datavista['Confi'];
    $_SESSION['Creaexpedi'] = $datavista['Creaexpedi'];
    $_SESSION['Expediactu'] = $datavista['Expediactu'];
    $_SESSION['Juzgado'] = $datavista['Juzgado'];
    $_SESSION['Agenda'] = $datavista['Agenda'];
    $_SESSION['Noti'] = $datavista['Noti'];
    $_SESSION['Archivado'] = $datavista['Archivado'];
    $_SESSION['Pais'] = $datavista['Pais'];
    $_SESSION['Especi'] = $datavista['Especi'];
    $_SESSION['Dash'] = $datavista['Dash'];
    $_SESSION['Perfil'] = $datavista['Perfil'];
} else {
    $_SESSION['Solicitudes'] = 0;
    $_SESSION['Asignacion'] = 0;
    $_SESSION['Miscitas'] = 0;
    $_SESSION['Usuario'] = 0;
    $_SESSION['Confi'] = 0;
    $_SESSION['Creaexpedi'] = 0;
    $_SESSION['Expediactu'] = 0;
    $_SESSION['Juzgado'] = 0;
    $_SESSION['Agenda'] = 0;
    $_SESSION['Noti'] = 0;
    $_SESSION['Archivado'] = 0;
    $_SESSION['Pais'] = 0;
    $_SESSION['Especi'] = 0;
    $_SESSION['Dash'] = 0;
    $_SESSION['Perfil'] = 0;
}

//revision de cita y actualizacion de la misma si esta atrazada.
$consultancita = "SELECT IdCita, fecha, hora , estado  FROM citas ";
$query_conscita = mysqli_query($con, $consultancita);
if (mysqli_num_rows($query_conscita) > 0) {
    foreach ($query_conscita as $cita) {
        $fechac = $cita['fecha'];
        $horac = $cita['hora'];
        $IdCitas = $cita['IdCita'];
        $estadocita = $cita['estado'];

        if ($estadocita == 'activo' || $estadocita == 'En proceso') {

            $fecha_veri = $fechac . " " . $horac . ":00";
            date_default_timezone_set('America/Tegucigalpa');

            //Formato de la fecha nueva cita solicitada
            $formato = 'Y-m-d H:i:s';
            $fechanue = DateTime::createFromFormat($formato, $fecha_veri)->format('Y-m-d H:i:s');
            $todaysDate = date("Y-m-d H:i:s");

            if ($fechanue < $todaysDate) {
                $queryfecha = "UPDATE citas SET estado = 'atrasado' WHERE IdCita = '$IdCitas'";
                $query_runfecha = mysqli_query($con, $queryfecha);

                //zona horaria Tegucigalpa, para registro en el sistema.

                $fechanoti = date('Y-m-d H:i:s', time());

                //nombre de la cita
                $nombrefecha = 'Cita sin seguimiento';
                $motivo_desfechas = 'Revisar las citas asignadas. Existe cita sin seguimiento.';
                //  recuperacion de datos
                $queryabog = "SELECT IdUser FROM Usuario WHERE rol='3' and tipo ='creador'  ";
                $query_runabog = mysqli_query($con, $queryabog);
                if (mysqli_num_rows($query_runabog) > 0) {
                    foreach ($query_runabog as $creador) {

                        $iduser = $creador['IdUser'];

                        //agrega la notificacion del porque la desestimacion de la cita al abogado creador
                        $querydesess = "INSERT INTO notificacion (nombre,descripcion,fecha_noti,estado,IdUser) VALUES ('$nombrefecha','$motivo_desfechas','$fechanoti','no leido','$iduser')";
                        $query_rundesess = mysqli_query($con, $querydesess);
                    }
                }
            }
        }
    }
}


?>

<!DOCTYPE html>
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

                        <!--id="elemento" -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="?controlador=inicio">
                                <i class="ri-honour-line"></i> <span data-key="t-widgets">Inicio</span>
                            </a>
                        </li>

                        <?php
                        if ($_SESSION['Solicitudes'] == 1) {

                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=solicitudescitas">
                                    <i class="ri-stack-line"></i> <span data-key="t-widgets">Solicitudes citas de clientes</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                        <?php
                        if ($_SESSION['Asignacion'] == 1) {
                        ?>
                            <!--id="asignaciones" -->
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=asignacioncita">
                                    <i class="ri-calendar-event-line"></i> <span data-key="t-widgets">Citas asignadas a otros abogados</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>


                        <?php
                        if ($_SESSION['Miscitas'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=asigna-tucita">
                                    <i class="ri-calendar-check-line"></i> <span data-key="t-widgets">Tus citas asignadas con clientes</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>


                        <?php
                        if ($_SESSION['Usuario'] == 1) {
                        ?>
                            <!--id="creacionabo" -->
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                                    <i data-feather="command" class="icon-dual"></i> <span data-key="t-pages">Usuario del sistema</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarPages">
                                    <ul class="nav nav-sm flex-column">

                                        <li class="nav-item">
                                            <a href="#sidebarProfile" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile" data-key="t-profile"> Usuarios
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarProfile">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="?controlador=usuario-create4" class="nav-link" data-key="t-simple-page"> Nuevo usuario </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="?controlador=mostrar-perfil-abog" class="nav-link" data-key="t-settings"> Mostrar perfil de usuarios </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="?controlador=mostrar-user-abog" class="nav-link" data-key="t-settings"> Mostrar usuarios del sistema </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="?controlador=mostrar-espe-abo" class="nav-link" data-key="t-settings"> Mostrar información especifica de los abogados </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                        <?php
                        }
                        ?>


                        <?php
                        if ($_SESSION['Confi'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                                    <i data-feather="layers" class="icon-dual"></i> <span data-key="t-advance-ui">Configuración administrativa</span>
                                    <!--   <span class="badge badge-pill bg-primary" data-key="t-new">New</span>-->
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="?controlador=agrega-configura" class="nav-link" data-key="t-sweet-alerts">Agregar nueva configuración</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="?controlador=mostrar-conf" class="nav-link" data-key="t-nestable-list">Mostrar configuraciones</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        <?php
                        }
                        ?>

                        <?php
                        if ($_SESSION['Creaexpedi'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=expediente-create">
                                    <i class="ri-archive-line"></i> <span data-key="t-widgets">Creación expediente</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                        <?php
                        if ($_SESSION['Expediactu'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=mostrar-caso-actu">
                                    <i class="ri-building-4-line"></i> <span data-key="t-widgets">Expediente actuales</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                        <?php
                        if ($_SESSION['Juzgado'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=mostrar-juzgado">
                                    <i class="ri-bank-line"></i> <span data-key="t-widgets">Juzgados</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                        <?php
                        if ($_SESSION['Pais'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=mostrar-pais">
                                    <i class="ri-menu-3-line"></i> <span data-key="t-widgets">País</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>


                        <?php
                        if ($_SESSION['Especi'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=mostrar-especialidad">
                                    <i class="ri-send-to-back"></i> <span data-key="t-widgets">Especialidad</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                        <?php
                        if ($_SESSION['Agenda'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=mostrar-agenda">
                                    <i class="ri-wallet-line"></i> <span data-key="t-widgets">Agenda</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                        <?php
                        if ($_SESSION['Noti'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=mostrar-noti">
                                    <i class="ri-luggage-cart-line"></i> <span data-key="t-widgets">Notificaciones</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                        <?php
                        if ($_SESSION['Archivado'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=mostrar-trami-caso-archi">
                                    <i class="ri-dashboard-line"></i> <span data-key="t-widgets">Expediente archivados</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>


                        <?php
                        if ($_SESSION['Dash'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=mostrar-dash">
                                    <i class="ri-bar-chart-2-line"></i> <span data-key="t-widgets">Dashboard</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                        <?php
                        if ($_SESSION['Perfil'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="?controlador=mostrar-perfil">
                                    <i class="ri-user-follow-line"></i> <span data-key="t-widgets">Mi Perfil</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="?controlador=generar-reporte">
                                <i class="ri-user-follow-line"></i> <span data-key="t-widgets">Reportes</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="?controlador=mostrar-recibos">
                                <i class="ri-user-follow-line"></i> <span data-key="t-widgets">Recibos</span>
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
        <script src="formMask_V2.js"></script>
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

        <script>
            document.getElementById("solicitudes").style.display = "none";
        </script>
        <script>
            document.getElementById("asignaciones").style.display = "none";
        </script>

        <script>
            new FormMask(document.querySelector("#telefonoss"), "(+504) ____-____", "_", ["(", ")", "-"])
            new FormMask(document.querySelector("#celularss"), "(+504) ____-____", "_", ["(", ")", "-"])
            new FormMask(document.querySelector("#DNIh"), "____-____-_____", "_", ["(", ")", "-"])
            new FormMask(document.querySelector("#DNIc"), "_-___-______", "_", ["(", ")", "-"])
            new FormMask(document.querySelector("#codigo"), "      ", " ", ["(", ")", "-"])
        </script>




</body>

</html>