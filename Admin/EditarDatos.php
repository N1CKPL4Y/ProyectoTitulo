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

        <!-- CSS only -->
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <!-- Boxicons CDN Link -->
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <div class="sidebar open">
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px; padding-left: 15px">Fundación Inclusiva</div></a>       
            </div>
            <ul class="nav-list" style="margin-left: -2rem;">
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
            <nav class="center">
                <div class="nav-wrapper" style="background-color: #00526a">
                    <div class="container" style="display: flex; align-items: center; justify-content: center;">
                        <a style="font-size: 30px;color: white">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="../IMG/iconNavbar.png"/>
                        <a style="font-size: 30px;color: white;">Fénix</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid" style="padding-top: 30px">
                <div class="row">
                    <div class="col s10 offset-s1">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header Header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: white">
                                            Agregar / Habilitar / Deshabilitar Áreas de usuario
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body Cuerpo">
                                        <div class="row">
                                            <form action="../controller/controllerRegistroNArea.php" method="post">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-10">
                                                        <div class="form-group">
                                                            <input type="text" name="txt_narea" placeholder="Ingrese nombre del Area" class="form-control" id="nArea" aria-describedby="narea" required="">
                                                            <small id="narea" class="form-text text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-10">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn submit">Registrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <span style="color: grey">Estas areas corresponden a las areas que posee cada profesional y practicante</span>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-10">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead class="HeaderModal" style="font-size: 20px; text-align: center">
                                                            <tr>
                                                                <th>Areas Habilitadas</th>
                                                                <th>Deshabilitar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center">
                                                            <?php
                                                            $AreaA = $data->getAreasActivas();

                                                            foreach ($AreaA as $key) {
                                                                $id_a = $key['id'];
                                                                ?>
                                                                <tr>
                                                                    <td hidden=""><?php echo $key['id'] ?></td>
                                                                    <td><?php echo $key['nombre'] ?></td>
                                                                    <td><?php echo '<a href="../controller/controllerUpdateArea.php?id=' . $id_a . '&p=0"><button name="btn_deshabilitar" class="btn submit">Deshabilitar</button></a>' ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-10">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead class="HeaderModal" style="font-size: 20px; text-align: center">
                                                            <tr>
                                                                <th>Areas Deshabilitadas</th>
                                                                <th>Habilitar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center">
                                                            <?php
                                                            $AreaNA = $data->getAreasNoActivas();

                                                            foreach ($AreaNA as $key) {
                                                                $id_a = $key['id'];
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $key['nombre'] ?></td>
                                                                    <td><?php echo '<a href="../controller/controllerUpdateArea.php?id=' . $id_a . '&p=1"><button name="btn_deshabilitar" class="btn submit">habilitar</button></a>' ?></td>
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
                            <div class="card">
                                <div class="card-header Header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: white">
                                            Agregar Condiciones nuevas
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body Cuerpo">
                                        <div class="row">
                                            <form action="../controller/controllerRegistroNCondicion.php" method="post">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-10">
                                                        <div class="form-group">
                                                            <input type="text" name="txt_nCondicion" placeholder="Ingrese nombre de la condición" class="form-control" id="nCondicion" aria-describedby="ncondicion" required="">
                                                            <small id="ncondicion" class="form-text text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-10">
                                                        <div class="form-group">
                                                            <input type="text" name="txt_nCodigo" placeholder="Ingrese el codigo de la condición" class="form-control" id="nCondigo" aria-describedby="ncodigo" required="">
                                                            <small id="ncodigo" class="form-text text-muted"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-10 center">
                                                        <div class="form-group">
                                                            <label>Ingrese la descripción de la condición</label>
                                                            <textarea class="form-control" id="textdesc" name="descripcion"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-2 col-sm-10 center">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn submit">Registrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <span style="color: grey">Estas condiciones estan asociadas a cada beneficiario registrado en el sistema</span>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-10 center">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead class="HeaderModal" style="font-size: 20px; text-align: center">
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Código</th>
                                                                <th>Descripción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center">
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
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header Header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: white">
                                            Agregar Pensiones
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body Cuerpo">
                                        <div class="row">
                                            <form action="../controller/controllerRegistroNPension.php" method="post">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-10">
                                                        <div class="form-group">
                                                            <input type="text" name="txt_nPension" placeholder="Ingrese nombre de la Pensión" class="form-control" id="nPension" aria-describedby="npension" required="">
                                                            <small id="npension" class="form-text text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-10 center">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn submit">Registrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <span style="color: grey">Estas pensiones estan asociadas a los beneficiarios registrados en el sistema</span>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-lg-12" style="display: flex; align-items: center; justify-content: center;">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead class="HeaderModal" style="font-size: 20px; text-align: center">
                                                            <tr>
                                                                <th>Pensiones Registradas</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center">
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
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header Header" id="headingThree" style="background-color: #558b2f">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree" style="color: white">
                                            Agregar Areas de Especialistas
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body Cuerpo">
                                        <div class="row">
                                            <form action="../controller/controllerRegistroNEsp.php" method="post">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-10">
                                                        <div class="form-group">
                                                            <input type="text" name="txt_nEsp" placeholder="Ingrese Nombre del area del especialista" class="form-control" id="nEsp" aria-describedby="nEsp" required="">
                                                            <small id="nEsp" class="form-text text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-10 center">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn submit">Registrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <span style="color: grey">Estas areas de especialistas corresponden a los especialistas que derivan al beneficiario previo al registro en el sistema</span>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12" style="display: flex; align-items: center; justify-content: center;">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead class="HeaderModal" style="font-size: 20px; text-align: center">
                                                            <tr>
                                                                <th>Areas de Especialistas registradas</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center">
                                                            <?php
                                                            $esp = $data->getAllEspecialista();

                                                            foreach ($esp as $key) {
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $('document').ready(function () {
                $('#collapseOne').collapse({
                    toggle: false
                })
            });
        </script>
         <!-- <script>
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
        </script> -->
    </body>
</html>
