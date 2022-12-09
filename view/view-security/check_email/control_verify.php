<?php
session_start();
require '../../../controller/conexion.php';
require_once ("../../../controller/security/PHPMailer/clsMail.php");

if(isset($_POST['verifica']))
{

    // retraccion de datos.
    $num1 = mysqli_real_escape_string($con, $_POST['numero1']);
    $num2 = mysqli_real_escape_string($con, $_POST['numero2']);
    $num3 = mysqli_real_escape_string($con, $_POST['numero3']);
    $num4 = mysqli_real_escape_string($con, $_POST['numero4']);
    //Concatenación de los valores para verificar.
    $valor = $num1.$num2.$num3.$num4;
    //recuperación de variable de session id usuario iniciado de session.
    $iduser = $_SESSION['iduser'];
    //recuperación de numero de doble factor y correo.
    $consulta2 = "SELECT correo, two_factor_key  FROM usuario WHERE iduser='$iduser'";
    $query_run1 = mysqli_query($con, $consulta2);
    //recuperación de dato en array
    $data = mysqli_fetch_array($query_run1);
    //traspaso a variable más sensillo.
    $valorB = $data['two_factor_key'];
    
    if($valor==$valorB){
      header("Location: aceptacion.php");
    }else{
      //reenvio de código
      $email = $data['correo'];

      $mailSend = new clsMail();
  
      $two_factor_key = rand(1000,9999);
      $_SESSION['two_factor'] = $two_factor_key;

      $consulta = "UPDATE usuario SET two_factor_key = '$two_factor_key' WHERE iduser = '$iduser'"; 
      $sql = mysqli_query($con, $consulta);
  
      $bodyHTML = '
          <h2>Saludos, Código de verificación</h2>
          <p>Tu código de verificación es :</p>
          <h2>'.$two_factor_key.'</h2>
          <br>
          <br>
          <br>
          Saludos.';
      
      $enviado =  $mailSend->metEnviar("Correo confirmación por error","Confirmación","$email","Correo de Verificación", $bodyHTML);

      $_SESSION['message'] = "¡¡Hey!!  Ingrese los dígitos correctos enviados a tu correo... Código Reenviado a tu correo.";
      header("Location: inicial.php");
    }
}
?>/