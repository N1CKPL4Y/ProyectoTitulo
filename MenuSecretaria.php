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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="sidebar ">
            <div class="logo-details">
                <div class="logo_name">Fundacion Ave Fenix</div>
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
        <section class="home-section">
            <nav>
                <div class="nav-wrapper" style="background-color: #00526a">
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s10 offset-s1">
                        <div class="card" style="border-radius: 10px">
                            <h4 style="padding-top: 10px; padding-left: 10px">Ingresar nuevo Beneficiario</h4>
                            <div class="row">
                                <form method="post" action="controller/controllerIngreso.php" enctype="multipart/form-data">
                                    <div class="col s12">
                                        <ul class="collapsible">
                                            <li>
                                                <div class="collapsible-header">Datos Generales</div>
                                                <div class="collapsible-body">
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="motivo" type="text" name="txt_motivo" class="validate">
                                                            <label class="active" for="motivo">Motivo de acercamiento</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input id="derivacion" type="text" name="txt_derivacion" class="validate">
                                                            <label class="active" for="derivacion">Derivación</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Seleccione el tipo de atencion:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s5">
                                                            <label>
                                                                <input class="with-gap" value="1" name="t_atencion" type="radio"/>
                                                                <span>Atención por beneficio (Programas sociales previo evaluación social)</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s5">
                                                            <label>
                                                                <input class="with-gap" value="2" name="t_atencion" type="radio"/>
                                                                <span>Atención por programa pagado (Costo minimo asociado)</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header">Datos del beneficiario</div>
                                                <div class="collapsible-body">
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="nombre" type="text" name="txt_nombre" class="validate">
                                                            <label class="active" for="nombre">Nombres Beneficiario</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input id="apellido" type="text" name="txt_apellido" class="validate">
                                                            <label class="active" for="apellido">Apellidos Beneficiario</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="rut" type="text" name="txt_rut" class="validate">
                                                            <label class="active" for="rut">R.U.T Beneficiario</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input placeholder="-- Fecha Nacimiento: --" name="txt_Fnac" type="text" class="datepicker" id="datepicker" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <select name="cbo_genero">
                                                                <option value="" disabled selected>Genero</option>
                                                                <option value="1">Masculino</option>
                                                                <option value="2">Femenino</option>
                                                                <option value="3">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input id="direccion" type="text" name="txt_direccion" class="validate">
                                                            <label class="active" for="direccion">Direccion</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="comuna" type="text" name="txt_comuna" class="validate">
                                                            <label class="active" for="comuna">Comuna</label>
                                                        </div>
                                                        <div class="file-field input-field col s6">
                                                            <div class="btn">
                                                                <span style="font-size: 10px">Ingrese copia del carnet</span>
                                                                <input type="file" name="file_carnet">
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header">Diagnostico del beneficiario</div>
                                                <div class="collapsible-body">
                                                    <div class="row">
                                                        <h6 class="col s5">¿El beneficiario presenta algun diagnostico?</h6>
                                                        <h6 class="col s5">¿Cual es el diagnostico que presenta el beneficiario?</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="diagnostico" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s3">
                                                            <label>
                                                                <input class="with-gap" value="2" name="diagnostico" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                        <div class="input-field col s6">
                                                            <select name="cbo_condicion">
                                                                <option value="" disabled selected>Seleccione</option>
                                                                <option value="1">TEA</option>
                                                                <option value="2">TDA</option>
                                                                <option value="3">TDAH</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Indique el especialista que emite el diagnostico</h6>
                                                        <h6 class="col s5">Indique fecha del ultimo control con el especialista</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s5">
                                                            <select name="cbo_especialista">
                                                                <option value="" disabled selected>Seleccione</option>
                                                                <option value="1">Neurologo</option>
                                                                <option value="2">Psicologo</option>
                                                                <option value="3">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input placeholder="-- Seleccione: --" name="txt_control" type="text" class="datepicker" id="datepicker" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="file-field input-field col s8">
                                                            <div class="btn">
                                                                <span>Copia informe ultimo control</span>
                                                                <input type="file" name="file_control">
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header">Datos del tutor</div>
                                                <div class="collapsible-body">
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s12">
                                                                <input id="tutor" type="text" name="txt_ntutor" class="validate">
                                                                <label class="active" for="tutor">Nombre completo del tutor</label>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s4">
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
                                                                <input id="rutT" type="text" name="txt_rtutor" class="validate">
                                                                <label class="active" for="rutT">R.U.T del tutor</label>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="file-field input-field col s10">
                                                                <div class="btn">
                                                                    <span>Copia carnet</span>
                                                                    <input type="file" name="file_tutor">
                                                                </div>
                                                                <div class="file-path-wrapper">
                                                                    <input class="file-path validate" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s8">
                                                                <input placeholder="-- Fecha Nacimiento tutor: --" name="txt_nacTutor" type="text" class="datepicker" id="datepicker" required>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s4">
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
                                                                <input id="ocupacion" type="text" name="txt_ocupacion" class="validate">
                                                                <label class="active" for="ocupacion">Indique la ocupacion</label>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s8">
                                                                <input id="telefono" type="text" name="txt_telefono" class="validate">
                                                                <label class="active" for="telefono">Indique el telefono del tutor</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s5">
                                                            <input id="correo" type="text" name="txt_correo" class="validate">
                                                            <label class="active" for="correo">Indique el correo del tutor</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s6">¿El tutor vive con el beneficiario?</h6>

                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="direccTutor" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s3">
                                                            <label>
                                                                <input class="with-gap" value="0" name="direccTutor" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s10">
                                                                <input id="direccionT" type="text" name="txt_direTutor" class="validate">
                                                                <label class="active" for="direccionT">Indique la direccion del tutor</label>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s6">
                                                                <input id="direccionT" type="text" name="txt_comuTutor" class="validate">
                                                                <label class="active" for="direccionT">Comuna</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Indique el sistema de salud</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s5">
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
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="rd_teleton" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="0" name="rd_teleton" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="teleton" type="text" name="txt_Nteleton" class="validate">
                                                            <label class="active" for="teleton">Numero de registro Teleton</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header">Datos de credencial de discapacidad</div>
                                                <div class="collapsible-body">
                                                    <div class="row">
                                                        <h6 class="col s5">Cuenta con credencial de discapacidad?:</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="discapacidad" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="0" name="discapacidad" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>

                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s4">
                                                            <input id="discapacidad" type="text" name="txt_credencial" class="validate">
                                                            <label class="active" for="discapacidad">Numero de credencial de discapacidad</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <div class="input-field col s8">
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
                                                            <div class="input-field col s8">
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
                                                                <input id="porcentaje_d" type="text" name="txt_porcentaje_d" class="validate">
                                                                <label class="active" for="porcentaje_d">Porcentaje de discapacidad</label>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <div class="input-field col s8">
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
                                                            <div class="input-field col s8">
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
                                                                <div class="btn">
                                                                    <span>Seleccionar</span>
                                                                    <input type="file" name="file_credenFront">
                                                                </div>
                                                                <div class="file-path-wrapper">
                                                                    <input class="file-path validate" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col s6">
                                                            <h6 class="col s9">C. Discapacidad (Parte Trasera)</h6>
                                                            <div class="file-field input-field col s12">
                                                                <div class="btn">
                                                                    <span>Seleccionar</span>
                                                                    <input type="file" name="file_credenBack">
                                                                </div>
                                                                <div class="file-path-wrapper">
                                                                    <input class="file-path validate" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header">Pensiones</div>
                                                <div class="collapsible-body">
                                                    <div class="row">
                                                        <h6 class="col s5">¿Es beneficiario de alguna pension?</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="pension" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="0" name="pension" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Pension basica solidaria de invalidez</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="pension1" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="0" name="pension1" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="pension1" type="radio"/>
                                                                <span>En tramite</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Subsidio a la discapacidad mental</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="pension2" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="0" name="pension2" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="pension2" type="radio"/>
                                                                <span>En tramite</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Pensión de sobrevivencia</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="pension3" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="0" name="pension3" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="pension3" type="radio"/>
                                                                <span>En tramite</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col s5">Asignación Duplo</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="pension4" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="0" name="pension4" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="2" name="pension4" type="radio"/>
                                                                <span>En tramite</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="otroP" type="text" name="txt_otroP" class="validate">
                                                            <label class="active" for="otroP">Otro tipo de pension</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header">Beneficios Sociales</div>
                                                <div class="collapsible-body">
                                                    <div class="row">
                                                        <h6 class="col s6">Pertenece a Chile solidario?</h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="csolidario" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
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
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="1" name="hogares" type="radio"/>
                                                                <span>Si</span>
                                                            </label>
                                                        </p>
                                                        <p class="col s2">
                                                            <label>
                                                                <input class="with-gap" value="0" name="hogares" type="radio"/>
                                                                <span>No</span>
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="porcentajeH" type="text" name="txt_porcentajeF" class="validate">
                                                            <label class="active" for="porcentajeF">Porcentaje en registro social de hogares</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="file-field input-field col s8">
                                                            <div class="btn">
                                                                <span>Fotografia del registro</span>
                                                                <input type="file" name="file_Hogar">
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="row">
                                            <div class="col s12 center">
                                                <button class="btn waves-effect waves-light boton" type="submit" name="action" style="margin-bottom: 10px">Ingresar Usuario
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
    </body>
</html>