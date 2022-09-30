<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

error_reporting(E_NOTICE ^ E_ALL);

include_once '../DB/Model_Data.php';

session_start();
$rut_user = $_SESSION['rut'];
$rut_bene = $_SESSION['rut_bene'];

echo $rut_user . "<br>" . $rut_bene . "<br>";

////antecedentes del embrarazo y parto
$embControl = isset($_POST['embarazo1']) ? $_POST['embarazo1'] : null;

if ($embControl == 1) {
    $controltxt = isset($_POST['txt_embarazo']) ? $_POST['txt_embarazo'] : null;
} else {
    $controltxt = "No aplica";
}

$consumo = isset($_POST['embarazo2']) ? $_POST['embarazo2'] : null;

if ($consumo == 1) {
    $consumotxt = isset($_POST['txt_medicamentos']) ? $_POST['txt_medicamentos'] : null;
} else {
    $consumotxt = "No aplica";
}

$complicaciones = isset($_POST['complicaciones']) ? $_POST['complicaciones'] : null;

if ($complicaciones == 1) {
    $compliTxt = isset($_POST['txt_complicaciones']) ? $_POST['txt_complicaciones'] : null;
} else {
    $compliTxt = "No aplica";
}

$semanas = isset($_POST['txt_semanas']) ? $_POST['txt_semanas'] : null;

$tipoEmb = isset($_POST['tipo']) ? $_POST['tipo'] : null;

if ($tipoEmb == 4) {
    $motivoCes = isset($_POST['txt_motivo']) ? $_POST['txt_motivo'] : null;
} else {
    $motivoCes = "No aplica";
}

$asistencia = isset($_POST['asistencia']) ? $_POST['asistencia'] : null;

///Prueba de echo
echo '<br>////////////////////////////////////////////////Prueba embarazo y parto //////////////////////////////////////////////////<br>';
echo $embControl . "<br>" . $controltxt . "<br>" . $consumo . "<br>" . $consumotxt . "<br>" . $complicaciones . "<br>" . $compliTxt . "<br>" . $semanas . "<br>" . $tipoEmb . "<br>" . $motivoCes . "<br>" . $asistencia . "<br>";

///////antecedentes postparto

$pesoNac = isset($_POST['txt_peso']) ? $_POST['txt_peso'] : null;
$tallaNac = isset($_POST['txt_talla']) ? $_POST['txt_talla'] : null;
$apgar1 = isset($_POST['txt_apgar1']) ? $_POST['txt_apgar1'] : null;
$apgar5 = isset($_POST['txt_apgar5']) ? $_POST['txt_apgar5'] : null;

$hospitNac = isset($_POST['hospitalizado']) ? $_POST['hospitalizado'] : null;

if ($hospitNac == 1) {
    $motivoHos = isset($_POST['txt_hospitalizado']) ? $_POST['txt_hospitalizado'] : null;
} else {
    $motivoHos = "No aplica";
}

$sintomasNac = isset($_POST['sintomasNacer']) ? $_POST['sintomasNacer'] : null;

$arraySint = [];
$otroSintoma;
if (!empty($sintomasNac)) {
    foreach ($sintomasNac as $value) {
        array_push($arraySint, $value);

        if ($value == "Otro") {
            $otroSintoma = isset($_POST['otroSintoNac']) ? $_POST['otroSintoNac'] : null;
        }
    }
}

$controlesP = isset($_POST['controles']) ? $_POST['controles'] : null;
$vacunas = isset($_POST['vacunas']) ? $_POST['vacunas'] : null;
$obsPostParto = isset($_POST['txt_meses']) ? $_POST['txt_meses'] : null;

////////////Pruebas post parto
echo '<br>/////////////////////////////////////////////Pruebas post parto ///////////////////////////////////////////////<br>';

echo $pesoNac . "<br>" . $tallaNac . "<br>" . $apgar1 . "<br>" . $apgar5 . "<br>" . $hospitNac . "<br>" . $motivoHos . "<br>";
foreach ($arraySint as $x) {
    echo "<br>" . $x . "<br>";
}
echo $otroSintoma . "<br>" . $controlesP . "<br>" . $vacunas . "<br>" . $obsPostParto;

