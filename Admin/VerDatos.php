<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
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

$rutBen = isset($_GET['rut']) ? $_GET['rut'] : null;
?>
<html>
    <head>
        <title>Datos Beneficiario</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
        <link rel="stylesheet" href="../Materialize/css/materialize.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!--<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>-->
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css"/>-->
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
                    <a href="#">
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
            <?php
            $rutBase;
            $nombBase;
            $apelBase;
            $fechBase;
            $direBase;
            $comuBase;
            $geneBase;
            $prevBase;
            $imgBase;
            $teleBase;
            $pensBase;
            $chilBase;
            $regiBase;

            $resulData = $data->getBenefi($rutBen);
            foreach ($resulData as $key) {
                $rutBase = $key['RUT'];
                $nombBase = $key['nombre'];
                $apelBase = $key['apellido'];
                $fechBase = $key['fecha_nac'];
                if ($key['genero'] == 1) {
                    $geneBase = "Masculino";
                } else if ($key['genero'] == 2) {
                    $geneBase = "Femenino";
                } else {
                    $geneBase = "Otro";
                }
                $direBase = $key['direccion'];
                $comuBase = $key['comuna'];
                $imgBase = $key['c_identidad'];
                $teleBase = $key['teleton'];
                $pensBase = $key['pension'];
                $chilBase = $key['chile_solidario'];
                $regiBase = $key['r_s_hogares'];
                $prevBase = $key['prevision'];
            }

            $sisPrev = $data->getPrevForId($prevBase);
            $textPrev;
            foreach ($sisPrev as $value1) {
                $textPrevi = $value1['nombre'];
            }
            if ($pensBase == 1) {
                $sispens = $data->getAllPensionesForRut($rutBase);
                $textPens;

                foreach ($sispens as $value) {
                    $textPens = $value['nombre'];
                }
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s10 offset-s1">
                        <div class="card" style="border-radius: 10px">
                            <h3 style="padding-top: 10px; padding-left: 10px" class="center"><?php echo $rutBase; ?></h3>
                            <h4 style="padding-left: 10px" class="center"><?php echo $nombBase . " " . $apelBase; ?></h4>
                            <div class="row">
                                <div class="col s10 offset-s1">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col s6">
                                                <div class="input-field col s12">
                                                    <input id="nArea" type="text" name="txt_narea" value="<?php echo $fechBase; ?>" class="validate" style="background-color: white; border-radius: 10px" readonly>
                                                    <!--<label for="nArea">Fecha de nacimiento</label>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s6">
                                                <div class="input-field col s12">
                                                    <input id="nArea" type="text" name="txt_narea" value="<?php echo $direBase; ?>" class="validate" style="background-color: white; border-radius: 10px" readonly>
                                                    <!--<label for="nArea">Fecha de nacimiento</label>-->
                                                </div>
                                            </div>
                                            <div class="col s6">
                                                <div class="input-field col s12">
                                                    <input id="nArea" type="text" name="txt_narea" value="<?php echo $comuBase; ?>" class="validate" style="background-color: white; border-radius: 10px" readonly>
                                                    <!--<label for="nArea">Fecha de nacimiento</label>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s6">
                                                <div class="input-field col s12">
                                                    <input id="nArea" type="text" name="txt_narea" value="<?php echo $geneBase; ?>" class="validate" style="background-color: white; border-radius: 10px" readonly>
                                                    <!--<label for="nArea">Fecha de nacimiento</label>-->
                                                </div>
                                            </div>
                                            <div class="col s6">
                                                <div class="input-field col s12">
                                                    <input id="nArea" type="text" name="txt_narea" value="<?php echo $textPrevi; ?>" class="validate" style="background-color: white; border-radius: 10px" readonly>
                                                    <!--<label for="nArea">Fecha de nacimiento</label>-->
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
        <script>
            $(document).ready(function () {
                M.updateTextFields();
            });
            $(document).ready(function () {
                $('.collapsible').collapsible();
            });
        </script>
    </body>

</html>
