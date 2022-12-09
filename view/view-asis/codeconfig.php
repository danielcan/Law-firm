

<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['buscar']))
{
    if(isset($_POST['busqueda_conf']))
    {
        $busqueda_e = mysqli_real_escape_string($con, $_POST['busqueda_conf']);
        print("<script> window.location.href='menu-abo.php?controlador=mostrar-conf-busqueda&nombre=$busqueda_e';</script>");
    }
    
}


if(isset($_POST['delete_config']))
{
    $config_id = mysqli_real_escape_string($con, $_POST['delete_config']);

    $query = "UPDATE configuracion SET vista = 'eliminado' WHERE IdConfig='$config_id' ";
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


            print("<script>alert(\"Se elimino exitosamente la configuración. \"); window.location.href='menu-abo.php?controlador=mostrar-conf';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo eliminar la configuración, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-conf';</script>");
        exit(0);
    }
}

if(isset($_POST['registrarconf']))
{
    $nombre = mysqli_real_escape_string($con, $_POST['nombreConfig']);
    $vista = "si";
    $id = mysqli_real_escape_string($con, $_POST['iduserab']);

    $solicitudes=0;
    $asignacion=0;
    $miscitas=0;
    $usuario=0;
    $archivado=0;
    $confi=0;
    $creaexpedi=0;
    $expediactu=0;
    $juzgado=0;
    $agenda=0;
    $noti=0;
    $pais=0;
    $especi=0;
    $dash=0;
    $perfil=0;


    if(isset($_POST['solicitudes'])){
        $solicitudes = 1;
    }

    if(isset($_POST['asignacion'])){
        $asignacion = 1;
    }

    if(isset($_POST['miscitas'])){
        $miscitas = 1;     
    }

    if(isset($_POST['usuario'])){
        $usuario = 1;
    }

    if(isset($_POST['archivado'])){
        $archivado = 1;      
    }

    if(isset($_POST['confi'])){
        $confi = 1;      
    }

    if(isset($_POST['creaexpedi'])){
        $creaexpedi = 1;
    }

    if(isset($_POST['expediactu'])){
        $expediactu = 1;
    }

    if(isset($_POST['juzgado'])){
        $juzgado = 1;
    }

    if(isset($_POST['agenda'])){
        $agenda = 1;
    }

    if(isset($_POST['noti'])){
        $noti = 1;
    }
    
    if(isset($_POST['pais'])){
        $pais = 1;
    }

    if(isset($_POST['especi'])){
        $especi = 1;
    }

    if(isset($_POST['dash'])){
        $dash = 1;
    }

    if(isset($_POST['perfil'])){
        $perfil = 1;
    }

    $query = "INSERT INTO configuracion (nombre,vista,solicitudes,asignacion,miscitas,usuario,archivado,confi,creaexpedi,expediactu,juzgado,agenda,noti,pais,especi,dash,perfil,IdUser) VALUES('$nombre','$vista','$solicitudes','$asignacion','$miscitas', '$usuario','$archivado','$confi','$creaexpedi','$expediactu','$juzgado','$agenda','$noti','$pais','$especi',$dash,$perfil,'$id')";

    $query_run = mysqli_query($con, $query);
    if($query_run > 0)
    {

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
        $fechaingreso = date('m-d-Y h:i:s ', time());

        //Datos de bitacora
        $actividad = "Nueva registro de configuración";
        $tabla = "configuracion";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);

        print("<script>alert(\"Se agrego exitosamente la nueva configuración. \"); window.location.href='menu-abo.php?controlador=mostrar-conf';</script>");
        exit(0);
    }
    else
    {
       
        print("<script>alert(\"No se pudo registrar la nueva configuración, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=agrega-configura';</script>");

        exit(0);
    }
}



if(isset($_POST['update_config']))
{
    $idconfig = mysqli_real_escape_string($con, $_POST['idconfig']);
    $vista = "si";
    $iduserab = mysqli_real_escape_string($con, $_POST['iduserab']);
    $nombreConfig = mysqli_real_escape_string($con, $_POST['nombreConfig']);

    $solicitudes=0;
    $asignacion=0;
    $miscitas=0;
    $usuario=0;
    $archivado=0;
    $confi=0;
    $creaexpedi=0;
    $expediactu=0;
    $juzgado=0;
    $agenda=0;
    $noti=0;
    $pais=0;
    $especi=0;
    $dash=0;
    $perfil=0;



    if(isset($_POST['solicitudes'])){
        $solicitudes = 1;
    }

    if(isset($_POST['asignacion'])){
        $asignacion = 1;
    }

    if(isset($_POST['miscitas'])){
        $miscitas = 1;     
    }

    if(isset($_POST['usuario'])){
        $usuario = 1;
    }

    if(isset($_POST['archivado'])){
        $archivado = 1;      
    }

    if(isset($_POST['confi'])){
        $confi = 1;      
    }

    if(isset($_POST['creaexpedi'])){
        $creaexpedi = 1;
    }

    if(isset($_POST['expediactu'])){
        $expediactu = 1;
    }

    if(isset($_POST['juzgado'])){
        $juzgado = 1;
    }

    if(isset($_POST['agenda'])){
        $agenda = 1;
    }

    if(isset($_POST['noti'])){
        $noti = 1;
    }

    if(isset($_POST['pais'])){
        $pais = 1;
    }

    if(isset($_POST['especi'])){
        $especi = 1;
    }
    
    if(isset($_POST['dash'])){
        $dash = 1;
    }

    if(isset($_POST['perfil'])){
        $perfil = 1;
    }

    $query = "UPDATE configuracion SET nombre='$nombreConfig',solicitudes='$solicitudes' ,asignacion='$asignacion' ,miscitas='$miscitas' ,usuario='$usuario' ,archivado='$archivado' ,confi='$confi' ,creaexpedi='$creaexpedi' ,expediactu='$expediactu' ,juzgado='$juzgado' ,agenda='$agenda' ,noti='$noti' ,pais='$pais', especi='$especi', dash = '$dash', perfil = '$perfil',IdUser='$iduserab' WHERE IdConfig='$idconfig' ";
    $query_run = mysqli_query($con, $query);



    if($query_run)
    {

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
        $fechaingreso = date('m-d-Y h:i:s ', time());

        //Datos de bitacora
        $actividad = "Acrtualización registro de configuración";
        $tabla = "configuracion";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);

        print("<script>alert(\"Se actualizo exitosamente la configuración. \"); window.location.href='menu-abo.php?controlador=mostrar-conf';</script>");
        exit(0);
    }
    else
    {
       
        print("<script>alert(\"No se pudo actualizar la configuración, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-conf;</script>");

        exit(0);
    }
}


?>