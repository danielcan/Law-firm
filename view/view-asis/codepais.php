<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['buscar']))
{
    if(isset($_POST['busqueda_p']))
    {
        $busqueda_e = mysqli_real_escape_string($con, $_POST['busqueda_p']);
        print("<script> window.location.href='menu-abo.php?controlador=mostrar-pais-busqueda&nombre=$busqueda_e';</script>");
    }
    
}

if(isset($_POST['delete_pais']))
{
    $pais_id = mysqli_real_escape_string($con, $_POST['delete_pais']);

    $query = "UPDATE pais SET estado = 'eliminado' WHERE IdPais='$pais_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {

            $iduser = $_SESSION['iduser'];

            //zona horaria Tegucigalpa, para registro en el sistema.
            date_default_timezone_set('America/Tegucigalpa');
             $fechaingreso = date('m-d-Y h:i:s ', time());  
            
            //Datos de bitacora
            $actividad = "Eliminación de registro país.";
            $tabla="juzgado";


            //Inserción de la bitacora.
            $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
            $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se elimino exitosamente el País. \"); window.location.href='menu-abo.php?controlador=mostrar-pais';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo eliminar el nuevo País, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-pais';</script>");
        exit(0);
    }
}

if(isset($_POST['update_pais']))
{
    $pais_id = mysqli_real_escape_string($con, $_POST['pais_id']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
  
    $query = "UPDATE pais SET nombre='$nombre' WHERE IdPais='$pais_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Actualización de registro de un país";
        $tabla="pais";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se actualizo exitosamente el país. \"); window.location.href='menu-abo.php?controlador=mostrar-pais';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo actualizar el país, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-pais';</script>");
        exit(0);
    }

}


if(isset($_POST['save_agrega']))
{

    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $estado = 'activo';

    $query = "INSERT INTO pais (nombre, estado) VALUES ('$nombre','$estado')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        
        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Nuevo registro de País.";
        $tabla="pais";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se agrego exitosamente el país. \"); window.location.href='menu-abo.php?controlador=mostrar-pais';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo agregar el nuevo país, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-pais';</script>");
        exit(0);
    }
}

?>