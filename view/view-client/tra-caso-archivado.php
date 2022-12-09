<?php
require '../../controller/conexion.php';
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Mis Expedientes antiguos</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Expedientes </a></li>
                    <li class="breadcrumb-item active">Mostrar expedientes</li>
                </ol>
            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Mis Expediente
                    <!--    <a href="menu-abo.php?controlador=juzgado-create" class="btn btn-primary float-end">Agregar nuevo juzgado</a>-->
                </h4>
                <form action="codeexpe.php" method="POST" class="d-inline">
                    <div class="position-relative">
                        <input type="hidden" name="exp_id" value="<?= $exp_id; ?>">
                        <input type="text" name="busqueda_exp" class="form-control" placeholder="Buscar nombre expediente..." autocomplete="off" id="search-options" value="" style=" float: left; width : 250px; ">
                        <button type="submit" name="buscar" class="btn btn-primary" size=40 style=" width : 100px;"><span class="mdi mdi-magnify search-widget-icon"> Buscar</span></button>
                    </div>
                </form>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cliente</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT e.IdExp,e.nombre,e.tipo FROM expediente AS e WHERE e.IdUser = $iduser AND  e.estado='finalizado'";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $caso) {
                        ?>
                                <tr>
                                    <td><?= $caso['nombre']; ?></td>
                                   
                                    <td><?= $caso['tipo']; ?></td>
                                    <td>
                                        <a href="menu-client.php?controlador=expediente-view&idexp=<?= $caso['IdExp']; ?>" class="btn btn-info btn-sm">Vista expediente</a>
                                        <a href="menu-client.php?controlador=mostrar-detaexp-archivado&idexp=<?= $caso['IdExp']; ?>" class="btn btn-secondary btn-sm">Detalles</a>
                                        <a href="menu-client.php?controlador=mostrar-documento-archivado&idexp=<?= $caso['IdExp']; ?>" class="btn btn-secondary btn-sm">Documentos</a>
                                        
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