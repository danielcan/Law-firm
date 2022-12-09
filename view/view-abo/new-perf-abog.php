<?php

$dato = $_GET['id'];

?>

<!--importar script da máscara-->
<script src="formMask_V2.js"></script>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Creación de nuevo abogado</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Abogados dentro del sistema</a></li>
                    <li class="breadcrumb-item active">perfil de abogado</li>
                </ol>
            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Agrega el perfil del abogado</h4>
                <div class="flex-shrink-0">

                </div>
            </div><!-- end card header -->
            <form action="codeperfil.php" method="post">
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">

                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">Primer nombre</label>
                                    <input type="text" name="pnombre" class="form-control" id="valueInput">
                                </div>
                            </div>


                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">Segundo nombre</label>
                                    <input type="text" name="snombre" class="form-control" id="valueInput">
                                </div>
                            </div>

                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">Primer apellido</label>
                                    <input type="text" name="papellido" class="form-control" id="valueInput">
                                </div>
                            </div>

                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">Segundo apellido</label>
                                    <input type="text" name="sapellido" class="form-control" id="valueInput">
                                </div>
                            </div>


                            <div class="col-xl-6">
                                <div class="mb-3 mb-xl-0">
                                    <label for="cleave-phone"  class="form-label">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" id="tel" placeholder="(xxx)xxx-xxxx">
                                </div>
                            </div><!-- end col -->
 

                            <div class="col-xl-6">
                                <div class="mb-3 mb-xl-0">
                                    <label for="cleave-phone" class="form-label">Celular</label>
                                    <input type="text" name="celular" class="form-control" id="cel" placeholder="(xxx)xxx-xxxx">
                                </div>
                            </div><!-- end col -->

                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">Dirección de vivienda</label>
                                    <input type="text" name="direccion" class="form-control" id="valueInput">
                                </div>
                            </div>

                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">Número de identidad</label>
                                    <input type="text" name="identidad" class="form-control" id="DNI">
                                </div>
                            </div>

                            <div class="col-xxl-3 col-md-6">
                                <label for="exampleDataList" class="form-label">Pais de nacimiento</label>
                                <select name="pais" size="1" id="Esp" class="form-control">
                                    <option value="">Escoger país...</option>
                                    <?php
                                    
                                    $consultaj = "SELECT * FROM pais";
                                    $ejecutarj = mysqli_query($con, $consultaj);
                                    ?>

                                    <?php foreach ($ejecutarj as $opcionesj) : ?>

                                        <option value="<?php echo $opcionesj['IdPais'] ?>"><?php echo $opcionesj['nombre'] ?></option>

                                    <?php endforeach ?>
                                </select>
                            </div>


                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="cleave-date" class="form-label">Fecha de nacimiento</label>
                                    <input type="date" name="fecha" class="form-control" placeholder="DD-MM-YYYY" id="cleave-date">
                                </div>

                            </div><!-- end col -->


                            <div class="col-xxl-3 col-md-6">
                                <label for="exampleDataList" class="form-label">Genero</label>
                                <input class="form-control" name="genero" list="datalistGenero" id="exampleDataList" placeholder="Selecciona...">
                                <datalist id="datalistGenero">
                                    <option value="Masculino">
                                    <option value="Femenino">
                                </datalist>
                            </div>


                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <input type="text" name="id_usu" class="form-control" value="<?= $dato ?>" hidden>

                                </div>
                            </div>

                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <button type="submit" name="save_perfil" class="btn btn-primary">Agregar perfil abogado</button>
                                </div>
                            </div>

                        </div>
                        <!--end row-->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end col-->
</div>