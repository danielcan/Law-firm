<?php
session_start();
require 'controller/conexion.php';

if(isset($_POST['verifica']))
{

    $num1 = mysqli_real_escape_string($con, $_POST['numero1']);
    $num2 = mysqli_real_escape_string($con, $_POST['numero2']);
    $num3 = mysqli_real_escape_string($con, $_POST['numero3']);
    $num4 = mysqli_real_escape_string($con, $_POST['numero4']);

    //Concatenación de los valores para verificar.
    $valor = $num1.$num2.$num3.$num4;

    $iduser = $_SESSION['id'];
    
    $consulta2 = "SELECT two_factor_key FROM users WHERE id='$iduser'";
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

/*

if($enviado){
        echo ("Enviado");

        $num1 = mysqli_real_escape_string($con, $_POST['numero1']);
        $num2 = mysqli_real_escape_string($con, $_POST['numero2']);
        $num3 = mysqli_real_escape_string($con, $_POST['numero3']);
        $num4 = mysqli_real_escape_string($con, $_POST['numero4']);
        
        //Concatenación de los valores para verificar.
        $valor = $num1 .$num2. $num3. $num4;

        $iduser = $_SESSION['id'];

        $consulta2 = "SELECT two_factor_key FROM users WHERE id='$iduser' ";
        $query_run1 = mysqli_query($con, $consulta2);
       

        $data = mysqli_fetch_array($query_run1);

        $valorB = $data['two_factor_key'];

        if($valor==$valorB){
            
            echo "<script> window.location='../view-client/hola.php'; </script>";
        }else{
            echo "error de verificacion ingresa de nuevo a tu correo y verifica..";
           // echo "<script> window.location='../view-security/check/verify.php'; </script>";
        }

    }else {
        echo ("No se pudo enviar el correo");
    }
*/
?>