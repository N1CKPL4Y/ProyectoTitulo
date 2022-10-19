<?php
session_start();
include_once './traduccionfecha.php';
include_once '../DB/Model_Data.php';
$data = new Data();
$rutBene = isset($_GET['rutBene']) ? $_GET['rutBene'] : null;
//echo $rutBene;
$benef = $data->getBenefi($rutBene);
$nombreB;
$apellidoB;
$fechaNacB;
$generoB;
$direccionB;
$comunaB;
foreach ($benef as $value) {
    $nombreB = $value['nombre'];
    $apellidoB = $value['apellido'];
    $fechaNacB = $value['fecha_nac'];
    $generoB = $value['genero'];
    $direccionB = $value['direccion'];
    $comunaB = $value['comuna'];
}

$fechaNBene = fechaEsp($fechaNacB);

$parentesco = $data->getParentesco($rutBene);
$parecido;
$rutTutor;
foreach ($parentesco as $value) {
    $parecido = $value['parecido'];
    $rutTutor = $value['tutor'];
}

$textParecido;
switch ($parecido) {
    case 1:
        $textParecido = 'Padre';
        break;
    case 2:
        $textParecido = 'Madre';
        break;
    case 3:
        $textParecido = 'Otro';
    default:
        break;
}

$tutor = $data->getTutor($rutTutor);
$nombreT;
$fechaNacT;
$direccionT;
$comunaT;
$telefonoT;
$emailT;
foreach ($tutor as $value) {
    $nombreT = $value['nombre'];
    $fechaNacT = $value['fecha_nac'];
    $direccionT = $value['direccion'];
    $comunaT = $value['comuna'];
    $telefonoT = $value['telefono'];
    $emailT = $value['email'];
}

$fechaNTutor = fechaEsp($fechaNacT);

$entrevista = $data->getEntrevista($rutBene);
$rutU;
$idEmbParto;
$idPostParto;
$idLactancia;
$idDesMotriz;
$idVision;
$idAudicion;
$idDesLengua;
$idDesSocial;
$idSalud;
$idAntFam;
$idAntEscolar;
$idActFam;
$fechaE;
foreach ($entrevista as $value) {
    $rutU = $value['rut_usuario'];
    $idEmbParto = $value['id_embPart'];
    $idPostParto = $value['id_postParto'];
    $idLactancia = $value['id_lactancia'];
    $idDesMotriz = $value['id_DesMotriz'];
    $idVision = $value['id_Vision'];
    $idAudicion = $value['id_Audicion'];
    $idDesLengua = $value['id_DesLengua'];
    $idDesSocial = $value['id_DesSocial'];
    $idSalud = $value['id_Salud'];
    $idAntFam = $value['id_AntFam'];
    $idAntEscolar = $value['id_AntEscolar'];
    $idActFam = $value['id_ActFam'];
    $fechaE = $value['fecha'];
}

$fecha_entre = fechaEsp($fechaE);

