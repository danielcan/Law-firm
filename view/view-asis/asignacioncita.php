<?php
require '../../controller/conexion.php';
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Cita asignadas con clientes</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Citas </a></li>
                    <li class="breadcrumb-item active">Mostrar citas</li>
                </ol>
            </div>

        </div>
    </div>
</div>





<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Citas con clientes asignadas</h4>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Motivo</th>
                            <th>Abogado(a)</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT asignacion.IdAsig,citas.IdUser,citas.fecha,citas.hora,citas.motivo,citas.estado, perfil.primer_nomb, perfil.primer_ape FROM asignacion,abogado,citas,perfil WHERE citas.estado = 'En proceso' AND citas.IdCita = asignacion.IdCita AND asignacion.IdAbo = abogado.IdAbo AND abogado.IdPer = perfil.IdPer  or citas.estado = 'atrasado' AND citas.IdCita = asignacion.IdCita AND asignacion.IdAbo = abogado.IdAbo AND abogado.IdPer = perfil.IdPer order by asignacion.IdAsig Desc";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $cita) {
                        ?>
                                <tr>
                                    <td><?= $cita['fecha']; ?></td>
                                    <td><?= $cita['hora']; ?></td>
                                    <td><?= $cita['motivo']; ?></td>
                                    <td><?= $cita['primer_nomb']; ?> <?= $cita['primer_ape']; ?></td>
                                    <td><?= $cita['estado']; ?></td>
                                    <td>
                                        <a href="menu-abo.php?controlador=perfilclienteasig&idclient=<?= $cita['IdUser']; ?>" class="btn btn-info btn-sm">Ver información de cliente.</a>
                                        <a href="menu-abo.php?controlador=asigna-edit&idAsig=<?= $cita['IdAsig']; ?>" class="btn btn-success btn-sm">Reasignar</a>
                                    <!--    <form action="codecita.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_cita" value="<?= $cita['IdAsig']; ?>" class="btn btn-danger btn-sm">Eliminar Asignación</button>
                                        </form>-->
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<h5> Aun no hay citas solicitadas de clientes. </h5>";
                        }
                        ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>