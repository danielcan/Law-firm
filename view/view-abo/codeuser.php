<?php
session_start();
require '../../controller/conexion.php';


if(isset($_POST['update_usuario']))
{
  $usuario_id = mysqli_real_escape_string($con, $_POST['usuario_id']);

  $correo = mysqli_real_escape_string($con, $_POST['correo']);
  $estado = mysqli_real_escape_string($con, $_POST['estado']);


  $query = "UPDATE usuario SET correo='$correo', estado='$estado' WHERE IdUser='$usuario_id' ";
  $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Actualización de registro de un abogado";
        $tabla="Usuario";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se actualizo exitosamente el usuario del abogado. \"); window.location.href='menu-abo.php?controlador=mostrar-user-abog';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo actualizar el usuario del abogado, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=usuario-edit-abo&id=$usuario_id';</script>");
        exit(0);
    }

}



if(isset($_POST['registrar']))
{
//verificación de campos llenos
    if (empty($_POST["emailu"])  or empty($_POST["passwu"])) {
        $_SESSION['messager'] = "¡¡Hey!! Te falto llenar un campo en la parte de registro.";
        print("<script>alert(\"¡¡Hey!! Te falto llenar un campo en la parte de registro. \");window.location.href='menu-abo.php?controlador=usuario-create';</script>");
    } else {
        //verificación de si esta repetido el correo.
          if(buscaRepetido($_POST["emailu"]) == 1 ){
            $_SESSION['messager'] = "Ya existe este usuario en el sistema";
            print("<script>alert(\"Ya existe este usuario en el sistema. \");window.location.href='menu-abo.php?controlador=usuario-create';</script>");
          }else{
            //validación de la contraseña si cumple con los requisitos.
            if(validar_clave($_POST["passwu"])){
              print("<script>alert(\"La contraseña no cumple con los requisitos. Por favor ingresa una contraseña mayor de 8 caracteres, con mayuscula, minuscula y números. \");window.location.href='menu-abo.php?controlador=usuario-create';</script>");
            }else{
              //Datos desde la vista.
              $email = mysqli_real_escape_string($con, $_POST['emailu']);
              $password = mysqli_real_escape_string($con, $_POST['passwu']);
              $rol = mysqli_real_escape_string($con, $_POST['tipo']);
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
              $queryuser = "INSERT INTO usuario (correo,contra,rol,two_factor_key,estado,fechaingreso) VALUES ('$email','$encrip',$rol,$two_factor,'$estado','$fechaingreso')";
              $query_runuser = mysqli_query($con, $queryuser);
              
              //Verificación de si existe error de inserción
              if($query_runuser = 1){
               
                $iduser = $_SESSION['iduser'];

                //Recuperación de datos de la tabla de usuario para las variables de session.
                $query1 = "SELECT iduser FROM usuario WHERE correo='$email' ";
                $query_run2 = mysqli_query($con, $query1);
                $datas = mysqli_fetch_array($query_run2);

                $id = $datas['iduser'];
                
                //Datos de bitacora
                $actividad = "Registro Nuevo Abogado";
                $tabla="Usuario";


                //Inserción de la bitacora.
                $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
                $query_runbita = mysqli_query($con, $querybita);


                //redirige al registro de perfil.
                if($rol == 3){
                  print("<script>alert(\"Se registro el usuario. Continuar con el registro. \"); window.location.href='menu-abo.php?controlador=new-perf-abog&id=$id';</script>");
                  exit(0);
                }

                if($rol == 4){
                  print("<script>alert(\"Se registro el usuario. Continuar con el registro. \"); window.location.href='menu-abo.php?controlador=new-perf-asistente&id=$id';</script>");
                  exit(0);
                }

              }else{
             //   print("<script>alert(\"No se pudo registrar el usuario, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=usuario-create';</script>");
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