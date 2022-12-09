
<?php 
// verificacion de cita, si tien que vea la cita y que no agregue más citas.

//la verificacion de la cita debe de no tener el usuario con cita activa


require '../../controller/conexion.php';
$consultacita = "select iddoc from usuario, expediente, documento where usuario.iduser= '$iduser' and usuario.iduser = expediente.iduser and expediente.idexp = documento.idexp;";
$query_cita = mysqli_query($con, $consultacita);
$datacita = mysqli_fetch_array($query_cita);

if(mysqli_num_rows($query_cita) > 0){

    print("<script>window.location.href='menu-client.php?controlador=mostrar_documento';</script>");
}else{

    print("<script>window.location.href='menu-client.php?controlador=mostrar_documento_avi';</script>");
    
}

//select iddoc from u usuario,e expediente, d documento where u.iduser= "" and u.iduser = e.iduser and e.idexp = d.idexp
?>