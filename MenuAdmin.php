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

switch ($_SESSION['tipo_u']) {
    case 1:
        $tipo_u = "Admin";
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
        <meta charset="UTF-8">
        <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
        <link rel="stylesheet" href="Materialize/css/styleSideBar.css">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="sidebar">
            <div class="logo-details">
                <div class="logo_name">Fundación Ave Fenix</div>
                <i class='bx bx-menu' id="btn"></i>
            </div>
            <ul class="nav-list">
                <!--<li>
                    <a href="#">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>-->
                <li>
                    <a href="#">
                        <i class='bx bx-user' ></i>
                        <span class="links_name">Usuarios</span>
                    </a>
                    <span class="tooltip">Usuarios</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-chat' ></i>
                        <span class="links_name">Estudiantes</span>
                    </a>
                    <span class="tooltip">Estudiantes</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-calendar' ></i>
                        <span class="links_name">Horario mensual</span>
                    </a>
                    <span class="tooltip">Horario mensual</span>
                </li>
                <!--<li>
                    <a href="#">
                        <i class='bx bx-folder' ></i>
                        <span class="links_name">File Manager</span>
                    </a>
                    <span class="tooltip">Files</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-cart-alt' ></i>
                        <span class="links_name">Order</span>
                    </a>
                    <span class="tooltip">Order</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-heart' ></i>
                        <span class="links_name">Saved</span>
                    </a>
                    <span class="tooltip">Saved</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-cog' ></i>
                        <span class="links_name">Setting</span>
                    </a>
                    <span class="tooltip">Setting</span>
                </li>-->
                <li class="profile">
                    <div class="profile-details">
                      <!--<img src="profile.jpg" alt="profileImg">-->
                        <div class="name_job">
                            <div class="name"><?php echo $nombre . ' ' . $apellido ?></div>
                            <div class="job"><?php echo $correo . ' | ' . $tipo_u ?></div>
                        </div>
                        <a href="controller/controllerLogout.php"><i class='bx bx-log-out' id="log_out" ></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <section class="home-section">
            <nav>
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo center">Logo</a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                        <li><a href="sass.html">Sass</a></li>
                        <li><a href="badges.html">Components</a></li>
                        <li><a href="collapsible.html">JavaScript</a></li>
                    </ul>
                </div>
            </nav>
            <!--<div class="container-fluid">
                <div class="row">
                    <div class="col s12">
                        <nav>
                            <div class="nav-wrapper">
                                <a href="#" class="brand-logo center">Logo</a>
                                <ul id="nav-mobile" class="left hide-on-med-and-down">
                                    <li><a href="sass.html">Sass</a></li>
                                    <li><a href="badges.html">Components</a></li>
                                    <li><a href="collapsible.html">JavaScript</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col s1">
                        <h1>Hello World!!!</h1>
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
    </body>
</html>
<!<!-- comment -->