$usuario = $data->getUserbyRut($rutU);
$nombreU;
$apellidoU;
$cargo;
foreach ($usuario as $value) {
    $nombreU = $value['nombre'];
    $apellidoU = $value['apellido'];
    $cargo = $value['cargo'];
}
$cargoU = $data->getCargobyId($cargo);
$nombreCargo;
foreach ($cargoU as $value) {
    $nombreCargo = $value['nombre'];
}
?>
<html>
    <head>
        <title>Entrevista Antecedentes - PDF</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,  shrink-to-fit=no">
        <script src="../Materialize/js/funciones.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../Materialize/css/styleSideBar.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="../js/validarut.js"></script>
        <script src="../js/jquery.rut.js"></script>
        <link rel="stylesheet" href="../Materialize/datepick.css">
        <link rel="stylesheet" href="../Materialize/css/sweetalert2.min.css">
        <script src="../Materialize/datepicke.js"></script>
        <script src="../js/sweetalert2.all.min.js"></script>
        <script src="../js/html2pdf.bundle.min.js"></script>
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <div class="container-fluid" style="padding-top: 15px;">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <button class="btn btn-primary" id="btn_pdf">Descargar</button>
                </div>
            </div>
            <br>
        </div>
        <div class="container-fluid" id="cuerpo">

            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <img src="../IMG/iconEntrevista.png" alt="iconoEntrevista" height="80" width="110" style="padding-left: 10px;"/>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6" style="display: flex; align-items: last; justify-content: right">
                    <img src="../IMG/iconEntrevista.png" alt="iconoEntrevista" height="80" width="110" style="padding-right: 15px;"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-12 col-lg-12" style="display: flex; align-items: center; justify-content: center;">
                    <h2 class="tituloPDF">Entrevista de Antecedentes</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6" style="padding-left: 30px; padding-top: 80px">
                    <h5 style="font-weight: bolder">Información del Beneficiario:</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">R.U.T:</span>
                    <span style="font-size: 15px"><?php echo $rutBene . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Nombre Completo:</span>
                    <span style="font-size: 15px"><?php echo $nombreB . ' ' . $apellidoB . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Fecha Nacimiento:</span>
                    <span style="font-size: 15px"><?php echo $fechaNBene . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Dirección:</span>
                    <span style="font-size: 15px"><?php echo $direccionB . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Comuna:</span>
                    <span style="font-size: 15px"><?php echo $comunaB . '.' ?></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6" style="padding-left: 30px;">
                    <h5 style="font-weight: bolder">Información del Tutor:</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">R.U.T:</span>
                    <span style="font-size: 15px"><?php echo $rutTutor . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Nombre Completo:</span>
                    <span style="font-size: 15px"><?php echo $nombreT . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Fecha Nacimiento:</span>
                    <span style="font-size: 15px"><?php echo $fechaNTutor . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Dirección:</span>
                    <span style="font-size: 15px"><?php echo $direccionT . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Comuna:</span>
                    <span style="font-size: 15px"><?php echo $comunaT . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Teléfono:</span>
                    <span style="font-size: 15px"><?php echo $telefonoT . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Correo Electrónico:</span>
                    <span style="font-size: 15px"><?php echo $emailT . '.' ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-left: 30px;">
                    <span style="font-size: 15px; font-weight: bolder">Parentesco:</span>
                    <span style="font-size: 15px"><?php echo $textParecido . '.' ?></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-10 col-md-10 col-lg-12" style="padding-left: 30px; padding-right: 30px; height: auto">
                    <p align="justify">Este documento contiene la entrevista de antecedentes realizada el dia "<?php echo $fecha_entre ?>".
                        Dicha entrevista fue registrada en el sistema por el(la) colaborador(a) "<?php echo $nombreU . ' ' . $apellidoU ?>" con el cargo de "<?php echo $nombreCargo ?>". La cual a partir de la información proporcionada por el(la)
                        Sr(a) "<?php echo $nombreT ?>", cuyo parentesco con el beneficiario es el de "<?php echo $textParecido ?>", se
                        registraron los siguientes antecedentes: Antecedentes del embarazo, Antecedentes del parto,
                        Antecedentes del post parto, Lactancia, Desarrollo SensorioMotriz, Visión, Audición, Desarrollo del
                        Lenguaje, Desarrollo &#10;&#13; Social, Salud, Antecedentes Familiares, Antecedentes escolares y Actitud de la
                        familia.
                    </p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-10 col-md-10 col-lg-12" style="padding-left: 30px; padding-right: 30px; height: auto">
                    <p align="justify">Este documento contiene la entrevista de antecedentes realizada el dia "<?php echo $fecha_entre ?>".
                        Dicha entrevista fue registrada en el sistema por el(la) colaborador(a) "<?php echo $nombreU . ' ' . $apellidoU ?>" con el cargo de "<?php echo $nombreCargo ?>". La cual a partir de la información proporcionada por el(la)
                        Sr(a) "<?php echo $nombreT ?>", cuyo parentesco con el beneficiario es el de "<?php echo $textParecido ?>", se
                        registraron los siguientes antecedentes: Antecedentes del embarazo, Antecedentes del parto,
                        Antecedentes del post parto, Lactancia, Desarrollo SensorioMotriz, Visión, Audición, Desarrollo del
                        Lenguaje, Desarrollo &#10;&#13; Social, Salud, Antecedentes Familiares, Antecedentes escolares y Actitud de la
                        familia.
                    </p>
                </div>
            </div>
        </div>
    </body>
    <script>
        /*Swal.fire({
         title: '¿Desea Descargar esto?',
         text: "Se descargará este documento en formato PDF",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: 'Cancelar',
         confirmButtonText: 'Si, Descargar'
         }).then((result) => {
         if (result.isConfirmed) {
         Swal.fire(
         'Descargado!',
         'Revise su carpeta de descargas',
         'success'
         )
         }
         });*/

        document.addEventListener("DOMContentLoaded", () => {
            // Escuchamos el click del botón
            const $boton = document.querySelector("#btn_pdf");
            $boton.addEventListener("click", () => {
                const $elementoParaConvertir = document.querySelector('#cuerpo'); // <-- Aquí puedes elegir cualquier elemento del DOM
                html2pdf()
                        .set({
                            margin: [.5, 0],
                            filename: 'Prueba.pdf',
                            image: {
                                type: 'jpeg',
                                quality: 0.98
                            },
                            html2canvas: {
                                scale: 1, // A mayor escala, mejores gráficos, pero más peso
                                letterRendering: true,
                            },
                            jsPDF: {
                                unit: "in",
                                format: "legal",
                                orientation: 'portrait' // landscape o portrait
                            }
                        })
                        .from($elementoParaConvertir)
                        .save()
                        .catch(err => console.log(err));
            });
        });
    </script>
</html>
