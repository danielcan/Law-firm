<?php 

 require '../../controller/conexion.php';
 $consultaexpe = "SELECT idexp  FROM expediente WHERE iduser='$iduser' and estado ='activo' and tipo='tramite'";
 $query_expe = mysqli_query($con, $consultaexpe);
 $dataexpe = mysqli_fetch_array($query_expe);

if(mysqli_num_rows($query_expe) > 0){

    print("<script>window.location.href='menu-client.php?controlador=mostrar_tramite';</script>");
}else{

    print("<script>window.location.href='menu-client.php?controlador=mostrar_tramite_avi';</script>");
    
}

?>