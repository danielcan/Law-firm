<script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 37, 39, 46];

        tecla_especial = false
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if (letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }

    function limpia() {
        var val = document.getElementById("numero").value;
        var tam = val.length;
        for (i = 0; i < tam; i++) {
            if (!isNaN(val[i]))
                document.getElementById("numero").value = '';
        }
    }
</script>

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


<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/estiloss.css">
</head>

<body>
    <main>
        <form action="codeuser4.php" class="formulario" id="formulario" method="post">

            <!-- Grupo: Correo Electronico -->
            <div class="formulario__grupo" id="grupo__correo">
                <label for="correo" class="formulario__label">Correo Electrónico</label>
                <div class="formulario__grupo-input">
                    <input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El correo solo puede contener letras, números, puntos, guiones y
                    guion bajo.</p>
            </div>

            <!-- Grupo: Contraseña -->  
            <div class="formulario__grupo" id="grupo__passwo">
                <label for="passwo" class="formulario__label">Contraseña</label>
                <div class="formulario__grupo-input">
                    <input type="password" class="formulario__input" name="passwo" id="passwo" placeholder="*************">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">La contraseña tiene que ser de 8 a 16 letras, números, mayusculas y minuscula.</p>
            </div>

            <!-- 
			<div class="formulario__grupo" id="grupo__password2">
				<label for="password2" class="formulario__label">Repetir Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="password2" id="password2">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
			</div> 
            Grupo: Contraseña 2 -->


            <!-- Grupo: Nombre -->
            <div class="formulario__grupo" id="grupo__nombrepr">
                <label for="nombrepr" class="formulario__label">Primer nombre</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="nombrepr" id="nombrepr" placeholder="Primer nombre">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El primer nombre tiene que ser de 4 a 16 letras y solo puede contener
                    letras.</p>
            </div>

            <!-- Grupo: Nombre -->
            <div class="formulario__grupo" id="grupo__nombrese">
                <label for="nombrese" class="formulario__label">Segundo nombre</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="nombrese" id="nombrese" placeholder="Segundo nombre">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El segundo nombre tiene que ser de 4 a 16 letras y solo puede contener
                    letras.</p>
            </div>

            <!-- Grupo: Nombre -->
            <div class="formulario__grupo" id="grupo__apellidopr">
                <label for="apellidopr" class="formulario__label">Primer apellido</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="apellidopr" id="apellidopr" placeholder="Primer apellido">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El primer apellido tiene que ser de 4 a 16 letras y solo puede contener
                    letras.</p>
            </div>

            <!-- Grupo: Nombre -->
            <div class="formulario__grupo" id="grupo__apellidose">
                <label for="apellidose" class="formulario__label">Segundo apellido</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="apellidose" id="apellidose" placeholder="Segundo apellido">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El segundo apellido tiene que ser de 4 a 16 letras y solo puede contener
                    letras.</p>
            </div>

            <!-- Grupo: Teléfono -->
            <div class="formulario__grupo" id="grupo__telefono">
                <label for="telefono" class="formulario__label">Teléfono</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="telefonoss" id="telefonoss" placeholder="(+504) 2222-2222">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El número de telefono solo puede contener numeros y el maximo son 14 dígitos.
                </p>
            </div>

            <!-- Grupo: Teléfono -->
            <div class="formulario__grupo" id="grupo__celular">
                <label for="celular" class="formulario__label">Celular</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="celularss" id="celularss" placeholder="(+504) 9999-9999">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El número de celular solo puede contener números y el maximo son 14 dígitos.
                </p>
            </div>

            <!-- Grupo: Usuario -->
            <div class="formulario__grupo" id="grupo__direccion">
                <label for="direccion" class="formulario__label">Dirección de vivienda</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="direccion" id="direccion" placeholder="Residencial o colonia." require>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener
                    números, letras.</p>
            </div>


            <!-- Grupo: Usuario -->
            <div class="formulario__grupo" id="grupo__fecha">
                <label for="fecha" class="formulario__label">Fecha de nacimiento</label>
                <div class="formulario__grupo-input">
                    <input type="date" class="formulario__input" name="fechas" id="fechas" min="1950-01-01" max="2000-12-31">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Por favor ingresa fecha de nacimiento con mayor de edad.</p>
            </div>



            <!-- Grupo: Usuario -->
            <div class="formulario__grupo" id="grupo__pais">
                <label for="pais" class="formulario__label">País de nacimiento</label>

                <?php
                $consultap = "SELECT * FROM pais WHERE estado = 'activo'";
                $ejecutarp = mysqli_query($con, $consultap);
                $paisnombre = mysqli_fetch_array($ejecutarp);
                ?>
                <div class="formulario__grupo-input">
                    <select name="pais" id="pais" class="formulario__input" >

                        <option value="">País de nacimiento....</option>
                        <?php

                        $consultac = "SELECT * FROM pais WHERE estado = 'activo'";
                        $ejecutarc = mysqli_query($con, $consultac);
                        ?>

                        <?php foreach ($ejecutarc as $opcionesc) : ?>


                            <option value="<?php echo $opcionesc['IdPais'] ?>"><?php echo $opcionesc['nombre'] ?> </option>

                        <?php endforeach ?>
                    </select>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener
                    numeros, letras y guion bajo.</p>
            </div>


            <!-- Grupo: Usuario -->
            <div class="formulario__grupo" id="grupo__usuario">
                <label for="identidad" class="formulario__label">DNI</label>
                <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="identidad" id="identidad" placeholder="Documento de Identificación." disabled>
                    <input type="hidden" class="formulario__input" name="identidadh" id="identidadh" placeholder="Documento de Identificación Hondureña."  pattern="[0,1]{1}[1-8]{1}[0-2]{1}[0-8]{1}[-][1-2]{1}[0-9]{1}[0-9]{1}[0-9]{1}[-][0-9]{5}">
                    <input type="hidden" class="formulario__input" name="identidadc" id="identidadc" placeholder="Documento de Identificación Costarricense." >
                    <input type="hidden" class="formulario__input" name="identidadE" id="identidadE" placeholder="Documento de Identificación Salvadoreña." >
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener
                    números, letras.</p>
            </div>


            <!-- Grupo: Usuario -->
            <div class="formulario__grupo" id="grupo__usuario">
                <label for="usuario" class="formulario__label">Genero</label>
                <div class="formulario__grupo-input">

                    <select name="genero" id="genero" class="formulario__input" >
                        <option value="">Genero....</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener
                    numeros, letras y guion bajo.</p>
            </div>


            <!-- Grupo: Usuario -->
            <div class="formulario__grupo" id="grupo__usuario">
                <label for="tipo" class="formulario__label">Tipo de usuario</label>
                <div class="formulario__grupo-input">
                    <select name="tipo" id="tipo" class="formulario__input" >
                        <option value="">Tipo de usuario....</option>
                        <option value="3">Abogado</option>
                        <option value="4">Asistente legal</option>
                    </select>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener
                    numeros, letras y guion bajo.</p>
            </div>

            <!-- Grupo: Usuario -->
            <div class="formulario__grupo" id="grupo__numeros">
                <label for="numeros" id="numeross" class="formulario__label" style="display: none;">Número de colegiación</label>
                <div class="formulario__grupo-input">
                    <input type="hidden" class="formulario__input" name="numeros" id="numeros" placeholder="111-111" >
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener
                    numeros, letras y guion bajo.</p>
            </div>


            <div class="formulario__grupo" id="grupo__especiali">
                <label for="especiali" id="especialis" class="formulario__label" style="display: none;">Especialidad del abogado</label>
                <select name="especiali" id="especiali" class="formulario__input"  style="display: none;" onchange="">
                    <option value="">Especialidad....</option>
                    <?php

                    $consultaj = "SELECT * FROM especialidad where estado='activo'";
                    $ejecutarj = mysqli_query($con, $consultaj);
                    ?>

                    <?php foreach ($ejecutarj as $opcionesj) : ?>

                        <option value="<?php echo $opcionesj['IdEsp'] ?>"><?php echo $opcionesj['nombre'] ?></option>

                    <?php endforeach ?>
                </select>
            </div>



            <!-- Grupo: Terminos y Condiciones -->
            <div class="formulario__grupo" id="grupo__terminos">
                <label class="formulario__label">
                    <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
                    Acepto los Terminos y Condiciones
                </label>
            </div>


            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario
                    correctamente. </p>
            </div>

            <div class="formulario__grupo formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" name="registrar">Enviar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
        </form>
    </main>
  
    <script src="js/form3.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            $('#tipo').change(function(e) {
                if ($(this).val() === "3") {
                  //  $('#numero').prop("disabled", false);
                 //   $('#especiali').prop("disabled", false);
                 //cambia el label
                 document.getElementById('especialis').style.display = "inline-block";
                 document.getElementById('numeross').style.display = "inline-block";
                 //cambia los input
                    document.getElementById('numeros').setAttribute('type','text');
                    document.getElementById('especiali').style.display = "inline-block";
      
                } else {
                 //   $('#numero').prop("disabled", true);
                //    $('#especiali').prop("disabled", true);
                document.getElementById('numeross').style.display = "none";
                document.getElementById('especialis').style.display = "none";
                    document.getElementById('numeros').setAttribute('type','hidden');
                    document.getElementById('especiali').style.display = "none";
                    
                }
            })
        });

                 

        $(document).ready(function() {
            $('#pais').change(function(e) {
                if ($(this).val() === "1") {
                   // $('identidadh').prop("disabled", false);
                    new FormMask(document.querySelector("#identidadh"), "____-____-____ ", "_", ["(", ")", "-"]);
                    document.getElementById('identidadh').setAttribute('type','text');
                    document.getElementById('identidadc').setAttribute('type','hidden');
                    document.getElementById('identidad').setAttribute('type','hidden');
                    document.getElementById('identidadE').setAttribute('type','hidden');
 
                } else if ($(this).val() === "2") {
                    //$('#identidad').prop("disabled", false);
                    new FormMask(document.querySelector("#identidadc"), "_-____-_____", "_", ["(", ")", "-"]);
                    document.getElementById('identidadc').setAttribute('type','text');
                    document.getElementById('identidad').setAttribute('type','hidden');
                    document.getElementById('identidadh').setAttribute('type','hidden');
                    document.getElementById('identidadE').setAttribute('type','hidden');

                } else if ($(this).val() === "3") {
                    //$('#identidad').prop("disabled", false);
                    new FormMask(document.querySelector("#identidadE"), "________-_", "_", ["(", ")", "-"]);
                    document.getElementById('identidadE').setAttribute('type','text');
                    document.getElementById('identidad').setAttribute('type','hidden');
                    document.getElementById('identidadh').setAttribute('type','hidden');
                    document.getElementById('identidadc').setAttribute('type','hidden');

                }
                
                           
                else {
                    $('#identidad').prop("disabled", true);
                    
                }
            })
        });
    </script>

</body>

</html>