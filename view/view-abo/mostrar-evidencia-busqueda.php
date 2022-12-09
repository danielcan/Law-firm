<?php
require '../../controller/conexion.php';
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Evidencia del caso</h4>


            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Evidencia del caso</a></li>
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
                    <h4>Evidencia del caso
                        <a href="menu-abo.php?controlador=mostrar-caso-actu" class="btn btn-secondary ">Regresar</a>
                        <a href="menu-abo.php?controlador=evidencia-create&idexp=<?= $exp_id; ?>" class="btn btn-primary float-end">Agregar nueva evidencia al expediente</a>
                    </h4>

                    <form action="code-evidencia.php" method="POST" class="d-inline">
                    <div class="position-relative">
                        <input type="hidden" name="exp_id" value="<?= $exp_id; ?>">
                        <input type="text" name="busqueda_ev" class="form-control" placeholder="Buscar evidencia..." autocomplete="off" id="search-options" value="" style=" float: left; width : 250px; ">
                        <button type="submit" name="buscar" class="btn btn-primary" size=40 style=" width : 100px;"><span class="mdi mdi-magnify search-widget-icon"> Buscar</span></button>                 
                    </div>
                </form>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Evidencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (isset($_GET['nombre'])) {
                            $busqueda = mysqli_real_escape_string($con, $_GET['nombre']);
                            $query = "SELECT * FROM evidencia WHERE nombre LIKE '%$busqueda%' AND IdExp='$exp_id' AND estado = 'activo'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $deta) {
                            ?>      
                           
                                    <tr>
                                        <td><?= $deta['nombre']; ?></td>
                                        <td><a href="../../<?= $deta['evidencia']; ?>" target="_blank">Ver evidencia</td>
                                        <td>
                                            <a href="menu-abo.php?controlador=evidencia-edit&idevi=<?= $deta['IdEvid']; ?>" class="btn btn-success btn-sm">Editar</a>
                                            <form action="code-evidencia.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_evi" value="<?= $deta['IdEvid']; ?>" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
             
                              <?php
                            }
                        }
                        else
                        {
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
<?php
}
?>