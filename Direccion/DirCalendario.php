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
//$tipo_u = $_SESSION['tipo_u'];
$cargo = $_SESSION['cargo'];
if ($correo == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
}

switch ($_SESSION['cargo']) {
    case 1:
        $tipo_u = "Dirección";
        break;
}

$data = new Data();

$eventoA = array();
$eventos = $data->getAllEvent();
foreach ($eventos as $value) {
    $value['title'] . '<br>';
    $value['start'] . '<br>';
    $value['color'] . '<br>';
    array_push($eventoA, $value);
}
$eventJson = json_encode($eventoA);
$consulta2 = $data->getConsula();
$consultas = [];
foreach ($consulta2 as $value) {
    array_push($consultas, $value);
}
$consulJson = json_encode($consultas);
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->

<html lang="en" dir="ltr">
    <head>
        <title>Calendario Mensual</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>
        <script src="../Bootstrap/js/funciones.js"></script>
        <link rel="stylesheet" href="../Bootstrap/css/styleSideBar.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../AdminLTE/plugins/fullcalendar/main.css">
        <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css?v=3.2.0">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>

    </head>
    <body>
        <div class="sidebar open" style="overflow-y: hidden !important">
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px; padding-left: 23px">Fundación Inclusiva</div></a>       
            </div>
            <ul class="nav-list">
                <li>
                    <a href="../MenuDireccion.php">
                        <i class='bx bx-home' ></i>
                        <span class="links_name">Volver a Inicio</span>
                    </a>
                    <span class="tooltip">Volver a Inicio</span>
                </li>
                <li>
                    <a href="../Secretaria/EntrevistaFamilia.php">
                        <i class='bx bx-home-heart'></i>
                        <span class="links_name">Entrevista a la Familia</span>
                    </a>
                    <span class="tooltip">Entrevista a la Familia</span>
                </li>
                <li>
                    <a href="../C_Administrativo/Administrativo.php" style="height: 50px; width: 249px">
                        <i class='bx bx-calendar'></i>
                        <span class="links_name">Calendario Administrativo</span>
                    </a>
                    <span class="tooltip">Calendario Administrativo</span>
                </li>
                <li>
                    <a href="DirHistorialBitacora.php">
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
                            <div class="name"><?php echo $tipo_u ?></div>
                            <div class="job"><?php echo $correo ?></div>
                        </div>
                        <a><i id="log_out"></i></a>
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
                        <a style="font-size: 30px">Fénix</a>
                    </div>
                </div>
            </nav>
            <section class="content">
                <div class="container-fluid">
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
                                                    <input type="text" class="form-control" name="txt_title" readonly id="title" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-plus"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_fecha" id="startEvent" aria-label="Username" readonly aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3 clockpicker"  data-placement="left" data-align="top" data-autoclose="true">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-clock"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_hora" autocomplete="off" readonly id="startEventHour" aria-label="Username"  aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rut</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_bene" readonly id="bene" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Beneficiario</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_Nbene" readonly id="nomb_bene" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Contacto</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_Fbene" readonly id="fono_bene" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Profesional / Interno</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_rpfesional" readonly="" id="profe" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Área</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_rpfesional" readonly="" id="profe1" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="modal-footer HeaderModal">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-11 col-lg-10">
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

        <script type="text/javascript">
            var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            let form = document.getElementById('form1');
            let del = document.getElementById('btn_Delete');
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    themeSystem: 'bootstrap',
                    selectable: true,
                    locale: 'es',
                    contentHeight: 'auto',
                    handleWindowResize: true,
                    height: 'auto',
                    eventSources: [

                        // your event source
                        //{
                        /*events: [ // put the array in the `events` property
                         
                         color: 'black', // an option!
                         textColor: 'yellow' // an option!
                         },*/
                        {
                            events: <?php echo $eventJson; ?>
                        }

                        // any other event sources...

                    ],
                    //events: ,
                    hiddenDays: [6, 0],
                    editable: false,
                    droppable: false,
                    // funcion recibe info
                    /*dateClick: function (info) {
                     form.reset();
                     document.getElementById('id').value = '';
                     del.classList.add('d-none');
                     document.getElementById('startEvent').readOnly = true;
                     document.getElementById('id_event').classList.add('d-none');
                     document.getElementById('startEvent').value = info.dateStr;
                     document.getElementById('staticBackdropLabel').textContent = 'Generar Evento';
                     document.getElementById('btn_Action').textContent = 'Registrar';
                     form.action = "../controller/controllerEvento.php?p=1&a=2";
                     form.method = 'POST';
                     modal.show();
                     //traer input con id startEvent y darle el valor info.dateStr
                     //info es el data de calendar y dateStr es la fecha tipo string
                     //abrir modal
                     
                     },*/
                    eventClick: function (info) {
                        console.log(info.event.startStr);
                        document.getElementById('staticBackdropLabel').textContent = 'Consulta';
                        //document.getElementById('btn_Action').textContent = 'Iniciar';
                        document.getElementById('id_event').classList.remove('d-none');

                        //document.getElementById('startEvent').readOnly = true;
                        document.getElementById('id').value = info.event.id;

                        document.getElementById('title').value = info.event.title;
                        fecha = info.event.startStr;
                        document.getElementById('startEvent').value = fecha.substring(0, 10);
                        document.getElementById('startEventHour').value = fecha.substring(11, 16);


                        let consul = <?php echo $consulJson ?>;
                        let rut;
                        consul.forEach(el => {
                            if (el['evento'] == info.event.id) {
                                console.log(el);
                                rut = el['RUT'];
                                document.getElementById('bene').value = el['RUT'];
                                document.getElementById('nomb_bene').value = el['nombre']+' '+el['apellido'];;
                                document.getElementById('fono_bene').value = el['telefono'];
                                document.getElementById('profe').value = el['N_profesional']+' '+el['A_profesional'];
                                document.getElementById('profe1').value = el['area'];
                            }

                        });

                        console.log(rut);

                        form.action = "controller/controllerGenerateBit.php?rut=" + rut + "&id=" + info.event.id;
                        form.method = 'POST';
                        console.log(info);
                        let color = info.event.backgroundColor;
                        console.log(color);
                        if (color == '#03EF1C') {
                            modal.hide();
                        } else {
                            modal.show();
                        }

                    },
                    /*eventDrop: function (info) {
                     const id = info.event.id;
                     const fecha = info.event.startStr;
                     window.location = '../controller/controllerEvento.php?p=4&a=2&id=' + id + '&fecha=' + fecha;
                     console.log(id, fecha);
                     },*/
                    //schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    }
                });
                calendar.render();
            });

        </script>
    </body>
</html>
