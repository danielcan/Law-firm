<?php
session_start();
require '../../controller/conexion.php';


if(isset($_POST['update_asigna']))
{
    $abog_id = mysqli_real_escape_string($con, $_POST['abog_id']);

    $asig_id = mysqli_real_escape_string($con, $_POST['asig_id']);



    $query = "UPDATE asignacion SET IdAbo='$abog_id' WHERE IdAsig='$asig_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        


        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Actualización de registro de asignación";
        $tabla="asignacion";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);

        print("<script>alert(\"Se actualizo exitosamente la asignación. \"); window.location.href='menu-abo.php?controlador=asignacioncita';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo actualizar la asignación, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=asignacioncita';</script>");
        exit(0);
    }

}


if(isset($_POST['save_asigna']))
{

    $cita_id = mysqli_real_escape_string($con, $_POST['cita_id']);
    $abog_id = mysqli_real_escape_string($con, $_POST['abog_id']);

    date_default_timezone_set('America/Tegucigalpa');
    $fechaingreso = date('m-d-Y h:i:s ', time());  

    $query = "INSERT INTO asignacion (IdCita,IdAbo,fecha_asig) VALUES ('$cita_id','$abog_id','$fechaingreso')";
    $query_run = mysqli_query($con, $query);


    if($query_run)
    {
        $estado="En proceso";
        $queryucita = "UPDATE citas SET estado='$estado' WHERE IdCita='$cita_id' ";
        $query_ucita = mysqli_query($con, $queryucita );

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Nuevo asignacion de abogado.";
        $tabla="asignacion";

        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);

        //agrega notificación al abogado.
                //Datos para la notificación
                $nombre = 'Nueva asignación de cita con cliente';
                $descripcion = "Contactar con cliente para confirmación de cita";

                date_default_timezone_set('America/Tegucigalpa');
                $fechanoti = date('Y-m-d H:i:s', time());  
                
                //obtener el id del usuario asignado cita con cliente
                $queryabon = "SELECT IdUser FROM abogado as b, perfil as p WHERE b.IdAbo ='$abog_id' and b.IdPer = p.IdPer";
                $query_runabon = mysqli_query($con, $queryabon);
                //arreglo de datos del select
                $abogado = mysqli_fetch_array($query_runabon);
                $iduser= $abogado['IdUser'];
        
                //inserta los datos de la notificacion al usuario
                $querydeses = "INSERT INTO notificacion (nombre,descripcion,fecha_noti,estado,IdUser) VALUES ('$nombre','$descripcion','$fechanoti','no leido','$iduser')";
                $query_rundeses = mysqli_query($con, $querydeses);

                           //obtener id de la agenda del usuario
                           $queryage = "SELECT IdAgen FROM abogado as b, agenda as p WHERE b.IdAbo ='$abog_id' and b.IdAbo = p.IdAbo";
                           $query_runage = mysqli_query($con, $queryage);
                           //arreglo de datos del select
                           $agenda = mysqli_fetch_array($query_runage);
                           $idage= $agenda['IdAgen'];
                           // agregar nuevo evento
                           $nombreevento="Nueva solicitud";
                           $querydeses = "INSERT INTO evento (titulo, color, fecha_inicio, fecha_fin, descripcion, IdAgen) VALUES ('$nombreevento','#FFD700','$fechanoti','$fechanoti','Contacta con el cliente para confirmar la cita','$idage')";
                           $query_rundeses = mysqli_query($con, $querydeses);


        print("<script>alert(\"Se agrego exitosamente la asignación de cita. \"); window.location.href='menu-abo.php?controlador=solicitudescitas';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo agregar la asignación de la cita, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=solicitudescitas';</script>");
        exit(0);
    }
}

?>