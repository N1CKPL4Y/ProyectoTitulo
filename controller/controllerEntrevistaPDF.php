<?php
session_start();
include_once './traduccionfecha.php';
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

//antecedentes parto//
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

$lactancia = $data->getLactancia($idLactancia);
$Materna;
$Mixta;
$relleno;
foreach ($lactancia as $value) {
    $Materna = $value['l_materna'];
    $Mixta = $value['l_mixto'];
    $relleno = $value['l_relleno'];
}

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
?>
<html>
    <head>
        <title>Entrevista Antecedentes - PDF</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,  shrink-to-fit=no">
        <script src="../Materialize/js/funciones.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>
        <link rel="stylesheet" href="../Materialize/datepick.css">
        <link rel="stylesheet" href="../Materialize/css/sweetalert2.min.css">
        <script src="../Materialize/datepicke.js"></script>
        <script src="../js/sweetalert2.all.min.js"></script>
        <script src="../js/html2pdf.bundle.min.js"></script>
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <div class="container" style="padding-top: 15px; border-radius: 10px;">
            <div class="row justify-content-between">
                <div class="card col-lg-4 Cuerpo" style="padding: 10px; border-color: #C8E6C9 !important; align-items: start; justify-content: start">
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-12">
                            <span>Desea descargar este documento como PDF?</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-12">
                            <button class="btn submit" id="btn_pdf">Descargar</button>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 Cuerpo" style="padding: 10px; border-color: #C8E6C9 !important; align-items: end; justify-content: end">
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-12">
                            <span>Si termino de ver el pdf, cierre esta pestaña con el siguente boton</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-12">
                            <button class="btn btn-secondary" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="cuerpo">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <img src="../IMG/iconEntrevista.png" alt="iconoEntrevista" height="80" width="110" style="padding-left: 10px;"/>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6" style="display: flex; align-items: last; justify-content: right">
                    <img src="../IMG/iconEntrevista.png" alt="iconoEntrevista" height="80" width="110" style="padding-right: 15px;"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-12 col-lg-12" style="display: flex; align-items: center; justify-content: center;">
                    <h2 class="tituloPDF">Entrevista de Antecedentes<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6" style="padding-left: 30px; padding-top: 80px; display: flex; align-items: start; justify-content: start;">
                    <h5 style="font-weight: bolder;">Información del Beneficiario:<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">R.U.T:</span>
                    <span style="font-size: 15px"><?php echo $rutBene . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Nombre Completo:</span>
                    <span style="font-size: 15px"><?php echo $nombreB . ' ' . $apellidoB . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Fecha Nacimiento:</span>
                    <span style="font-size: 15px"><?php echo $fechaNBene . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Dirección:</span>
                    <span style="font-size: 15px"><?php echo $direccionB . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Comuna:</span>
                    <span style="font-size: 15px"><?php echo $comunaB . '.' ?></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;">
                    <h5 style="font-weight: bolder;">Información del Tutor:<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">R.U.T:</span>
                    <span style="font-size: 15px"><?php echo $rutTutor . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Nombre Completo:</span>
                    <span style="font-size: 15px"><?php echo $nombreT . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Fecha Nacimiento:</span>
                    <span style="font-size: 15px"><?php echo $fechaNTutor . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Dirección:</span>
                    <span style="font-size: 15px"><?php echo $direccionT . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Comuna:</span>
                    <span style="font-size: 15px"><?php echo $comunaT . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Teléfono:</span>
                    <span style="font-size: 15px"><?php echo $telefonoT . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Correo Electrónico:</span>
                    <span style="font-size: 15px"><?php echo $emailT . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Parentesco:</span>
                    <span style="font-size: 15px"><?php echo $textParecido . '.' ?></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-10 col-md-10 col-lg-12" style="padding-left: 30px; padding-right: 30px; height: auto">
                    <p align="justify">Este documento contiene la entrevista de antecedentes realizada el dia "<?php echo $fecha_entre ?>".
                        Dicha entrevista fue registrada en el sistema por el(la) colaborador(a) "<?php echo $nombreU . ' ' . $apellidoU ?>" con el cargo de "<?php echo utf8_encode($nombreCargo) ?>". La cual a partir de la información proporcionada por el(la)
                        Sr(a) "<?php echo $nombreT ?>", cuyo parentesco con el beneficiario es el de "<?php echo $textParecido ?>", se
                        registraron los siguientes antecedentes: Antecedentes del embarazo, Antecedentes del parto,
                        Antecedentes del post parto, Lactancia, Desarrollo SensorioMotriz, Visión, Audición, Desarrollo del
                        Lenguaje, Desarrollo &#10;&#13; Social, Salud, Antecedentes Familiares, Antecedentes escolares y Actitud de la
                        familia.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 310px">
                    <span style="font-size: 14px; font-weight: bolder; display: flex; align-items: center; justify-content: center;">Fundación Inclusiva Ave Fénix - Derechos Reservados</span>
                </div>
            </div>
            <div class="row" style="padding-top: 30px">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <img src="../IMG/iconEntrevista.png" alt="iconoEntrevista" height="80" width="110" style="padding-left: 10px;"/>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6" style="display: flex; align-items: last; justify-content: right">
                    <img src="../IMG/iconEntrevista.png" alt="iconoEntrevista" height="80" width="110" style="padding-right: 15px;"/>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="display: flex; align-items: center; justify-content: center;">
                    <h4 style="font-weight: bolder;">Registro de Antecedentes<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                </div>
            </div>
            <!-- Antecedentes del embarazo -->
            <div class="row" style="padding-top: 40px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Antecedentes del Embarazo<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿El embarazo fue controlado?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textEmbControl . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Quien realizo los controles? ¿Cada Cuanto?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $perControl . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Consumió Medicamentos, drogas y/o alcohol durante el embarazo?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textConsumo . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Que tipo de Medicamentos, drogas y/o alcohol consumió durante el embarazo?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $indique_com . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Existieron complicaciones durante el embarazo?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textComp . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Que tipo de complicaciones existieron durante el embarazo?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $indique_com . '.' ?></span>
                </div>
            </div>
            <!-- Antecedentes del parto -->
            <div class="row" style="padding-top: 40px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Antecedentes del Parto<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Cuantas semanas de embarazo tuvo?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $semEmb . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Tipo de Parto</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textT_parto . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Motivo de la Cesárea</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $motivoCes . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Tuvo Asistencia médica durante el parto?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textAsist . '.' ?></span>
                </div>
            </div>
            <!-- Antecedentes del post parto -->
            <div class="row" style="padding-top: 40px" id="postParto">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Antecedentes del Post Parto<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Peso al nacer en gramos</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $peso . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Talla al nacer en cm</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $talla . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">A.P.G.A.R al minuto</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $apgar1 . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">A.P.G.A.R a los 5 minutos</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $apgar5 . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Quedo Hospitalizado al nacer?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textHosp . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Cual es el motivo por el que quedo Hospitalizado al nacer?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $motivoH . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Se realizaron controles periódicos de salud?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textControlP . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Vacunas</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textVacuna . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Observaciones de los primeros 12 meses de vida</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $obs12 . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Señale si antes de que cumpliera un año de vida el niño o niña presentó:</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <?php
                    $sintoma12 = $data->getCompPostParto($idPostParto);
                    $sintomas;
                    foreach ($sintoma12 as $value) {
                        $sintomas = $value['sintomas_12m'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $sintomas ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- Lactancia -->
            <div class="row" style="padding-top: 40px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Lactancia<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Indique el periodo de Lactancia con leche materna exclusiva</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $Materna . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Indique el periodo de Lactancia Mixta: Leche materna y Relleno</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $Mixta . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Indique el periodo de Lactancia con Relleno o Formula de Leche</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $relleno . '.' ?></span>
                </div>
            </div>
            <!-- Desarrollo Sensoriomotriz -->
            <div class="row" style="padding-top: 40px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Desarrollo Sensoriomotriz<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Edad en que el niño(a) controla la cabeza</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $cCabeza . ' año(s).' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Edad en que el niño(a) se sienta solo/a</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $sSolo . ' año(s).' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Edad en que el niño(a) comienza a Gatear</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $cGatear . ' año(s).' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Edad en que el niño(a) camina con apoyo</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $cApoyo . ' año(s).' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Edad en que el niño(a) camina sin apoyo</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $sApoyo . ' año(s).' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Edad en que el niño(a) emite sus primeras palabras</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $e1Palabras . ' año(s).' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Edad en que el niño(a) emite sus primeras frases</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $e1Frases . ' año(s).' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Edad en que el niño(a) se viste solo/a</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $vSolo . ' año(s).' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Controla Esfínter Vesical Diurno</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textEsfinterVesical . '.' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Controla Esfínter Vesical Nocturno</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textEsfinterVesica2 . '.' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Controla Esfínter Anal Diurno</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textEsfinterAnal1 . '.' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Controla Esfínter Anal Nocturno</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textEsfinterAnal2 . '.' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Utiliza pañales?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textUPanal . '.' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Utiliza pañal de entrenamiento?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textUPanalE . '.' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Necesita de asistencia para ir al baño?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textAbano . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Que tipo de asistencia para ir al baño necesita?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $indiqueABano . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">En su actividad motora general se aprecia</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $aMotoraG . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Su tono muscular  general se aprecia</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $tMuscularG . '.' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Es estable al caminar</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textECaminar . '.' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Se cae con frecuencia</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textCFrecuen . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Dominancia lateral</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $dominancia . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">En relación con su motricidad Fina el niño(a) logra</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <?php
                    $motriFina = $data->getDesMotrizFina($idDesMotriz);
                    $motrisF;
                    foreach ($motriFina as $value) {
                        $motrisF = $value['Logro'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $motrisF . '.' ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">En relación con algunos signos cognitivos el niño(a)</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <?php
                    $motriCog = $data->getDesMotrizCog($idDesMotriz);
                    $motrisC;
                    foreach ($motriCog as $value) {
                        $motrisC = $value['signos'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $motrisC . '.' ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Observaciones</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $obsDesMotriz . '.' ?></span>
                </div>
            </div>
            <!-- Vision -->
            <div class="row" style="padding-top: 40px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Visión<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Visión</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <?php
                    $Vis = $data->getCompVision($idVision);
                    $vis;
                    foreach ($Vis as $value) {
                        $vis = $value['descripcion'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $vis . '.' ?></span>
                        <?php
                    }
                    ?> 
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">El estudiante presenta alguno de los siguientes diagnósticos</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <?php
                    $diagVis = $data->getCompDiagVision($idVision);
                    $diagV;
                    foreach ($diagVis as $value) {
                        $diagV = $value['diagnostico'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $diagV . '.' ?></span>
                        <?php
                    }
                    ?> 
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿El estudiantes utiliza Lentes ópticos?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textLentes . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Observaciones</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $obsV . '.' ?></span>
                </div>
            </div>
            <!-- Audicion -->
            <div class="row" style="padding-top: 40px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Audición<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Audición</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <?php
                    $audi = $data->getCompAudicion($idAudicion);
                    $aud;
                    foreach ($audi as $value) {
                        $aud = $value['descripcion'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $aud . '.' ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿El estudiantes utiliza Audífono?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textAudifono . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Observaciones</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $obsAudi . '.' ?></span>
                </div>
            </div>
            <!-- Desarrollo Lenguaje -->
            <div class="row" style="padding-top: 40px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Desarrollo del Lenguaje<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 20px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">El niño (a) se comunica preferentemente en forma</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $com . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Características del lenguaje expresivo</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <?php
                    $lengExp = $data->getCompDesLengExp($idDesLengua);
                    $lExp;
                    foreach ($lengExp as $value) {
                        $lExp = $value['caract'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $lExp . '.' ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Características del lenguaje comprensivo</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <?php
                    $lengComp = $data->getCompDesLengComp($idDesLengua);
                    $lComp;
                    foreach ($lengComp as $value) {
                        $lComp = $value['caract'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $lComp . '.' ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Manifestó perdida de lenguaje oral</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textPLeng . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Especifique edad y motivo de la pérdida de lenguaje oral</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $indiqueP_leng . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Observaciones</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $obsDesLeng . '.' ?></span>
                </div>
            </div>
            <!-- Desarrollo Social -->
            <div class="row" style="padding-top: 40px" id="postParto">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Desarrollo Social<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Desarrollo Social</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <?php
                    $compDSocial = $data->getCompDesSocial($idDesSocial);
                    $compD;
                    foreach ($compDSocial as $value) {
                        $compD = $value['desarrollo'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $compD . '.' ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Cuando se prende una luz, reacciona de forma...</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $react1 . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Cuando escucha un sonido, reacciona de forma...</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $react2 . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Cuando una personas extrañas se le acerca, reacciona de forma...</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $react3 . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px;">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Observaciones</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px; height: auto;">
                    <p align="justify"><?php echo $obsDesSocial . '.' ?></p>
                </div>
            </div>
            <!-- Salud -->
            <div class="row" style="padding-top: 40px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Salud<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <div class="row" style="padding-top: 10px;">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Estado actual de salud del/la estudiante</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px; height: auto;">
                    <?php
                    $saludA = $data->getCompSaludActual($idSalud);
                    $sActual;
                    foreach ($saludA as $value) {
                        $sActual = $value['estado'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $sActual . '.' ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row" style="padding-top: 10px;">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">En la noche presenta</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px; height: auto;">
                    <?php
                    $saludN = $data->getCompSaludNocturno($idSalud);
                    $sNocturno;
                    foreach ($saludN as $value) {
                        $sNocturno = $value['estado'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $sNocturno . '.' ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">El o los problemas de salud reciben tratamiento</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $texttratam . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Que tipo de tratamiento reciben sus problemas de salud?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $indiqueTrata . '.' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Toma algun medicamento?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textMedi . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Que medicamentos toma y en que dosis? Especificar</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $indiqueMedi . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">En cuanto al alimentación</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $aliment . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Inidque otro</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $indiqueAlimen . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Peso Actual</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $pesoA . ' Kg.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Estatura Actual en cm</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $tallaA . ' Cm.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">En cuanto al peso</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $imc . '.' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Come solo?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textComeS . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Que alimentos le gusta comer?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $gustaC . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">¿Que alimentos no le gusta comer?</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $noGustaC . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">En cuanto al sueño</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $sueno . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Hora a la que se duerme</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $hDormir . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Duerme</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $duerme . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Especifique la respuesta anterior</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $espDuerme . '.' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Humor/comportamiento</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textHumor . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Indique otro Humor/comportamiento</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $indiqueHumor . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Observaciones</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $obsSalud . '.' ?></span>
                </div>
            </div>
            <!-- Antcedentes familiares -->
            <div class="row" style="padding-top: 40px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Antcedentes familiares<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <?php
            $antFam = $data->getAntFam($idAntFam);
            $pViven;
            $antSalud;
            $obsAntFam;
            foreach ($antFam as $value) {
                $pViven = $value['pers_viven'];
                $antSalud = $value['ant_salud'];
                $obsAntFam = $value['obs_AntFam'];
            }
            ?>
            <div class="row" style="padding-top: 20px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Personas que viven con eel niño oniña y/o que son responsables de su cuidado (Escribir
                        nombre, parentezco, edad, escolaridad y ocupacion. Ejemplo: Juan Perez, Papa, 45, 4 medio y
                        obrero)</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $pViven . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Antecedentes de salud de la familia</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $antSalud . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Observaciones</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $obsAntFam . '.' ?></span>
                </div>
            </div>
            <!-- Antcedentes escolares -->
            <div class="row" style="padding-top: 40px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Antcedentes Escolares<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Edad de ingreso al sistema escolar</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $ingE . ' año(s).' ?></span>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Asistió a jardín infantil</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textJardin . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Nombre de todos los colegios en los que ha estado</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $ant . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Modalidad de enseñanza</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $mEnsen . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Motivo de cambio del ultimo colegio</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $motivoC . '.' ?></span>
                </div>
            </div>
            <?php
            $textRepetir;
            switch ($repCurso) {
                case 1:
                    $textRepetir = 'Si';
                    break;
                case 0:
                    $textRepetir = 'No';
                    break;
            }
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Ha repetido curso</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $textRepetir . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Curso y motivo por el que repitio</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $motivoRep . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Situación actual</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $situacion . '.' ?></span>
                </div>
            </div>
            <!-- Actitud de la familia -->
            <div class="row" style="padding-top: 40px">
                <div class="col-sm-6 col-md-12 col-lg-12" style="padding-left: 30px; display: flex; align-items: start; justify-content: start;"> 
                    <h4 style="font-size: 20px; font-weight: bolder;">Actitud de la familia<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h4>
                    <hr noshade style="border-top: 5px solid black; margin-top: -5px;"/>
                </div>
            </div>
            <?php
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
            ?>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Como evalúa usted el Desempeño Escolar de su hijo</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $desem . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Si es insatisfactorio, por que motivo</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $motivoIns . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Que hace cuando a su hijo/a le va mal en el colegio</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $malCole . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Indique otro</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $otroMal . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Que hace cuando a su hijo/a le va bien en el colegio</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $bienCole . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Indique otro</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $otroBien . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Su hijo cuenta con un ambiente físico y emocional adecuado para su aprendizaje</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 16px"><?php echo $ambiente . '.' ?></span>
                </div>
            </div>
            <div class="row" style="padding-top: 10px">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span class="titleEn" style="font-size: 16px; font-weight: bolder">Quien apoya el proceso de aprendizaje y desarrollo de su hijo</span>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <?php
                    $apoyo = $data->getCompActFam($idActFam);
                    $ap;
                    foreach ($apoyo as $value) {
                        $ap = $value['apoyo'];
                        ?>
                        <span style="font-size: 16px"><?php echo '//' . $ap . '.' ?></span>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-sm-12 col-md-12 col-lg-12 titleEn" style="padding-left: 60px;">
                    <span style="font-size: 16px; font-weight: bolder">Fin de la Entrevista de Antecedentes</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 30px">
                    <span style="font-size: 14px; font-weight: bolder; display: flex; align-items: center; justify-content: center;">Fundación Inclusiva Ave Fénix - Derechos Reservados</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 30px; padding-left: 250px">
                    <img src="../IMG/Timbre.png" width="190" height="190" alt="alt" style="opacity: 0.2"/>
                </div>
            </div>
        </div>
    </body>
    <script>
        $("#cerrar").click(function () {
            window.close();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Escuchamos el click del botón
            const $boton = document.querySelector("#btn_pdf");
            $boton.addEventListener("click", () => {
                const $elementoParaConvertir = document.querySelector('#cuerpo'); // <-- Aquí puedes elegir cualquier elemento del DOM
                html2pdf()
                        .set({
                            margin: [.5, .5, .5, .5],
                            filename: 'Entrevista - <?php echo $rutBene ?>.pdf',
                            image: {
                                type: 'jpeg',
                                quality: 0.98
                            },
                            html2canvas: {
                                scale: 2, // A mayor escala, mejores gráficos, pero más peso
                                letterRendering: true,
                            },
                            pagebreak: {mode: 'avoid-all', before: '#postParto'},
                            jsPDF: {
                                unit: "in",
                                format: "legal",
                                orientation: 'portrait' // landscape o portrait
                            }
                        })
                        .from($elementoParaConvertir)
                        .save()
                        .catch(err => console.log(err));
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Excelente',
                    text:'Se ha generado y se esta descargando el documento con el nombre "Entrevista - <?php echo $rutBene ?>.pdf"',
                    showConfirmButton: true,
                })
            });
        });
    </script>
</html>
