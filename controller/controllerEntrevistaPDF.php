<?php

session_start();
require_once '../js/traduccionFechaNac.js';
include_once '../DB/Model_Data.php';
$data = new Data();
$rutBene = isset($_GET['rutBene']) ? $_GET['rutBene'] : null;
//echo $rutBene;
$benef = $data->getBenefi($rutBene);
$nombreB;
$apellidoB;
$fechaNacB;
$generoB;
$direccionB;
$comunaB;
foreach ($benef as $value) {
    $nombreB = $value['nombre'];
    $apellidoB = $value['apellido'];
    $fechaNacB = $value['fecha_nac'];
    $generoB = $value['genero'];
    $direccionB = $value['direccion'];
    $comunaB = $value['comuna'];
}

echo '<script>fechaEsp('.$fechaNacB.')</script>';

$parentesco = $data->getParentesco($rutBene);
$parecido;
$rutTutor;
foreach ($parentesco as $value) {
    $parecido = $value['parecido'];
    $rutTutor = $value['tutor'];
}

$textParecido;
switch ($parecido) {
    case 1:
        $textParecido = 'Padre';
        break;
    case 2:
        $textParecido = 'Madre';
        break;
    case 3:
        $textParecido = 'Otro';
    default:
        break;
}

$tutor = $data->getTutor($rutTutor);
$nombreT;
$fechaNacT;
$direccionT;
$comunaT;
$telefonoT;
$emailT;
foreach ($tutor as $value) {
    $nombreT = $value['nombre'];
    $fechaNacT = $value['fecha_nac'];
    $direccionT = $value['direccion'];
    $comunaT = $value['comuna'];
    $telefonoT = $value['telefono'];
    $emailT = $value['email'];
}

echo '<script>fechaEsp('.$fechaNacT.')</script>';

$entrevista = $data->getEntrevista($rutBene);
$rutU;
$idEmbParto;
$idPostParto;
$idLactancia;
$idDesMotriz;
$idVision;
$idAudicion;
$idDesLengua;
$idDesSocial;
$idSalud;
$idAntFam;
$idAntEscolar;
$idActFam;
$fechaE;
foreach ($entrevista as $value) {
    $rutU = $value['rut_usuario'];
    $idEmbParto = $value['id_embPart'];
    $idPostParto = $value['id_postParto'];
    $idLactancia = $value['id_lactancia'];
    $idDesMotriz = $value['id_DesMotriz'];
    $idVision = $value['id_Vision'];
    $idAudicion = $value['id_Audicion'];
    $idDesLengua = $value['id_DesLengua'];
    $idDesSocial = $value['id_DesSocial'];
    $idSalud = $value['id_Salud'];
    $idAntFam = $value['id_AntFam'];
    $idAntEscolar = $value['id_AntEscolar'];
    $idActFam = $value['id_ActFam'];
    $fechaE = $value['fecha'];
}

echo '<script>fechaEsp('.$fechaNacT.')</script>';

$usuario = $data->getUserbyRut($rutU);
$nombreU;
$apellidoU;
$cargo;
foreach ($usuario as $value) {
    $nombreU = $value['nombre'];
    $apellidoU = $value['apellido'];
    $cargo = $value['cargo'];
}
$cargoU = $data->getCargobyId($cargo);
$nombreCargo;
foreach ($cargoU as $value) {
    $nombreCargo = $value['nombre'];
}

