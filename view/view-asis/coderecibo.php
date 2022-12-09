<?php
session_start();
require '../../controller/conexion.php';
$idabog = $_SESSION['idabo'];

if(isset($_POST['buscar']))
{
    if(isset($_POST['busqueda_r']))
    {
        $busqueda_e = mysqli_real_escape_string($con, $_POST['busqueda_r']);
        print("<script> window.location.href='menu-abo.php?controlador=mostrar-recibo-busqueda&nombre=$busqueda_e';</script>");
    }
    
}

if (isset($_POST['save_recibi'])) {
    $idclient = mysqli_real_escape_string($con, $_POST['idclient']);
    //$recibi = mysqli_real_escape_string($con, $_POST['recibi']);
    $sumaneta_l = mysqli_real_escape_string($con, $_POST['sumaneta_l']);
    $sumaneta_n = mysqli_real_escape_string($con, $_POST['sumaneta_n']);
    $concepto = mysqli_real_escape_string($con, $_POST['concepto']);

    $query = "SELECT * FROM  perfil as p WHERE p.IdUser = $idclient ";
    $query_run = mysqli_query($con, $query);
    $cliente = mysqli_fetch_array($query_run);
    $cliente['primer_nomb'];
    $cliente['segundo_nomb'];
    $cliente['primer_ape'];
    $cliente['segundo_ape'];

    $recibi = $cliente['primer_nomb']." ".$cliente['segundo_nomb']." ".$cliente['primer_ape']." ".$cliente['segundo_ape'];

    $queryabo = "SELECT p.primer_nomb, p.segundo_nomb, p.primer_ape, p.segundo_ape, p.telefono, p.celular, u.correo FROM  perfil as p, abogado as a, usuario as u WHERE a.IdAbo = $idabog AND a.IdPer = p.IdPer AND p.IdUser = u.IdUser ";
    $query_runabo = mysqli_query($con, $queryabo);
    $abogado = mysqli_fetch_array($query_runabo);
    $nombreCompletoAbo = $abogado['primer_nomb'] ." ".$abogado['segundo_nomb']." ".$abogado['primer_ape']." ".$abogado['segundo_ape'];
    $telefono = $abogado['telefono'];
    $celular = $abogado['celular'];
    $correo = $abogado['correo'];

    $fechaing = date('d-m-Y ', time());  

    $documento = "recibos/". $cliente['primer_nomb'].$cliente['primer_ape'].$fechaing.".pdf";

    date_default_timezone_set('America/Tegucigalpa');
    $fechaingreso = date('Y-d-m h:i:s ', time());  

     $queryinser = "INSERT INTO recibo (recibi, sumanetal, sumanetan, concepto, fechare, documento, IdUser, IdAbo) VALUES ('$recibi','$sumaneta_l','$sumaneta_n','$concepto','$fechaingreso','$documento','$idclient','$idabog')";
     $query_runinser = mysqli_query($con, $queryinser);

     if($query_runinser){
    
        $querynuevo = "SELECT * FROM recibo WHERE documento = '$documento' ";
        $query_runnuevo = mysqli_query($con, $querynuevo);
        $nuevo = mysqli_fetch_array($query_runnuevo); 
        $idrec = $nuevo['IdRec'];

        //libreria de pdf
    include "fpdf/fpdf.php";

    $pdf = new FPDF($orientation = 'P', $unit = 'mm');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 13);
    $textypos = 5;
    $pdf->setY(12);
    $pdf->setX(25);
    $pdf->Cell(5, $textypos, utf8_decode("$nombreCompletoAbo"));
    //TITULO
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->setY(17);
    $pdf->setX(50);
    $pdf->Cell(5, $textypos, "Abogado");

    //corrimiento en x y y como el plano carte
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->setY(12);
    $pdf->setX(136);
    $pdf->Cell(5, $textypos, "RECIBO POR HONORARIOS");
    $pdf->setY(18);
    $pdf->setX(120);
    $pdf->Cell(5, $textypos, "CAI: 0C37F6-FDCE1F-0042B6-11AE7-12AD48-C0");


    // Agregamos los datos de la empresa
    //$pdf->Cell(5, $textypos, "Bufete Legal");
    $pdf->Image('assets/images/logo-default-143.png',10,8,10);
    $pdf->Image('assets/images/logo-default-143.png',102,8,10);
    $pdf->SetFont('Arial', 'B', 10);
   /* $pdf->setY(30);
    $pdf->setX(10);
    $pdf->Cell(5, $textypos, "DE:");*/
    $pdf->SetFont('Arial', '', 10);
    $pdf->setY(35);
    $pdf->setX(25);
    $pdf->Cell(5, $textypos, "Telefono: $telefono");
    $pdf->setY(40);
    $pdf->setX(25);
    $pdf->Cell(5, $textypos, "Celular: $celular");
    $pdf->setY(45);
    $pdf->setX(25);
    $pdf->Cell(5, $textypos, "Honduras C.A");
    /*$pdf->setY(50);
    $pdf->setX(10);
    $pdf->Cell(5, $textypos, "Email de la empresa");*/

    // Agregamos los datos del cliente
    $pdf->SetFont('Arial', 'B', 10);
    /*$pdf->setY(30);
    $pdf->setX(75);
    $pdf->Cell(5, $textypos, "PARA:");*/
    $pdf->SetFont('Arial', '', 10);
    $pdf->setY(35);
    $pdf->setX(75);
    $pdf->Cell(5, $textypos, "Correo: $correo");
    $pdf->setY(40);
    $pdf->setX(75);
    $pdf->Cell(5, $textypos, "Tegucigalpa, M.D.C.");
    /*$pdf->setY(45);
    $pdf->setX(75);
    $pdf->Cell(5, $textypos, "Telefono del cliente");
    $pdf->setY(50);
    $pdf->setX(75);
    $pdf->Cell(5, $textypos, "Email del cliente");*/

    // Agregamos los datos del cliente
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->setY(30);
    $pdf->setX(135);
    $pdf->Cell(5, $textypos, "FACTURA $idrec");
    $pdf->SetFont('Arial', '', 10);
    $pdf->setY(35);
    $pdf->setX(135);
    $pdf->Cell(5, $textypos, "Fecha: $fechaing");
    /*$pdf->setY(40);
    $pdf->setX(135);
    $pdf->Cell(5, $textypos, "Vencimiento: 11/ENE/2020");*/
  
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->setY(55);
    $pdf->setX(25);
    $pdf->Cell(150, $textypos, utf8_decode("Recibi de: $recibi"), 1);
   
    $pdf->setY(60);
    $pdf->setX(25);
    $pdf->Cell(150, $textypos, "La suma neta de: $sumaneta_l", 1);

    $pdf->setY(65);
    $pdf->setX(25);
    $pdf->Cell(150, $textypos, utf8_decode("Por Concepto de: $concepto"), 1);

    $pdf->setY(75);
    $pdf->setX(120);
    $pdf->Cell(55, $textypos, "Total neto recibido: $sumaneta_n", 1);

    $pdf->setY(90);
    $pdf->setX(10);
    $pdf->Cell(5, $textypos, "TERMINOS Y CONDICIONES");
    $pdf->SetFont('Arial', '', 10);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->setY(100);
    $pdf->setX(65);
    $pdf->Cell(5, $textypos, "Gracias por preferir nuestros servicios legales.");

    $pdf->Output('F',"../../$documento");


    print("<script>alert(\"Se registro el recibo por honorarios del cliente $recibi. \"); window.location.href='menu-abo.php?controlador=mostrar-recibos';</script>");
    exit(0);
}
else
{
    print("<script>alert(\"No se pudo registrar el recibo del cliente, verifica la información proporcionada. \"); window.location.href='menu-abo.php?controlador=recibo&idclient=$idclient';</script>");
    exit(0);
}
   

}