////////////Lactancia
echo '<br>///////////////////////////////////////////////////////Prubas lactancia////////////////////////////////////////////////////////////////<br>';
$l_materna = isset($_POST['txt_lactancia']) ? $_POST['txt_lactancia'] : null;
$mixto = isset($_POST['txt_mixto']) ? $_POST['txt_mixto'] : null;
$relleno = isset($_POST['txt_relleno']) ? $_POST['txt_relleno'] : null;

///////////Prueba echo lactancia

echo "<br>" . $l_materna . "<br>" . $mixto . "<br>" . $relleno . "<br>";

////////////Desarrollo  sensoriomotriz

$c_Cabeza = isset($_POST['txt_Ccabeza']) ? $_POST['txt_Ccabeza'] : null;
$s_Solo = isset($_POST['txt_Ssolo']) ? $_POST['txt_Ssolo'] : null;
$gateo = isset($_POST['txt_gatear']) ? $_POST['txt_gatear'] : null;
$c_Apoyo = isset($_POST['txt_Capoyo']) ? $_POST['txt_Capoyo'] : null;
$s_apoyo = isset($_POST['txt_Sapoyo']) ? $_POST['txt_Sapoyo'] : null;
$p_Palabras = isset($_POST['txt_Ppalabras']) ? $_POST['txt_Ppalabras'] : null;
$p_Frases = isset($_POST['txt_Pfrases']) ? $_POST['txt_Pfrases'] : null;
$v_Solo = isset($_POST['txt_Vsolo']) ? $_POST['txt_Vsolo'] : null;
$esf_DV = isset($_POST['EsfinterDV']) ? $_POST['EsfinterDV'] : null;
$esf_NV = isset($_POST['EsfinterNV']) ? $_POST['EsfinterNV'] : null;
$esf_AD = isset($_POST['EsfinterAD']) ? $_POST['EsfinterAD'] : null;
$esf_AN = isset($_POST['EsfinterNA']) ? $_POST['EsfinterNA'] : null;
$panales = isset($_POST['Panales']) ? $_POST['Panales'] : null;
$panalE = isset($_POST['PanalE']) ? $_POST['PanalE'] : null;

$asistBano = isset($_POST['asistenciaB']) ? $_POST['asistenciaB'] : null;

if ($asistBano == 1) {
    $tipAsis = isset($_POST['txt_Tasistencia']) ? $_POST['txt_Tasistencia'] : null;
} else {
    $tipAsis = "No aplica";
}

$motoraG = isset($_POST['Amotora']) ? $_POST['Amotora'] : null;
$tonoMg = isset($_POST['Tmuscular']) ? $_POST['Tmuscular'] : null;
$e_caminar = isset($_POST['Ecaminar']) ? $_POST['Ecaminar'] : null;
$c_frecuencia = isset($_POST['Cfrecuencia ']) ? $_POST['Cfrecuencia'] : null;
$dominancia = isset($_POST['dominancia']) ? $_POST['dominancia'] : null;

$motricidad = isset($_POST['checkMFina']) ? $_POST['checkMFina'] : null;
$arrayMotri = [];

if (!empty($motricidad)) {
    foreach ($motricidad as $valueM) {
        array_push($arrayMotri, $valueM);
    }
}

$cognitivo = isset($_POST['check_Scog']) ? $_POST['check_Scog'] : null;
$arrayCog = [];

if (!empty($cognitivo)) {
    foreach ($cognitivo as $valueC) {
        array_push($arrayCog, $valueC);
    }
}

$obsDesSens = isset($_POST['txt_ObsDesSens']) ? $_POST['txt_ObsDesSens'] : null;

//////////////////////Pruebas sensoriomotriz
echo '<br>////////////////////////////////////////////////Desarrollo sensoriomotriz////////////////////////////////////////////////////////////////////<br>';

echo '<br>' . $c_Cabeza . '<br>' . $s_Solo . '<br>' . $gateo . '<br>' . $c_Apoyo . '<br>' . $s_apoyo . '<br>' . $p_Palabras . '<br>' . $p_Frases . '<br>' . $v_Solo . '<br>' . $esf_DV . '<br>' . $esf_NV . '<br>' . $esf_AD . '<br>' . $esf_AN . '<br>';
echo '<br>' . $panales . '<br>' . $panalE . '<br>' . $asistBano . '<br>' . $tipAsis . '<br>' . $motoraG . '<br>' . $tonoMg . '<br>' . $e_caminar . '<br>' . $c_frecuencia . '<br>' . $dominancia . '<br>' . $obsDesSens . '<br>';
foreach ($arrayMotri as $motri) {
    echo '<br>' . $motri . '<br>';
}
echo '*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-';
foreach ($arrayCog as $cog) {
    echo '<br>' . $cog . '<br>';
}

