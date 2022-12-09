<?php
session_start();
require '../../controller/conexion.php';

if(isset($_POST['buscar']))
{
    if(isset($_POST['busqueda_doc']))
    {
        $exp_id = mysqli_real_escape_string($con, $_POST['exp_id']);
        $busqueda_e = mysqli_real_escape_string($con, $_POST['busqueda_doc']);
        print("<script> window.location.href='menu-abo.php?controlador=mostrar-documento-busqueda&nombre=$busqueda_e&idexp=$exp_id';</script>");
    }
    
}


if(isset($_POST['delete_doc']))
{
    $evi_id = mysqli_real_escape_string($con, $_POST['delete_doc']);

    $query = "UPDATE documento SET estado = 'eliminado' WHERE IdDoc='$evi_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {

             $querys = "SELECT * FROM documento WHERE IdDoc='$evi_id'";
             $query_runs = mysqli_query($con, $querys);
             $data = mysqli_fetch_array($query_runs);

             $IdExp = $data['IdExp'];

             //id del usuario 
             $iduser = $_SESSION['iduser'];
            //zona horaria Tegucigalpa, para registro en el sistema.
            date_default_timezone_set('America/Tegucigalpa');
             $fechaingreso = date('m-d-Y h:i:s ', time());  
            
            //Datos de bitacora
            $actividad = "Eliminación de registro documento.";
            $tabla="documento";


            //Inserción de la bitacora.
            $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
            $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se elimino exitosamente el documento del expediente. \"); window.location.href='menu-abo.php?controlador=mostrar-documento&idexp=$IdExp';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo eliminar el documento, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-documento&idexp=$IdExp';</script>");
        exit(0);
    }
}

if(isset($_POST['update_documento']))
{
    $documento_id = mysqli_real_escape_string($con, $_POST['documento_id']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre_docu']);
    $IdExp = mysqli_real_escape_string($con, $_POST['exp_id']);

    $file = $_FILES['doc'];
    $nam = $file["name"];
    $tipo = $file["type"];
    $ruta_tem = $file["tmp_name"];
    $size = $file["size"];
    $carpeta="../../documentos/";


    /** Se verifica que los datos sean documentos pdf, documentos de word o imagenes */
    if($tipo != 'application/pdf' && $tipo != 'application/PDF' && $tipo !='application/msword'  && $tipo !='application/DOC' && $tipo !='application/doc' && $tipo !='application/DOCX' && $tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo !='image/jpeg' && $tipo != 'image/png'){     
        print("<script>alert(\"Error, el archivo no es una documento o imagen. \"); window.location.href='menu-abo.php?controlador=mostrar-documento&idexp=$IdExp';</script>");
    }else if ($size > 10*1024*1024){
        print("<script>alert(\"Error, el tamaño maximo permitido es de 10MB. \"); window.location.href='menu-abo.php?controlador=mostrar-documento&idexp=$IdExp';</script>");
      }else{

        $src = $carpeta.$nam;
        move_uploaded_file($ruta_tem, $src);
        $Documento="documentos/".$nam;

        /** Se inserta los datos en los documento */
        $query = "UPDATE documento SET nombre='$nombre', documento='$Documento' WHERE IdDoc='$documento_id' ";
        $query_run = mysqli_query($con, $query);

    }



    if($query_run)
    {
        

        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Actualización de registro de un documento";
        $tabla="Documento";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se actualizo correctamente el documento. \"); window.location.href='menu-abo.php?controlador=mostrar-documento&idexp=$IdExp';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo actualizar el documento, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-documento&idexp=$IdExp';</script>");
        exit(0);
    }

}


if(isset($_POST['save_agrega']))
{
    $nombre = mysqli_real_escape_string($con, $_POST['nombre_docu']);
    $IdExp = mysqli_real_escape_string($con, $_POST['expedi_id']);
    $estado = 'activo';

    $file = $_FILES['doc'];
    $nam = $file["name"];
    $tipo = $file["type"];
    $ruta_tem = $file["tmp_name"];
    $size = $file["size"];
    $carpeta="../../documentos/";

    /** Se verifica que los datos sean documentos pdf, documentos de word o imagenes */
    if($tipo != 'application/pdf' && $tipo != 'application/PDF' && $tipo !='application/msword'  && $tipo !='application/DOC' && $tipo !='application/doc' && $tipo !='application/DOCX' && $tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo !='image/jpeg' && $tipo != 'image/png'){     
        print("<script>alert(\"Error, el archivo no es una documento o imagen. \"); window.location.href='menu-abo.php?controlador=mostrar-documento&idexp=$IdExp';</script>");
    }else if ($size > 10*1024*1024){
        print("<script>alert(\"Error, el tamaño maximo permitido es de 10MB. \"); window.location.href='menu-abo.php?controlador=mostrar-documento&idexp=$IdExp';</script>");
      }else{

        $src = $carpeta.$nam;
        move_uploaded_file($ruta_tem, $src);
        $Documento="documentos/".$nam;

        /** Se inserta los datos en los evidencia */
        $query = "INSERT INTO documento (nombre, tipo, documento, estado, IdExp) VALUES ('$nombre','$tipo','$Documento', '$estado','$IdExp')";
        $query_run = mysqli_query($con, $query);

    }


    if($query_run)
    {
        
        $iduser = $_SESSION['iduser'];

        //zona horaria Tegucigalpa, para registro en el sistema.
        date_default_timezone_set('America/Tegucigalpa');
         $fechaingreso = date('m-d-Y h:i:s ', time());  
        
        //Datos de bitacora
        $actividad = "Nuevo registro de Documento.";
        $tabla="Documento";


        //Inserción de la bitacora.
        $querybita = "INSERT INTO bitacora (fecha_acti,actividad,tabla,iduser) VALUES ('$fechaingreso','$actividad','$tabla',$iduser)";
        $query_runbita = mysqli_query($con, $querybita);


        print("<script>alert(\"Se agrego exitosamente la documento. \"); window.location.href='menu-abo.php?controlador=mostrar-documento&idexp=$IdExp';</script>");
        exit(0);
    }
    else
    {
        print("<script>alert(\"No se pudo agregar la nueva documento, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=mostrar-documento&idexp=$IdExp';</script>");
        exit(0);
    }
}
