<?php
session_start();
require 'conexion.php';



if(isset($_POST['registrar']))
{
//verificación de campos llenos
    if (empty($_POST["email"])  or empty($_POST["passw"]) or empty($_POST["verify"])) {
        $_SESSION['message'] = "¡¡Hey!! Te falto llenar un campo en la parte de registro.";
        header("Location: sv.php");
    } else {
      //verificación de campos de contraseñas iguales
      if($_POST["passw"]!=$_POST['verify']){
        $_SESSION['message'] = "¡¡Hey!! Para registrate asegúrate que sean idénticas las contraseñas. ";
        header("Location: sv.php");
      }else{
        //verificación de si esta repetido el correo.
          if(buscaRepetido($_POST["email"]) == 1 ){
            $_SESSION['message'] = "Ya existe este usuario en el sistema";
            header("Location: sv.php");
          }else{
            //validación de la contraseña si cumple con los requisitos.
            if(validar_clave($_POST["passw"])){
              header("Location: sv.php");
            }else{
              //Datos desde la vista.
              $email = mysqli_real_escape_string($con, $_POST['email']);
              $password = mysqli_real_escape_string($con, $_POST['passw']);
              $rol = 1;
              $two_factor = 0;
              $estado="activo";
              //zona horaria Tegucigalpa, para registro en el sistema.
              date_default_timezone_set('America/Tegucigalpa');
              $fechaingreso = date('m-d-Y h:i:s ', time());  
             

              //Método de encriptación AES-256-CBC
              $encrypt_method = "AES-256-CBC";
              $key = 'This is my secre';
              $encrip = openssl_encrypt($password, $encrypt_method, $key);
      
              //registro de usuario 
              $query = "INSERT INTO usuario (correo,contra,rol,two_factor_key,estado,fechaingreso) VALUES ('$email','$encrip',$rol,$two_factor,'$estado','$fechaingreso')";
              $query_run = mysqli_query($con, $query);
            
              //Verificación de si existe error de inserción
              if($query_run == 1){
               
                //Recuperación de datos de la tabla de usuario para las variables de session.
                $query1 = "SELECT iduser,correo,rol FROM usuario WHERE correo='$email' ";
                $query_run2 = mysqli_query($con, $query1);
                $data = mysqli_fetch_array($query_run2);

                $iduser = $data['iduser'];
                $_SESSION['iduser'] = $data['iduser'];
                $_SESSION['correo'] = $data['correo'];
                $_SESSION['rol'] = $rol; 
                
                //Datos de bitacora
                $actividad = "Registro Nuevo Cliente";
                $tabla="Usuario";


                //Inserción de la bitacora.
                $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
                $query_runbita = mysqli_query($con, $querybita);

                //redirige al registro de perfil.
                header("Location: svperfil.php");
      
              }else{
                $_SESSION['message'] = "Ocurrio un error en el registro";
                header("Location: sv.php");
              }      

            }
          } 

      }
    }
}




if(isset($_POST['inicio']))
{

  $emailo = mysqli_real_escape_string($con, $_POST['emailo']);
  $passwr =  mysqli_real_escape_string($con,$_POST['passwo']);

 if (empty($_POST['emailo'])  or empty($_POST['passwo']) ) {
   $_SESSION['message'] = "¡¡Hey!!  Te falto un campo para loguearte.";
   header("Location: sv.php");
 } else {
   //arreglar
   $cons = "SELECT iduser,correo,contra,rol,two_factor_key,estado FROM usuario WHERE correo ='$emailo'";
   $query_r = mysqli_query($con, $cons);
   $datasr = mysqli_fetch_array($query_r);

   if (mysqli_num_rows($query_r) > 0) {

    //verificacion de contraseña con password verify

        //AES-256-CBC
        //AES-128-ECB
    $encrypt_method = "AES-256-CBC";
    $key = 'This is my secre';
    $ver = openssl_decrypt($datasr['contra'], $encrypt_method, $key);

    
   if ($passwr == $ver) {

    if($datasr['estado']=="activo"){
       $_SESSION ['iduser'] = $datasr['iduser'];
        $_SESSION ['rol'] = $datasr['rol'];
        $_SESSION['correo'] = $emailo;
        //envio de código por email para
       

        //cambiar
        header("Location: ../check_QR/inicial.php");

      }else{
         $_SESSION['message'] = "Por los momentos tu usuario esta desactivado.";
         header("Location: sv.php");
     }
    }else{
      $_SESSION['message'] = "Contraseña incorrecta";
      header("Location: sv.php");
    }
   }else{
    $_SESSION['message'] = "Correo incorrecta";
    header("Location: sv.php");
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
    require 'conexion.php';

    $conss = "SELECT * from usuario where correo='$correo'";
    $result = mysqli_query($con, $conss);

    if(mysqli_fetch_array($result) > 0){
        return 1;
    }else{
        return 0;
    }
}
