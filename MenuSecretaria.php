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
        <div class="sidebar ">
            <div class="logo-details">
                <div class="logo_name">Fundación Inclusiva</div>
                <i class='bx bx-menu' id="btn" ></i>        
            </div>
            <ul class="nav-list">
                <li>
                    <a href="#">
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
                        <a href="controller/controllerLogout.php"><i class='bx bx-log-out' id="log_out" ></i></a>
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
                                                                <input class="with-gap" value="2" name="t_atencion" type="radio"/>
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
                                                            <input id="rut" type="text" name="txt_rut" class="validate" style="background-color: white; border-radius: 10px" onchange="javascript:return Rut(document.datosUser.txt_rut.value)">
                                                            <label class="active" for="rut">R.U.T Beneficiario</label>
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
                                                                <input type="file" name="file_carnet">
                                                            </div>
                                                            <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                                    Diagnostico del beneficiario</div>
                                                <div class="collapsible-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <h6 class="col s5">¿El beneficiario presenta algun diagnostico?</h6>
                                                        <h6 class="col s5">¿Cual es el diagnostico que presenta el beneficiario?</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap" value="1" name="diagnostico" type="radio"/>
                                                                    <span>Si</span>
                                                                </label>
                                                            </p>
                                                            <p class="col s4" style="background-color: white; border-radius: 10px">
                                                                <label>
                                                                    <input class="with-gap" value="2" name="diagnostico" type="radio"/>
                                                                    <span>No</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s4" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_condicion">
                                                                    <option value="" disabled selected>Seleccione</option>
                                                                    <option value="1">TEA</option>
                                                                    <option value="2">TDA</option>
                                                                    <option value="3">TDAH</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Indique el especialista que emite el diagnostico</h6>
                                                        <h6 class="col s5">Indique fecha del ultimo control con el especialista</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s5" style="background-color: white; border-radius: 10px">
                                                            <select name="cbo_especialista">
                                                                <option value="" disabled selected>Seleccione</option>
                                                                <option value="1">Neurologo</option>
                                                                <option value="2">Psicologo</option>
                                                                <option value="3">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col s6" style="background-color: white; border-radius: 10px">
                                                            <input placeholder="-- Seleccione: --" name="txt_control" type="text" class="datepicker" id="datepicker" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="file-field input-field col s8">
                                                            <div class="btn light-green darken-3">
                                                                <span>Copia informe ultimo control</span>
                                                                <input type="file" name="file_control">
                                                            </div>
                                                            <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                <input class="file-path validate" type="text">
                                                            </div>
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
                                                                    <option value="" disabled selected>Parentezco</option>
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
                                                                <input id="rutT" type="text" name="txt_rtutor" class="validate" style="background-color: white; border-radius: 10px" onchange="javascript:return Rut(document.datosUser.txt_rut.value)">
                                                                <label class="active" for="rutT">R.U.T del tutor</label>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="file-field input-field col s10">
                                                                <div class="btn light-green darken-3">
                                                                    <span>Copia carnet</span>
                                                                    <input type="file" name="file_tutor">
                                                                </div>
                                                                <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                    <input class="file-path validate" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s8">
                                                                <input placeholder="-- Fecha Nacimiento tutor: --" name="txt_nacTutor" type="text" class="datepicker" id="datepicker" required style="background-color: white; border-radius: 10px">
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s4" style="background-color: white; border-radius: 10px">
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
                                                            <div class="input-field col s8">
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
                                                        <h6 class="col s6">¿El tutor vive con el beneficiario?</h6>
                                                    </div>
                                                    <div class="row">
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
                                                    <div class="row dirTutor">
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Indique el sistema de salud</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s5" style="background-color: white; border-radius: 10px">
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
                                                    <div class="row">
                                                        <h6 class="col s5">Participa en instituto Teleton:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="rd_teleton" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="0" name="rd_teleton" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="teleton" type="text" name="txt_Nteleton" class="validate" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="teleton">Numero de registro Teleton</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                                    Datos de credencial de discapacidad</div>
                                                <div class="collapsible-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <h6 class="col s5">Cuenta con credencial de discapacidad?:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="discapacidad" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="0" name="discapacidad" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>

                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s4">
                                                            <input id="discapacidad" type="text" name="txt_credencial" class="validate" style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="discapacidad">Numero de credencial de discapacidad</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s8" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_origenP">
                                                                    <option value="" disabled selected>Origen principal de discapacidad</option>
                                                                    <option value="1">Fisico</option>
                                                                    <option value="2">Sensorial Visual</option>
                                                                    <option value="3">Sensorial Auditivo</option>
                                                                    <option value="4">Mental Psiquico</option>
                                                                    <option value="5">Mental Intelectual</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s8" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_origenS">
                                                                    <option value="" disabled selected>Origen Secundario de discapacidad</option>
                                                                    <option value="1">Fisico</option>
                                                                    <option value="2">Sensorial Visual</option>
                                                                    <option value="3">Sensorial Auditivo</option>
                                                                    <option value="4">Mental Psiquico</option>
                                                                    <option value="5">Mental Intelectual</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s6">
                                                                <input id="porcentaje_d" type="text" name="txt_porcentaje_d" class="validate" style="background-color: white; border-radius: 10px">
                                                                <label class="active" for="porcentaje_d">Porcentaje de discapacidad</label>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s8" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_grado">
                                                                    <option value="" disabled selected>Grado de discapacidad</option>
                                                                    <option value="1">Leve</option>
                                                                    <option value="2">Moderado</option>
                                                                    <option value="3">Severo</option>
                                                                    <option value="4">Profundo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s4">
                                                            <div class="input-field col s8" style="background-color: white; border-radius: 10px">
                                                                <select name="cbo_movilidad">
                                                                    <option value="" disabled selected>Movilidad Reducida</option>
                                                                    <option value="1">Leve</option>
                                                                    <option value="2">Moderado</option>
                                                                    <option value="3">Severo</option>
                                                                    <option value="4">Profundo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <h6 class="col s9">C. Discapacidad (Parte delantera)</h6>
                                                            <div class="file-field input-field col s12">
                                                                <div class="btn light-green darken-3">
                                                                    <span>Seleccionar</span>
                                                                    <input type="file" name="file_credenFront">
                                                                </div>
                                                                <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                    <input class="file-path validate" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <h6 class="col s9">C. Discapacidad (Parte Trasera)</h6>
                                                            <div class="file-field input-field col s12">
                                                                <div class="btn light-green darken-3">
                                                                    <span>Seleccionar</span>
                                                                    <input type="file" name="file_credenBack">
                                                                </div>
                                                                <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                    <input class="file-path validate" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                                    Pensiones</div>
                                                <div class="collapsible-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <h6 class="col s5">¿Es beneficiario de alguna pension?</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="siP" class="with-gap pension" value="1" name="pension" type="radio" onclick="tieneP()"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="noP" class="with-gap pension" value="0" name="pension" type="radio" onclick="noTieneP()"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Pension basica solidaria de invalidez</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="siP1"class="with-gap pension1" value="1" name="pension1" type="radio" disabled onclick="sip1()"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="noP1" class="with-gap pension1" value="0" name="pension1" type="radio" disabled/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="Tp1" class="with-gap pension1" value="2" name="pension1" type="radio" disabled/>
                                                                <span>En tramite</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Subsidio a la discapacidad mental</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="siP2" class="with-gap pension2" value="1" name="pension2" type="radio" disabled onclick="sip2()"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="noP2" class="with-gap pension2" value="0" name="pension2" type="radio" disabled/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="Tp2" class="with-gap pension2" value="2" name="pension2" type="radio" disabled/>
                                                                <span>En tramite</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Pensión de sobrevivencia</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="siP3" class="with-gap pension3" value="1" name="pension3" type="radio" disabled onclick="sip3()"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="noP3" class="with-gap pension3" value="0" name="pension3" type="radio" disabled/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="Tp3" class="with-gap pension3" value="2" name="pension3" type="radio" disabled/>
                                                                <span>En tramite</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Asignación Duplo</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="siP4" class="with-gap pension4" value="1" name="pension4" type="radio" disabled onclick="sip4()"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="noP4" class="with-gap pension4" value="0" name="pension4" type="radio" disabled/> 
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input id="Tp4" class="with-gap pension4" value="2" name="pension4" type="radio" disabled/>
                                                                <span>En tramite</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="otroP" type="text" name="txt_otroP" class="validate otroP" disabled style="background-color: white; border-radius: 10px">
                                                            <label class="active" for="otroP">Otro tipo de pension</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header"><i class="material-icons" id="add" style="color: white;">add</i>
                                                    Beneficios Sociales</div>
                                                <div class="collapsible-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <h6 class="col s6">Pertenece a Chile solidario?</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="csolidario" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="0" name="csolidario" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s6">Tiene registro social de hogares?</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="1" name="hogares" type="radio" onclick="tieneR()"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2" style="background-color: white; border-radius: 10px">
                                                            <label>
                                                                <input class="with-gap" value="0" name="hogares" type="radio" onclick="noTieneR()"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
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
                                                                <span>Fotografia del registro</span>
                                                                <input id="cR" type="file" name="file_Hogar">
                                                            </div>
                                                            <div class="file-path-wrapper" style="background-color: white; border-radius: 10px">
                                                                <input class="file-path validate" type="text">
                                                            </div>
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
        <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");
            let searchBtn = document.querySelector(".bx-search");

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

                $('.discap').change(function () {
                    credencial();
                });
            });

            const n_cred = document.querySelector('.n_creden');
            const disca = document.querySelector('.disca');

            function credencial() {
                var creden = $("input[type=radio][name=discapacidad]").filter(":checked")[0];

                if (creden.value == 1) {
                    n_cred.innerHTML = '<div class="input-field col s4"><input id="discapacidad" type="text" name="txt_credencial" class="validate"><label class="active" for="discapacidad">Numero de credencial de discapacidad</label></div>';
                    disca.innerHTML = '<div class="col s6"><div class="input-field col s8"><select name="cbo_origenP"><option value="" disabled selected>Origen principal de discapacidad</option><option value="1">Fisico</option><option value="2">Sensorial Visual</option><option value="3">Sensorial Auditivo</option><option value="4">Mental Psiquico</option><option value="5">Mental Intelectual</option></select></div></div><div class="col s6"><div class="input-field col s8"><select name="cbo_origenS"><option value="" disabled selected>Origen Secundario de discapacidad</option><option value="1">Fisico</option><option value="2">Sensorial Visual</option><option value="3">Sensorial Auditivo</option><option value="4">Mental Psiquico</option><option value="5">Mental Intelectual</option></select></div></div>';
                } else {
                    n_cred.innerHTML = "";
                    disca.innerHTML = "";
                }
            }
            ;
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
                dirTutor.innerHTML = "<div class='col s6'><div class='input-field col s10'><input id='direccionT' type='text' name='txt_direTutor' class='validate'><label class='active' for='direccionT'>Indique la direccion del tutor</label></div></div><div class='col s6'><div class='input-field col s6'><input id='comuT' type='text' name='txt_comuTutor' class='validate'><label class='active' for='comuT'>Comuna</label></div> </div>";
                document.getElementById('direccionT').disabled = false
                document.getElementById('comuT').disabled = false
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