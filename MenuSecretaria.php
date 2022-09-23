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
$cargo = $_SESSION['cargo'];

if ($correo == null || "") {
    echo '<script language="javascript">alert("Acceso invalido");</script>';
    echo "<script> window.location.replace('index.php') </script>";
}

switch ($_SESSION['cargo']) {
    case 2:
        $area_u = "Secretari@";
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
        <title>Menú Secretaria</title>
        <link rel="icon" href="IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/validarut.js"></script>
        <script src="js/jquery.rut.js"></script>
        <link rel="stylesheet" href="Materialize/css/styleSideBar.css">
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <div class="sidebar open">
            <div class="logo-details">
                <a><div class="logo_name" style="font-size: 19px">Fundación Inclusiva</div></a>
                <i class='bx bx-menu' id="btn" ></i>        
            </div>
            <ul class="nav-list" style="margin-left: -2rem">
                <li>
                    <a href="Secretaria/EntrevistaFamilia.php">
                        <i class='bx bx-folder' ></i>
                        <span class="links_name">Registrar Entrevista</span>
                    </a>
                    <span class="tooltip">Registrar Entrevista</span>
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
                            <div class="name"><?php echo $area_u ?></div>
                            <div class="job"><?php echo $correo ?></div>
                        </div>
                        <a><i id="log_out" ></i></a>
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
                        <a style="font-size: 30px">Fenix</a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row justify-content-around" style="padding-top: 25px">
                    <div class="col-sm-12 col-md-10">
                        <div class="card" style="border-radius: 10px">
                            <div class="card-header" style="display: flex; align-items: center; justify-content: center;">
                                <h3 class="card-title">Registrar nuevo beneficiario</h3>
                            </div>
                            <div class="card" style="border-radius: 10px">
                                <form action="controller/controllerIngreso.php" method="post" enctype="multipart/form-data">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne" style="background-color: #558b2f">
                                                <h2 class="mb-0">
                                                    <button class="btn text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne" style="color: white">
                                                        Datos Generales
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="txt_motivo" style="margin-left: 10px">Motivo de acercamiento</label>
                                                                <input type="text" class="form-control" name="txt_motivo" id="motivo" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="txt_derivacion" style="margin-left: 10px">Derivación</label>
                                                                <input type="text" class="form-control" name="txt_derivacion" id="derivacion" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10 col-sm-10">
                                                            <label for="deshabilitar" id="labelDes" class="col-sm-10 col-form-label" >Seleccione el tipo de atencion:</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="t_atencion" value="1">
                                                                <label class="form-check-label" for="t_atencion">
                                                                    Atención por beneficio (Programas sociales previo evaluación social)
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="t_atencion" value="0">
                                                                <label class="form-check-label" for="t_atencion">
                                                                    Atención por programa pagado (Costo minimo asociado)
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo" style="background-color: #558b2f">
                                                <h2 class="mb-0">
                                                    <button class="btn text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-controls="collapseTwo" style="color: white">
                                                        Datos del beneficiario
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="nombre" style="margin-left: 10px">Nombres Beneficiario</label>
                                                                <input type="text" class="form-control" name="txt_nombre" id="nombre" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="apellido" style="margin-left: 10px">Apellidos Beneficiario</label>
                                                                <input type="text" class="form-control" name="txt_apellido" id="apellido" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="rut" style="margin-left: 10px">R.U.T Beneficiario</label>
                                                                <input type="text" class="form-control" name="txt_rut" id="rut" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)">
                                                                <span style="color: grey; margin-left: 10px">Si el R.U.T termina con K, reemplacelo con un 0</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group dates">
                                                                <label for="datepicker">Nombre</label>
                                                                <input type="text" autocomplete="off" class="form-control"  name="txt_nombre" id="datepicker" style="border-radius: 50px; text-indent: 18px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tipo_user"></label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Genero</label>
                                                                    </div>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="cbo_genero">
                                                                        <option value="" disabled selected> -- Seleccione Genero -- </option>
                                                                        <option value="1">Masculino</option>
                                                                        <option value="2">Femenino</option>
                                                                        <option value="3">Otro</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="direccion" style="margin-left: 10px">Dirección</label>
                                                                <input type="text" class="form-control" name="txt_direccion" id="direccion" required >
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="comuna" style="margin-left: 10px">Comuna</label>
                                                                <input type="text" class="form-control" name="txt_comuna" id="comuna" required >
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="input-group mb-3">
                                                                <div class="custom-file">
                                                                    <label>Ingrese copia carnet</label>
                                                                    <input type="file" class="custom-file-input" id="inputGroupFile02" name="file_carnet" accept="image/*">
                                                                </div>
                                                                <span style="color: grey">Debe ser formato de imagen</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <label for="rd_teleton" id="labelteleton" class="col-sm-10 col-form-label" >Participa en instituto Teleton:</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="rd_teleton" value="1">
                                                                <label class="form-check-label" for="rd_teleton">
                                                                    SI
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="rd_teleton" value="0">
                                                                <label class="form-check-label" for="rd_teleton">
                                                                    NO
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tipo_user"></label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Sistema de salud</label>
                                                                    </div>
                                                                    <select class="custom-select" id="inputGroupSelect01" name="cbo_prevision1">
                                                                        <option value="" disabled selected> -- Seleccione -- </option>
                                                                        <?php
                                                                        $prevision = $data->getAllPrevision();
                                                                        foreach ($prevision as $key) {
                                                                            echo '<option value="' . $key['id'] . '" id="options">' . $key['nombre'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row tele">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree" style="background-color: #558b2f">
                                                <h2 class="mb-0">
                                                    <button class="btn text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: white">
                                                        Diagnostico del beneficiario
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <label for="rd_teleton" id="labelteleton" class="col-sm-10 col-form-label" >¿El beneficiario presenta algun diagnostico?</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="diagnostico" value="1">
                                                                <label class="form-check-label" for="diagnostico">
                                                                    SI
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="diagnostico" value="0">
                                                                <label class="form-check-label" for="diagnostico">
                                                                    NO
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label for="cbo_condicion">¿Cual es el diagnostico que presenta el beneficiario?</label>
                                                                <div class="input-group mb-6">
                                                                    <select class="custom-select" id="inputGroupSelect01" name="cbo_condicion">
                                                                        <option value="" disabled selected> -- Seleccione -- </option>
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
                                                    </div>

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
            <script>
                $(function () {
                    $('.dates #datepicker').datepicker({
                        'format': 'yyyy-mm-dd',
                        'autoclose': true
                    });
                });
            </script>
            <script type="text/javascript">
                $('document').ready(function () {
                    $('#collapseOne').collapse({
                        toggle: false
                    })
                });
            </script>
            <script>
                $(document).ready(function () {

                    $('.datepicker').datepicker({
                        format: 'yyyy-mm-dd'
                    });
                });
                $(document).ready(function () {
                    $('.timepicker').timepicker({
                        twelveHour: false
                    });
                });
            </script>
            <script type="text/javascript">
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
                $(function () {
                    $("input#rutT").rut({
                        formatOn: 'keyup',
                        minimumLength: 8, // validar largo mínimo; default: 2
                        validateOn: 'change' // si no se quiere validar, pasar null
                    });

                    var input = document.getElementById('rutT');
                    input.addEventListener('input', function () {
                        if (this.value.length >= 13)
                            this.value = this.value.slice(0, 12);
                    })
                })
                document.getElementById('correo').addEventListener('input', function () {
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
                function pensiones() {

                    var radio = $("input[type=radio][name=pension]").filter(":checked")[0];
                    var radio1 = $("input[type=radio][name=pension1]").filter(":checked")[0];
                    var radio2 = $("input[type=radio][name=pension2]").filter(":checked")[0];
                    var radio3 = $("input[type=radio][name=pension3]").filter(":checked")[0];
                    var radio4 = $("input[type=radio][name=pension4]").filter(":checked")[0];

                    //const button = document.querySelectorAll('.pension');
                    const button1 = document.querySelectorAll('.pension1');
                    const button2 = document.querySelectorAll('.pension2');
                    const button3 = document.querySelectorAll('.pension3');
                    const button4 = document.querySelectorAll('.pension4');
                    const button5 = document.querySelector('.otroP');

                    console.log(button5);

                    if (radio.value == 1) {
                        var a = 0, b = 0, c = 0, d = 0, e = 0;
                        button1.forEach(function (document) {
                            button1[a].disabled = false;
                            a++;
                        });
                        button2.forEach(function (document) {
                            button2[b].disabled = false;
                            b++;
                        });
                        button3.forEach(function (document) {
                            button3[c].disabled = false;
                            c++;
                        });
                        button4.forEach(function (document) {
                            button4[d].disabled = false;
                            d++;
                        });

                        if (radio1.value == 0 && radio2.value == 0 && radio3.value == 0 && radio4.value == 0) {
                            button5.disabled = false;
                        } else {
                            button5.disabled = true;
                        }
                    } else {
                        var a = 0, b = 0, c = 0, d = 0, e = 0;
                        button1.forEach(function (document) {
                            button1[a].disabled = true;
                            button1[1].checked = true;
                            a++;
                        });
                        button2.forEach(function (document) {
                            button2[b].disabled = true;
                            button2[1].checked = true;
                            b++;
                        });
                        button3.forEach(function (document) {
                            button3[c].disabled = true;
                            button3[1].checked = true;
                            c++;
                        });
                        button4.forEach(function (document) {
                            button4[d].disabled = true;
                            button4[1].checked = true;
                            d++;
                        });
                        button5.disabled = true;
                    }
                }

                $(document).ready(function () {
                    $('.pension').change(function () {
                        pensiones();
                    });
                    $('.pension1').change(function () {
                        pensiones();
                    });
                    $('.pension2').change(function () {
                        pensiones();
                    });
                    $('.pension3').change(function () {
                        pensiones();
                    });
                    $('.pension4').change(function () {
                        pensiones();
                    });

                    $('.discapacidad').change(function () {
                        credencial();
                    });

                    $('.teleton').change(function () {
                        teleton();
                    });


                    $('.diagnostico').change(function () {
                        diagnost();
                    });
                });

                //const diag = document.querySelectorAll('#options');
                //const sec = document.querySelector('.condicion');

                const fecha = document.querySelectorAll('.diag');

                function diagnost() {
                    var condi = $("input[type=radio][name=diagnostico]").filter(":checked")[0];

                    if (condi.value == 1) {
                        console.log('Funca');
                        var x = 0;
                        fecha.forEach(function (document) {
                            fecha[x].disabled = false;
                            x++;
                        });
                    } else {
                        console.log('No Funca');
                        var x = 0;
                        fecha.forEach(function (document) {
                            fecha[x].disabled = true;
                            x++;
                        });
                    }
                }

                const n_cred = document.querySelectorAll('.numCred');

                function credencial() {
                    var creden = $("input[type=radio][name=discapacidad]").filter(":checked")[0];

                    if (creden.value == 1) {
                        var z = 0;
                        n_cred.forEach(function (document) {
                            n_cred[z].disabled = false;
                            z++;
                        });
                    } else {
                        var s = 0;
                        n_cred.forEach(function (document) {
                            n_cred[s].disabled = true;
                            s++;
                        });
                    }
                }
                ;

                const inpTele = document.querySelector('.tele');
                function teleton() {
                    var radioTeleton = $("input[type=radio][name=rd_teleton]").filter(":checked")[0];

                    if (radioTeleton.value == 1) {
                        inpTele.innerHTML = '<div clas="col-sm-12 col-md-6 col-lg-6"><div class="form-group"><label for="comuna" style="margin-left: 10px">Numero registro Teletón</label><input type="text" class="form-control" name="txt_Nteleton" id="teleton" required ></div></div>';
                    } else {
                        inpTele.innerHTML = "";
                    }
                }


                var noP = document.getElementById('noP');
                var noP1 = document.getElementById('noP1');
                var noP2 = document.getElementById('noP2');
                var noP3 = document.getElementById('noP3');
                var noP4 = document.getElementById('noP4');
                var siP = document.getElementById('siP');

                const dirTutor = document.querySelector('.dirTutor');
                //Scripts en input "vive con el beneficiario?"
                function viveCon() {
                    dirTutor.innerHTML = "";
                    document.getElementById('direccionT').disabled = true
                    document.getElementById('comuT').disabled = true
                }
                function noViveCon() {
                    dirTutor.innerHTML = "<div class='col s6'><div class='input-field col s10'><input id='direccionT' style='background-color: white; border-radius: 10px' type='text' name='txt_direTutor' class='validate'><label class='active' for='direccionT'>Indique la direccion del tutor</label></div></div><div class='col s6'><div class='input-field col s6'><input id='comuT' style='background-color: white; border-radius: 10px' type='text' name='txt_comuTutor' class='validate'><label class='active' for='comuT'>Comuna</label></div> </div>";
                }
                //Scripts en input "tiene registro social de hogares?"
                function tieneR() {
                    document.getElementById('porcentajeF').disabled = false
                    document.getElementById('cR').disabled = false
                }
                function noTieneR() {
                    document.getElementById('porcentajeF').disabled = true
                    document.getElementById('cR').disabled = true
                }
                //Scripts en input "es beneficiario de alguna pension?"

                function sip1() {
                    if (siP1.checked) {
                        document.getElementById('noP2').checked = true;
                        document.getElementById('noP3').checked = true;
                        document.getElementById('noP4').checked = true;

                    }
                }
                function sip2() {
                    if (siP2.checked) {
                        document.getElementById('noP1').checked = true;
                        document.getElementById('noP3').checked = true;
                        document.getElementById('noP4').checked = true;

                    }
                }
                function sip3() {
                    if (siP3.checked) {
                        document.getElementById('noP1').checked = true;
                        document.getElementById('noP2').checked = true;
                        document.getElementById('noP4').checked = true;

                    }
                }
                function sip4() {
                    if (siP4.checked) {
                        document.getElementById('noP1').checked = true;
                        document.getElementById('noP2').checked = true;
                        document.getElementById('noP3').checked = true;

                    }
                }
            </script>
    </body>
</html>