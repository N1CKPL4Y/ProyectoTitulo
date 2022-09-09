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
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
    <head>
        <title>Editar Datos</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
        <link rel="stylesheet" href="../Materialize/css/materialize.css">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>
    </head>
    <body>
        <div class="sidebar open">
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px">Fundación Inclusiva</div></a>
                <i class='bx bx-menu' id="btn" ></i>        
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
                    <a href="#">
                        <i class='bx bx-calendar'></i>
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
                            <div class="name"><?php echo $tipo_u ?></div>
                            <div class="job"><?php echo $correo ?></div>

                        </div>
                        <a><i id="log_out"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <section class="home-section" style="background-color:#C8E6C9 ; background-attachment: fixed; background-size: cover">
            <nav>
                <div class="nav-wrapper" style="background-color: #00526a">
                    <div class="container center">
                        <a style="font-size: 30px">Ave</a>
                        <img src="../IMG/iconNavbar.png"/>
                        <a style="font-size: 30px">Fenix</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s10 offset-s1">
                        <div class="card" style="border-radius: 10px">
                            <h4 style="padding-top: 10px; padding-left: 10px" class="center">Editar Datos</h4>
                            <div class="row">
                                <div class="col s12">
                                    <ul class="collapsible">
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" style="color: white;">keyboard_arrow_down</i> Editar Areas de los profesionales</div>
                                            <div class="collapsible-body" style="background-color: #C8E6C9">
                                                <div class="row">
                                                    <form method="post" action="../controller/controllerRegistroNArea.php">
                                                        <div class="row">
                                                            <div class="col s6">
                                                                <div class="input-field col s12">
                                                                    <input id="nArea" type="text" name="txt_narea" class="validate" style="background-color: white; border-radius: 10px" required="">
                                                                    <label for="nArea">Ingrese el nombre para la nueva area</label>
                                                                </div>
                                                            </div>
                                                            <div class="col s6">
                                                                <div class="input-field col s12">
                                                                    <button class="btn waves-effect light-green darken-3" type="submit" name="buscar" required>Registrar Nueva Area</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="card" style="border-radius: 10px">
                                                            <table class="table centered" id="areas_activas">
                                                                <thead style="font-size: 20px; text-align: center">
                                                                    <tr>
                                                                        <th>Areas Habilitadas</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $AreaA = $data->getAreasActivas();

                                                                    foreach ($AreaA as $key) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $key['nombre'] ?></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="card" style="border-radius: 10px">
                                                            <table class="table centered" id="areas_activas">
                                                                <thead style="font-size: 20px; text-align: center">
                                                                    <tr>
                                                                        <th>Areas Deshabilitadas</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $AreaNA = $data->getAreasNoActivas();

                                                                    foreach ($AreaNA as $key) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $key['nombre'] ?></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" style="color: white;">keyboard_arrow_down</i> Editar Condiciones existentes</div>
                                            <div class="collapsible-body" style="background-color: #C8E6C9">
                                                <div class="row">
                                                    <form method="post" action="controller/controllerRegistroNCondicion.php">
                                                        <div class="row">
                                                            <div class="col s6">
                                                                <div class="input-field col s12">
                                                                    <input id="ncondicion" type="text" name="txt_nCondicion" class="validate" style="background-color: white; border-radius: 10px" required="">
                                                                    <label for="ncondicion">Ingrese el nombre de la condición</label>
                                                                </div>
                                                            </div>
                                                            <div class="col s6">
                                                                <div class="input-field col s12">
                                                                    <input id="ncodigo" type="text" name="txt_nCodigo" class="validate" style="background-color: white; border-radius: 10px" required="">
                                                                    <label for="ncodigo">Ingrese el codigo identificador de la condición</label>
                                                                    <span style="color: gray">Pueden ser las iniciales de la condición</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="input-field col s12" style="background-color: white; border-radius: 10px">
                                                                    <textarea id="textdesc" name="descripcion" class="materialize-textarea" required=""></textarea>
                                                                    <label for="textdesc">Ingrese la descripción de la condición</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12 center">
                                                                <button class="btn waves-effect light-green darken-3" type="submit" name="buscar" required>Registrar Condición</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <div class="card" style="border-radius: 10px">
                                                            <h5 class="center" style="padding-top: 20px">Condiciones Registradas</h5>
                                                            <table class="table centered" id="areas_activas">
                                                                <thead style="font-size: 20px; text-align: center">
                                                                    <tr>
                                                                        <th>Nombre</th>
                                                                        <th>Codigo</th>
                                                                        <th>Descripción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $condicion = $data->getAllCondiciones();

                                                                    foreach ($condicion as $key) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $key['nombre'] ?></td>
                                                                            <td><?php echo $key['codigo'] ?></td>
                                                                            <td><?php echo $key['descripcion'] ?></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons" style="color: white;">keyboard_arrow_down</i> Agregar Pensiones</div>
                                            <div class="collapsible-body" style="background-color: #C8E6C9">
                                                <div class="row">
                                                    <form method="post" action="controller/controllerRegistroNPension.php">
                                                        <div class="row">
                                                            <div class="col s6">
                                                                <div class="input-field col s12">
                                                                    <input id="npension" type="text" name="txt_nPension" class="validate" style="background-color: white; border-radius: 10px" required="">
                                                                    <label for="npension">Ingrese el nombre de la Pensión</label>
                                                                </div>
                                                            </div>
                                                            <div class="col s6">
                                                                <div class="input-field col s12">
                                                                    <button class="btn waves-effect light-green darken-3" type="submit" name="buscar" required>Registrar Nueva Pensión</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <div class="card" style="border-radius: 10px">
                                                            <h5 class="center" style="padding-top: 20px">Pensiones Registradas</h5>
                                                            <table class="table centered" id="areas_activas">
                                                                <thead style="font-size: 20px; text-align: center">
                                                                    <tr>
                                                                        <th>Nombre</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $pensiones = $data->getAllPensiones();

                                                                    foreach ($pensiones as $key) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $key['nombre'] ?></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div>
                <a target="_blank" href="Prueba.php">Pruebame</a>
            </div>-->
        </section>
        <script>
            $(document).ready(function () {
                M.updateTextFields();
            });
            $(document).ready(function () {
                $('.collapsible').collapsible();
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
