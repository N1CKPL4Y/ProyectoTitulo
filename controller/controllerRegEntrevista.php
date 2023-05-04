<?php
session_start();
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Registrando Entrevista</title>
        <link rel="stylesheet" href="../Bootstrap/css/styleBody.css"/>
        <script src="../js/sweetalert2.all.min.js"></script>
        <link href="../Bootstrap/css/sweetalert2.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function GenerarEntre() {
                let timerInterval
                Swal.fire({
                    title: 'Atención!',
                    html: 'Registrando Entrevista de Antecedentes.',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Entrevista Registrada con exito',
                        confirmButtonText: 'Aceptar',
                    }).then(resultado => {
                        window.location.href = '../Secretaria/EntrevistaFamilia.php';
                    })
                });
            }

            function existeE() {
                Swal.fire({
                    icon: 'error',
                    title: 'Este beneficiario ya tiene una entrevista registrada',
                    confirmButtonText: 'Aceptar',
                }).then(resultado => {
                    window.location.href = '../Secretaria/EntrevistaFamilia.php';
                })
            }

            function BeneVacio() {
                Swal.fire({
                    icon: 'error',
                    title: 'Ingrese el RUT del beneficiario por favor',
                    confirmButtonText: 'Aceptar',
                }).then(resultado => {
                    window.location.href = '../Secretaria/EntrevistaFamilia.php';
                })
            }

        </script>
    </body>
</html>
<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

error_reporting(E_NOTICE ^ E_ALL);

include_once '../DB/Model_Data.php';

$data = new Data();

$conect = $data->getConnection();

$rut_user = $_SESSION['rut'];
$rut_bene = isset($_POST['rrx_rutBenef']) ? $_POST['rrx_rutBenef'] : null;

//echo $rut_user . "<br>" . $rut_bene . "<br>";
////antecedentes del embrarazo y parto
$embControl = isset($_POST['embarazo1']) ? $_POST['embarazo1'] : null;

if ($embControl == 'Si') {
    $embControl = 1;
    $controltxt = isset($_POST['txt_embarazo']) ? $_POST['txt_embarazo'] : null;
} else {
    $controltxt = "No aplica";
    $embControl = 0;
}

$consumo = isset($_POST['embarazo2']) ? $_POST['embarazo2'] : null;

if ($consumo == 'Si') {
    $consumo = 1;
    $consumotxt = isset($_POST['txt_medicamentos']) ? $_POST['txt_medicamentos'] : null;
} else {
    $consumotxt = "No aplica";
    $consumo = 0;
}

$complicaciones = isset($_POST['complicaciones']) ? $_POST['complicaciones'] : null;

if ($complicaciones == 'Si') {
    $complicaciones = 1;
    $compliTxt = isset($_POST['txt_complicaciones']) ? $_POST['txt_complicaciones'] : null;
} else {
    $compliTxt = "No aplica";
    $complicaciones = 0;
}

$semanas = isset($_POST['txt_semanas']) ? $_POST['txt_semanas'] : null;

$tipoEmb = isset($_POST['tipo']) ? $_POST['tipo'] : null;

if ($tipoEmb == 'Cesarea (Indique)') {
    $tipoEmb = 4;
    $motivoCes = isset($_POST['txt_motivo']) ? $_POST['txt_motivo'] : null;
} else if ($tipoEmb == 'Inducido') {
    $tipoEmb = 2;
    $motivoCes = "No aplica";
} else if ($tipoEmb == 'Fórceps') {
    $tipoEmb = 3;
    $motivoCes = "No aplica";
} else if ($tipoEmb == 'Normal') {
    $tipoEmb = 1;
    $motivoCes = "No aplica";
}

$asistencia = isset($_POST['asistencia']) ? $_POST['asistencia'] : null;
if ($asistencia == 'Si') {
    $asistencia = 1;
} else {
    $asistencia = 0;
}

///Prueba de echo
//echo '<br>////////////////////////////////////////////////Prueba embarazo y parto //////////////////////////////////////////////////<br>';
//echo $embControl . "<br>" . $controltxt . "<br>" . $consumo . "<br>" . $consumotxt . "<br>" . $complicaciones . "<br>" . $compliTxt . "<br>" . $semanas . "<br>" . $tipoEmb . "<br>" . $motivoCes . "<br>" . $asistencia . "<br>";
///////antecedentes postparto

