<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['buscar']))
{
    if(isset($_POST['busqueda_doc']))
    {
        $exp_id = mysqli_real_escape_string($con, $_POST['exp_id']);
        $busqueda_e = mysqli_real_escape_string($con, $_POST['busqueda_doc']);
        print("<script> window.location.href='menu-abo.php?controlador=mostrar-documento-busqueda-archi&nombre=$busqueda_e&idexp=$exp_id';</script>");
    }
    
}

?> 
