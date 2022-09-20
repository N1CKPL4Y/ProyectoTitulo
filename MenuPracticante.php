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
$tipo_u = $_SESSION['tipo_u'];

if ($correo == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
}

switch ($_SESSION['area_u']) {
    case 1:
        $area_u = "Director Area Tecnica";
        break;
    case 2:
        $area_u = "Fonoaudiolog@";
        break;
    case 3:
        $area_u = "Terapeuta Ocupacional";
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
        <title>Menú Practicante</title>
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
    </head>
    <body>
        <div class="sidebar open">
            <div class="logo-details">
                <div class="logo_name">Fundación Inclusiva</div>
                <i class='bx bx-menu' id="btn" ></i>        
            </div>
            <ul class="nav-list">
                <li>
                    <a href="#">
                        <i class='bx bx-calendar' ></i>
                        <span class="links_name">Visualizar Horario</span>
                    </a>
                    <span class="tooltip">Visualizar Horario</span>
                </li>
                <li>
                    <a href="#">
                        <i class='material-icons'>assignment</i>
                        <span class="links_name">Generar Informe Integral</span>
                    </a>
                    <span class="tooltip">Generar Informe Integral</span>
                </li>
                <li>
                    <a href="#">
                        <i class='material-icons'>assignment_turned_in</i>
                        <span class="links_name">Registrar Bitacora</span>
                    </a>
                    <span class="tooltip">Registrar Bitacora</span>
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
        <section class="home-section" style="background-image: url(IMG/2.jpg); background-attachment: fixed; background-size: cover">
            <nav>
                <div class="nav-wrapper" style="background-color: #00526a">
                    <div class="container center">
                        <a style="font-size: 30px">Ave</a>
                        <img src="IMG/iconNavbar.png"/>
                        <a style="font-size: 30px">Fenix</a>
                    </div>
                </div>
            </nav>
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
    </body>
</html>
