<?php
error_reporting(E_NOTICE ^ E_ALL);

include_once '../DB/Model_Data.php';
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
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSS only -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,  shrink-to-fit=no">
        <script src="../js/validarut.js"></script>
        <script src="../Materialize/datepicke.js"></script>
        <script src="../js/jquery.rut.js"></script>
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
        <link rel="stylesheet" href="../Materialize/datepick.css">
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <div class="sidebar open">
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px">Fundación Inclusiva</div></a>
                <i class='bx bx-menu' id="btn" ></i>        
            </div>
            <ul class="nav-list">
                <li>
                    <a href="../MenuSecretaria.php">
                        <i class='bx bx-home' ></i>
                        <span class="links_name">Vover a Inicio</span>
                    </a>
                    <span class="tooltip">Volver a Inicio</span>
                </li>
                <li>
                    <a href="../controller/controllerLogout.php">
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
        <section class="home-section" style="background-image: url(../IMG/1.jpg); background-attachment: fixed; background-size: cover">
            <nav>
                <div class="nav-wrapper" style="background-color: #00526a">
                    <div class="container" style="display: flex; align-items: center; justify-content: center; color: white">
                        <a style="font-size: 30px">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="../IMG/iconNavbar.png"/>
                        <a style="font-size: 30px">Fenix</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row" style="padding-top: 15px">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" style="background-color: #558b2f; color: white">
                                <h4 class="center" style="padding-top: 10px; padding-left: 10px">Registro de entrevistas</h4>
                            </div>
                            <div class="card-body Cuerpo">
                                <form method="post" name="datosUser">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rut del beneficiario</span>
                                                </div>
                                                <input type="text" id="rut_b" name="txt_rut" class="form-control" required placeholder="11.111.111-1" aria-label="Username" aria-describedby="basic-addon1" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)">
                                            </div>
                                            <div class="row-centered">
                                                <span style="color: grey; font-size: 13px">Si el R.U.T termina con K, reemplacelo con un 0.</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <button type="submit" name="buscar" class="btn submit">Buscar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['buscar'])) {

                            $rutBuscado = isset($_POST['txt_rut']) ? $_POST['txt_rut'] : null;

                            if (!empty($rutBuscado)) {
                                $exist = $data->getExistBen($rutBuscado);
                                if ($exist) {
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
                                    foreach ($beneficiario as $key) {
                                        $rutBd = $key['RUT'];
                                        $_SESSION['rut_bene'] = $key['RUT'];
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
                                    //echo $profeBD;
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
                                    ?>
                                    <div class="row" style="margin-top: 15px">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="card">
                                                <div class="card-header" style="background-color: #558b2f; color: white">
                                                    <h5 class="col-sm-12 col-md-12 col-lg-12">Datos del beneficiario:</h5>
                                                </div>
                                                <div class="card-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Rut</span>
                                                                </div>
                                                                <input type="text" id="rut_b1" name="txt_rutB1" value="<?php echo $rutBd; ?>" readonly class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Nombres</span>
                                                                </div>
                                                                <input type="text" id="nombre1" name="txt_n1" value="<?php echo $nombreBD; ?>" readonly class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Apellidos</span>
                                                                </div>
                                                                <input type="text" id="apellido1" name="txt_a1" value="<?php echo $apellidoBD; ?>" readonly class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="input-group mb-3 dates">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Fecha de nacimiento</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="datepicker" readonly value="<?php echo $fech_nacBD ?>" name="txt_nac"  aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Dirección</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="txt_dire" value="<?php echo $direccBD ?>" readonly aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">¿Posee credencial de discapacidad?</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="txt_cDis" value="<?php echo $credenBD ?>" readonly aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Diagnostico</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="txt_diag" value="<?php echo $diagBD ?>" readonly aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                                            <?php
                                                            if ($profeBD == "No Aplica") {
                                                                ?>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Profesional que lo deriva</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="txt_deriva" value="<?php echo $profeBD ?>" readonly aria-label="Username" aria-describedby="basic-addon1">
                                                                </div>
                                                                <?php
                                                            } else {
                                                                $array = $data->getEspecialista($profeBD);
                                                                $textEsp;
                                                                foreach ($array as $valor1) {
                                                                    $textEsp = $valor1['nombre'];
                                                                }
                                                                ?>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Profesional que lo deriva</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="txt_deriva" value="<?php echo $textEsp ?>" readonly aria-label="Username" aria-describedby="basic-addon1">
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="card"> 
                                                <div class="card-header" style="background-color: #558b2f; color: white">
                                                    <h5 class="col-sm-12 col-md-12 col-lg-12">Datos del tutor:</h5>
                                                </div>
                                                <div class="card-body" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Rut</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="txt_rutTutor" value="<?php echo $rutTut ?>" readonly aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="txt_nT" value="<?php echo $nombTut ?>" readonly aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Telefono</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="txt_telefonoT" value="<?php echo $teleTut ?>" readonly aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Correo electronico</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="txt_emailT" value="<?php echo $corrTut ?>" readonly aria-label="Username" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class = "row justify-content-around" style = "padding-top: 10px">
                                        <div class = "col-sm-12 col-md-10 col-lg-6">
                                            <div class = "card text-center">
                                                <div class = "card-header">
                                                    Registro
                                                </div>
                                                <div class = "card-body">
                                                    <h5 class = "card-title">No existe un beneficiario asociado al rut indicado</h5>
                                                </div>
                                                <div class = "card-footer text-muted">
                                                    ...
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                
                            }
                        } else {
                            
                        }
                        ?>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <form method="post" action="../controller/controllerRegEntrevista.php">
                                    <div class="row" style="padding-top: 15px">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="accordion" id="accordionExample">
                                                <div class="card">
                                                    <div class="card-header Header" id="headingOne">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi Titulo bi-caret-down-fill">Antecedentes del embarazo</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿El embarazo fue controlado?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="embarazo1" id="siE" type="radio" value="1" onclick="controlado()">
                                                                            <label class="form-control-label" for="siE">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="embarazo1" id="noE" type="radio" value="0" onclick="noControlado()">
                                                                            <label class="form-control-label" for="noE">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Cada cuanto?</span>
                                                                        </div>
                                                                        <input type="text" id="embarazo" name="txt_embarazo" disabled class="form-control" disabled aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Consumió medicina, drogas y/o alcohol?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="embarazo2" id="siE1" value="1" onclick="consumio()">
                                                                            <label class="form-control-label" for="siE1">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="embarazo2" id="noE1" value="0" onclick="noConsumio()">
                                                                            <label class="form-control-label" for="noE1">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Indique</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_medicamentos" id="medicamentos" disabled aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Existieron complicaciones?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="complicaciones" id="siE2" value="1" onclick="conComplicaciones()">
                                                                            <label class="form-control-label" for="siE2">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="complicaciones" id="noE2" value="0" onclick="sinComplicaciones()">
                                                                            <label class="form-control-label" for="noE2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Indique</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_complicaciones" id="complicaciones" disabled aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header Header" id="headingTwo" >
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi bi-caret-down-fill Titulo">Antecedentes del Parto</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Cuantas semanas de embarazo tuvo?</span>
                                                                        </div>
                                                                        <input type="text" name="txt_semanas" id="semanas" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Tipo de embarazo</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="tipo" id="tipo1" value="1">
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Normal
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="tipo" id="tipo2" value="2">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Inducido
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="tipo" id="tipo3" value="3">
                                                                            <label class="form-control-label" for="tipo3">
                                                                                Fórceps
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="tipo" id="tipo4" value="4">
                                                                            <label class="form-control-label" for="tipo4">
                                                                                Cesarea (Indique)
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Motivo cesarea</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" disabled="" id="motivoC" name="txt_motivo" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Tuvo asistencia medica?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="asistencia" value="1">
                                                                            <label class="form-control-label" for="siE2">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="asistencia" value="2">
                                                                            <label class="form-control-label" for="noE2">
                                                                                No
                                                                            </label>
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
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi bi-caret-down-fill Titulo">Antecedentes del Post Parto</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-1">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Peso al nacer</span>
                                                                        </div>
                                                                        <input type="text" name="txt_peso" class="form-control" placeholder="3420g" aria-label="Username" aria-describedby="basic-addon1">

                                                                    </div>
                                                                    <span id="basic-addon1">Peso en gramos</span>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-1">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Talla al nacer</span>
                                                                        </div>
                                                                        <input type="text" name="txt_talla" class="form-control" placeholder="30cm" aria-label="Username" aria-describedby="basic-addon1">

                                                                    </div>
                                                                    <span id="basic-addon1">Talla en centimetros</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-1">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">A.P.G.A.R</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_apgar1" aria-label="Username" aria-describedby="basic-addon1">

                                                                    </div>
                                                                    <span id="basic-addon1">Al minuto</span>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-1">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">A.P.G.A.R</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_apgar5" aria-label="Username" aria-describedby="basic-addon1">

                                                                    </div>
                                                                    <span id="basic-addon1">A los 5 minutos</span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-1">
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text" id="basic-addon1">¿Quedo hospitalizado al nacer?</span>
                                                                            </div>
                                                                            <div class="form-control">
                                                                                <input class="form-control-label" name="hospitalizado" id="siH" type="radio" value="1" >
                                                                                <label class="form-control-label" for="siE">
                                                                                    Si
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-control">
                                                                                <input class="form-control-label" name="hospitalizado" id="noH" type="radio" value="0" >
                                                                                <label class="form-control-label" for="noE">
                                                                                    No
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Motivo</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" disabled id="hospitalizado" name="txt_hospitalizado" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="mb-1">
                                                                        <div class="mb-3">
                                                                            <div>
                                                                                <span id="basic-addon1">Señale si antes de que cumpliera un año de vida el/la niño/a presentó (Marque las que correspondan)</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma1" value="Desnutricion" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Desnutrición</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma2" value="Obesidad" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Obesidad</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma3" value="Fiebre Alta" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Fiebre Alta</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma4" value="Convulsiones" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Convulsiones</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma5" value="Traumatismos" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Traumatismos</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma6" value="Intoxicación" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Intoxicación</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma7" value="Enfermedades Respiratorias" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Enfermedades Respiratorias</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma8" value="Asma" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Asma</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma9" value="Encefalitis" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Encefalitis</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma10" value="Meningitis" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Meningitis</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma11" value="Hospitalizaciones" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Hospitalizaciones</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma12" value="Ninguna de los anteriores" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguna de los anteriores</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sintoma13" value="Otro" name="sintomasNacer[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otro</span>
                                                                        <input type="text" placeholder="Indique" disabled id="sintoma14" name="otroSintoNac" class="form-control" aria-label="Text input with checkbox">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Controles periodicos de salud?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="controles" type="radio" value="1" >
                                                                            <label class="form-control-label" for="siE">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="controles" type="radio" value="0">
                                                                            <label class="form-control-label" for="noE">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Vacunas</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="vacunas" type="radio" value="1" >
                                                                            <label class="form-control-label" for="siE">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="vacunas" type="radio" value="0">
                                                                            <label class="form-control-label" for="noE">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Observaciones primeros 12 meses de vida</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="txt_meses" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header Header" id="headingFour">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi bi-caret-down-fill Titulo">Lactancia</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseFour" class="collapse" aria-labelledby="collapseFour" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>Indique el periodo de Lactancia. (Si no hubo este tipo de lactancia, indique "No existió este tipo de lactancia")</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Con leche materna exclusiva</span>
                                                                        </div>
                                                                        <input type="text" name="txt_lactancia" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Mixta: Leche materna y Relleno</span>
                                                                        </div>
                                                                        <input type="text" name="txt_mixto" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Con Relleno y Formula de leche</span>
                                                                        </div>
                                                                        <input type="text" name="txt_relleno" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header Header" id="headingFive">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi bi-caret-down-fill Titulo">Desarrollo Sensoriomotriz</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseFive" class="collapse" aria-labelledby="collapseFive" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row mb-3 ml-2">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>Indique la edad en que el/la niño/a:</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Controla la cabeza</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_Ccabeza" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Se sienta solo</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_Ssolo" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Comienza a gatear</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_gatear" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Camina con apoyo</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_Capoyo" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Camina sin apoyo</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_Sapoyo" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Emite sus 1ras palabras</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_Ppalabras" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Emite sus 1ras frases</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_Pfrases" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Se viste solo/a</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_Vsolo" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Controla esfinter vesical Diurno</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="EsfinterDV" type="radio" value="1">
                                                                            <label class="form-control-label" for="siE">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="EsfinterDV" type="radio" value="0">
                                                                            <label class="form-control-label" for="noE">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Controla esfinter vesical Nocturno</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="EsfinterNV" type="radio" value="1" >
                                                                            <label class="form-control-label" for="siE">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="EsfinterNV" type="radio" value="0">
                                                                            <label class="form-control-label" for="noE">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Controla esfinter anal Diurno</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="EsfinterAD" type="radio" value="1" >
                                                                            <label class="form-control-label" for="siE">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="EsfinterAD" type="radio" value="0">
                                                                            <label class="form-control-label" for="noE">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Controla esfinter anal Nocturno</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="EsfinterNA" type="radio" value="1" >
                                                                            <label class="form-control-label" for="siE">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="EsfinterNA" type="radio" value="0">
                                                                            <label class="form-control-label" for="noE">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Utiliza pañales?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="Panales" type="radio" value="1" >
                                                                            <label class="form-control-label" for="siE">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="Panales" type="radio" value="0">
                                                                            <label class="form-control-label" for="noE">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Utiliza pañal de entrenamiento?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="PanalE" type="radio" value="1">
                                                                            <label class="form-control-label" for="siE">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="PanalE" type="radio" value="0">
                                                                            <label class="form-control-label" for="noE">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Necesita asistencia para ir al baño?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="asistenciaB" id="siA" type="radio" value="1" >
                                                                            <label class="form-control-label" for="siA">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="asistenciaB" id="noA" type="radio" value="0">
                                                                            <label class="form-control-label" for="noA">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Indique</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_Tasistencia" disabled id="n_asistencia" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Actividad motora general</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="Amotora" id="tipoM" value="Normal" >
                                                                            <label class="form-control-label" for="tipoM">
                                                                                Normal
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="Amotora" id="tipoM" value="Activo" >
                                                                            <label class="form-control-label" for="tipoM">
                                                                                Activo
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="Amotora" id="tipoM" value="Hiperactivo" >
                                                                            <label class="form-control-label" for="tipoM">
                                                                                Hiperactivo
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="Amotora" id="tipoM" value="Hipoactivo" >
                                                                            <label class="form-control-label" for="tipoM">
                                                                                Hipoactivo
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Tono muscular general</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="Tmuscular" id="tipoTM" value="Normal" >
                                                                            <label class="form-control-label" for="tipoTM">
                                                                                Normal
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="Tmuscular" id="tipoTM" value="Hiperactivo" >
                                                                            <label class="form-control-label" for="tipoTM">
                                                                                Hiperactivo
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="Tmuscular" id="tipoTM" value="Hipoactivo" >
                                                                            <label class="form-control-label" for="tipoTM">
                                                                                Hipoactivo
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Es estable al caminar</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="Ecaminar" type="radio" value="1" >
                                                                            <label class="form-control-label" for="siE">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="Ecaminar" type="radio" value="0">
                                                                            <label class="form-control-label" for="noE">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Se cae con frecuencia</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="Cfrecuencia" type="radio" value="1" >
                                                                            <label class="form-control-label" for="siE">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="Cfrecuencia" type="radio" value="0">
                                                                            <label class="form-control-label" for="noE">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Dominancia lateral</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="dominancia" type="radio" value="Derecha" >
                                                                            <label class="form-control-label" for="siE">
                                                                                Derecha
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-label" name="dominancia" type="radio" value="Izquierda">
                                                                            <label class="form-control-label" for="noE">
                                                                                Izquierda
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3 ml-2">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>
                                                                        En relacion con su motricidad Fina el niño(a)logra:
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="mf1" value="Agarrar" name="checkMFina[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Agarrar</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="mf2" value="Ensartar" name="checkMFina[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text"  id="basic-addon1">Ensartar</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="mf3" value="Presionar" name="checkMFina[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Presionar</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="mf4" value="Dibujar" name="checkMFina[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Dibujar</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="mf5" value="Realizar pinza con indice y pulgar" name="checkMFina[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Realizar pinza con indice y pulgar</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="mf6" value="Escribir" name="checkMFina[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Escribir</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="mf7" value="Ninguna de las anteriores" name="checkMFina[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguna de las anteriores</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3 ml-2">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>
                                                                        En relacion con algunos signos cognitivcos el niño(a):
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sc1" value="Reacciona a voces o caras familiares" name="check_Scog[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Reacciona a voces o caras familiares</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sc2" value="Demanda objetos y compañia" name="check_Scog[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Demanda objetos y compañia</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sc3" value="Sonrie, balbucea, grita, llora, indica o señala" name="check_Scog[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Sonrie, balbucea, grita, llora, indica o señala</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sc4" value="Manipula y explora objetos" name="check_Scog[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Manipula y explora objetos</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sc5" value="Comprende prohibiciones" name="check_Scog[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Comprende prohibiciones</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sc6" value="Posee evidente descoordinacion ojo-mano" name="check_Scog[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Posee evidente descoordinacion ojo-mano</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="sc7" value="Ninguna de las anteriores" name="check_Scog[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguna de las anteriores</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Observaciones</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="txt_ObsDesSens" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header Header" id="headingSix">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi bi-caret-down-fill Titulo">Visión</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseSix" class="collapse" aria-labelledby="collapseSix" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>Vision (Marque las que correspondan)</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="v1" value="Se interesa por los estimulos visuales" name="check_vis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Se interesa por los estimulos visuales</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="v2" value="En ocaciones tiene los ojos irritados o llorosos" name="check_vis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">En ocaciones tiene los ojos irritados o llorosos</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="v3" value="Presenta dolores frecuentes de cabeza" name="check_vis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Presenta dolores frecuentes de cabeza</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="v4" value="Se acerca o aleja demasiado los objetos" name="check_vis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Se acerca o aleja demasiado los objetos</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="v5" value="Sigue el desplazamiento de los objetos o personas" name="check_vis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Sigue el desplazamiento de los objetos o personas</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="v6" value="Presenta movimientos oculares "anormales"" name="check_vis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Presenta movimientos oculares "anormales"</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="v7" value="Manifiesta conductas "erroneas" (tropiezos, choques)" name="check_vis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Manifiesta conductas "erroneas" (tropiezos, choques)</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="v8" value="Ninguna de las anteriores" name="check_vis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguna de las anteriores</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>El estudiante presenta alguno de los siguientes diagnosticos</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="d1" value="Miopia" name="check_DiagVis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Miopia</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="d2" value="Estrabismo" name="check_DiagVis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Estrabismo</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="d3" value="Astigmatismo" name="check_DiagVis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Astigmatismo</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="d4" value="Ninguno" name="check_DiagVis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguno</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="d5" value="Otro" name="check_DiagVis[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otro</span>
                                                                        <input type="text" id="d6" name="txt_OtroDiagVis" disabled aria-label="Checkbox for following text input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿El niño/a utiliza lentes opticos?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="lentes" value="1" onclick="conComplicaciones()">
                                                                            <label class="form-control-label" for="siE2">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="lentes" value="0" onclick="sinComplicaciones()">
                                                                            <label class="form-control-label" for="noE2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Observaciones</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="txt_ObsVis" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header Header" id="headingSeven" >
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi bi-caret-down-fill Titulo">Audición</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseSeven" class="collapse" aria-labelledby="collapseSeven" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>Audición (Marque las que correspondan)</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-7">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="a1" value="Se interesa por los estimulos auditivos" name="check_audi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Se interesa por los estimulos auditivos</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="a2" value="Reacciona o reconoce voces o sonidos familiares" name="check_audi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Reacciona o reconoce voces o sonidos familiares</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="a3" value="Gira la cabeza cuando se le llama o ante un ruido fuerte" name="check_audi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Gira la cabeza cuando se le llama o ante un ruido fuerte</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="a4" value="Acerca los oidos a la TV, radio o fuente de sonido" name="check_audi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Acerca los oidos a la TV, radio o fuente de sonido</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-5">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="a5" value="En ocaciones se tapa o golpea los oidos" name="check_audi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">En ocaciones se tapa o golpea los oidos</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="a6" value="La pronunciación oral es adecuada" name="check_audi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">La pronunciación oral es adecuada</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="a7" value="Ninguna de las anteriores" name="check_audi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguna de las anteriores</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>El estudiante presenta alguno de los siguientes diagnosticos</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="da1" value="Hipoacusia Derecha" name="check_DiagAudi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Hipoacusia Derecha</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="da2" value="Hipoacusia Izquierda" name="check_DiagAudi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Hipoacusia Izquierda</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="da3" value="Hipoacusia Bilateral" name="check_DiagAudi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Hipoacusia Bilateral</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="da4" value="Otitis Cronicas" name="check_DiagAudi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otitis Cronicas</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="da5" value="Ninguno" name="check_DiagAudi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguno</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="da6" value="Otro" name="check_DiagAudi[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otro</span>
                                                                        <input type="text" id="da7" name="otro_DiagAudi" disabled aria-label="Checkbox for following text input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿El niño/a utiliza audifono?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="audicion" id="noE2" value="1" >
                                                                            <label class="form-control-label" for="siE2">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="audicion" id="noE2" value="2" >
                                                                            <label class="form-control-label" for="noE2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Observaciones</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="obs_Audicion" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header Header" id="headingEigth">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseEigth" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi bi-caret-down-fill Titulo">Desarrollo del lenguaje</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseEigth" class="collapse" aria-labelledby="collapseEigth" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>El niño(a) se comunica preferentemente en forma:</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Comunicación</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="comunicacion" id="c1" value="1">
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Oral
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="comunicacion" id="c2" value="2">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Gestual
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="comunicacion" id="c3" value="3">
                                                                            <label class="form-control-label" for="tipo3">
                                                                                Mixto
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="comunicacion" id="c4" value="4">
                                                                            <label class="form-control-label" for="tipo4">
                                                                                Otro
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Indique</span>
                                                                        </div>
                                                                        <input type="text" id="c5" name="txt_otroCom" disabled="" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3 ml-2">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>
                                                                        Caracteristicas del lenguaje expresivo (Marque las que correspondan)
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="dc1" value="Balbucea (oral o señas) / emite sonidos" name="check_LengEx[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Balbucea (oral o señas) / emite sonidos</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="dc2" value="Vocaliza/realiza gestos o señas aisladas" name="check_LengEx[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text"  id="basic-addon1">Vocaliza/realiza gestos o señas aisladas</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="dc3" value="Emite palabras/produce señas" name="check_LengEx[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Emite palabras/produce señas</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="dc4" value="Emite/produce frases" name="check_LengEx[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Emite/produce frases</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="dc5" value="Relata experiencias" name="check_LengEx[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Relata experiencias</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="dc6" value="La emision/pronunciacion/produccion es clara" name="check_LengEx[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">La emision/pronunciacion/produccion es clara</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="dc7" value="Emite palabras sueltas" name="check_LengEx[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Emite palabras sueltas</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="dc8" value="Ninguna de las anteriores" name="check_LengEx[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguna de las anteriores</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="dc9" value="Otro" name="check_LengEx[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otro</span>
                                                                        <input type="text" id="dc10" name="otro_LengEx" disabled="" aria-label="Checkbox for following text input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3 ml-2">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>
                                                                        Caracteristicas del lenguaje comprensivo (Marque las que correspondan)
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-10">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="cl1" value="Sigue instrucciones complejas (ven y sientate)" name="check_LengCom[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Sigue instrucciones complejas (ven y sientate)</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="cl2" value="Identifica personas" name="check_LengCom[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Identifica personas</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="cl3" value="Comprende conceptos abstractos (Amistad, Culpa, Cariño, etc)" name="check_LengCom[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Comprende conceptos abstractos (Amistad, Culpa, Cariño, etc)</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="cl4" value="Responde en forma coherente preguntas de la vida diaria" name="check_LengCom[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Responde en forma coherente preguntas de la vida diaria</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="cl5" value="Sigue instrucciones simples (traeme un auto, sientate, etc)" name="check_LengCom[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Sigue instrucciones simples (traeme un auto, sientate, etc)</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="cl6" value="Identifica objetos" name="check_LengCom[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Identifica objetos</span>

                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="cl7" value="Sigue instrucciones grupales (niños siéntense)" name="check_LengCom[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Sigue instrucciones grupales (niños siéntense)</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="cl8" value="Comprende relatos, noticias, cuentos cortos" name="check_LengCom[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Comprende relatos, noticias, cuentos cortos</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="cl9" value="Ninguna de las anteriores" name="check_LengCom[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguna de las anteriores</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="cl10" value="Otro" name="check_LengCom[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otro</span>
                                                                        <input type="text" id="cl11" name="otro_LengCom" disabled="" aria-label="Checkbox for following text input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Manifestó perdida de lenguaje oral</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="Plenguaje" id="pl1" value="1">
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="Plenguaje" id="pl2" value="2">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Indique</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" id="pl3" name="txt_perdidaL" disabled="" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Observaciones</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="txt_ObsLeng" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header Header" id="headingNine">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi Titulo bi-caret-down-fill">Desarrollo Social</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseNine" class="collapse" aria-labelledby="collapseNine" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>Desarrollo Social (Marque las que correspondan)</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-8">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds1" value="Se relaciona espontáneamente con las personas de su entorno natural" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Se relaciona espontáneamente con las personas de su entorno natural</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds2" value="Explica razones de sus comportamientos y actitudes" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Explica razones de sus comportamientos y actitudes</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds3" value="Participa en actividades grupales" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Participa en actividades grupales</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds4" value="Opta por trabajo individua" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Opta por trabajo individual</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds5" value="Presenta lenguaje ecolálico" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Presenta lenguaje ecolálico</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds6" value="Exhibe dificultad para adaptarse a situaciones nuevas" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Exhibe dificultad para adaptarse a situaciones nuevas</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds7" value="Se relaciona en forma colaborativa" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Se relaciona en forma colaborativa</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds8" value="Respeta normas sociales" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Respeta normas sociales</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds9" value="Respeta normas escolares" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Respeta normas escolares</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds10" value="Muestra sentido del humor" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Muestra sentido del humor</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds11" value="Movimientos estereotipados" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Movimientos estereotipados</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds12" value="Pataletas frecuentes" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Pataletas frecuentes</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds13" value="Nincuna de las anteriores" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Nincuna de las anteriores</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ds14" value="Otro" name="check_DesSoc[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otro</span>
                                                                        <input type="text" id="ds15" disabled="" name="txt_OtroDesSoc" aria-label="Checkbox for following text input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Cuando se prende una luz, reacciona de forma...</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="reaccion" id="noE2" value="1">
                                                                            <label class="form-control-label" for="siE2">
                                                                                Natural
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="reaccion" id="noE2" value="2">
                                                                            <label class="form-control-label" for="noE2">
                                                                                Desmesurada
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Cuando escucha un sonido, reacciona de forma...</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="reaccion1" id="noE2" value="1">
                                                                            <label class="form-control-label" for="siE2">
                                                                                Natural
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="reaccion1" id="noE2" value="2">
                                                                            <label class="form-control-label" for="noE2">
                                                                                Desmesurada
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Cuando una persona extraña se le acerca, reacciona de forma...</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="reaccion2" value="1">
                                                                            <label class="form-control-label" for="siE2">
                                                                                Natural
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="reaccion2" value="2">
                                                                            <label class="form-control-label" for="noE2">
                                                                                Desmesurada
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Observaciones</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="txt_ObsDesSoc" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header Header" id="headingTen">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi bi-caret-down-fill Titulo">Salud</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseTen" class="collapse" aria-labelledby="collapseTen" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>Estado actual de salud del/la estudiante (Marque las que correspondan)</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e1" value="Vacunas al dia" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Vacunas al dia</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e2" value="Epilepsia" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Epilepsia</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e3" value="Problemas Cardiacos" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Problemas Cardiacos</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e4" value="Paraplejia" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Paraplejia</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e5" value="Perdida auditiva" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Perdida auditiva</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e6" value="erdida visual" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Perdida visual</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e7" value="Trastorno Motor" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Trastorno Motor</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e8" value="Problemas bronco-respiratorio" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Problemas bronco-respiratorio</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e9" value="Enfermedad infecto-contagiosa" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Enfermedad infecto-contagiosa</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e10" value="Trastorno Emocional" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Trastorno Emocional</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e11" value="Trastorno Conductual" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Trastorno Conductual</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e12" value="Ninguna de las anteriores" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguna de las anteriores</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="e13" value="Otro" name="check_EstSal[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otro</span>
                                                                        <input type="text" id="e14" disabled="" name="otro_EstSal" aria-label="Checkbox for following text input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Recibe algun tratamiento</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" id="t1" type="radio" name="tratamiento" value="1">
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" id="t2" type="radio" name="tratamiento" value="2">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Indique</span>
                                                                        </div>
                                                                        <input class="form-control" id="t3" disabled name="txt_Ttratamiento" aria-label="Checkbox for following text input"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Toma algun medicamento?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="medicamento" id="m1" value="1">
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="medicamento" id="m2" value="2">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Indique</span>
                                                                        </div>
                                                                        <input class="form-control" id="m3" disabled="" name="txt_medicamento" aria-label="Checkbox for following text input"></input>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>En cuanto a la alimentación (apreciación del informante)</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Alimentación</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="alimentacion" id="al1" value="1" >
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Normal
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="alimentacion" id="al2" value="2" >
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Malo(a) para comer
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="alimentacion" id="al3" value="3" >
                                                                            <label class="form-control-label" for="tipo3">
                                                                                Bueno(a) para comer
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="alimentacion" id="al4" value="4">
                                                                            <label class="form-control-label" for="tipo4">
                                                                                Otro
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"  id="basic-addon1">Indique</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_otroA" id="al5" disabled="" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Estatura Actual</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_estaturaA" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Peso Actual</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_pesoA"olo aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Peso</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="peso" valuelue="1" >
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Normal
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="peso" valuelue="2">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Bajo
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="peso" valuelue="3">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Obesidad
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Come solo?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="comeSolo" value="1">
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="comeSolo" value="2">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Que alimentos le gusta comer?</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_gustaComer" id="gustaComer" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Que alimentos no le gusta comer?</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_nogustaComer" id="nogustaComer" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-8">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">En cuanto al sueño</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="dormir" value="1">
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Normal
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="dormir" value="2">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Tranquilo
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="dormir" value="3">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Inquieto
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Hora a la que se duerme</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_HorDormir" id="timepicker" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Duerme..</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="conQuienDuerme" value="1" >
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Solo
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="conQuienDuerme" value="2" >
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Acompañado
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Especifique la respuesta anterior</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="especificar" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>Estado actual de salud del/la estudiante (Marque las que correspondan)</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="p1" value="Insomnio" name="check_NocheP[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Insomnio</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="p2" value="Pesadillas" name="check_NocheP[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Pesadillas</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="p3" value="Terrores nocturnos" name="check_NocheP[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Terrores nocturnos</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="p4" value="Sonambulismo" name="check_NocheP[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Sonambulismo</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="p5" value="Despierta de buen humor" name="check_NocheP[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Despierta de buen humor</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="p6" value="Ninguna de las anteriores" name="check_NocheP[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguna de las anteriores</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="p7" value="Otro" name="check_NocheP[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otro</span>
                                                                        <input type="text" id="p8" disabled="" name="otro_NocheP" aria-label="Checkbox for following text input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <label class="input-group-text" for="inputGroupSelect01">Humor/comportamiento</label>
                                                                        </div>
                                                                        <select class="custom-select" name="cbo_humor" id="humor" onclick="humor()">
                                                                            <option value="" selected>--Seleccionar--</option>
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
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Indique</span>
                                                                        </div>
                                                                        <input type="text" id="h1" name="otro_Humor" disabled="" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Observaciones</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="txt_ObsSalud" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header Header" id="headingEleven">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi bi-caret-down-fill Titulo">Antecedentes familiares</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseEleven" class="collapse" aria-labelledby="collapseEleven" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                                            <span>Personas que viven con el/la niño/a y/o que son responsables de su cuidado</span>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Indique</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="integrantes" placeholder="Escribir nombre, parentezco, edad, escolaridad y ocupacion.&#10;Ejemplo: Juan Perez, Papa, 45, 4 medio y obrero" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                                            <span>Antecedentes de salud de la familia.</span>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Indique</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="Asalud" placeholder="Señale aquellos antecedentes que son relevantes en función de la entrega de apoyo que requiere el o la estudiante" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Observaciones</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="txt_ObsAntFam" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header Header" id="headingTwelve">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi bi-caret-down-fill Titulo">Antecedentes escolares</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseTwelve" class="collapse" aria-labelledby="collapseTwelve" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>Indique</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Edad de ingreso al sistema escolar</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="edadE" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Asistió a jardin infantil?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="jardin" value="1">
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="jardin" value="2">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Indique</span>
                                                                        </div>
                                                                        <textarea class="form-control" name="colegios" id="colegios" placeholder="Señale aquellos antecedentes que son relevantes en función de la entrega de apoyo que requiere el o la estudiante" aria-label="With textarea"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <label class="input-group-text" for="inputGroupSelect01">Modalidad de enseñanza</label>
                                                                        </div>
                                                                        <select name="cbo_ModEns" class="custom-select" id="inputGroupSelect01">
                                                                            <option value="" selected>Seleccionar</option>
                                                                            <option value="1">Regular</option>
                                                                            <option value="2">Especial</option>
                                                                            <option value="3">Tecnica</option>
                                                                            <option value="3">Ninguna</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Motivo de cambio del ultimo colegio</span>
                                                                        </div>
                                                                        <input type="text" name="colegios1" id="colegios1" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">¿Ha repetido curso?</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="repetir" id="r1" value="1" >
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="repetir" id="r2" value="2" >
                                                                            <label class="form-control-label" for="tipo2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Curso y motivo por el que repitio</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" id="r3" name="repetir" disabled="" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <label class="input-group-text" for="inputGroupSelect01">Situación</label>
                                                                        </div>
                                                                        <select name="cbo_situacion" class="custom-select" id="inputGroupSelect01">
                                                                            <option value="" selected>Seleccionar</option>
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
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header Header" id="headingThirdteen">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThirdteen" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="bi bi-caret-down-fill Titulo">Actitud de la familia</i>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseThirdteen" class="collapse" aria-labelledby="collapseThirdteen" data-parent="#accordionExample">
                                                        <div class="card-body Cuerpo">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>¿Como evalúa usted el Desempeño Escolar de su hijo?</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Desempeño</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="descolar" id="ev1" value="1">
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Satisdactorio
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="descolar" id="ev2" value="2">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Insatisfactorio
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Si es insatisfactorio, por que motivo</span>
                                                                        </div>
                                                                        <input type="text" id="ev3" disabled="" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <label class="input-group-text" for="inputGroupSelect01">¿Que hace cuando a su hijo(a) le va mal en el colegio?</label>
                                                                        </div>
                                                                        <select name="cbo_vaMal" class="custom-select" id="vaMal" onclick="vaMal()">
                                                                            <option value="" selected>Seleccionar</option>
                                                                            <option value="1">Lo apoyo</option>
                                                                            <option value="2">Lo castigo</option>
                                                                            <option value="3">Ninguno</option>
                                                                            <option value="4">Otro</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Indique otro</span>
                                                                        </div>
                                                                        <input type="text" name="txt_otrovMal" id="vM1" disabled="" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <label class="input-group-text" for="inputGroupSelect01">¿Que hace cuando a su hijo(a) le va bien en el colegio?</label>
                                                                        </div>
                                                                        <select name="cbo_vaBien" class="custom-select" id="vaBien" onclick="vaBien()">
                                                                            <option value="" selected>Seleccionar</option>
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
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Indique otro</span>
                                                                        </div>
                                                                        <input type="text" id="vB1" name="txt_otrovBien" disabled="" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>¿Quien apoya el proceso de aprendizaje y desarrollo de su hijo?</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ap1" name="check_quienApoya[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Madre</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ap2" name="check_quienApoya[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Padre</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ap3" name="check_quienApoya[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Hermanos</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ap4" name="check_quienApoya[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Abuelos</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ap5" name="check_quienApoya[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Tios</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ap6" name="check_quienApoya[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otros Familiares</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ap7" name="check_quienApoya[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otros Profesionales</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ap8" name="check_quienApoya[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Ninguna de las anteriores</span>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox" id="ap9" name="check_quienApoya[]" aria-label="Checkbox for following text input">
                                                                            </div>
                                                                        </div>
                                                                        <span class="input-group-text" id="basic-addon1">Otro</span>
                                                                        <input type="text" id="ap10" name="otro_quienApoya" disabled="" aria-label="Checkbox for following text input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <span>Su hijo cuenta con un ambiente fisico y emocional adecuado para su aprendizaje</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Indique</span>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="ambiente" value="1">
                                                                            <label class="form-control-label" for="tipo1">
                                                                                Ambos
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="ambiente" value="2">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Solo fisico 
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="ambiente" value="3">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Solo emocional 
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <input class="form-control-input" type="radio" name="ambiente" value="4">
                                                                            <label class="form-control-label" for="tipo2">
                                                                                Ninguno
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="card text-center">
                                                <div class="card-header Header">
                                                    -- Por favor verificar toda la informacion ingresada antes de registrar --
                                                </div>
                                                <div class="card-body Cuerpo">
                                                    <button type="submit" class="btn submit" name="action">
                                                        Registrar entrevista
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                v1.checked = false;
                v2.checked = false;
                v3.checked = false;
                v4.checked = false;
                v5.checked = false;
                v6.checked = false;
                v7.checked = false;
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
                a1.checked = false;
                a2.checked = false;
                a3.checked = false;
                a4.checked = false;
                a5.checked = false;
                a6.checked = false;
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
                da1.checked = false;
                da2.checked = false;
                da3.checked = false;
                da4.checked = false;
                da6.checked = false;
                da7.checked = false;
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

        al1.addEventListener('click', function () {
            if (al1.checked) {
                al5.disabled = true;
            } else {

            }
        })
        al2.addEventListener('click', function () {
            if (al2.checked) {
                al5.disabled = true;
            } else {
                al5.disabled = true;
            }
        })
        al3.addEventListener('click', function () {
            if (al3.checked) {
                al5.disabled = true;
            } else {
                al5.disabled = true;
            }
        })
        al4.addEventListener('click', function () {
            if (al4.checked) {
                al5.disabled = false;
            } else {
                al5.disabled = true;
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
                ap1.checked = false;
                ap2.checked = false;
                ap3.checked = false;
                ap4.checked = false;
                ap5.checked = false;
                ap6.checked = false;
                ap7.checked = false;
                ap9.checked = false;
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
