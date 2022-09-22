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

$benefs = $data->getAllBenefi();
?>
<html>
    <head>
        <title>Base de consultas</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>

        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>

    </head>
    <body>
        <div class="sidebar open" style="overflow: hidden !important">
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
            <div class="container-fluid" style="padding-top: 15px;">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="controller/controllerUpdateUser.php" method="Post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Editar Datos del Beneficiario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="rutU" class="col-sm-8 col-form-label">R.U.T del beneficiario</label>
                                                        <input type="text" name="txt_rut" class="form-control" id="rutU" aria-describedby="rut1" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)" readonly="">
                                                        <small id="rut1" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="nombreB" class="col-sm-8 col-form-label">Nombres del beneficiario</label>
                                                        <input type="text" name="nombreB" class="form-control" id="nombreB" aria-describedby="nombreB" readonly="">
                                                        <small id="nombreB" class="formtext text-muted"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="apellidoB" class="col-sm-8 col-form-label">Apellidos del beneficiario</label>
                                                        <input type="text" name="apellidoB" class="form-control" id="apellidoB" aria-describedby="apellidoB" readonly="">
                                                        <small id="apellidoB" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="direccionA" class="col-sm-10 col-form-label">Dirección actual del beneficiario</label>
                                                        <input type="text" name="direccionA" class="form-control" id="direccionA" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="direccionB" class="col-sm-10 col-form-label">Nueva dirección del beneficiario</label>
                                                        <input type="text" name="direccionB" class="form-control" id="direccionB">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="comunaA" class="col-sm-10 col-form-label">Comuna actual de residencia</label>
                                                        <input type="text" name="comunaA" class="form-control" id="comunaA" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="comunaB" class="col-sm-10 col-form-label">Nueva Comuna de residencia</label>
                                                        <input type="text" name="comunaB" class="form-control" id="comunaB">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: flex; align-items: center; justify-content: center;">
                    <div class="col-sm-12 col-md-10">
                        <div class="card" style="border-radius: 10px">
                            <div class="card-header">
                                <h3 class="card-title">Base de Consulta</h3>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-md-center">
                                    <div class="col-sm-4 col-md-10">
                                        <table id="myTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>R.U.T</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Dirección</th>
                                                    <th>Datos</th>
                                                    <th>Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($benefs as $key) {
                                                    $rutb = $key['RUT'];
                                                    echo '<tr>';
                                                    echo '<td>' . $key['ID'] . '</td>';
                                                    echo '<td>' . $key['RUT'] . '</td>';
                                                    echo '<td>' . $key['nombre'] . '</td>';
                                                    echo '<td>' . $key['apellido'] . '</td>';
                                                    echo '<td>' . $key['direccion'] . '</td>';
                                                    echo '<td><a class="btn bg-success" style="background-color: #C8E6C9;" href="VerDatos.php?rut=' . $rutb . '"><i class="bi bi-eye"></i></a></td>';
                                                    echo '<td><button type="button" class="btn bg-success" data-toggle="modal" data-target="#modalEdit" href="VerDatos.php?rut=' . $rutb . '"><i class="bi bi-pencil-square"></i></a></td>';
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
        <script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../AdminLTE/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="../AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="../AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="../AdminLTE/plugins/jszip/jszip.min.js"></script>
        <script src="../AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="../AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="../AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="../AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="../AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="AdminLTE/dist/js/adminlte.min.js"></script>
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
</html>
