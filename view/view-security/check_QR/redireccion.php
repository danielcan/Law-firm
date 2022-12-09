<?php


session_start();

//

if(isset($_POST['redireccion']))
{
    $rol=$_SESSION ['rol'];

    //busqueda de rol
    if($rol==1){
        print("<script>window.location.href='../../view-client/menu-client.php?controlador=inicio';</script>");
    }else if($rol==2){
        print("<script>window.location.href='../../view-admin/menu-admin.php?controlador=inicio';</script>");
    }else if($rol==3){
        print("<script>window.location.href='../../view-abo/menu-abo.php?controlador=inicio';</script>");
    }else if($rol==4){
        print("<script>window.location.href='../../view-asis/menu-abo.php?controlador=inicio';</script>");
    }else{
        $_SESSION['message'] = "Error de Rol de usuario";
        header("Location: inicial.php");
    }  

}
?>
