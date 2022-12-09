<?php


$query = "UPDATE notificacion SET estado= 'leido' WHERE IdUser = '$iduser' ";
$query_run = mysqli_query($con, $query);
?>


<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Notificaciones</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Notificaciones</a></li>
                        <li class="breadcrumb-item active">Mostrar</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">

        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card" id="companyList">
                <div class="card-header">
                    <div class="row g-2">


                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-card mb-3">
                            <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                <thead class="table-light">
                                    <tr>

                                        <th class="sort" data-sort="name" scope="col">Nombre de la notificación</th>
                                        <th class="sort" data-sort="owner" scope="col">Descripción</th>
                                        <th class="sort" data-sort="owner" scope="col">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <?php
                                    $query = "SELECT * FROM notificacion where IdUser = '$iduser' ORDER BY IdNoti DESC ";
                                    $query_run = mysqli_query($con, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $noti) {
                                    ?>
                                            <tr>

                                                <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ001</a></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/brands/dribbble.png" alt="" class="avatar-xxs rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1 ms-2 name"><?= $noti['nombre']; ?></div>
                                                    </div>
                                                </td>
                                                <td class="owner"><?= $noti['descripcion']; ?></td>
                                                <td class="owner"><?= $noti['fecha_noti']; ?></td>

                                            </tr>

                                    <?php
                                        }
                                    } else {
                                        echo "<h5> En este momento no tienen ninguna notificación </h5>";
                                    }
                                    ?>

                                </tbody>
                            </table>

                        </div>

                    </div>

                    <!--end add modal-->


                    <!--end delete modal -->

                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->

    </div>
    <!--end row-->

    <!-- container-fluid -->

    <!-- End Page-content -->