<?php

require '../../controller/conexion.php';
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Editar Evidencia</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Evidencia</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<?php
if (isset($_GET['idevi'])) {
    $idevi_id = mysqli_real_escape_string($con, $_GET['idevi']);

    $query = "SELECT * FROM evidencia WHERE IdEvid='$idevi_id' ";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $evidencia = mysqli_fetch_array($query_run);
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar una evidencia
                        <a href="menu-abo.php?controlador=mostrar-evidencia&idexp=<?= $evidencia['IdExp']; ?>" class="btn btn-danger float-end">Regresar</a>
                    </h4>
                </div>
                <div class="card-body">

                        <form action="code-evidencia.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="evidencia_id" value="<?= $idevi_id ?>">
                            <input type="hidden" name="exp_id" value="<?= $evidencia['IdExp']; ?>">

                            <div class="mb-3">
                                <label>Nombre de la evidencia</label>
                                <input type="text" name="nombre_evi" value="<?= $evidencia['nombre']; ?>" class="form-control" required placeholder="Nombre de la evidencia. Ejemplo: fotografia de casa.">
                            </div>


                            <div class="mb-3">
                                <label>Formatos permitidos no mayores a (10MB): PDF, JPG, JPEG, PNG.</label>
                                <input type="file" name="doc" class="form-control">
                            </div>


                            <div class="mb-3">
                                <button type="submit" name="update_evidencia" class="btn btn-primary">
                                    Actualizar evidencia
                                </button>
                            </div>

                        </form>

                </div>
            </div>
        </div>
    </div>


<?php
 } else {
    echo "<h4>No Such Id Found</h4>";
}
}
?>