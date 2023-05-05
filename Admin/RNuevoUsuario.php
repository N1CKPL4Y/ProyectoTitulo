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
        <title>Registrar Nuevo Usuario</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <script src="Materialize/js/funciones.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../Bootstrap/css/styleSideBar.css">

        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>
    </head>
    <body>
        <div class="sidebar open">
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px; padding-left: 23px">Fundación Inclusiva</div></a>       
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
                    <a href="../Secretaria/EntrevistaFamilia.php">
                        <i class='bx bx-home-heart'></i>
                        <span class="links_name">Entrevista a la Familia</span>
                    </a>
                    <span class="tooltip">Entrevista a la Familia</span>
                </li>
                <li>
                    <a href="EditarDatos.php">
                        <i class="material-icons">border_color</i>
                        <span class="links_name">Editar Datos</span>
                    </a>
                    <span class="tooltip">Editar Datos</span>
                </li>
                <li>
                    <a href="../C_Administrativo/Administrativo.php">
                        <i class='bx bx-calendar'></i>
                        <span class="links_name">Calendario Administrativo</span>
                    </a>
                    <span class="tooltip">Calendario Administrativo</span>
                </li>
                <li>
                    <a href="historialBitacora.php">
                        <i class='bx bx-library'></i>
                        <span class="links_name">Historial Bitacoras</span>
                    </a>
                    <span class="tooltip">Historial Bitacoras</span>
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
        <section class="home-section" style="background-image: url(../IMG/1.jpg); background-attachment: fixed; background-size: cover">
            <nav>
                <div class="nav-wrapper" style="background-color: #00526a">
                    <div class="container" style="display: flex; align-items: center; justify-content: center; color: white">
                        <a style="font-size: 30px">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="../IMG/iconNavbar.png"/>
                        <a style="font-size: 30px">Fénix</a>
                    </div>
                </div>
            </nav>  
            <div class="container-fluid" style="padding-top: 10px; padding-bottom: 10px"> 
                <div class="row justify-content-around">
                    <div class="col-sm-12 col-md-10 col-lg-10">
                        <div class="card" style="" style="background-color: #558b2f">
                            <div class="card-header" style="background-color: #558b2f">
                                <h4 class="center" style=" display: flex; align-items: center; justify-content: center;padding-top: 10px; padding-left: 10px; color: white">Registro Nuevos Usuarios</h4>
                            </div>
                            <div class="card-body" style="background-color: #C8E6C9">
                                <div class="row justify-content-around">
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <form method="post" action="../controller/controllerRegistroUsuarios.php" name="datosUser">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="rut_input">R.U.T</label>
                                                        <input type="text" class="form-control" name="txt_rut" id="rut_input" style="border-radius: 50px; text-indent: 18px;" onkeypress="return(event.charCode >= 48 && event.charCode <= 57) || event.charCode == 107" onchange="javascript:return Rut(document.datosUser.txt_rut.value)" required>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="nombre_U">Nombre</label>
                                                        <input type="text" class="form-control" name="txt_nombre" id="nombre_U" style="border-radius: 50px; text-indent: 18px;">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="apellido_U">Apellido</label>
                                                        <input type="text" class="form-control" name="txt_apellido" id="apellido_U" style="border-radius: 50px; text-indent: 18px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="correo">Correo electronico</label>
                                                        <input type="email" class="form-control" name="txt_correo" id="correo" style="border-radius: 50px; text-indent: 18px;">
                                                        <span id="emailVal" style="color: gray"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="pass_u">Contraseña</label>
                                                        <input type="password" class="form-control" name="txt_pass" maxlength="8" minlength="4" id="pass_u" style="border-radius: 50px; text-indent: 18px;">
                                                        <span style="color: grey; font-size: 14px">La contraseña debe tener minimo 4 caracteres y maximo 8 caracteres</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <label for="telefonoUser">Teléfono</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1" style="border-radius: 50px 0 0 50px;">+56</span>
                                                        </div>
                                                        <input type="number" name="telefono" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" class="form-control" id="telefonoUser" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 0 50px 50px 0;">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="tipo_user">Tipo de Usuario</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01" style="border-radius: 50px 0 0 50px;">Tipo</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect01" name="cbo_tUser" style="border-radius: 0 50px 50px 0;">
                                                                <option value="" disabled selected>Seleccione el tipo de usuario</option>
                                                                <?php
                                                                $tipoU = $data->getAllT_users();
                                                                foreach ($tipoU as $key) {
                                                                    echo '<option value="' . $key['id'] . '" id="options">' . utf8_encode($key['nombre']) . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: -15px; margin-left:  30px"> 
                                                        <span style="color: grey">Define el nivel de acceso del usuario</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="area_user">Area de Usuario</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01" style="border-radius: 50px 0 0 50px;">Area</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect01" name="cbo_aUser" style="border-radius: 0 50px 50px 0;">
                                                                <option value="" disabled selected>Seleccione el area del usuario</option>
                                                                <?php
                                                                $areaU = $data->getAllA_users();
                                                                foreach ($areaU as $key) {
                                                                    echo '<option value="' . $key['id'] . '" id="options">' . utf8_encode($key['nombre']) . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: -15px; margin-left:  30px"> 
                                                        <span style="color: grey">Define el Area a la que pertenece el usuario</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="apellido_U">Cargo del Usuario</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01" style="border-radius: 50px 0 0 50px;">Cargo</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect01" name="cbo_cUser" style="border-radius: 0 50px 50px 0;">
                                                                <option value="" disabled selected>Seleccione el cargo del usuario</option>
                                                                <?php
                                                                $cargo = $data->getAllCargos();
                                                                foreach ($cargo as $key) {
                                                                    echo '<option value="' . $key['id'] . '" id="options">' . $key['nombre'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div style="margin-top: -15px; margin-left:  30px"> 
                                                        <span style="color: grey">Define el modulo al que accederá el usuario</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-lg-center pt-5">
                                                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8">
                                                    <button type="submit" class="btn submit col-sm-12 col-md-12 col-lg-12 col-xl-12">Registrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js">
        </script>
        <script>
            $(function () {
                $("input#rut_input").rut({
                    formatOn: 'keyup',
                    minimumLength: 8, // validar largo mínimo; default: 2
                    validateOn: 'change' // si no se quiere validar, pasar null
                });

                var input = document.getElementById('rut_input');
                input.addEventListener('input', function () {
                    if (this.value.length >= 13)
                        this.value = this.value.slice(0, 12);
                })
            });

            document.getElementById('correo').addEventListener('input', function () {
                campo = event.target;
                valido = document.getElementById('emailVal');
                emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                //Se muestra un texto a modo de ejemplo, luego va a ser un icono

                if (emailRegex.test(campo.value)) {
                    valido.innerText = "Correo válido";
                } else {
                    valido.innerText = "Correo no válido";
                }
            }
            );
        </script>
    </body>
</html>