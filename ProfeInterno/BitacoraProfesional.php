<?php
session_start();
error_reporting(E_NOTICE ^ E_ALL);

include_once '../DB/Model_Data.php';
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
$data = new Data();
$areas = $data->getAreaById($area_u);
$a_usuario;
foreach ($areas as $value) {
    $a_usuario = $value['nombre'];
}
$rutB = isset($_GET['rut']) ? $_GET['rut'] : null;
$idB = isset($_GET['id']) ? $_GET['id'] : null;
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bitacora de atención</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="sidebar open" >
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px; padding-left: 23px">Fundación Inclusiva</div></a>       
            </div>
            <ul class="nav-list">
                <li>
                    <a href="../MenuProfesional.php">
                        <i class='bx bx-home' ></i>
                        <span class="links_name">Vover a Inicio</span>
                    </a>
                    <span class="tooltip">Volver a Inicio</span>
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
                            <div class="name"><?php echo $a_usuario ?></div>
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
                    <div class="container center" style="display: flex; align-items: center; justify-content: center;">
                        <a style="font-size: 30px;color: white">Ave</a>
                        <img width="40" height="40" style="padding-bottom: 5px" src="../IMG/iconNavbar.png"/>
                        <a style="font-size: 30px;color: white;">Fénix</a>
                    </div>
                </div>
            </nav>
            <section class="content">
                <div class="container-fluid">
                    <div class="row" style="padding-top: 25px">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header Header" style="display: flex; align-items: center; justify-content: center;">
                                    <h3 class="card-title" style="font-size: 24px">Bitacora de atención</h3>
                                </div>
                                <div class="card-body Cuerpo">
                                    <div class="row" style="margin-top: 15px">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="card">
                                                <div class="card-header Header" style="background-color: #558b2f; color: white">
                                                    <h5 class="col-sm-12 col-md-12 col-lg-12">Datos del beneficiario:</h5>
                                                </div>
                                                <div class="card-body Cuerpo" style="background-color: #C8E6C9">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <?php
                                                            $beneficiario = $data->getBenefi($rutB);
                                                            $edad = $data->getEdad($rutB);
                                                            $diagnos = $data->getDiagValid($rutB);
                                                            $diagnost = $data->getDiagCom($rutB);
                                                            $consultas = $data->getConsEvent($rutB, $rut);
                                                            $programas = $data->getCountPrograma($rutB, $rut);
                                                            $cuentaConsu;
                                                            $cuentaProgram;
                                                            $countP;
                                                            $programa = $data->getPrograma($rutB, $rut);

                                                            if (mysqli_num_rows($programa) > 0) {
                                                                foreach ($programa as $value) {
                                                                    //echo '<br>' . $value['programa'];
                                                                    $countP = $value['programa'];
                                                                }
                                                            } else {
                                                                $countP = 1;
                                                            }
                                                            foreach ($consultas as $value) {
                                                                //echo '<br> Consultas del mes' . $value['Consultas'];
                                                                $cuentaConsu = $value['Consultas'];
                                                            }

                                                            foreach ($programas as $value) {
                                                                //echo '<br>programa del mes' . $value['Programas'] . '<br>';
                                                                $cuentaProgram = $value['Programas'];
                                                            }
                                                            if ($cuentaConsu == $cuentaProgram) {
                                                                $countP += 1;
                                                            } else {
                                                                //echo 'el programa es: ' . $countP;
                                                            }

                                                            $nombreBe;
                                                            $apellidoBe;
                                                            $rutBe;
                                                            $fechaN;
                                                            $ano;
                                                            $meses;
                                                            $diagnosB;
                                                            $codeB;
                                                            foreach ($beneficiario as $value) {
                                                                $nombreBe = $value['nombre'];
                                                                $apellidoBe = $value['apellido'];
                                                                $rutBe = $value['RUT'];
                                                                $fechaN = $value['fecha_nac'];
                                                            }
                                                            foreach ($edad as $value) {
                                                                $ano = $value['Años'];
                                                                $meses = $value['Meses'];
                                                                if ($meses < 0) {
                                                                    $ano = $ano - $meses;
                                                                    $meses = 12 + $meses;
                                                                }
                                                            }

                                                            if ($diagnos) {
                                                                foreach ($diagnost as $value) {
                                                                    $diagnosB = $value['codigo'];
                                                                    $codeB = $value['nombre'];
                                                                }
                                                            } else {
                                                                $diagnosB = "No posee diagnostico";
                                                                $codeB = "0";
                                                            }

                                                            $tipoA = $data->getDatosGenerales($rutBe);
                                                            $tAtencion;
                                                            foreach ($tipoA as $value) {
                                                                $tAtencion = $value['atencion'];
                                                            }
                                                            $textAt;
                                                            switch ($tAtencion) {
                                                                case 1:
                                                                    $textAt = 'Atención por beneficio (Programas sociales previo evaluación social)';
                                                                    break;
                                                                case 2:
                                                                    $textAt = 'Atención por programa pagado (Costo mínimo asociado)';
                                                                    break;
                                                                default:
                                                                    break;
                                                            }
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Rut</span>
                                                                        </div>
                                                                        <input type="text" id="rut_b1" name="txt_rutB1" value="<?php echo $rutBe; ?>" readonly class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Nombres</span>
                                                                        </div>
                                                                        <input type="text" id="nombre1" name="txt_n1" value="<?php echo $nombreBe; ?>" readonly class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Apellidos</span>
                                                                        </div>
                                                                        <input type="text" id="apellido1" name="txt_a1" value="<?php echo $apellidoBe; ?>" readonly class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                                    <div class="input-group mb-3 dates">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Fecha de nacimiento</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"  readonly value="<?php echo $fechaN; ?>" name="txt_nac"  aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Edad</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_dire" value="<?php echo $ano . " Años " . $meses . " Meses" ?>" readonly aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">Diagnostico</span>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="txt_diag" value="<?php echo $diagnosB . "-" . $codeB ?>" readonly aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="post" action="../controller/controllerRegBitacora.php">
                                        <div class="row" style="margin-top: 15px">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header Header" style="background-color: #558b2f; color: white">
                                                        <h5 class="col-sm-12 col-md-12 col-lg-12">Programa:</h5>
                                                    </div>
                                                    <div class="card-body Cuerpo" style="background-color: #C8E6C9">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text" id="basic-addon1">N°</span>
                                                                            </div>
                                                                            <input type="hidden" class="form-control" name="txt_rutB" value="<?php echo $rutBe; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                                                            <input type="hidden" class="form-control" name="txt_evento" value="<?php echo $idB; ?>" aria-label="Username" aria-describedby="basic-addon1">
                                                                            <input type="text" class="form-control" name="txt_program" placeholder="ej: 1" aria-label="Username" aria-describedby="basic-addon1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 15px">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header Header" style="background-color: #558b2f; color: white">
                                                        <h5 class="col-sm-12 col-md-12 col-lg-12">Tipo de atención:</h5>
                                                    </div>
                                                    <div class="card-body Cuerpo" style="background-color: #C8E6C9">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="col-md-10 col-sm-10">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="t_atencion" value="1">
                                                                                <label class="form-check-label" for="t_atencion">
                                                                                    Atención por beneficio (Programas sociales previo evaluación social)
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="t_atencion" value="2">
                                                                                <label class="form-check-label" for="t_atencion">
                                                                                    Atención por programa pagado (Costo mínimo asociado)
                                                                                </label>
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
                                        <div class="row" style="margin-top: 15px">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header Header" style="background-color: #558b2f; color: white">
                                                        <h5 class="col-sm-12 col-md-12 col-lg-12">Antecedentes Relevantes:</h5>
                                                    </div>
                                                    <div class="card-body Cuerpo" style="background-color: #C8E6C9">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">Antecedentes</span>
                                                                            </div>
                                                                            <textarea class="form-control" id="txtarea" name="txt_ant" aria-label="With textarea"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header Header" style="background-color: #558b2f; color: white">
                                                        <h5 class="col-sm-12 col-md-12 col-lg-12">Bitacora:</h5>
                                                    </div>
                                                    <div class="card-body Cuerpo" style="background-color: #C8E6C9">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <input class="input-group-text" disabled type="text" size="10" value="Objetivos:">
                                                                            </div>
                                                                            <textarea class="form-control" id="txt_obj" name="txt_obs" aria-label="With textarea"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <input class="input-group-text" disabled type="text" size="10" value="Actividad:">
                                                                            </div>
                                                                            <textarea class="form-control" id="txt_act" name="txt_act" aria-label="With textarea"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <input class="input-group-text" disabled type="text" size="10" value="Acuerdo:">
                                                                            </div>
                                                                            <textarea class="form-control" id="txt_acu" name="txt_acu" aria-label="With textarea"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <input class="input-group-text" disabled type="text" size="10" value="Observaciones:">
                                                                            </div>
                                                                            <textarea class="form-control" id="txt_obs" name="txt_obs" aria-label="With textarea"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="card text-center">
                                                    <div class="card-header Header">
                                                        Por favor verificar bien la información ingresada
                                                    </div>
                                                    <div class="card-body Cuerpo">
                                                        <div class="row justify-content-around">
                                                            <div class="col-sm-12 col-md-8 col-lg-8">
                                                                <button type="submit" id="btn_Action" class="btn btn-block submitModal">Registrar bitacora</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer Footer">
                                                        Encontraras una copia de esta bitacora en el apartado Programas de tu menu. (En formato PDF)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </body>
    <script>
        function expandTextarea(id) {
            document.getElementById(id).addEventListener('keyup', function () {
                this.style.overflow = 'hidden';
                this.style.height = 0;
                this.style.height = this.scrollHeight + 'px';
            }, false);
        }

        expandTextarea('txtarea');
        expandTextarea('txt_obj');
        expandTextarea('txt_act');
        expandTextarea('txt_acu');
        expandTextarea('txt_obs');
    </script>
</html>