///////////////////Vision
$vision = isset($_POST['check_vis']) ? $_POST['check_vis'] : null;
$arrayVision = [];
if (!empty($vision)) {
    foreach ($vision as $vis) {
        array_push($arrayVision, $vis);
    }
}

$diagVision = isset($_POST['check_DiagVis']) ? $_POST['check_DiagVis'] : null;
$arrayDiagVis = [];
$otroDiagVis;
if (!empty($diagVision)) {
    foreach ($diagVision as $value) {
        array_push($arrayDiagVis, $value);
        if ($value == "Otro") {
            $otroDiagVis = isset($_POST['txt_OtroDiagVis']) ? $_POST['txt_OtroDiagVis'] : null;
        }
    }
}

$lentes = isset($_POST['lentes']) ? $_POST['lentes'] : null;
$obsVision = isset($_POST['txt_ObsVis']) ? $_POST['txt_ObsVis'] : null;

////////////////////////Prueba vision
echo '<br>////////////////////////////////////////////Vision/////////////////////////////////<br>';
foreach ($arrayVision as $value) {
    echo '<br>' . $value . '<br>';
}
echo '*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*';
foreach ($arrayDiagVis as $value) {
    echo '<br>' . $value . '<br>';
}
echo $otroDiagVis . "<br>" . $lentes . " " . $obsVision . "<br>";

/////////////////////////////Audicion

$audicion = isset($_POST['check_audi']) ? $_POST['check_audi'] : null;
$arrayAudicion = [];
if (!empty($audicion)) {
    foreach ($audicion as $value) {
        array_push($arrayAudicion, $value);
    }
}

$diagAudicion = isset($_POST['check_DiagAudi']) ? $_POST['check_DiagAudi'] : null;
$arrayDiagAudi = [];
$otroDiagAudi;
if (!empty($diagAudicion)) {
    foreach ($arrayDiagAudi as $value) {
        array_push($arrayDiagAudi, $value);
        if ($value == "Otro") {
            $otroDiagAudi = isset($_POST['otro_DiagAudi']) ? $_POST['otro_DiagAudi'] : null;
        }
    }
}

$audifonos = isset($_POST['audicion']) ? $_POST['audicion'] : null;
$obsAudicion = isset($_POST['obs_Audicion']) ? $_POST['obs_Audicion'] : null;
///////////////prueba audicion
echo '<br>////////////////////////////////////////////Audicion/////////////////////////////////<br>';
foreach ($arrayAudicion as $value) {
    echo '<br>' . $value;
}
echo '*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*';
foreach ($arrayDiagAudi as $value) {
    echo '<br>' . $value;
}
echo '<br>' . $otroDiagAudi . ' ' . $audifonos . ' ' . $obsAudicion . '<br>';

//////////////////////////Lenguaje
$comunicacion = isset($_POST['comunicacion']) ? $_POST['comunicacion'] : null;
if ($comunicacion == 4) {
    $otroComuni = isset($_POST['txt_otroCom']) ? $_POST['txt_otroCom'] : null;
} else {
    $otroComuni = "No aplica";
}

$lengExpresivo = isset($_POST['check_LengEx']) ? $_POST['check_LencEx'] : null;
$arrayExpres = [];
$otroExpres;
if (!empty($lengExpresivo)) {
    foreach ($lengExpresivo as $value) {
        array_push($arrayExpres, $value);
        if ($value == "Otro") {
            $otroExpres = isset($_POST['otro_LengEx']) ? $_POST['otro_LengEx'] : null;
        }
    }
}

$lengComprensivo = isset($_POST['check_LengCom']) ? $_POST['check_LengCom'] : null;
$arrayCompren = [];
$otroCompren;
if (!empty($lengComprensivo)) {
    foreach ($lengComprensivo as $value) {
        array_push($arrayCompren, $value);
        if ($value == "Otro") {
            $otroCompren = isset($_POST['otro_LengCom']) ? $_POST['otro_LengCom'] : null;
        }
    }
}
$perdida_L= isset($_POST['Plenguaje']) ? $_POST['Plenguaje'] : null;