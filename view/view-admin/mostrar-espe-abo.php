<?php
require '../../controller/conexion.php';
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Información especifica de los abogados</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Información</a></li>
                    <li class="breadcrumb-item active">Abogados</li>
                </ol>
            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Información de los abogados
                   <!-- <a href="menu-abo.php?controlador=pais-create" class="btn btn-primary float-end">Agregar
                        nuevo País</a> -->
                </h4> 
                                
             <!--   <form action="codepais.php" method="POST" class="d-inline">
                    <div class="position-relative">
                        <input type="text" name="busqueda_p" class="form-control" placeholder="Buscar país..." autocomplete="off" id="search-options" value="" style=" float: left; width : 250px; ">
                        <button type="submit" name="buscar" class="btn btn-primary" size=40 style=" width : 100px;"><span class="mdi mdi-magnify search-widget-icon"> Buscar</span></button>                 
                    </div>-->
                </form>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Numero de Colegiación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM abogado ";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $pais) {
                        ?>
                                <tr>
                                    <td><?= $pais['IdAbo']; ?></td>
                                    <td><?= $pais['nume_abo']; ?></td>
                                    <td>
                                        <a href="menu-abo.php?controlador=pais-edit&idpais=<?= $pais['IdPais']; ?>" class="btn btn-success btn-sm">Editar</a>
                                        <form action="codepais.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_pais" value="<?= $pais['IdPais']; ?>" class="btn btn-danger btn-sm">Eliminar</button>
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