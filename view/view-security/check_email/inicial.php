<?php
session_start();
$email = $_SESSION['correo'];
if (!isset($_SESSION['iduser'])) {
  // $_SESSION['user'] = false;
   header("Location: ../../../index.php");
}

if (!isset($_SESSION['two_factor'])) {
  // $_SESSION['user'] = false;
   print("<script> window.location.href='http://localhost/project-gradu/view/view-client/menu-client.php?controlador=inicio';</script>");
}
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="es">

<head>
  <title>Bufete Legal</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="assets/I-images/favicon.ico" type="assets/I-image/x-icon">

  <link rel="stylesheet" href="assets/I-css/style.css">

  <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="I-js/html5shiv.min.js"></script>
		<![endif]-->

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
  <?php
  include_once '../../../core/preloader.php';
  ?>



  <div class="page">
    <header class="page-head">
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="53px" data-xl-stick-up-offset="53px" data-xxl-stick-up-offset="53px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
          <div class="rd-navbar-inner">

            <div class="rd-navbar-group">
              <div class="rd-navbar-panel">
              <img src="assets/I-images/logo-default-143x27.png" alt="" width="143" height="27" />
              </div>
              <div class="rd-navbar-nav-wrap">
                <div class="rd-navbar-nav-inner">
                  <ul class="rd-navbar-nav">

                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>

  <div class="container mt-4">
    <?php include('message.php'); ?>
  </div>

  <?php
  include_once 'enviar.php';
  ?>


  <!-- Script para la barra superrio o nabvar -->
  <script src="assets/I-js/core.min.js"></script>
  <script src="assets/I-js/script.js"></script>


  <!-- JAVASCRIPT -->
  <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/simplebar/simplebar.min.js"></script>
  <script src="assets/libs/node-waves/waves.min.js"></script>
  <script src="assets/libs/feather-icons/feather.min.js"></script>
  <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
  <script src="assets/js/plugins.js"></script>

  <!-- particles js -->
  <script src="assets/libs/particles.js/particles.js"></script>
  <!-- particles app js -->
  <script src="assets/js/pages/particles.app.js"></script>
  <!-- two-step-verification js -->
  <script src="assets/js/pages/two-step-verification.init.js"></script>
</body>