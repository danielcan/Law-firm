<?php
session_start();
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
  <div class="page">
    <header class="page-head">
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="53px" data-xl-stick-up-offset="53px" data-xxl-stick-up-offset="53px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
          <div class="rd-navbar-inner">

            <div class="rd-navbar-group">
              <div class="rd-navbar-panel">
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button><a class="rd-navbar-brand brand"><img src="assets/I-images/logo-default-143x27.png" alt="" width="143" height="27" /></a>
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


  <div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->


    <!-- auth page content -->
    <div class="auth-page-content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center mt-sm-5 mb-4 text-white-50">

              <p class="mt-3 fs-15 fw-semibold">Premium Admin & Dashboard Template</p>
            </div>
          </div>
        </div>
        <!-- end row -->

        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">
              <div class="card-body p-4 text-center">
                <div class="avatar-lg mx-auto mt-2">
                  <div class="avatar-title bg-light text-success display-3 rounded-circle">
                    <i class="ri-checkbox-circle-fill" style="color:royalblue"></i>
                  </div>
                </div>
                <form action="redireccion.php" method="post">
                <div class="mt-4 pt-2">
                  <h1>¡¡Código Verificado!!</h1>
                  <!--<h2 class="text-muted mx-4">.</h2>-->
                  <div class="mt-4">
                    
                    <button type="submit" name="redireccion" class="btn btn-primary" style="width: 300px;border-radius: 0px; FONT-SIZE: 20pt;">Ir a la plataforma</button>
                  </div>
                </div>
                </form>  
              </div>
              <!-- end card body -->
            </div>
            <!-- end card -->

          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end auth page content -->


  </div>
  <!-- end auth-page-wrapper -->


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