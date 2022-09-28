<?php
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('P','Legal');
$pdf->SetFont('Arial','B',16);
$pdf->SetXY(60,10);
$pdf->Cell(60,7,'CONTRATO DE TRABAJO ');
$pdf->Output('Contrato.pdf','D');
?>