require '../fpdf/fpdf.php';
$pdf = new FPDF();
$pdf->AddPage('P', 'Legal');
$pdf->Header();
$pdf->SetTitle(utf8_decode("Entrevista de antecedentes" . " " . $rutBene));
$pdf->SetFont('Arial', 'BU', 22);
$pdf->SetXY(70, 15);
//coordenadas imagen (x, y, ancho, alto)
$pdf->Image('../IMG/iconEntrevista.png', 10, 5, 25, 20);
$pdf->Image('../IMG/iconEntrevista.png', 180, 5, 25, 20);
$pdf->SetXY(55, 25);
$pdf->Cell(60, 7, utf8_decode('Entrevista de Antecedentes'));
$pdf->Ln();
$pdf->SetFont('Arial', 'BU', 14);
$pdf->SetXY(10, 50);
$pdf->Cell(60, 2, utf8_decode('Información del beneficiario:'));
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 60);
$pdf->Cell(60, -1, utf8_decode('RUT:'));
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(22, 60);
$pdf->Cell(60, -1, utf8_decode($rutBene));
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 65);
$pdf->Cell(60, -1, utf8_decode('Nombre Completo:'));
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(50, 65);
$pdf->Cell(60, -1, utf8_decode($nombreB . ' ' . $apellidoB . '.'));
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 70);
$pdf->Cell(60, -1, utf8_decode('Fecha de nacimiento:'));
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(55, 70);
$pdf->Cell(60, -1, utf8_decode($fechaNBene . '.'));
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 75);
$pdf->Cell(60, -1, utf8_decode('Dirección:'));
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(33, 75);
$pdf->Cell(60, -1, utf8_decode($direccionB . ', ' . $comunaB . '.'));
$pdf->Ln();
$pdf->SetFont('Arial', 'BU', 14);
$pdf->SetXY(10, 85);
$pdf->Cell(60, 2, utf8_decode('Información del Tutor:'));
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 90);
$pdf->Cell(60, 6, utf8_decode('RUT:'));
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(22, 90);
$pdf->Cell(60, 6, utf8_decode($rutTutor));
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 95);
$pdf->Cell(60, 6, utf8_decode('Nombre Completo:'));
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(50, 95);
$pdf->Cell(60, 6, utf8_decode($nombreT . '.'));
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 100);
$pdf->Cell(60, 6, utf8_decode('Fecha de nacimiento:'));
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(55, 100);
$pdf->Cell(60, 6, utf8_decode($fechaNTutor . '.'));
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 105);
$pdf->Cell(60, 6, utf8_decode('Dirección:'));
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(32, 105);
$pdf->Cell(60, 6, utf8_decode($direccionT . ', ' . $comunaT . '.'));
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 110);
$pdf->Cell(60, 6, utf8_decode('Telefono:'));
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(30, 110);
$pdf->Cell(60, 6, utf8_decode('+56' . $telefonoT . '.'));
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 115);
$pdf->Cell(60, 6, utf8_decode('Correo Electronico:'));
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(51, 115);
$pdf->Cell(60, 6, utf8_decode($emailT . '.'));
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 120);
$pdf->Cell(60, 6, utf8_decode('Parentesco:'));
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(36, 120);
$pdf->Cell(60, 6, utf8_decode($textParecido . '.'));
$pdf->Ln();
$pdf->SetXY(10, 170);
$pdf->MultiCell(195, 6, utf8_decode('Este documento contiene la entrevista de antecedentes realizada el dia "' . $fecha_entre . '". Dicha entrevista fue registrada en el sistema por el(la) colaborador(a) "' . $nombreU . ' ' . $apellidoU . '" con el cargo de "' . $nombreCargo . '". La cual a partir de la información proporcionada por el(la) Sr(a) "' . $nombreT . '", cuyo parentesco con el beneficiario es el de "' . $textParecido . '", se registraron los siguientes antecedentes: '
                . 'Antecedentes del embarazo, Antecedentes del parto, Antecedentes del post parto, Lactancia, Desarrollo SensorioMotriz, Visión, Audición, Desarrollo del Lenguaje, Desarrollo Social, Salud, Antecedentes Familiares, '
                . 'Antecedentes escolares y Actitud de la familia.'));
$pdf->Footer();
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(50, 325);
$pdf->Cell(60, 6, utf8_decode('Fundación Inclusiva Ave Fénix - Derechos Reservados'));

$pdf->AddPage('P', 'Legal');
$pdf->Image('../IMG/iconEntrevista.png', 10, 5, 25, 20);
$pdf->Image('../IMG/iconEntrevista.png', 180, 5, 25, 20);
$pdf->SetFont('Arial', 'BU', 20);
$pdf->SetXY(75, 15);
$pdf->Cell(60, 6, utf8_decode('Antecedentes'));
$pdf->Ln();
$pdf->SetFont('Arial', 'BU', 14);
$pdf->SetXY(10, 33);
$pdf->Cell(60, 6, utf8_decode('Antecedentes del Embarazo:'));
$pdf->Ln();

