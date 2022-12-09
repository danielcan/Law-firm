<?php
require '../../controller/conexion.php';

?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Administración especialidades de los abogados</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Especialidad</a></li>
                    <li class="breadcrumb-item active">Detalles de Especialidad</li>
                </ol>
            </div>

        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Especialidades registrados en el sistema
                    <a href="menu-abo.php?controlador=especialidad-create" class="btn btn-primary float-end">Agregar
                        nueva Especialidad</a>
                </h4>

                <form action="codeesp.php" method="POST" class="d-inline">
                    <div class="position-relative">
                        <input type="text" name="busqueda_e" class="form-control" placeholder="Buscar especialidad..." autocomplete="off" id="search-options" value="" style=" float: left; width : 250px; ">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['nombre'])) {
                            $busqueda = mysqli_real_escape_string($con, $_GET['nombre']);
                            $query = "SELECT * FROM especialidad WHERE nombre LIKE '%$busqueda%' AND estado = 'activo'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $espe) {
                        ?>
                                    <tr>
                                        <td><?= $espe['IdEsp']; ?></td>
                                        <td><?= $espe['nombre']; ?></td>
                                        <td>
                                            <a href="menu-abo.php?controlador=especialidad-edit&idesp=<?= $espe['IdEsp']; ?>" class="btn btn-success btn-sm">Editar</a>
                                            <form action="codeesp.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_espe" value="<?= $espe['IdEsp']; ?>" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                        <?php
                                }
                            } else {
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