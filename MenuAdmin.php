<?php
error_reporting(E_NOTICE ^ E_ALL);

include_once 'DB/Model_Data.php';
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
        <title>Menú Administrador</title>
        <link rel="icon" href="IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="js/validarut.js"></script>
        <script src="js/jquery.rut.js"></script>
        <script src="Materialize/js/materialize.js"></script>

        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="Materialize/css/styleSideBar.css">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css"/>

    </head>
    <body>
        <div class="sidebar open">
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px">Fundación Inclusiva</div></a>
                <i class='bx bx-menu' id="btn" ></i>        
            </div>
            <ul class="nav-list">
                <li>
                    <a href="Admin/RNuevoUsuario.php">
                        <i class="material-icons">person_add</i>
                        <span class="links_name">Registrar Usuarios</span>
                    </a>
                    <span class="tooltip">Registrar Usuarios</span>
                </li>
                <li>
                    <a href="Admin/VisBeneficiario.php">
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
                    <a href="Admin/EditarDatos.php">
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
            <nav>
                <div class="nav-wrapper" style="background-color: #00526a">
                    <div class="container center">
                        <a style="font-size: 30px">Ave</a>
                        <img src="IMG/iconNavbar.png"/>
                        <a style="font-size: 30px">Fenix</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s6" style="z-index: 10000">
                        <div id="modalEdit" class="modal">
                            <div class="modal-content">
                                <h2 class="center">Editar Datos de Usuario</h2>
                                <form class="col s12 green lighten-4" action="action" style="border-radius: 10px; margin-bottom: 20px">
                                    <div class="row">
                                        <div class="col s6">
                                            <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 10px">
                                                <input id="nombresU" name="nombresU" type="text" class="validate">
                                                <label for="nombresU">Nombres del usuario</label>
                                            </div>
                                        </div>
                                        <div class="col s6">
                                            <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 10px">
                                                <input id="apellidosU" name="apellidosU" type="text" class="validate">
                                                <label for="apellidosU">Apellidos del usuario</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s6">
                                            <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 10px">
                                                <input id="emailU" name="emailU" type="text" class="validate">
                                                <label for="emailU">correo electronico del usuario</label>
                                            </div>
                                        </div>
                                        <div class="col s6">
                                            <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 10px">
                                                <input id="passU" name="passU" type="password" class="validate">
                                                <label for="passU">Contraseña del usuario</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s6">
                                            <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 10px">
                                                <input id="telefonoU" name="telefonoU" type="text" class="validate">
                                                <label for="telefonoU">telefono del usuario</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s6">
                                            <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 10px">
                                                <input id="tipoU" name="tipoU" type="text" class="validate">
                                                <label for="tipoU">Tipo de usuario actual</label>
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
                                            <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 10px">
                                                <input id="areaU" name="areaU" type="text" class="validate">
                                                <label for="areaU">Area actual del usuario</label>
                                            </div>
                                        </div>
                                        <div class="col s6">
                                            <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 50px" >
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
                                    </div>
                                    <div class="row">
                                        <div class="col s6">
                                            <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 10px">
                                                <input id="cargoU" name="cargoU" type="text" class="validate">
                                                <label for="cargoU">Cargo actual del usuario</label>
                                            </div>
                                        </div>
                                        <div class="col s6">
                                            <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 50px">
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
                                    <div class="row">
                                        <div class="col s6">
                                            <div class="input-field col s12 m5 l12" style="background-color: white; border-radius: 10px">
                                                <input id="estadoU" name="estadoU" type="text" class="validate">
                                                <label for="estadoU">Estado actual del usuario</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s6">
                                            <h3 id="desactivar">¿Desea desactivar/activar el usuario?</h3>
                                        </div>
                                        <div class="col s6">
                                            <p class="col s2" style="background-color: white; border-radius: 50px">
                                                <label>
                                                    <input class="with-gap" id="Si" value="0" name="desactivar" type="radio"  />
                                                    <span>Si</span>
                                                </label>
                                            </p>
                                            <p class="col s2" style="background-color: white; border-radius: 50px">
                                                <label>
                                                    <input class="with-gap" id="No" value="1" name="desactivar" type="radio"  />
                                                    <span>No</span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 center">
                                            <button class="btn light-green darken-3" type="submit" name="action" style="margin-bottom: 10px; margin-top: 10px">Editar Usuario</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="card" style="border-radius: 10px">
                            <h4 style="padding-top: 10px; padding-left: 10px" class="center">Usuarios Registrados</h4>
                            <div class="row">
                                <div class="col s10 offset-s1">
                                    <table id="myTable" class="display" >
                                        <thead>
                                            <tr>
                                                <th>R.U.T</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Correo</th>
                                                <th>Telefono</th>
                                                <th>Tipo de usuario</th>
                                                <th>Area del Usuario</th>
                                                <th>Cargo</th>
                                                <th>Activo</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $table = $data->getAllUsers();
                                            $contador = 1;

                                            foreach ($table as $key) {
                                                $info = $key['rut'];
                                                $activo;
                                                switch ($key['activo']) {
                                                    case 0:
                                                        $activo = 'No';
                                                        break;
                                                    case 1:
                                                        $activo = 'Si';
                                                        break;
                                                    default:
                                                        break;
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $key['rut'] ?></td>
                                                    <td><?php echo $key['nombre'] ?></td>
                                                    <td><?php echo $key['apellido'] ?></td>
                                                    <td><?php echo $key['correo'] ?></td>
                                                    <td><?php echo $key['telefono'] ?></td>
                                                    <td><?php echo $key['tipo usuario'] ?></td>
                                                    <td><?php echo $key['area usuario'] ?></td>
                                                    <td><?php echo $key['cargo'] ?></td>
                                                    <td><?php echo $activo ?></td>
                                                    <td><button data-target="modalEdit" class="btn light-green darken-3 modal-trigger">Modal</button></td>
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
                </div>

            </div>
            <!-- <div>
                <a target="_blank" href="Prueba.php">Pruebame</a>
            </div>-->
        </section>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                M.AutoInit();
            });
        </script>
        <script>

            $(document).ready(function () {

                $('#myTable').DataTable({
                    responsive: true,
                    autoWidth: true,
                    "language": {
                        "lengthMenu": "Mostrar " + '<select><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option></select>' + " registros por página",
                        "zeroRecords": "No se han encontrado registros",
                        "info": "Mostrando la página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate": {
                            'next': 'Siguiente',
                            'previous': 'Anterior',
                        },
                    }
                });

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
