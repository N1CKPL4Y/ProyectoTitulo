<?php

session_start();
include_once '../DB/Model_Data.php';
include_once './traduccionfecha.php';
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

$tipoA = $data->getDatosGenerales($beneficiario);
$tAtencion;
foreach ($tipoA as $value) {
    $tAtencion = $value['atencion'];
}
$textAt;
switch ($tAtencion) {
    case 1:
        $textAt = 'Atención por beneficio (Programas sociales previo evaluación social)';
        break;
    case 2:
        $textAt = 'Atención por programa pagado (Costo mínimo asociado)';
        break;
    default:
        break;
}


require '../fpdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage('P', 'Legal');
$pdf->SetTitle(utf8_decode("Bitacora de atención"));
$pdf->SetFont('Arial', 'BU', 16);
$pdf->SetXY(70, 10);
$pdf->Image('../IMG/Bitacora.png', 22, 6, 20, 20);
$pdf->SetXY(70, 10);
$pdf->Cell(60, 7, utf8_decode('Bitacora de atención N° ' . $id));
$pdf->SetXY(75, 30);
$pdf->Cell(60, 7, utf8_decode('IDENTIFICACIÓN DEL USUARIO'), 0, 0, 'C');

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
    $fechaN = $value['fecha_nac'];
    $fechaNac = fechaEsp($fechaN);
    $pdf->Cell(50, 7, utf8_decode('Fecha de Nacimiento: ' . $fechaNac));
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
    $pdf->SetXY(20, 85);
    $pdf->MultiCell(160, 7, utf8_decode('Tipo de atención: ' . $textAt));
    $pdf->Ln();
    $pdf->SetXY(10, 130);
    $pdf->Ln();
    $pdf->SetFillColor(200, 230, 201);
    $pdf->MultiCell(195, 7, utf8_decode('Antecedentes relevantes'), 0, '', true);
    $pdf->Ln();
    $pdf->MultiCell(195, 7, utf8_decode($antecedentes), 0, 'J');
    $pdf->Ln();
    $pdf->SetX(10);
    $pdf->MultiCell(195, 7, utf8_decode('Objetivos'), 0, '', true);
    $pdf->Ln();
    $pdf->MultiCell(195, 7, utf8_decode($objetivos), 0, 'J');
    $pdf->Ln();
    $pdf->SetX(10);
    $pdf->MultiCell(195, 7, utf8_decode('Actividad'), 0, '', true);
    $pdf->Ln();
    $pdf->MultiCell(195, 7, utf8_decode($actividad), 0, 'J');
    $pdf->Ln();
    $pdf->SetX(10);
    $pdf->MultiCell(195, 7, utf8_decode('Acuerdo'), 0, '', true);
    $pdf->Ln();
    $pdf->MultiCell(195, 7, utf8_decode($acuerdo), 0, 'J');
    $pdf->Ln();
    $pdf->SetX(10);
    $pdf->MultiCell(195, 7, utf8_decode('Observaciones'), 0, '', true);
    $pdf->Ln();
    $pdf->MultiCell(195, 7, utf8_decode($observacion), 0, 'J');

    $pdf->Ln(50);
    $pdf->SetX(55);
    $pdf->Cell(100, 7, utf8_decode($_SESSION['nombre'] . " " . $_SESSION['apellido']), 0, 0, 'C');
    $pdf->Ln();
    $pdf->SetX(87);
    $areas = $data->getAreaById($_SESSION['area_u'], 0, 0, 'C');
    $a_usuario;
    foreach ($areas as $value) {
        $a_usuario = $value['nombre'];
    }
    $pdf->Cell(100, 7, utf8_decode($a_usuario));
    $pdf->Ln();
    $pdf->SetX(55);
    $fechaB = fechaEsp($fecha_hora);
    $pdf->Cell(100, 7, utf8_decode($fechaB), 0, 0, 'C');
}

$pdf->Output('Bitacora' . $beneficiario . '_' . $programa . '.pdf', 'I');
?>

