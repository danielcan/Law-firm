<?php

//require 'conexion.php';
require '../../controller/conexion.php';


if(isset($_POST['save_perfil']))
{
    //datos de registro perfil de la vista
   

    $pnombre = mysqli_real_escape_string($con, $_POST['pnombre']);
    $snombre = mysqli_real_escape_string($con, $_POST['snombre']);
    $papellido = mysqli_real_escape_string($con, $_POST['papellido']);
    $sapellido = mysqli_real_escape_string($con, $_POST['sapellido']);
    $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
    $celular = mysqli_real_escape_string($con, $_POST['celular']);
    $direccion = mysqli_real_escape_string($con, $_POST['direccion']);
    $dni = mysqli_real_escape_string($con, $_POST['identidad']);
    $pais = mysqli_real_escape_string($con, $_POST['pais']);
    $fecha = mysqli_real_escape_string($con, $_POST['fecha']);
    $ocupacion = "Abogado";
    $genero = mysqli_real_escape_string($con, $_POST['genero']);
    $foto = " ";

    //De la ventana anterior.
    $iduser = mysqli_real_escape_string($con, $_POST['id_usu']); 


    $query = "INSERT INTO perfil (primer_nomb,segundo_nomb,primer_ape,segundo_ape,telefono,celular,direccion,DNI,IdPais,fecha_naci,ocupacion,genero,foto,IdUser) VALUES ('$pnombre','$snombre','$papellido','$sapellido','$telefono','$celular','$direccion','$dni','$pais','$fecha','$ocupacion','$genero','$foto','$iduser')";
    $query_run = mysqli_query($con, $query);


    if($query_run == 1)
    {


        //Recuperación de datos de la tabla de usuario para las variables de session.
        $query1 = "SELECT IdPer FROM perfil WHERE iduser='$iduser' ";
        $query_run2 = mysqli_query($con, $query1);
        $datas = mysqli_fetch_array($query_run2);
        
                
       $id = $datas['IdPer'];

        print("<script>alert(\"Se agrego exitosamente el perfil del abogado. Continua con el registro de la infomracion del abogado. \"); window.location.href='menu-abo.php?controlador=abogado-create&id=$id';</script>");
        exit(0);

    }
    else
    {
        print("<script>alert(\"No se pudo agregar el nuevo perfil, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=new-perf-abog&id=$iduser';</script>");
        exit(0);
    }
}

?>