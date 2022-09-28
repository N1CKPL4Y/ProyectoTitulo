<?php

include_once '../../DB/Model_Data.php';

$data = new Data();
$conexion = $data->getConnection();

$rut = isset($_GET['rut']) ? $_GET['rut'] : null;
//echo $rut;

$query = "SELECT * FROM `beneficiario` WHERE rut = '$rut';";

$resul = $conexion->query($query) or die(mysql_error());

if ($row = $resul->fetch_array()) {
    $rut = $row['RUT'];
    $nom = $row['nombre'];
    $ape = $row['apellido'];
    $contenido = $row['c_identidad'];
    $tipo = 'image/jpeg';
    //$nombreArchivo = basename($rut . "RegistroSocial.pdf");
//content-disposition 
//inline: abre el archivo pero no lo descarga
//attachment: descarga el archivo automaticamente
    //header("Content-type: image/jpeg");
    //echo $row['c_identidad'];
}
//echo base64_encode($contenido);
require '../../fpdf/fpdf.php';

$dataUrl="data:image/jpeg;base64,".base64_encode($contenido)."";
$img = explode(',',$dataUrl,2)[1];
$pic = 'data://text/plain;base64,'. $img;

$pdf = new FPDF();
$pdf->AddPage('P', 'Legal');
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetXY(70, 10);
$pdf->Cell(60, 7, 'Copia Cedula de identidad');
$pdf->Ln(20);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(180, 6, utf8_decode('Se presenta la copia de la cedula de identidad de: ' . $rut . ' correspondiente a Don: ' . $nom . ' ' . $ape));
$pdf->Ln();
$pdf->Image($pic,20,50,130,80,'jpg');
$pdf->Output('Contrato.pdf', 'I');
?>

