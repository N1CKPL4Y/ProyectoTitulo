<?php
session_start();
error_reporting(E_NOTICE ^ E_ALL);
include_once 'DB/Model_Data.php';

$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$passwd = $_SESSION['passwd'];
$correo = $_SESSION['email'];
$area_u = $_SESSION['area_u'];
$tipo_u = $_SESSION['tipo_u'];
$logged = $_SESSION['logged'];

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
        <script src="Bootstrap/js/funciones.js"></script>

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
        <link rel="stylesheet" href="Bootstrap/css/styleSideBar.css">
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <div class="sidebar open">
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px; padding-left: 23px">Fundación Inclusiva</div></a>       
            </div>
            <ul class="nav-list">
                <!--<li>
                    <a href="Admin/RNuevoUsuario.php">
                        <i class="material-icons">person_add</i>
                        <span class="links_name">Registrar Usuarios</span>
                    </a>
                    <span class="tooltip">Registrar Usuarios</span>
                </li>-->
                <li>
                    <a href="Admin/RNuevoUsuario.php">
                        <i class="material-icons">person_add</i>
                        <span class="links_name">Registrar Usuarios</span>
                    </a>
                    <span class="tooltip">Registrar Usuarios</span>
                </li>
                <li>
                    <a href="Secretaria/EntrevistaFamilia.php">
                        <i class='bx bx-home-heart'></i>
                        <span class="links_name">Entrevista a la familia</span>
                    </a>
                    <span class="tooltip">Entrevista a la Familia</span>
                </li>
                <li>
                    <a href="Admin/VisBeneficiario.php">
                        <i class="material-icons">people</i>
                        <span class="links_name" style="font-size: 14px">Visualizar Beneficiarios</span>
                    </a>
                    <span class="tooltip" style="font-size: 14px">Visualizar Beneficiarios</span>
                </li>
                <li>
                    <a href="Admin/Calendario.php">
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
                    <a href="C_Administrativo/Administrativo.php">
                        <i class='bx bx-calendar'></i>
                        <span class="links_name">Calendario Administrativo</span>
                    </a>
                    <span class="tooltip">Calendario Administrativo</span>
                </li>
                <li>
                    <a href="Admin/historialBitacora.php">
                        <i class='bx bx-library'></i>
                        <span class="links_name">Historial Bitacoras</span>
                    </a>
                    <span class="tooltip">Historial Bitacoras</span>
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
        <section class="home-section" style="background-image: url(IMG/1.jpg); background-attachment: fixed; background-size: cover">
            <nav>
                <div class="nav-wrapper" style="background-color: #00526a">
                    <div class="container" style="display: flex; align-items: center; justify-content: center; color: white">
                        <a style="font-size: 30px">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="IMG/iconNavbar.png"/>
                        <a style="font-size: 30px">Fénix</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content" style="border-radius: 50px">
                                    <form action="controller/controllerUpdateUser.php" method="Post">
                                        <div class="modal-header HeaderModal" style="display: flex; align-items: center; justify-content: center; font-size: 24px">
                                            <h5 class="modal-title" id="staticBackdropLabel">Editar Datos del Usuario</h5>
                                        </div>
                                        <div class="modal-body Cuerpo">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="rutU" class="col-sm-8 col-form-label">R.U.T del usuario</label>
                                                        <input type="text" name="txt_rut" class="form-control" id="rutU" aria-describedby="rut1" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)" readonly="">
                                                        <small id="rut1" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="nombreU" class="col-sm-8 col-form-label">Nombres del usuario</label>
                                                        <input type="text" name="nombreU" class="form-control" id="nombreU" aria-describedby="nombre1" readonly="">
                                                        <small id="nombre1" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="apellidoU" class="col-sm-8 col-form-label">Apellidos del usuario</label>
                                                        <input type="text" name="apellidoU" class="form-control" id="apellidoU" aria-describedby="apellido1" readonly="">
                                                        <small id="apellido1" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="emailU" class="col-sm-10 col-form-label">Correo electronico del usuario</label>
                                                        <input type="text" name="emailU" class="form-control" id="emailU">
                                                        <span id="emailVal" style="color: gray"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="passU" class="col-sm-10 col-form-label">Contraseña del usuario</label>
                                                        <input type="password" name="passU" class="form-control" id="passU" maxlength="8" minlength="4">
                                                        <small id="pass1" class="form-text text-muted">Debe tener minimo 4 caracteres y maximo 8</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-10">
                                                    <label for="telefonoU" class="col-sm-10 col-form-label">Telefono del usuario</label>
                                                    <div class="input-group mb-3">      
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">+56</span>
                                                        </div> 
                                                        <input type="text" name="telefonoU" class="form-control" id="telefonoU" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <input type="hidden" name="pass" class="form-control" id="pass">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="tipoU" class="col-sm-10 col-form-label">Tipo de usuario actual</label>
                                                        <input type="text" name="tipoU" class="form-control" id="tipoU" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-10">
                                                    <label for="tipoU" class="col-sm-10 col-form-label">Seleccionar tipo de usuario</label>
                                                    <select class="form-control" name="cbo_tUser">
                                                        <option disabled selected value="0">--Seleccionar--</option>
                                                        <?php
                                                        $tipoU = $data->getAllT_users();
                                                        foreach ($tipoU as $key) {
                                                            echo '<option value="' . $key['id'] . '" id="options">' . $key['nombre'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <input type="hidden" name="tUser" class="form-control" id="tUser" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="areaU" class="col-sm-10 col-form-label">Area actual del usuario</label>
                                                        <input type="text" name="areaU" class="form-control" id="areaU" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-10">
                                                    <label for="areaU" class="col-sm-10 col-form-label">Seleccionar Area de usuario</label>
                                                    <select class="form-control" name="cbo_aUser">
                                                        <option disabled selected value="0">--Seleccionar--</option>
                                                        <?php
                                                        $areaU = $data->getAllA_users();
                                                        foreach ($areaU as $key) {
                                                            echo '<option value="' . $key['id'] . '" id="options">' . $key['nombre'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <input type="hidden" name="aUser" class="form-control" id="aUser" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="cargoU" class="col-sm-10 col-form-label">Cargo actual del usuario</label>
                                                        <input type="text" name="cargoU" class="form-control" id="cargoU" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-10">
                                                    <label for="areaU" class="col-sm-10 col-form-label">Seleccionar Cargo de usuario</label>
                                                    <select class="form-control" name="cbo_cUser">
                                                        <option disabled selected value="0">--Seleccionar--</option>
                                                        <?php
                                                        $cargo = $data->getAllCargos();
                                                        foreach ($cargo as $key) {
                                                            echo '<option value="' . $key['id'] . '" id="options">' . $key['nombre'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <input type="hidden" name="cUser" class="form-control" id="cUser" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="estadoU" class="col-sm-10 col-form-label">Estado del usuario</label>
                                                        <input type="text" name="estadoU" class="form-control" id="estadoU" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-10" id="estado">
                                                    <label for="deshabilitar" id="labelDes" class="col-sm-10 col-form-label" >¿Desea desactivar el usuario?</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="deshabilitar" id="desA" value="1">
                                                        <label class="form-check-label" for="deshabilitar">
                                                            Si
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="deshabilitar" id="desB" value="2">
                                                        <label class="form-check-label" for="deshabilitar">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-10">
                                                    <div class="form-group">
                                                        <input type="hidden" name="estado_a" class="form-control" id="estado_a" readonly="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer HeaderModal">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn submitModal">Guardar Cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-around" style="padding-top: 25px">
                    <div class="col-sm-10 col-md-10">
                        <div class="card">
                            <div class="card-header Header" style="display: flex; align-items: center; justify-content: center;">
                                <h3 class="card-title" style="font-size: 24px">Usuarios Registrados</h3>
                            </div>
                            <div class="card-body Cuerpo">
                                <div class="row" style="display: flex; align-items: center; justify-content: center;">
                                    <div class="col-sm-12 col-md-12 col-lg-11">
                                        <table id="myTable" class="table table-bordered table-striped">
                                            <thead class="HeaderModal">
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
                                                    $datos = '' . $key['rut'] . ".."
                                                            . $key['nombre'] . ".."
                                                            . $key['apellido'] . ".."
                                                            . $key['correo'] . ".."
                                                            . $key['passwd'] . ".."
                                                            . $key['telefono'] . ".."
                                                            . $key['tipo usuario'] . ".."
                                                            . $key['id_user'] . ".."
                                                            . $key['area usuario'] . ".."
                                                            . $key['a_user'] . ".."
                                                            . $key['cargo'] . ".."
                                                            . $key['c_user'] . ".."
                                                            . $key['activo'] . '';

                                                    $escaped = htmlspecialchars(json_encode($datos));
                                                    //echo $escaped;
                                                    echo '<tr>';
                                                    echo '<td>' . $key['rut'] . '</td>';
                                                    echo '<td>' . $key['nombre'] . '</td>';
                                                    echo '<td>' . $key['apellido'] . '</td>';
                                                    echo '<td>' . $key['correo'] . '</td>';
                                                    echo '<td>' . $key['telefono'] . '</td>';
                                                    echo '<td>' . $key['tipo usuario'] . ' - ' . $key['id_user'] . '</td>';
                                                    echo '<td>' . $activo . '</td>';
                                                    echo '<td><button type="button" class="btn submit" data-toggle="modal" data-target="#modalEdit" onclick="cargarDatos(' . $escaped . ')"><i class="bi bi-pencil-square"></i></td>';
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
                                                            $(document).ready(function () {
                                                                $(window).on('unload', function () {
                                                                    $.ajax({
                                                                        url: "controller/controllerLogout.php",
                                                                        type: "get",
                                                                        data: {rut: '<?php echo $rut?>', log: 0}
                                                                    });
                                                                });
                                                            });

        </script>

        <script type="text/javascript">
            var input = document.getElementById('telefonoU');
            input.addEventListener('input', function () {
                if (this.value.length > 9)
                    this.value = this.value.slice(0, 9);
            })
        </script>
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
