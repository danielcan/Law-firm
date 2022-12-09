<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['delete_juzga']))
{
    $juzgado_id = mysqli_real_escape_string($con, $_POST['delete_juzga']);

    $query = "DELETE FROM juzgado WHERE IdJuz='$juzgado_id' ";
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

if(isset($_POST['update_abo']))
{
    $abo_id = mysqli_real_escape_string($con, $_POST['abo_id']);

    $nume_a = mysqli_real_escape_string($con, $_POST['nume_a']);
    $especia_id = mysqli_real_escape_string($con, $_POST['especia_id']);



    $query = "UPDATE abogado SET nume_abo='$nume_a', IdEsp='$especia_id'  WHERE IdAbo='$abo_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Actualización de registro de numero de colegiación del abogado";
        $tabla="abogado";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se actualizo exitosamente el número de colegiación del abogado. \"); window.location.href='menu-abo.php?controlador=mostrar-espe-abo';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo actualizar el número de colegiación del abogado, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=especifica-edit&idabo=$abo_id';</script>");
        exit(0);
    }

}


if(isset($_POST['save-abo']))
{

    $numeCole = mysqli_real_escape_string($con, $_POST['numeCole']);
    $especiali = mysqli_real_escape_string($con, $_POST['especiali']);
    $id_per = mysqli_real_escape_string($con, $_POST['id_per']);

    $query = "INSERT INTO abogado (nume_abo,IdEsp,IdPer) VALUES ('$numeCole','$especiali','$id_per')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        
        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Nuevo registro abogado.";
        $tabla="abogado";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se agrego exitosamente el detalle de abogado. \"); window.location.href='menu-abo.php?controlador=mostrar-user-abog';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo agregar el nuevo juzgado, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=abogado-create&id=$id_per';</script>");
        exit(0);
    }
}

?>