$pesoNac = isset($_POST['txt_peso']) ? $_POST['txt_peso'] : null;
$tallaNac = isset($_POST['txt_talla']) ? $_POST['txt_talla'] : null;
$apgar1 = isset($_POST['txt_apgar1']) ? $_POST['txt_apgar1'] : null;
$apgar5 = isset($_POST['txt_apgar5']) ? $_POST['txt_apgar5'] : null;

$hospitNac = isset($_POST['hospitalizado']) ? $_POST['hospitalizado'] : null;

if ($hospitNac == 'Si') {
    $hospitNac = 1;
    $motivoHos = isset($_POST['txt_hospitalizado']) ? $_POST['txt_hospitalizado'] : null;
} else {
    $motivoHos = "No aplica";
    $hospitNac = 0;
}

$sintomasNac = isset($_POST['sintomasNacer']) ? $_POST['sintomasNacer'] : null;

$arraySint = [];
$otroSintoma;
if (!empty($sintomasNac)) {
    foreach ($sintomasNac as $value) {
        array_push($arraySint, $value);

        if ($value == "Otro") {
            $otroSintoma = isset($_POST['otroSintoNac']) ? $_POST['otroSintoNac'] : null;
        } else {
            $otroSintoma = "No tiene otro sintoma";
        }
    }
}

$controlesP = isset($_POST['controles']) ? $_POST['controles'] : null;
if ($controlesP == 'Si') {
    $controlesP = 1;
} else {
    $controlesP = 0;
}
$vacunas = isset($_POST['vacunas']) ? $_POST['vacunas'] : null;
if ($vacunas == 'Si') {
    $vacunas = 1;
} else {
    $vacunas = 0;
}
$obsPostParto = isset($_POST['txt_meses']) ? $_POST['txt_meses'] : null;

////////////Pruebas post parto
//echo '<br>/////////////////////////////////////////////Pruebas post parto ///////////////////////////////////////////////<br>';
//echo $pesoNac . "<br>" . $tallaNac . "<br>" . $apgar1 . "<br>" . $apgar5 . "<br>" . $hospitNac . "<br>" . $motivoHos . "<br>";
foreach ($arraySint as $x) {
//echo "<br>" . $x . "<br>";
}
//echo $otroSintoma . "<br>" . $controlesP . "<br>" . $vacunas . "<br>" . $obsPostParto;
////////////Lactancia
//echo '<br>///////////////////////////////////////////////////////Prubas lactancia////////////////////////////////////////////////////////////////<br>';
$l_materna = isset($_POST['txt_lactancia']) ? $_POST['txt_lactancia'] : null;
$mixto = isset($_POST['txt_mixto']) ? $_POST['txt_mixto'] : null;
$relleno = isset($_POST['txt_relleno']) ? $_POST['txt_relleno'] : null;

///////////Prueba echo lactancia
//echo "<br>" . $l_materna . "<br>" . $mixto . "<br>" . $relleno . "<br>";
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
if ($esf_DV == 'Si') {
    $esf_DV = 1;
} else {
    $esf_DV = 0;
}
$esf_NV = isset($_POST['EsfinterNV']) ? $_POST['EsfinterNV'] : null;
if ($esf_NV == 'Si') {
    $esf_NV = 1;
} else {
    $esf_NV = 0;
}
$esf_AD = isset($_POST['EsfinterAD']) ? $_POST['EsfinterAD'] : null;
if ($esf_AD == 'Si') {
    $esf_AD = 1;
} else {
    $esf_AD = 0;
}
$esf_AN = isset($_POST['EsfinterNA']) ? $_POST['EsfinterNA'] : null;
if ($esf_AN == 'Si') {
    $esf_AN = 1;
} else {
    $esf_AN = 0;
}
$panales = isset($_POST['Panales']) ? $_POST['Panales'] : null;
if ($panales == 'Si') {
    $panales = 1;
} else {
    $panales = 0;
}
$panalE = isset($_POST['PanalE']) ? $_POST['PanalE'] : null;
if ($panalE == 'Si') {
    $panalE = 1;
} else {
    $panalE = 0;
}
$asistBano = isset($_POST['asistenciaB']) ? $_POST['asistenciaB'] : null;
if ($asistBano == 'Si') {
    $asistBano = 1;
    $tipAsis = isset($_POST['txt_Tasistencia']) ? $_POST['txt_Tasistencia'] : null;
} else {
    $tipAsis = "No aplica";
    $asistBano = 0;
}

