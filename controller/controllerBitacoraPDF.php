<?php

session_start();
include_once '../DB/Model_Data.php';
$data = new Data();
$id_Bitacora = isset($_GET['id']) ? $_GET['id'] : null;

$bitacora = $data->getBitacoraByID($id_Bitacora);
$id;
$beneficiario;
$usuario;
$programa;
$fecha_hora;
$antecedentes;
$objetivos;
$actividad;
$acuerdo;
$observacion;
foreach ($bitacora as $value) {
    $id = $value['id'];
    $beneficiario = $value['beneficiario'];
    $usuario = $value['usuario'];
    $programa = $value['programa'];
    $fecha_hora = $value['fecha_hora'];
    $antecedentes = $value['antecedentes_r'];
    $objetivos = $value['objetivo'];
    $actividad = $value['actividad'];
    $acuerdo = $value['acuerdo'];
    $observacion = $value['observacion'];
}

require '../fpdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage('P', 'Legal');
$pdf->SetTitle(utf8_decode("Bitacora de atención"));
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetXY(70, 10);
$pdf->Image('../IMG/Bitacora.png', 10, 2, 40, 40);
$pdf->SetXY(70, 10);
$pdf->Cell(60, 7, utf8_decode('Bitacora de atención N° ' . $id));
$pdf->SetXY(65, 30);
$pdf->Cell(60, 7, utf8_decode('IDENTIFICACIÓN DEL USUARIO'));

$pdf->SetFont('Arial');
$benefs = $data->getBenefi($beneficiario);
foreach ($benefs as $value) {
    $pdf->SetXY(20, 50);
    $pdf->Cell(50, 7, utf8_decode('Nombre: ' . $value['nombre'] . " " . $value['apellido']));
    $pdf->Ln();
    $pdf->SetXY(20, 57);
    $pdf->Cell(50, 7, utf8_decode('Rut: ' . $value['RUT']));
    $pdf->Ln();
    $pdf->SetXY(20, 64);
    $time = strtotime($value['fecha_nac']);
    setlocale(LC_ALL, "es_ES");
    $newformat = date('d-M-Y', $time);
    $pdf->Cell(50, 7, utf8_decode('Fecha de Nacimiento: ' . $newformat));
    $pdf->Ln();
    $pdf->SetXY(20, 71);
    $edad = $data->getEdad($value['RUT']);
    $ano;
    $meses;
    foreach ($edad as $valueE) {
        $ano = $valueE['Años'];
        $meses = $valueE['Meses'];
        if ($meses < 0) {
            $ano = $ano - $meses;
            $meses = 12 + $meses;
        }
        $pdf->Cell(50, 7, utf8_decode('Edad: ' . $ano . ' años ' . $meses . ' meses'));
    }
    $diagnosB;
    $codeB;
    $diagnos = $data->getDiagValid($value['RUT']);
    $diagnost = $data->getDiagCom($value['RUT']);
    if ($diagnos) {
        foreach ($diagnost as $value) {
            $diagnosB = $value['codigo'];
            $codeB = $value['nombre'];
        }
    } else {
        $diagnosB = "No posee diagnostico";
        $codeB = "0";
    }
    $pdf->Ln();
    $pdf->SetXY(20, 78);
    $pdf->Cell(50, 7, utf8_decode('Diagnostico: ' . $diagnosB . ' - ' . $codeB));
    $pdf->Ln();
    $pdf->SetXY(20, 92);
    $pdf->Cell(50, 7, utf8_decode('Antecedentes relevantes'));
    $pdf->Ln();
    $pdf->SetXY(20, 100);
    $pdf->MultiCell(180, 7, utf8_decode($antecedentes . "\n\n Objetivos\n\n" . $objetivos . "\n\n Actividad \n\n " . $actividad . "\n\n Acuerdo \n\n " . $acuerdo . " \n\n Observaciones \n\n" . $observacion));
    $pdf->Ln(50);
    $pdf->SetX(60);
    $pdf->Cell(100, 7, utf8_decode($_SESSION['nombre'] . " " . $_SESSION['apellido']));
    $pdf->Ln();
    $pdf->SetX(87);
    $areas = $data->getAreaById($_SESSION['area_u']);
    $a_usuario;
    foreach ($areas as $value) {
        $a_usuario = $value['nombre'];
    }
    $pdf->Cell(100, 7, utf8_decode($a_usuario));
    $pdf->Ln();
    $pdf->SetX(75);
    $pdf->Cell(100, 7, utf8_decode($fecha_hora));
}

$pdf->Output('Bitacora'.$beneficiario.'_'.$programa.'.pdf', 'I');
?>
