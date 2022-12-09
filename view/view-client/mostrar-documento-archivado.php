<?php
require '../../controller/conexion.php';
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Documento del expediente</h4>


            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Documento del expediente</a></li>
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
                    <h4>Documentos del expediente
                        <a href="menu-client.php?controlador=tra-caso-archivado" class="btn btn-secondary ">Regresar </a>
                    </h4>

                    <form action="code-documento.php" method="POST" class="d-inline">
                        <div class="position-relative">
                            <input type="hidden" name="exp_id" value="<?= $exp_id; ?>">
                            <input type="text" name="busqueda_doc" class="form-control" placeholder="Buscar documento..." autocomplete="off" id="search-options" value="" style=" float: left; width : 250px; ">
                            <button type="submit" name="buscar" class="btn btn-primary" size=40 style=" width : 100px;"><span class="mdi mdi-magnify search-widget-icon"> Buscar</span></button>
                        </div>
                    </form>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Documento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM documento WHERE IdExp='$exp_id' and estado='activo'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $deta) {
                            ?>
                                    <tr>
                                        <td><?= $deta['nombre']; ?></td>
                                        <td><a href="../../<?= $deta['documento']; ?>" target="_blank"><?= $deta['documento']; ?></td>
          
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<h5> Aun no hay documentos en este expediente. </h5>";
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