$motoraG = isset($_POST['Amotora']) ? $_POST['Amotora'] : null;
$tonoMg = isset($_POST['Tmuscular']) ? $_POST['Tmuscular'] : null;
$e_caminar = isset($_POST['Ecaminar']) ? $_POST['Ecaminar'] : null;
if ($e_caminar == 'Si') {
    $e_caminar = 1;
} else {
    $e_caminar = 0;
}
$c_frecuencia = isset($_POST['Cfrecuencia ']) ? $_POST['Cfrecuencia'] : null;
if ($c_frecuencia == 'Si') {
    $c_frecuencia = 1;
} else {
    $c_frecuencia = 0;
}
$dominancia = isset($_POST['dominancia']) ? $_POST['dominancia'] : null;
$obsDesSens = isset($_POST['txt_ObsDesSens']) ? $_POST['txt_ObsDesSens'] : null;

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

//////////////////////Pruebas sensoriomotriz
//echo '<br>////////////////////////////////////////////////Desarrollo sensoriomotriz////////////////////////////////////////////////////////////////////<br>';
//echo '<br>' . $c_Cabeza . '<br>' . $s_Solo . '<br>' . $gateo . '<br>' . $c_Apoyo . '<br>' . $s_apoyo . '<br>' . $p_Palabras . '<br>' . $p_Frases . '<br>' . $v_Solo . '<br>' . $esf_DV . '<br>' . $esf_NV . '<br>' . $esf_AD . '<br>' . $esf_AN . '<br>';
//echo '<br>' . $panales . '<br>' . $panalE . '<br>' . $asistBano . '<br>' . $tipAsis . '<br>' . $motoraG . '<br>' . $tonoMg . '<br>' . $e_caminar . '<br>' . $c_frecuencia . '<br>' . $dominancia . '<br>' . $obsDesSens . '<br>';
foreach ($arrayMotri as $motri) {
//echo '<br>' . $motri . '<br>';
}
//echo '*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-';
foreach ($arrayCog as $cog) {
//echo '<br>' . $cog . '<br>';
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
        } else {
            $otroDiagVis = "No tiene otro diagnostico";
        }
    }
}

$lentes = isset($_POST['lentes']) ? $_POST['lentes'] : null;
if ($lentes == 'Si') {
    $lentes = 1;
} else {
    $lentes = 0;
}
$obsVision = isset($_POST['txt_ObsVis']) ? $_POST['txt_ObsVis'] : null;

////////////////////////Prueba vision
//echo '<br>////////////////////////////////////////////Vision/////////////////////////////////<br>';
foreach ($arrayVision as $value) {
//echo '<br>' . $value . '<br>';
}
//echo '*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*';
foreach ($arrayDiagVis as $value) {
//echo '<br>' . $value . '<br>';
}
//echo $otroDiagVis . "<br>" . $lentes . " " . $obsVision . "<br>";
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
    foreach ($diagAudicion as $value) {
        array_push($arrayDiagAudi, $value);
        if ($value == "Otro") {
            $otroDiagAudi = isset($_POST['otro_DiagAudi']) ? $_POST['otro_DiagAudi'] : null;
        } else {
            $otroDiagAudi = "No tiene otro diagnostico";
        }
    }
}

$audifonos = isset($_POST['audicion']) ? $_POST['audicion'] : null;
if ($audifonos == 'Si') {
    $audifonos = 1;
} else {
    $audifonos = 0;
}
$obsAudicion = isset($_POST['obs_Audicion']) ? $_POST['obs_Audicion'] : null;

