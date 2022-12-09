<?php

require '../../controller/conexion.php';
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Información de Colegiación del abogado</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Abogado</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Información especifica
                    <a href="menu-abo.php?controlador=mostrar-espe-abo" class="btn btn-danger float-end">Regresar</a>
                </h4>
            </div>
            <div class="card-body">

                <?php
                if (isset($_GET['idabo'])) {
                    $idabo = mysqli_real_escape_string($con, $_GET['idabo']);
                    $query = "SELECT a.IdAbo,a.nume_abo,a.IdEsp,e.nombre FROM abogado as a, especialidad as e WHERE a.IdAbo='$idabo' AND a.IdEsp = e.IdEsp";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $perfil = mysqli_fetch_array($query_run);
                ?>
                        <form action="codeabo.php" method="POST">
                            <input type="hidden" name="abo_id" value="<?= $perfil['IdAbo']; ?>">

                            <div class="mb-3">
                                <label>Número de colegiación del abogado</label>
                                <input type="text" name="nume_a" value="<?= $perfil['nume_abo']; ?>" class="form-control" require>
                            </div>

                            <div class="mb-3">
                                <label>Especialidad del abogado</label>
                                <select name="especia_id" size="1" id="Esp" class="form-control" required="required">

                                    <option value="<?php echo $perfil['IdEsp'] ?>"> <?php echo $perfil['nombre'] ?></option>
                                    <?php
                                    $idesp=$perfil['IdEsp'];
                                    $consultac = "SELECT * FROM especialidad where estado='activo'";
                                    $ejecutarc = mysqli_query($con, $consultac);
                                    ?>

                                    <?php foreach ($ejecutarc as $opcionesc) : ?>


                                        <option value="<?php echo $opcionesc['IdEsp'] ?>"><?php echo $opcionesc['nombre'] ?></option>

                                    <?php endforeach ?>
                                </select>
                            </div>


                            <div class="mb-3">
                                <button type="submit" name="update_abo" class="btn btn-primary">
                                    Actualizar perfil
                                </button>
                            </div>

                        </form>
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