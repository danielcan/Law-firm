<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['buscar']))
{
    if(isset($_POST['busqueda_exp']))
    {
        $exp_id = mysqli_real_escape_string($con, $_POST['exp_id']);
        $busqueda_e = mysqli_real_escape_string($con, $_POST['busqueda_exp']);
        print("<script> window.location.href='menu-abo.php?controlador=mostrar-caso-actu-busqueda&nombre=$busqueda_e';</script>");
    }
    
}

if (isset($_POST['delete_expediente'])) {
    $expediente_id = mysqli_real_escape_string($con, $_POST['delete_expediente']);

    $query = "UPDATE expediente SET estado = 'eliminado' WHERE IdExp='$expediente_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
        $fechaingreso = date('m-d-Y h:i:s ', time());

        //Datos de bitacora
        $actividad = "Eliminación de expediente.";
        $tabla = "expediente";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se elimino exitosamente el expediente. \"); window.location.href='menu-abo.php?controlador=mostrar-caso-actu';</script>");
        exit(0);
    } else {
        print("<script>alert(\"No se pudo eliminar el expediente, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-caso-actu';</script>");
        exit(0);
    }
}

if (isset($_POST['update_expediente'])) {
    $expedi_id = mysqli_real_escape_string($con, $_POST['expedi_id']);
    $nombre_exp = mysqli_real_escape_string($con, $_POST['nombre_exp']);
    $tipo_exp = mysqli_real_escape_string($con, $_POST['tipo_exp']);
    $estado_ep = mysqli_real_escape_string($con, $_POST['estado_ep']);
    $cliente_exp = mysqli_real_escape_string($con, $_POST['cliente_exp']);
    $juzgado_exp = mysqli_real_escape_string($con, $_POST['juzga_exp']);



    $querye = "UPDATE expediente SET nombre='$nombre_exp' , tipo='$tipo_exp', estado = '$estado_ep', iduser='$cliente_exp', idjuz='$juzgado_exp' WHERE IdExp='$expedi_id'";
    $query_rune = mysqli_query($con, $querye);

    if ($query_rune) {


        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
        $fechaingreso = date('m-d-Y h:i:s ', time());

        //Datos de bitacora
        $actividad = "Actualización de registro de expediente";
        $tabla = "expediente";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);
 

        if($estado_ep=='finalizado'){
            print("<script>alert(\"Se actualizo exitosamente el expediente. \"); window.location.href='menu-abo.php?controlador=recibo&idclient=$cliente_exp';</script>");
            exit(0);
        }else{
            print("<script>alert(\"Se actualizo exitosamente el expediente. \"); window.location.href='menu-abo.php?controlador=mostrar-caso-actu';</script>");
            exit(0);
        }


    } else {
        print("<script>alert(\"No se pudo actualizar el expediente, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-caso-actu';</script>");
        exit(0);
    }
}


if (isset($_POST['save_expe'])) {

    $nombre_exp = mysqli_real_escape_string($con, $_POST['nombre_exp']);
    $tipo_exp = mysqli_real_escape_string($con, $_POST['tipo_exp']);
    $cliente_n = mysqli_real_escape_string($con, $_POST['cliente_n']);
    $juzgado_n = mysqli_real_escape_string($con, $_POST['juzgado_n']);
    $estado = "activo";

    date_default_timezone_set('America/Tegucigalpa');
    $fechaingreso = date('m-d-Y h:i:s ', time());

    $query = "INSERT INTO expediente (nombre,tipo,estado,IdUser,IdJuz) VALUES ('$nombre_exp','$tipo_exp','$estado','$cliente_n','$juzgado_n')";
    $query_run = mysqli_query($con, $query);


    if ($query_run) {
        /*    $estado="En proceso";
        $queryucita = "UPDATE citas SET estado='$estado' WHERE IdCita='$cita_id' ";
        $query_ucita = mysqli_query($con, $queryucita );
*/
        $cons = "SELECT IdExp FROM expediente WHERE nombre ='$nombre_exp'";
        $query_r = mysqli_query($con, $cons);
        $datasr = mysqli_fetch_array($query_r);

        if (mysqli_num_rows($query_r) > 0) {

            $idexp = $datasr['IdExp'];
            $idabo = $_SESSION['idabo'];
            $estadoab = "activo";

            $queryab = "INSERT INTO aboxex (IdAbo,IdExp,estado) VALUES ('$idabo','$idexp','$estadoab')";
            $query_runab = mysqli_query($con, $queryab);


            //zona horaria Tegucigalpa, para registro en el sistema.
            date_default_timezone_set('America/Tegucigalpa');
            $fechaingreso = date('m-d-Y h:i:s ', time());

            //Datos de bitacora de las dos tablas
            $actividad = "Nuevo expediente.";   
            $tabla = "expediente";
            $iduser = $_SESSION['iduser'];

            //Inserción de la bitacora.
            $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
            $query_runbita = mysqli_query($con, $querybita);

            print("<script>alert(\"Se agrego exitosamente el expediente. \"); window.location.href='menu-abo.php?controlador=mostrar-caso-actu';</script>");
            exit(0);
            
        }
    } else {
        print("<script>alert(\"No se pudo agregar el expediente del cliente, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=expediente-create';</script>");
        exit(0);
    }
}