$embparto = $data->getEmbParto($idEmbParto);
$emControl;
$perControl;
$consumo;
$indiqueC;
$comp;
$indiqueComp;
$semEmb;
$tipoParto;
$motivoCes;
$asistMed;
foreach ($embparto as $value) {
    $emControl = $value['Em_controlado'];
    $perControl = $value['per_control'];
    $consumo = $value['consumo'];
    $indiqueC = $value['indique_c'];
    $comp = $value['complicaciones'];
    $indique_com = $value['indique_com'];
    $semEmb = $value['semanas_em'];
    $tipoParto = $value['tipo_part'];
    $motivoCes = $value['motivo_Ces'];
    $asistMed = $value['asiste_Med'];
}
$textEmbControl;
switch ($emControl) {
    case 1:
        $textEmbControl = 'Si';
        break;
    case 0:
        $textEmbControl = 'No';
        break;
    default:
        break;
}
//modificar despues de aqui
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 43);
$pdf->SetFillColor(200, 230, 201);
$pdf->MultiCell(195, 6, utf8_decode('¿El embarazo fue controlado?'), 0, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->Ln();
$pdf->SetX(10);
$pdf->Cell(100, 6, '       *' . $textEmbControl);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Quien realizo los controles? ¿Cada Cuanto?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('       *' . $perControl));
$pdf->Ln();

$textConsumo;
switch ($consumo) {
    case 1:
        $textConsumo = 'Si';
        break;
    case 0:
        $textConsumo = 'No';
        break;
    default:
        break;
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Consumió Medicamentos, drogas y/o alcohol durante el embarazo?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textConsumo));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Que tipo de Medicamentos, drogas y/o alcohol consumió durante el embarazo?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $indique_com));
$pdf->Ln();

$textComp;
switch ($comp) {
    case 1:
        $textComp = 'Si';
        break;
    case 0:
        $textComp = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Existieron complicaciones durante el embarazo?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textComp));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Que tipo de complicaciones existieron durante el embarazo?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $indique_com));
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 14);
//$pdf->SetXY(10, 220);
$pdf->Cell(60, 6, utf8_decode('Antecedentes del Parto:'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Cuantas semanas de embarazo tuvo?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $semEmb));
$pdf->Ln();

$textT_parto;
switch ($tipoParto) {
    case 1:
        $textT_parto = 'Normal';
        break;
    case 2:
        $textT_parto = 'Inducido';
        break;
    case 3:
        $textT_parto = 'Fórceps';
        break;
    case 4:
        $textT_parto = 'Cesárea (señalar motivo)';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Tipo de Parto'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textT_parto));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Motivo de la Cesárea'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $motivoCes));
$pdf->Ln();

$textAsist;
switch ($asistMed) {
    case 1:
        $textAsist = 'Si';
        break;
    case 0:
        $textAsist = 'No';
        break;
    default:
        break;
}

//$pdf->AddPage('P', 'Legal');
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Tuvo Asistencia médica durante el parto?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textAsist));
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 14);
//$pdf->SetXY(10, 38);
$pdf->Cell(60, 6, utf8_decode('Antecedentes del Post Parto:'));
$pdf->Ln();

$postParto = $data->getPostParto($idPostParto);
$peso;
$talla;
$apgar1;
$apgar5;
$hospN;
$motivoH;
$controlP;
$vacuna;
$obs12;
foreach ($postParto as $value) {
    $peso = $value['peso'];
    $talla = $value['talla'];
    $apgar1 = $value['apgar_1'];
    $apgar5 = $value['apgar_5'];
    $hospN = $value['hospit_nac'];
    $motivoH = $value['motiv_Hos'];
    $controlP = $value['control_per'];
    $vacuna = $value['vacunas'];
    $obs12 = $value['obs_12m'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Peso al nacer en gramos'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $peso));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Talla al nacer en cm'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $talla));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('A.P.G.A.R al minuto'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $apgar1));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('A.P.G.A.R a los 5 minutos'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $apgar5));
$pdf->Ln();

$textHosp;
switch ($hospN) {
    case 1:
        $textHosp = 'Si';
        break;
    case 0:
        $textHosp = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Quedo Hospitalizado al nacer?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textHosp));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Cual es el motivo por el que quedo Hospitalizado al nacer?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $motivoH));
$pdf->Ln();

$textControlP;
switch ($controlP) {
    case 1:
        $textControlP = 'Si';
        break;
    case 0:
        $textControlP = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Se realizaron controles periódicos de salud?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textControlP));
