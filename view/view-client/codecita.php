<?php
session_start();
require '../../controller/conexion.php';
if(isset($_POST['save_cita']))
{
    //datos de la vista de html
    $fecha = mysqli_real_escape_string($con, $_POST['fecha']);
    $hora = mysqli_real_escape_string($con, $_POST['hora']);
    $lugar="Aun por establecer con abogado y cliente.";
    $motivo = mysqli_real_escape_string($con, $_POST['motivo']);
    $estado="activo";
    $iduser = $_SESSION['iduser'];
    //agrega la nueva cita de la solicitud
    $querys = "INSERT INTO citas (`fecha`, `hora`, `lugar`,`motivo`,`estado`,`iduser`) VALUES ('$fecha','$hora','$lugar','$motivo','$estado','$iduser')";
    $query_runs = mysqli_query($con, $querys);

    if($query_runs == 1)
    {
        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
        $fechaingreso = date('m-d-Y h:i:s ', time());

        //Datos de bitacora
        $actividad = "Solicitud de cita";
        $tabla = "citas";
        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);
       
        //Datos para la notificación
        $nombre = 'Nueva solicitud de cita legal';
        $fecha_noti= $fecha ." ". $hora.":00";
        date_default_timezone_set('America/Tegucigalpa');

        //Formato de la fecha nueva cita solicitada
        $formato = 'Y-m-d H:i:s';
        $fechanue = DateTime::createFromFormat($formato, $fecha_noti)->format('Y-m-d H:i:s');

        //busqueda de todos los usuarios creadores abogados
        $queryabo = "SELECT IdUser FROM usuario WHERE rol='3' and tipo ='creador' ";
        $query_runabo = mysqli_query($con, $queryabo);
        if (mysqli_num_rows($query_runabo) > 0) {
            foreach ($query_runabo as $creador) {

           $iduser=$creador['IdUser'];

         //agrega la notificacion del porque la desestimacion de la cita al abogado creador
             $querydeses = "INSERT INTO notificacion (nombre,descripcion,fecha_noti,estado,IdUser) VALUES ('$nombre','$motivo','$fechanue','no leido','$iduser')";
             $query_rundeses = mysqli_query($con, $querydeses);
            }
        }

        //redireccion a la nueva vista de la solicitud de la cita.
        print("<script>alert(\"Se agrego la cita exitosamente. En el transcurso de 24 horas se contactará con usted, el asesor legal designado. \");window.location.href='menu-client.php?controlador=mostrar_cita';</script>");
    }else {
       print("<script>alert(\"Hubo un error al agregar la cita ! \");window.location.href='menu-client.php?controlador=creacion_cita';</script>"); 
    }
}

?>