///////////////prueba audicion
//echo '<br>////////////////////////////////////////////Audicion/////////////////////////////////<br>';
foreach ($arrayAudicion as $value) {
//echo '<br>' . $value;
}
//echo '<br>*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*';
foreach ($arrayDiagAudi as $value) {
//echo '<br>' . $value;
}
//echo '<br>' . $otroDiagAudi . ' ' . $audifonos . ' ' . $obsAudicion . '<br>';
//////////////////////////Lenguaje
$comunicacion = isset($_POST['comunicacion']) ? $_POST['comunicacion'] : null;
if ($comunicacion == 'Otro') {
    $otroComuni = isset($_POST['txt_otroCom']) ? $_POST['txt_otroCom'] : null;
} else {
    $otroComuni = "No aplica";
}

$lengExpresivo = isset($_POST['check_LengEx']) ? $_POST['check_LengEx'] : null;
$arrayExpres = [];
$otroExpres;
if (!empty($lengExpresivo)) {
    foreach ($lengExpresivo as $value) {
        array_push($arrayExpres, $value);
        if ($value == "Otro") {
            $otroExpres = isset($_POST['otro_LengEx']) ? $_POST['otro_LengEx'] : null;
        } else {
            $otroExpres = "No tiene otro lenguaje";
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
        } else {
            $otroCompren = "No tiene otro lenguaje";
        }
    }
}

$perdida_L = isset($_POST['Plenguaje']) ? $_POST['Plenguaje'] : null;
if ($perdida_L == 'Si') {
    $perdida_L = 1;
    $txt_Perdi = isset($_POST['txt_perdidaL']) ? $_POST['txt_perdidaL'] : null;
} else {
    $perdida_L = 0;
    $txt_Perdi = "No aplica";
}

$obsLenguaje = isset($_POST['txt_ObsLeng']) ? $_POST['txt_ObsLeng'] : null;

//////////////////////////prueba lenguaje
//echo '<br>////////////////////////////////////Lenguaje/////////////////////////////////<br>';
//echo '<br>' . $comunicacion . " " . $otroComuni . "<br>";
foreach ($arrayExpres as $value) {
//echo ' ' . $value . ' ';
}
//echo '<br>' . $otroExpres . "<br>";
//echo '*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*<br>';
foreach ($arrayCompren as $value) {
//echo ' ' . $value . ' ';
}
//echo '<br>' . $otroCompren . " " . $perdida_L . ' ' . $txt_Perdi . ' ' . $obsLenguaje . "<br>";
/////////////////////Social
$social = isset($_POST['check_DesSoc']) ? $_POST['check_DesSoc'] : null;
$arraySocial = [];
$otroSocial;
if (!empty($social)) {
    foreach ($social as $value) {
        array_push($arraySocial, $value);
        if ($value == "Otro") {
            $otroSocial = isset($_POST['txt_OtroDesSoc']) ? $_POST['txt_OtroDesSoc'] : null;
        } else {
            $otroSocial = "No tiene otro desarrollo social";
        }
    }
}

$reactLuz = isset($_POST['reaccion']) ? $_POST['reaccion'] : null;
$reactSonido = isset($_POST['reaccion1']) ? $_POST['reaccion1'] : null;
$reactPersona = isset($_POST['reaccion2']) ? $_POST['reaccion2'] : null;
$obsSocial = isset($_POST['txt_ObsDesSoc']) ? $_POST['txt_ObsDesSoc'] : null;

///////////////prueba social
//echo '<br>////////////////////////////////////Social/////////////////////////////////<br>';
foreach ($arraySocial as $value) {
//echo ' ' . $value . ' ';
}
//echo '<br>' . $otroSocial . ' ' . $reactLuz . ' ' . $reactSonido . ' ' . $reactPersona . ' ' . $obsSocial . '<br>';
/////////////////////////////////Salud
$salud = isset($_POST['check_EstSal']) ? $_POST['check_EstSal'] : null;
$arraySalud = [];
$otroSalud;
if (!empty($salud)) {
    foreach ($salud as $value) {
        array_push($arraySalud, $value);
        if ($value == "Otro") {
            $otroSalud = isset($_POST['otro_EstSal']) ? $_POST['otro_EstSal'] : null;
        } else {
            $otroSalud = "No tiene otro estado de salud";
        }
    }
}

