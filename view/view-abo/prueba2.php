<?php
require_once "src/CifrasEnLetras.php";


$totalpagar=5000;
$v=new CifrasEnLetras(); 
//Convertimos el total en letras
$letra=($v->convertirEurosEnLetras($totalpagar));
print($letra);



//$formatter = new NumeroALetras();

?>