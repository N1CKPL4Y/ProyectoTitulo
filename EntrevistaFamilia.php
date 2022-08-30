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
        <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
        <link rel="stylesheet" href="Materialize/css/styleSideBar.css">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="sidebar ">
            <div class="logo-details">
                <div class="logo_name">Fundación Inclusiva</div>
                <i class='bx bx-menu' id="btn" ></i>        
            </div>
            <ul class="nav-list">
                <li>
                    <a href="MenuSecretaria.php">
                        <i class='bx bx-user' ></i>
                        <span class="links_name">Ingreso usuarios</span>
                    </a>
                    <span class="tooltip">Ingreso usuarios</span>
                </li>
                <li>
                    <a href="EntrevistaFamilia.php">
                        <i class='bx bx-folder' ></i>
                        <span class="links_name">Registrar Entrevista</span>
                    </a>
                    <span class="tooltip">Registrar Entrevista</span>
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
                        <a href="controller/controllerLogout.php"><i class='bx bx-log-out' id="log_out"></i></a>
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
                            <h4 style="padding-top: 10px; padding-left: 10px;">Registro de entrevistas</h4>
                            <div class="row">
                                <form method="post">
                                    <div class="col s6">
                                        <div class="row">
                                            <div class="col s6">
                                                <div class="input-field col s12">
                                                    <input id="rut_b" type="text" name="txt_rutB" class="validate">
                                                    <label class="active" for="rut_b">R.U.T del beneficiario</label>
                                                </div>
                                            </div>
                                            <div class="col s5">
                                                <div class="input-field col s12">
                                                    <button class="btn waves-effect light-green darken-3" type="submit" name="buscar">Buscar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php
                            if (isset($_POST['buscar'])) {
                                echo '
                                    '
                                ?>
                                <div class="row">
                                    <div class="col s6">
                                        <h5 class="col s10">Datos del beneficiario:</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="rut_b1" type="text" name="txt_rutB1" class="validate" readonly="true">
                                            <label class="active" for="rut_b1">R.U.T del beneficiario</label>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="nombre1" type="text" name="txt_n1" class="validate" readonly="true">
                                            <label class="active" for="nombre1">Nombres del beneficiario</label>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="apellido1" type="text" name="txt_a1" class="validate" readonly="true">
                                            <label class="active" for="apellido1">Apellidos del beneficiario</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input placeholder="-- Fecha Nacimiento: --" name="txt_nac" type="text" class="datepicker" id="datepicker" required readonly="true">
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <div class="input-field col s10">
                                            <input id="direccion1" type="text" name="txt_dire" class="validate" readonly="true">
                                            <label class="active" for="direccion1">Dirección del beneficiario</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <div class="input-field col s10">
                                            <input id="cDis" type="text" name="txt_cDis" class="validate" readonly="true">
                                            <label class="active" for="cDis">¿Cuenta con Credencial de discapacidad?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <h5 class="col s10">Datos del tutor:</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="rut_tutor" type="text" name="txt_rutTutor" class="validate" readonly="true">
                                            <label class="active" for="rut_tutor">R.U.T del tutor</label>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="nombreT" type="text" name="txt_nT" class="validate" readonly="true">
                                            <label class="active" for="nombreT">Nombres del tutor</label>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="apellidoT" type="text" name="txt_aT" class="validate" readonly="true">
                                            <label class="active" for="apellidoT">Apellidos del tutor</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="telefonoT" type="text" name="txt_telefonoT" class="validate" readonly="true">
                                            <label class="active" for="telefonoT">telefono del tutor</label>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s11">
                                            <input id="emailT" type="text" name="txt_emailT" class="validate" readonly="true">
                                            <label class="active" for="emailT">correo electronico del tutor</label>
                                        </div>
                                    </div>
                                </div>
                                <form>
                                    <ul class="collapsible">
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Antecedentes relativos al desarrollo y a la salud del/la estudiante</div>
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿El o la estudiante tiene algun diagnostico previo?</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="hogares" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="hogares" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="diagnostico" type="text" name="txt_diagnostico" class="validate">
                                                            <label class="active" for="diagnostico">Indique el diagnostico del o la estudiante:</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿Que especialistas lo han evaluado?</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Pediatra</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Kinesiologa</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Genético</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Fonoaudiología</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Neurologia</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Psicología</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Psiquiatría</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Psicopedagogía</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Terapia Ocupacional</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguno de los anteriores</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro: </span>
                                                            </label>
                                                        </p>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <input id="otroE" type="text" name="txt_otroE" class="validate">
                                                                <label class="active" for="otroE">Indique el tipo de especialista</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Antecedentes del embarazo</div>
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿El embarazo fue controlado?</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="embarazo1" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="embarazo1" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="embarazo" type="text" name="txt_embarazo" class="validate">
                                                            <label class="active" for="embarazo">¿Quien realizó los controles? ¿Cada cuanto?</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿Consumió medicamentos, drogas y/o alcohol durante el embarazo?</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="embarazo" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="embarazo" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="medicamentos" type="text" name="txt_medicamentos" class="validate">
                                                            <label class="active" for="medicamentos">Indique el tipo de medicamentos, drogas y/o alcohol consumió</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿Existieron complicaciones durante el embarazo?</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="complicaciones" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="complicaciones" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="complicaciones" type="text" name="txt_complicaciones" class="validate">
                                                            <label class="active" for="complicaciones">Indique el tipo de complicaciones durante el embarazo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Antecedentes del parto</div>
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="semanas" type="text" name="txt_semanas" class="validate">
                                                            <label class="active" for="semanas">¿Cuantas semanas de embarazo tuvo?</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Tipo de parto:</h6>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="tipo" type="radio"/>
                                                                    <span>Normal</span>
                                                                </label>
                                                            </p>    
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="tipo" type="radio"/>
                                                                    <span>Inducido</span>
                                                                </label>
                                                            </p>   
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="3" name="tipo" type="radio"/>
                                                                    <span>Fórceps</span>
                                                                </label>
                                                            </p>   
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s6">
                                                                <label>
                                                                    <input class="with-gap" value="4" name="tipo" type="radio"/>
                                                                    <span>Cesárea (señalar motivo)</span>
                                                                </label>
                                                            </p>   
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="motivo" type="text" name="txt_motivo" class="validate">
                                                            <label class="active" for="motivo">Motivo de la cesárea</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿Tuvo asistencia medica durante el parto?</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="asistencia" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
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
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="peso" type="text" name="txt_peso" class="validate">
                                                            <label class="active" for="peso" style="font-size: 12px">Peso al nacer en gramos (Esta informacion puede encontrarse en carnet control sano)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="talla" type="text" name="txt_talla" class="validate">
                                                            <label class="active" for="talla" style="font-size: 12px">Talla al nacer en Cm (Esta informacion puede encontrarse en carnet control sano)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="apgar1" type="text" name="txt_apgar1" class="validate">
                                                            <label class="active" for="apgar1" style="font-size: 12px">A.P.G.A.R al minuto (Esta informacion puede encontrarse en carnet control sano)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="apgar2" type="text" name="txt_apgar2" class="validate">
                                                            <label class="active" for="apgar2" style="font-size: 12px">A.P.G.A.R a los 5 minutos (Esta informacion puede encontrarse en carnet control sano)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿Quedó hospitalizado al nacer?</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="hospitalizado" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="hospitalizado" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="hospitalizado" type="text" name="txt_hospitalizado" class="validate">
                                                            <label class="active" for="hospitalizado" style="font-size: 12px">¿Cual es el motivo por el que quedó hospitalizado al nacer? ¿Cuanto tiempo?</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Señale si antes de que cumpliera un año de vida el niño/a presentó (Marque las que correspondan)</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Desnutrición</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Obesidad</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Fiebre alta</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Convulciones</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Traumatismos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Intoxicación</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Enfermedades Respiratorias</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Asma</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Encefalitis</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Meningitis</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Hospitalizaciones</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguno de los anteriores</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <input id="otro" type="text" name="txt_otro" class="validate">
                                                                <label class="active" for="otro">Indique</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿Se realizaron controles periodicos de salud?</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="controles" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="controles" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s6">
                                                        <h6 class="col s12">Vacunas</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="vacunas" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="vacunas" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s10">
                                                        <div class="input-field col s12">
                                                            <input id="meses" type="text" name="txt_meses" class="validate">
                                                            <label class="active" for="meses">Observaciones de los primeros 12 meses de vida</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Lactancia</div>
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Indique el periodo de Lactancia con leche materna exclusiva</h6>
                                                        <div class="input-field col s12">
                                                            <input id="lactancia" type="text" name="txt_lactancia" class="validate">
                                                            <label class="active" for="lactancia" style="font-size: 12px">Si no hubo este tipo de lactancia, indique "No existió este tipo de lactancia"</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <h6 class="col s12">Indique el periodo de Lactancia Mixta: Leche materna y Relleno</h6>
                                                        <div class="input-field col s12">
                                                            <input id="mixto" type="text" name="txt_mixto" class="validate">
                                                            <label class="active" for="mixto" style="font-size: 12px">Si no hubo este tipo de lactancia, indique "No existió este tipo de lactancia"</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Indique el periodo de Lactancia con Relleno y Formula de leche</h6>
                                                        <div class="input-field col s12">
                                                            <input id="relleno" type="text" name="txt_relleno" class="validate">
                                                            <label class="active" for="relleno" style="font-size: 12px">Si no hubo este tipo de lactancia, indique "No existió este tipo de lactancia"</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Desarrollo Sensoriomotriz</div>
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s4">
                                                        <div class="input-field col s12">
                                                            <input id="c_cabeza" type="text" name="txt_Ccabeza" class="validate">
                                                            <label class="active" for="c_cabeza">Edad en que el niño(a) controla la cabeza</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s4">
                                                        <div class="input-field col s12">
                                                            <input id="s_solo" type="text" name="txt_Ssolo" class="validate">
                                                            <label class="active" for="s_solo">Edad en que el niño(a) se sienta solo(a)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s4">
                                                        <div class="input-field col s12">
                                                            <input id="gatear" type="text" name="txt_gatear" class="validate">
                                                            <label class="active" for="gatear">Edad en que el niño(a) comienza a Gatear</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s4">
                                                        <div class="input-field col s12">
                                                            <input id="c_apoyo" type="text" name="txt_Capoyo" class="validate">
                                                            <label class="active" for="c_apoyo">Edad en que el niño(a) camina con apoyo</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s4">
                                                        <div class="input-field col s12">
                                                            <input id="s_apoyo" type="text" name="txt_Sapoyo" class="validate">
                                                            <label class="active" for="s_apoyo">Edad en que el niño(a) camina sin apoyo</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s4">
                                                        <div class="input-field col s12">
                                                            <input id="p_palabras" type="text" name="txt_Ppalabras" class="validate">
                                                            <label class="active" for="p_palabras" style="font-size: 12px">Edad en que el niño(a) emite sus primeras palabras</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s4">
                                                        <div class="input-field col s12">
                                                            <input id="p_frases" type="text" name="txt_Pfrases" class="validate">
                                                            <label class="active" for="p_frases" style="font-size: 12px">Edad en que el niño(a) emite sus primeras frases</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s4">
                                                        <div class="input-field col s12">
                                                            <input id="v_solo" type="text" name="txt_Vsolo" class="validate">
                                                            <label class="active" for="v_solo">Edad en que el niño(a) se viste solo/a</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s4">
                                                        <h6 class="col s12">Controla Esfinter Vesical Diurno</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="EsfinterVD" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="EsfinterVD" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s4">
                                                        <h6 class="col s12">Controla Esfinter Vesical Nocturno</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="EsfinterVN" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
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
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="EsfinterAD" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="EsfinterAD" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s4">
                                                        <h6 class="col s12">Controla Esfinter Anal Nocturno</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="EsfinterAN" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
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
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="Pañales" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="Pañales" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s4">
                                                        <h6 class="col s12">¿Utiliza pañal de entrenamiento?</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="PañalE" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
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
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="asistenciaB" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="asistenciaB" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="t_asistencia" type="text" name="txt_Tasistencia" class="validate">
                                                        <label class="active" for="t_asistencia">Indique el tipo de asistencia que necesita</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input id="obs" type="text" name="txt_obs" class="validate">
                                                        <label class="active" for="obs">Observaciones</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">En su actividad motora general se aprecia:</h6>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="Amotora" type="radio"/>
                                                                    <span>Normal</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="Amotora" type="radio"/>
                                                                    <span>Activo</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="3" name="Amotora" type="radio"/>
                                                                    <span>Hiperactivo</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s2">
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
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="Tmuscular" type="radio"/>
                                                                    <span>Normal</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="Tmuscular" type="radio"/>
                                                                    <span>Hipertonico</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s2">
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
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="Ecaminar" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="Ecaminar" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s6">
                                                        <h6 class="col s12">Se cae con frecuencia:</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="Cfrecuencia" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
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
                                                        <p class="col s3">
                                                            <label>
                                                                <input class="with-gap" value="1" name="dominancia" type="radio"/>
                                                                <span>Derecha</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
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
                                                                <input type="checkbox"/>
                                                                <span>Agarrar</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ensartar</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Presionar</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Dibujar</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Realizar pinza con indice y pulgar</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Escribir</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguna de las anteriores</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s6">
                                                        <h6>En relacion con algunso signos cognitivcos el niño(a):</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Reacciona a voces o caras familiares</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Demanda objetos y compañia</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Sonrie, balbucea, grita, llora, indica o señala</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Manipula y explora objetos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Comprende prohibiciones</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Posee evidente descoordinacion ojo-mano</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguna de las anteriores</span>
                                                            </label>
                                                        </p>
                                                    </div> 
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input id="obs1" type="text" name="txt_obs1" class="validate">
                                                        <label class="active" for="obs1">Observaciones</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Vision</div>
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6>Vision (Marque las que correspondan)</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Se interesa por los estimulos visuales (Colores, formas, movimientos, etc.)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>En ocaciones tiene los ojos irritados o llorosos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Presenta dolores frecuentes de cabeza</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Se acerca o aleja demasiado los objetos a la vista (frunce el ceño)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Sigue con la vista el desplazamiento de los objetos o personas</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Presenta movimientos oculares "anormales"</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Manifiesta conductas "erroneas" (tropiezos, choques)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguna de las anteriores</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s6">
                                                        <h6>El estudiante presenta alguno de los siguientes diagnosticos</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Miopia</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Estrabismo</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Astigmatismo</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguno</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="obs1" type="text" name="txt_obs1" class="validate">
                                                            <label class="active" for="obs1">Indique otro</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿El niño/a utiliza lentes opticos?</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="vision" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
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
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6>Audición (Marcar las que correspondan)</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Se interesa por los estimulos auditivos(ruidos, voces, musica, etc)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Reacciona o reconoce voces o sonidos familiares</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Gira la cabeza cuando se le llama o ante un ruido fuerte</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Acerca los oidos a la TV, radio o fuente de sonido</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>En ocaciones se tapa o golpea los oidos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>La pronunciación oral es adecuada</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguna de las anteriores</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col s6">
                                                        <h6>El estudiante presenta alguno de los siguientes diagnosticos</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Hipoacusia Derecha</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Hipoacusia Izquierda</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Hipoacusia Bilateral</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otitis Cronicas</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguna</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="audicion" type="text" name="txt_audicion" class="validate">
                                                            <label class="active" for="audicion">Indique otro</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿El niño/a utiliza audifono?</h6>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="audicion" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="audicion" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input id="obs2" type="text" name="txt_obs2" class="validate">
                                                        <label class="active" for="obs2">Observaciones</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Desarrollo del lenguaje</div>
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">El niño(a) se comunica preferentemente en forma:</h6>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="comunicacion" type="radio"/>
                                                                    <span>Oral</span>
                                                                </label>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="comunicacion" type="radio"/>
                                                                    <span>Gestual</span>
                                                                </label>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="3" name="comunicacion" type="radio"/>
                                                                    <span>Mixto</span>
                                                                </label>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="4" name="comunicacion" type="radio"/>
                                                                    <span>Otro</span>
                                                                </label>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <input id="otroC" type="text" name="txt_otroC" class="validate">
                                                            <label class="active" for="otroC">Indique otro</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <h6>Caracteristicas del lenguaje expresivo (Marque las que correspondan)</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Balbucea (oral o señas) / emite sonidos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Vocaliza/realiza gestos o señas aisladas</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Emite palabras/produce señas</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Emite/produce frases</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Relata experiencias</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>La emision/pronunciacion/produccion es clara</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Opcion 8 emite palabras sueltas</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguna</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="otroL" type="text" name="txt_otroL" class="validate">
                                                            <label class="active" for="otroL">Indique otro</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6>Caracteristicas del lenguaje comprensivo (Marque las que correspondan)</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Identifica objetos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Identifica personas</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Comprende conceptos abstractos (Amistad, Culpa, Cariño, etc)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Responde en forma coherente preguntas de la vida diaria</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Sigue instrucciones simples (traeme un auto, sientate, etc)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Sigue instrucciones complejas (ven y sientate, ve a tu pieza y traeme tus zapatos)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Sigue instrucciones grupales (niños siéntense, tome su mochila, etc)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Comprende relatos, noticias, cuentos cortos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguna</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="otroL1" type="text" name="txt_otroL1" class="validate">
                                                            <label class="active" for="otroL1">Indique otro</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Manifestó perdida de lenguaje oral</h6>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="Plenguaje" type="radio"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="Plenguaje" type="radio"/>
                                                                    <span>No</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s10">
                                                        <div class="input-field col s12">
                                                            <input id="perdidaL" type="text" name="txt_perdidaL" class="validate">
                                                            <label class="active" for="perdidaL">Especifique edad y motivo de la pérdida de lenguaje oral</label>
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="row">
                                                    <div class="col s10">
                                                        <div class="input-field col s12">
                                                            <input id="obs3" type="text" name="txt_obs3" class="validate">
                                                            <label class="active" for="obs3">Observaciones</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Desarrollo Social</div>
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Desarrollo Social (Marque las que correspondan)</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Se relaciona espontáneamente con las personas de su entorno natural</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Explica razones de sus comportamientos y actitudes</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Participa en actividades grupales</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Opta por trabajo individual</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Presenta lenguaje ecolálico</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Exhibe dificultad para adaptarse a situaciones nuevas</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Se relaciona en forma colaborativa</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Respeta normas sociales</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Respeta normas escolares</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Muestra sentido del humor</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Movimientos estereotipados</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Pataletas frecuentes</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguno</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="otroS" type="text" name="txt_otroS" class="validate">
                                                            <label class="active" for="otroS">Indique otro</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Cuando se prende una luz, reacciona de forma...</h6>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="reaccion" type="radio"/>
                                                                    <span>Natural</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s2">
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
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="reaccion1" type="radio"/>
                                                                    <span>Natural</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s2">
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
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="reaccion2" type="radio"/>
                                                                    <span>Natural</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s2">
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
                                                        <input id="obs4" type="text" name="txt_obs4" class="validate">
                                                        <label class="active" for="obs4">Observaciones</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Salud</div>
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Estado actual de salud del/la estudiante (Marque las que correspondan)</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Vacunas al dia</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Epilepsia</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Problemas Cardiacos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Paraplejia</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Perdida auditiva</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Perdida visual</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Trastorno Motor</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Problemas bronco-respiratorio</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Enfermedad infecto-contagiosa</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Trastorno Emocional</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Trastorno Conductual</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguno</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguno</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="otroS2" type="text" name="txt_otroS2" class="validate">
                                                            <label class="active" for="otroS2">Observaciones</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s10">
                                                        <h6 class="col s12">El o los problemas de salud reciben tratamientos</h6>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="tratamiento" type="radio"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="tratamiento" type="radio"/>
                                                                    <span>No</span>
                                                                </label>
                                                            </p>
                                                            <div class="input-field col s12">
                                                                <input id="Ttratamiento" type="text" name="txt_Ttratamiento" class="validate">
                                                                <label class="active" for="Ttratamiento">Indique el tipo de tratamiento</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s10">
                                                        <h6 class="col s12">Toma algun medicamento?</h6>
                                                        <div class="row">
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="medicamento" type="radio"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s2">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="medicamento" type="radio"/>
                                                                    <span>No</span>
                                                                </label>
                                                            </p>
                                                            <div class="input-field col s12">
                                                                <input id="medicamento1" type="text" name="txt_medicamento" class="validate">
                                                                <label class="active" for="medicamento1">Indique que medicamentos toma e indique la dosis </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">En cuanto a la alimentación (apreciación del informante)</h6>
                                                        <div class="row">
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="alimentacion" type="radio"/>
                                                                    <span>Normal</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s6">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="alimentacion" type="radio"/>
                                                                    <span>"Malo(a) para comer"</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s6">
                                                                <label>
                                                                    <input class="with-gap" value="3" name="alimentacion" type="radio"/>
                                                                    <span>"Bueno(a) para comer"</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s6">
                                                                <label>
                                                                    <input class="with-gap" value="4" name="alimentacion" type="radio"/>
                                                                    <span>Otro:</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="input-field col s12">
                                                            <input id="otroA" type="text" name="txt_otroA" class="validate">
                                                            <label class="active" for="otroA">Indique otro</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="pesoA" type="text" name="txt_pesoA" class="validate">
                                                            <label class="active" for="pesoA">Peso Actual</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="estaturaA" type="text" name="txt_estaturaA" class="validate">
                                                            <label class="active" for="estaturaA">Estatura Actual</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">En cuanto al peso (su apreciación)</h6>
                                                        <div class="row">
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="peso" type="radio"/>
                                                                    <span>Normal</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="peso" type="radio"/>
                                                                    <span>Bajo peso</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s4">
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
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="comeSolo" type="radio"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s4">
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
                                                            <input id="gustaComer" type="text" name="txt_gustaComer" class="validate">
                                                            <label class="active" for="gustaComer">¿Que alimentos le gusta comer?</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="nogustaComer" type="text" name="txt_nogustaComer" class="validate">
                                                            <label class="active" for="nogustaComer">¿Que alimentos no le gusta comer?</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">En cuanto al sueño</h6>
                                                        <div class="row">
                                                            <p class="col s5">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="dormir" type="radio"/>
                                                                    <span>Normal</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="dormir" type="radio"/>
                                                                    <span>Tranquilo</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s4">
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
                                                            <input placeholder="--Seleccionar--" type="text" class="timepicker">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Duerme...</h6>
                                                        <div class="row">
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="conQuienDuerme" type="radio"/>
                                                                    <span>Solo</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="conQuienDuerme" type="radio"/>
                                                                    <span>Acompañado</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="especificar" type="text" name="especificar" class="validate">
                                                            <label class="active" for="especificar">Especifique la respuesta anterior</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">En la noche presenta (Marque las que correspondan)</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Insomnio</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Pesadillas</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Terrores nocturnos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Sonambulismo</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Despierta de buen humor</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguna</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="otroN" type="text" name="otroN" class="validate">
                                                            <label class="active" for="otroN">Indique otro</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <h6 class="col s12">Humor/comportamiento (señale el comportamiento habitual)</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Alegre</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Jugueton/bromista</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Risueño(a)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Triste</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Serio</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Rebelde</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Apático</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Violento(a)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguna</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="otroN1" type="text" name="otroN1" class="validate">
                                                            <label class="active" for="otroN1">Indique otro</label>
                                                        </div>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <input id="obs5" type="text" name="obs5" class="validate">
                                                        <label class="active" for="obs5">Observaciones</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Antecedentes familiares</div>
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s12">
                                                        <div class="input-field col s12">
                                                            <input id="integrantes" type="text" name="integrantes" class="validate">
                                                            <label class="active" for="integrantes" style="font-size: 12px">Personas que viven con eel niño oniña y/o que son responsables de su cuidado (Escribir
                                                                nombre, parentezco, edad, escolaridad y ocupacion. Ejemplo: Juan Perez, Papa, 45, 4 medio y
                                                                obrero)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <div class="input-field col s12">
                                                            <input id="Asalud" type="text" name="Asalud" class="validate">
                                                            <label class="active" for="Asalud" style="font-size: 14px">Antecedentes de salud de la familia. (Señale aquellos antecedentes que son relevantes en
                                                                función de la entrega de apoyo que requiere el o la estudiante)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <div class="input-field col s12">
                                                            <input id="obs6" type="text" name="obs6" class="validate">
                                                            <label class="active" for="obs6" style="font-size: 14px">Observaciones</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                            Antecedentes escolares</div>
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="edadE" type="text" name="edadE" class="validate">
                                                            <label class="active" for="edadE">Edad de ingreso al sistema escolar</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿Asistió a jardin infantil?</h6>
                                                        <div class="row">
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="jardin" type="radio"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s4">
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
                                                            <input id="colegios" type="text" name="colegios" class="validate">
                                                            <label class="active" for="colegios">Nombre de todos los colegios en los que ha estado</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Modalidad de enseñanza</h6>
                                                        <div class="input-field col s12">
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
                                                            <input id="colegios1" type="text" name="colegios1" class="validate">
                                                            <label class="active" for="colegios1">Motivo de cambio del ultimo colegio</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿Ha repetido curso?</h6>
                                                        <div class="row">
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="repetir" type="radio"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="repetir" type="radio"/>
                                                                    <span>No</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col s8">
                                                        <div class="input-field col s12">
                                                            <input id="repetir" type="text" name="repetir" class="validate">
                                                            <label class="active" for="repetir">Curso y motivo por el que repitio</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Situación</h6>
                                                        <div class="input-field col s12">
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
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">¿Como evalúa usted el Desempeño Escolar de su hijo?</h6>
                                                        <div class="row">
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="descolar" type="radio"/>
                                                                    <span>Satisfactorio</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col s4">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="descolar" type="radio"/>
                                                                    <span>Insatisfactorio</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12">
                                                            <input id="motivo1" type="text" name="motivo1" class="validate">
                                                            <label class="active" for="motivo1">Si es insatisfactorio, por que motivo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Que hace cuando a su hijo(a) le va mal en el colegio</h6>
                                                        <div class="input-field col s12">
                                                            <select>
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
                                                            <input id="otro1" type="text" name="otro1" class="validate">
                                                            <label class="active" for="otro1">Indique otro</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Que hace cuando a su hijo(a) le va bien en el colegio</h6>
                                                        <div class="input-field col s12">
                                                            <select>
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
                                                            <input id="otro2" type="text" name="otro2" class="validate">
                                                            <label class="active" for="otro2">Indique otro</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Quien apoya el proceso de aprendizaje y desarrollo de su hijo</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Madre</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Padre</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Hermanos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Abuelos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Tios</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otros Familiares</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otros Profesionales</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguno</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="otro3" type="text" name="otro3" class="validate">
                                                            <label class="active" for="otro3">Indique otro</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <h6 class="col s12">Su hijo cuenta con un ambiente fisico y emocional adecuado para su aprendizaje</h6>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ambos</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Solo Fisico (espacios, materiales, ventilación, luminosidad, etc)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Solo Emocional (Tranquilidad, Comprensión, etc)</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Ninguno</span>
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <input type="checkbox"/>
                                                                <span>Otro:</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s12">
                                                            <input id="otro4" type="text" name="otro4" class="validate">
                                                            <label class="active" for="otro4">Indique otro</label>
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
                                <?php
                                '';
                            } else {
                                
                            }
                            ?>
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
            S
        </script>
    </body>
</html>
