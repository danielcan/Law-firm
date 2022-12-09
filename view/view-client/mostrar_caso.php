<?php
require '../../controller/conexion.php';

$iduser = $_SESSION['iduser'];
$control = '0';
$queryobe = "SELECT * FROM expediente WHERE iduser='$iduser' and estado='activo' and tipo='caso'";
$query_runobe = mysqli_query($con, $queryobe);

if (mysqli_num_rows($query_runobe) > 0) {
    $expe = mysqli_fetch_array($query_runobe);
?>



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Caso. 
                </h4>
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label>Nombre</label>
                    <p class="form-control">
                        <?= $expe['nombre']; ?>
                    </p>
                </div>

            </div>
            <?php $idexp = $expe['IdExp']; ?>
            <div class="card-body">
               <h4>Sucesos importantes del caso.</h4>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Fecha del detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $query = "SELECT * FROM detalleexp where IdExp='$idexp' order by IdDetal desc";
                         $query_run = mysqli_query($con, $query);

                          if (mysqli_num_rows($query_run) > 0) {
                         foreach ($query_run as $caso) {
                         ?>
                        <tr>
                            <td><?= $caso['descripcion']; ?></td>
                            <td><?= $caso['fechaExp']; ?></td>

                        </tr>
                        <?php
                       }
                     } else {
                    echo "<h5> Por el momento tu abogado asignado aun no a colocado detalles de tu expediente. </h5>";
                    }
                   ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php
} else {
    echo "<h4>Tu abogado aun no a puesto el Caso.</h4>";
}

?>


<?php

$iduser = $_SESSION['iduser'];
$querydeta = "SELECT det.descripcion FROM expediente as e,detalleexp as det WHERE e.IdExp = '$control' AND e.IdExp = det.IdExp  ";
$query_rundeta = mysqli_query($con, $querydeta);

if (mysqli_num_rows($query_rundeta) > 0) {
    $deta = mysqli_fetch_array($query_rundeta);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Detalle del tramite.
                    <!-- <a href="index.php" class="btn btn-danger float-end">BACK</a>-->
                </h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Descripción del detalle</label>
                    <p class="form-control">
                        <?= $deta['descripcion']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
} else {
    
}

?>