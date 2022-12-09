<?php
session_start();
if(isset($_POST['redireccion']))
{
    $rol=$_SESSION ['rol'];

    //busqueda de rol
    if($rol==1){
        header("Location: ../../view-client/menu-client.php?controlador=inicio");
    }else if($rol==2){
        header("Location: ../../view-admin/menu-admin.php?controlador=inicio");
    }else if($rol==3){
        header("Location: ../../view-abo/menu-abo.php?controlador=inicio");
    }else{
      //  $_SESSION['message'] = "Error de Rol de usuario";
     // header("Location: sv.php");
    }  

}
