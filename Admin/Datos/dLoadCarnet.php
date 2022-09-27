<?php

include_once '../../DB/Model_Data.php';

$data = new Data();
$conexion = $data->getConnection();

$rut = isset($_GET['rut']) ? $_GET['rut'] : null;
echo $rut;

$query = "SELECT * FROM `beneficiario` WHERE rut = '$rut';";

$resul = $conexion->query($query) or die(mysql_error());

if ($row = $resul->fetch_array()) {
    $rut = $row['RUT'];
    $contenido = $row['c_identidad'];
    $tipo = 'image/jpeg';
    $nombreArchivo = basename($rut . "RegistroSocial.pdf");

//content-disposition 
//inline: abre el archivo pero no lo descarga
//attachment: descarga el archivo automaticamente
    //header("Content-type: image/jpeg");
    //echo $row['c_identidad'];
}

require ('../../FPDF/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage('P', 'Legal');
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetXY(60, 10);
$pdf->Cell(60, 7, 'CONTRATO DE TRABAJO ');
$pdf->Ln(20);
$pdf->SetFont('Arial', '', 10);
$pdf->Output('Contrato.pdf','I');
echo "<script language='javascript'>window.open('Contrato.pdf','_blank','');window.location.href='Home.php'</script>";
?>

