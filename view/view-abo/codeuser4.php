<?php
session_start();
require '../../controller/conexion.php';



if(isset($_POST['registrar']))
{
//verificación de campos llenos
    if (empty($_POST["correo"])  or empty($_POST["passwo"])) {
        $_SESSION['messager'] = "¡¡Hey!! Te falto llenar un campo en la parte de registro.";
        print("<script>alert(\"¡¡Hey!! Te falto llenar un campo en la parte de registro. \");window.location.href='menu-abo.php?controlador=usuario-create4';</script>");
    } else {
        //verificación de si esta repetido el correo.
          if(buscaRepetido($_POST["correo"]) == 1 ){
            $_SESSION['messager'] = "Ya existe este usuario en el sistema";
            print("<script>alert(\"Ya existe este usuario en el sistema. \");window.location.href='menu-abo.php?controlador=usuario-create4';</script>");
          }else{
            //validación de la contraseña si cumple con los requisitos.
            if(validar_clave($_POST["passwo"])){
              print("<script>alert(\"La contraseña no cumple con los requisitos. Por favor ingresa una contraseña mayor de 8 caracteres, con mayuscula, minuscula y números. \");window.location.href='menu-abo.php?controlador=usuario-create4';</script>");
            }else{
              //Datos desde la vista.
              $email = mysqli_real_escape_string($con, $_POST['correo']);
              $password = mysqli_real_escape_string($con, $_POST['passwo']);
              $rol = mysqli_real_escape_string($con, $_POST['tipo']);
              $tipo=" ";
              $two_factor = 0;
              $estado="activo";
              //zona horaria Tegucigalpa, para registro en el sistema.
              date_default_timezone_set('America/Tegucigalpa');
              $fechaingreso = date('m-d-Y h:i:s ', time());  
              

              //Método de encriptación AES-256-CBC
              //Método de encriptaciónaes-128-gcm
          /*    $encrypt_method = "AES-256-CBC";
              $key = 'This is my secre';
              $ivlen = openssl_cipher_iv_length($encrypt_method);
              $iv = openssl_random_pseudo_bytes($ivlen);
              $encrip = openssl_encrypt($password, $encrypt_method, $key,$options=0, $iv, $tag);*/

              $encrypt_method = "AES-256-CBC";
              $key = 'This is my secre';
              $encrip = openssl_encrypt($password, $encrypt_method, $key);
      
              //registro de usuario 
              $queryuser = "INSERT INTO usuario (correo,contra,rol,tipo,two_factor_key,estado,fechaingreso) VALUES ('$email','$encrip','$rol','$tipo','$two_factor','$estado','$fechaingreso')";
              $query_runuser = mysqli_query($con, $queryuser);


              //Recuperación de datos de la tabla de usuario para las variables de session.
              $query1 = "SELECT iduser FROM usuario WHERE correo='$email' ";
              $query_run2 = mysqli_query($con, $query1);
              $datas = mysqli_fetch_array($query_run2);
              
              $id = $datas['iduser'];

                //perfil inserto
            
                $pnombre = mysqli_real_escape_string($con, $_POST['nombrepr']);
                $snombre = mysqli_real_escape_string($con, $_POST['nombrese']);
                $papellido = mysqli_real_escape_string($con, $_POST['apellidopr']);
                $sapellido = mysqli_real_escape_string($con, $_POST['apellidose']);
                $telefono = mysqli_real_escape_string($con, $_POST['telefonoss']);
                $celular = mysqli_real_escape_string($con, $_POST['celularss']);
                $direccion = mysqli_real_escape_string($con, $_POST['direccion']);
                $fecha = mysqli_real_escape_string($con, $_POST['fechas']);
                $pais = mysqli_real_escape_string($con, $_POST['pais']);
                $genero = mysqli_real_escape_string($con, $_POST['genero']);

                $dni = mysqli_real_escape_string($con, $_POST['identidadh']);
                
                if($rol==3){
                    $ocupacion = "Abogado";
                }else {
                    $ocupacion = "Asistente legal";
                }
                             
                $foto = " ";

                //inser del perfil
                $queryperfil = "INSERT INTO perfil (primer_nomb,segundo_nomb,primer_ape,segundo_ape,telefono,celular,direccion,DNI,IdPais,fecha_naci,ocupacion,genero,foto,IdUser) VALUES ('$pnombre','$snombre','$papellido','$sapellido','$telefono','$celular','$direccion','$dni','$pais','$fecha','$ocupacion','$genero','$foto','$id')";
                $query_runperfil = mysqli_query($con, $queryperfil);


                $queryrecu = "SELECT IdPer FROM perfil WHERE IdUser='$id' ";
                $query_runrecu = mysqli_query($con, $queryrecu);
                $datasrecu = mysqli_fetch_array($query_runrecu);

                $idpers = $datasrecu['IdPer'];

                $numeros = mysqli_real_escape_string($con, $_POST['numeros']);
                $especiali = mysqli_real_escape_string($con, $_POST['especiali']);
                
                $queryabo = "INSERT INTO abogado (nume_abo,IdEsp,IdPer) VALUES ('$numeros','$especiali','$idpers')";
                $query_runabo = mysqli_query($con, $queryabo);


              
              //Verificación de si existe error de inserción
              if($query_runuser = 1){
               
                $iduser = $_SESSION['iduser'];

                //Recuperación de datos de la tabla de usuario para las variables de session.
                $query12 = "SELECT iduser FROM usuario WHERE correo='$email' ";
                $query_run22 = mysqli_query($con, $query12);
                $datas = mysqli_fetch_array($query_run22);

                $id = $datas['iduser'];
                
                //Datos de bitacora
                $actividad = "Registro Nuevo Abogado";
                $tabla="Usuario";


                //Inserción de la bitacora.
                $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
                $query_runbita = mysqli_query($con, $querybita);



                print("<script>alert(\"Se registro el usuario. Continuar con el registro. \"); window.location.href='menu-abo.php?controlador=mostrar-perfil-abog';</script>");
              

              }else{
                print("<script>alert(\"No se pudo registrar el usuario, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=usuario-create4';</script>");
                exit(0);
              
              }      

            }
          } 

     
    }
}



/* Se crea la función para validar que la contraseña contenga los caracteres necesarios */
function validar_clave($pass1){
    if(strlen($pass1) < 8){
      $_SESSION['message'] = "La clave debe tener al menos 8 caracteres";
       return true;
    }
    if(strlen($pass1) > 16){
      $_SESSION['message'] = "La clave no puede tener más de 16 caracteres";
       return true;
    }
    if (!preg_match('`[a-z]`',$pass1)){
      $_SESSION['message'] = "La clave debe tener al menos una letra minúscula";
       return true;
    }
    if (!preg_match('`[A-Z]`',$pass1)){
      $_SESSION['message'] = "La clave debe tener al menos una letra mayúscula";
       return true;
    }
    if (!preg_match('`[0-9]`',$pass1)){
      $_SESSION['message'] = "La clave debe tener al menos un caracter numérico";
       return true;
    }
    $_SESSION['message'] = "";
    return false;
  }
  
    /* Se crea la función para buscar usuario repetido */
    function buscaRepetido($correo){
      require '../../controller/conexion.php';
  
      $conss = "SELECT * from usuario where correo='$correo'";
      $result = mysqli_query($con, $conss);
  
      if(mysqli_fetch_array($result) > 0){
          return 1;
      }else{
          return 0;
      }
  }
  
  ?>