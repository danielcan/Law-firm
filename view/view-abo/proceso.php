<?php
session_start();
$abog = $_SESSION['idabo'];
//Fichero de conexion con l base de datos
require '../../controller/conexion.php';

$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
$inicio = filter_input(INPUT_POST, 'inicio', FILTER_SANITIZE_STRING);
$fin = filter_input(INPUT_POST, 'fin', FILTER_SANITIZE_STRING);
$descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);

if(!empty($titulo) && !empty($color) && !empty($inicio) && !empty($fin)){

	$consulta_agenda = "SELECT *  FROM agenda WHERE IdAbo='$abog'";
	$resultado_agenda = mysqli_query($con, $consulta_agenda);
	$proceso = mysqli_fetch_array($resultado_agenda);
	$idAgen = $proceso['IdAgen'] ;

	//Convertir la fecha y la hora del formato
	$data = explode(" ", $inicio);
	list($date, $hora) = $data;
	$data_barra = array_reverse(explode("/", $date));
	$data_barra = implode("-", $data_barra);
	$inicio_barra = $data_barra . " " . $hora;
	
	$data = explode(" ", $fin);
	list($date, $hora) = $data;
	$data_barra = array_reverse(explode("/", $date));
	$data_barra = implode("-", $data_barra);
	$fin_barra = $data_barra . " " . $hora;
	
	$consulta_eventos = "INSERT INTO evento (titulo, color, fecha_inicio, fecha_fin, descripcion, IdAgen) VALUES ('$titulo', '$color', '$inicio_barra', '$fin_barra', '$descripcion', '$idAgen')";
	$resultado_eventos = mysqli_query($con, $consulta_eventos);
	
	//Comprobar si guardó en la base de datos a través de "mysqli_insert_id" el cual comprueba si existe el ID del último dato insertado
	if(mysqli_insert_id($con)){
		$_SESSION['mensaje'] = "<div class='alert alert-success' role='alert'>El evento registrado con éxito<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		print("<script>alert(\"Se agrego exitosamente el evendo a tu calendario. \"); window.location.href='menu-abo.php?controlador=mostrar-agenda';</script>");
	}else{
		$_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'>Error al registrar el evento<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		
	}
	
}else{
	$_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'>Error al registrar el evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	print("<script>alert(\"Error al registrar su evento. \"); window.location.href='menu-abo.php?controlador=mostrar-agenda';</script>");
}