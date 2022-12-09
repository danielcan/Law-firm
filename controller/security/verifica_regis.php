<?php
    require_once ("../../../controller/security/PHPMailer/clsMail.php");
    include("../../../controller/conexion.php");
    session_start();

    $mailSend = new clsMail();

    $id = $_SESSION['id'];

    $two_factor_key = rand(1000,9999);

    $consulta = "UPDATE users SET two_factor_key = '$two_factor_key' WHERE id = '$id'"; 
    $sql = mysqli_query($con, $consulta);

    $bodyHTML = '
        <h2>Saludos, Codigo de verificación</h2>
        <p>Tu codigo de verificación es :</p>
        <h2>'.$two_factor_key.'</h2>
        <br>
        <br>
        <br>
        Saludos.';
    
    $enviado =  $mailSend->metEnviar("Prueba","Correos Prueba","danielcanc@gmail.com","Correo de Verificación", $bodyHTML);

    
    if(isset($_POST['verifica']))
{

    $num1 = mysqli_real_escape_string($con, $_POST['numero1']);
    $num2 = mysqli_real_escape_string($con, $_POST['numero2']);
    $num3 = mysqli_real_escape_string($con, $_POST['numero3']);
    $num4 = mysqli_real_escape_string($con, $_POST['numero4']);

    //Concatenación de los valores para verificar.
    $valor = $num1.$num2.$num3.$num4;

    $iduser = $_SESSION['id'];
    
    $consulta2 = "SELECT two_factor_key FROM users WHERE id='$iduser' ";
    $query_run1 = mysqli_query($con, $consulta2);
           
    
    $data = mysqli_fetch_array($query_run1);
    
    $valorB = $data['two_factor_key'];
    

 
    if($valor==$valorB)
    {
       // $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
      //  $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}
    
?>