$tratamiento = isset($_POST['tratamiento']) ? $_POST['tratamiento'] : null;
if ($tratamiento == 'Si') {
    $tratamiento = 1;
    $txt_Tratam = isset($_POST['txt_Tratamiento']) ? $_POST['txt_Tratamiento'] : null;
} else {
    $tratamiento = 0;
    $txt_Tratam = "No aplica";
}
$medicamento = isset($_POST['medicamento']) ? $_POST['medicamento'] : null;
if ($medicamento == 'Si') {
    $medicamento = 1;
    $txt_Medic = isset($_POST['txt_medicamentos']) ? $_POST['txt_medicamentos'] : null;
} else {
    $medicamento = 0;
    $txt_Medic = "No Aplica";
}
$alimentacion = isset($_POST['alimentacion']) ? $_POST['alimentacion'] : null;
if ($alimentacion == 'Otro') {
    $txt_aliment = isset($_POST['txt_otroA']) ? $_POST['txt_otroA'] : null;
} else {
    $txt_aliment = "No aplica";
}

$estaturaA = isset($_POST['txt_estaturaA']) ? $_POST['txt_estaturaA'] : null;
$pesoA = isset($_POST['txt_pesoA']) ? $_POST['txt_pesoA'] : null;
$pesoCh = isset($_POST['peso']) ? $_POST['peso'] : null;
$c_solo = isset($_POST['comeSolo']) ? $_POST['comeSolo'] : null;
if ($c_solo == 'Si') {
    $c_solo = 1;
} else {
    $c_solo = 0;
}
$g_comer = isset($_POST['txt_gustaComer']) ? $_POST['txt_gustaComer'] : null;
$ng_comer = isset($_POST['txt_nogustaComer']) ? $_POST['txt_nogustaComer'] : null;
$dormir = isset($_POST['dormir']) ? $_POST['dormir'] : null;
$hora_dormir = isset($_POST['txt_HorDormir']) ? $_POST['txt_HorDormir'] : null;
$duerme = isset($_POST['conQuienDuerme']) ? $_POST['conQuienDuerme'] : null;
$espDuerme = isset($_POST['especificar']) ? $_POST['especificar'] : null;
$saludNoche = isset($_POST['check_NocheP']) ? $_POST['check_NocheP'] : null;
$arraySaludN = [];
$otroSalNoc;
if (!empty($saludNoche)) {
    foreach ($saludNoche as $value) {
        array_push($arraySaludN, $value);
//echo $value . "<br>";
        if ($value == "Otro") {
            $otroSalNoc = isset($_POST['otro_NocheP']) ? $_POST['otro_NocheP'] : null;
//echo $otroSalNoc;
        } else {
            $otroSalNoc = "No tiene otro estado de salud";
//echo $otroSalNoc;
        }
    }
}

$humor = isset($_POST['cbo_humor']) ? $_POST['cbo_humor'] : null;
if ($humor == 'Otro:') {
    $humor = 10;
    $txt_humor = isset($_POST['otro_Humor']) ? $_POST['otro_Humor'] : null;
} else if ($humor == 'Alegre') {
    $humor = 1;
    $txt_humor = "No Aplica";
} else if ($humor == 'Jugueton/bromista') {
    $humor = 2;
    $txt_humor = "No Aplica";
} else if ($humor == 'Risueño') {
    $humor = 3;
    $txt_humor = "No Aplica";
} else if ($humor == 'Triste') {
    $humor = 4;
    $txt_humor = "No Aplica";
} else if ($humor == 'Serio') {
    $humor = 5;
    $txt_humor = "No Aplica";
} else if ($humor == 'Rebelde') {
    $humor = 6;
    $txt_humor = "No Aplica";
} else if ($humor == 'Apático') {
    $humor = 7;
    $txt_humor = "No Aplica";
} else if ($humor == 'Violento(a)') {
    $humor = 8;
    $txt_humor = "No Aplica";
} else if ($humor == 'Ninguna') {
    $humor = 9;
    $txt_humor = "No Aplica";
}
$obsSalud = isset($_POST['txt_ObsSalud']) ? $_POST['txt_ObsSalud'] : null;

//echo '<br>////////////////////////////////////////////Salud/////////////////////////////<br>';

