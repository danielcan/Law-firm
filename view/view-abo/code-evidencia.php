<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['buscar']))
{
    if(isset($_POST['busqueda_ev']))
    {
        $exp_id = mysqli_real_escape_string($con, $_POST['exp_id']);
        $busqueda_e = mysqli_real_escape_string($con, $_POST['busqueda_ev']);
        print("<script> window.location.href='menu-abo.php?controlador=mostrar-evidencia-busqueda&nombre=$busqueda_e&idexp=$exp_id';</script>");
    }
    
}


if(isset($_POST['delete_evi']))
{
    $evi_id = mysqli_real_escape_string($con, $_POST['delete_evi']);

    $query = "UPDATE evidencia SET estado = 'eliminado' WHERE IdEvid='$evi_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {

             $querys = "SELECT * FROM evidencia WHERE IdEvid='$evi_id'";
             $query_runs = mysqli_query($con, $querys);
             $data = mysqli_fetch_array($query_runs);

             $IdExp = $data['IdExp'];

             //id del usuario 
             $iduser = $_SESSION['iduser'];
            //zona horaria Tegucigalpa, para registro en el sistema.
             date_default_timezone_set('America/Tegucigalpa');
             $fechaingreso = date('m-d-Y h:i:s ', time());  
            
            //Datos de bitacora
            $actividad = "Eliminación de registro evidencia.";
            $tabla="Evidencia";


            //Inserción de la bitacora.
            $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
            $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se elimino exitosamente la evidencia del expediente. \"); window.location.href='menu-abo.php?controlador=mostrar-evidencia&idexp=$IdExp';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo eliminar la evidencia, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-evidencia&idexp=$IdExp';</script>");
        exit(0);
    }
}

if(isset($_POST['update_evidencia']))
{
    $evidencia_id = mysqli_real_escape_string($con, $_POST['evidencia_id']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre_evi']);
    $IdExp = mysqli_real_escape_string($con, $_POST['exp_id']);

    $file = $_FILES['doc'];
    $nam = $file["name"];
    $tipo = $file["type"];
    $ruta_tem = $file["tmp_name"];
    $size = $file["size"];
    $carpeta="../../evidencia/";


    /** Se verifica que los datos sean documentos pdf, documentos de word o imagenes */
    if($tipo != 'application/pdf' && $tipo != 'application/PDF' && $tipo !='application/msword'  && $tipo !='application/DOC' && $tipo !='application/doc' && $tipo !='application/DOCX' && $tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo !='image/jpeg' && $tipo != 'image/png'){     
        print("<script>alert(\"Error, el archivo no es una documento o imagen. \"); window.location.href='menu-abo.php?controlador=mostrar-evidencia&idexp=$IdExp';</script>");
    }else if ($size > 10*1024*1024){
        print("<script>alert(\"Error, el tamaño maximo permitido es de 10MB. \"); window.location.href='menu-abo.php?controlador=mostrar-evidencia&idexp=$IdExp';</script>");
      }else{

        $src = $carpeta.$nam;
        move_uploaded_file($ruta_tem, $src);
        $Documento="evidencia/".$nam;

        /** Se inserta los datos en los evidencia */
        $query = "UPDATE evidencia SET nombre='$nombre', evidencia='$Documento' WHERE IdEvid='$evidencia_id' ";
        $query_run = mysqli_query($con, $query);

    }



    if($query_run)
    {
        

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Actualización de registro de un evidencia";
        $tabla="Evidencia";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se actualizo correctamente la evidencia. \"); window.location.href='menu-abo.php?controlador=mostrar-evidencia&idexp=$IdExp';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo actualizar la evidencia, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-evidencia&idexp=$IdExp';</script>");
        exit(0);
    }

}


if(isset($_POST['save_agrega']))
{
    $nombre = mysqli_real_escape_string($con, $_POST['nombre_evi']);
    $IdExp = mysqli_real_escape_string($con, $_POST['expedi_id']);
    $estado = 'activo';

    $file = $_FILES['doc'];
    $nam = $file["name"];
    $tipo = $file["type"];
    $ruta_tem = $file["tmp_name"];
    $size = $file["size"];
    $carpeta="../../evidencia/";

    /** Se verifica que los datos sean documentos pdf, documentos de word o imagenes */
    if($tipo != 'application/pdf' && $tipo != 'application/PDF' && $tipo !='application/msword'  && $tipo !='application/DOC' && $tipo !='application/doc' && $tipo !='application/DOCX' && $tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo !='image/jpeg' && $tipo != 'image/png'){     
        print("<script>alert(\"Error, el archivo no es una documento o imagen. \"); window.location.href='menu-abo.php?controlador=mostrar-evidencia&idexp=$IdExp';</script>");
    }else if ($size > 10*1024*1024){
        print("<script>alert(\"Error, el tamaño maximo permitido es de 10MB. \"); window.location.href='menu-abo.php?controlador=mostrar-evidencia&idexp=$IdExp';</script>");
      }else{

        $src = $carpeta.$nam;
        move_uploaded_file($ruta_tem, $src);
        $Documento="evidencia/".$nam;

        /** Se inserta los datos en los evidencia */
        $query = "INSERT INTO evidencia (nombre, tipo, evidencia, estado, IdExp) VALUES ('$nombre','$tipo','$Documento', '$estado','$IdExp')";
        $query_run = mysqli_query($con, $query);

    }


    if($query_run)
    {
        
        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Nuevo registro de Evidencia.";
        $tabla="Evidencia";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se agrego exitosamente la evidencia. \"); window.location.href='menu-abo.php?controlador=mostrar-evidencia&idexp=$IdExp';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo agregar la nueva evidencia, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-evidencia&idexp=$IdExp';</script>");
        exit(0);
    }
}
