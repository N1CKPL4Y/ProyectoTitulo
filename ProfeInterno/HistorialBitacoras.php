<?php
session_start();
error_reporting(E_NOTICE ^ E_ALL);

include_once '../DB/Model_Data.php';
include_once '../controller/traduccionfecha.php';
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$passwd = $_SESSION['passwd'];
$correo = $_SESSION['email'];
$area_u = $_SESSION['area_u'];
$tipo_u = $_SESSION['tipo_u'];
$cargo = $_SESSION['cargo'];

if ($correo == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
}
$data = new Data();
$areas = $data->getAreaById($area_u);
$a_usuario;
foreach ($areas as $value) {
    $a_usuario = $value['nombre'];
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bitacoras Registradas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
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
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <?php
        if ($_SESSION['cargo'] == 4) {
            ?>
            <div class="sidebar open" >
                <div class="logo-details">
                    <a><div class="logo_name" style="font-size: 19px; padding-left: 23px">Fundación Inclusiva</div></a>       
                </div>
                <ul class="nav-list">
                    <li>
                        <a href="../MenuInterno.php">
                            <i class='bx bx-home' ></i>
                            <span class="links_name">Vover a Inicio</span>
                        </a>
                        <span class="tooltip">Volver a Inicio</span>
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
                                <div class="name"><?php echo $a_usuario ?></div>
                                <div class="job"><?php echo $correo ?></div>
                            </div>
                            <a><i id="log_out"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
            <?php
        } else if ($_SESSION['cargo'] == 3) {
            ?>
            <div class="sidebar open" >
                <div class="logo-details">
                    <a><div class="logo_name" style="font-size: 19px; padding-left: 23px">Fundación Inclusiva</div></a>       
                </div>
                <ul class="nav-list">
                    <li>
                        <a href="../MenuProfesional.php">
                            <i class='bx bx-home' ></i>
                            <span class="links_name">Vover a Inicio</span>
                        </a>
                        <span class="tooltip">Volver a Inicio</span>
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
                                <div class="name"><?php echo $a_usuario ?></div>
                                <div class="job"><?php echo $correo ?></div>
                            </div>
                            <a><i id="log_out"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
            <?php
        }
        ?>
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
                    <div class="row justify-content-around">
                        <div class="col-sm-12 col-md-10 col-lg-10" style="padding-top: 15px">
                            <div class="card text-center">
                                <form method="post">
                                    <div class="card-header Header">
                                        <h4>Bitacoras registradas</h4>
                                    </div>
                                    <div class="card-body Cuerpo">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rut</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="txt_rut" id="rut" required placeholder="11.111.111-1" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <button type="submit" class="btn btn-block submit" name="btn_buscar">Buscar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-around" style="padding-top: 15px">
                        <?php
                        if (isset($_POST['btn_buscar'])) {
                            $rutBusqueda = isset($_POST['txt_rut']) ? $_POST['txt_rut'] : null;
                            //echo $rutBusqueda;
                            if (!empty($rutBusqueda)) {
                                //$existe = $data->getExisBitacora($rutBusqueda);
                                $bitacoras = $data->getBitacora($rutBusqueda, $rut);
                                
                                if (mysqli_num_rows($bitacoras) > 0) {
                                    $cont = 1;
                                    ?>
                                    <div class = "col-sm-12 col-md-10 col-lg-10">
                                        <div class = "card text-center">
                                            <div class = "card-header">
                                                Registro
                                            </div>
                                            <div class = "card-body">
                                                <?php
                                                foreach ($bitacoras as $value) {
                                                    $fecha = $value['fecha'];
                                                    $fechaB = fechaEsp($fecha);
                                                    ?>
                                                    <div class="row justify-content-around">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <a role="button" target="_blank" href="../controller/controllerBitacoraPDF.php?id=<?php echo $value['id']; ?>">
                                                                <i class='bx bxs-file-pdf'></i>Bitacora de Atención N° <?php echo $cont . " Codigo: " . $value['beneficiario']; ?> - Programa <?php echo $value['programa']; ?> - Fecha: <?php echo $fechaB; ?> / Hora: <?php echo $value['hora']; ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $cont += 1;
                                                }
                                                ?>
                                            </div>
                                            <div class = "card-footer text-muted">
                                                ...
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class = "col-sm-12 col-md-6 col-lg-6">
                                        <div class = "card text-center">
                                            <div class = "card-header">
                                                Registro
                                            </div>
                                            <div class = "card-body">
                                                <h5 class = "center">No existe un beneficiario asociado al rut indicado</h5>
                                            </div>
                                            <div class = "card-footer text-muted">
                                                ...
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                
                            }
                        } else {
                            
                        }
                        ?>
                    </div>
                </div>
            </section>
        </section>
    </body>
    <script>
        $(function () {
            $("input#rut").rut({
                formatOn: 'keyup',
                minimumLength: 8, // validar largo mínimo; default: 2
                validateOn: 'change' // si no se quiere validar, pasar null
            });

            var input = document.getElementById('rut');
            input.addEventListener('input', function () {
                if (this.value.length >= 13)
                    this.value = this.value.slice(0, 12);
            })
        })
    </script>
</html>
