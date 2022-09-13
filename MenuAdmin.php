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

<html lang="en" dir="ltr">
    <head>
        <title>Menú Administrador</title>
        <link rel="icon" href="IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="js/validarut.js"></script>
        <script src="js/jquery.rut.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="Materialize/css/styleSideBar.css">
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <div class="sidebar open" >
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px">Fundación Inclusive</div></a>
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
            <nav class="center">
                <div class="nav-wrapper" style="background-color: #00526a">
                    <div class="container center">
                        <a style="font-size: 30px;color: white;padding-left: 500px">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="IMG/iconNavbar.png"/>
                        <a style="font-size: 30px;color: white;">Fenix</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Understood</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card" style="border-radius: 10px">
                            <div class="card-header">
                                <h3 class="card-title">Usuarios Registrados</h3>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-md-center">
                                    <div class="col-sm-4 col-md-8">
                                        <table id="myTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>R.U.T</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Correo</th>
                                                    <th>Telefono</th>
                                                    <th>Tipo de usuario</th>
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
                                                    $datos = $key['rut'] . "||"
                                                            . $key['nombre'] . "||"
                                                            . $key['apellido'] . "||"
                                                            . $key['correo'] . "||"
                                                            . $key['telefono'] . "||"
                                                            . $key['tipo usuario'] . "||"
                                                            . $key['area usuario'] . "||"
                                                            . $key['cargo'] . "||"
                                                            . $key['activo'];

                                                    echo '<tr>';
                                                    echo '<td>' . $key['rut'] . '</td>';
                                                    echo '<td>' . $key['nombre'] . '</td>';
                                                    echo '<td>' . $key['apellido'] . '</td>';
                                                    echo '<td>' . $key['correo'] . '</td>';
                                                    echo '<td>' . $key['telefono'] . '</td>';
                                                    echo '<td>' . $key['tipo usuario'] . '</td>';
                                                    echo '<td>' . $activo . '</td>';
                                                    echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-pencil-square"></i></td>';
                                                    echo '</tr>';
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
        </section>
        <script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="AdminLTE/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="AdminLTE/plugins/jszip/jszip.min.js"></script>
        <script src="AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="AdminLTE/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <!--<script src="AdminLTE/dist/js/demo.js"></script>-->
        <script>
            document.getElementById('emailU').addEventListener('input', function () {
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
            $(function () {
                $("#myTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                    "language": {
                        "lengthMenu": "Mostrar " + '<select style="backgound-size:5px;"><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option></select>' + " registros por página",
                        "zeroRecords": "No se han encontrado registros",
                        "info": "Mostrando la página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate": {
                            'next': 'Siguiente',
                            'previous': 'Anterior',
                        }
                    }
                }).buttons().container().appendTo('#myTable_wrapper .col-md-6:eq(0)');
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
