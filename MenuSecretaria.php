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
        <title>Menu Secretaria</title>
        <link rel="icon" href="IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">

        <!-- CSS only -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/validarut.js"></script>
        <script src="Materialize/datepicke.js"></script>
        <script src="js/jquery.rut.js"></script>
        <link rel="stylesheet" href="Materialize/css/styleSideBar.css">
        <link rel="stylesheet" href="Materialize/datepick.css">
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <div class="sidebar open">
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px">Fundación Inclusiva</div></a>
                <i class='bx bx-menu' id="btn" ></i>        
            </div>
            <ul class="nav-list" >
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
                    <div class="container" style="display: flex; align-items: center; justify-content: center; color: white">
                        <a style="font-size: 30px">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="IMG/iconNavbar.png"/>
                        <a style="font-size: 30px">Fenix</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row justify-content-around" style="padding-top: 25px; padding-bottom: 25px">
                    <div class="col-sm-12 col-md-10">
                        <div class="card" style="border-radius: 10px">
                            <div class="card-header" style="display: flex; align-items: center; justify-content: center;">
                                <h3 class="card-title">Registrar nuevo beneficiario</h3>
                            </div>
                            <div class="card" style="border-radius: 10px">
                                <form action="controller/controllerIngreso.php" method="post" enctype="multipart/form-data">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header Header" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button class="btn text-left btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">
                                                        <i class="bi bi-caret-down-fill Titulo">Datos Generales</i>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body Cuerpo">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="txt_motivo" style="margin-left: 10px">Motivo de acercamiento</label>
                                                                <input type="text" class="form-control" name="txt_motivo" id="motivo" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="txt_derivacion" style="margin-left: 10px">Derivación</label>
                                                                <input type="text" class="form-control" name="txt_derivacion" id="derivacion" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10 col-sm-10">
                                                            <label for="deshabilitar" id="labelDes" class="col-sm-10 col-form-label" >Seleccione el tipo de atencion:</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="t_atencion" value="1">
                                                                <label class="form-check-label" for="t_atencion">
                                                                    Atención por beneficio (Programas sociales previo evaluación social)
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="t_atencion" value="2">
                                                                <label class="form-check-label" for="t_atencion">
                                                                    Atención por programa pagado (Costo minimo asociado)
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header Header" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <button class="btn text-left btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-controls="collapseTwo">
                                                        <i class="bi bi-caret-down-fill Titulo">Datos del beneficiario</i>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body Cuerpo">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="nombre" style="margin-left: 10px">Nombres Beneficiario</label>
                                                                <input type="text" class="form-control" placeholder="Nombres" name="txt_nombre" id="nombre" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="apellido" style="margin-left: 10px">Apellidos Beneficiario</label>
                                                                <input type="text" class="form-control" placeholder="Apellidos" name="txt_apellido" id="apellido" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="rut" style="margin-left: 10px">R.U.T Beneficiario</label>
                                                                <input type="text" class="form-control" name="txt_rut" id="rut" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)">
                                                                <span style="color: grey; margin-left: 10px">Si el R.U.T termina con K, reemplacelo con un 0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group dates">
                                                                <label for="datepicker">Fecha de nacimiento</label>
                                                                <input type="text" autocomplete="off" placeholder="AAAA-MM-DD" class="form-control"  name="txt_Fnac" id="datepicker" style=" text-indent: 18px;">
                                                                <span style="color: grey">Formato Año-Mes-Dia</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tipo_user">Genero</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Genero</label>
                                                                    </div>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="cbo_genero">
                                                                        <option value="" disabled selected> -- Seleccione Genero -- </option>
                                                                        <option value="1">Masculino</option>
                                                                        <option value="2">Femenino</option>
                                                                        <option value="3">Otro</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="direccion" style="margin-left: 10px">Dirección</label>
                                                                <input type="text" class="form-control" name="txt_direccion" id="direccion" required >
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="comuna" style="margin-left: 10px">Comuna</label>
                                                                <input type="text" class="form-control" name="txt_comuna" id="comuna" required >
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <label style="margin-left: 10px"> Copia Carnet (Imagen)</label>
                                                            <div class="input-group mb-3">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="file_carnet" accept="image/jpeg" id="copiaCarnetBene" lang="es">
                                                                    <label class="custom-file-label" data-browse="Seleccionar" for="copiaCarnetBene">Seleccionar Archivo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-3 col-lg-3 align-self-start">
                                                            <label for="rd_teleton" id="labelteleton" class="col-sm-12 col-form-label" >Participa en instituto Teleton:</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input teleton" type="radio" name="rd_teleton" value="1">
                                                                <label class="form-check-label" for="rd_teleton">
                                                                    SI
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input teleton" type="radio" name="rd_teleton" value="0">
                                                                <label class="form-check-label" for="rd_teleton">
                                                                    NO
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="tele col-sm-12 col-md-3 col-lg-3 align-self-center">

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 align-self-end">
                                                            <div class="form-group">
                                                                <label for="tipo_user"></label>
                                                                <div class="input-group mb-12">
                                                                    <div class="input-group-prepend">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Sistema de salud</label>
                                                                    </div>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="cbo_prevision1">
                                                                        <option value="" disabled selected> -- Seleccione -- </option>
                                                                        <?php
                                                                        $prevision = $data->getAllPrevision();
                                                                        foreach ($prevision as $key) {
                                                                            echo '<option value="' . $key['ID'] . '" id="options">' . $key['nombre'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header Header" id="headingThree">
                                                <h2 class="mb-0">
                                                    <button class="btn text-left btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="bi bi-caret-down-fill Titulo">Diagnostico del beneficiario</i>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <label for="rd_teleton" id="labelteleton" class="col-sm-10 col-form-label" >¿El beneficiario presenta algun diagnostico?</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input diagnostico" type="radio" name="diagnostico" value="1">
                                                                <label class="form-check-label" for="diagnostico">
                                                                    SI
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input diagnostico" type="radio" name="diagnostico" value="0">
                                                                <label class="form-check-label" for="diagnostico">
                                                                    NO
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="cbo_condicion" class="col-sm-10 col-form-label">¿Cual es el diagnostico que presenta el beneficiario?</label>
                                                                <div class="input-group mb-6">
                                                                    <select class="custom-select diag" id="inputGroupSelect01" name="cbo_condicion" disabled="">
                                                                        <option value="" disabled selected> -- Seleccione -- </option>
                                                                        <?php
                                                                        $condiciones = $data->getAllCondition();

                                                                        foreach ($condiciones as $key) {
                                                                            echo '<option value="' . $key['ID'] . '" id="options">' . $key['nombre'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="cbo_especialista" class="col-sm-10 col-form-label">Indique el especialista que emite el diagnostico</label>
                                                                <div class="input-group mb-6">
                                                                    <select class="custom-select diag" id="inputGroupSelect01" name="cbo_especialista" disabled="">
                                                                        <option value="" disabled selected> -- Seleccione -- </option>
                                                                        <?php
                                                                        $especialista = $data->getAllEspecialista();

                                                                        foreach ($especialista as $key) {
                                                                            echo '<option value="' . $key['ID'] . '" id="options">' . $key['nombre'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group dates">
                                                                <label for="datepicker" class="col-sm-10 col-form-label">Indique fecha del ultimo control con el especialista</label>
                                                                <input type="text" autocomplete="off" placeholder="--Seleccione--" class="form-control diag"  name="txt_control" id="datepicker" style=" text-indent: 18px;" disabled="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-8 col-lg-8">
                                                            <label style="margin-left: 10px">Copia informe ultimo control (PDF)</label>
                                                            <div class="input-group mb-3">
                                                                <div class="custom-file ">
                                                                    <input type="file" name="file_control" accept="application/pdf" class="custom-file-input diag" id="copiaUltimoInforme" lang="es" disabled="">
                                                                    <label class="custom-file-label" data-browse="Seleccionar" for="copiaUltimoInforme">Seleccionar Archivo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header Header" id="headingfour">
                                                <h2 class="mb-0">
                                                    <button class="btn text-left btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="bi bi-caret-down-fill Titulo">Datos del tutor</i>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapsefour" class="collapse show" aria-labelledby="headingfour" data-parent="#accordionExample">
                                                <div class="card-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tutor" style="margin-left: 10px">Nombre completo del tutor</label>
                                                                <input type="text" class="form-control" name="txt_ntutor" id="tutor" required >
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="cbo_parent">Parentesco</label>
                                                                <div class="input-group mb-6">
                                                                    <select class="custom-select" id="inputGroupSelect01" name="cbo_parent">
                                                                        <option value="" disabled selected> -- Seleccione -- </option>
                                                                        <option value="1">Padre</option>
                                                                        <option value="2">Madre</option>
                                                                        <option value="3">Otro</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="rutT" style="margin-left: 10px">R.U.T del tutor</label>
                                                                <input type="text" class="form-control" name="txt_rtutor" id="rutT" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)">
                                                                <span style="color: grey">Si el R.U.T termina con K, reemplacelo con un 0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <label style="margin-left: 10px"> Copia Carnet (Imagen)</label>
                                                            <div class="input-group mb-3">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="file_tutor" accept="image/jpeg" id="copiaCarnetTutor" lang="es">
                                                                    <label class="custom-file-label" data-browse="Seleccionar" for="copiaCarnetTutor">Seleccionar Archivo</label>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group dates">
                                                                <label for="datepicker" class="col-sm-10 col-form-label">Fecha nacimiento tutor</label>
                                                                <input type="text" autocomplete="off" placeholder="AAAA-MM-DD" class="form-control"  name="txt_nacTutor" id="datepicker" style=" text-indent: 18px;">
                                                                <span style="color: grey">Formato Año-Mes-Dia</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="cbo_parent" class="col-sm-10 col-form-label">Nivel escolar</label>
                                                                <div class="input-group mb-6">
                                                                    <select class="custom-select" id="inputGroupSelect01" name="cbo_nivel">
                                                                        <option value="" disabled selected> -- Seleccione -- </option>
                                                                        <option value="1">basica</option>
                                                                        <option value="2">media</option>
                                                                        <option value="3">universitaria</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="ocupacion" style="margin-left: 10px">Indique la ocupación</label>
                                                                <input type="text" class="form-control" name="txt_ocupacion" id="ocupacion" required >
                                                                <span style="color: grey"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="telefono" style="margin-left: 10px">Indique el telefono del tutor</label>
                                                                <input type="number" class="form-control" name="txt_telefono" id="telefono" required >
                                                                <span style="color: grey"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="correo" style="margin-left: 10px">Indique el correo electronico del tutor</label>
                                                                <input type="text" class="form-control" name="txt_correo" id="correo" required >
                                                                <span id="emailVal" style="color: grey"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <label for="direccTutor" id="labeldirecctutor" class="col-sm-10 col-form-label" >¿El tutor vive con el beneficiario?</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="direccTutor" value="1" onclick="viveCon()">
                                                                <label class="form-check-label" for="direccTutor">
                                                                    SI
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="direccTutor" value="0" onclick="noViveCon()">
                                                                <label class="form-check-label" for="direccTutor">
                                                                    NO
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row dirTutor">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 align-self-end">
                                                            <div class="form-group">
                                                                <label for="tipo_user"></label>
                                                                <div class="input-group mb-12">
                                                                    <div class="input-group-prepend">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Sistema de salud</label>
                                                                    </div>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="cbo_prevision">
                                                                        <option value="" disabled selected> -- Seleccione -- </option>
                                                                        <?php
                                                                        $prevision = $data->getAllPrevision();
                                                                        foreach ($prevision as $key) {
                                                                            echo '<option value="' . $key['ID'] . '" id="options">' . $key['nombre'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header Header" id="headingfive">
                                                <h2 class="mb-0">
                                                    <button class="btn text-left btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="bi bi-caret-down-fill Titulo">Datos de credencial de discapacidad</i>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapsefive" class="collapse show" aria-labelledby="headingfour" data-parent="#accordionExample">
                                                <div class="card-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <label for="discapacidad" id="labeldisc">¿Cuenta con credencial de discapacidad?</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input discapacidad" type="radio" name="discapacidad" value="1" >
                                                                <label class="form-check-label" for="discapacidad">
                                                                    SI
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input discapacidad" type="radio" name="discapacidad" value="0" >
                                                                <label class="form-check-label" for="discapacidad">
                                                                    NO
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="discapacidad" style="margin-left: 10px">Numero de credencial de discapacidad</label>
                                                                <input type="text" class="form-control numCred" name="txt_credencial" id="discapacidad" required disabled>
                                                                <span style="color: grey"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 align-self-end">
                                                            <div class="form-group">
                                                                <label></label>
                                                                <div class="input-group mb-12">
                                                                    <div class="input-group-prepend">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Origen principal</label>
                                                                    </div>
                                                                    <select class="custom-select numCred" id="inputGroupSelect01" name="cbo_origenP" disabled="">
                                                                        <option value="" disabled selected>-- Seleccione --</option>
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
                                                        <div class="col-sm-12 col-md-6 col-lg-6 align-self-end">
                                                            <div class="form-group">
                                                                <label></label>
                                                                <div class="input-group mb-12">
                                                                    <div class="input-group-prepend">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Origen Secundario</label>
                                                                    </div>
                                                                    <select class="custom-select numCred" id="inputGroupSelect01" name="cbo_origenS" disabled="">
                                                                        <option value="" disabled selected>-- Seleccione --</option>
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
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="porcentaje_d" style="margin-left: 10px">Porcentaje de discapacidad</label>
                                                                <input type="text" class="form-control numCred" name="txt_porcentaje_d" id="porcentaje_d" required disabled="">
                                                                <span style="color: grey"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 align-self-end">
                                                            <div class="form-group">
                                                                <label></label>
                                                                <div class="input-group mb-12">
                                                                    <div class="input-group-prepend">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Grado de discapacidad</label>
                                                                    </div>
                                                                    <select class="custom-select numCred" id="inputGroupSelect01" name="cbo_grado" disabled="">
                                                                        <option value="" disabled selected>-- Seleccione --</option>
                                                                        <option value="1">Leve</option>
                                                                        <option value="2">Moderado</option>
                                                                        <option value="3">Severo</option>
                                                                        <option value="4">Profundo</option>
                                                                        <option value="5">No aplica</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 align-self-end">
                                                            <div class="form-group">
                                                                <label></label>
                                                                <div class="input-group mb-12">
                                                                    <div class="input-group-prepend">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Movilidad Reducida</label>
                                                                    </div>
                                                                    <select class="custom-select numCred" id="inputGroupSelect01" name="cbo_movilidad" disabled="">
                                                                        <option value="" disabled selected>-- Seleccione --</option>
                                                                        <option value="1">Leve</option>
                                                                        <option value="2">Moderado</option>
                                                                        <option value="3">Severo</option>
                                                                        <option value="4">Profundo</option>
                                                                        <option value="5">No aplica</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <label style="margin-left: 10px"> C. Discapacidad (Parte delantera) (Imagen)</label>
                                                            <div class="input-group mb-3">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input numCred" name="file_credenFront" accept="image/jpeg" id="credenFront" lang="es" disabled="">
                                                                    <label class="custom-file-label" data-browse="Seleccionar" for="credenFront">Seleccionar Archivo</label>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <label style="margin-left: 10px"> C. Discapacidad (Parte trasera) (Imagen)</label>
                                                            <div class="input-group mb-3">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input numCred" name="file_credenBack" accept="image/jpeg" id="credenBack" lang="es" disabled="">
                                                                    <label class="custom-file-label" data-browse="Seleccionar" for="credenBack">Seleccionar Archivo</label>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header Header" id="headingsix">
                                                <h2 class="mb-0">
                                                    <button class="btn text-left btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="bi bi-caret-down-fill Titulo">Beneficios Sociales</i>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapsesix" class="collapse show" aria-labelledby="headingfour" data-parent="#accordionExample">
                                                <div class="card-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 align-self-end">
                                                            <div class="form-group">
                                                                <label></label>
                                                                <div class="input-group mb-12">
                                                                    <div class="input-group-prepend">
                                                                        <label class="input-group-text" for="inputGroupSelect01">¿Posee alguna pensión?</label>
                                                                    </div>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="cbo_pension">
                                                                        <option value="" disabled selected>-- Seleccione --</option>
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
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <label for="chilesolidario" id="labelchsoli">¿Pertenece a Chile solidario?</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="csolidario" value="1" >
                                                                <label class="form-check-label" for="csolidario">
                                                                    SI
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="csolidario" value="0" >
                                                                <label class="form-check-label" for="csolidario">
                                                                    NO
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <label for="chilesolidario" id="labelchsoli">¿Tiene registro social de hogares?</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="hogares" value="1" onclick="tieneR()">
                                                                <label class="form-check-label" for="hogares">
                                                                    SI
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="hogares" value="0" onclick="noTieneR()">
                                                                <label class="form-check-label" for="hogares">
                                                                    NO
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="porcentajeF" style="margin-left: 10px">Porcentaje en registro social de hogares</label>
                                                                <input type="text" class="form-control" name="txt_porcentajeF" id="porcentajeF" required disabled="">
                                                                <span style="color: grey"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-8 col-lg-8">
                                                            <label style="margin-left: 10px">Copia del registro (PDF)</label>
                                                            <div class="input-group mb-3">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="file_Hogar" accept="application/pdf" id="cR" disabled="">
                                                                    <label class="custom-file-label" data-browse="Seleccionar" for="cR">Seleccionar Archivo</label>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-lg-center">
                                        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-5" style="padding-top: 10px; padding-bottom: 10px">
                                            <button type="submit" class="btn submit col-sm-12 col-md-12 col-lg-12 col-xl-12">Registrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

                    $("#copiaCarnetBene").on('change', function () {
                        var fileName = $(this).val().split("\\").pop();
                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    })
                    $("#copiaUltimoInforme").on('change', function () {
                        var fileName = $(this).val().split("\\").pop();
                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    })
                    $("#copiaCarnetTutor").on('change', function () {
                        var fileName = $(this).val().split("\\").pop();
                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    })
                    $("#credenFront").on('change', function () {
                        var fileName = $(this).val().split("\\").pop();
                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    })
                    $("#credenBack").on('change', function () {
                        var fileName = $(this).val().split("\\").pop();
                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    })
                    $("#cR").on('change', function () {
                        var fileName = $(this).val().split("\\").pop();
                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    })
                });
            </script>
            <script>
                $(function () {
                    $('.dates #datepicker').datepicker({
                        'format': 'yyyy-mm-dd',
                        'autoclose': true
                    });
                });
            </script>
            <script type="text/javascript">
                $('document').ready(function () {
                    $('.collapse').collapse();
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
                        inpTele.innerHTML = '<div class="form-group"><label for="comuna">Numero registro Teletón</label><input type="text" class="form-control" name="txt_Nteleton" id="teleton" required ></div>';
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
                    dirTutor.innerHTML = "<div class='col s6'><div class='col-sm-12 col-md-12 col-lg-12'><input class='form-control' id='direccionT' type='text' name='txt_direTutor'><label for='direccionT'>Indique la direccion del tutor</label></div></div><div class='col-sm-12 col-md-12 col-lg-6'><div class='col-sm-12 col-md-6 col-lg-12'><input class='form-control' id='comuT' type='text' name='txt_comuTutor' ><label for='comuT'>Comuna</label></div> </div>";
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