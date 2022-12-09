<?php
session_start();
//require 'conexion.php';
require '../../../controller/conexion.php';
require_once ("../../../controller/security/PHPMailer/clsMail.php");

if(isset($_POST['save_perfil']))
{
    //datos de registro perfil de la vista
   

    $pnombre = mysqli_real_escape_string($con, $_POST['pnombre']);
    $snombre = mysqli_real_escape_string($con, $_POST['snombre']);
    $papellido = mysqli_real_escape_string($con, $_POST['papellido']);
    $sapellido = mysqli_real_escape_string($con, $_POST['sapellido']);
    $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
    $celular = mysqli_real_escape_string($con, $_POST['celular']);
    $direccion = mysqli_real_escape_string($con, $_POST['direccion']);
    $dni = mysqli_real_escape_string($con, $_POST['identidad']);
    $pais = mysqli_real_escape_string($con, $_POST['pais']);
    $fecha = mysqli_real_escape_string($con, $_POST['fecha']);
    $ocupacion = mysqli_real_escape_string($con, $_POST['ocupacion']);
    $genero = mysqli_real_escape_string($con, $_POST['genero']);
    $foto = NULL;

    $iduser = $_SESSION['iduser'];


    $query = "INSERT INTO perfil (`primer_nomb`, `segundo_nomb`, `primer_ape`, `segundo_ape`, `telefono`, `celular`, `direccion`, `DNI`, `IdPais`, `fecha_naci`, `ocupacion`, `genero`,`foto`, `IdUser`) VALUES ('$pnombre','$snombre','$papellido','$sapellido','$telefono','$celular','$direccion','$dni','$pais','$fecha','$ocupacion','$genero',NULL,'$iduser')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $email = $_SESSION['correo'];

        //código de envio por mail
        $mailSend = new clsMail();
            
        $two_factor_key = rand(1000,9999);
      
        $consulta = "UPDATE usuario SET two_factor_key = '$two_factor_key' WHERE iduser = '$iduser'"; 
        $sql = mysqli_query($con, $consulta);
      
        $bodyHTML = '
        <h2>¡¡Bienvenido al sistema de Bufete legal!! </h2>
        <h2>Código de verificación</h2>
        <p>Tu código de verificación es: </p>
        <h2>'.$two_factor_key.'</h2>
        <br>
        <br>
        <br>
        Saludos.';
      
        $enviado =  $mailSend->metEnviar("Correo confirmación","confirmación","$email","Correo de Verificación", $bodyHTML);
                      
        $_SESSION['message'] = null;
        header("Location: ../check_email/inicial.php");


    }
    else
    {
        $_SESSION['message'] = "Error de autenticación";
        header("Location: svperfil.php");
        exit(0);
    }
}
