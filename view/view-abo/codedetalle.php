<?php
session_start();
require '../../controller/conexion.php';


if(isset($_POST['update_deta']))
{
    $iddetal = mysqli_real_escape_string($con, $_POST['iddetal']);
    $deta_descri = mysqli_real_escape_string($con, $_POST['deta_descri']);
    $idexp = mysqli_real_escape_string($con, $_POST['idexp']);

    $query = "UPDATE detalleexp SET  descripcion='$deta_descri' WHERE IdDetal='$iddetal' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Actualización de registro detalle";
        $tabla="detalle";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se actualizo exitosamente el juzgado. \"); window.location.href='menu-abo.php?controlador=mostrar-detaexp&idexp=$idexp';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo actualizar el juzgado, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-detaexp&idexp=$idexp';</script>");
        exit(0);
    }

}


if(isset($_POST['save_agrega']))
{

    $descripcion_d = mysqli_real_escape_string($con, $_POST['descripcion_d']);
    $idexpe_d = mysqli_real_escape_string($con, $_POST['idexpe_d']);
    date_default_timezone_set('America/Tegucigalpa');
    $fechaingreso = date('m-d-Y ', time());  
   // $fechaingreso = date('Y-d-m', time());


    $query = "INSERT INTO detalleexp (descripcion,fechaExp,IdExp) VALUES ('$descripcion_d','$fechaingreso','$idexpe_d')";
    $query_run = mysqli_query($con, $query);


    if($query_run)
    {
        
        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Nuevo registro de detalle expediente.";
        $tabla="detalleexp";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        //agregar la notificacion al cliente como aviso.

        //zona horaria Tegucigalpa, para registro en el sistema.
        $fechanoti = date('Y-m-d H:i:s', time());  
        
        //nombre de la cita
        $nombre= 'Noticia del expediente';
        //  recuperacion de datos
        $querycli = "SELECT u.IdUser FROM Usuario as u, Expediente as e WHERE e.IdExp = '$idexpe_d' and e.IdUser = u.IdUser";
        $query_runcli = mysqli_query($con, $querycli);
        $cliente = mysqli_fetch_array($query_runcli);
        $iduser=$cliente['IdUser'];

         //agrega la notificacion del porque la desestimacion de la cita al abogado creador
             $querynoti = "INSERT INTO notificacion (nombre,descripcion,fecha_noti,estado,IdUser) VALUES ('$nombre','$descripcion_d','$fechanoti','no leido','$iduser')";
             $query_runnoti = mysqli_query($con, $querynoti);
        


       // print("<script>alert(\"Se agrego exitosamente el detalle. \"); window.location.href='menu-abo.php?controlador=mostrar-detaexp&idexp=$idexpe_d';</script>");
        print("<script>
        alert(\"Se agrego exitosamente el detalle. \");

        var resultado = window.confirm('Confirme si desea agregar un recordatorio de este expediente.');
        if (resultado === true) {
            //window.alert('Okay, si estas seguro.');
            
            window.location.href='menu-abo.php?controlador=mostrar-detaexp&idexp=$idexpe_d';
        } else { 
            //window.alert('Pareces indeciso');
            window.location.href='menu-abo.php?controlador=mostrar-detaexp&idexp=$idexpe_d';
        } 
        </script>");
        
   


        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo agregar el detalle, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-detaexp&idexp=$idexpe_d';</script>");
        exit(0);
    }
}

?>