<?php
require '../../controller/conexion.php';
?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Recibos por honorarios</h4>


            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Recibos por honorarios</a></li>
                    <li class="breadcrumb-item active">Mostrar</li>
                </ol>
            </div>

        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h4>Recibos por honorarios</h4>
                <div class="card-header">
                    <form action="coderecibo.php" method="POST" class="d-inline">
                        <div class="position-relative">
                            <input type="text" name="busqueda_r" class="form-control" placeholder="Buscar recibo..."
                                autocomplete="off" id="search-options" value="" style=" float: left; width : 250px; ">
                            <button type="submit" name="buscar" class="btn btn-primary" size=40
                                style=" width : 100px;"><span class="mdi mdi-magnify search-widget-icon">
                                    Buscar</span></button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre del cliente</th>
                            <th>Fecha recibo</th>
                            <th>Concepto</th>
                            <th>Documento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if (isset($_GET['nombre'])) {
                                $busqueda = mysqli_real_escape_string($con, $_GET['nombre']);
                                $query = "SELECT * FROM recibo WHERE recibi LIKE '%$busqueda%' order by IdRec DESC";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $deta) {
                            ?>

                        <tr>
                            <td><?= $deta['recibi']; ?></td>
                            <td><?= $deta['fechare']; ?></td>
                            <td><?= $deta['concepto']; ?></td>
                            <td><a href="../../<?= $deta['documento']; ?>" target="_blank">Ver Recibo</td>

                        </tr>

                        <?php
                                    }
                                } else {
                                    echo "<h5> Aun no hay datos </h5>";
                                }
                            }
                                ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>