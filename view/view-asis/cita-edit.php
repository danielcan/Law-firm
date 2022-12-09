<?php

require '../../controller/conexion.php';
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Editar cita</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Cita</a></li>
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
                <h4>Editar cita
                    <a href="menu-abo.php?controlador=asigna-tucita" class="btn btn-danger float-end">Regresar</a>
                </h4>
            </div>
            <div class="card-body">

                <?php
                if (isset($_GET['idcita'])) {
                    $cita_id = mysqli_real_escape_string($con, $_GET['idcita']);
                    $query = "SELECT * FROM citas WHERE IdCita='$cita_id' ";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $cita = mysqli_fetch_array($query_run);
                ?>
                        <form action="codecita.php" method="POST">
                            <input type="hidden" name="cita_id" value="<?= $cita_id; ?>">

                            <div class="mb-3">
                                <label>Fecha de la cita</label>
                                <input type="date" name="fecha" class="form-control" required value="<?= $cita['fecha']; ?>">
                            </div>

                            <div class="mb-3">
                                <!--min="10:00:00" max="22:30:00"-->
                                <label>Hora de la cita</label>
                                <input type="time" name="hora" class="form-control" required value="<?= $cita['hora']; ?>">
                            </div>

                            <div class="mb-3">
                                <label>Lugar</label>
                                <input type="text" name="lugar"  class="form-control" placeholder="<?= $cita['lugar']; ?>">
                            </div>

                            <div class="mb-3">
                                <label>Motivo</label>
                                <input type="text" name="motivo" class="form-control" required value="<?= $cita['motivo']; ?>">
                            </div>


                            <div class="mb-3">
                                <label>Estado de la cita</label>
                                <select name="estado" size="1" id="genero" class="form-control" required="required">
                                    <option value="<?= $cita['estado']; ?>"><?= $cita['estado']; ?></option>
                                    <option value="En proceso">En proceso</option>
                                    <option value="Desestimar">Desestimar</option>
                                    <option value="Finalizado">Finalizado</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="update_cita" class="btn btn-primary">
                                    Actualizar cita
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