<?php

require '../../controller/conexion.php';
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Perfil</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Perfil de usuarios</a></li>
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
                <h4>Perfil de usuario
                <a href="menu-abo.php?controlador=mostrar-perfil-abog" class="btn btn-danger float-end">Regresar</a>
                </h4>
            </div>
            <div class="card-body">

                <?php
                if (isset($_GET['idper'])) {
                    $exp_id = mysqli_real_escape_string($con, $_GET['idper']);
                    $query = "SELECT * FROM perfil  WHERE IdPer = '$exp_id '";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $expedi = mysqli_fetch_array($query_run);
                ?>

                        <div class="mb-3">
                            <label>Primer nombre</label>
                            <p class="form-control">
                                <?= $expedi['primer_nomb']; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Segundo nombre</label>
                            <p class="form-control">
                                <?= $expedi['segundo_nomb']; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Primer apellido</label>
                            <p class="form-control">
                                <?= $expedi['primer_ape']; ?>
                            </p>
                        </div>


                        <div class="mb-3">
                            <label>Segundo apellido</label>
                            <p class="form-control">
                                <?= $expedi['segundo_ape']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Teléfono</label>
                            <p class="form-control">
                                <?= $expedi['telefono']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Celular</label>
                            <p class="form-control">
                                <?= $expedi['celular']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Dirección</label>
                            <p class="form-control">
                                <?= $expedi['direccion']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Número de identidad</label>
                            <p class="form-control">
                                <?= $expedi['direccion']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Fecha de nacimiento</label>
                            <p class="form-control">
                                <?= $expedi['fecha_naci']; ?>
                            </p>
                        </div>
      
                        <div class="mb-3">
                            <label>Ocupación</label>
                            <p class="form-control">
                                <?= $expedi['ocupacion']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Género</label>
                            <p class="form-control">
                                <?= $expedi['genero']; ?>
                            </p>
                        </div>
                <?php
                    } else {
                        echo "<h4>No hay datos de perfil</h4>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>