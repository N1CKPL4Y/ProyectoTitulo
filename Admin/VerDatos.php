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

$rutBen = isset($_GET['rut']) ? $_GET['rut'] : null;
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title>Datos Beneficiario</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,  shrink-to-fit=no">
        <script src="../Bootstrap/js/funciones.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../Bootstrap/css/styleSideBar.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!--<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>-->
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css"/>-->
        <link rel="stylesheet" href="../Bootstrap/datepick.css">
        <script src="../Bootstrap/datepicke.js"></script>
        <script src="../js/html2pdf.bundle.min.js"></script>
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>

    </head>
    <body>
        <?php
//echo $_SESSION['ben'];
        ?>
        <div class="sidebar open">
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px; padding-left: 23px">Fundación Inclusiva</div></a>       
            </div>
            <ul class="nav-list" style="margin-left: -2rem">
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
            <nav style="background-color: #00526a">
                <div class="nav-wrapper" >
                    <div class="container" style="display: flex; align-items: center; justify-content: center;">
                        <a style="font-size: 30px;color: white">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="../IMG/iconNavbar.png"/>
                        <a style="font-size: 30px;color: white;">Fénix</a>
                    </div>
                </div>
            </nav>
            <?php
            $rutBase;
            $nombBase;
            $apelBase;
            $fechBase;
            $direBase;
            $comuBase;
            $geneBase;
            $prevBase;
            $imgBase;
            $teleBase;
            $pensBase;
            $chilBase;
            $regiBase;

            $resulData = $data->getBenefi($rutBen);
            foreach ($resulData as $key) {
                $rutBase = $key['RUT'];
                $nombBase = $key['nombre'];
                $apelBase = $key['apellido'];
                $fechBase = $key['fecha_nac'];
                if ($key['genero'] == 1) {
                    $geneBase = "Masculino";
                } else if ($key['genero'] == 2) {
                    $geneBase = "Femenino";
                } else {
                    $geneBase = "Otro";
                }
                $direBase = $key['direccion'];
                $comuBase = $key['comuna'];
                $imgBase = $key['c_identidad'];
                $tipoDoc = $key['tipoDocumento'];
                echo $tipoDoc;
                $teleBase = $key['teleton'];
                $discBase = $key['c_discapacidad'];
                $pensBase = $key['pension'];
                $chilBase = $key['chile_solidario'];
                $regiBase = $key['r_s_hogares'];
                $prevBase = $key['prevision'];
            }
