<?php

require '../../controller/conexion.php';
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Perfil</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Perfil </a></li>
                    <li class="breadcrumb-item active">Editar perfil</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Editar perfil
                    <a href="menu-abo.php?controlador=mostrar-perfil" class="btn btn-danger float-end">Regresar</a>
                </h4>
            </div>
            <div class="card-body">

                <?php
                if (isset($_GET['id'])) {
                    $perfil_id = mysqli_real_escape_string($con, $_GET['id']);
                    $query = "SELECT * FROM perfil WHERE IdUser='$perfil_id' ";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $perfil = mysqli_fetch_array($query_run);
                ?>
                        <form action="codeperfilc.php" method="POST">
                            <input type="hidden" name="perfil_id" value="<?= $perfil['IdPer']; ?>">

                            <div class="mb-3">
                                <label>Primer nombre</label>
                                <input type="text" name="primer_nombP" value="<?= $perfil['primer_nomb']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Segundo nombre</label>
                                <input type="text" name="segundo_nombP" value="<?= $perfil['segundo_nomb']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Primer apellido</label>
                                <input type="text" name="primer_apeP" value="<?= $perfil['primer_ape']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Segundo apellido</label>
                                <input type="text" name="segundo_apeP" value="<?= $perfil['segundo_ape']; ?>"  class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label>Teléfono</label>
                                <input type="text" name="telefonoP" value="<?= $perfil['telefono']; ?>" class="form-control" id="tel" placeholder="(xxx)xxx-xxxx">
                            </div>

                            <div class="mb-3">
                                <label>Celular</label>
                                <input type="text" name="celularP" value="<?= $perfil['celular']; ?>" class="form-control" id="cel" placeholder="(xxx)xxx-xxxx">
                            </div>

                            <div class="mb-3">
                                <label>Dirección de vivienda</label>
                                <input type="text" name="direccionP" value="<?= $perfil['direccion']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="valueInput" class="form-label">Número de identidad</label>
                                <input type="text" name="DNIP" value="<?= $perfil['DNI']; ?>" class="form-control" id="DNI">
                            </div>


                            <?php
                            $pais = $perfil['IdPais'];
                            $consultap = "SELECT * FROM pais  WHERE IdPais = $pais ";
                            $ejecutarp = mysqli_query($con, $consultap);
                            $paisnombre = mysqli_fetch_array($ejecutarp);
                            ?>
                            <div class="mb-3">
                                <label>Pais de nacimiento</label>
                                <select name="pais_naciP" size="1" id="Esp" class="form-control" required="required">

                                    <option value="<?php echo $paisnombre['IdPais'] ?>"><?php echo $paisnombre['nombre'] ?> </option>
                                    <?php

                                    $consultac = "SELECT * FROM pais ";
                                    $ejecutarc = mysqli_query($con, $consultac);
                                    ?>

                                    <?php foreach ($ejecutarc as $opcionesc) : ?>


                                        <option value="<?php echo $opcionesc['IdPais'] ?>"><?php echo $opcionesc['nombre'] ?> </option>

                                    <?php endforeach ?>
                                </select>
                            </div>




                            <div class="mb-3">
                                <label>Fecha de nacimiento</label>
                                <input type="date" name="fecha_naciP" value="<?= $perfil['fecha_naci']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Ocupación</label>
                                <input type="text" name="ocupacionP" value="<?= $perfil['ocupacion']; ?>" class="form-control">
                            </div>


                            <div class="mb-3">
                                <label>Genero</label>
                                <select name="generoP" size="1" id="genero" class="form-control" required="required">
                                    <option value="<?= $perfil['genero']; ?>"><?= $perfil['genero']; ?></option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>

                            <input type="hidden" name="usuario_id" value="<?= $perfil['IdUser']; ?>">

                            <div class="mb-3">
                                <button type="submit" name="update_perfil" class="btn btn-primary">
                                    Actualizar perfil
                                </button>
                            </div>

                        </form>
                <?php
                    } else {
                        echo "<h4>No hay registro de perfil</h4>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>