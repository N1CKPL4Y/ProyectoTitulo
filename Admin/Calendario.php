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
$tipo_u = $_SESSION['tipo_u'];

if ($correo == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
}

switch ($_SESSION['tipo_u']) {
    case 1:
        $tipo_u = "Administrador";
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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calendario Mensual</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">

        <link rel="stylesheet" href="../AdminLTE/plugins/fullcalendar/main.css">

        <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css?v=3.2.0">
        <script nonce="dad866f0-7b4e-459c-92df-8e1fe510a0c2">(function(w, d){!function(a, e, t, r){a.zarazData = a.zarazData || {}; a.zarazData.executed = []; a.zaraz = {deferred:[], listeners:[]}; a.zaraz.q = []; a.zaraz._f = function(e){return function(){var t = Array.prototype.slice.call(arguments); a.zaraz.q.push({m:e, a:t})}}; for (const e of["track", "set", "debug"])a.zaraz[e] = a.zaraz._f(e); a.zaraz.init = () => {var t = e.getElementsByTagName(r)[0], z = e.createElement(r), n = e.getElementsByTagName("title")[0]; n && (a.zarazData.t = e.getElementsByTagName("title")[0].text); a.zarazData.x = Math.random(); a.zarazData.w = a.screen.width; a.zarazData.h = a.screen.height; a.zarazData.j = a.innerHeight; a.zarazData.e = a.innerWidth; a.zarazData.l = a.location.href; a.zarazData.r = e.referrer; a.zarazData.k = a.screen.colorDepth; a.zarazData.n = e.characterSet; a.zarazData.o = (new Date).getTimezoneOffset(); a.zarazData.q = []; for (; a.zaraz.q.length; ){const e = a.zaraz.q.shift(); a.zarazData.q.push(e)}z.defer = !0; for (const e of[localStorage, sessionStorage])Object.keys(e || {}).filter((a => a.startsWith("_zaraz_"))).forEach((t => {try{a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))} catch {a.zarazData["z_" + t.slice(7)] = e.getItem(t)}})); z.referrerPolicy = "origin"; z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))); t.parentNode.insertBefore(z, t)}; ["complete", "interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded", zaraz.init)}(w, d, 0, "script"); })(window, document);</script>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="sidebar open" >
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px">Fundación Inclusive</div></a>
                <i class='bx bx-menu' id="btn" ></i>        
            </div>
            <ul class="nav-list">
                <li>
                    <a href="RNuevoUsuario.php">
                        <i class="material-icons">person_add</i>
                        <span class="links_name">Registrar Usuarios</span>
                    </a>
                    <span class="tooltip">Registrar Usuarios</span>
                </li>
                <li>
                    <a href="VisBeneficiario.php">
                        <i class="material-icons">people</i>
                        <span class="links_name" style="font-size: 14px">Visualizar Beneficiarios</span>
                    </a>
                    <span class="tooltip" style="font-size: 14px">Visualizar Beneficiarios</span>
                </li>
                <li>
                    <a href="Calendario.php">
                        <i class='bx bx-calendar'></i>
                        <span class="links_name">Calendario Mensual</span>
                    </a>
                    <span class="tooltip">Calendario Mensual</span>
                </li>
                <li>
                    <a href="EditarDatos.php">
                        <i class="material-icons">border_color</i>
                        <span class="links_name">Editar Datos</span>
                    </a>
                    <span class="tooltip">Editar Datos</span>
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
                            <div class="name"><?php echo $tipo_u ?></div>
                            <div class="job"><?php echo $correo ?></div>

                        </div>
                        <a><i id="log_out"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <section class="home-section" style="background-color:#C8E6C9 ; background-attachment: fixed; background-size: cover">
            <nav class="center">
                <div class="nav-wrapper" style="background-color: #00526a">
                    <div class="container center" style="display: flex; align-items: center; justify-content: center;">
                        <a style="font-size: 30px;color: white">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="../IMG/iconNavbar.png"/>
                        <a style="font-size: 30px;color: white;">Fenix</a>
                    </div>
                </div>
            </nav>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-lg-8" style="padding-top: 10px">
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form name="form" id="form1" method="" action="">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3" id="id_event">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">#</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_id" id="id" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Titulo</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_title" id="title" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-plus"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="txt_fecha" id="startEvent" aria-label="Username" readonly aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-palette"></i></span>
                                                    </div>
                                                    <input type="color" class="form-control" name="txt_color" id="color" aria-label="Username"aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" id="btn_Action" class="btn btn-success">Registrar</button>
                                                <button type="button" id="btn_Delete" class="btn btn-danger" >Eliminar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-10 col-lg-8">
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
                    height: 'auto',
                    events: <?php echo $eventJson; ?>,
                    editable: true,
                    droppable: true,
                    // funcion recibe info
                    dateClick: function(info) {
                    form.reset();
                    document.getElementById('id').value = '';
                    del.classList.add('d-none');
                    document.getElementById('id_event').classList.add('d-none');
                    document.getElementById('startEvent').value = info.dateStr;
                    document.getElementById('staticBackdropLabel').textContent = 'Generar Evento';
                    document.getElementById('btn_Action').textContent = 'Registrar';
                    form.action = "../controller/controllerEvento.php?p=1";
                    form.method = 'POST';
                    modal.show();
                    //traer input con id startEvent y darle el valor info.dateStr
                    //info es el data de calendar y dateStr es la fecha tipo string
                    //abrir modal

                    },
                    eventClick: function(info) {
                    document.getElementById('staticBackdropLabel').textContent = 'Modificar Evento';
                    document.getElementById('btn_Action').textContent = 'Modificar';
                    document.getElementById('id_event').classList.remove('d-none');
                    del.classList.remove('d-none');
                    document.getElementById('id').value = info.event.id;
                    document.getElementById('title').value = info.event.title;
                    document.getElementById('startEvent').value = info.event.startStr;
                    document.getElementById('color').value = info.event.backgroundColor;
                    form.action = "../controller/controllerEvento.php?p=2";
                    form.method = 'POST';
                    console.log(info);
                    modal.show();
                    },
                    //schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                    headerToolbar: {
                    left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
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

            /*Swal.fire(
             'Deleted!',
             'Your file has been deleted.',
             'success'
             );*/
            const url = 'controller/controllerEvento.php?p=' + 3;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            /*form.action = "../controller/controllerEvento.php?p=3";
             form.method = 'POST';*/
            }
            })
            });
            });

        </script>
    </body>
</html>