//echo $prevBase." holi";

            $fechaNacBen = fechaEsp($fechBase);
            $sisPrev = $data->getPrevForId($prevBase);
            $textPrev;

            foreach ($sisPrev as $value1) {
                $textPrevi = $value1['nombre'];
            }
            $sispens = $data->getPensionById($pensBase);
            $textPens;

            $exisDiagn = $data->getDiagValid($rutBase);
            $exisDiag;
            switch ($exisDiagn) {
                case 1:
                    $exisDiag = 'SI';
                    break;
                case 0:
                    $exisDiag = 'No Aplica';
                    break;
                default:
                    break;
            }



            foreach ($sispens as $value) {
                $textPens = $value['nombre'];
            }

            switch ($discBase) {
                case 1:
                    $discBase = 'SI';
                    break;
                case 0:
                    $discBase = 'No Aplica';
                    break;
                default:
                    break;
            }

            switch ($regiBase) {
                case 1:
                    $regiBase = 'SI';
                    break;
                case 0:
                    $regiBase = 'No Aplica';
                    break;
                default:
                    break;
            }

            switch ($teleBase) {
                case 1:
                    $teleBase = 'SI';
                    break;
                case 0:
                    $teleBase = 'No Aplica';
                    break;
                default:
                    break;
            }

            switch ($chilBase) {
                case 1:
                    $chilBase = 'SI';
                    break;
                case 0:
                    $chilBase = 'No Aplica';
                    break;
                default:
                    break;
            }

            $Dgenerales = $data->getDatosGenerales($rutBase);
            $txtMotivo;
            $txtDerivacion;
            $txtAtencion;
            foreach ($Dgenerales as $value2) {
                $txtMotivo = $value2['motivo'];
                $txtDerivacion = $value2['derivacion'];
                $txtAtencion = $value2['atencion'];
            }
            switch ($txtAtencion) {
                case 1:
                    $txtAtencion = 'Atención por beneficio (Programas sociales previo evaluación social)';
                    break;
                case 2:
                    $txtAtencion = 'Atención por programa pagado (Costo minimo asociado)';
                    break;
                default:
                    break;
            }
            ?>
            <div class="container-fluid" style="padding-top: 10px; padding-bottom: 10px">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Modal edit tutor -->
                        <div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="../controller/controllerUpdateTutor.php?dis=1&rut=<?php echo $rutBen; ?>" method="Post">
                                        <div class="modal-header HeaderModal" style=" display: flex; align-items: center; justify-content: center;padding-top: 10px; padding-left: 10px">
                                            <h5 class="modal-title" id="staticBackdropLabel">Editar Datos del Tutor</h5>
                                        </div>
                                        <div class="modal-body Cuerpo">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="rutU" class="col-sm-8 col-form-label">R.U.T del Tutor</label>
                                                        <input type="text" name="rutT" class="form-control" id="rutT" aria-describedby="rut1" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)" readonly="" style="background-color: #e9ecef">
                                                        <small id="rut1" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="nombreB" class="col-sm-8 col-form-label">Nombre completo del tutor</label>
                                                        <input type="text" name="nombreT" class="form-control" id="nombreT" aria-describedby="nombreB" readonly="" style="background-color: #e9ecef">
                                                        <small id="nombreB" class="formtext text-muted"></small>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="apellidoB" class="col-sm-8 col-form-label">Fecha nacimiento tutor</label>
                                                        <input type="text" name="fecha_nacT" class="form-control" id="fecha_nacT" aria-describedby="fecha_nacT" readonly="" style="background-color: #e9ecef">
                                                        <small id="apellidoB" class="form-text text-muted"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="direccionA" class="col-sm-10 col-form-label">Dirección actual del tutor</label>
                                                        <input type="text" name="direccionA" class="form-control" id="direccionA" readonly="" style="background-color: #e9ecef">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="direccionT" class="col-sm-10 col-form-label">Nueva dirección del tutor</label>
                                                        <input type="text" name="direccionT" class="form-control" id="direccionT">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="comunaAT" class="col-sm-10 col-form-label">Comuna actual de residencia</label>
                                                        <input type="text" name="comunaAT" class="form-control" id="comunaAT" readonly=""style="background-color: #e9ecef">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="comunaT" class="col-sm-10 col-form-label">Nueva Comuna de residencia</label>
                                                        <input type="text" name="comunaT" class="form-control" id="comunaT">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="ocupacionAT" class="col-sm-10 col-form-label">Ocupación actual</label>
                                                        <input type="text" name="ocupacionAT" class="form-control" id="ocupacionAT" readonly="" style="background-color: #e9ecef">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="ocupacionT" class="col-sm-10 col-form-label">Nueva ocupación</label>
                                                        <input type="text" name="ocupacionT" class="form-control" id="ocupacionT">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="telefonoAT" class="col-sm-10 col-form-label">Número de teléfono actual</label>
                                                        <input type="number" name="telefonoAT" class="form-control" id="telefonoAT" readonly="" style="background-color: #e9ecef">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="telefonoT" class="col-sm-10 col-form-label">Nuevo número de télefono</label>
                                                        <input type="number" name="telefonoT"  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" class="form-control" on id="telefonoT">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="emailAT" class="col-sm-10 col-form-label">Correo electrónico actual</label>
                                                        <input type="text" name="emailAT" class="form-control" id="emailAT" readonly="" style="background-color: #e9ecef">

                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-10">
                                                    <div class="form-group">
                                                        <label for="emailT" class="col-sm-10 col-form-label">Nuevo correo electrónico</label>
                                                        <input type="text" name="emailT" class="form-control" id="emailT">
                                                        <span id="emailVal" style="color: gray"></span>
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
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Modal edit diagnostico -->
                        <div class="modal fade" id="modalIngDiag" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="../controller/controllerUpdateDiag.php?dis=1" method="Post" enctype="multipart/form-data">
                                        <div class="modal-header HeaderModal" style=" display: flex; align-items: center; justify-content: center;padding-top: 10px; padding-left: 10px">
                                            <h5 class="modal-title" id="staticBackdropLabel">Registrar datos de diagnostico</h5>
                                        </div>
                                        <div class="modal-body Cuerpo">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">R.U.T Beneficiario</span>
                                                        <input type="text" class="form-control" readonly="" name="rutBene" aria-label="Username" value="<?php echo $rutBen; ?>" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-10 col-lg-10">
                                                    <label for="cbo_condicion" class="col-sm-10 col-form-label">¿Cual es el diagnóstico que presenta el beneficiario?</label>
                                                    <div class="input-group mb-3"> 
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01" style="border-radius: 5px 0 0 5px;">Opciones</label>
                                                        </div>
                                                        <select class="form-select" name="cbo_condicion" aria-label="Default select example">
                                                            <option value="" selected disabled=""> -- Seleccione -- </option>
                                                            <?php
                                                            $condiciones = $data->getAllCondition();

                                                            foreach ($condiciones as $key) {
                                                                echo '<option value="' . $key['ID'] . '" id="options">' . $key['nombre'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="cbo_condicion" class="col-sm-10 col-form-label">Indique el especialista que emite el diagnóstico</label>
                                                        <div class="input-group mb-3"> 
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01" style="border-radius: 5px 0 0 5px;">Opciones</label>
                                                            </div>
                                                            <select class="form-select" name="cbo_especialista" aria-label="Default select example">
                                                                <option value="" disabled selected> -- Seleccione -- </option>
                                                                <?php
                                                                $especialista = $data->getAllEspecialista();

                                                                foreach ($especialista as $key) {
                                                                    echo '<option value="' . $key['ID'] . '" id="options">' . $key['nombre'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group dates">
                                                        <label for="datepicker" class="col-sm-12 col-form-label">Indique fecha del ultimo control con el especialista</label>
                                                        <input type="text" placeholder="--Seleccione--" class="form-control diag" autocomplete="off"  name="txt_control" id="datepicker" style=" text-indent: 18px;">
                                                        <span style="color: grey">Formato Año-Mes-Dia</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8 col-lg-8">
                                                    <label style="margin-left: 10px">Copia informe ultimo control (PDF)</label>
                                                    <div class="mb-3">
                                                        <input class="form-control" name="file_control" accept="application/pdf" type="file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer HeaderModal">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn submitModal">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Modal edit credencial discapacidad -->
                        <div class="modal fade" id="modalIngCreden" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="../controller/controllerUpdateCredDisc.php?dis=1" method="Post" enctype="multipart/form-data">
                                        <div class="modal-header HeaderModal" style=" display: flex; align-items: center; justify-content: center;padding-top: 10px; padding-left: 10px">
                                            <h5 class="modal-title" id="staticBackdropLabel">Registrar datos Credencial Discapacidad</h5>
                                        </div>
                                        <div class="modal-body Cuerpo">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">R.U.T Beneficiario</span>
                                                        <input type="text" class="form-control" readonly="" name="rutBene" aria-label="Username" value="<?php echo $rutBen; ?>" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <label for="discapacidad" style="margin-left: 10px">Numero de credencial de discapacidad</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">N°</span>
                                                        <input type="text" class="form-control" name="txt_credencial" autocomplete="off" id="discapacidad"  aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="cbo_condicion" class="col-sm-10 col-form-label">Origen principal</label>
                                                        <div class="input-group mb-3"> 
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01" style="border-radius: 5px 0 0 5px;">Opciones</label>
                                                            </div>
                                                            <select class=" form-select" id="inputGroupSelect01" name="cbo_origenP">
                                                                <option value="" disabled selected>-- Seleccione --</option>
                                                                <option value="1">Fisico</option>
                                                                <option value="2">Sensorial Visual</option>
                                                                <option value="3">Sensorial Auditivo</option>
                                                                <option value="4">Mental Psiquico</option>
                                                                <option value="5">Mental Intelectual</option>
                                                                <option value="6">No aplica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="datepicker" class="col-sm-12 col-form-label">Origen Secundario</label>
                                                        <div class="input-group mb-3"> 
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01" style="border-radius: 5px 0 0 5px;">Opciones</label>
                                                            </div>
                                                            <select class=" form-select" id="inputGroupSelect01" name="cbo_origenS">
                                                                <option value="" disabled selected>-- Seleccione --</option>
                                                                <option value="1">Fisico</option>
                                                                <option value="2">Sensorial Visual</option>
                                                                <option value="3">Sensorial Auditivo</option>
                                                                <option value="4">Mental Psiquico</option>
                                                                <option value="5">Mental Intelectual</option>
                                                                <option value="6">No aplica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <label class="col-form-label" for="porcentaje_d" style="margin-left: 10px">Porcentaje de discapacidad</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">N°</span>
                                                        <input type="number" class="form-control" name="txt_porcentaje_d" autocomplete="off" name="txt_porcentaje_d" id="porcentaje_d" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-12 col-form-label">Grado de discapacidad</label>
                                                        <div class="input-group mb-3"> 
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01" style="border-radius: 5px 0 0 5px;">Opciones</label>
                                                            </div>
                                                            <select class=" form-select" id="inputGroupSelect01" name="cbo_grado">
                                                                <option value="" disabled selected>-- Seleccione --</option>
                                                                <option value="1">Leve</option>
                                                                <option value="2">Moderado</option>
                                                                <option value="3">Severo</option>
                                                                <option value="4">Profundo</option>
                                                                <option value="5">No aplica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <label for="chilesolidario" id="labelchsoli">¿Movilidad Reducida?</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input numCred" type="radio" name="movilidad" value="1" >
                                                        <label class="form-check-label" for="movilidad">
                                                            SI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input numCred" type="radio" name="movilidad" value="0" >
                                                        <label class="form-check-label" for="movilidad">
                                                            NO
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <label style="margin-left: 10px">C. Discapacidad (Parte delantera) (Imagen)</label>
                                                    <div class="mb-3">
                                                        <input class="form-control" name="file_credenFront" accept="image/jpeg" type="file">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <label style="margin-left: 10px">C. Discapacidad (Parte trasera) (Imagen)</label>
                                                    <div class="mb-3">
                                                        <input class="form-control" name="file_credenBack" accept="image/jpeg" type="file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer HeaderModal">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn submitModal">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Modal edit Registro S. Hogares -->
                        <div class="modal fade" id="modalIngRHogar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="../controller/controllerUpdateRSocial.php?dis=1" method="Post" enctype="multipart/form-data">
                                        <div class="modal-header HeaderModal" style=" display: flex; align-items: center; justify-content: center;padding-top: 10px; padding-left: 10px">
                                            <h5 class="modal-title" id="staticBackdropLabel">Ingresar Registro S. Hogares</h5>
                                        </div>
                                        <div class="modal-body Cuerpo">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">R.U.T Beneficiario</span>
                                                        <input type="text" class="form-control" readonly="" name="rutBene" aria-label="Username" value="<?php echo $rutBen; ?>" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4 col-lg-4">
                                                    <label for="discapacidad" style="margin-left: 10px">Porcentaje Registro</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">%</span>
                                                        <input type="number" class="form-control" name="txt_porcentHogar" autocomplete="off" id="discapacidad"  aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-8 col-lg-8">
                                                    <label style="margin-left: 10px">Copia del registro (PDF)</label>
                                                    <div class="mb-3">
                                                        <input class="form-control" name="file_Hogar" accept="application/pdf" type="file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer HeaderModal">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn submitModal">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="modal fade" id="modalCreden" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header HeaderModal" style=" display: flex; align-items: center; justify-content: center;">
                                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo $nombBase . ' ' . $apelBase; ?></h5>
                                    </div>
                                    <div class="modal-body Cuerpo">

                                        <?php
                                        $credenC = $data->getCredenByRut($rutBase);
                                        foreach ($credenC as $values) {
                                            $imgCA = $values['c_parte_delantera'];
                                            $imgCB = $values['c_parte_trasera'];
                                            ?>
                                            <div class = "row justify-content-around">
                                                <div class = "col-sm-12 col-md-12 col-lg-12">
                                                    <img name = "hola" width = "600" height = "300" src = "data:image/jpeg;base64,<?php echo base64_encode($imgCA) ?>"/>
                                                </div>
                                            </div>
                                            <div class = "row justify-content-around">
                                                <div class = "col-sm-12 col-md-12 col-lg-12">
                                                    <img name = "hola" width = "600" height = "300" src = "data:image/jpeg;base64,<?php echo base64_encode($imgCB) ?>"/>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="modal-footer HeaderModal">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <a href="Datos/Credencial.php?rut=<?php echo $rutBase; ?>"  target="_blank" class="btn submitModal">Descargar copia credencial</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-around" id="pdf">
                    <div class="col-sm-12 col-md-10 col-lg-10">
                        <div class="card" style="border-radius: 10px">
                            <div class="card-header Header" style="display: flex; align-items: center; justify-content: center;">
                                <h3>Datos del beneficiario</h3>
                            </div>
                            <div class="card-body Cuerpo">
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <h4>Datos Generales:</h4>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Motivo</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $txtMotivo; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Derivación</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $txtDerivacion; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Tipo de atención</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $txtAtencion; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <h4>Datos Personales:</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">R.U.T</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $rutBase; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <?php
                                        if ($tipoDoc == 'image/jpeg') {
                                            ?>
                                            <a href="Datos/carnetPDF.php?rut=<?php echo $rutBase; ?>" target="_blank" class="btn submit col-sm-12 col-md-12 col-lg-12 col-xl-12">Descargar Copia Carnet</a>
                                            <?php
                                        } else if ($tipoDoc == 'application/pdf') {
                                            ?>
                                            <a href="Datos/C_NacBene.php?rut=<?php echo $rutBase; ?>" target="_blank" class="btn submit col-sm-12 col-md-12 col-lg-12 col-xl-12">Descargar Copia Certificado de Nacimiento</a>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Nombres</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $nombBase; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Apellidos</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $apelBase; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Fecha Nacimiento</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $fechaNacBen; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Dirección</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $direBase; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Comuna</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $comuBase; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Previsión</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $textPrevi; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Pensión</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $textPens; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">R. Social Hogares</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $regiBase; ?>" readonly="">
                                        </div>
                                    </div>
                                    <?php
                                    if ($regiBase == "SI") {
                                        ?>
                                        <div class="col-sm-12 col-md-10 col-lg-6">
                                            <a href="Datos/Cartola.php?rut=<?php echo $rutBase; ?>" target="_blank" class="btn submit col-sm-12 col-md-12 col-lg-12 col-xl-12"> Ver Cartola R. Social Hogares</a>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class = "col-sm-12 col-md-10 col-lg-6">
                                            <a class = "btn submit col-sm-12 col-md-12 col-lg-12 col-xl-12" data-toggle="modal" data-target="#modalIngRHogar">Ingresar Registro S. Hogares</a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Posee C. Discapacidad</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $discBase; ?>" readonly="">
                                        </div>
                                    </div>
                                    <?php
                                    if ($discBase == "SI") {
                                        ?>
                                        <div class="col-sm-12 col-md-10 col-lg-6">
                                            <a href="Datos/CredencialPDF.php?rut=<?php echo $rutBase; ?>" target="_blank" class="btn submit col-sm-12 col-md-12 col-lg-12 col-xl-12">Descargar Copia Credencial</a>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-sm-12 col-md-10 col-lg-6">
                                            <button type="button" class="btn col-sm-12 submit col-md-12 col-lg-12 col-xl-12" data-toggle="modal" data-target="#modalIngCreden">
                                                Registrar Datos Credencial
                                            </button>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <br>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <h4>Beneficios Sociales:</h4>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Participa en Teletón</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $teleBase; ?>" readonly="">
                                        </div>
                                    </div>
                                    <?php
                                    if ($teleBase = "SI") {
                                        $teletonV = $data->getTeletonbyRut($rutBase);
                                        $numero;
                                        foreach ($teletonV as $key2) {
                                            $numero = $key2['registro'];
                                            ?>
                                            <div class="col-sm-12 col-md-10 col-lg-6">
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="addon-wrapping">Número de registro</span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $numero; ?>" readonly="">
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        
                                    }
                                    ?>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Pertenece a Chile Solidario</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $chilBase; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <h4>Datos de Diagnostico:</h4>
                                    </div>
                                </div>
                                <?php
                                $diag;
//ech                           o $exisDiagn;
                                if ($exisDiagn) {
                                    $diag = $data->getDiagnostico($rutBase);
                                    foreach ($diag as $value) {
                                        $esp = $value['especialista'];
                                        $array = $data->getEspecialista($esp);
                                        $textEsp;
                                        foreach ($array as $valor1) {
                                            $textEsp = $valor1['nombre'];
                                        }
                                        $codigo = $value['codigo'];
                                        $array1 = $data->getConditionCode($codigo);
                                        $code;
                                        $name;
                                        foreach ($array1 as $valor2) {
                                            $name = $valor2['nombre'];
                                            $code = $valor2['codigo'];
                                        }
                                        ?>
                                        <div class="row" style="padding-top: 10px">
                                            <div class="col-sm-12 col-md-10 col-lg-6">
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="addon-wrapping">Posee Diagnóstico:</span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $exisDiag; ?>" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-10 col-lg-6">
                                                <a href="Datos/Control.php?rut=<?php echo $rutBase; ?>" target="_blank" class="btn submit col-sm-12 col-md-12 col-lg-12 col-xl-12"> Ver Informe Ultimo Control</a>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top: 10px">
                                            <div class="col-sm-12 col-md-10 col-lg-6">
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="addon-wrapping">Especialista</span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $textEsp; ?>" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-10 col-lg-6">
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="addon-wrapping">Fecha Ultimo Control</span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $value['fecha_u_control']; ?>" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top: 10px">
                                            <div class="col-sm-12 col-md-10 col-lg-6">
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="addon-wrapping">Codigo Condición</span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $code; ?>" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-10 col-lg-6">
                                                <div class="input-group flex-nowrap">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="addon-wrapping">Nombre Condición</span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $name; ?>" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <div class="row justify-content-around" style="padding-top: 10px">
                                        <div class="col-sm-12 col-md-10 col-lg-6">
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    Registro
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">El beneficiario no posee un diagnostico asociado</h5>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    ...
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-around" style="padding-top: 10px">
                                        <a data-toggle="modal" data-target="#modalIngDiag" class="btn submit col-sm-12 col-md-6 col-lg-6 col-xl-6">Ingresar datos de diagnostico</a>
                                    </div>
                                    <?php
                                }
                                ?>
                                <br>
                                <?php
                                $existeEntre = $data->getEntrevistaByRut($rutBen);
                                if ($existeEntre) {
                                    ?>
                                    <div class="row" style="padding-top: 10px">
                                        <div class="col-sm-12 col-md-10 col-lg-6">
                                            <h4>Entrevista de antecedentes:</h4>
                                        </div>
                                        <div class="col-sm-12 col-md-10 col-lg-6">
                                            <a href="../controller/controllerEntrevistaPDF.php?rutBene=<?php echo $rutBase; ?>" target="_blank" class="btn submit col-sm-12 col-md-12 col-lg-12 col-xl-12"> Visualizar entrevista de antecedentes</a>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="row" style="padding-top: 10px">
                                        <div class="col-sm-12 col-md-10 col-lg-6">
                                            <h4>Entrevista de antecedentes:</h4>
                                        </div>
                                        <div class="col-sm-12 col-md-10 col-lg-6">
                                            <a class="btn submit col-sm-12 col-md-12 col-lg-12 col-xl-12"> Este beneficiario no cuenta con una entrevista registrada</a>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>

                                <br>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <h4>Datos del tutor asociado:</h4>
                                    </div>
                                </div>
                                <?php
                                $tutor = $data->getParentesco($rutBase);
                                $parecido;
                                $Rtutorbase;
                                foreach ($tutor as $valor3) {
                                    $parecido = $valor3['parecido'];
                                    $Rtutorbase = $valor3['tutor'];
                                }
                                switch ($parecido) {
                                    case 1:
                                        $parecido = 'Padre';
                                        break;
                                    case 2:
                                        $parecido = 'Madre';
                                        break;
                                    case 3:
                                        $parecido = 'Otro';
                                        break;
                                    default:
                                        break;
                                }

                                $tutor1 = $data->getTutor($Rtutorbase);
                                $nombreT;
                                $f_nacT;
                                $direccionT;
                                $comunaT;
                                $n_escolar;
                                $c_identTutor;
                                $ocupacionT;
                                $telefonoT;
                                $emailT;
                                $previsionT;
                                foreach ($tutor1 as $valor4) {
                                    $nombreT = $valor4['nombre'];
                                    $f_nacT = $valor4['fecha_nac'];
                                    $direccionT = $valor4['direccion'];
                                    $comunaT = $valor4['comuna'];
                                    $c_identTutor = $valor4['c_identidad'];
                                    $n_escolar = $valor4['n_escolar'];
                                    $ocupacionT = $valor4['ocupacion'];
                                    $telefonoT = $valor4['telefono'];
                                    $emailT = $valor4['email'];
                                    $previsionT = $valor4['prevision'];
                                }

                                $fechaNacT = fechaEsp($f_nacT);
                                $prevT = $data->getPrevForId($previsionT);
                                $prev;
                                foreach ($prevT as $valor5) {
                                    $prev = $valor5['nombre'];
                                }

                                switch ($n_escolar) {
                                    case 1:
                                        $n_escolar = 'Básica Completa';
                                        break;
                                    case 2:
                                        $n_escolar = 'Básica Incompleta';
                                        break;
                                    case 3:
                                        $n_escolar = 'Media completa';
                                        break;
                                    case 4:
                                        $n_escolar = 'Media incompleta';
                                        break;
                                    case 5:
                                        $n_escolar = 'Técnica Completa';
                                        break;
                                    case 6:
                                        $n_escolar = 'Técnica Incompleta';
                                        break;
                                    case 7:
                                        $n_escolar = 'Universitaria completa';
                                        break;
                                    case 8:
                                        $n_escolar = 'Universitaria Incompleta';
                                        break;
                                    case 9:
                                        $n_escolar = 'Postgrados';
                                        break;
                                    default:
                                        break;
                                }
                                $datos = $valor4['RUT'] . ".."
                                        . $valor4['nombre'] . ".."
                                        . $valor4['fecha_nac'] . ".."
                                        . $valor4['direccion'] . ".."
                                        . $valor4['comuna'] . ".."
                                        . $valor4['ocupacion'] . ".."
                                        . $valor4['telefono'] . ".."
                                        . $valor4['email'];
                                $escaped = htmlspecialchars(json_encode($datos));
                                ?>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="modal fade" id="modalCTutor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header HeaderModal" style=" display: flex; align-items: center; justify-content: center;padding-top: 10px; padding-left: 10px">
                                                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo $nombreT; ?></h5>
                                                    </div>
                                                    <div class="modal-body Cuerpo">
                                                        <div class="row justify-content-around">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <img name="hola" width="700" height="400" src="data:image/jpeg;base64,<?php echo base64_encode($c_identTutor) ?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer HeaderModal">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <a href="Datos/CarnetTutor.php?rut=<?php echo $rutBase; ?>" target="_blank" class="btn submitModal btn-primary">Descargar copia carnet</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">R.U.T</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $Rtutorbase; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <a href="Datos/CarnetTutor.php?rut=<?php echo $Rtutorbase; ?>" target="_blank" class="btn submit col-sm-12 col-md-12 col-lg-12 col-xl-12">Descargar Copia Carnet</a>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Parentesco</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $parecido; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-8">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Nombre Completo</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $nombreT; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Fecha nacimiento</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $fechaNacT; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Dirección</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $direccionT; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Comuna</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $comunaT; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Nivel Escolar</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $n_escolar; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-8">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Ocupación</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $ocupacionT; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Teléfono</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $telefonoT; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-10">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Correo Electrónico</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $emailT; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Previsión</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $prev; ?>" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-start" style="padding-top: 10px;">
                                    <div class="col-sm-12 col-md-10 col-lg-6">
                                        <button type="button" class="btn submit" data-toggle="modal" data-target="#modalEdit" onclick="updateTutor(<?php echo $escaped ?>)" style="color: white">Editar datos del tutor</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        document.getElementById('emailT').addEventListener('input', function () {
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
</html>