foreach ($arraySalud as $value) {
//echo ' ' . $value . ' ';
}
//echo '<br>' . $otroSalud . ' ' . $tratamiento . ' ' . $txt_Tratam . ' ' . $medicamento . ' ' . $txt_Medic . ' ' . $alimentacion . ' ' . $txt_aliment . '<br>';
//echo ' ' . $estaturaA . ' ' . $pesoA . ' ' . $pesoCh . ' ' . $c_solo . ' ' . $g_comer . ' ' . $ng_comer . ' ' . $dormir . ' ' . $hora_dormir;
//echo '<br>' . $duerme . ' ' . $espDuerme . '<br>';
foreach ($arraySaludN as $value) {
//echo ' ' . $value . ' ';
}
//echo '<br>' . $humor . ' ' . $txt_humor . ' ' . $obsSalud . ' ' . $otroSalNoc;
////////////////Antecedentes familiares
$integrantes = isset($_POST['integrantes']) ? $_POST['integrantes'] : null;
$antSalud = isset($_POST['Asalud']) ? $_POST['Asalud'] : null;
$obsAntFam = isset($_POST['txt_ObsAntFam']) ? $_POST['txt_ObsAntFam'] : null;

//echo '<br>///////////////////////////////Ant familiares///////////////////////////////////<br>';
//echo '<br>' . $integrantes . '<br>' . $antSalud . '<br>' . $obsAntFam . '<br>';
////////Antecedentes escolares
$ingresoE = isset($_POST['edadE']) ? $_POST['edadE'] : null;
$jardin = isset($_POST['jardin']) ? $_POST['jardin'] : null;
if ($jardin == 'Si') {
    $jardin = 1;
} else {
    $jardin = 0;
}
$antecedentesE = isset($_POST['colegios']) ? $_POST['colegios'] : null;
$modalidadE = isset($_POST['cbo_ModEns']) ? $_POST['cbo_ModEns'] : null;
$motivoE = isset($_POST['colegios1']) ? $_POST['colegios1'] : null;
$repetir = isset($_POST['repetir']) ? $_POST['repetir'] : null;
if ($repetir == 'Si') {
    $repetir = 1;
    $txt_repetir = isset($_POST['txt_repetir']) ? $_POST['txt_repetir'] : null;
} else {
    $repetir = 0;
    $txt_repetir = 'No aplica';
}
$situacion = isset($_POST['cbo_situacion']) ? $_POST['cbo_situacion'] : null;

//echo '<br>///////////////////////////////Ant estudios///////////////////////////////////<br>';
//echo '<br>' . $ingresoE . ' ' . $jardin . ' ' . $antecedentesE . ' ' . $modalidadE . ' ' . $motivoE . ' ' . $repetir . ' ' . $txt_repetir . ' ' . $situacion . '<br>';
///////////Actitud familia
$desempeno = isset($_POST['descolar']) ? $_POST['descolar'] : null;
if ($desempeno == 'Insatisfactorio') {
    $txtDescolar = isset($_POST['txt_Descolar']) ? $_POST['txt_Descolar'] : null;
} else {
    $txtDescolar = "No aplica";
}
$badCole = isset($_POST['cbo_vaMal']) ? $_POST['cbo_vaMal'] : null;
$txt_otrovMal;
if ($badCole == 'Otro') {
    $txt_otrovMal = isset($_POST['txt_otrovMal']) ? $_POST['txt_otrovMal'] : null;
} else {
    $txt_otrovMal = "No aplica";
}

$goodCole = isset($_POST['cbo_vaBien']) ? $_POST['cbo_vaBien'] : null;
if ($goodCole == 'Otro') {
    $txt_otroBien = isset($_POST['txt_otrovBien']) ? $_POST['txt_otrovBien'] : null;
} else {
    $txt_otroBien = "No aplica";
}
$apoyo = isset($_POST['check_quienApoya']) ? $_POST['check_quienApoya'] : null;
$arrayApoyo = [];
$otroApoyo;
if (!empty($apoyo)) {
    foreach ($apoyo as $value) {
        array_push($arrayApoyo, $value);
        if ($value == "Otro") {
            $otroApoyo = isset($_POST['otro_quienApoya']) ? $_POST['otro_quienApoya'] : null;
        } else {
            $otroApoyo = "No aplica";
        }
    }
}
$ambiente = isset($_POST['ambiente']) ? $_POST['ambiente'] : null;

