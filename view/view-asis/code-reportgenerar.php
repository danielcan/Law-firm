

<?php
session_start();
require '../../controller/conexion.php';

if (isset($_POST['generar-re'])) {

    $abog_id = mysqli_real_escape_string($con, $_POST['abog_id']);

    $query = "SELECT p.primer_nomb as primer, p.segundo_nomb as segundo,p.primer_ape as apelipri, p.segundo_ape as apesegu, (SELECT COUNT(c.IdCita) FROM abogado as a, asignacion as b, citas as c WHERE a.IdAbo = '$abog_id' AND a.IdAbo = b.IdAbo AND b.IdCita = c.IdCita AND c.estado = 'En proceso') as citaenproceso,(SELECT COUNT(c.IdCita) FROM abogado as a, asignacion as b, citas as c 
    WHERE a.IdAbo = '$abog_id' AND a.IdAbo = b.IdAbo AND b.IdCita = c.IdCita AND c.estado = 'atrasado') as citaatrasada, (SELECT COUNT(c.IdCita) FROM abogado as a, asignacion as b, citas as c WHERE a.IdAbo = '$abog_id' AND a.IdAbo = b.IdAbo AND b.IdCita = c.IdCita AND c.estado = 'Finalizado') as citafinalizada, (SELECT COUNT(c.IdCita) FROM abogado as a, asignacion as b, citas as c 
    WHERE a.IdAbo = '$abog_id' AND a.IdAbo = b.IdAbo AND b.IdCita = c.IdCita AND c.estado = 'Desestimar') as desestimar, (SELECT COUNT(e.IdExp) FROM abogado as a, aboxex as x, expediente as e WHERE a.IdAbo = '$abog_id' AND a.IdAbo = x.IdAbo AND x.IdExp = e.IdExp AND e.estado = 'activo') as expedienteactivo,(SELECT COUNT(e.IdExp) FROM abogado as a, aboxex as x, expediente as e 
    WHERE a.IdAbo = '$abog_id' AND a.IdAbo = x.IdAbo AND x.IdExp = e.IdExp AND e.estado = 'finalizado') as finalizado,(SELECT COUNT(e.IdExp) FROM abogado as a, aboxex as x, expediente as e WHERE a.IdAbo = '$abog_id' AND a.IdAbo = x.IdAbo AND x.IdExp = e.IdExp AND e.tipo='caso') as casototal, (SELECT COUNT(e.IdExp) FROM abogado as a, aboxex as x, expediente as e 
    WHERE a.IdAbo = '$abog_id' AND a.IdAbo = x.IdAbo AND x.IdExp = e.IdExp AND e.tipo='tramite') as tramite FROM abogado as f, perfil as p WHERE f.IdAbo = '$abog_id' AND f.IdPer = p.IdPer ";
    $query_run = mysqli_query($con, $query);
    $data = mysqli_fetch_array($query_run);

    $primer = $data['primer'];
    $segundo = $data['segundo'];
    $apelipri = $data['apelipri'];
    $apesegu = $data['apesegu'];

    $nombrecompleto = $primer ." ". $segundo ." ". $apelipri ." ". $apesegu;

    $citaenproceso = $data['citaenproceso'];
    $citaatrasada = $data['citaatrasada'];
    $citafinalizada = $data['citafinalizada'];
    $desestimar = $data['desestimar'];
    $expedienteactivo = $data['expedienteactivo'];
    $finalizado = $data['finalizado'];
    $casototal = $data['casototal'];
    $tramite = $data['tramite'];


    require('fpdf/fpdf.php');

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {

            // Arial bold 15
            $this->SetFont('Arial', 'B', 16);
            // Movernos a la derecha
            $this->Cell(60);
            
            $this->Image('assets/I-images/logo-default-143x27.png',10,8,22);
            // Título
            $this->Cell(70, 10, 'Reporte de seguimiento de actividades', 0, 0, 'C');
            // Salto de línea
            $this->Ln(20);



       //     $this->SetFont('Arial', '', 12);
       //     
       //     $this->MultiCell(0, 7, utf8_decode('Este reporte es una breve descripción de los seguimientos de cita y expediente por el abogado xxxx. Con este reporte te servirá para ver los seguimientos de actividades por este abogado. Se vera en este reporte como citas en proceso, citas atrasadas o citas finalizadas que fueron asignado por este abogado.'), 0, 1);
       //     $this->Ln();
      //      $this->MultiCell(0, 7, utf8_decode('FPDF es una clase PHP que permite la generación de archivos PDF de forma sencilla y sin necesidad de instalar librerías adicionales, cuenta con métodos bien documentados que facilitan su uso.'), 0, 1);
       //     $this->Ln();
       //     $this->MultiCell(0, 7, utf8_decode('Antes de comenzar lo primero es descargar FPDF e incluir los archivos necesarios en nuestro proyecto.'), 0, 1);
       //     $this->Ln();
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            // Número de página
            $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }

    //require ("cn.php");
    /*
$consulta = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $consulta);
*/

    $pdf = new PDF();


    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);

    $pdf->SetFont('Arial', '', 12);
            
    $pdf->MultiCell(0, 7, utf8_decode('Este reporte es una breve descripción de los seguimientos de cita y expediente por el abogado  '. $nombrecompleto .'.  Con este reporte te servirá para ver los seguimientos de actividades por este abogado. Se vera en este reporte como citas en proceso, citas atrasadas o citas finalizadas que fueron asignado por este abogado.'), 0, 1);
    $pdf->Ln();

    $pdf->Cell(15);
    $pdf->Cell(160, 10, 'Cuadro de sumas totales', 1, 1, 'C', 0);
    $pdf->Cell(15);
    $pdf->Cell(80, 10, 'Nombre del abogado', 1, 0, 'C', 0);
    $pdf->Cell(80, 10, $nombrecompleto, 1, 1, 'C', 0);
    $pdf->Cell(15);
    $pdf->Cell(80, 10, 'Cita en proceso', 1, 0, 'C', 0);
    $pdf->Cell(80, 10, $citaenproceso, 1, 1, 'C', 0);
    $pdf->Cell(15);
    $pdf->Cell(80, 10, 'Cita atrasadas', 1, 0, 'C', 0);
    $pdf->Cell(80, 10, $citaatrasada, 1, 1, 'C', 0);
    $pdf->Cell(15);
    $pdf->Cell(80, 10, 'Cita finalizadas', 1, 0, 'C', 0);
    $pdf->Cell(80, 10, $citafinalizada, 1, 1, 'C', 0);
    $pdf->Cell(15);
    $pdf->Cell(80, 10, 'Cita desestimadas', 1, 0, 'C', 0);
    $pdf->Cell(80, 10, $desestimar, 1, 1, 'C', 0);
    $pdf->Cell(15);
    $pdf->Cell(80, 10, 'Expediente activos', 1, 0, 'C', 0);
    $pdf->Cell(80, 10, $expedienteactivo, 1, 1, 'C', 0);
    $pdf->Cell(15);
    $pdf->Cell(80, 10, 'Expediente finalizado', 1, 0, 'C', 0);
    $pdf->Cell(80, 10, $finalizado, 1, 1, 'C', 0);
    $pdf->Cell(15);
    $pdf->Cell(80, 10, 'Total casos', 1, 0, 'C', 0);
    $pdf->Cell(80, 10, $casototal, 1, 1, 'C', 0);
    $pdf->Cell(15);
    $pdf->Cell(80, 10, 'Total tramites', 1, 0, 'C', 0);
    $pdf->Cell(80, 10, $tramite, 1, 1, 'C', 0);


    /*
while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(80,10,$row['nombre'],1,0,'C',0);
	$pdf->Cell(50,10,$row['precio'],1,0,'C',0);
	$pdf->Cell(50,10,$row['stock'],1,1,'C',0);

} */

    date_default_timezone_set('America/Tegucigalpa');
    $fechaingreso = date('m-d-Y h:i:s ', time());

    $nombrearchivo = $fechaingreso . "_" . $nombrecompleto . '.pdf';

    $pdf->Output('D', $nombrearchivo);
}
?>


