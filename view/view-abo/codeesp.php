<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['buscar']))
{
    if(isset($_POST['busqueda_e']))
    {
        $busqueda_e = mysqli_real_escape_string($con, $_POST['busqueda_e']);
        print("<script> window.location.href='menu-abo.php?controlador=mostrar-especialidad-busqueda&nombre=$busqueda_e';</script>");
    }
    
}



if(isset($_POST['delete_espe']))
{
    $espe_id = mysqli_real_escape_string($con, $_POST['delete_espe']);

    $query = "UPDATE especialidad SET estado = 'eliminado' WHERE IdEsp='$espe_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {

            $iduser = $_SESSION['iduser'];

            //zona horaria Tegucigalpa, para registro en el sistema.
            date_default_timezone_set('America/Tegucigalpa');
             $fechaingreso = date('m-d-Y h:i:s ', time());  
            
            //Datos de bitacora
            $actividad = "Eliminación de registro de especialidad.";
            $tabla="especialidad";


            //Inserción de la bitacora.
            $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
            $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se elimino exitosamente la especialidad. \"); window.location.href='menu-abo.php?controlador=mostrar-especialidad';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo eliminar el nueva Especialidad, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-especialidad';</script>");
        exit(0);
    }
}

if(isset($_POST['update_espe']))
{
    $espe_id = mysqli_real_escape_string($con, $_POST['espe_id']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre_e']);
  
    $query = "UPDATE especialidad SET nombre='$nombre' WHERE IdEsp='$espe_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Actualización de registro de una Especialidad";
        $tabla="especialidad";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se actualizo exitosamente la especialidad. \"); window.location.href='menu-abo.php?controlador=mostrar-especialidad';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo actualizar la especialidad, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-especialidad';</script>");
        exit(0);
    }

}


if(isset($_POST['save_agrega']))
{

    $nombre = mysqli_real_escape_string($con, $_POST['nombre_e']);
    $estado = 'activo';

    $query = "INSERT INTO especialidad (nombre, estado) VALUES ('$nombre','$estado')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        
        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Nuevo registro de nueva especialidad.";
        $tabla="especialidad";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se agrego exitosamente la especialidad. \"); window.location.href='menu-abo.php?controlador=mostrar-especialidad';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo agregar el nueva especialidad, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-especialidad';</script>");
        exit(0);
    }
}
