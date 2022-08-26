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
<html>
    <head>
        <title>Registrar Entrevista</title>
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
                    <a href="MenuSecretaria.php">
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
                <div class="nav-wrapper" style="background-color: #05529a">
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s10 offset-s1">
                        <div class="card" style="border-radius: 10px">
                            <h4 style="padding-top: 10px; padding-left: 10px">Registro de entrevistas</h4>
                            <div class="row">
                                <form method="post">
                                    <div class="col s6">
                                        <div class="row">
                                            <div class="col s6">
                                                <div class="input-field col s12">
                                                    <input id="rut_b" type="text" name="txt_rutB" class="validate">
                                                    <label class="active" for="rut_b">R.U.T del beneficiario</label>
                                                </div>
                                            </div>
                                            <div class="col s5">
                                                <div class="input-field col s12">
                                                    <button class="btn waves-effect waves-light" type="submit" name="buscar">Buscar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php
                            if (isset($_POST['buscar'])) {
                                echo '
                                    '
                                ?>
                                <div class="row">
                                    <div class="col s6">
                                        <h5 class="col s10">Datos del beneficiario:</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="rut_b1" type="text" name="txt_rutB1" class="validate" readonly="true">
                                            <label class="active" for="rut_b1">R.U.T del beneficiario</label>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="nombre1" type="text" name="txt_n1" class="validate" readonly="true">
                                            <label class="active" for="nombre1">Nombres del beneficiario</label>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="apellido1" type="text" name="txt_a1" class="validate" readonly="true">
                                            <label class="active" for="apellido1">Apellidos del beneficiario</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input placeholder="-- Fecha Nacimiento: --" name="txt_nac" type="text" class="datepicker" id="datepicker" required readonly="true">
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <div class="input-field col s10">
                                            <input id="direccion1" type="text" name="txt_dire" class="validate" readonly="true">
                                            <label class="active" for="direccion1">Dirección del beneficiario</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <div class="input-field col s10">
                                            <input id="cDis" type="text" name="txt_cDis" class="validate" readonly="true">
                                            <label class="active" for="cDis">¿Cuenta con Credencial de discapacidad?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <h5 class="col s10">Datos del tutor:</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="rut_tutor" type="text" name="txt_rutTutor" class="validate" readonly="true">
                                            <label class="active" for="rut_tutor">R.U.T del tutor</label>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="nombreT" type="text" name="txt_nT" class="validate" readonly="true">
                                            <label class="active" for="nombreT">Nombres del tutor</label>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="apellidoT" type="text" name="txt_aT" class="validate" readonly="true">
                                            <label class="active" for="apellidoT">Apellidos del tutor</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <div class="input-field col s10">
                                            <input id="telefonoT" type="text" name="txt_telefonoT" class="validate" readonly="true">
                                            <label class="active" for="telefonoT">telefono del tutor</label>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s11">
                                            <input id="emailT" type="text" name="txt_emailT" class="validate" readonly="true">
                                            <label class="active" for="emailT">correo electronico del tutor</label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                '';
                            }else{
                                
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");

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
    </body>
</html>
