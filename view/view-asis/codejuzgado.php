<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['buscar']))
{
    if(isset($_POST['busqueda_j']))
    {
        $busqueda_e = mysqli_real_escape_string($con, $_POST['busqueda_j']);
        print("<script> window.location.href='menu-abo.php?controlador=mostrar-juzgado-busqueda&nombre=$busqueda_e';</script>");
    }
    
}


if(isset($_POST['delete_juzga']))
{
    $juzgado_id = mysqli_real_escape_string($con, $_POST['delete_juzga']);

    $query = "UPDATE juzgado SET estado = 'eliminado' WHERE IdJuz='$juzgado_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {

            $iduser = $_SESSION['iduser'];

            //zona horaria Tegucigalpa, para registro en el sistema.
            date_default_timezone_set('America/Tegucigalpa');
             $fechaingreso = date('m-d-Y h:i:s ', time());  
            
            //Datos de bitacora
            $actividad = "Eliminación de registro juzgado.";
            $tabla="juzgado";


            //Inserción de la bitacora.
            $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
            $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se elimino exitosamente el juzgado. \"); window.location.href='menu-abo.php?controlador=mostrar-juzgado';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo eliminar el nuevo juzgado, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-juzgado';</script>");
        exit(0);
    }
}

if(isset($_POST['update_juzgado']))
{
    $juzgado_id = mysqli_real_escape_string($con, $_POST['juzgado_id']);

    $nombre = mysqli_real_escape_string($con, $_POST['nombre_edj']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descri_edj']);


    $query = "UPDATE juzgado SET nombre='$nombre', descripcion='$descripcion' WHERE IdJuz='$juzgado_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Actualización de registro de un juzgado";
        $tabla="juzgado";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se actualizo exitosamente el juzgado. \"); window.location.href='menu-abo.php?controlador=mostrar-juzgado';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo actualizar el juzgado, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-juzgado';</script>");
        exit(0);
    }

}


if(isset($_POST['save_agrega']))
{

    $nombre = mysqli_real_escape_string($con, $_POST['nombre_j']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descrip_j']);
    $estado = 'activo';

    $query = "INSERT INTO juzgado (nombre, descripcion, estado) VALUES ('$nombre','$descripcion','$estado')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        
        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Nuevo registro de juzgado.";
        $tabla="juzgado";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se agrego exitosamente el juzgado. \"); window.location.href='menu-abo.php?controlador=mostrar-juzgado';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo agregar el nuevo juzgado, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-juzgado';</script>");
        exit(0);
    }
}

?>