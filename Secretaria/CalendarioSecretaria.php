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
$cargoU = $_SESSION['cargo'];

$data = new Data();

if ($correo == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
}

$cUser = $data->getCargobyId($cargoU);
$cargo;
foreach ($cUser as $value) {
    $cargo = $value['nombre'];
}

$eventoA = array();
$comienzo;
$eventos = $data->getAllEvent();
foreach ($eventos as $value) {
    $value['title'] . '<br>';
    $value['start'] . '<br>';
    $comienzo = $value['start'];
    $value['color'] . '<br>';
    array_push($eventoA, $value);
}
$eventJson = json_encode($eventoA);

$consulta2 = $data->getConsula();
$rutBene;
foreach ($consulta2 as $value) {
    $rutBene = $value['RUT'];
}
$consultas = [];
foreach ($consulta2 as $value) {
    array_push($consultas, $value);
}
$consulJson = json_encode($consultas);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calendario Mensual</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <link rel="stylesheet" href="../Bootstrap/css/styleSideBar.css">
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
        <link rel="stylesheet" href="../Bootstrap/datepick.css">

        <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css?v=3.2.0">
        <!--<script nonce="dad866f0-7b4e-459c-92df-8e1fe510a0c2">(function (w, d) {
                !function (a, e, t, r) {
                    a.zarazData = a.zarazData || {};
                    a.zarazData.executed = [];
                    a.zaraz = {deferred: [], listeners: []};
                    a.zaraz.q = [];
                    a.zaraz._f = function (e) {
                        return function () {
                            var t = Array.prototype.slice.call(arguments);
                            a.zaraz.q.push({m: e, a: t})
                        }
                    };
                    for (const e of["track", "set", "debug"])
                        a.zaraz[e] = a.zaraz._f(e); a.zaraz.init = () => {
                        var t = e.getElementsByTagName(r)[0], z = e.createElement(r), n = e.getElementsByTagName("title")[0];
                        n && (a.zarazData.t = e.getElementsByTagName("title")[0].text);
                        a.zarazData.x = Math.random();
                        a.zarazData.w = a.screen.width;
                        a.zarazData.h = a.screen.height;
                        a.zarazData.j = a.innerHeight;
                        a.zarazData.e = a.innerWidth;
                        a.zarazData.l = a.location.href;
                        a.zarazData.r = e.referrer;
                        a.zarazData.k = a.screen.colorDepth;
                        a.zarazData.n = e.characterSet;
                        a.zarazData.o = (new Date).getTimezoneOffset();
                        a.zarazData.q = [];
                        for (; a.zaraz.q.length; ) {
                            const e = a.zaraz.q.shift();
                            a.zarazData.q.push(e)
                        }
                        z.defer = !0;
                        for (const e of[localStorage, sessionStorage])
                            Object.keys(e || {}).filter((a => a.startsWith("_zaraz_"))).forEach((t => {
                                try {
                                    a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))
                                } catch {
                                    a.zarazData["z_" + t.slice(7)] = e.getItem(t)
                                }
                            })); z.referrerPolicy = "origin";
                        z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData)));
                        t.parentNode.insertBefore(z, t)
                    };
                    ["complete", "interactive"].includes(e.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init)
                }(w, d, 0, "script");
            })(window, document);</script>-->

        <link rel="stylesheet" type="text/css" href="../Bootstrap/clockpicker.css">
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="sidebar open" style="overflow-y: hidden !important">
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
                    <a href="EntrevistaFamilia.php">
                        <i class='bx bx-home-heart'></i>
                        <span class="links_name">Registrar Entrevista</span>
                    </a>
                    <span class="tooltip">Registrar Entrevista</span>
                </li>
                <li>
                    <a href="../C_Administrativo/Administrativo.php">
                        <i class='bx bx-calendar-star'></i>
                        <span class="links_name">Calendario Administrativo</span>
                    </a>
                    <span class="tooltip">Calendario Administrativo</span>
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
                        <div class="col-sm-12 col-md-10 col-lg-12" style="padding-top: 10px">
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form name="form" id="form1" method="post" action="">
                                        <div class="modal-content">
                                            <div class="modal-header HeaderModal">
                                                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                            </div>
                                            <div class="modal-body Cuerpo">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-10 col-lg-3">
                                                        <div class="input-group mb-3" id="id_event">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">#</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly name="txt_id" id="id" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-10 col-lg-9">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Titulo:</span>
                                                            </div>
                                                            <input type="text" class="form-control" name="txt_title" readonly id="title" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-10 col-lg-4">
                                                        <div class="input-group mb-3 dates">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-plus"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" autocomplete="off" name="txt_fecha" id="startEvent" aria-label="Username" readonly aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-10 col-lg-4">
                                                        <div class="input-group mb-3 clockpicker"  data-placement="left" data-align="top" data-autoclose="true">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-clock"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="txt_hora" autocomplete="off" id="startEventHour" aria-label="Username"  aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-10 col-lg-12">
                                                        <div class="mb-2">
                                                            <span class="input-group-text" id="basic-addon1">Datos beneficiario:</span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-10 col-lg-3">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Rut</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly name="txt_bene" id="bene" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-10 col-lg-9">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly name="txt_Nbene" id="nomb_bene" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-10 col-lg-12">
                                                        <div class="mb-2">
                                                            <span class="input-group-text" id="basic-addon1">Datos de contacto:</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-10 col-lg-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Tutor</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly name="txt_rpfesional" id="tutor" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-10 col-lg-4">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Telefono</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly name="txt_Fbene" id="fono_bene" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-10 col-lg-12">
                                                        <div class="mb-2">
                                                            <span class="input-group-text" id="basic-addon1">Datos de profesional / interno:</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-10 col-lg-7">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly name="txt_rpfesional" id="profe" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-10 col-lg-5">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Area</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly name="txt_rpfesional" id="profe1" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                                                    </div>
                                                    <select name="cbo_evento" id="evento" class="custom-select" id="inputGroupSelect01">
                                                        <option selected value="0">Elija una opcion</option>
                                                        <option value="#10E706">Asitira</option>
                                                        <option value="#F00505">No asistira</option>
                                                        <option value="#E8F005">Reagendar</option>
                                                        <option value="#F07A05">Presenta sintomas de COVID-19</option>
                                                    </select>
                                                    <div class="input-group-prepend colorPrev" >
                                                        <label class="input-group-text colorPrevH" style="border-radius: 100px;" id="colorPrevH" for="inputGroupSelect01"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer HeaderModal">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" id="btn_Action" class="btn submitModal">Registrar</button>
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
        <script src="../Bootstrap/datepicke.js"></script>
        <script src="../js/clockpicker.js"></script>
        <script type="text/javascript">
            $('.clockpicker').clockpicker();
            $(function () {
                $('.dates #startEvent').datepicker({
                    'format': 'yyyy-mm-dd',
                    'autoclose': true
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#evento').change(colorPreview);
            });

            function colorPreview() {
                let color = $('#evento').val();
                console.log(color);
                $('#colorPrevH').css('background-color', color);
            }
        </script>
        <script type="text/javascript">
            var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            let form = document.getElementById('form1');

            let consultas = document.getElementById('.consulta');
            let des = 3;
            /*let eventJson=[];
             if (des == 2) {
             eventJson = [{'title':'The Title','start':'2022-09-01','end':'2022-09-02' }];
             console.log(eventJson);
             }else{
             eventJson=<?php echo $eventJson; ?>;
             console.log(eventJson);
             }*/
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
                    hiddenDays: [6, 0],
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
                    eventSources: [
                        {
                            events: <?php echo $eventJson; ?>
                            //remplazar por eventJson de javascript
                        }
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
                    /*dateClick: function (info) {
                     console.log(info);
                     form.reset();
                     document.getElementById('idsT').value = '';
                     del.classList.add('d-none');
                     document.getElementById('Event').readOnly = false;
                     document.getElementById('id_event').classList.add('d-none');
                     fecha = info.dateStr;
                     document.getElementById('Event').value = fecha.substring(0, 10);
                     document.getElementById('staticBackdropLabel').textContent = 'Generar Evento';
                     document.getElementById('btn_Action1').textContent = 'Registrar';
                     form2.action = "../controller/controllerEvento.php?p=1&a=1";
                     form2.method = 'POST';
                     modal2.show();
                     },*/
                    eventClick: function (info) {
                        console.log(info.event.startStr);
                        document.getElementById('staticBackdropLabel').textContent = 'Modificar Evento';
                        document.getElementById('btn_Action').textContent = 'Modificar';
                        document.getElementById('id_event').classList.remove('d-none');

                        document.getElementById('startEvent').readOnly = false;
                        document.getElementById('id').value = info.event.id;

                        document.getElementById('title').value = info.event.title;
                        fecha = info.event.startStr;
                        document.getElementById('startEvent').value = fecha.substring(0, 10);
                        document.getElementById('startEventHour').value = fecha.substring(11, 16);

                        //document.getElementById('color').backgroundColor = info.event.backgroundColor;
                        document.getElementById("colorPrevH").style.backgroundColor = info.event.backgroundColor;

                        form.action = "../controller/controllerEvento.php?p=2&a=3";
                        form.method = 'POST';
                        console.log(info);

                        let consul = <?php echo $consulJson ?>;

                        consul.forEach(el => {
                            if (el['evento'] == info.event.id) {
                                console.log(el);
                                document.getElementById('bene').value = el['RUT'];
                                document.getElementById('nomb_bene').value = el['nombre'] + ' ' + el['apellido'];
                                document.getElementById('fono_bene').value = el['telefono'];
                                document.getElementById('tutor').value = el['n_tutor'];
                                document.getElementById('profe').value = el['N_profesional'] + ' ' + el['A_profesional'];
                                document.getElementById('profe1').value = el['area'];
                            }

                        });
                        let color = info.event.backgroundColor;
                        console.log(color);
                        if (color == '#0387EF') {
                            modal.hide();
                        } else {
                            modal.show();
                        }
                    },
                    eventDrop: function (info) {
                        const id = info.event.id;
                        const fecha = info.event.startStr;
                        const colorEvent = info.event.backgroundColor;
                        const color = colorEvent.substring(1);
                        window.location = '../controller/controllerEvento.php?p=4&a=3&id=' + id + '&fecha=' + fecha + '&colorEvent=' + color + '';
                        console.log(id, fecha);
                    }
                });
                calendar.render();

            });

        </script>
    </body>
</html>