$pdf->Ln();

$textVacuna;
switch ($vacuna) {
    case 1:
        $textVacuna = 'Si';
        break;
    case 0:
        $textVacuna = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Vacunas'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textVacuna));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Observaciones de los primeros 12 meses de vida'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $obs12));
$pdf->Ln();

$pdf->AddPage('P', 'Legal');

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Señale si antes de que cumpliera un año de vida el niño o niña presentó:'), 0, '', true);
$pdf->Ln();

$sintoma12 = $data->getCompPostParto($idPostParto);
$sintomas;
foreach ($sintoma12 as $value) {
    $sintomas = $value['sintomas_12m'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $sintomas));
    $pdf->Ln();
}

$pdf->SetFont('Arial', 'BU', 14);
$pdf->SetXY(10, 66);
$pdf->Cell(60, 6, utf8_decode('Lactancia:'));
$pdf->Ln();

$lactancia = $data->getLactancia($idLactancia);
$Materna;
$Mixta;
$relleno;
foreach ($lactancia as $value) {
    $Materna = $value['l_materna'];
    $Mixta = $value['l_mixto'];
    $relleno = $value['l_relleno'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Indique el periodo de Lactancia con leche materna exclusiva'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $Materna));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Indique el periodo de Lactancia Mixta: Leche materna y Relleno'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $Mixta));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Indique el periodo de Lactancia con Relleno o Formula de Leche'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $relleno));
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 14);
//$pdf->SetXY(10, 163);
$pdf->Cell(60, 6, utf8_decode('Desarrollo Sensoriomotriz:'));
$pdf->Ln();

$desMotriz = $data->getDesMotriz($idDesMotriz);
$cCabeza;
$sSolo;
$cGatear;
$cApoyo;
$sApoyo;
$e1Palabras;
$e1Frases;
$vSolo;
$cEsVDiurno;
$cEsVNocturno;
$cEsADiurno;
$cEsANocturno;
$uPanal;
$uPanalEntre;
$aBano;
$indiqueABano;
$aMotoraG;
$tMuscularG;
$esCaminar;
$cFrecuen;
$dominancia;
$obsDesMotriz;

