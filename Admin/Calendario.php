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
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title>Calendario mensual</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="../js/validarut.js"></script>
        <script src=".../js/jquery.rut.js"></script>
        <script src=".../js/js/funciones.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href=".../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href=".../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href=".../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href=".../AdminLTE/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
        <link href='../Fullcalendar/lib/main.css' rel='stylesheet' />
        <script src='../Fullcalendar/lib/main.js'></script>
    </head>
    <body>
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
                    <div class="container center">
                        <a style="font-size: 30px;color: white;padding-left: 500px">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="../IMG/iconNavbar.png"/>
                        <a style="font-size: 30px;color: white;">Fenix</a>
                    </div>
                </div>
            </nav>
            <div id='calendar'></div>
        </section>

        <script src=".../AdminLTE/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src=".../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src=".../AdminLTE/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src=".../AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src=".../AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src=".../AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src=".../AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src=".../AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src=".../AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src=".../AdminLTE/plugins/jszip/jszip.min.js"></script>
        <script src=".../AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
        <script src=".../AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
        <script src=".../AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src=".../AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="../AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../AdminLTE/dist/js/adminlte.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    initialDate: '2022-08-07',
                    selectable: true,
                    locale: 'es',
                    height: 'auto',
                    //schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                    headerToolbar: {
                        language: 'es',
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    }

                });
                calendar.render();
                calendar.setOption('locale', 'es');
            });
        </script>
        <script>
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
        </script>
    </body>
</html>
