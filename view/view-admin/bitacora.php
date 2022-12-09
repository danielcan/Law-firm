<?php
require '../../controller/conexion.php';
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Bitacora</h4>


            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Bitacora</a></li>
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
                    <h4>Bitacora
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Fecha actividad</th>
                                <th>Actividad dentro del sistema</th>
                                <th>Tabla</th>
                                <th>usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT b.fecha_acti,b.actividad,b.tabla,p.primer_nomb,p.segundo_nomb,p.primer_ape,p.segundo_ape FROM bitacora as b, usuario as u, perfil as p WHERE b.IdUser = u.IdUser AND u.IdUser = p.IdUser order by b.IdBita desc";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $deta) {
                            ?>
                                    <tr>
                                        <td><?= $deta['fecha_acti']; ?></td>
                                        <td><?= $deta['actividad']; ?></td>
                                        <td><?= $deta['tabla']; ?></td>  
                                        <td><?= $deta['primer_nomb']; ?> <?= $deta['segundo_nomb']; ?> <?= $deta['primer_ape']; ?> <?= $deta['segundo_ape']; ?></td> 
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<h5> Aun no hay en la bitacora. </h5>";
                            }

                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
