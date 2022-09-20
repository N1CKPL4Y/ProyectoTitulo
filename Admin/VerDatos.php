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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
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
            <ul class="nav-list" style="margin-left: -2rem">
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
            <nav style="background-color: #00526a">
                <div class="nav-wrapper" >
                    <div class="container" style="display: flex; align-items: center; justify-content: center;">
                        <a style="font-size: 30px;color: white">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="../IMG/iconNavbar.png"/>
                        <a style="font-size: 30px;color: white;">Fenix</a>
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
            /* if ($pensBase == 1) {
              $sispens = $data->getAllPensionesForRut($rutBase);
              $textPens;

              foreach ($sispens as $value) {
              $textPens = $value['nombre'];
              }
              } */
            ?>
            <div class="container-fluid" style="padding-top: 10px; padding-bottom: 10px">
                <div class="row justify-content-around">
                    <div class="col-sm-12 col-md-10 col-lg-10">
                        <div class="card" style="border-radius: 10px">
                            <div class="card-header" style="display: flex; align-items: center; justify-content: center;">
                                <h3>Datos del beneficiario</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">R.U.T</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $rutBase; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Nombres</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $nombBase; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Apellidos</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $apelBase; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Fecha Nacimiento</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $fechBase; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Previsión</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $prevBase; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Dirección</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $direBase; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Comuna</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $comuBase; ?>" readonly="">
                                        </div>
                                    </div>
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
