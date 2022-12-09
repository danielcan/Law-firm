<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!--importar script da máscara-->
<script src="formMask_V2.js"></script>
<div class="container mt-5">


    <?php //include('message.php'); 
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Por favor ingresa tus datos personales.</h1>
                </div>
                <div class="card-body">
                    <form action="codeperfil.php" method="POST">

                        <div class="mb-3">
                            <h3>Primer nombre</h3>
                            <input type="text" name="pnombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <h3>Segundo nombre</h3>
                            <input type="text" name="snombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <h3>Primer apellido</h3>
                            <input type="text" name="papellido" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <h3>Segundo apelido</h3>
                            <input type="text" name="sapellido" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <h3>Teléfono</h3>
                            <input type="text" id="tel" name="telefono" class="form-control">
                        </div>

                        <div class="mb-3">
                            <h3>Celular</h3>
                            <input type="text" id="cel" name="celular" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <h3>Dirección</h3>
                            <input type="text" name="direccion" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <h3>Numero Identidad</h3>
                            <input type="text" id="DNI" name="identidad" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <h3>País de nacimiento</h3>
                            <select name="pais" size="1" id="Esp" class="form-control">
                                <option value="">Escoger país...</option>
                                <?php
                                require 'conexion.php';
                                $consultaj = "SELECT * FROM pais";
                                $ejecutarj = mysqli_query($con, $consultaj);
                                ?>

                                <?php foreach ($ejecutarj as $opcionesj) : ?>

                                    <option value="<?php echo $opcionesj['IdPais'] ?>"><?php echo $opcionesj['nombre'] ?></option>

                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <h3>Fecha nacimiento</h3>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <h3>Ocupación</h3>
                            <input type="text" name="ocupacion" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <h3>Genero</h3>
                            <select name="genero" size="1" id="genero" class="form-control" required="required">
                                <option value="">Escoger genero...</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="save_perfil" class="btn btn-primary">Siguiente</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>