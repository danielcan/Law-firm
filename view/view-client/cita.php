
<?php 
// verificacion de cita, si tien que vea la cita y que no agregue más citas.

//la verificacion de la cita debe de no tener el usuario con cita activa


require '../../controller/conexion.php';
$consultacita = "SELECT idcita  FROM citas WHERE IdUser='$iduser' and estado ='activo' or IdUser='$iduser' and  estado='En proceso'";
$query_cita = mysqli_query($con, $consultacita);
$datacita = mysqli_fetch_array($query_cita);

if(mysqli_num_rows($query_cita) > 0){

    print("<script>window.location.href='menu-client.php?controlador=mostrar_cita';</script>");
}else{

    print("<script>window.location.href='menu-client.php?controlador=creacion_cita';</script>");
    
}


?>