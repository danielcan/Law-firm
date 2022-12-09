<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['update_perfil']))
{
    $perfil_id = mysqli_real_escape_string($con, $_POST['perfil_id']);
    $primer_nombP = mysqli_real_escape_string($con, $_POST['primer_nombP']);
    $segundo_nombP = mysqli_real_escape_string($con, $_POST['segundo_nombP']);
    $primer_apeP = mysqli_real_escape_string($con, $_POST['primer_apeP']);
    $segundo_apeP = mysqli_real_escape_string($con, $_POST['segundo_apeP']);
    $telefonoP = mysqli_real_escape_string($con, $_POST['telefonoP']);
    $celularP = mysqli_real_escape_string($con, $_POST['celularP']);
    $direccionP = mysqli_real_escape_string($con, $_POST['direccionP']);
    $DNIP = mysqli_real_escape_string($con, $_POST['DNIP']);
    $pais_naciP = mysqli_real_escape_string($con, $_POST['pais_naciP']);
    $fecha_naciP = mysqli_real_escape_string($con, $_POST['fecha_naciP']);
    $ocupacionP = mysqli_real_escape_string($con, $_POST['ocupacionP']);
    $generoP = mysqli_real_escape_string($con, $_POST['generoP']);

    


    $query = "UPDATE perfil SET primer_nomb='$primer_nombP',segundo_nomb='$segundo_nombP',
    primer_ape='$primer_apeP',segundo_ape='$segundo_apeP',telefono='$telefonoP',
    celular='$celularP',direccion='$direccionP',DNI='$DNIP',IdPais='$pais_naciP',
    fecha_naci='$fecha_naciP',ocupacion='$ocupacionP',genero='$generoP' WHERE IdPer='$perfil_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Actualización del perfil cliente";
        $tabla="perfil";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se actualizo exitosamente el perfil. \"); window.location.href='menu-client.php?controlador=mostrar-perfil';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo actualizar el perfil, verifica la información proporcionada. \"); window.location.href='menu-client.php?controlador=mostrar-perfil';</script>");
        exit(0);
    }

}

?>