foreach ($desMotriz as $value) {
    $cCabeza = $value['C_cabeza'];
    $sSolo = $value['S_solo'];
    $cGatear = $value['C_gatear'];
    $cApoyo = $value['C_apoyo'];
    $sApoyo = $value['S_apoyo'];
    $e1Palabras = $value['E_1palabras'];
    $e1Frases = $value['E_1frases'];
    $vSolo = $value['V_solo'];
    $cEsVDiurno = $value['c_EsVDiurno'];
    $cEsVNocturno = $value['c_EsVNocturno'];
    $cEsADiurno = $value['c_EsADiurno'];
    $cEsANocturno = $value['c_EsANocturno'];
    $uPanal = $value['U_panal'];
    $uPanalEntre = $value['U_PanalEntr'];
    $aBano = $value['A_bano'];
    $indiqueABano = $value['indique_ABano'];
    $aMotoraG = $value['A_motoraG'];
    $tMuscularG = $value['T_muscG'];
    $esCaminar = $value['Es_Caminar'];
    $C_frecuen = $value['C_frecuen'];
    $dominancia = $value['D_lateral'];
    $obsDesMotriz = $value['obs_DesMotriz'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Edad en que el niño(a) controla la cabeza'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $cCabeza . ' año(s)'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Edad en que el niño(a) se sienta solo/a'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $sSolo . ' año(s)'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Edad en que el niño(a) comienza a Gatear'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $cGatear . ' año(s)'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Edad en que el niño(a) camina con apoyo'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $cApoyo . ' año(s)'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Edad en que el niño(a) camina sin apoyo'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $sApoyo . ' año(s)'));
$pdf->Ln();

//$pdf->AddPage('P', 'Legal');

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Edad en que el niño(a) emite sus primeras palabras:'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $e1Palabras . ' año(s)'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Edad en que el niño(a) emite sus primeras frases'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $e1Frases . ' año(s)'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Edad en que el niño(a) se viste solo/a'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $vSolo . ' año(s)'));
$pdf->Ln();

$textEsfinterVesical;
switch ($cEsVDiurno) {
    case 1:
        $textEsfinterVesical = 'Si';
        break;
    case 0:
        $textEsfinterVesical = 'No';
        break;
    default:
        break;
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Controla Esfínter Vesical Diurno'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textEsfinterVesical));
$pdf->Ln();

$textEsfinterVesica2;
switch ($cEsVNocturno) {
    case 1:
        $textEsfinterVesica2 = 'Si';
        break;
    case 0:
        $textEsfinterVesica2 = 'No';
        break;
    default:
        break;
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Controla Esfínter Vesical Nocturno'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textEsfinterVesica2));
$pdf->Ln();
$textEsfinterAnal1;
switch ($cEsADiurno) {
    case 1:
        $textEsfinterAnal1 = 'Si';
        break;
    case 0:
        $textEsfinterAnal1 = 'No';
        break;
    default:
        break;
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Controla Esfínter Anal Diurno'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textEsfinterAnal1));
$pdf->Ln();
$textEsfinterAnal2;
switch ($cEsANocturno) {
    case 1:
        $textEsfinterAnal2 = 'Si';
        break;
    case 0:
        $textEsfinterAnal2 = 'No';
        break;
    default:
        break;
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Controla Esfínter Anal Nocturno'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textEsfinterAnal2));
$pdf->Ln();

$textUPanal;
switch ($uPanal) {
    case 1:
        $textUPanal = 'Si';
        break;
    case 0:
        $textUPanal = 'No';
        break;
    default:
        break;
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Utiliza pañales?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textUPanal));
$pdf->Ln();
$textUPanalE;
switch ($uPanalEntre) {
    case 1:
        $textUPanalE = 'Si';
        break;
    case 0:
        $textUPanalE = 'No';
        break;
    default:
        break;
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Utiliza pañal de entrenamiento?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textUPanalE));
$pdf->Ln();
$textAbano;
switch ($aBano) {
    case 1:
        $textAbano = 'Si';
        break;
    case 0:
        $textAbano = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Necesita de asistencia para ir al baño?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textAbano));
$pdf->Ln();

//$pdf->AddPage('P', 'Legal');

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Que tipo de asistencia para ir al baño necesita?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $indiqueABano));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('En su actividad motora general se aprecia'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $aMotoraG));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Su tono muscular  general se aprecia'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $tMuscularG));
$pdf->Ln();

$textECaminar;
switch ($esCaminar) {
    case 1:
        $textECaminar = 'Si';
        break;
    case 0:
        $textECaminar = 'No';
        break;
    default:
        break;
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Es estable al caminar'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textECaminar));
$pdf->Ln();

$textCFrecuen;
switch ($C_frecuen) {
    case 1:
        $textCFrecuen = 'Si';
        break;
    case 0:
        $textCFrecuen = 'No';
        break;
    default:
        break;
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Se cae con frecuencia'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textCFrecuen));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Dominancia lateral'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $dominancia));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('En relación con su motricidad Fina el niño(a) logra'), 0, '', true);
$pdf->Ln();
$motriFina = $data->getDesMotrizFina($idDesMotriz);
$motrisF;
foreach ($motriFina as $value) {
    $motrisF = $value['Logro'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $motrisF));
    $pdf->Ln();
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('En relación con algunos signos cognitivos el niño(a)'), 0, '', true);
$pdf->Ln();
$motriCog = $data->getDesMotrizCog($idDesMotriz);
$motrisC;
foreach ($motriCog as $value) {
    $motrisC = $value['signos'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $motrisC));
    $pdf->Ln();
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Observaciones'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $obsDesMotriz));
$pdf->Ln();

//$pdf->AddPage('P', 'Legal');

$pdf->SetFont('Arial', 'BU', 14);
//$pdf->SetXY(10, 20);
$pdf->Cell(60, 6, utf8_decode('Visión:'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Visión'), 0, '', true);
$pdf->Ln();
$Vis = $data->getCompVision($idVision);
$vis;
foreach ($Vis as $value) {
    $vis = $value['descripcion'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $vis));
    $pdf->Ln();
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('El estudiante presenta alguno de los siguientes diagnósticos'), 0, '', true);
$pdf->Ln();
$diagVis = $data->getCompDiagVision($idVision);
$diagV;
foreach ($diagVis as $value) {
    $diagV = $value['diagnostico'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $diagV));
    $pdf->Ln();
}

