<?php

require '../../controller/conexion.php';
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Expediente archivado</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Expediente archivado</a></li>
                    <li class="breadcrumb-item active">Vista</li>
                </ol>
            </div>

        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Descripción expediente archivado
                    <a href="menu-abo.php?controlador=mostrar-trami-caso-archi" class="btn btn-danger float-end">Regresar</a>
                </h4>
            </div>
            <div class="card-body">

                <?php
                if (isset($_GET['idexp'])) {
                    $exp_id = mysqli_real_escape_string($con, $_GET['idexp']);
                    $query = "SELECT ex.nombre,ex.tipo,ex.estado,p.primer_nomb,p.segundo_nomb,p.primer_ape,p.segundo_ape FROM expediente as ex,juzgado as juz,perfil as p ,usuario as u WHERE ex.IdJuz = juz.IdJuz  AND ex.IdUser = u.IdUser AND u.IdUser = p.IdUser AND ex.IdExp = '$exp_id'";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $expedi = mysqli_fetch_array($query_run);
                ?>

                        <div class="mb-3">
                            <label>Nombre del expediente</label>
                            <p class="form-control">
                                <?= $expedi['nombre']; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Típo de expediente</label>
                            <p class="form-control">
                                <?= $expedi['tipo']; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Estado del expediente</label>
                            <p class="form-control">
                                <?= $expedi['estado']; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Cliente</label>
                            <p class="form-control">
                                <?= $expedi['primer_nomb']; ?> <?= $expedi['segundo_nomb']; ?> <?= $expedi['primer_ape']; ?> <?= $expedi['segundo_ape']; ?>
                            </p>
                        </div>
                        <?php
                       
                        $queryj = "SELECT juzgado.nombre FROM expediente,juzgado WHERE IdExp = '$exp_id' AND expediente.IdJuz = juzgado.IdJuz ";
                        $query_runj = mysqli_query($con, $queryj);
                        $juzga = mysqli_fetch_array($query_runj);

                        ?>
                        <div class="mb-3">
                            <label>Juzgado</label>
                            <p class="form-control">
                                <?= $juzga['nombre']; ?>
                            </p>
                        </div>


                <?php
                    } else {
                        echo "<h4>No hay datos</h4>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>