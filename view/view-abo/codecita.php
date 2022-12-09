<?php
session_start();

require '../../controller/conexion.php';

if(isset($_POST['delete_cita']))
{
    $cita_id = mysqli_real_escape_string($con, $_POST['delete_cita']);

    $query = "DELETE FROM citas WHERE id='$cita_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        print("<script>alert(\"Se elimino la cita correctamente. \"); window.location.href='menu-abo.php?controlador=solicitudescitas';</script>");
        exit(0);
    }
    else
    {
     
        print("<script>alert(\"No se elimino la cita. Error. \"); window.location.href='menu-abo.php?controlador=solicitudescitas';</script>");
        exit(0);
    }
}


if (isset($_POST['update_cita'])) {
    $cita_id = mysqli_real_escape_string($con, $_POST['cita_id']);
    $fecha = mysqli_real_escape_string($con, $_POST['fecha']);
    $hora = mysqli_real_escape_string($con, $_POST['hora']);
    $lugar = mysqli_real_escape_string($con, $_POST['lugar']);
    $motivo = mysqli_real_escape_string($con, $_POST['motivo']);
    $estado = mysqli_real_escape_string($con, $_POST['estado']);



    $querye = "UPDATE citas SET fecha='$fecha',hora='$hora',lugar='$lugar',motivo='$motivo',estado='$estado'  WHERE IdCita='$cita_id'";
    $query_rune = mysqli_query($con, $querye);

    if ($query_rune) {


        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
        $fechaingreso = date('m-d-Y h:i:s ', time());

        //Datos de bitacora
        $actividad = "Actualización de registro de cita";
        $tabla = "citas";


        //Agregar evento a la agenda.
        $fecha_noti= $fecha ." ". $hora.":00";

        //Formato de la fecha nueva cita solicitada
        $formato = 'Y-m-d H:i:s';
        $fechanue = DateTime::createFromFormat($formato, $fecha_noti)->format('Y-m-d H:i:s');
        $titulo = 'Cita con cliente';
        $color = '#0071c5';
        $descripcion = 'cita con cliente';

        $queryver = "SELECT a.IdAgen FROM usuario as u, perfil as p, abogado as ab, agenda as a WHERE u.IdUser = '$iduser' and u.IdUser = p.IdUser and p.IdPer = ab.IdPer and ab.IdAbo = a.IdAbo ";
        $query_runver = mysqli_query($con, $queryver);
        $expedi = mysqli_fetch_array($query_runver);
        $IdAgen = $expedi['IdAgen'];


        $queryev = "INSERT INTO evento (titulo,color,fecha_inicio,fecha_fin,descripcion,IdAgen) VALUES ('$titulo','$color','$fechanue','$fechanue','$descripcion','$IdAgen')";
        $query_runev = mysqli_query($con, $queryev);
    

                 //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);

        if($estado=='Desestimar'){
            print("<script>alert(\"Se actualizo exitosamente la cita. \"); window.location.href='menu-abo.php?controlador=desestimarcita&idcita=$cita_id';</script>");
            exit(0);
        }else{
            print("<script>alert(\"Se actualizo exitosamente la cita. \"); window.location.href='menu-abo.php?controlador=asigna-tucita';</script>");
            exit(0);
        }

    } else {
        print("<script>alert(\"No se pudo actualizar la citae, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=asigna-tucita';</script>");
        exit(0);
    }
}


?>