$Vis1 = $data->getVision($idVision);
$uLentes;
$obsV;
foreach ($Vis1 as $value) {
    $uLentes = $value['u_lentes'];
    $obsV = $value['obs_Vision'];
}

$textLentes;
switch ($uLentes) {
    case 1:
        $textLentes = 'Si';
        break;
    case 0:
        $textLentes = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿El estudiantes utiliza Lentes ópticos?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textLentes));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Observaciones'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $obsV));
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 14);
//$pdf->SetXY(10, 195);
$pdf->Cell(60, 6, utf8_decode('Audición:'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Audición'), 0, '', true);
$pdf->Ln();

$audi = $data->getCompAudicion($idAudicion);
$aud;
foreach ($audi as $value) {
    $aud = $value['descripcion'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $aud));
    $pdf->Ln();
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('El estudiante presenta alguno de estos diagnósticos'), 0, '', true);
$pdf->Ln();

$diagA = $data->getCompDiagAudicion($idAudicion);
$aud1;
foreach ($diagA as $value) {
    $aud1 = $value['diagnostico'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $aud1));
    $pdf->Ln();
}

$audiCion1 = $data->getAudicion($idAudicion);
$uAudi;
$obsAudi;
foreach ($audiCion1 as $value) {
    $uAudi = $value['U_audifonos'];
    $obsAudi = $value['obs_Audicion'];
}

$textAudifono;
switch ($uAudi) {
    case 1:
        $textAudifono = 'Si';
        break;
    case 0:
        $textAudifono = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿El estudiantes utiliza Audífono?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textAudifono));
$pdf->Ln();

//$pdf->AddPage('P', 'Legal');

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Observaciones'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $obsAudi));
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 14);
//$pdf->SetXY(10, 33);
$pdf->Cell(60, 6, utf8_decode('Desarrollo del Lenguaje:'));
$pdf->Ln();

$desLeng = $data->getDesLeng($idDesLengua);
$com;
$indiqueCom;
$p_leng;
$indiqueP_leng;
$obsDesLeng;

foreach ($desLeng as $value) {
    $com = $value['comunicacion'];
    $indiqueCom = $value['indique'];
    $p_leng = $value['perdida_leng'];
    $indiqueP_leng = $value['indique_Pl'];
    $obsDesLeng = $value['obs_DesLengua'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('El niño (a) se comunica preferentemente en forma'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $com));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Características del lenguaje expresivo'), 0, '', true);
$pdf->Ln();
$lengExp = $data->getCompDesLengExp($idDesLengua);
$lExp;
foreach ($lengExp as $value) {
    $lExp = $value['caract'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $lExp));
    $pdf->Ln();
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Características del lenguaje comprensivo'), 0, '', true);
$pdf->Ln();

$lengComp = $data->getCompDesLengComp($idDesLengua);
$lComp;
foreach ($lengComp as $value) {
    $lComp = $value['caract'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $lComp));
    $pdf->Ln();
}

$textPLeng;
switch ($p_leng) {
    case 1:
        $textPLeng = 'Si';
        break;
    case 0:
        $textPLeng = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Manifestó perdida de lenguaje oral'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textPLeng));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Especifique edad y motivo de la pérdida de lenguaje oral'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $indiqueP_leng));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Observaciones'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $obsDesLeng));
$pdf->Ln();

//$pdf->AddPage('P', 'Legal');

$pdf->SetFont('Arial', 'BU', 14);
//$pdf->SetXY(10, 20);
$pdf->Cell(60, 6, utf8_decode('Desarrollo Social:'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Desarrollo Social'), 0, '', true);
$pdf->Ln();

$compDSocial = $data->getCompDesSocial($idDesSocial);
$compD;
foreach ($compDSocial as $value) {
    $compD = $value['desarrollo'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $compD));
    $pdf->Ln();
}

$desSocial = $data->getDesSocial($idDesSocial);
$react1;
$react2;
$react3;
$obsDesSocial;
foreach ($desSocial as $value) {
    $react1 = $value['react_luz'];
    $react2 = $value['react_sonido'];
    $react3 = $value['react_persona'];
    $obsDesSocial = $value['obs_DesSocial'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Cuando se prende una luz, reacciona de forma...'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $react1));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Cuando escucha un sonido, reacciona de forma...'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $react2));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Cuando una personas extrañas se le acerca, reacciona de forma...'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $react3));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Observaciones'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $obsDesSocial));
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 14);
//$pdf->SetXY(10, 190);
$pdf->Cell(60, 6, utf8_decode('Salud:'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Estado actual de salud del/la estudiante'), 0, '', true);
$pdf->Ln();
$saludA = $data->getCompSaludActual($idSalud);
$sActual;
foreach ($saludA as $value) {
    $sActual = $value['estado'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $sActual));
    $pdf->Ln();
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('En la noche presenta'), 0, '', true);
$pdf->Ln();

$saludN = $data->getCompSaludNocturno($idSalud);
$sNocturno;
foreach ($saludN as $value) {
    $sNocturno = $value['estado'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $sNocturno));
    $pdf->Ln();
}

