<?php

require '../../controller/conexion.php';
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Editar expediente</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Expediente</a></li>
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
                <h4>Editar un expediente
                    <a href="menu-abo.php?controlador=mostrar-caso-actu" class="btn btn-danger float-end">Regresar</a>
                </h4>
            </div>
            <div class="card-body">

                <?php
                if (isset($_GET['idexp'])) {
                    $expe_id = mysqli_real_escape_string($con, $_GET['idexp']);
                    $query = "SELECT expediente.IdExp,expediente.nombre,expediente.tipo,expediente.estado,expediente.estado,expediente.IdUser,expediente.IdJuz,perfil.primer_nomb,perfil.segundo_nomb,perfil.primer_ape,perfil.segundo_ape FROM expediente,juzgado,usuario,perfil WHERE expediente.IdExp='$expe_id' AND expediente.IdJuz = juzgado.IdJuz AND expediente.IdUser = usuario.IdUser AND usuario.IdUser = perfil.IdUser";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $expediente = mysqli_fetch_array($query_run);
                ?>
                        <form action="codeexpe.php" method="POST">
                            <input type="hidden" name="expedi_id" value="<?= $expediente['IdExp']; ?>">

                            <div class="mb-3">
                                <label>Nombre</label>
                                <input type="text" name="nombre_exp" class="form-control" required placeholder="coloca un nombre del expediente del cliente (caso o tramite)" value="<?= $expediente['nombre']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Tipo de expediente</label>
                                <select name="tipo_exp" size="1" id="estado" class="form-control" required="required">
                                    <option value="<?= $expediente['tipo']; ?>"><?= $expediente['tipo']; ?></option>
                                    <option value="caso">caso</option>
                                    <option value="tramite">tramite</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Estado del expediente</label>
                                <select name="estado_ep" size="1" id="estado" class="form-control" required="required">
                                <option value="<?= $expediente['estado']; ?>"><?= $expediente['estado']; ?></option>
                                    <option value="activo">activo</option>
                                    <option value="finalizado">finalizado</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Cliente (citas asignadas)</label>
                                <select name="cliente_exp" size="1" id="Esp" class="form-control" required="required">

                                    <option value="<?php echo $expediente['IdUser'] ?>"><?php echo $expediente['primer_nomb'] ?> <?php echo $expediente['segundo_nomb'] ?> <?php echo $expediente['primer_ape'] ?> <?php echo $expediente['segundo_ape'] ?></option>
                                    <?php

                                    $consultac = "SELECT usuario.IdUser,perfil.primer_nomb,perfil.segundo_nomb,perfil.primer_ape,perfil.segundo_ape FROM asignacion,citas,usuario,perfil,abogado WHERE abogado.IdAbo = '$idabo' AND abogado.IdAbo = asignacion.IdAbo and asignacion.IdCita = citas.IdCita and citas.IdUser = usuario.IdUser AND usuario.IdUser = perfil.IdUser";
                                    $ejecutarc = mysqli_query($con, $consultac);
                                    ?>

                                    <?php foreach ($ejecutarc as $opcionesc) : ?>


                                        <option value="<?php echo $opcionesc['IdUser'] ?>"><?php echo $opcionesc['primer_nomb'] ?> <?php echo $opcionesc['segundo_nomb'] ?> <?php echo $opcionesc['primer_ape'] ?> <?php echo $opcionesc['segundo_ape'] ?></option>

                                    <?php endforeach ?>
                                </select>
                            </div>

                            <?php

                            $queryj = "SELECT juzgado.IdJuz,juzgado.nombre FROM expediente,juzgado WHERE expediente.IdExp = '$expe_id' AND expediente.IdJuz = juzgado.IdJuz ";
                            $query_runj = mysqli_query($con, $queryj);
                            $juzga = mysqli_fetch_array($query_runj);

                            ?>

                            <div class="mb-3">
                                <label>Juzgado (si es necesario colocar)</label>
                                <select name="juzga_exp" size="1" id="Esp" class="form-control" required="required">
                                    <option value="<?= $juzga['IdJuz']; ?>"><?= $juzga['nombre']; ?></option>
                                    <?php
                                    // require '../../controller/conexion.php';
                                    $consultaj = "SELECT * FROM juzgado";
                                    $ejecutarj = mysqli_query($con, $consultaj);
                                    ?>

                                    <?php foreach ($ejecutarj as $opcionesj) : ?>


                                        <option value="<?php echo $opcionesj['IdJuz'] ?>"><?php echo $opcionesj['nombre'] ?></option>

                                    <?php endforeach ?>
                                </select>
                            </div>


                            <div class="mb-3">
                                <button type="submit" name="update_expediente" class="btn btn-primary">
                                    Actualizar Expediente
                                </button>
                            </div>

                        </form>
                <?php
                    } else {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>