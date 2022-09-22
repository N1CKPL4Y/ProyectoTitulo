<?php
error_reporting(E_NOTICE ^ E_ALL);

include_once 'DB/Model_Data.php';
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
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
    <head>
        <title>Menú Secretaria</title>
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
        <script src="js/validarut.js"></script>
        <script src="js/jquery.rut.js"></script>
    </head>
    <body>
        <div class="sidebar open">
            <div class="logo-details">
                <a href="#"><div class="logo_name" style="font-size: 19px">Fundación Inclusiva</div></a>
                <i class='bx bx-menu' id="btn" ></i>        
            </div>
            <ul class="nav-list">
                <li>
                    <a href="Secretaria/EntrevistaFamilia.php">
                        <i class='bx bx-folder' ></i>
                        <span class="links_name">Registrar Entrevista</span>
                    </a>
                    <span class="tooltip">Registrar Entrevista</span>
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
                            <h4 style="padding-top: 10px; padding-left: 10px" class="center">Ingresar nuevo Beneficiario</h4>
                            <div class="row">
                                <form method="post" action="controller/controllerIngreso.php" enctype="multipart/form-data">
                                    <div class="col s12">
                                        <ul class="collapsible">
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                                    Datos Generales</div>
                                                <div class="collapsible-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="motivo" type="text" name="txt_motivo" class="validate" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="motivo">Motivo de acercamiento</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input id="derivacion" type="text" name="txt_derivacion" class="validate" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="derivacion">Derivación</label>
                                                        </div>
                                                    </div>  
                                                    <div class="row">
                                                        <h6 class="col s5">Seleccione el tipo de atencion:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s5" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="t_atencion" type="radio" />
                                                                <span>Atención por beneficio (Programas sociales previo evaluación social)</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s5" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="0" name="t_atencion" type="radio"/>
                                                                <span>Atención por programa pagado (Costo minimo asociado)</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                                    Datos del beneficiario</div>
                                                <div class="collapsible-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="nombre" type="text" name="txt_nombre" class="validate" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="nombre">Nombres Beneficiario</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input id="apellido" type="text" name="txt_apellido" class="validate" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="apellido">Apellidos Beneficiario</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="rut" type="text" name="txt_rut" class="validate" style="background-color: white; border-radius: 10px" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)">
                                                            <label class="active" for="rut">R.U.T Beneficiario</label>
                                                            <span style="color: grey">Si el R.U.T termina con K, reemplacelo con un 0</span>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input placeholder="-- Fecha Nacimiento: --" name="txt_Fnac" type="text" class="datepicker" id="datepicker" required style="background-color: white; border-radius: 10px">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6" style="background-color: white; border-radius: 10px">
                                                            <select name="cbo_genero">
                                                                <option value="" disabled selected>Genero</option>
                                                                <option value="1">Masculino</option>
                                                                <option value="2">Femenino</option>
                                                                <option value="3">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input id="direccion" type="text" name="txt_direccion" class="validate" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="direccion">Direccion</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="comuna" type="text" name="txt_comuna" class="validate" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="comuna">Comuna</label>
                                                        </div>
                                                        <div class="file-field input-field col s6" >
                                                            <div class="btn light-green darken-3">
                                                                <span style="font-size: 10px">Ingrese copia del carnet</span>
                                                                <input type="file" name="file_carnet" accept="image/*">
                                                            </div>
                                                            <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                            <span style="color: grey">Debe ser en formato Imagen</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="row">
                                                                <h6 class="col s8">Participa en instituto Teleton:</h6>
                                                            </div>
                                                            <br>
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap teleton" value="1" name="rd_teleton" type="radio"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap teleton" value="0" name="rd_teleton" type="radio"/>
                                                                    <span>No</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="col s6">
                                                            <h6 class="col s10">Indique el sistema de salud</h6>
                                                            <div class="input-field col s10" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_prevision1">
                                                                    <option value="" disabled selected>Fonasa</option>
                                                                    <option value="1">Fonasa A</option>
                                                                    <option value="2">Fonasa B</option>
                                                                    <option value="3">Fonasa C</option>
                                                                    <option value="4">Fonasa D</option>
                                                                    <option value="5">Isapre</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row tele">
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                                    Diagnostico del beneficiario</div>
                                                <div class="collapsible-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <h6 class="col s10">¿El beneficiario presenta algun diagnostico?</h6>
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap diagnostico" value="1" name="diagnostico" type="radio"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap diagnostico" value="0" name="diagnostico" type="radio"/>
                                                                    <span>No</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="col s6">
                                                            <h6 class="col s10">¿Cual es el diagnostico que presenta el beneficiario?</h6>
                                                            <div class="col s12" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_condicion">
                                                                    <option value="0" id="options">Seleccione</option>
                                                                    <?php
                                                                    $condiciones = $data->getAllCondition();

                                                                    foreach ($condiciones as $key) {
                                                                        echo '<option value="' . $key['ID'] . '" id="options">' . $key['nombre'] . '</option>';
                                                                    }
                                                                    ?>
                                                                    <option value="7" id="options">No posee un diagnostico</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <h6 class="col s10">Indique el especialista que emite el diagnostico</h6>
                                                            <div class="input-field col s10" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_especialista" class="condicion">
                                                                    <option value="" disabled selected>Seleccione</option>
                                                                    <?php
                                                                    $especialista = $data->getAllEspecialista();

                                                                    foreach ($especialista as $key) {
                                                                        echo '<option value="' . $key['ID'] . '" id="options">' . $key['nombre'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <h6 class="col s10">Indique fecha del ultimo control con el especialista</h6>
                                                            <div class="input-field col s12" style="background-color: white; border-radius: 10px">
                                                                <input placeholder="-- Seleccione: --" name="txt_control" type="text" class="datepicker diag" id="datepicker1" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="file-field input-field col s8">
                                                            <div class="btn light-green darken-3">
                                                                <span>Copia informe ultimo control</span>
                                                                <input type="file" class="diag" name="file_control" accept="application/pdf">
                                                            </div>
                                                            <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                <input class="file-path validate diag" type="text">
                                                            </div>
                                                            <span style="color: grey">Debe ser en formato PDF</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                                    Datos del tutor</div>
                                                <div class="collapsible-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s12">
                                                                <input id="tutor" type="text" name="txt_ntutor" class="validate" style="background-color: white; border-radius: 10px">
                                                                <label class="active" for="tutor">Nombre completo del tutor</label>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s4" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_parent">
                                                                    <option value="" disabled selected>Parentesco</option>
                                                                    <option value="1">Padre</option>
                                                                    <option value="2">Madre</option>
                                                                    <option value="3">Otro</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s12">
                                                                <input id="rutT" type="text" name="txt_rtutor" class="validate" style="background-color: white; border-radius: 10px" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)">
                                                                <label class="active" for="rutT">R.U.T del tutor</label>
                                                                <span style="color: grey">Si el R.U.T termina con K, reemplacelo con un 0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="file-field input-field col s10">
                                                                <div class="btn light-green darken-3">
                                                                    <span>Copia carnet</span>
                                                                    <input type="file" name="file_tutor" accept="image/*">
                                                                </div>
                                                                <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                    <input class="file-path validate" type="text">
                                                                </div>
                                                                <span style="color: grey">Debe ser en formato Imagen</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s8">
                                                                <input placeholder="-- Fecha Nacimiento tutor: --" name="txt_nacTutor" type="text" class="datepicker" id="datepicker2" required style="background-color: white; border-radius: 10px">
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s6" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_nivel">
                                                                    <option value="" disabled selected>Nivel escolar</option>
                                                                    <option value="1">basica</option>
                                                                    <option value="2">media</option>
                                                                    <option value="3">universitaria</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s10">
                                                                <input id="ocupacion" type="text" name="txt_ocupacion" class="validate" style="background-color: white; border-radius: 10px">
                                                                <label class="active" for="ocupacion">Indique la ocupacion</label>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s8">
                                                                <input id="telefono" type="text" name="txt_telefono" class="validate" style="background-color: white; border-radius: 10px">
                                                                <label class="active" for="telefono">Indique el telefono del tutor</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s5">
                                                            <input id="correo" type="text" name="txt_correo" class="validate" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="correo">Indique el correo del tutor</label>
                                                        </div>
                                                    </div>
                                                    <span id="emailVal"></span>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <h6 class="col s12">¿El tutor vive con el beneficiario?</h6>
                                                            <p class="col s2" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="direccTutor" type="radio" onclick="viveCon()"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s3" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap" value="0" name="direccTutor" type="radio" onclick="noViveCon()"/>
                                                                    <span>No</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row dirTutor">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <h6 class="col s12">Indique el sistema de salud</h6>
                                                            <div class="input-field col s10" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_prevision">
                                                                    <option value="" disabled selected>Fonasa</option>
                                                                    <option value="1">Fonasa A</option>
                                                                    <option value="2">Fonasa B</option>
                                                                    <option value="3">Fonasa C</option>
                                                                    <option value="4">Fonasa D</option>
                                                                    <option value="5">Isapre</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                                    Datos de credencial de discapacidad</div>
                                                <div class="collapsible-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="col s12 m4 l6">
                                                            <h6 class="col s12">Cuenta con credencial de discapacidad?:</h6>
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap discapacidad" value="1" name="discapacidad" type="radio"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap discapacidad" value="0" name="discapacidad" type="radio"/>
                                                                    <span>No</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="col s12 m4 l6">
                                                            <div class="col s12">
                                                                <div class="input-field col s12">
                                                                    <input id="discapacidad" type="text" name="txt_credencial" class="validate numCred" style="background-color: white; border-radius: 10px" disabled="">
                                                                    <label class="active" for="discapacidad">Numero de credencial de discapacidad</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s12 m4 l6">
                                                            <div class="input-field col s10" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_origenP" class="validate numCred">
                                                                    <option value="" disabled selected>Origen principal de discapacidad</option>
                                                                    <option value="1">Fisico</option>
                                                                    <option value="2">Sensorial Visual</option>
                                                                    <option value="3">Sensorial Auditivo</option>
                                                                    <option value="4">Mental Psiquico</option>
                                                                    <option value="5">Mental Intelectual</option>
                                                                    <option value="6">No aplica</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s10" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_origenS" class="validate numCred">
                                                                    <option value="" disabled selected>Origen Secundario de discapacidad</option>
                                                                    <option value="1">Fisico</option>
                                                                    <option value="2">Sensorial Visual</option>
                                                                    <option value="3">Sensorial Auditivo</option>
                                                                    <option value="4">Mental Psiquico</option>
                                                                    <option value="5">Mental Intelectual</option>
                                                                    <option value="6">No aplica</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s10">
                                                                <input id="porcentaje_d" type="text" name="txt_porcentaje_d" class="validate numCred" style="background-color: white; border-radius: 10px">
                                                                <label class="active" for="porcentaje_d">Porcentaje de discapacidad</label>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s10" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_grado" class="validate numCred">
                                                                    <option value="" disabled selected>Grado de discapacidad</option>
                                                                    <option value="1">Leve</option>
                                                                    <option value="2">Moderado</option>
                                                                    <option value="3">Severo</option>
                                                                    <option value="4">Profundo</option>
                                                                    <option value="5">No aplica</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <h6 class="col s12">Movilidad Reducida</h6>
                                                            <div class="input-field col s8" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_movilidad" class="validate numCred">
                                                                    <option value="0" disabled >Movilidad Reducida</option>
                                                                    <option value="1">Leve</option>
                                                                    <option value="2">Moderado</option>
                                                                    <option value="3">Severo</option>
                                                                    <option value="4">Profundo</option>
                                                                    <option value="5">No aplica</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <h6 class="col s12">C. Discapacidad (Parte delantera)</h6>
                                                            <div class="file-field input-field col s12">
                                                                <div class="btn light-green darken-3">
                                                                    <span>Seleccionar</span>
                                                                    <input type="file" name="file_credenFront" class="numCred" accept="image/*">
                                                                </div>
                                                                <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                    <input class="file-path validate numCred" type="text">
                                                                </div>
                                                                <span style="color: grey">Debe ser en formato Imagen</span>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <h6 class="col s9">C. Discapacidad (Parte Trasera)</h6>
                                                            <div class="file-field input-field col s12">
                                                                <div class="btn light-green darken-3">
                                                                    <span>Seleccionar</span>
                                                                    <input type="file" name="file_credenBack" class="numCred" accept="image/*">
                                                                </div>
                                                                <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                    <input class="file-path validate numCred" type="text">
                                                                </div>
                                                                <span style="color: grey">Debe ser en formato Imagen</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                                    Beneficios Sociales</div>
                                                <div class="collapsible-body" style="background-color: #C8E6C9">
                                                    <div class="row">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col s8">
                                                            <h6 class="col s12">¿Posee alguna pensión?</h6>
                                                            <div class="col s12 m4 l6" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_pension">
                                                                    <option value="0">Selecciona una opción</option>
                                                                    <?php
                                                                    $pens = $data->getAllPensionesAll();
                                                                    foreach ($pens as $key1) {
                                                                        echo '<option value="' . $key1['ID'] . '" >' . $key1['nombre'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s6">Pertenece a Chile solidario?</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="csolidario" type="radio"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap" value="0" name="csolidario" type="radio"/>
                                                                    <span>No</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <h6 class="col s12">Tiene registro social de hogares?</h6>
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="hogares" type="radio" onclick="tieneR()"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap" value="0" name="hogares" type="radio" onclick="noTieneR()"/>
                                                                    <span>No</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="porcentajeF" type="text" name="txt_porcentajeF" class="validate" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="porcentajeF">Porcentaje en registro social de hogares</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="file-field input-field col s8">
                                                            <div class="btn light-green darken-3">
                                                                <span>Copia del registro</span>
                                                                <input id="cR" type="file" name="file_Hogar" accept="application/pdf">
                                                            </div>
                                                            <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                            <span style="color: grey">Debe ser en formato PDF</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="row">
                                            <div class="col s12 center">
                                                <button class="btn waves-effect light-green darken-3" type="submit" name="action" style="margin-bottom: 10px">Ingresar Usuario
                                                    <i class="material-icons right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");
            let searchBtn = document.querySelector(".bx-search");
            let section = document.querySelector(".home-section");

            closeBtn.addEventListener("click", () => {
                sidebar.classList.toggle("open");
                menuBtnChange();//calling the function(optional)
                section.classList.toggle("move");
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
        </script> -->
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
        </script>
        <script>
            $(document).ready(function () {

                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });
            $(document).ready(function () {
                $('.timepicker').timepicker({
                    twelveHour: false
                });
            });
            $(function () {
                $('#datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    i18n: {
                        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                        weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles,', 'Jueves', 'Viernes', 'Sábado'],
                        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab'],
                        weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                        cancel: ['Cancelar'],
                        done: ['Aceptar']
                    }
                })
                $('#datepicker1').datepicker({
                    format: 'yyyy-mm-dd',
                    i18n: {
                        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                        weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles,', 'Jueves', 'Viernes', 'Sábado'],
                        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab'],
                        weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                        cancel: ['Cancelar'],
                        done: ['Aceptar']
                    }
                })
                $('#datepicker2').datepicker({
                    format: 'yyyy-mm-dd',
                    i18n: {
                        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                        weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles,', 'Jueves', 'Viernes', 'Sábado'],
                        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab'],
                        weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                        cancel: ['Cancelar'],
                        done: ['Aceptar']
                    }
                })
            })
        </script>
        <script type="text/javascript">
            $(function () {
                $("input#rut").rut({
                    formatOn: 'keyup',
                    minimumLength: 8, // validar largo mínimo; default: 2
                    validateOn: 'change' // si no se quiere validar, pasar null
                });

                var input = document.getElementById('rut');
                input.addEventListener('input', function () {
                    if (this.value.length >= 13)
                        this.value = this.value.slice(0, 12);
                })
            })
            $(function () {
                $("input#rutT").rut({
                    formatOn: 'keyup',
                    minimumLength: 8, // validar largo mínimo; default: 2
                    validateOn: 'change' // si no se quiere validar, pasar null
                });

                var input = document.getElementById('rutT');
                input.addEventListener('input', function () {
                    if (this.value.length >= 13)
                        this.value = this.value.slice(0, 12);
                })
            })
            document.getElementById('correo').addEventListener('input', function () {
                campo = event.target;
                valido = document.getElementById('emailVal');
                emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                //Se muestra un texto a modo de ejemplo, luego va a ser un icono

                if (emailRegex.test(campo.value)) {
                    valido.innerText = "Correo válido";
                } else {
                    valido.innerText = "Correo no válido";
                }
            }
            );
        </script>
        <script>
            function pensiones() {

                var radio = $("input[type=radio][name=pension]").filter(":checked")[0];
                var radio1 = $("input[type=radio][name=pension1]").filter(":checked")[0];
                var radio2 = $("input[type=radio][name=pension2]").filter(":checked")[0];
                var radio3 = $("input[type=radio][name=pension3]").filter(":checked")[0];
                var radio4 = $("input[type=radio][name=pension4]").filter(":checked")[0];

                //const button = document.querySelectorAll('.pension');
                const button1 = document.querySelectorAll('.pension1');
                const button2 = document.querySelectorAll('.pension2');
                const button3 = document.querySelectorAll('.pension3');
                const button4 = document.querySelectorAll('.pension4');
                const button5 = document.querySelector('.otroP');

                console.log(button5);

                if (radio.value == 1) {
                    var a = 0, b = 0, c = 0, d = 0, e = 0;
                    button1.forEach(function (document) {
                        button1[a].disabled = false;
                        a++;
                    });
                    button2.forEach(function (document) {
                        button2[b].disabled = false;
                        b++;
                    });
                    button3.forEach(function (document) {
                        button3[c].disabled = false;
                        c++;
                    });
                    button4.forEach(function (document) {
                        button4[d].disabled = false;
                        d++;
                    });

                    if (radio1.value == 0 && radio2.value == 0 && radio3.value == 0 && radio4.value == 0) {
                        button5.disabled = false;
                    } else {
                        button5.disabled = true;
                    }
                } else {
                    var a = 0, b = 0, c = 0, d = 0, e = 0;
                    button1.forEach(function (document) {
                        button1[a].disabled = true;
                        button1[1].checked = true;
                        a++;
                    });
                    button2.forEach(function (document) {
                        button2[b].disabled = true;
                        button2[1].checked = true;
                        b++;
                    });
                    button3.forEach(function (document) {
                        button3[c].disabled = true;
                        button3[1].checked = true;
                        c++;
                    });
                    button4.forEach(function (document) {
                        button4[d].disabled = true;
                        button4[1].checked = true;
                        d++;
                    });
                    button5.disabled = true;
                }
            }

            $(document).ready(function () {
                $('.pension').change(function () {
                    pensiones();
                });
                $('.pension1').change(function () {
                    pensiones();
                });
                $('.pension2').change(function () {
                    pensiones();
                });
                $('.pension3').change(function () {
                    pensiones();
                });
                $('.pension4').change(function () {
                    pensiones();
                });

                $('.discapacidad').change(function () {
                    credencial();
                });

                $('.teleton').change(function () {
                    teleton();
                });


                $('.diagnostico').change(function () {
                    diagnost();
                });
            });

            //const diag = document.querySelectorAll('#options');
            //const sec = document.querySelector('.condicion');

            const fecha = document.querySelectorAll('.diag');

            function diagnost() {
                var condi = $("input[type=radio][name=diagnostico]").filter(":checked")[0];

                if (condi.value == 1) {
                    console.log('Funca');
                    var x = 0;
                    fecha.forEach(function (document) {
                        fecha[x].disabled = false;
                        x++;
                    });
                } else {
                    console.log('No Funca');
                    var x = 0;
                    fecha.forEach(function (document) {
                        fecha[x].disabled = true;
                        x++;
                    });
                }
            }

            const n_cred = document.querySelectorAll('.numCred');

            function credencial() {
                var creden = $("input[type=radio][name=discapacidad]").filter(":checked")[0];

                if (creden.value == 1) {
                    var z = 0;
                    n_cred.forEach(function (document) {
                        n_cred[z].disabled = false;
                        z++;
                    });
                } else {
                    var s = 0;
                    n_cred.forEach(function (document) {
                        n_cred[s].disabled = true;
                        s++;
                    });
                }
            }
            ;

            const inpTele = document.querySelector('.tele');
            function teleton() {
                var radioTeleton = $("input[type=radio][name=rd_teleton]").filter(":checked")[0];

                if (radioTeleton.value == 1) {
                    inpTele.innerHTML = '<div class="input-field col s6"><input id="teleton" type="text" name="txt_Nteleton" class="validate" style="background-color: white; border-radius: 10px"><label class="active" for="teleton">Numero de registro Teleton</label></div>';
                } else {
                    inpTele.innerHTML = "";
                }
            }


            var noP = document.getElementById('noP');
            var noP1 = document.getElementById('noP1');
            var noP2 = document.getElementById('noP2');
            var noP3 = document.getElementById('noP3');
            var noP4 = document.getElementById('noP4');
            var siP = document.getElementById('siP');

            const dirTutor = document.querySelector('.dirTutor');
            //Scripts en input "vive con el beneficiario?"
            function viveCon() {
                dirTutor.innerHTML = "";
                document.getElementById('direccionT').disabled = true
                document.getElementById('comuT').disabled = true
            }
            function noViveCon() {
                dirTutor.innerHTML = "<div class='col s6'><div class='input-field col s10'><input id='direccionT' style='background-color: white; border-radius: 10px' type='text' name='txt_direTutor' class='validate'><label class='active' for='direccionT'>Indique la direccion del tutor</label></div></div><div class='col s6'><div class='input-field col s6'><input id='comuT' style='background-color: white; border-radius: 10px' type='text' name='txt_comuTutor' class='validate'><label class='active' for='comuT'>Comuna</label></div> </div>";
            }
            //Scripts en input "tiene registro social de hogares?"
            function tieneR() {
                document.getElementById('porcentajeF').disabled = false
                document.getElementById('cR').disabled = false
            }
            function noTieneR() {
                document.getElementById('porcentajeF').disabled = true
                document.getElementById('cR').disabled = true
            }
            //Scripts en input "es beneficiario de alguna pension?"

            function sip1() {
                if (siP1.checked) {
                    document.getElementById('noP2').checked = true;
                    document.getElementById('noP3').checked = true;
                    document.getElementById('noP4').checked = true;

                }
            }
            function sip2() {
                if (siP2.checked) {
                    document.getElementById('noP1').checked = true;
                    document.getElementById('noP3').checked = true;
                    document.getElementById('noP4').checked = true;

                }
            }
            function sip3() {
                if (siP3.checked) {
                    document.getElementById('noP1').checked = true;
                    document.getElementById('noP2').checked = true;
                    document.getElementById('noP4').checked = true;

                }
            }
            function sip4() {
                if (siP4.checked) {
                    document.getElementById('noP1').checked = true;
                    document.getElementById('noP2').checked = true;
                    document.getElementById('noP3').checked = true;

                }
            }
        </script>
    </body>
</html>