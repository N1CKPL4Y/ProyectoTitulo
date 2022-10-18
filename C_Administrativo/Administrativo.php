<?php
session_start();
error_reporting(E_NOTICE ^ E_ALL);

include_once '../DB/Model_Data.php';

$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$passwd = $_SESSION['passwd'];
$correo = $_SESSION['email'];
$area_u = $_SESSION['area_u'];
$tipo_u = $_SESSION['tipo_u'];
$cargo = $_SESSION['cargo'];

if ($correo == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
}

switch ($_SESSION['tipo_u']) {
    case 1:
        $tipo_u = "Administrador";
        break;
    case 2:
        $tipo_u = "Trabajador";
        break;
}
switch ($_SESSION['cargo']) {
    case 1:
        $cargo = "Dirección";
        break;
    case 2:
        $cargo = "Secretaria";
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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calendario Mensual</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">

        <link rel="stylesheet" href="../AdminLTE/plugins/fullcalendar/main.css">
        <link rel="stylesheet" href="../Materialize/datepick.css">
        <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css?v=3.2.0">

        <link rel="stylesheet" type="text/css" href="../Materialize/clockpicker.css">
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <?php
        if ($_SESSION['tipo_u'] == '1' && $_SESSION['cargo'] == '1') {
            ?>
            <div class="sidebar open">
                <div class="logo-details">
                    <a><div class="logo_name" style="font-size: 19px; padding-left: 23px">Fundación Inclusiva</div></a>       
                </div>
                <ul class="nav-list">
                    <li>
                        <a href="../MenuAdmin.php">
                            <i class='bx bx-home' ></i>
                            <span class="links_name">Vover a Inicio</span>
                        </a>
                        <span class="tooltip">Volver a Inicio</span>
                    </li>
                    <li>
                        <a href="../Admin/RNuevoUsuario.php">
                            <i class="material-icons">person_add</i>
                            <span class="links_name">Registrar Usuarios</span>
                        </a>
                        <span class="tooltip">Registrar Usuarios</span>
                    </li>
                    <li>
                        <a href="../Admin/VisBeneficiario.php">
                            <i class="material-icons">people</i>
                            <span class="links_name" style="font-size: 14px">Visualizar Beneficiarios</span>
                        </a>
                        <span class="tooltip" style="font-size: 14px">Visualizar Beneficiarios</span>
                    </li>
                    <li>
                        <a href="../Admin/EditarDatos.php">
                            <i class="material-icons">border_color</i>
                            <span class="links_name">Editar Datos</span>
                        </a>
                        <span class="tooltip">Editar Datos</span>
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
                                <div class="name"><?php echo $tipo_u ?></div>
                                <div class="job"><?php echo $correo ?></div>
                            </div>
                            <a><i id="log_out"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
            <?php
        } else if ($_SESSION['tipo_u'] == '2' && $_SESSION['cargo'] == '1') {
            ?>
            <div class="sidebar open">
                <div class="logo-details">
                    <a><div class="logo_name" style="font-size: 19px; padding-left: 23px">Fundación Inclusiva</div></a>       
                </div>
                <ul class="nav-list">
                    <li>
                        <a href="../MenuDireccion.php">
                            <i class='bx bx-home' ></i>
                            <span class="links_name">Vover a Inicio</span>
                        </a>
                        <span class="tooltip">Volver a Inicio</span>
                    </li>
                    <li>
                        <a href="../Direccion/DirCalendario.php">
                            <i class='bx bx-calendar'></i>
                            <span class="links_name">Calendario Mensual</span>
                        </a>
                        <span class="tooltip">Calendario Mensual</span>
                    </li>
                    <li>
                        <a href="../Direccion/DirHistorialBitacora.php">
                            <i class='bx bx-library'></i>
                            <span class="links_name">Historial Bitacoras</span>
                        </a>
                        <span class="tooltip">Historial Bitacoras</span>
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
                                <div class="name"><?php echo $cargo ?></div>
                                <div class="job"><?php echo $correo ?></div>

                            </div>
                            <a><i id="log_out"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
            <?php
        } else if ($_SESSION['tipo_u'] == '2' && $_SESSION['cargo'] == '2') {
            ?>
            <div class="sidebar open">
                <div class="logo-details">
                    <a><div class="logo_name" style="font-size: 19px; padding-left: 23px">Fundación Inclusiva</div></a>       
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
                        <a href="Secretaria/EntrevistaFamilia.php">
                            <i class='bx bx-folder' ></i>
                            <span class="links_name">Registrar Entrevista</span>
                        </a>
                        <span class="tooltip">Registrar Entrevista</span>
                    </li>
                    <li>
                        <a href="Secretaria/CalendarioSecretaria.php">
                            <i class='bx bx-calendar-heart'></i>
                            <span class="links_name">Calendario Mensual</span>
                        </a>
                        <span class="tooltip">Calendario Mensual</span>
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
                                <div class="name"><?php echo $cargo ?></div>
                                <div class="job"><?php echo $correo ?></div>
                            </div>
                            <a><i id="log_out" ></i></a>
                        </div>
                    </li>
                </ul>
            </div>
            <?php
        }
        ?>

        <section class="home-section" style="background-image: url(../IMG/1.jpg); background-attachment: fixed; background-size: cover">
            <nav class="center">
                <div class="nav-wrapper" style="background-color: #00526a">
                    <div class="container center" style="display: flex; align-items: center; justify-content: center;">
                        <a style="font-size: 30px;color: white">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="../IMG/iconNavbar.png"/>
                        <a style="font-size: 30px;color: white;">Fénix</a>
                    </div>
                </div>
            </nav>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-lg-8" style="padding-top: 10px">
                            <div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <form name="form2" id="form2" method="post" action="">
                                        <div class="modal-content">
                                            <div class="modal-header HeaderModal">
                                                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                            </div>
                                            <div class="modal-body Cuerpo">
                                                <div class="input-group mb-3" id="id_event">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">#</span>
                                                    </div>
                                                    <input type="text" class="form-control" readonly name="txt_id" id="idsT" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Titulo</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_title1" id="titlesT" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-plus"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_fecha1" id="Event" aria-label="Username" readonly aria-describedby="basic-addon1">
                                                </div>
                                                <span class="input-group-text" id="basic-addon1">Evento</span>
                                                <div class="input-group mb-3">
                                                    <div class="form-control">
                                                        <input class="form-control-input eventos" type="radio" name="tipo" id="tipo1" value="1">
                                                        <label class="form-control-label" for="tipo1">
                                                            Todo el día
                                                        </label>
                                                    </div>
                                                    <div class="form-control">
                                                        <input class="form-control-input eventos" type="radio" name="tipo" id="tipo2" value="2">
                                                        <label class="form-control-label" for="tipo2">
                                                            Hora en especif.
                                                        </label>
                                                    </div>
                                                    <div class="form-control">
                                                        <input class="form-control-input eventos" type="radio" name="tipo" id="tipo3" value="3">
                                                        <label class="form-control-label" for="tipo3">
                                                            Extendido
                                                        </label>
                                                    </div>
                                                    <div class="form-control">
                                                        <input class="form-control-input eventos" type="radio" name="tipo" id="tipo4" value="4">
                                                        <label class="form-control-label" for="tipo4">
                                                            Hora Inicio-Fin
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3 clockpicker d-none" id="clockDiv" data-placement="right" data-align="top" data-autoclose="true">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-clock"> Inicio</i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_hora1" autocomplete="off" id="EventHour" aria-label="Username"  aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3 clockpicker d-none" id="clockDivEnd" data-placement="right" data-align="top" data-autoclose="true">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-clock"> Termino</i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_hora1End" autocomplete="off" id="EventHour1" aria-label="Username"  aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3 d-none dates" id="endDiv">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-plus"> Fecha termino</i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_fechaend" autocomplete="off" id="endEvent" aria-label="Username"  aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Detalles</span>
                                                    </div>
                                                    <textarea class="form-control" name="txt_detalles" aria-label="Detalles"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer HeaderModal">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" id="btn_Action1" class="btn submitModal">Registrar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-lg-8" style="padding-top: 10px">
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form name="form" id="form1" method="post" action="">
                                        <div class="modal-content">
                                            <div class="modal-header HeaderModal">
                                                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                            </div>
                                            <div class="modal-body Cuerpo">
                                                <div class="input-group mb-3" id="id_event">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">#</span>
                                                    </div>
                                                    <input type="text" class="form-control" readonly name="txt_id" id="id" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Titulo</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_title" id="title" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3" id="divStart">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-plus"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_fecha" id="startEvent" aria-label="Username" readonly aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3 clockpicker d-none" id="clockDiv2"  data-placement="left" data-align="top" data-autoclose="true">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-clock"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_hora" autocomplete="off" id="startEventHour" aria-label="Username"  aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3 d-none dates" id="endDiv2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-plus"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_fecha2" autocomplete="off" id="endEvent2" aria-label="Username"  aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3 clockpicker d-none" id="clockDivEnd2"  data-placement="left" data-align="top" data-autoclose="true">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-clock"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_horaend2" autocomplete="off" id="endEvent2Hour" aria-label="Username"  aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3 d-none">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-plus"></i></span>
                                                    </div>
                                                    <input type="hidden" class="form-control" name="txt_color2" autocomplete="off" id="colorEvent2" aria-label="Username"  aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Detalles</span>
                                                    </div>
                                                    <textarea class="form-control" name="txt_detalles2" id="detallesEvent" aria-label="Detalles"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer HeaderModal">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" id="btn_Action" class="btn submitModal">Registrar</button>
                                                <button type="button" id="btn_Delete" class="btn btn-danger" >Eliminar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-10 col-lg-10">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
        <script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../AdminLTE/dist/js/adminlte.min.js?v=3.2.0"></script>
        <script src="../AdminLTE/plugins/moment/moment.min.js"></script>
        <script  src="../AdminLTE/plugins/fullcalendar/main.js"></script>
        <script  src="../Fullcalendar/lib/locales/es.js"></script>
        <script src="../Materialize/datepicke.js"></script>
        <script src="../js/clockpicker.js"></script>
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>
        <script>
            $('document').ready(function () {
            $('#tipo1').change(function () {
            document.getElementById('clockDiv').classList.add('d-none');
            document.getElementById('clockDivEnd').classList.add('d-none');
            document.getElementById('endDiv').classList.add('d-none');
            document.getElementById('divHourEnd').classList.add('d-none');
            document.getElementById('EventHour').value = "";
            document.getElementById('endEvent').value = "";
            //tipoEvent.classList.add('d-block');
            console.log('holiwi');
            });
            $('#tipo2').change(function () {
            document.getElementById('endDiv').classList.add('d-none');
            document.getElementById('clockDivEnd').classList.add('d-none');
            document.getElementById('clockDiv').classList.remove('d-none');
            document.getElementById('divHourEnd').classList.remove('d-none');
            document.getElementById('EventHour').value = "";
            document.getElementById('endEvent').value = "";
            //tipoEvent.classList.add('d-block');
            console.log('holiwi');
            });
            $('#tipo3').change(function () {
            document.getElementById('clockDiv').classList.add('d-none');
            document.getElementById('clockDivEnd').classList.add('d-none');
            document.getElementById('endDiv').classList.remove('d-none');
            document.getElementById('divHourEnd').classList.add('d-none');
            document.getElementById('EventHour').value = "";
            document.getElementById('endEvent').value = "";
            //tipoEvent.classList.add('d-block');
            console.log('holiwi');
            });
            $('#tipo4').change(function () {
            document.getElementById('clockDiv').classList.remove('d-none');
            document.getElementById('clockDivEnd').classList.remove('d-none');
            document.getElementById('endDiv').classList.add('d-none');
            document.getElementById('divHourEnd').classList.add('d-none');
            //tipoEvent.classList.add('d-block');
            document.getElementById('EventHour1').value = "";
            console.log('holiwi');
            });
            });
        </script>
        <script type="text/javascript">
            $('.clockpicker').clockpicker();
            $(function () {
            $('.dates #startEvent').datepicker({
            'format': 'yyyy-mm-dd',
                    'autoclose': true,
                    startDate: '+1d'
            });
            });
            $(function () {
            $('.dates #endEvent2').datepicker({
            'format': 'yyyy-mm-dd',
                    'autoclose': true
            });
            });
            $(function () {
            $('.dates #endEvent').datepicker({
            'format': 'yyyy-mm-dd',
                    'autoclose': true
            });
            });
            $(function () {
            $("input#beneFI").rut({
            formatOn: 'keyup',
                    minimumLength: 8, // validar largo mínimo; default: 2
                    validateOn: 'change' // si no se quiere validar, pasar null
            });
            var input = document.getElementById('beneFI');
            input.addEventListener('input', function () {
            if (this.value.length >= 13)
                    this.value = this.value.slice(0, 12);
            })
            })
        </script>
        <script type="text/javascript">
                    var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            var modal2 = new bootstrap.Modal(document.getElementById('create'));
            let form = document.getElementById('form1');
            let form2 = document.getElementById('form2');
            let del = document.getElementById('btn_Delete');
            let del2 = document.getElementById('btn_Delete1');
            let consultas = document.getElementById('.consulta');
            let des = 3;
            document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
                    themeSystem: 'bootstrap',
                    locale: 'es',
                    contentHeight: 'auto',
                    handleWindowResize: true,
                    height: 'auto',
                    nowIndicator: true,
                    navLinks: true,
                    eventTimeFormat: {
                    hour: '2-digit',
                            minute: '2-digit',
                            meridiem: 'short'
                    },
                    timeZone: 'UTC-4',
                    eventMaxStack: 2,
                    dayHeaders: true,
                    views: {
                    dayGridMonth: {
                    titleFormat: {year: 'numeric', month: 'long'}
                    },
                            dayGrid: {
                            titleFormat: {year: 'numeric', month: 'long'}
                            },
                            timeGrid: {
                            titleFormat: {year: 'numeric', month: 'long', day: '2-digit'}
                            },
                            week: {
                            titleFormat: {year: 'numeric', month: 'long', day: '2-digit'}
                            },
                            day: {
                            titleFormat: {year: 'numeric', month: 'long', day: '2-digit', weekday: 'long'}
                            }
                    },
                    showNonCurrentDates: false,
                    events: [
<?php
$eventoAd = $data->getAllEventAdministrative();
foreach ($eventoAd as $value) {
    ?>{
                        id: '<?php echo $value['id']; ?>',
                                title: '<?php echo $value['title']; ?>',
    <?php
    if (empty($value['startHour'])) {
        ?>
                            start: '<?php echo $value['start']; ?>',
        <?php
    } else {
        ?>
                            start: '<?php echo $value['start'] . ' ' . $value['startHour']; ?>',
        <?php
    }
    if (empty($value['endHour'])) {
        ?>
                            end: '<?php echo $value['end']; ?>',
        <?php
    } else {
        ?>
                            end: '<?php echo $value['end'] . ' ' . $value['endHour']; ?>',
        <?php
    }
    ?>
                        color:'<?php echo $value['color']; ?>',
                                descripcion: '<?php echo $value['descripcion'] ?>'
                        }<?php
    $last = $data->getLastEventAdministrative();
    $ex;
    foreach ($last as $valueX) {
        $ex = $valueX['id'];
    }
    if ($ex == $value['id']) {
        
    } else {
        echo ',';
    };
}
?>
                    ],
                    editable: true,
                    droppable: true,
                    //schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                    headerToolbar: {
                    left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    },
                    footerToolbar: true,
                    // funcion recibe info
                    dateClick: function (info) {
                    console.log(info);
                    form.reset();
                    form2.reset();
                    document.getElementById('idsT').value = '';
                    document.getElementById('Event').readOnly = true;
                    document.getElementById('id_event').classList.add('d-none');
                    fecha = info.dateStr;
                    document.getElementById('Event').value = fecha.substring(0, 10);
                    document.getElementById('staticBackdropLabel').textContent = 'Generar Evento';
                    document.getElementById('btn_Action1').textContent = 'Registrar';
                    form2.action = "../controller/controllerEventAdmin.php?p=1&a=1";
                    form2.method = 'POST';
                    modal2.show();
                    },
                    eventClick: function (info) {
                    console.log(info.event.startStr);
                    document.getElementById('staticBackdropLabel').textContent = 'Modificar Evento';
                    document.getElementById('btn_Action').textContent = 'Modificar';
                    document.getElementById('id_event').classList.remove('d-none');
                    del.classList.remove('d-none');
                    document.getElementById('startEvent').readOnly = true;
                    document.getElementById('id').value = info.event.id;
                    document.getElementById('title').value = info.event.title;
                    fecha = info.event.startStr;
                    document.getElementById('startEvent').value = fecha.substring(0, 10);
                    if (fecha.substring(11) == "") {
                    console.log('Hola');
                    document.getElementById('endDiv2').classList.add('d-none');
                    document.getElementById('clockDiv2').classList.add('d-none');
                    document.getElementById('clockDivEnd2').classList.add('d-none');
                    }
                    ;
                    if (fecha.substring(11) != "") {
                    document.getElementById('endDiv2').classList.add('d-none');
                    document.getElementById('clockDiv2').classList.remove('d-none');
                    document.getElementById('clockDivEnd2').classList.add('d-none');
                    console.log('rango hora');
                    document.getElementById('startEventHour').value = fecha.substring(11);
                    }
                    ;
                    endSub = info.event.endStr;
                    if (endSub.substring(11) != "") {
                    document.getElementById('endDiv2').classList.remove('d-none');
                    document.getElementById('clockDiv2').classList.remove('d-none');
                    document.getElementById('clockDivEnd2').classList.remove('d-none');
                    document.getElementById('endEvent2').value = endSub.substring(0, 10);
                    document.getElementById('endEvent2Hour').value = endSub.substring(11);
                    } else if (endSub.substring(0, 10) != "" && fecha.substring(0, 10) != "") {
                    document.getElementById('endDiv2').classList.remove('d-none');
                    document.getElementById('clockDiv2').classList.add('d-none');
                    document.getElementById('clockDivEnd2').classList.add('d-none');
                    document.getElementById('endEvent2').value = endSub.substring(0, 10);
                    document.getElementById('endEvent2Hour').value = endSub.substring(11);
                    }
                    //
                    document.getElementById('detallesEvent').value = info.event.extendedProps.descripcion;
                    document.getElementById('colorEvent2').value = info.event.backgroundColor;
                    //document.getElementById('color').value = info.event.backgroundColor;
                    form.action = "../controller/controllerEventAdmin.php?p=2&a=1";
                    form.method = 'POST';
                    console.log(info);
                    modal.show();
                    },
                    eventDrop: function (info) {
                    const id = info.event.id;
                    const title = info.event.title;
                    const fecha = info.event.startStr;
                    const start = fecha.substring(0, 10);
                    const startHour = fecha.substring(11);
                    const fechaend = info.event.endStr;
                    const end = fechaend.substring(0, 10);
                    const endHour = fechaend.substring(11);
                    const colorEvent = info.event.backgroundColor;
                    const color = colorEvent.substring(1);
                    const description = info.event.extendedProps.descripcion;
                    window.location = '../controller/controllerEventAdmin.php?p=4&a=1&id=' + id + '&title=' + title + '&start=' + start + '&startHour=' + startHour + '&end=' + end + '&endHour=' + endHour + '&color=' + color + '&description=' + description + '';
                    console.log(id, start, startHour, end, endHour, color, description);
                    },
                    eventResize: function (info) {
                    const id = info.event.id;
                    const title = info.event.title;
                    const fecha = info.event.startStr;
                    const start = fecha.substring(0, 10);
                    const startHour = fecha.substring(11);
                    const fechaend = info.event.endStr;
                    const end = fechaend.substring(0, 10);
                    const endHour = fechaend.substring(11);
                    const colorEvent = info.event.backgroundColor;
                    const color = colorEvent.substring(1);
                    const description = info.event.extendedProps.descripcion;
                    window.location = '../controller/controllerEventAdmin.php?p=4&a=1&id=' + id + '&title=' + title + '&start=' + start + '&startHour=' + startHour + '&end=' + end + '&endHour=' + endHour + '&color=' + color + '&description=' + description + '';
                    console.log(id, start, startHour, end, endHour, color, description);
                    }
            });
            calendar.render();
            del.addEventListener('click', function () {
            modal.hide();
            Swal.fire({
            title: 'Estas seguro?',
                    text: "Se borrara el evento",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Borrar!',
                    cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
            console.log('peeee');
            /*Swal.fire(
             'Deleted!',
             'Your file has been deleted.',
             'success'
             );*/
            var id = document.getElementById('id').value;
            console.log(id);
            window.location = '../controller/controllerEventAdmin.php?p=3&a=1&id=' + id;
            }
            })
            });
            });

        </script>
    </body>
</html>