//$pdf->AddPage('P', 'Legal');

$salud = $data->getSalud($idSalud);
$tratamient;
$indiqueTrata;
$medic;
$indiqueMedi;
$aliment;
$indiqueAlimen;
$tallaA;
$pesoA;
$imc;
$comeSolo;
$gustaC;
$noGustaC;
$sueno;
$hDormir;
$duerme;
$espDuerme;
$humor;
$indiqueHumor;
$obsSalud;
foreach ($salud as $value) {
    $tratamient = $value['tratamiento'];
    $indiqueTrata = $value['Ind_tratam'];
    $medic = $value['medicamento'];
    $indiqueMedi = $value['ind_medic'];
    $aliment = $value['alimentacion'];
    $indiqueAlimen = $value['indique_ali'];
    $tallaA = $value['talla_act'];
    $pesoA = $value['peso_act'];
    $imc = $value['peso_IMC'];
    $comeSolo = $value['c_solo'];
    $gustaC = $value['gusta_comer'];
    $noGustaC = $value['nogusta_comer'];
    $sueno = $value['sueno'];
    $hDormir = $value['hora_dormir'];
    $duerme = $value['duerme'];
    $espDuerme = $value['espDuerme'];
    $humor = $value['humor'];
    $indiqueHumor = $value['indique_h'];
    $obsSalud = $value['obs_Salud'];
}

$texttratam;
switch ($tratamient) {
    case 1:
        $texttratam = 'Si';
        break;
    case 0:
        $texttratam = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('El o los problemas de salud reciben tratamiento'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $texttratam));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Que tipo de tratamiento reciben sus problemas de salud?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $indiqueTrata));
$pdf->Ln();

$textMedi;
switch ($medic) {
    case 1:
        $textMedi = 'Si';
        break;
    case 0:
        $textMedi = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Toma algun medicamento?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textMedi));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Que medicamentos toma y en que dosis? Especificar'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $indiqueMedi));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('En cuanto al alimentación'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $aliment));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Inidque otro'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $indiqueAlimen));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Peso Actual'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $pesoA));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Estatura Actual en cm'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $tallaA));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('En cuanto al peso'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $imc));
$pdf->Ln();

$textComeS;
switch ($comeSolo) {
    case 1:
        $textComeS = 'Si';
        break;
    case 0:
        $textComeS = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Come solo?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textComeS));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Que alimentos le gusta comer?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $gustaC));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('¿Que alimentos no le gusta comer?'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $noGustaC));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('En cuanto al sueño'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $sueno));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Hora a la que se duerme'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $hDormir));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Duerme'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $duerme));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Especifique la respuesta anterior'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $espDuerme));
$pdf->Ln();

$textHumor;
switch ($humor) {
    case 1:
        $textHumor = 'Alegre';
        break;
    case 2:
        $textHumor = 'Jugueton/bromista';
        break;
    case 3:
        $textHumor = 'Risueño(a)';
        break;
    case 4:
        $textHumor = 'Triste';
        break;
    case 5:
        $textHumor = 'Serio';
        break;
    case 6:
        $textHumor = 'Rebelde';
        break;
    case 7:
        $textHumor = 'Apático';
        break;
    case 8:
        $textHumor = 'Violento(a)';
        break;
    case 9:
        $textHumor = 'Ninguna';
        break;
    case 10:
        $textHumor = 'Otro';
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Humor/comportamiento'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textHumor));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Indique Humor/comportamiento'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $indiqueHumor));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Observaciones'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $obsSalud));
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 14);
//$pdf->SetXY(10, 190);
$pdf->Cell(60, 6, utf8_decode('Antecedentes Familiares:'));
$pdf->Ln();

