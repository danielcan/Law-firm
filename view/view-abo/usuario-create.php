                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Creación de nuevo usuario</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Usuario del sistema</a></li>
                                        <li class="breadcrumb-item active">Nuevo usuario</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Usuario del sistema</h4>
                                    <div class="flex-shrink-0">

                                    </div>
                                </div><!-- end card header -->
                                <form action="codeuser.php" method="post">
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="iconrightInput" class="form-label">Correo del nuevo usuario del sistema</label>
                                                        <div class="form-icon right">
                                                            <input type="email" name="emailu" class="form-control form-control-icon" id="iconrightInput" placeholder="example@gmail.com" required="required">
                                                            <i class="ri-mail-unread-line"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="basiInput" class="form-label">Contraseña</label>
                                                        <input type="password" name="passwu" class="form-control" id="basiInput" required="required">
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label for="basiInput" class="form-label">Tipo de usuario</label>
                                                    <select name="tipo" size="1" id="tipo" class="form-control" required="required">
                                                        <option value="">Tipo de usuario....</option>
                                                        <option value="3">Abogado</option>
                                                        <option value="4">Asistente legal</option>
                                                    </select>
                                                </div>

                                                <!--end col-->
                                                <div class="col-xxl-3 col-md-6">
                                                    <div style = "position: absolute;top: 40%;">
                                                        <button type="submit" name="registrar" class="btn btn-primary" >Agregar usuario</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--end row-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end col-->
                    </div>