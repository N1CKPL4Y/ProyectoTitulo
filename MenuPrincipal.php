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

if ($correo == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="icon" href="IMG/IconAveFenix.png"/>
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="Materialize/js/materialize.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <title>Menu Administrador</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css"/>
    </head>
    <body style="background-color: white; background-image: url(IMG/FondoLogin.png); background-attachment: fixed; background-size: cover" >
        <section>
            <nav class="nav-extended" style="background-color: #1d1b31;">
                <div class="nav-wrapper">
                    <a id="menu" href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons" style="font-size: 35px">menu</i></a>
                    <img src="IMG/IconAveFenix.png">
                    <span class="brand-logo">Menu Admin</span>
                </div>
            </nav>
            <ul id="slide-out" class="sidenav" style="background-color: #1d1b31;">
                <li><div class="user-view">
                        <div class="background" style="background-color: #1d1b31;">
                        </div>
                        <a href="#user"><img class="circle" src="IMG/IconAveFenix.png"></a>
                        <a href="#name"><span class="white-text name" style="font-size: 20px"><?php echo $nombre . ' ' . $apellido ?></span></a>
                        <a href="#email"><span class="white-text email" style="font-size: 14px"><?php echo $correo ?></span></a>
                    </div></li>
                <li><div class="divider"></div></li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect"><i class='bx bx-data white-text' style="font-size: 27px;"></i>Base de datos<i class="material-icons right white-text" style="font-size: 30px;">arrow_drop_down</i></a>
                        <div class="collapsible-body" style="background-color: #1d1b31">
                            <ul>
                                <li><a href="backup.php"><i class='bx bx-file white-text' style="font-size: 22px;"></i>Respaldo</a></li>
                                <li><a href="VistaAdmin/vistaDB.php"><i class="uil uil-eye white-text" style="font-size: 22px; transform: translateY(14px)"></i>Visualizar tablas</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <li><div class="divider"></div></li>
                <li><a href="Controller/controllerLogOut.php" class="waves-effect">Cerrar sesión<i class='bx bx-log-out white-text' style="font-size: 27px;"></i></a></li>
            </ul>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div id="modalAgregar" class="modal">
                            <div class="modal-content">
                                <h4>Agregar nuevo usuario</h4>
                                <div class="row">
                                    <form class="col s12 grey lighten-3" name="datosUser" style="padding: 20px; border-radius: 10px" method="post" >
                                        <div class="row">
                                            <div class="input-field col s12 m5 l6">
                                                <input id="rut" type="text" name="txt_rut" onchange="javascript:return Rut(document.datosUser.txt_rut.value)" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required>
                                                <label for="txt_rut">Rut</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12 m5 l6">
                                                <input id="nombre" type="text" name="txt_nombre" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required="">
                                                <label for="txt_nombre">Nombre</label>
                                            </div>
                                            <div class="input-field col s12 m5 l6">
                                                <input id="apellido" type="text" name="txt_apellido" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required="">
                                                <label for="txt_apellido">Apellido</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12 m5 l6">
                                                <input id="email" type="text" name="txt_email" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required="">
                                                <label for="txt_email">Email</label>
                                            </div>
                                            <div class="input-field col s12 m5 l6">
                                                <input id="telefono" type="text" name="txt_telefono" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" required>
                                                <label for="txt_telefono">Telefono</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s10 m5 l5" style="background-color: white; border-radius: 5px; margin-left: 12px">
                                                <select name="cbo_area" id="area" required>
                                                    <option value="0">-- Seleccionar --</option>
                                                    <?php
                                                    $area = $data->getArea();

                                                    foreach ($area as $key) {
                                                        echo '<option value="' . $key['id'] . '">' . $key['nombre'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="input-field col s10 m5 l5" style="background-color: white; border-radius: 5px; margin-left: 12px">
                                                <select name="cbo_tipo" id="tipo" required>
                                                    <option value="0">-- Seleccionar --</option>
                                                    <?php
                                                    $tipo = $data->getTypeUser();

                                                    foreach ($tipo as $key) {
                                                        echo '<option value="' . $key['id'] . '">' . $key['nombre'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer center">
                                <button id="agregarUsuario" type="button" class="modal-close waves-effect waves-light btn blue darken-3">Agregar Nuevo Usuario</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div id="modalEditar" class="modal">
                            <div class="modal-content">
                                <h4>Editar Datos</h4>
                                <div class="row">
                                    <form class="col s12 grey lighten-3" style="padding: 20px; border-radius: 10px">
                                        <div class="row">
                                            <div class="input-field col s12 m5 l6">
                                                <input placeholder="" id="rutEdite" type="text" name="txt_rut" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" readonly>
                                                <label for="txt_rut">Rut</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12 m5 l6" >
                                                <input placeholder="" id="nombreE" type="text" name="txt_nombre" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" readonly>
                                                <label for="txt_nombre">Nombre</label>
                                            </div>
                                            <div class="input-field col s12 m5 l6">
                                                <input placeholder="" id="apellidoE" type="text" name="txt_apellido" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;" readonly>
                                                <label for="txt_apellido">Apellido</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12 m5 l6">
                                                <input placeholder="" id="emailE" type="text" name="txt_email" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;">
                                                <label for="txt_email">Email</label>
                                            </div>
                                            <div class="input-field col s12 m5 l6">
                                                <input placeholder="" id="telefonoE" type="text" name="txt_telefono" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;">
                                                <label for="txt_telefono">Telefono</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12 m5 l6">
                                                <input placeholder="" id="areaE" type="text" name="txt_area" style="background-color: white; border-radius: 50px; border-bottom: none; text-indent: 18px;">
                                                <label for="txt_area">Area Actual</label>
                                            </div>
                                            <div class="input-field col s10 m5 l5" style="background-color: white; border-radius: 5px; margin-left: 12px">
                                                <select name="cbo_area" id="areaN" required>Nueva Area
                                                    <option value="0">-- Seleccionar --</option>
                                                    <?php
                                                    $area = $data->getArea();

                                                    foreach ($area as $key) {
                                                        echo '<option value="' . $key['id'] . '">' . $key['nombre'] . '</option>';
                                                    }
                                                    ?>
                                                </select><label for="areaN">Nueva Area</label>
                                            </div>
                                        </div>
                                        <div class="row">


                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer center">
                                <button id="actualizar" type="button" class="modal-close waves-effect waves-light btn blue darken-3">Actualizar Usuario</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container_menu_seg">
                <div class="row">
                    <div class="col s12 m9 l9">
                        <div class="card" style="margin: 40px auto; max-width: 1680px; width: 100%; border-radius: 10px;">
                            <div class="card-content" style="margin: 20px 100px; padding: 3.5% 0">
                                <span class="table_Tit center" style="display: block; margin: 30px 0">Listado de usuarios</span>
                                <table class="table centered responsive-table" id="datos">
                                    <thead align="center">
                                        <tr>
                                            <th>R.U.T</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Area</th>
                                            <th>Tipo de usuario</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $users = $data->getAllusers();
                                        foreach ($users as $key) {
                                            $datos = $key['rut'] . "||" .
                                                    $key['nombre'] . "||" .
                                                    $key['apellido'] . "||" .
                                                    $key['email'] . "||" .
                                                    $key['telefono'] . "||" .
                                                    $key['area'] . "||" .
                                                    $key['tipo'];
                                            echo '<tr>';
                                            echo '<td>' . $key['rut'] . '</td>';
                                            echo '<td>' . $key['nombre'] . '</td>';
                                            echo '<td>' . $key['apellido'] . '</td>';
                                            echo '<td>' . $key['email'] . '</td>';
                                            echo '<td>' . $key['telefono'] . '</td>';
                                            echo '<td>' . $key['area'] . '</td>';
                                            echo '<td>' . $key['tipo'] . '</td>';
                                            echo '<td><button data-target="modalEditar" class="btn modal-trigger" onclick="cargarDatos(' . $datos . ');" style="background-color: #fbc02d; "><i class="material-icons">create</i></button></td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="container center" style="margin: 2.5% auto">
                                    <button data-target="modalAgregar" class="btn modal-trigger center blue darken-3">Agregar Nuevo Usuario</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m3 l3">
                        <div class="card" style="margin: 40px auto; max-width: 1280px; width: 100%; border-radius: 10px;">
                            <br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="page-footer" style="background-color: transparent">
            <div class="footer-copyright" style="background-color: #1d1b31">
                <div class="container center">
                    SGV © Derechos Reservados - 2022
                </div>
                <select>
                    <option selected>text1</option>
                    <option value="second">text2</option>
                    <option value="third">text3</option>
                </select>

            </div>
        </footer>   
        <script src="js/script.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                M.AutoInit();
            });
            $(document).ready(function () {
                $('.sidenav').sidenav();
            });
        </script>
        
    </body>
</html>
