<?php

require '../../controller/conexion.php';
?>




<?php

// $juzgado_id = $iduser;
$query = "SELECT * FROM perfil WHERE IdUser='$iduser' ";
$query_run = mysqli_query($con, $query);

if (mysqli_num_rows($query_run) > 0) {
    $perfil = mysqli_fetch_array($query_run);
?>


    <div class="container-fluid">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg">
                <img src="assets/images/INICIO1.jpg" alt="" class="profile-wid-img" />
            </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
            <div class="row g-4">
                <div class="col-auto">
                    <div class="avatar-lg">
                        <img src="assets/images/users/user-dummy-img.jpg" alt="user-img" class="img-thumbnail rounded-circle" />
                    </div>
                </div>
                <!--end col-->
                <?php
                $pais = $perfil['IdPais'];
                $queryp = "SELECT * FROM pais WHERE IdPais = '$pais' ";
                $query_runp = mysqli_query($con, $queryp);
                $paisnombre = mysqli_fetch_array($query_runp);
                ?>
                <div class="col">
                    <div class="p-2">
                        <h3 class="text-white mb-1"><?= $perfil['primer_nomb']; ?> <?= $perfil['segundo_nomb']; ?> <?= $perfil['primer_ape']; ?> <?= $perfil['segundo_ape']; ?></h3>

                        <div class="hstack text-white-50 gap-1">
                            <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i><?= $paisnombre['nombre']; ?></div>

                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-12 col-lg-auto order-last order-lg-0">

                </div>
                <!--end col-->

            </div>
            <!--end row-->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="d-flex">
                        <!-- Nav tabs -->

                        <div class="flex-shrink-0">
                            <a href="menu-abo.php?controlador=perfil-edit&id=<?php echo $iduser; ?>" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Modificar tu perfil</a>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content pt-4 text-muted">
                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-3">


                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Información de tu perfil</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Primer nombre :</th>
                                                            <td class="text-muted"><?= $perfil['primer_nomb']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Segundo nombre :</th>
                                                            <td class="text-muted"><?= $perfil['segundo_nomb']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Primer apellido :</th>
                                                            <td class="text-muted"><?= $perfil['primer_ape']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Segundo nombre :</th>
                                                            <td class="text-muted"><?= $perfil['segundo_ape']; ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th class="ps-0" scope="row">Teléfono :</th>
                                                            <td class="text-muted"><?= $perfil['telefono']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Celular :</th>
                                                            <td class="text-muted"><?= $perfil['celular']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Dirección :</th>
                                                            <td class="text-muted"><?= $perfil['direccion']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Identidad :</th>
                                                            <td class="text-muted"><?= $perfil['DNI']; ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th class="ps-0" scope="row">Fecha de nacimiento : </th>
                                                            <td class="text-muted"><?= $perfil['fecha_naci']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Ocupación : </th>
                                                            <td class="text-muted"><?= $perfil['ocupacion']; ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th class="ps-0" scope="row">Género : </th>
                                                            <td class="text-muted"><?= $perfil['genero']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->



                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>

                            <!--end tab-pane-->

                        </div>
                        <!--end tab-content-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->


        <?php
    } else {
        echo "<h4>No Such Id Found</h4>";
    }

        ?>