<?php

session_start();
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

function fechaEsp($fecha) {
    $fecha = substr($fecha, 0, 10);
    $numeroDia = date('d', strtotime($fecha));
    $dia = date('l', strtotime($fecha));
    $mes = date('F', strtotime($fecha));
    $anio = date('Y', strtotime($fecha));
    $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $nombredia = str_replace($dias_EN, $dias_ES, $dia);
    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
    return $numeroDia . " de " . $nombreMes . " del " . $anio;
}

$fechaNBene = fechaEsp($fechaNacB);

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

$fechaNTutor = fechaEsp($fechaNacT);

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

$fecha_entre = fechaEsp($fechaE);

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
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(50, 325);
$pdf->Cell(60, 6, utf8_decode('Fundación Inclusiva Ave Fénix - Derechos Reservados'));

$pdf->AddPage('P', 'Legal');
$pdf->SetFont('Arial', 'BU', 20);
$pdf->SetXY(75, 20);
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
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 43);
$pdf->SetFillColor(200, 230, 201);
$pdf->MultiCell(95, 6, utf8_decode('¿El embarazo fue controlado?'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 43);
$pdf->Cell(100, 6, ' ' . $textEmbControl, border: 1);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 51);
$pdf->MultiCell(95, 6, utf8_decode('¿Quien realizo los controles? ¿Cada Cuanto?'), 1, '', true);
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(105);
$pdf->MultiCell(100, 6, ' ' . $perControl, border: 1);
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
$pdf->SetXY(10, 59);
$pdf->MultiCell(95, 6, utf8_decode('¿Consumió Medicamentos, drogas y/o alcohol durante el embarazo?'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 59);
$pdf->Cell(100, 12, ' ' . $textConsumo, border: 1);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 72);
$pdf->MultiCell(95, 6, utf8_decode('¿Que tipo de Medicamentos, drogas y/o alcohol consumió durante el embarazo?'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 72);
$pdf->Cell(100, 12, ' ' . $indiqueC, border: 1);
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
$pdf->SetXY(10, 85);
$pdf->MultiCell(95, 6, utf8_decode('¿Existieron complicaciones durante el embarazo?'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 85);
$pdf->Cell(100, 12, ' ' . $textComp, border: 1);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 98);
$pdf->MultiCell(95, 6, utf8_decode('¿Que tipo de complicaciones existieron durante el embarazo?'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 98);
$pdf->Cell(100, 12, ' ' . $indique_com, border: 1);
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 14);
$pdf->SetXY(10, 115);
$pdf->Cell(60, 6, utf8_decode('Antecedentes del Parto:'));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 125);
$pdf->MultiCell(95, 6, utf8_decode('¿Cuantas semanas de embarazo tuvo?'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 125);
$pdf->Cell(100, 6, ' ' . $semEmb, border: 1);
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
$pdf->SetXY(10, 132);
$pdf->MultiCell(95, 6, utf8_decode('Tipo de Parto'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 132);
$pdf->Cell(100, 6, ' ' . $textT_parto, border: 1);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 139);
$pdf->MultiCell(95, 6, utf8_decode('Motivo Cesárea'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 139);
$pdf->Cell(100, 6, ' ' . $motivoCes, border: 1);
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
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 146);
$pdf->MultiCell(95, 6, utf8_decode('¿Tuvo Asistencia médica durante el parto?'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 146);
$pdf->Cell(100, 6, ' ' . $textAsist, border: 1);
$pdf->Ln();

$pdf->SetFont('Arial', 'BU', 14);
$pdf->SetXY(10, 158);
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
$pdf->SetXY(10, 169);
$pdf->MultiCell(95, 6, utf8_decode('Peso al nacer en gramos'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 169);
$pdf->Cell(100, 6, ' ' . $peso, border: 1);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 176);
$pdf->MultiCell(95, 6, utf8_decode('Talla al nacer en cm'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 176);
$pdf->Cell(100, 6, ' ' . $talla, border: 1);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 183);
$pdf->MultiCell(95, 6, utf8_decode('A.P.G.A.R al minuto'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 183);
$pdf->Cell(100, 6, ' ' . $apgar1, border: 1);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 190);
$pdf->MultiCell(95, 6, utf8_decode('A.P.G.A.R a los 5 minutos'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 190);
$pdf->Cell(100, 6, ' ' . $apgar5, border: 1);
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
$pdf->SetXY(10, 197);
$pdf->MultiCell(95, 6, utf8_decode('¿Quedo Hospitalizado al nacer?'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 197);
$pdf->Cell(100, 6, ' ' . $textHosp, border: 1);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 204);
$pdf->MultiCell(95, 6, utf8_decode('¿Cual es el motivo por el que quedo Hospitalizado al nacer?'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 204);
$pdf->MultiCell(100, 12, ' ' . $motivoH, border: 1);
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
$pdf->SetXY(10, 217);
$pdf->MultiCell(95, 6, utf8_decode('¿Se realizaron controles periódicos de salud?'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 217);
$pdf->Cell(100, 6, ' ' . $textControlP, border: 1);
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
$pdf->SetXY(10, 224);
$pdf->MultiCell(95, 6, utf8_decode('¿Vacunas?'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 224);
$pdf->Cell(100, 6, ' ' . $textVacuna, border: 1);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 231);
$pdf->MultiCell(95, 6, utf8_decode('Observaciones de los primeros 12 meses de vida'), 1, '', true);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(105, 231);
$pdf->MultiCell(100, 12, ' ' . $obs12, border: 1);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY(10, 244);
$pdf->MultiCell(95, 6, utf8_decode('Señale si antes de que cumpliera un año de vida el niño o niña presentó:'), 1, '', true);
$p_parto = $data->getCompPostParto($idPostParto);
$sintoma12;
foreach ($p_parto as $value) {
    $sintoma12 = $value['sintomas_12m'];
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(95, 8, ' ' . $sintoma12, border: 1);
    $pdf->Ln();
}


$pdf->SetFont('Arial', 'BU', 14);
$pdf->SetXY(10, 290);
$pdf->Cell(60, 6, utf8_decode('Lactancia:'));
$pdf->Ln();

$pdf->Output('Entrevista' . '_' . $rutBene . 'pdf', 'I');