//echo '<br>///////////////////////////Actitud Familia////////////////////////////<br>';
//echo '<br>' . $desempeno . ' ' . $txtDescolar . ' ' . $badCole . ' ' . $txt_otrovMal . ' ' . $goodCole . ' ' . $txt_otroBien . ' ' . $ambiente . "<br>";
foreach ($arrayApoyo as $value) {
//echo ' ' . $value . ' ';
}

//echo '<br>' . $otroApoyo . '<br>Final';
///////////////////////////////Se evalua si existe la entrevista////////////////////////////////////////////////////

echo $rut_bene;

if (empty($rut_bene)) {
    echo '<script>BeneVacio();</script>';
} else {
    $existeE = $data->getEntrevistaByRut($rut_bene);

    if ($existeE) {
        //echo '<br>nada';
        echo '<script>existeE();</script>';
    } else {
        //echo '<br>pasa';
        echo '<script>GenerarEntre();</script>';
/////////////////////////////////////////////////////////Inserts////////////////////////////////////////////////////////
//embarazoparto//
        $data->addEmbParto($embControl, $controltxt, $consumo, $consumotxt, $complicaciones, $compliTxt, $semanas, $tipoEmb, $motivoCes, $asistencia);
        $lastEmbParto = $data->getLastEmbParto();
        foreach ($lastEmbParto as $value) {
            $lastEmbParto = $value['id'];
        }
//postparto//
        $data->addPostParto($pesoNac, $tallaNac, $apgar1, $apgar5, $hospitNac, $motivoHos, $controlesP, $vacunas, $obsPostParto);
        $lastPParto = $data->getLastPostParto();
        foreach ($lastPParto as $value) {
            $lastPParto = $value['id'];
        }
        foreach ($arraySint as $value1) {
            if ($value1 != 'Otro') {
                $data->addCompPostParto($lastPParto, $value1);
            } else if ($value1 == 'Otro') {
                $data->addCompPostParto($lastPParto, $otroSintoma);
            }
        }

//lactancia//

        $data->addLactancia($l_materna, $mixto, $relleno);
        $lastLactancia = $data->getLastLactancia();
        foreach ($lastLactancia as $value) {
            $lastLactancia = $value['id'];
        }
//desarrollo sensoriomotriz//
        $data->addDesMotriz($c_Cabeza, $s_Solo, $gateo, $c_Apoyo, $s_apoyo, $p_Palabras, $p_Frases, $v_Solo, $esf_DV, $esf_NV, $esf_AD, $esf_AN, $panales, $panalE, $asistBano, $tipAsis, $motoraG, $tonoMg, $e_caminar, $c_frecuencia, $dominancia, $obsDesSens);

        $lastDesMotriz = $data->getLastDesMotriz();
        foreach ($lastDesMotriz as $value) {
            $lastDesMotriz = $value['id'];
        }
        foreach ($arrayMotri as $value) {
            $data->addCompDesMotrizFina($lastDesMotriz, $value);
        }

        foreach ($arrayCog as $value) {
            $data->addCompDesMotrizSCog($lastDesMotriz, $value);
        }

//vision//
        $data->addVision($lentes, $obsVision);
        $lastVision = $data->getLastVision();
        foreach ($lastVision as $value) {
            $lastVision = $value['id'];
        }
        foreach ($arrayVision as $value) {
            $data->addCompVision($lastVision, $value);
        }

        foreach ($arrayDiagVis as $value) {
            if ($value != 'Otro') {
                $data->addCompDiagVision($lastVision, $value);
            } else if ($value == 'Otro') {
                $data->addCompDiagVision($lastVision, $otroDiagVis);
            }
        }

//audicion//
        $data->addAudicion($audifonos, $obsAudicion);
        $lastAudi = $data->getLastAudicion();
        foreach ($lastAudi as $value) {
            $lastAudi = $value['id'];
        }
        foreach ($arrayAudicion as $value) {
            $data->addCompAudicion($lastAudi, $value);
        }

        foreach ($arrayDiagAudi as $value) {
            if ($value != 'Otro') {
                $data->addCompDiagAudicion($lastAudi, $value);
            } else if ($value == 'Otro') {
                $data->addCompDiagAudicion($lastAudi, $otroDiagAudi);
            }
        }

//desarrollo del lenguaje//
        $data->addDesLenguaje($comunicacion, $otroComuni, $perdida_L, $txt_Perdi, $obsLenguaje);
        $lastDesLeng = $data->getLastDesLeng();
        foreach ($lastDesLeng as $value) {
            $lastDesLeng = $value['id'];
        }
        foreach ($arrayExpres as $value) {
            if ($value != 'Otro') {
                $data->addCompDesLengua_expre($lastDesLeng, $value);
            } else if ($value == 'Otro') {
                $data->addCompDesLengua_expre($lastDesLeng, $otroExpres);
            }
        }

        foreach ($arrayCompren as $value) {
            if ($value != 'Otro') {
                $data->addCompDesLengua_compr($lastDesLeng, $value);
            } else if ($value == 'Otro') {
                $data->addCompDesLengua_compr($lastDesLeng, $otroCompren);
            }
        }

//desarrollo social//
        $data->addDesSocial($reactLuz, $reactSonido, $reactPersona, $obsSocial);
        $lastDesSocial = $data->getLastDesSocial();
        foreach ($lastDesSocial as $value) {
            $lastDesSocial = $value['id'];
        }
        foreach ($arraySocial as $value) {
            if ($value != 'Otro') {
                $data->addCompDesSocial($lastDesSocial, $value);
            } else if ($value == 'Otro') {
                $data->addCompDesSocial($lastDesSocial, $otroSocial);
            }
        }

//salud//
        $data->addSalud($tratamiento, $txt_Tratam, $medicamento, $txt_Medic, $alimentacion, $txt_aliment, $estaturaA, $pesoA, $pesoCh, $c_solo, $g_comer, $ng_comer, $dormir, $hora_dormir, $duerme, $espDuerme, $humor, $txt_humor, $obsSalud);
        $lastSalud = $data->getLastSalud();
        foreach ($lastSalud as $value) {
            $lastSalud = $value['id'];
        }
        foreach ($arraySalud as $value) {
            if ($value != 'Otro') {
                $data->addCompSaludActual($lastSalud, $value);
            } else if ($value == 'Otro') {
                $data->addCompSaludActual($lastSalud, $otroSalud);
            }
        }

        foreach ($arraySaludN as $value) {
            if ($value != 'Otro') {
                $data->addCompSaludNocturno($lastSalud, $value);
            } else if ($value == 'Otro') {
                $data->addCompSaludNocturno($lastSalud, $otroSalNoc);
            }
        }

//antecedentes familiares//

        $data->addAntFam($integrantes, $antSalud, $obsAntFam);
        $lastAntFam = $data->getLastAntFam();
        foreach ($lastAntFam as $value) {
            $lastAntFam = $value['id'];
        }
//antecedentes escolares//

        $data->addAntEscolar($ingresoE, $jardin, $antecedentesE, $modalidadE, $motivoE, $repetir, $txt_repetir, $situacion);
        $lastAntEscolar = $data->getLastAntEscolar();
        foreach ($lastAntEscolar as $value) {
            $lastAntEscolar = $value['id'];
        }
//actitud de la familia//
        $data->addActFam($desempeno, $txtDescolar, $badCole, $txt_otrovMal, $goodCole, $txt_otroBien, $ambiente);
        $lastActFam = $data->getLastActFam();
        foreach ($lastActFam as $value) {
            $lastActFam = $value['id'];
        }
        foreach ($arrayApoyo as $value) {
            if ($value != 'Otro') {
                $data->addCompActFam($lastActFam, $value);
            } else if ($value == 'Otro') {
                $data->addCompActFam($lastActFam, $otroApoyo);
            }
        }

//entrevista//
        $data->addEntrevista($rut_bene, $rut_user, $lastEmbParto, $lastPParto, $lastLactancia, $lastDesMotriz, $lastVision, $lastAudi, $lastDesLeng, $lastDesSocial, $lastSalud, $lastAntFam, $lastAntEscolar, $lastActFam);
    }
}
 