$antFam = $data->getAntFam($idAntFam);
$pViven;
$antSalud;
$obsAntFam;
foreach ($antFam as $value) {
    $pViven = $value['pers_viven'];
    $antSalud = $value['ant_salud'];
    $obsAntFam = $value['obs_AntFam'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Personas que viven con eel niño oniña y/o que son responsables de su cuidado (Escribir
nombre, parentezco, edad, escolaridad y ocupacion. Ejemplo: Juan Perez, Papa, 45, 4 medio y
obrero)
'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $pViven));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Antecedentes de salud de la familia'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $antSalud));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Observaciones'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $obsAntFam));
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 14);
//$pdf->SetXY(10, 190);
$pdf->Cell(60, 6, utf8_decode('Antecedentes escolares:'));
$pdf->Ln();

$antE = $data->getAntEscolar($idAntEscolar);
$ingE;
$aJardin;
$ant;
$mEnsen;
$motivoC;
$repCurso;
$motivoRep;
$situacion;
foreach ($antE as $value) {
    $ingE = $value['ingEsc'];
    $aJardin = $value['aJardin'];
    $ant = $value['antecedentes'];
    $mEnsen = $value['mod_Ensenanza'];
    $motivoC = $value['motivo_c'];
    $repCurso = $value['rep_curso'];
    $motivoRep = $value['c_motivorep'];
    $situacion = $value['situacion'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Edad de ingreso al sistema escolar'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $ingE . ' años'));
$pdf->Ln();

$textJardin;
switch ($aJardin) {
    case 1:
        $textJardin = 'Si';
        break;
    case 0:
        $textJardin = 'No';
        break;
    default:
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Asistió a jardín infantil'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textJardin));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Nombre de todos los colegios en los que ha estado'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $ant));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Modalidad de enseñanza'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $mEnsen));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Motivo de cambio del ultimo colegio'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $motivoC));
$pdf->Ln();

$textRepetir;
switch ($repCurso) {
    case 1:
        $textRepetir = 'Si';
        break;
    case 0:
        $textRepetir = 'No';
        break;
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Ha repetido curso'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $textRepetir));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Curso y motivo por el que repitio'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $motivoRep));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Situación actual'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $situacion));
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 14);
//$pdf->SetXY(10, 190);
$pdf->Cell(60, 6, utf8_decode('Actitud de la Familia:'));
$pdf->Ln();

$actFam = $data->getActFam($idActFam);
$desem;
$motivoIns;
$malCole;
$otroMal;
$bienCole;
$otroBien;
$ambiente;
foreach ($actFam as $value) {
    $desem = $value['desem'];
    $motivoIns = $value['motivo_ins'];
    $malCole = $value['do_malcolegio'];
    $otroMal = $value['otro_vamal'];
    $bienCole = $value['do_biencolegio'];
    $otroBien = $value['otro_biencolegio'];
    $ambiente = $value['ambiente'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Como evalúa usted el Desempeño Escolar de su hijo'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $desem));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Si es insatisfactorio, por que motivo'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $motivoIns));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Que hace cuando a su hijo/a le va mal en el colegio'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $malCole));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Indique otro'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $otroMal));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Que hace cuando a su hijo/a le va bien en el colegio'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $bienCole));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Indique otro'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $otroBien));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Su hijo cuenta con un ambiente físico y emocional adecuado para su aprendizaje.'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(10);
$pdf->MultiCell(195, 6, utf8_decode('      *' . $ambiente));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Quien apoya el proceso de aprendizaje y desarrollo de su hijo'), 0, '', true);
$pdf->Ln();

$apoyo = $data->getCompActFam($idActFam);
$ap;
foreach ($apoyo as $value) {
    $ap = $value['apoyo'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('      *' . $ap));
    $pdf->Ln();
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(10);
$pdf->Ln();
$pdf->MultiCell(195, 6, utf8_decode('Fin de la entrevista de antecedentes'), 0, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
    $pdf->SetX(10);
    $pdf->MultiCell(195, 6, utf8_decode('                                 Fundación Inclusiva Ave Fénix - Derechos Reservados'));
    $pdf->Ln();

$pdf->Output('Entrevista' . '_' . $rutBene . 'pdf', 'I');
