

<?php
//conexion a la base de datos. Mysql
//Autor: Daniel Isaias Canales. 
$con = mysqli_connect("localhost","root","","bufetelegal");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

?>