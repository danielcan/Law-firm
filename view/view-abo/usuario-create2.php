                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Creación de nuevo usuario</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Usuario del sistema</a></li>
                                        <li class="breadcrumb-item active">Nuevo usuario</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <form action="codeuser.php" method="post" onsubmit="return validate()">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Usuario del sistema</h4>
                                        <div class="flex-shrink-0">

                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="iconrightInput" class="form-label">Correo del nuevo usuario del sistema</label>
                                                        <div class="form-icon right">
                                                            <input type="email" name="emailu" class="form-control form-control-icon" id="email" placeholder="example@gmail.com" required="required">
                                                            <i class="ri-mail-unread-line"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="basiInput" class="form-label">Contraseña</label>
                                                        <input type="password" name="passwu" class="form-control" id="basiInput" required="required">
                                                    </div>
                                                </div>


                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Perfil del Usuario</h4>
                                                    <div class="flex-shrink-0">

                                                    </div>
                                                </div><!-- end card header -->



                                                <input type="hidden" name="perfil_id" value="">

                                                <div class="col-xxl-3 col-md-6">
                                                    <label>Primer nombre</label>
                                                    <input type="text" name="primer_nombP" value="" class="form-control">
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label>Segundo nombre</label>
                                                    <input type="text" name="segundo_nombP" value="" class="form-control">
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label>Primer apellido</label>
                                                    <input type="text" name="primer_apeP" value="" class="form-control">
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label>Segundo apellido</label>
                                                    <input type="text" name="segundo_apeP" value="" class="form-control">
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label>Teléfono</label>
                                                    <input type="text" name="telefonoP" value="" class="form-control" id="tel" placeholder="(xxx)xxx-xxxx">
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label>Celular</label>
                                                    <input type="text" name="celularP" value="" class="form-control" id="cel" placeholder="(xxx)xxx-xxxx">
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label>Dirección de vivienda</label>
                                                    <input type="text" name="direccionP" value="" class="form-control">
                                                </div>


                                                <?php
                                                $consultap = "SELECT * FROM pais WHERE estado = 'activo'";
                                                $ejecutarp = mysqli_query($con, $consultap);
                                                $paisnombre = mysqli_fetch_array($ejecutarp);
                                                ?>
                                                <div class="col-xxl-3 col-md-6">
                                                    <label>Pais de nacimiento</label>
                                                    <select name="pais_naciP" size="1" id="Esp" class="form-control" required="required">


                                                        <?php

                                                        $consultac = "SELECT * FROM pais WHERE estado = 'activo'";
                                                        $ejecutarc = mysqli_query($con, $consultac);
                                                        ?>

                                                        <?php foreach ($ejecutarc as $opcionesc) : ?>


                                                            <option value="<?php echo $opcionesc['IdPais'] ?>"><?php echo $opcionesc['nombre'] ?> </option>

                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label for="valueInput" class="form-label">Número de identidad</label>
                                                    <input type="text" name="DNIP" value="" class="form-control" id="DNIh">
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label for="valueInput" class="form-label">Número de identidad</label>
                                                    <input type="text" name="DNIP" value="" class="form-control" id="DNIc">
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label>Fecha de nacimiento</label>
                                                    <input type="date" name="fecha_naciP" value="" class="form-control">
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label>Ocupación</label>
                                                    <input type="text" name="ocupacionP" value="" class="form-control">
                                                </div>


                                                <div class="col-xxl-3 col-md-6">
                                                    <label>Genero</label>
                                                    <select name="generoP" size="1" id="genero" class="form-control" required="required">
                                                        <option value=""></option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>


                                                <div class="col-xxl-3 col-md-6">
                                                    <label for="basiInput" class="form-label">Tipo de usuario</label>
                                                    <select name="tipo" size="1" id="tipo" class="form-control" required="required">
                                                        <option value="">Tipo de usuario....</option>
                                                        <option value="3">Abogado</option>
                                                        <option value="4">Asistente legal</option>
                                                    </select>
                                                </div>

                                                
                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Perfil del Usuario</h4>
                                                    <div class="flex-shrink-0">

                                                    </div>
                                                </div><!-- end card header -->

                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="basiInput" class="form-label">Numero de colegiación</label>
                                                        <input type="text" name="numeCole" class="form-control" id="basiInput" required="required">
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-md-6">
                                                    <label for="exampleDataList" class="form-label">Especialización</label>
                                                    <select name="especiali" size="1" id="Esp" class="form-control" required="required">
                                                        <option value=""></option>
                                                        <?php

                                                        $consultaj = "SELECT * FROM especialidad where estado='activo'";
                                                        $ejecutarj = mysqli_query($con, $consultaj);
                                                        ?>

                                                        <?php foreach ($ejecutarj as $opcionesj) : ?>

                                                            <option value="<?php echo $opcionesj['IdEsp'] ?>"><?php echo $opcionesj['nombre'] ?></option>

                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <!--end col-->
                                                <div class="col-xxl-3 col-md-6">
                                                    <div style="position: absolute;top: 40%;">
                                                        <button type="submit" name="registrar" class="btn btn-primary">Agregar usuario</button>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                            <!--end row-->
                                        </div>
                                    </div>

                            </div>
                            </form>
                        </div>
                        <!--end col-->
                    </div>

<script>
    function validate(){        
    var email = document.getElementById("email").value;
    if (email == null || email.length == 0){
        alert("Introduzca un email");
        return false;
    }else if (!(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(email))){
        alert("La dirección de email es incorrecta");
        return false
    }
 
    //alert("Datos correctos.");
    return true;
}
</script>