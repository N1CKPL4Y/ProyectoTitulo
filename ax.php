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
        <title>Registrar Nuevo Usuario</title>
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
                <a><div class="logo_name">Fundación Inclusiva</div></a>
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
        <section class="home-section" style="background-color: #C8E6C9; background-attachment: fixed; background-size: cover">
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
                            <h4 class="center" style="padding-top: 10px; padding-left: 10px">Registro Nuevos Usuarios</h4>
                            <div class="row">
                                <div class="col s10 offset-s1">
                                    <form method="post" action="../controller/controllerRegistroUsuarios.php" name="IngUser" style="margin-left: 15px;">
                                        <div class="row" style="background-color: #C8E6C9; padding: 2%; border-radius: 10px">
                                            <div class="col s12">
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="input-field col s12 m5 l12">
                                                            <input id="rut" type="text" name="txt_rut" class="validate" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)" required="">
                                                            <label for="rut">R.U.T</label>
                                                            <span style="color: grey">Si el R.U.T termina con K, reemplacelo con un 0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="input-field col s12 m5 l12">
                                                            <input id="nombreUser" type="text" name="txt_nombre" class="validate" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required="">
                                                            <label for="nombreUser">Nombres</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12 m5 l12">
                                                            <input id="apellidoUser" type="text" name="txt_apellido" class="validate" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required="">
                                                            <label for="apellidoUser">Apellidos</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="input-field col s12 m5 l12">
                                                            <input id="correo" type="text" name="txt_correo" class="validate" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required="">
                                                            <label for="correo">Correo Electronico</label>
                                                            <span id="emailVal" style="color: gray"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12 m5 l12">
                                                            <input id="passwdUser" type="password" name="txt_pass" class="validate" maxlength="8" minlength="4" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required="">
                                                            <label for="passwdUser">Contraseña</label>
                                                            <span style="color: grey">La contraseña debe tener minimo 4 caracteres y maximo 8 caracteres</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="input-field col s12 m5 l12">
                                                            <input id="telefonoUser" type="text" name="telefono" class="validate" maxlength="9" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required="">
                                                            <label for="telefonoUser">Numero de Telefono</label>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" >
                                                            <select name="cbo_tUser">
                                                                <option value="" disabled selected>Seleccione el tipo de usuario</option>
                                                                <?php
                                                                $tipoU = $data->getAllT_users();
                                                                foreach ($tipoU as $key) {
                                                                    echo '<option value="' . $key['id'] . '" id="options">' . $key['nombre'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col s6">
                                                        <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" >
                                                            <select name="cbo_aUser">
                                                                <option value="" disabled selected>Seleccione el area del usuario</option>
                                                                <?php
                                                                $areaU = $data->getAllA_users();
                                                                foreach ($areaU as $key) {
                                                                    echo '<option value="' . $key['id'] . '" id="options">' . $key['nombre'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col s6">
                                                        <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" >
                                                            <select name="cbo_cUser">
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 center">
                                                <button class="btn light-green darken-3" type="submit" name="action" style="margin-bottom: 10px; margin-top: 10px">Registrar Nuevo Usuario</button>
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
        <script type="text/javascript">
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
            $(function () {
                $("input#rutT").rut({
                    formatOn: 'keyup',
                    minimumLength: 8, // validar largo mínimo; default: 2
                    validateOn: 'change' // si no se quiere validar, pasar null
                });

                var input = document.getElementById('rutT');
                input.addEventListener('input', function () {
                    if (this.value.length >= 13)
                        this.value = this.value.slice(0, 12);
                })
            })
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
        <script>
            $(document).ready(function () {
                $('select').formSelect();
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
