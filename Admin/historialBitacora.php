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

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->

<html lang="en" dir="ltr">
    <head>
        <title>Historial Bitacoras</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>
        <script src="../Bootstrap/js/funciones.js"></script>
        <link rel="stylesheet" href="../Bootstrap/datepick.css">
        <script src="../Bootstrap/datepicke.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

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
        <link rel="stylesheet" href="../Bootstrap/css/styleSideBar.css">

        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <div class="sidebar open" style="overflow: hidden !important">
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
                    <a href="RNuevoUsuario.php">
                        <i class="material-icons">person_add</i>
                        <span class="links_name">Registrar Usuarios</span>
                    </a>
                    <span class="tooltip">Registrar Usuarios</span>
                </li>
                <li>
                    <a href="../Secretaria/EntrevistaFamilia.php">
                        <i class='bx bx-home-heart'></i>
                        <span class="links_name">Entrevista a la Familia</span>
                    </a>
                    <span class="tooltip">Entrevista a la Familia</span>
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
            <div class="container-fluid">
                <div class="row justify-content-around">
                    <div class="col-sm-12 col-md-12 col-lg-10" style="padding-top: 15px">
                        <div class="card text-center">
                            <form method="post" name="datosUser">
                                <div class="card-header Header">
                                    <h4>Bitácoras registradas</h4>
                                </div>
                                <div class="card-body Cuerpo">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="border-radius: 50px 0 0 50px;">Rut</span>
                                                </div>
                                                <input type="text" class="form-control" name="txt_rut" style="border-radius: 0 50px 50px 0;" id="rut" required placeholder="11.111.111-1" onkeypress="return(event.charCode >= 48 && event.charCode <= 57) || event.charCode == 107" onchange="javascript:return Rut(document.datosUser.txt_rut.value)" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01" style="border-radius: 50px 0 0 50px;">Área</label>
                                                    </div>
                                                    <select class="custom-select" id="cbo_aUser" name="cbo_aUser" style="border-radius: 0 50px 50px 0;">
                                                        <option value="" disabled selected>Seleccione el área Profesional</option>
                                                        <?php
                                                        $areaU = $data->getAllA_users();
                                                        foreach ($areaU as $key) {
                                                            if ($key['id'] != 1) {
                                                                echo '<option value="' . $key['id'] . '" id="options">' . $key['nombre'] . '</option>';
                                                            } else {
                                                                
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="input-group mb-3 dates">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="border-radius: 50px 0 0 50px;">Fecha</span>
                                                </div>
                                                <input type="text" autocomplete="off" placeholder="AAAA-MM-DD" class="form-control"  name="registro" id="datepicker" style="border-radius: 0px 50px 50px 0px;">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <button type="submit" class="btn btn-block submit " name="btn_buscar">Buscar</button>
                                            </div>
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
                        $rutBene = isset($_POST['txt_rut']) ? $_POST['txt_rut'] : null;
                        $area = isset($_POST['cbo_aUser']) ? $_POST['cbo_aUser'] : null;
                        $fecha = isset($_POST['registro']) ? $_POST['registro'] : null;
                        //$existB = $data->getExistBicatora($rutBene);
                        if (!empty($rutBene)) {
                            if ($area != null) {
                                if ($fecha != null) {
                                    $bitacoras = $data->getBitacoraByFecha($rutBene, $area, $fecha);
                                    if (mysqli_num_rows($bitacoras) > 0) {
                                        $cont = 1;
                                        ?>
                                        <div class = "col-sm-12 col-md-10 col-lg-10">
                                            <div class = "card text-center">
                                                <div class = "card-header">
                                                    Registro Bitácoras
                                                </div>
                                                <div class = "card-body">
                                                    <?php
                                                    foreach ($bitacoras as $value) {
                                                        $fecha = $value['fecha'];
                                                        $fechaB = fechaEsp($fecha);
                                                        $area = $value['area_u'];
                                                        $aUser = $data->getAreaById($area);
                                                        $area1;
                                                        foreach ($aUser as $value1) {
                                                            $area1 = $value1['nombre'];
                                                        }
                                                        ?>
                                                        <div class="row justify-content-around">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <a role="button" target="_blank" href="../controller/controllerBitacoraPDF.php?id=<?php echo $value['id']; ?>">
                                                                    <i class='bx bxs-file-pdf'></i>Bitácora de Atención N° <?php echo $cont . " Codigo: " . $value['beneficiario']; ?> - Programa <?php echo $value['programa']; ?> - Area "<?php echo $area1; ?>" - <?php echo $fechaB; ?> / <?php echo $value['hora']; ?>
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
                                        <div class = "col-sm-12 col-md-10 col-lg-10">
                                            <div class = "card text-center">
                                                <div class = "card-header">
                                                    Registro
                                                </div>
                                                <div class = "card-body" >
                                                    <h5 class = "center">No existe una bitácora asociada a los parametros ingresados</h5>
                                                </div>
                                                <div class = "card-footer text-muted">
                                                    ...
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <div class = "col-sm-12 col-md-10 col-lg-10">
                                        <div class = "card text-center">
                                            <div class = "card-header">
                                                Registro
                                            </div>
                                            <div class = "card-body" >
                                                <h5 class = "center">Verifique la selección de la fecha de registro de la bitácora</h5>
                                            </div>
                                            <div class = "card-footer text-muted">
                                                ...
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                ?>
                                <div class = "col-sm-12 col-md-10 col-lg-10">
                                    <div class = "card text-center">
                                        <div class = "card-header">
                                            Registro
                                        </div>
                                        <div class = "card-body" >
                                            <h5 class = "center">Verifique la selección del área del profesional y fecha de registro de la bitácora</h5>
                                        </div>
                                        <div class = "card-footer text-muted">
                                            ...
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <div class = "col-sm-12 col-md-10 col-lg-10">
                                <div class = "card text-center">
                                    <div class = "card-header">
                                        Registro
                                    </div>
                                    <div class = "card-body" >
                                        <h5 class = "center">Verifique que el area del colaborador y/o la fecha se encuentren seleccionadas</h5>
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
                    ?>
                </div>
            </div> 
        </section>
    </body>
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
            $('.dates #datepicker').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true
            });
        });
    </script>
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

