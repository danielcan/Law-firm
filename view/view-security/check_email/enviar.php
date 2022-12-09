

<body>
    <div class="auth-page-wrapper pt-5">

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">

                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <div class="avatar-lg mx-auto">
                                        <div class="avatar-title bg-light text-primary display-5 rounded-circle">
                                            <i class="ri-mail-line"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2 mt-4">
                                    <div class="text-muted text-center mb-4 mx-lg-3">
                                        <h1>Verificación de usuario</h1>
                                        <p style="font-size:20px;">Por favor ingrese el código de 4 dígitos enviado a <span class="fw-bold"><?php echo $email?></span></p>
                                    </div>

                                    <form action="control_verify.php" method="POST">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    
                                                    <input type="text" name="numero1" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(this, 2)" maxLength="1" id="digit1-input" style="font-size:20px;">
                                                </div>
                                            </div><!-- end col -->

                                            <div class="col-3">
                                                <div class="mb-3">
                                                   
                                                    <input type="text" name="numero2" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(this, 3)" maxLength="1" id="digit2-input" style="font-size:20px;">
                                                </div>
                                            </div><!-- end col -->

                                            <div class="col-3">
                                                <div class="mb-3">
                                                   
                                                    <input type="text" name="numero3" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(this, 4)" maxLength="1" id="digit3-input" style="font-size:20px;">
                                                </div>
                                            </div><!-- end col -->

                                            <div class="col-3">
                                                <div class="mb-3">
                                                    
                                                    <input type="text" name="numero4" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(this, 4)" maxLength="1" id="digit4-input" style="font-size:20px;">
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" name="verifica" class="btn btn-primary w-100" style="font-size:20px;">Confirmación</button>
                                        </div>
                                    </form><!-- end form -->

                                </div>
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


        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->