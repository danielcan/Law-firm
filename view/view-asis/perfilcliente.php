<?php

require '../../controller/conexion.php';
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Información del cliente</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Perfil </a></li>
                    <li class="breadcrumb-item active">Ver perfil del cliente</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Perfil del cliente
                    <a href="menu-abo.php?controlador=solicitudescitas" class="btn btn-danger float-end">Regresar</a>
                </h4>
            </div>
            <div class="card-body">

                <?php
                if (isset($_GET['idclient'])) {
                    $perfil_id = mysqli_real_escape_string($con, $_GET['idclient']);
                    $query = "SELECT * FROM perfil WHERE IdUser='$perfil_id' ";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $perfil = mysqli_fetch_array($query_run);
                ?>

                        <input type="hidden" name="perfil_id" value="<?= $perfil['IdPer']; ?>">

                        <div class="mb-3">
                            <label>Primer nombre</label>
                            <input type="text" name="primer_nombP" value="<?= $perfil['primer_nomb']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Segundo nombre</label>
                            <input type="text" name="segundo_nombP" value="<?= $perfil['segundo_nomb']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Primer apellido</label>
                            <input type="text" name="primer_apeP" value="<?= $perfil['primer_ape']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Segundo apellido</label>
                            <input type="text" name="segundo_apeP" value="<?= $perfil['segundo_ape']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Teléfono</label>
                            <input type="text" name="telefonoP" value="<?= $perfil['telefono']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Celular</label>
                            <input type="text" name="celularP" value="<?= $perfil['celular']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Dirección de vivienda</label>
                            <input type="text" name="direccionP" value="<?= $perfil['direccion']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Identidad</label>
                            <input type="text" name="DNIP" value="<?= $perfil['DNI']; ?>" class="form-control">
                        </div>
                        <?php
                        $pais = $perfil['IdPais'];
                        $queryp = "SELECT * FROM pais WHERE IdPais = '$pais' ";
                        $query_runp = mysqli_query($con, $queryp);
                        $paisnombre = mysqli_fetch_array($query_runp);
                        ?>
                        <div class="mb-3">
                            <label>Pais de nacimiento</label>
                            <input type="text" name="pais_naciP" value="<?= $paisnombre['nombre']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Fecha de nacimiento</label>
                            <input type="text" name="fecha_naciP" value="<?= $perfil['fecha_naci']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Ocupación</label>
                            <input type="text" name="ocupacionP" value="<?= $perfil['ocupacion']; ?>" class="form-control">
                        </div>


                        <div class="mb-3">
                            <label>Genero</label>
                            <select name="generoP" size="1" id="genero" class="form-control" required="required">
                                <option value="<?= $perfil['genero']; ?>"><?= $perfil['genero']; ?></option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>

                <?php
                    } else {
                        echo "<h4>No hay registro de perfil</h4>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>