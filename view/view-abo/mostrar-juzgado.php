<?php
    require '../../controller/conexion.php';
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Juzgados</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Juzgados </a></li>
                    <li class="breadcrumb-item active">Detalles de juzgados</li>
                </ol>
            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Detalle de los juzgados
                    <a href="menu-abo.php?controlador=juzgado-create" class="btn btn-primary float-end">Agregar
                        nuevo juzgado</a>
                </h4>
                <form action="codejuzgado.php" method="POST" class="d-inline">
                    <div class="position-relative">
                        <input type="text" name="busqueda_j" class="form-control" placeholder="Buscar Juzgado..." autocomplete="off" id="search-options" value="" style=" float: left; width : 250px; ">
                        <button type="submit" name="buscar" class="btn btn-primary" size=40 style=" width : 100px;"><span class="mdi mdi-magnify search-widget-icon"> Buscar</span></button>                 
                    </div>
                </form>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                    $query = "SELECT * FROM juzgado WHERE estado='activo'";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $juzgado)
                                        {
                                            ?>
                        <tr>
                            <td><?= $juzgado['IdJuz']; ?></td>
                            <td><?= $juzgado['nombre']; ?></td>
                            <td><?= $juzgado['descripcion']; ?></td>
                            <td>
                                <a href="menu-abo.php?controlador=juzgado-view&id=<?= $juzgado['IdJuz'];?>"
                                    class="btn btn-info btn-sm">Vista</a>
                                <a href="menu-abo.php?controlador=juzgado-edit&id=<?= $juzgado['IdJuz']; ?>"
                                    class="btn btn-success btn-sm">Editar</a>
                                <form action="codejuzgado.php" method="POST" class="d-inline">
                                    <button type="submit" name="delete_juzga" value="<?=$juzgado['IdJuz'];?>"
                                        class="btn btn-danger btn-sm">Eliminar</button>
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
                                ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>