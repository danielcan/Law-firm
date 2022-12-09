<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['save_deses']))
{

    $des_id = mysqli_real_escape_string($con, $_POST['des_id']);
    $motivo_des = mysqli_real_escape_string($con, $_POST['motivo_des']);


    $query = "INSERT INTO desestimarcita (motivo,IdCita) VALUES ('$motivo_des','$des_id')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
        $fechanoti = date('Y-m-d H:i:s', time());  
        
        //nombre de la cita
        $nombre= 'Cita desestimada';
        //  recuperacion de datos
        $queryabo = "SELECT IdUser FROM Usuario WHERE rol='3' and tipo ='creador'  ";
        $query_runabo = mysqli_query($con, $queryabo);
        if (mysqli_num_rows($query_runabo) > 0) {
            foreach ($query_runabo as $creador) {

        $iduser=$creador['IdUser'];

         //agrega la notificacion del porque la desestimacion de la cita al abogado creador
             $querydeses = "INSERT INTO notificacion (nombre,descripcion,fecha_noti,estado,IdUser) VALUES ('$nombre','$motivo_des','$fechanoti','no leido','$iduser')";
             $query_rundeses = mysqli_query($con, $querydeses);
            }
        }
        //
        
        $iduser = $_SESSION['iduser'];
        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
        $fechaingreso = date('m-d-Y h:i:s ', time());  

        //Datos de bitacora
        $actividad = "Nuevo desestimación.";
        $tabla="desestimarcita";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se actualizo exitosamente la desestimación. \"); window.location.href='menu-abo.php?controlador=asigna-tucita';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"Se actualizo exitosamente la desestimación. \"); window.location.href='menu-abo.php?controlador=asigna-tucita';</script>");
        exit(0);
    }
}

?>