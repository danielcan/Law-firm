<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['buscar']))
{
    if(isset($_POST['busqueda_exp']))
    {
        $exp_id = mysqli_real_escape_string($con, $_POST['exp_id']);
        $busqueda_e = mysqli_real_escape_string($con, $_POST['busqueda_exp']);
        print("<script> window.location.href='menu-client.php?controlador=mostrar-caso-actu-busqueda-archivado&nombre=$busqueda_e';</script>");
    }
    
}

?>