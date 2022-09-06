<?php
error_reporting(E_NOTICE ^ E_ALL);

include_once 'Model_Data.php';
session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$passwd = $_SESSION['passwd'];
$correo = $_SESSION['email'];
$area_u = $_SESSION['area_u'];
$cargo = $_SESSION['cargo'];

if ($correo == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
}


switch ($_SESSION['cargo']) {
    case 2:
        $area_u = "Secretari@";
        break;
}


$data = new Data();
?>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title>Registrar Entrevista</title>
        <link rel="icon" href="IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="Materialize/css/styleSideBar.css">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/validarut.js"></script>
        <script src="js/jquery.rut.js"></script>
    </head>
    <body>
        <div class="sidebar open">
            <div class="logo-details">
                <a href="MenuSecretaria.php"><div class="logo_name" style="font-size: 19px">Fundación Inclusiva</div></a>
                <i class='bx bx-menu' id="btn" ></i>        
            </div>
            <ul class="nav-list">
                <li>
                    <a href="MenuSecretaria.php">
                        <i class='bx bx-home' ></i>
                        <span class="links_name">Vover a Inicio</span>
                    </a>
                    <span class="tooltip">Volver a Inicio</span>
                </li>
                <li>
                    <a href="MenuSecretaria.php">
                        <i class='bx bx-user' ></i>
                        <span class="links_name">Registro Beneficiarios</span>
                    </a>
                    <span class="tooltip">Registro Beneficiarios</span>
                </li>
                <li>
                    <a href="controller/controllerLogout.php">
                        <i class="material-icons">power_settings_new</i>
                        <span class="links_name">Cerrar Sesión</span>
                    </a>
                    <span class="tooltip">Cerrar Sesión</span>
                </li>
                <li class="profile">
                    <div class="profile-details">
                      <!--<img src="profile.jpg" alt="profileImg">-->
                        <div class="name_job">
                            <div class="name"><?php echo $nombre ?></div>
                            <div class="name"><?php echo $apellido ?></div>
                            <div class="name"><?php echo $area_u ?></div>
                            <div class="job"><?php echo $correo ?></div>
                        </div>
                        <a><i id="log_out" ></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <section class="home-section" style="background-image: url(IMG/1.jpg); background-attachment: fixed; background-size: cover">
            <nav>
                <div class="nav-wrapper" style="background-color: #00526a">
                    <div class="container center">
                        <a style="font-size: 30px">Ave</a>
                        <img src="IMG/iconNavbar.png"/>
                        <a style="font-size: 30px">Fenix</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s10 offset-s1">
                        <div class="card" style="border-radius: 10px">
                            <h4 class="center" style="padding-top: 10px; padding-left: 10px">Registro de entrevistas</h4>
                            <div class="row">
                                <form method="post" name="datosUser">
                                    <div class="col s6">
                                        <div class="row-centered">
                                            <div class="col s6">
                                                <div class="input-field col s12" style="background-color: #E6E6E6; border-radius: 10px">
                                                    <input id="rut_b" type="text" name="txt_rut" class="validate" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)">
                                                    <label class="active" for="rut_b">R.U.T del beneficiario</label>
                                                </div>
                                                <div class="row-centered">
                                                    <span style="color: grey; font-size: 13px">Si el R.U.T termina con K, reemplacelo con un 0.</span>
                                                </div>
                                            </div>
                                            <div class="col s4">
                                                <div class="input-field col s12">
                                                    <button class="btn waves-effect light-green darken-3" type="submit" name="buscar" required>Buscar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php
                            if (isset($_POST['buscar'])) {

                                $rutBuscado = isset($_POST['txt_rut']) ? $_POST['txt_rut'] : null;

                                $beneficiario = $data->getBenefi($rutBuscado);
                                $tutor = $data->getTutorForBen($rutBuscado);
                                $diagValid = $data->getDiagValid($rutBuscado);
                                $credencial = $data->getCreden($rutBuscado);

                                $rutBd;
                                $nombreBD;
                                $apellidoBD;
                                $fech_nacBD;
                                $direccBD;
                                $credenBD = 0;
                                $diagBD;
                                $profeBD;

                                $rutTut;
                                $nombTut;

                                $teleTut;
                                $corrTut;

                                if (empty($rutBuscado)) {
                                    $rutBd = "";
                                    $nombreBD = "";
                                    $apellidoBD = "";
                                    $fech_nacBD = "";
                                    $direccBD = "";
                                    $credenBD = "";
                                    $diagBD = "";
                                    $profeBD = "";

                                    $rutTut = "";
                                    $nombTut = "";

                                    $teleTut = "";
                                    $corrTut = "";
                                } else {
                                    foreach ($beneficiario as $key) {
                                        $rutBd = $key['RUT'];
                                        $nombreBD = $key['nombre'];
                                        $apellidoBD = $key['apellido'];
                                        $fech_nacBD = $key['fecha_nac'];
                                        $direccBD = $key['direccion'];
                                    }

                                    foreach ($tutor as $key2) {
                                        $rutTut = $key2['RUT'];
                                        $nombTut = $key2['nombre'];
                                        $teleTut = $key2['telefono'];
                                        $corrTut = $key2['email'];
                                    }


                                    if (!$credencial) {
                                        $credenBD = "NO";
                                    } else {
                                        $credenBD = "Si";
                                    }

                                    $diagnostico = $data->getDiagnostico($rutBuscado);

                                    if (!$diagValid) {
                                        $diagBD = "NO posee diagnostico";
                                        $profeBD = "No Aplica";
                                    } else {
                                        foreach ($diagnostico as $key4) {

                                            $condBD = $data->getConditionCode($key4['codigo']);
                                            //echo '' . $data->getConditionCode($key4['codigo']);
                                            foreach ($condBD as $value) {
                                                $diagBD = $value['nombre'];
                                            }
                                            $profeBD = $key4['especialista'];
                                        }
                                    }
                                    echo ''
                                    . '';
                                }
                            } else {
                                $rutBd = "";
                                $nombreBD = "";
                                $apellidoBD = "";
                                $fech_nacBD = "";
                                $direccBD = "";
                                $credenBD = "";
                                $diagBD = "";
                                $profeBD = "";

                                $rutTut = "";
                                $nombTut = "";

                                $teleTut = "";
                                $corrTut = "";
                            }
                            ?>
                            <div class="row">
                                <div class="col s6">
                                    <h5 class="col s10">Datos del beneficiario:</h5>
                                </div>
                            </div>
                            <div class="row-centered">
                                <div class="col s4">
                                    <div class="input-field col s10" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input id="rut_b1" type="text" name="txt_rutB1" value="<?php echo $rutBd; ?>" class="validate" readonly="true">
                                        <label class="active" for="rut_b1">R.U.T del beneficiario</label>
                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="input-field col s10" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input id="nombre1" type="text" name="txt_n1" value="<?php echo $nombreBD ?>" class="validate" readonly="true">
                                        <label class="active" for="nombre1">Nombres del beneficiario</label>
                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="input-field col s10" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input id="apellido1" type="text" name="txt_a1" value="<?php echo $apellidoBD ?>" class="validate" readonly="true">
                                        <label class="active" for="apellido1">Apellidos del beneficiario</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row-centered">
                                <div class="col s4">
                                    <div class="input-field col s10" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input placeholder="-- Fecha Nacimiento: --" name="txt_nac" value="<?php echo $fech_nacBD ?>" type="text" class="datepicker" id="datepicker" required readonly="true">
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field col s10" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input id="direccion1" type="text" name="txt_dire" value="<?php echo $direccBD ?>" class="validate" readonly="true">
                                        <label class="active" for="direccion1">Dirección del beneficiario</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row-centered">
                                <div class="col s6">
                                    <div class="input-field col s10" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input id="cDis" type="text" name="txt_cDis" value="<?php echo $credenBD ?>" class="validate" readonly="true">
                                        <label class="active" for="cDis">¿Cuenta con Credencial de discapacidad?</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field col s10" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input id="diag" type="text" name="txt_diag" value="<?php echo $diagBD ?>" class="validate" readonly="true">
                                        <label class="active" for="diag">Diagnostico del beneficiario</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row-centered">
                                <div class="col s12">
                                    <div class="input-field col s6" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input id="deriva" type="text" name="txt_deriva" value="<?php echo $profeBD ?>" class="validate" readonly="true">
                                        <label class="active" for="deriva">Profesional que lo deriva</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row-centered">
                                <div class="col s12">
                                    <h5 class="col s10">Datos del tutor:</h5>
                                </div>
                            </div>
                            <div class="row-centered">
                                <div class="col s4">
                                    <div class="input-field col s10" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input id="rut_tutor" type="text" name="txt_rutTutor" value="<?php echo $rutTut ?>" class="validate" readonly="true">
                                        <label class="active" for="rut_tutor">R.U.T del tutor</label>
                                    </div>
                                </div>
                                <div class="col s8">
                                    <div class="input-field col s10" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input id="nombreT" type="text" name="txt_nT" value="<?php echo $nombTut ?>" class="validate" readonly="true">
                                        <label class="active" for="nombreT">Nombre del tutor</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row-centered">
                                <div class="col s6">
                                    <div class="input-field col s10" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input id="telefonoT" type="text" name="txt_telefonoT" value="<?php echo $teleTut ?>" class="validate" readonly="true">
                                        <label class="active" for="telefonoT">telefono del tutor</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field col s10" style="background-color: #E6E6E6; border-radius: 10px">
                                        <input id="emailT" type="text" name="txt_emailT" value="<?php echo $corrTut ?>" class="validate" readonly="true">
                                        <label class="active" for="emailT">correo electronico del tutor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <form>
                                <ul class="collapsible">
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Antecedentes del embarazo</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">¿El embarazo fue controlado?</h6>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input id="siE" class="with-gap" value="1" name="embarazo1" type="radio" onclick="controlado()"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input id="noE" class="with-gap" value="2" name="embarazo1" type="radio" onclick="noControlado()"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="embarazo" type="text" name="txt_embarazo" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="embarazo">¿Quien realizó los controles? ¿Cada cuanto?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">¿Consumió medicamentos, drogas y/o alcohol durante el embarazo?</h6>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input id="siE1" class="with-gap" value="1" name="embarazo2" type="radio" onclick="consumio()"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input id="noE1" class="with-gap" value="2" name="embarazo2" type="radio" onclick="noConsumio()"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="medicamentos" type="text" name="txt_medicamentos" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="medicamentos">Indique el tipo de medicamentos, drogas y/o alcohol consumió</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">¿Existieron complicaciones durante el embarazo?</h6>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input id="siE2" class="with-gap" value="1" name="complicaciones" type="radio" onclick="conComplicaciones()"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input id="noE2" class="with-gap" value="2" name="complicaciones" type="radio" onclick="sinComplicaciones()"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="complicaciones" type="text" name="txt_complicaciones" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="complicaciones">Indique el tipo de complicaciones durante el embarazo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Antecedentes del parto</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="semanas" type="text" name="txt_semanas" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="semanas">¿Cuantas semanas de embarazo tuvo?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Tipo de parto:</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="tipo1" class="with-gap" value="1" name="tipo" type="radio"/>
                                                                <span>Normal</span>
                                                            </label>
                                                        </p>    
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="tipo2" class="with-gap" value="2" name="tipo" type="radio"/>
                                                                <span>Inducido</span>
                                                            </label>
                                                        </p>   
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="tipo3" class="with-gap" value="3" name="tipo" type="radio"/>
                                                                <span>Fórceps</span>
                                                            </label>
                                                        </p>   
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s6" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="tipo4" class="with-gap" value="4" name="tipo" type="radio" onclick="cesarea()"/>
                                                                <span>Cesárea (señalar motivo)</span>
                                                            </label>
                                                        </p>   
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="motivoC" type="text" name="txt_motivo" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="motivoC">Motivo de la cesárea</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">¿Tuvo asistencia medica durante el parto?</h6>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="asistencia" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="asistencia" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Antecedentes posteriores al parto</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s7">
                                                    <div class="input-field col s12">
                                                        <input id="peso" type="text" name="txt_peso" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="peso" style="font-size: 12px">Peso al nacer en gramos (Esta informacion puede encontrarse en carnet control sano)</label>
                                                    </div>
                                                </div>
                                                <div class="col s7">
                                                    <div class="input-field col s12">
                                                        <input id="talla" type="text" name="txt_talla" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="talla" style="font-size: 12px">Talla al nacer en Cm (Esta informacion puede encontrarse en carnet control sano)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="apgar1" type="text" name="txt_apgar1" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="apgar1" style="font-size: 12px">A.P.G.A.R al minuto (Esta informacion puede encontrarse en carnet control sano)</label>
                                                    </div>
                                                </div>
                                                <div class="col s7">
                                                    <div class="input-field col s12">
                                                        <input id="apgar2" type="text" name="txt_apgar2" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="apgar2" style="font-size: 12px">A.P.G.A.R a los 5 minutos (Esta informacion puede encontrarse en carnet control sano)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">¿Quedó hospitalizado al nacer?</h6>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input id="siH" class="with-gap" value="1" name="hospitalizado" type="radio" onclick="hospitalizado()"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input id="noH" class="with-gap" value="2" name="hospitalizado" type="radio" onclick="noHospitalizado()"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="hospitalizado" type="text" name="txt_hospitalizado" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="hospitalizado" style="font-size: 12px">¿Cual es el motivo por el que quedó hospitalizado al nacer? ¿Cuanto tiempo?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Señale si antes de que cumpliera un año de vida el niño/a presentó (Marque las que correspondan)</h6>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma1" type="checkbox"/>
                                                            <span>Desnutrición</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma2" type="checkbox"/>
                                                            <span>Obesidad</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma3" type="checkbox"/>
                                                            <span>Fiebre alta</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma4" type="checkbox"/>
                                                            <span>Convulciones</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma5" type="checkbox"/>
                                                            <span>Traumatismos</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma6" type="checkbox"/>
                                                            <span>Intoxicación</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma7" type="checkbox"/>
                                                            <span>Enfermedades Respiratorias</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma8" type="checkbox"/>
                                                            <span>Asma</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma9" type="checkbox"/>
                                                            <span>Encefalitis</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma10" type="checkbox"/>
                                                            <span>Meningitis</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma11" type="checkbox"/>
                                                            <span>Hospitalizaciones</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma12" type="checkbox"/>
                                                            <span>Ninguno de los anteriores</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sintoma13" type="checkbox" onclick="otro()"/>
                                                            <span>Otro:</span>
                                                        </label>
                                                    </p>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input id="sintoma14" type="text" name="txt_otro" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="sintoma14">Indique</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">¿Se realizaron controles periodicos de salud?</h6>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="controles" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="controles" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s6">
                                                    <h6 class="col s12">Vacunas</h6>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="vacunas" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s2" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="vacunas" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input id="meses" type="text" name="txt_meses" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="meses">Observaciones de los primeros 12 meses de vida</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Lactancia</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Indique el periodo de Lactancia con leche materna exclusiva</h6>
                                                    <div class="input-field col s12">
                                                        <input id="lactancia" type="text" name="txt_lactancia" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="lactancia" style="font-size: 12px">Si no hubo este tipo de lactancia, indique "No existió este tipo de lactancia"</label>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <h6 class="col s12">Indique el periodo de Lactancia Mixta: Leche materna y Relleno</h6>
                                                    <div class="input-field col s12">
                                                        <input id="mixto" type="text" name="txt_mixto" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="mixto" style="font-size: 12px">Si no hubo este tipo de lactancia, indique "No existió este tipo de lactancia"</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Indique el periodo de Lactancia con Relleno y Formula de leche</h6>
                                                    <div class="input-field col s12">
                                                        <input id="relleno" type="text" name="txt_relleno" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="relleno" style="font-size: 12px">Si no hubo este tipo de lactancia, indique "No existió este tipo de lactancia"</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Desarrollo Sensoriomotriz</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s5">
                                                    <div class="input-field col s12">
                                                        <input id="c_cabeza" type="text" name="txt_Ccabeza" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="c_cabeza">Edad en que el niño(a) controla la cabeza</label>
                                                    </div>
                                                </div>
                                                <div class="col s5">
                                                    <div class="input-field col s12">
                                                        <input id="s_solo" type="text" name="txt_Ssolo" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="s_solo">Edad en que el niño(a) se sienta solo(a)</label>
                                                    </div>
                                                </div>
                                                <div class="col s5">
                                                    <div class="input-field col s12">
                                                        <input id="gatear" type="text" name="txt_gatear" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="gatear">Edad en que el niño(a) comienza a Gatear</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s5">
                                                    <div class="input-field col s12">
                                                        <input id="c_apoyo" type="text" name="txt_Capoyo" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="c_apoyo">Edad en que el niño(a) camina con apoyo</label>
                                                    </div>
                                                </div>
                                                <div class="col s5">
                                                    <div class="input-field col s12">
                                                        <input id="s_apoyo" type="text" name="txt_Sapoyo" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="s_apoyo">Edad en que el niño(a) camina sin apoyo</label>
                                                    </div>
                                                </div>
                                                <div class="col s5">
                                                    <div class="input-field col s12">
                                                        <input id="p_palabras" type="text" name="txt_Ppalabras" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="p_palabras" style="font-size: 12px">Edad en que el niño(a) emite sus primeras palabras</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s5">
                                                    <div class="input-field col s12">
                                                        <input id="p_frases" type="text" name="txt_Pfrases" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="p_frases" style="font-size: 12px">Edad en que el niño(a) emite sus primeras frases</label>
                                                    </div>
                                                </div>
                                                <div class="col s5">
                                                    <div class="input-field col s12">
                                                        <input id="v_solo" type="text" name="txt_Vsolo" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="v_solo">Edad en que el niño(a) se viste solo/a</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s4">
                                                    <h6 class="col s12">Controla Esfinter Vesical Diurno</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="EsfinterVD" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="EsfinterVD" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s4">
                                                    <h6 class="col s12">Controla Esfinter Vesical Nocturno</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="EsfinterVN" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="EsfinterVN" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s4">
                                                    <h6 class="col s12">Controla Esfinter Anal Diurno</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="EsfinterAD" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="EsfinterAD" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s4">
                                                    <h6 class="col s12">Controla Esfinter Anal Nocturno</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="EsfinterAN" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="EsfinterAN" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s4">
                                                    <h6 class="col s12">¿Utiliza pañales?</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="Pañales" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="Pañales" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s4">
                                                    <h6 class="col s12">¿Utiliza pañal de entrenamiento?</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="PañalE" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="PañalE" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">¿Necesita de asistencia para ir al baño?</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input id="siA" class="with-gap" value="1" name="asistenciaB" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input id="noA" class="with-gap" value="2" name="asistenciaB" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input id="n_asistencia" type="text" name="txt_Tasistencia" class="validate" style="background-color: white; border-radius: 10px">
                                                    <label class="active" for="n_asistencia">Indique el tipo de asistencia que necesita</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="obs" type="text" name="txt_obs" class="validate" style="background-color: white; border-radius: 10px">
                                                    <label class="active" for="obs">Observaciones</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">En su actividad motora general se aprecia:</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="Amotora" type="radio"/>
                                                                <span>Normal</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="2" name="Amotora" type="radio"/>
                                                                <span>Activo</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="3" name="Amotora" type="radio"/>
                                                                <span>Hiperactivo</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="4" name="Amotora" type="radio"/>
                                                                <span>Hipoactivo</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <h6 class="col s12">Su tono muscular general se aprecia:</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="Tmuscular" type="radio"/>
                                                                <span>Normal</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="2" name="Tmuscular" type="radio"/>
                                                                <span>Hipertonico</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="3" name="Tmuscular" type="radio"/>
                                                                <span>Hipotonico</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Es estable al caminar:</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="Ecaminar" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="Ecaminar" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s6">
                                                    <h6 class="col s12">Se cae con frecuencia:</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="Cfrecuencia" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="Cfrecuencia" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Dominancia lateral:</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="dominancia" type="radio"/>
                                                            <span>Derecha</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="dominancia" type="radio"/>
                                                            <span>Izquierda</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6>En relacion con su motricidad Fina el niño(a)logra:</h6>
                                                    <p>
                                                        <label>
                                                            <input id="mf1" type="checkbox"/>
                                                            <span>Agarrar</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="mf2" type="checkbox"/>
                                                            <span>Ensartar</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="mf3" type="checkbox"/>
                                                            <span>Presionar</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="mf4" type="checkbox" />
                                                            <span>Dibujar</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="mf5" type="checkbox"/>
                                                            <span>Realizar pinza con indice y pulgar</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="mf6" type="checkbox"/>
                                                            <span>Escribir</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="mf7" type="checkbox"/>
                                                            <span>Ninguna de las anteriores</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s6">
                                                    <h6>En relacion con algunso signos cognitivcos el niño(a):</h6>
                                                    <p>
                                                        <label>
                                                            <input id="sc1" type="checkbox"/>
                                                            <span>Reacciona a voces o caras familiares</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sc2" type="checkbox"/>
                                                            <span>Demanda objetos y compañia</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sc3" type="checkbox"/>
                                                            <span>Sonrie, balbucea, grita, llora, indica o señala</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sc4" type="checkbox"/>
                                                            <span>Manipula y explora objetos</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sc5" type="checkbox"/>
                                                            <span>Comprende prohibiciones</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sc6" type="checkbox"/>
                                                            <span>Posee evidente descoordinacion ojo-mano</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="sc7" type="checkbox"/>
                                                            <span>Ninguna de las anteriores</span>
                                                        </label>
                                                    </p>
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="obs1" type="text" name="txt_obs1" class="validate" style="background-color: white; border-radius: 10px">
                                                    <label class="active" for="obs1">Observaciones</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Vision</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6>Vision (Marque las que correspondan)</h6>
                                                    <p>
                                                        <label>
                                                            <input id="v1" type="checkbox"/>
                                                            <span>Se interesa por los estimulos visuales (Colores, formas, movimientos, etc.)</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="v2" type="checkbox"/>
                                                            <span>En ocaciones tiene los ojos irritados o llorosos</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="v3" type="checkbox"/>
                                                            <span>Presenta dolores frecuentes de cabeza</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="v4" type="checkbox"/>
                                                            <span>Se acerca o aleja demasiado los objetos a la vista (frunce el ceño)</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="v5" type="checkbox"/>
                                                            <span>Sigue con la vista el desplazamiento de los objetos o personas</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="v6" type="checkbox"/>
                                                            <span>Presenta movimientos oculares "anormales"</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="v7" type="checkbox"/>
                                                            <span>Manifiesta conductas "erroneas" (tropiezos, choques)</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="v8" type="checkbox"/>
                                                            <span>Ninguna de las anteriores</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s6">
                                                    <h6>El estudiante presenta alguno de los siguientes diagnosticos</h6>
                                                    <p>
                                                        <label>
                                                            <input id="d1" type="checkbox"/>
                                                            <span>Miopia</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="d2" type="checkbox"/>
                                                            <span>Estrabismo</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="d3" type="checkbox"/>
                                                            <span>Astigmatismo</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="d4" type="checkbox"/>
                                                            <span>Ninguno</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="d5" type="checkbox"/>
                                                            <span>Otro:</span>
                                                        </label>
                                                    </p>
                                                    <div class="input-field col s12">
                                                        <input id="d6" type="text" name="txt_obs1" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="d6">Indique otro</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">¿El niño/a utiliza lentes opticos?</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="vision" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="vision" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Audición</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6>Audición (Marcar las que correspondan)</h6>
                                                    <p>
                                                        <label>
                                                            <input id="a1" type="checkbox"/>
                                                            <span>Se interesa por los estimulos auditivos(ruidos, voces, musica, etc)</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="a2" type="checkbox"/>
                                                            <span>Reacciona o reconoce voces o sonidos familiares</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="a3" type="checkbox"/>
                                                            <span>Gira la cabeza cuando se le llama o ante un ruido fuerte</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="a4" type="checkbox"/>
                                                            <span>Acerca los oidos a la TV, radio o fuente de sonido</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="a5" type="checkbox"/>
                                                            <span>En ocaciones se tapa o golpea los oidos</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="a6" type="checkbox"/>
                                                            <span>La pronunciación oral es adecuada</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="a7" type="checkbox"/>
                                                            <span>Ninguna de las anteriores</span>
                                                        </label>
                                                    </p>
                                                </div>
                                                <div class="col s6">
                                                    <h6>El estudiante presenta alguno de los siguientes diagnosticos</h6>
                                                    <p>
                                                        <label>
                                                            <input id="da1" type="checkbox"/>
                                                            <span>Hipoacusia Derecha</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="da2" type="checkbox"/>
                                                            <span>Hipoacusia Izquierda</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="da3" type="checkbox"/>
                                                            <span>Hipoacusia Bilateral</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="da4" type="checkbox"/>
                                                            <span>Otitis Cronicas</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="da5" type="checkbox"/>
                                                            <span>Ninguna</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="da6" type="checkbox"/>
                                                            <span>Otro:</span>
                                                        </label>
                                                    </p>
                                                    <div class="input-field col s12">
                                                        <input id="da7" type="text" name="txt_audicion" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="da7">Indique otro</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">¿El niño/a utiliza audifono?</h6>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="1" name="audicion" type="radio"/>
                                                            <span>Si</span>
                                                        </label>
                                                    </p>
                                                    <p class="col s4" style="background-color: white; border-radius: 10px">
                                                        <label>
                                                            <input class="with-gap" value="2" name="audicion" type="radio"/>
                                                            <span>No</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="obs2" type="text" name="txt_obs2" class="validate" style="background-color: white; border-radius: 10px">
                                                    <label class="active" for="obs2">Observaciones</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Desarrollo del lenguaje</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">El niño(a) se comunica preferentemente en forma:</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="c1" class="with-gap" value="1" name="comunicacion" type="radio"/>
                                                                <span>Oral</span>
                                                            </label>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="c2" class="with-gap" value="2" name="comunicacion" type="radio"/>
                                                                <span>Gestual</span>
                                                            </label>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="c3" class="with-gap" value="3" name="comunicacion" type="radio"/>
                                                                <span>Mixto</span>
                                                            </label>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="c4" class="with-gap" value="4" name="comunicacion" type="radio"/>
                                                                <span>Otro</span>
                                                            </label>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <input id="c5" type="text" name="txt_otroC" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="c5">Indique otro</label>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <h6>Caracteristicas del lenguaje expresivo (Marque las que correspondan)</h6>
                                                    <p>
                                                        <label>
                                                            <input id="dc1" type="checkbox"/>
                                                            <span>Balbucea (oral o señas) / emite sonidos</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="dc2" type="checkbox"/>
                                                            <span>Vocaliza/realiza gestos o señas aisladas</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="dc3" type="checkbox"/>
                                                            <span>Emite palabras/produce señas</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="dc4" type="checkbox"/>
                                                            <span>Emite/produce frases</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="dc5" type="checkbox"/>
                                                            <span>Relata experiencias</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="dc6" type="checkbox"/>
                                                            <span>La emision/pronunciacion/produccion es clara</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="dc7" type="checkbox"/>
                                                            <span>Opcion 8 emite palabras sueltas</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="dc8" type="checkbox"/>
                                                            <span>Ninguna</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="dc9" type="checkbox"/>
                                                            <span>Otro:</span>
                                                        </label>
                                                    </p>
                                                    <div class="input-field col s12">
                                                        <input id="dc10" type="text" name="txt_otroL" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="dc10">Indique otro</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6>Caracteristicas del lenguaje comprensivo (Marque las que correspondan)</h6>
                                                    <p>
                                                        <label>
                                                            <input id="cl1" type="checkbox"/>
                                                            <span>Identifica objetos</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="cl2" type="checkbox"/>
                                                            <span>Identifica personas</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="cl3" type="checkbox"/>
                                                            <span>Comprende conceptos abstractos (Amistad, Culpa, Cariño, etc)</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="cl4" type="checkbox"/>
                                                            <span>Responde en forma coherente preguntas de la vida diaria</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="cl5" type="checkbox"/>
                                                            <span>Sigue instrucciones simples (traeme un auto, sientate, etc)</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="cl6" type="checkbox"/>
                                                            <span>Sigue instrucciones complejas (ven y sientate, ve a tu pieza y traeme tus zapatos)</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="cl7" type="checkbox"/>
                                                            <span>Sigue instrucciones grupales (niños siéntense, tome su mochila, etc)</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="cl8"  type="checkbox"/>
                                                            <span>Comprende relatos, noticias, cuentos cortos</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="cl9"  type="checkbox"/>
                                                            <span>Ninguna</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="cl10"  type="checkbox"/>
                                                            <span>Otro:</span>
                                                        </label>
                                                    </p>
                                                    <div class="input-field col s12">
                                                        <input id="cl11" type="text" name="txt_otroL1" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="cl11">Indique otro</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Manifestó perdida de lenguaje oral</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="pl1" class="with-gap" value="1" name="Plenguaje" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="pl2" class="with-gap" value="2" name="Plenguaje" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s10">
                                                    <div class="input-field col s12">
                                                        <input id="pl3" type="text" name="txt_perdidaL" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="pl3">Especifique edad y motivo de la pérdida de lenguaje oral</label>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="row">
                                                <div class="col s10">
                                                    <div class="input-field col s12">
                                                        <input id="obs3" type="text" name="txt_obs3" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="obs3">Observaciones</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Desarrollo Social</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Desarrollo Social (Marque las que correspondan)</h6>
                                                    <p>
                                                        <label>
                                                            <input id="ds1" type="checkbox"/>
                                                            <span>Se relaciona espontáneamente con las personas de su entorno natural</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds2" type="checkbox"/>
                                                            <span>Explica razones de sus comportamientos y actitudes</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds3" type="checkbox"/>
                                                            <span>Participa en actividades grupales</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds4" type="checkbox"/>
                                                            <span>Opta por trabajo individual</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds5" type="checkbox"/>
                                                            <span>Presenta lenguaje ecolálico</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds6" type="checkbox"/>
                                                            <span>Exhibe dificultad para adaptarse a situaciones nuevas</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds7" type="checkbox"/>
                                                            <span>Se relaciona en forma colaborativa</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds8" type="checkbox"/>
                                                            <span>Respeta normas sociales</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds9" type="checkbox"/>
                                                            <span>Respeta normas escolares</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds10" type="checkbox"/>
                                                            <span>Muestra sentido del humor</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds11" type="checkbox"/>
                                                            <span>Movimientos estereotipados</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds12" type="checkbox"/>
                                                            <span>Pataletas frecuentes</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds13" type="checkbox"/>
                                                            <span>Ninguno</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ds14" type="checkbox"/>
                                                            <span>Otro:</span>
                                                        </label>
                                                    </p>
                                                    <div class="input-field col s12">
                                                        <input id="ds15" type="text" name="txt_otroS" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="ds15">Indique otro</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Cuando se prende una luz, reacciona de forma...</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="reaccion" type="radio"/>
                                                                <span>Natural</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="2" name="reaccion" type="radio"/>
                                                                <span>Desmesurada</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <h6 class="col s12">Cuando escucha un sonido, reacciona de forma...</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="reaccion1" type="radio"/>
                                                                <span>Natural</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="2" name="reaccion1" type="radio"/>
                                                                <span>Desmesurada</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Cuando una persona extraña se le acerca, reacciona de forma...</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="reaccion2" type="radio"/>
                                                                <span>Natural</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="2" name="reaccion2" type="radio"/>
                                                                <span>Desmesurada</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input id="obs4" type="text" name="txt_obs4" class="validate" style="background-color: white; border-radius: 10px">
                                                    <label class="active" for="obs4">Observaciones</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Salud</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Estado actual de salud del/la estudiante (Marque las que correspondan)</h6>
                                                    <p>
                                                        <label>
                                                            <input id="e1" type="checkbox"/>
                                                            <span>Vacunas al dia</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e2" type="checkbox"/>
                                                            <span>Epilepsia</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e3" type="checkbox"/>
                                                            <span>Problemas Cardiacos</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e4" type="checkbox"/>
                                                            <span>Paraplejia</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e5" type="checkbox"/>
                                                            <span>Perdida auditiva</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e6" type="checkbox"/>
                                                            <span>Perdida visual</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e7" type="checkbox"/>
                                                            <span>Trastorno Motor</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e8" type="checkbox"/>
                                                            <span>Problemas bronco-respiratorio</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e9" type="checkbox"/>
                                                            <span>Enfermedad infecto-contagiosa</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e10" type="checkbox"/>
                                                            <span>Trastorno Emocional</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e11" type="checkbox"/>
                                                            <span>Trastorno Conductual</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e12" type="checkbox"/>
                                                            <span>Ninguno</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="e13" type="checkbox"/>
                                                            <span>Otro:</span>
                                                        </label>
                                                    </p>
                                                    <div class="input-field col s12">
                                                        <input id="e14" type="text" name="txt_otroS2" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="e14">Observaciones</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s10">
                                                    <h6 class="col s12">El o los problemas de salud reciben tratamientos</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="t1" class="with-gap" value="1" name="tratamiento" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="t2" class="with-gap" value="2" name="tratamiento" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="t3" type="text" name="txt_Ttratamiento" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="t3">Indique el tipo de tratamiento</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s10">
                                                    <h6 class="col s12">Toma algun medicamento?</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="m1" class="with-gap" value="1" name="medicamento" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="m2" class="with-gap" value="2" name="medicamento" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="m3" type="text" name="txt_medicamento" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="m3">Indique que medicamentos toma e indique la dosis </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">En cuanto a la alimentación (apreciación del informante)</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="al1" class="with-gap" value="1" name="alimentacion" type="radio"/>
                                                                <span>Normal</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s6" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="al2" class="with-gap" value="2" name="alimentacion" type="radio"/>
                                                                <span>"Malo(a) para comer"</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s6" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="al3" class="with-gap" value="3" name="alimentacion" type="radio"/>
                                                                <span>"Bueno(a) para comer"</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s6" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="al4" class="with-gap" value="4" name="alimentacion" type="radio"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <input id="al5" type="text" name="txt_otroA" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="al5">Indique otro</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="pesoA" type="text" name="txt_pesoA" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="pesoA">Peso Actual</label>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="estaturaA" type="text" name="txt_estaturaA" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="estaturaA">Estatura Actual</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">En cuanto al peso (su apreciación)</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="peso" type="radio"/>
                                                                <span>Normal</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="2" name="peso" type="radio"/>
                                                                <span>Bajo peso</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="3" name="peso" type="radio"/>
                                                                <span>Obesidad</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <h6 class="col s12">¿Come solo?</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="comeSolo" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="2" name="comeSolo" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="gustaComer" type="text" name="txt_gustaComer" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="gustaComer">¿Que alimentos le gusta comer?</label>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="nogustaComer" type="text" name="txt_nogustaComer" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="nogustaComer">¿Que alimentos no le gusta comer?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">En cuanto al sueño</h6>
                                                    <div class="row">
                                                        <p class="col s5" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="dormir" type="radio"/>
                                                                <span>Normal</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="2" name="dormir" type="radio"/>
                                                                <span>Tranquilo</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="3" name="dormir" type="radio"/>
                                                                <span>Inquieto</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s2">
                                                    <div class="row">
                                                        <h6 class="col s12">Hora a la que se duerme</h6>
                                                        <input placeholder="--Seleccionar--" type="text" class="timepicker" style="background-color: white; border-radius: 10px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Duerme...</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="conQuienDuerme" type="radio"/>
                                                                <span>Solo</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="2" name="conQuienDuerme" type="radio"/>
                                                                <span>Acompañado</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="especificar" type="text" name="especificar" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="especificar">Especifique la respuesta anterior</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">En la noche presenta (Marque las que correspondan)</h6>
                                                    <p>
                                                        <label>
                                                            <input id="p1" type="checkbox"/>
                                                            <span>Insomnio</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="p2" type="checkbox"/>
                                                            <span>Pesadillas</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="p3" type="checkbox"/>
                                                            <span>Terrores nocturnos</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="p4" type="checkbox"/>
                                                            <span>Sonambulismo</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="p5" type="checkbox"/>
                                                            <span>Despierta de buen humor</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="p6" type="checkbox"/>
                                                            <span>Ninguna</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="p7" type="checkbox"/>
                                                            <span>Otro:</span>
                                                        </label>
                                                    </p>
                                                    <div class="input-field col s12">
                                                        <input id="p8" type="text" name="otroN" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="p8">Indique otro</label>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <h6 class="col s12">Humor/comportamiento (señale el comportamiento habitual)</h6>
                                                    <div class="input-field col s12" style="background-color: white; border-radius: 10px">
                                                        <select name="humor" id="humor">
                                                            <option value="" disabled selected>--Seleccionar--</option>
                                                            <option value="1">Alegre</option>
                                                            <option value="2">Jugueton/bromista</option>
                                                            <option value="3">Risueño</option>
                                                            <option value="4">Triste</option>
                                                            <option value="5">Serio</option>
                                                            <option value="6">Rebelde</option>
                                                            <option value="7">Apático</option>
                                                            <option value="8">Violento(a)</option>
                                                            <option value="9">Ninguna</option>
                                                            <option value="10">Otro:</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <input id="h1" type="text" name="otroN1" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="h1">Indique otro</label>
                                                    </div>
                                                </div>
                                                <div class="input-field col s12">
                                                    <input id="obs5" type="text" name="obs5" class="validate" style="background-color: white; border-radius: 10px">
                                                    <label class="active" for="obs5">Observaciones</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Antecedentes familiares</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input id="integrantes" type="text" name="integrantes" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="integrantes" style="font-size: 11px">Personas que viven con eel niño oniña y/o que son responsables de su cuidado (Escribir
                                                            nombre, parentezco, edad, escolaridad y ocupacion. Ejemplo: Juan Perez, Papa, 45, 4 medio y
                                                            obrero)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input id="Asalud" type="text" name="Asalud" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="Asalud" style="font-size: 13px">Antecedentes de salud de la familia. (Señale aquellos antecedentes que son relevantes en
                                                            función de la entrega de apoyo que requiere el o la estudiante)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input id="obs6" type="text" name="obs6" class="validate"style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="obs6" style="font-size: 14px">Observaciones</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Antecedentes escolares</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="edadE" type="text" name="edadE" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="edadE">Edad de ingreso al sistema escolar</label>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <h6 class="col s12">¿Asistió a jardin infantil?</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="jardin" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="2" name="jardin" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input id="colegios" type="text" name="colegios" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="colegios">Nombre de todos los colegios en los que ha estado</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Modalidad de enseñanza</h6>
                                                    <div class="input-field col s12" style="background-color: white; border-radius: 10px">
                                                        <select>
                                                            <option value="" disabled selected>Seleccionar</option>
                                                            <option value="1">Regular</option>
                                                            <option value="2">Especial</option>
                                                            <option value="3">Tecnica</option>
                                                            <option value="3">Ninguna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <div class="input-field col s12">
                                                        <input id="colegios1" type="text" name="colegios1" class="validate" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="colegios1">Motivo de cambio del ultimo colegio</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">¿Ha repetido curso?</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="r1" class="with-gap" value="1" name="repetir" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="r2" class="with-gap" value="2" name="repetir" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s8">
                                                    <div class="input-field col s12">
                                                        <input id="r3" type="text" name="repetir" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="r3">Curso y motivo por el que repitio</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Situación</h6>
                                                    <div class="input-field col s12" style="background-color: white; border-radius: 10px">
                                                        <select>
                                                            <option value="" disabled selected>Seleccionar</option>
                                                            <option value="1">Asiste al colegio regularmente</option>
                                                            <option value="2">Presenta dificultades de aprendizaje</option>
                                                            <option value="3">Asiste al colegio con agrado</option>
                                                            <option value="3">Presenta dificultades para participar en actividades</option>
                                                            <option value="4">Existe apoyo familiar en tareas</option>
                                                            <option value="5">Presenta conductas disruptivas</option>
                                                            <option value="6">Tienes amigos(as)</option>
                                                            <option value="7">Ninguna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Actitud de la familia</div>
                                        <div class="collapsible-body" style="background-color: #C8E6C9">
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">¿Como evalúa usted el Desempeño Escolar de su hijo?</h6>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px"> 
                                                            <label>
                                                                <input id="ev1" class="with-gap" value="1" name="descolar" type="radio"/>
                                                                <span>Satisfactorio</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s4" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="ev2" class="with-gap" value="2" name="descolar" type="radio"/>
                                                                <span>Insatisfactorio</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="ev3" type="text" name="motivo1" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="ev3">Si es insatisfactorio, por que motivo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Que hace cuando a su hijo(a) le va mal en el colegio</h6>
                                                    <div class="input-field col s12" style="background-color: white; border-radius: 10px">
                                                        <select name="vaMal" id="vaMal">
                                                            <option value="" disabled selected>Seleccionar</option>
                                                            <option value="1">Lo apoyo</option>
                                                            <option value="2">Lo castigo</option>
                                                            <option value="3">Ninguno</option>
                                                            <option value="4">Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="vM1" type="text" name="otro1" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="vM1">Indique otro</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Que hace cuando a su hijo(a) le va bien en el colegio</h6>
                                                    <div class="input-field col s12" style="background-color: white; border-radius: 10px">
                                                        <select name="vaBien" id="vaBien">
                                                            <option value="" disabled selected>Seleccionar</option>
                                                            <option value="1">Le entrego cariño</option>
                                                            <option value="2">Le doy su comida favorita</option>
                                                            <option value="3">Lo dejo ver televisión</option>
                                                            <option value="4">Lo dejo usar el celular</option>
                                                            <option value="5">Lo dejo salir a la calle</option>
                                                            <option value="6">Le compro un juguete</option>
                                                            <option value="7">Salgo de paseo con el</option>
                                                            <option value="8">Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col s6">
                                                    <div class="input-field col s12">
                                                        <input id="vB1" type="text" name="otro2" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="vB1">Indique otro</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Quien apoya el proceso de aprendizaje y desarrollo de su hijo</h6>
                                                    <p>
                                                        <label>
                                                            <input id="ap1" type="checkbox"/>
                                                            <span>Madre</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ap2" type="checkbox"/>
                                                            <span>Padre</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ap3" type="checkbox"/>
                                                            <span>Hermanos</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ap4" type="checkbox"/>
                                                            <span>Abuelos</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ap5" type="checkbox"/>
                                                            <span>Tios</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ap6" type="checkbox"/>
                                                            <span>Otros Familiares</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ap7" type="checkbox"/>
                                                            <span>Otros Profesionales</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ap8" type="checkbox"/>
                                                            <span>Ninguno</span>
                                                        </label>
                                                    </p>
                                                    <p>
                                                        <label>
                                                            <input id="ap9" type="checkbox"/>
                                                            <span>Otro:</span>
                                                        </label>
                                                    </p>
                                                    <div class="input-field col s12">
                                                        <input id="ap10" type="text" name="otro3" class="validate" disabled="true" style="background-color: white; border-radius: 10px">
                                                        <label class="active" for="ap10">Indique otro</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s6">
                                                    <h6 class="col s12">Su hijo cuenta con un ambiente fisico y emocional adecuado para su aprendizaje</h6>
                                                    <div class="row">
                                                        <p class="col s12" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" id="am1" name="ambiente" type="radio"  />
                                                                <span>Ambos</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s12" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" id="am2" name="ambiente" type="radio"  />
                                                                <span>Solo fisico (espacios, materiales, ventilación, luminosidad, etc)</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s12" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" id="am3" name="ambiente" type="radio"  />
                                                                <span>Solo emocional (Tranquilidad, Comprensión, etc)</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s12" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" id="am4" name="ambiente" type="radio"  />
                                                                <span>Ninguno</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col s12 center">
                                        <button class="btn light-green darken-3" type="submit" name="action" style="margin-bottom: 10px;">Registrar Entrevista
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");

            closeBtn.addEventListener("click", () => {
                sidebar.classList.toggle("open");
                menuBtnChange();//calling the function(optional)
            });

            searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
                sidebar.classList.toggle("open");
                menuBtnChange(); //calling the function(optional)
            });

            // following are the code to change sidebar button(optional)
            function menuBtnChange() {
                if (sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
                } else {
                    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");//replacing the iocns class
                }
            }
        </script>
        <script>
            $(document).ready(function () {
                M.updateTextFields();
            });

            $(document).ready(function () {
                $('select').formSelect();
            });

            $(document).ready(function () {
                $('.collapsible').collapsible();
            });

            $(document).ready(function () {
                $('.timepicker').timepicker();
            });

        </script>
        <script>
            var siE = document.getElementById('siE');
            var noE = document.getElementById('noE');
            var justificar = document.getElementById('embarazo');

            //scripts para input "el embarazo fue controlado?"
            function controlado() {
                if (siE.checked) {
                    justificar.disabled = false;
                }
            }
            function noControlado() {
                if (noE.checked) {
                    justificar.disabled = true;
                }
            }

            var siE1 = document.getElementById('siE1');
            var noE1 = document.getElementById('noE1');
            var medicamentos = document.getElementById('medicamentos');

            // scripts para input "consumio medicamentos durante el embarazo?"
            function consumio() {
                if (siE1.checked) {
                    medicamentos.disabled = false;
                }
            }
            function noConsumio() {
                if (noE1.checked) {
                    medicamentos.disabled = true;
                }
            }

            var siE2 = document.getElementById('siE2');
            var noE2 = document.getElementById('noE2');
            var complicaciones = document.getElementById('complicaciones');

            //scripts para input "tuvo complicaciones durante el embarazo?"
            function conComplicaciones() {
                if (siE2.checked) {
                    complicaciones.disabled = false;
                }
            }
            function sinComplicaciones() {
                if (noE2.checked) {
                    complicaciones.disabled = true;
                }
            }

            var tipo1 = document.getElementById('tipo1');
            var tipo2 = document.getElementById('tipo2');
            var tipo3 = document.getElementById('tipo3');
            var cesarea = document.getElementById('tipo4');
            var motivoC = document.getElementById('motivoC');

            //scripts par input "tipo de parto"
            tipo1.addEventListener('click', function () {
                if (tipo1.checked) {
                    motivoC.disabled = true;
                }
            })

            tipo2.addEventListener('click', function () {
                if (tipo2.checked) {
                    motivoC.disabled = true;
                }
            })

            tipo3.addEventListener('click', function () {
                if (tipo3.checked) {
                    motivoC.disabled = true;
                }
            })

            cesarea.addEventListener('click', function () {
                if (cesarea.checked) {
                    motivoC.disabled = false;
                }
            })

            var siH = document.getElementById('siH');
            var noH = document.getElementById('noH');
            var hospitalizado = document.getElementById('hospitalizado');

            //scripts para input "hospitalizado al nacer"
            siH.addEventListener('click', function () {
                if (siH.checked) {
                    hospitalizado.disabled = false;
                }
            })
            noH.addEventListener('click', function () {
                if (noH.checked) {
                    hospitalizado.disabled = true;
                }
            })

            var sintoma1 = document.getElementById('sintoma1');
            var sintoma2 = document.getElementById('sintoma2');
            var sintoma3 = document.getElementById('sintoma3');
            var sintoma4 = document.getElementById('sintoma4');
            var sintoma5 = document.getElementById('sintoma5');
            var sintoma6 = document.getElementById('sintoma6');
            var sintoma7 = document.getElementById('sintoma7');
            var sintoma8 = document.getElementById('sintoma8');
            var sintoma9 = document.getElementById('sintoma9');
            var sintoma10 = document.getElementById('sintoma10');
            var sintoma11 = document.getElementById('sintoma11');
            var sintoma12 = document.getElementById('sintoma12');
            var sintoma13 = document.getElementById('sintoma13');
            var sintoma14 = document.getElementById('sintoma14');

            //script para input "se;ale si antes de que cumpliera un a;o...."
            sintoma12.addEventListener('click', function () {
                if (sintoma12.checked) {
                    sintoma1.disabled = true;
                    sintoma2.disabled = true;
                    sintoma3.disabled = true;
                    sintoma4.disabled = true;
                    sintoma5.disabled = true;
                    sintoma6.disabled = true;
                    sintoma7.disabled = true;
                    sintoma8.disabled = true;
                    sintoma9.disabled = true;
                    sintoma10.disabled = true;
                    sintoma11.disabled = true;
                    sintoma13.disabled = true;
                    sintoma1.checked = false;
                    sintoma2.checked = false;
                    sintoma3.checked = false;
                    sintoma4.checked = false;
                    sintoma5.checked = false;
                    sintoma6.checked = false;
                    sintoma7.checked = false;
                    sintoma8.checked = false;
                    sintoma9.checked = false;
                    sintoma10.checked = false;
                    sintoma11.checked = false;
                    sintoma13.checked = false;
                } else {
                    sintoma1.disabled = false;
                    sintoma2.disabled = false;
                    sintoma3.disabled = false;
                    sintoma4.disabled = false;
                    sintoma5.disabled = false;
                    sintoma6.disabled = false;
                    sintoma7.disabled = false;
                    sintoma8.disabled = false;
                    sintoma9.disabled = false;
                    sintoma10.disabled = false;
                    sintoma11.disabled = false;
                    sintoma13.disabled = false;
                }
            })
            sintoma13.addEventListener('click', function () {
                if (sintoma13.checked) {
                    sintoma14.disabled = false;
                } else {
                    sintoma14.disabled = true;
                }
            })



            var siA = document.getElementById('siA');
            var noA = document.getElementById('noA');
            var n_asistencia = document.getElementById('n_asistencia');

            //scripts para input "necesita de asistencia para ir al ba;o"
            siA.addEventListener('click', function () {
                if (siA.checked) {
                    n_asistencia.disabled = false;
                } else {
                    n_asistencia.disabled = true;
                }
            })
            noA.addEventListener('click', function () {
                if (noA.checked) {
                    n_asistencia.disabled = true;
                } else {
                    n_asistencia.disabled = false;
                }
            })

            var mf1 = document.getElementById('mf1');
            var mf2 = document.getElementById('mf2');
            var mf3 = document.getElementById('mf3');
            var mf4 = document.getElementById('mf4');
            var mf5 = document.getElementById('mf5');
            var mf6 = document.getElementById('mf6');
            var mf7 = document.getElementById('mf7');
            //script para input "en relacion con su motricidad fina..."
            mf7.addEventListener('click', function () {
                if (mf7.checked) {
                    mf1.disabled = true;
                    mf2.disabled = true;
                    mf3.disabled = true;
                    mf4.disabled = true;
                    mf5.disabled = true;
                    mf6.disabled = true;
                    mf1.checked = false;
                    mf2.checked = false;
                    mf3.checked = false;
                    mf4.checked = false;
                    mf5.checked = false;
                    mf6.checked = false;
                } else {
                    mf1.disabled = false;
                    mf2.disabled = false;
                    mf3.disabled = false;
                    mf4.disabled = false;
                    mf5.disabled = false;
                    mf6.disabled = false;
                }
            })
            mf1.addEventListener('click', function () {
                if (mf1.checked) {
                    mf7.disabled = true;
                } else {
                    mf7.disabled = false;
                }
            })
            mf2.addEventListener('click', function () {
                if (mf2.checked) {
                    mf7.disabled = true;
                } else {
                    mf7.disabled = false;
                }
            })
            mf3.addEventListener('click', function () {
                if (mf3.checked) {
                    mf7.disabled = true;
                } else {
                    mf7.disabled = false;
                }
            })
            mf4.addEventListener('click', function () {
                if (mf4.checked) {
                    mf7.disabled = true;
                } else {
                    mf7.disabled = false;
                }
            })
            mf5.addEventListener('click', function () {
                if (mf5.checked) {
                    mf7.disabled = true;
                } else {
                    mf7.disabled = false;
                }
            })
            mf6.addEventListener('click', function () {
                if (mf6.checked) {
                    mf7.disabled = true;
                } else {
                    mf7.disabled = false;
                }
            })

            var sc1 = document.getElementById('sc1');
            var sc2 = document.getElementById('sc2');
            var sc3 = document.getElementById('sc3');
            var sc4 = document.getElementById('sc4');
            var sc5 = document.getElementById('sc5');
            var sc6 = document.getElementById('sc6');
            var sc7 = document.getElementById('sc7');
            //scripts para input "signos cognitivos"
            sc7.addEventListener('click', function () {
                if (sc7.checked) {
                    sc1.disabled = true;
                    sc2.disabled = true;
                    sc3.disabled = true;
                    sc4.disabled = true;
                    sc5.disabled = true;
                    sc6.disabled = true;
                    sc1.checked = false;
                    sc2.checked = false;
                    sc3.checked = false;
                    sc4.checked = false;
                    sc5.checked = false;
                    sc6.checked = false;
                } else {
                    sc1.disabled = false;
                    sc2.disabled = false;
                    sc3.disabled = false;
                    sc4.disabled = false;
                    sc5.disabled = false;
                    sc6.disabled = false;
                }
            })

            sc1.addEventListener('click', function () {
                if (sc1.checked) {
                    sc7.disabled = true;
                } else {
                    sc7.disabled = false;
                }
            })
            sc2.addEventListener('click', function () {
                if (sc2.checked) {
                    sc7.disabled = true;
                } else {
                    sc7.disabled = false;
                }
            })
            sc3.addEventListener('click', function () {
                if (sc3.checked) {
                    sc7.disabled = true;
                } else {
                    sc7.disabled = false;
                }
            })
            sc4.addEventListener('click', function () {
                if (sc4.checked) {
                    sc7.disabled = true;
                } else {
                    sc7.disabled = false;
                }
            })
            sc5.addEventListener('click', function () {
                if (sc5.checked) {
                    sc7.disabled = true;
                } else {
                    sc7.disabled = false;
                }
            })
            sc6.addEventListener('click', function () {
                if (sc6.checked) {
                    sc7.disabled = true;
                } else {
                    sc7.disabled = false;
                }
            })


            var v1 = document.getElementById('v1');
            var v2 = document.getElementById('v2');
            var v3 = document.getElementById('v3');
            var v4 = document.getElementById('v4');
            var v5 = document.getElementById('v5');
            var v6 = document.getElementById('v6');
            var v7 = document.getElementById('v7');
            var v8 = document.getElementById('v8');
            v8.addEventListener('click', function () {
                if (v8.checked) {
                    v1.disabled = true;
                    v2.disabled = true;
                    v3.disabled = true;
                    v4.disabled = true;
                    v5.disabled = true;
                    v6.disabled = true;
                    v7.disabled = true;
                } else {
                    v1.disabled = false;
                    v2.disabled = false;
                    v3.disabled = false;
                    v4.disabled = false;
                    v5.disabled = false;
                    v6.disabled = false;
                    v7.disabled = false;
                }
            })

            v1.addEventListener('click', function () {
                if (v1.checked) {
                    v8.disabled = true;
                } else {
                    v8.disabled = false;
                }
            })
            v2.addEventListener('click', function () {
                if (v2.checked) {
                    v8.disabled = true;
                } else {
                    v8.disabled = false;
                }
            })
            v3.addEventListener('click', function () {
                if (v3.checked) {
                    v8.disabled = true;
                } else {
                    v8.disabled = false;
                }
            })
            v4.addEventListener('click', function () {
                if (v4.checked) {
                    v8.disabled = true;
                } else {
                    v8.disabled = false;
                }
            })
            v5.addEventListener('click', function () {
                if (v5.checked) {
                    v8.disabled = true;
                } else {
                    v8.disabled = false;
                }
            })
            v6.addEventListener('click', function () {
                if (v6.checked) {
                    v8.disabled = true;
                } else {
                    v8.disabled = false;
                }
            })
            v7.addEventListener('click', function () {
                if (v7.checked) {
                    v8.disabled = true;
                } else {
                    v8.disabled = false;
                }
            })


            var d1 = document.getElementById('d1');
            var d2 = document.getElementById('d2');
            var d3 = document.getElementById('d3');
            var d4 = document.getElementById('d4');
            var d5 = document.getElementById('d5');
            var d6 = document.getElementById('d6');
            d4.addEventListener('click', function () {
                if (d4.checked) {
                    d1.disabled = true;
                    d2.disabled = true;
                    d3.disabled = true;
                    d5.disabled = true;
                    d6.disabled = true;
                    d1.checked = false;
                    d2.checked = false;
                    d3.checked = false;
                    d5.checked = false;
                    d6.checked = false;
                } else {
                    d1.disabled = false;
                    d2.disabled = false;
                    d3.disabled = false;
                    d5.disabled = false;
                    d6.disabled = true;
                }
            })
            d5.addEventListener('click', function () {
                if (d5.checked) {
                    d1.disabled = true;
                    d2.disabled = true;
                    d3.disabled = true;
                    d4.disabled = true;
                    d6.disabled = false;
                } else {
                    d1.disabled = false;
                    d2.disabled = false;
                    d3.disabled = false;
                    d4.disabled = false;
                    d6.disabled = true;
                }
            })

            var a1 = document.getElementById('a1');
            var a2 = document.getElementById('a2');
            var a3 = document.getElementById('a3');
            var a4 = document.getElementById('a4');
            var a5 = document.getElementById('a5');
            var a6 = document.getElementById('a6');
            var a7 = document.getElementById('a7');

            a1.addEventListener('click', function () {
                if (a1.checked) {
                    a7.disabled = true;
                } else
                    a7.disabled = false;
            })
            a2.addEventListener('click', function () {
                if (a2.checked) {
                    a7.disabled = true;
                } else
                    a7.disabled = false;
            })
            a3.addEventListener('click', function () {
                if (a3.checked) {
                    a7.disabled = true;
                } else
                    a7.disabled = false;
            })
            a4.addEventListener('click', function () {
                if (a4.checked) {
                    a7.disabled = true;
                } else
                    a7.disabled = false;
            })
            a5.addEventListener('click', function () {
                if (a5.checked) {
                    a7.disabled = true;
                } else
                    a7.disabled = false;
            })
            a6.addEventListener('click', function () {
                if (a6.checked) {
                    a7.disabled = true;
                } else
                    a7.disabled = false;
            })
            a7.addEventListener('click', function () {
                if (a7.checked) {
                    a1.disabled = true;
                    a2.disabled = true;
                    a3.disabled = true;
                    a4.disabled = true;
                    a5.disabled = true;
                    a6.disabled = true;
                } else {
                    a1.disabled = false;
                    a2.disabled = false;
                    a3.disabled = false;
                    a4.disabled = false;
                    a5.disabled = false;
                    a6.disabled = false;
                }
            })

            var da1 = document.getElementById('da1');
            var da2 = document.getElementById('da2');
            var da3 = document.getElementById('da3');
            var da4 = document.getElementById('da4');
            var da5 = document.getElementById('da5');
            var da6 = document.getElementById('da6');
            var da7 = document.getElementById('da7');

            da5.addEventListener('click', function () {
                if (da5.checked) {
                    da1.disabled = true;
                    da2.disabled = true;
                    da3.disabled = true;
                    da4.disabled = true;
                    da6.disabled = true;
                    da7.disabled = true;
                } else {
                    da1.disabled = false;
                    da2.disabled = false;
                    da3.disabled = false;
                    da4.disabled = false;
                    da6.disabled = false;
                    da7.disabled = false;
                }
            })
            da6.addEventListener('click', function () {
                if (da6.checked) {
                    da1.disabled = true;
                    da2.disabled = true;
                    da3.disabled = true;
                    da4.disabled = true;
                    da5.disabled = true;
                    da7.disabled = false;
                } else {
                    da1.disabled = false;
                    da2.disabled = false;
                    da3.disabled = false;
                    da4.disabled = false;
                    da5.disabled = false;
                    da7.disabled = true;
                }
            })

            var c1 = document.getElementById('c1');
            var c2 = document.getElementById('c2');
            var c3 = document.getElementById('c3');
            var c4 = document.getElementById('c4');
            var c5 = document.getElementById('c5');

            c1.addEventListener('click', function () {
                if (c1.checked) {
                    c5.disabled = true;
                }
            })
            c2.addEventListener('click', function () {
                if (c2.checked) {
                    c5.disabled = true;
                }
            })
            c3.addEventListener('click', function () {
                if (c3.checked) {
                    c5.disabled = true;
                }
            })
            c4.addEventListener('click', function () {
                if (c4.checked) {
                    c5.disabled = false;
                } else {
                    c5.disabled = true;
                }
            })

            var dc1 = document.getElementById('dc1');
            var dc2 = document.getElementById('dc2');
            var dc3 = document.getElementById('dc3');
            var dc4 = document.getElementById('dc4');
            var dc5 = document.getElementById('dc5');
            var dc6 = document.getElementById('dc6');
            var dc7 = document.getElementById('dc7');
            var dc8 = document.getElementById('dc8');
            var dc9 = document.getElementById('dc9');
            var dc10 = document.getElementById('dc10');

            dc8.addEventListener('click', function () {
                if (dc8.checked) {
                    dc1.disabled = true;
                    dc2.disabled = true;
                    dc3.disabled = true;
                    dc4.disabled = true;
                    dc5.disabled = true;
                    dc6.disabled = true;
                    dc7.disabled = true;
                    dc9.disabled = true;
                    dc10.disabled = true;
                    dc1.checked = false;
                    dc2.checked = false;
                    dc3.checked = false;
                    dc4.checked = false;
                    dc5.checked = false;
                    dc6.checked = false;
                    dc7.checked = false;
                    dc9.checked = false;
                    dc10.checked = false;
                } else {
                    dc1.disabled = false;
                    dc2.disabled = false;
                    dc3.disabled = false;
                    dc4.disabled = false;
                    dc5.disabled = false;
                    dc6.disabled = false;
                    dc7.disabled = false;
                    dc9.disabled = false;
                    dc10.disabled = true;
                }
            })
            dc9.addEventListener('click', function () {
                if (dc9.checked) {
                    dc10.disabled = false;
                } else {
                    dc10.disabled = true;
                }
            })

            var cl1 = document.getElementById('cl1');
            var cl2 = document.getElementById('cl2');
            var cl3 = document.getElementById('cl3');
            var cl4 = document.getElementById('cl4');
            var cl5 = document.getElementById('cl5');
            var cl6 = document.getElementById('cl6');
            var cl7 = document.getElementById('cl7');
            var cl8 = document.getElementById('cl8');
            var cl9 = document.getElementById('cl9');
            var cl10 = document.getElementById('cl10');
            var cl11 = document.getElementById('cl11');

            cl1.addEventListener('click', function () {
                if (cl1.checked) {
                    cl9.disabled = true;
                } else {
                    cl9.disabled = false;
                }
            })
            cl2.addEventListener('click', function () {
                if (cl2.checked) {
                    cl9.disabled = true;
                } else {
                    cl9.disabled = false;
                }
            })
            cl3.addEventListener('click', function () {
                if (cl3.checked) {
                    cl9.disabled = true;
                } else {
                    cl9.disabled = false;
                }
            })
            cl4.addEventListener('click', function () {
                if (cl4.checked) {
                    cl9.disabled = true;
                } else {
                    cl9.disabled = false;
                }
            })
            cl5.addEventListener('click', function () {
                if (cl5.checked) {
                    cl9.disabled = true;
                } else {
                    cl9.disabled = false;
                }
            })
            cl6.addEventListener('click', function () {
                if (cl6.checked) {
                    cl9.disabled = true;
                } else {
                    cl9.disabled = false;
                }
            })
            cl7.addEventListener('click', function () {
                if (cl7.checked) {
                    cl9.disabled = true;
                } else {
                    cl9.disabled = false;
                }
            })
            cl8.addEventListener('click', function () {
                if (cl8.checked) {
                    cl9.disabled = true;
                } else {
                    cl9.disabled = false;
                }
            })
            cl9.addEventListener('click', function () {
                if (cl9.checked) {
                    cl1.disabled = true;
                    cl2.disabled = true;
                    cl3.disabled = true;
                    cl4.disabled = true;
                    cl5.disabled = true;
                    cl6.disabled = true;
                    cl7.disabled = true;
                    cl8.disabled = true;
                    cl10.disabled = true;
                    cl11.disabled = true;
                    cl1.checked = false;
                    cl2.checked = false;
                    cl3.checked = false;
                    cl4.checked = false;
                    cl5.checked = false;
                    cl6.checked = false;
                    cl7.checked = false;
                    cl8.checked = false;
                    cl10.checked = false;
                    cl11.checked = false;
                } else {
                    cl1.disabled = false;
                    cl2.disabled = false;
                    cl3.disabled = false;
                    cl4.disabled = false;
                    cl5.disabled = false;
                    cl6.disabled = false;
                    cl7.disabled = false;
                    cl8.disabled = false;
                    cl10.disabled = false;
                }
            })
            cl10.addEventListener('click', function () {
                if (cl10.checked) {
                    cl11.disabled = false;
                } else {
                    cl11.disabled = true;
                }
            })

            var pl1 = document.getElementById('pl1');
            var pl2 = document.getElementById('pl2');
            var pl3 = document.getElementById('pl3');

            pl2.addEventListener('click', function () {
                if (pl2.checked) {
                    pl3.disabled = true;
                } else {
                    pl3.disabled = false;
                }
            })
            pl1.addEventListener('click', function () {
                if (pl1.checked) {
                    pl3.disabled = false;
                } else {
                    pl3.disabled = true;
                }
            })

            var ds1 = document.getElementById('ds1');
            var ds2 = document.getElementById('ds2');
            var ds3 = document.getElementById('ds3');
            var ds4 = document.getElementById('ds4');
            var ds5 = document.getElementById('ds5');
            var ds6 = document.getElementById('ds6');
            var ds7 = document.getElementById('ds7');
            var ds8 = document.getElementById('ds8');
            var ds9 = document.getElementById('ds9');
            var ds10 = document.getElementById('ds10');
            var ds11 = document.getElementById('ds11');
            var ds12 = document.getElementById('ds12');
            var ds13 = document.getElementById('ds13');
            var ds14 = document.getElementById('ds14');
            var ds15 = document.getElementById('ds15');

            ds13.addEventListener('click', function () {
                if (ds13.checked) {
                    ds1.disabled = true;
                    ds2.disabled = true;
                    ds3.disabled = true;
                    ds4.disabled = true;
                    ds5.disabled = true;
                    ds6.disabled = true;
                    ds7.disabled = true;
                    ds8.disabled = true;
                    ds9.disabled = true;
                    ds10.disabled = true;
                    ds11.disabled = true;
                    ds12.disabled = true;
                    ds14.disabled = true;
                    ds15.disabled = true;
                    ds1.checked = false;
                    ds2.checked = false;
                    ds3.checked = false;
                    ds4.checked = false;
                    ds5.checked = false;
                    ds6.checked = false;
                    ds7.checked = false;
                    ds8.checked = false;
                    ds9.checked = false;
                    ds10.checked = false;
                    ds11.checked = false;
                    ds12.checked = false;
                    ds14.checked = false;
                    ds15.checked = false;
                } else {
                    ds1.disabled = false;
                    ds2.disabled = false;
                    ds3.disabled = false;
                    ds4.disabled = false;
                    ds5.disabled = false;
                    ds6.disabled = false;
                    ds7.disabled = false;
                    ds8.disabled = false;
                    ds9.disabled = false;
                    ds10.disabled = false;
                    ds11.disabled = false;
                    ds12.disabled = false;
                    ds14.disabled = false;
                    ds15.disabled = true;
                }
            })

            ds14.addEventListener('click', function () {
                if (ds14.checked) {
                    ds15.disabled = false;
                } else {
                    ds15.disabled = true;
                }
            })

            var e1 = document.getElementById('e1');
            var e2 = document.getElementById('e2');
            var e3 = document.getElementById('e3');
            var e4 = document.getElementById('e4');
            var e5 = document.getElementById('e5');
            var e6 = document.getElementById('e6');
            var e7 = document.getElementById('e7');
            var e8 = document.getElementById('e8');
            var e9 = document.getElementById('e9');
            var e10 = document.getElementById('e10');
            var e11 = document.getElementById('e11');
            var e12 = document.getElementById('e12');
            var e13 = document.getElementById('e13');
            var e14 = document.getElementById('e14');

            e12.addEventListener('click', function () {
                if (e12.checked) {
                    e1.disabled = true;
                    e2.disabled = true;
                    e3.disabled = true;
                    e4.disabled = true;
                    e5.disabled = true;
                    e6.disabled = true;
                    e7.disabled = true;
                    e8.disabled = true;
                    e9.disabled = true;
                    e10.disabled = true;
                    e11.disabled = true;
                    e13.disabled = true;
                    e14.disabled = true;
                    e1.checked = false;
                    e2.checked = false;
                    e3.checked = false;
                    e4.checked = false;
                    e5.checked = false;
                    e6.checked = false;
                    e7.checked = false;
                    e8.checked = false;
                    e9.checked = false;
                    e10.checked = false;
                    e11.checked = false;
                    e13.checked = false;
                    e14.checked = false;
                } else {
                    e1.disabled = false;
                    e2.disabled = false;
                    e3.disabled = false;
                    e4.disabled = false;
                    e5.disabled = false;
                    e6.disabled = false;
                    e7.disabled = false;
                    e8.disabled = false;
                    e9.disabled = false;
                    e10.disabled = false;
                    e11.disabled = false;
                    e13.disabled = false;
                    e14.disabled = true;
                }
            })
            e13.addEventListener('click', function () {
                if (e13.checked) {
                    e14.disabled = false;
                } else {
                    e14.disabled = true;
                }
            })

            var t1 = document.getElementById('t1');
            var t2 = document.getElementById('t2');
            var t3 = document.getElementById('t3');

            t2.addEventListener('click', function () {
                if (t2.checked) {
                    t3.disabled = true;
                }
            })
            t1.addEventListener('click', function () {
                if (t1.checked) {
                    t3.disabled = false;
                }
            })

            var m1 = document.getElementById('m1');
            var m2 = document.getElementById('m2');
            var m3 = document.getElementById('m3');

            m2.addEventListener('click', function () {
                if (m2.checked) {
                    m3.disabled = true;
                }
            })
            m1.addEventListener('click', function () {
                if (m1.checked) {
                    m3.disabled = false;
                }
            })

            var al1 = document.getElementById('al1');
            var al2 = document.getElementById('al2');
            var al3 = document.getElementById('al3');
            var al4 = document.getElementById('al4');
            var al5 = document.getElementById('al5');

            al4.addEventListener('click', function () {
                if (al4.checked) {
                    al5.disabled = false;
                }
            })

            var p1 = document.getElementById('p1');
            var p2 = document.getElementById('p2');
            var p3 = document.getElementById('p3');
            var p4 = document.getElementById('p4');
            var p5 = document.getElementById('p5');
            var p6 = document.getElementById('p6');
            var p7 = document.getElementById('p7');
            var p8 = document.getElementById('p8');

            p6.addEventListener('click', function () {
                if (p6.checked) {
                    p1.disabled = true;
                    p2.disabled = true;
                    p3.disabled = true;
                    p4.disabled = true;
                    p5.disabled = true;
                    p7.disabled = true;
                    p8.disabled = true;
                    p1.checked = false;
                    p2.checked = false;
                    p3.checked = false;
                    p4.checked = false;
                    p5.checked = false;
                    p7.checked = false;
                    p8.checked = false;
                } else {
                    p1.disabled = false;
                    p2.disabled = false;
                    p3.disabled = false;
                    p4.disabled = false;
                    p5.disabled = false;
                    p7.disabled = false;
                }
            })
            p7.addEventListener('click', function () {
                if (p7.checked) {
                    p8.disabled = false;
                } else {
                    p8.disabled = true;
                }
            })

            var r1 = document.getElementById('r1');
            var r2 = document.getElementById('r2');
            var r3 = document.getElementById('r3');
            r2.addEventListener('click', function () {
                if (r2.checked) {
                    r3.disabled = true;
                }
            })
            r1.addEventListener('click', function () {
                if (r1.checked) {
                    r3.disabled = false;
                }
            })

            var ev1 = document.getElementById('ev1');
            var ev2 = document.getElementById('ev2');
            var ev3 = document.getElementById('ev3');

            ev2.addEventListener('click', function () {
                if (ev2.checked) {
                    ev3.disabled = false;
                }
            })
            ev1.addEventListener('click', function () {
                if (ev1.checked) {
                    ev3.disabled = true;
                }
            })

            var ap1 = document.getElementById('ap1');
            var ap2 = document.getElementById('ap2');
            var ap3 = document.getElementById('ap3');
            var ap4 = document.getElementById('ap4');
            var ap5 = document.getElementById('ap5');
            var ap6 = document.getElementById('ap6');
            var ap7 = document.getElementById('ap7');
            var ap8 = document.getElementById('ap8');
            var ap9 = document.getElementById('ap9');
            var ap10 = document.getElementById('ap10');

            ap8.addEventListener('click', function () {
                if (ap8.checked) {
                    ap1.disabled = true;
                    ap2.disabled = true;
                    ap3.disabled = true;
                    ap4.disabled = true;
                    ap5.disabled = true;
                    ap6.disabled = true;
                    ap7.disabled = true;
                    ap9.disabled = true;
                } else {
                    ap1.disabled = false;
                    ap2.disabled = false;
                    ap3.disabled = false;
                    ap4.disabled = false;
                    ap5.disabled = false;
                    ap6.disabled = false;
                    ap7.disabled = false;
                    ap9.disabled = false;
                }
            })
            ap9.addEventListener('click', function () {
                if (ap9.checked) {
                    ap10.disabled = false;
                } else {
                    ap10.disabled = true;
                }
            })


            const h1 = document.getElementById('h1');
            function humor() {
                var selectH = document.getElementById('humor').value;
                if (selectH == 10) {
                    h1.disabled = false;
                } else {
                    h1.disabled = true;
                }
            }

            const vM1 = document.getElementById('vM1');
            function vaMal() {
                var selectM = document.getElementById('vaMal').value;
                if (selectM == 4) {
                    vM1.disabled = false;
                } else {
                    vM1.disabled = true;
                }
            }

            const vB1 = document.getElementById('vB1');
            function vaBien() {
                var selectB = document.getElementById('vaBien').value;
                if (selectB == 8) {
                    vB1.disabled = false;
                } else {
                    vB1.disabled = true;
                }
            }

            $(document).ready(function () {
                $('#humor').change(function () {
                    humor();
                });
                $('#vaMal').change(function () {
                    vaMal();
                });
                $('#vaBien').change(function () {
                    vaBien();
                })
            });

        </script>
        <script>
            $(function () {
                $("input#rut_b").rut({
                    formatOn: 'keyup',
                    minimumLength: 8, // validar largo mínimo; default: 2
                    validateOn: 'change' // si no se quiere validar, pasar null
                });

                var input = document.getElementById('rut_b');
                input.addEventListener('input', function () {
                    if (this.value.length >= 13)
                        this.value = this.value.slice(0, 12);
                })
            })
        </script>
    </body>
</html>
