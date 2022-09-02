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
        <title>Listado de Usuarios</title>
        <link rel="icon" href="IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
        <link rel="stylesheet" href="Materialize/css/styleSideBar.css">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>

        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

    </head>
    <body>
        <div class="sidebar ">
            <div class="logo-details">
                <div class="logo_name">Fundación Inclusiva</div>
                <i class='bx bx-menu' id="btn" ></i>        
            </div>
            <ul class="nav-list">
                <li>
                    <a href="#">
                        <i class='bx bx-user' ></i>
                        <span class="links_name">Usuarios</span>
                    </a>
                    <span class="tooltip">Usuarios</span>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-calendar'></i>
                        <span class="links_name">Calendario Mensual</span>
                    </a>
                    <span class="tooltip">Calendario Mensual</span>
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
                        <a href="controller/controllerLogout.php"><i class='bx bx-log-out' id="log_out" ></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <section class="home-section" style="background-image: url(IMG/4.jpg); background-attachment: fixed; background-size: cover">
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
                    <div class="col s12">
                        <div class="card" style="border-radius: 10px">
                            <h4 style="padding-top: 10px; padding-left: 10px" class="center">Usuarios Registrados</h4>
                            <table class="table centered" id="usuarios">
                                <thead style="font-size: 20px; text-align: center">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $table = $data->getAllUsers();
                                    $contador = 1;

                                    foreach ($table as $key) {
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
            <!-- <div>
                <a target="_blank" href="Prueba.php">Pruebame</a>
            </div>-->
        </section>
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
        <script>
            $(document).ready(function () {
                $('#usuarios').DataTable();
            });
        </script>
    </body>
</html>
