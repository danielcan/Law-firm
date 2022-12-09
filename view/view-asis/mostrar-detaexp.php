<?php
require '../../controller/conexion.php';
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Detalle del expediente</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Detalles de Casos </a></li>
                    <li class="breadcrumb-item active">Mostrar</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<?php
if (isset($_GET['idexp'])) {
$exp_id = mysqli_real_escape_string($con, $_GET['idexp']);
?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detalle del expediente
                        <a href="menu-abo.php?controlador=mostrar-caso-actu" class="btn btn-secondary ">Regresar</a>
                        <a href="menu-abo.php?controlador=detalle-create&idexp=<?= $exp_id; ?>" class="btn btn-primary float-end">Agregar nuevo detalle del expediente</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Fecha de detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM detalleexp WHERE IdExp='$exp_id'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $deta) {
                            ?>
                                    <tr>
                                        <td><?= $deta['descripcion']; ?></td>
                                        <td><?= $deta['fechaExp']; ?></td>
                                        <td>
                                            <a href="menu-abo.php?controlador=detalle-edit&iddeta=<?= $deta['IdDetal']; ?>" class="btn btn-success btn-sm">Editar</a>
                                            <form action="codedetalle.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_deta" value="<?= $deta['IdDetal']; ?>" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<h5> Aun no hay datos </h5>";
                            }

                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
<?php
}
?>