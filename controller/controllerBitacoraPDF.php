<?php
session_start();
include_once '../DB/Model_Data.php';
include_once './traduccionfecha.php';
$data = new Data();
$id_Bitacora = isset($_GET['id']) ? $_GET['id'] : null;

$bitacora = $data->getBitacoraByID($id_Bitacora);
$id;
$beneficiario;
$usuario;
$programa;
$t_atencion;
$fecha;
$hora;
$antecedentes;
$objetivos;
$actividad;
$acuerdo;
$observacion;
foreach ($bitacora as $value) {
    $id = $value['id'];
    $beneficiario = $value['beneficiario'];
    $usuario = $value['usuario'];
    $programa = $value['programa'];
    $t_atencion = $value['t_atencion'];
    $fecha = $value['fecha'];
    $hora = $value['hora'];
    $antecedentes = $value['antecedentes_r'];
    $objetivos = $value['objetivo'];
    $actividad = $value['actividad'];
    $acuerdo = $value['acuerdo'];
    $observacion = $value['observacion'];
}
$areauser;
$textAt;
switch ($t_atencion) {
    case 1:
        $textAt = 'Atención por beneficio (Programas sociales previo evaluación social)';
        break;
    case 2:
        $textAt = 'Atención por programa pagado (Costo mínimo asociado)';
        break;
    default:
        break;
}

$beneficiarioCom = $data->getBenefi($beneficiario);
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title>Bitacora de atención PDF</title>
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
        <div class="container" style="padding-top: 15px; border-radius: 10px;">
            <div class="row justify-content-between">
                <div class="card col-lg-4 Cuerpo" style="padding: 10px; border-color: #C8E6C9 !important; align-items: start; justify-content: start">
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-12">
                            <span>Desea descargar este documento como PDF?</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-12">
                            <button class="btn submit" id="btn_pdf">Descargar</button>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 Cuerpo" style="padding: 10px; border-color: #C8E6C9 !important; align-items: end; justify-content: end">
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-12">
                            <span>Si termino de ver el pdf, cierre esta pestaña con el siguente boton</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-12">
                            <button class="btn btn-secondary" id="cerrar">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
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
                    <h2 class="tituloPDF">Bitacora de atención N° <?php echo $id; ?><hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h2>
                </div>
            </div>
            <div class="row pt-5" style="padding-left: 10px;">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h5 style="font-weight: bolder">Información del Beneficiario:</h5>
                </div>
            </div>
            <?php
            foreach ($beneficiarioCom as $value) {
                $fechaNac = fechaEsp($value['fecha_nac']);
                $edad = $data->getEdad($value['RUT']);
                $ano;
                $meses;
                foreach ($edad as $valueE) {
                    $ano = $valueE['Años'];
                    $meses = $valueE['Meses'];
                    if ($meses < 0) {
                        $ano = $ano - $meses;
                        $meses = 12 + $meses;
                    }
                }
                $diagnosB;
                $codeB;
                $diagnos = $data->getDiagValid($value['RUT']);
                $diagnost = $data->getDiagCom($value['RUT']);
                if ($diagnos) {
                    foreach ($diagnost as $valueX) {
                        $diagnosB = $valueX['codigo'];
                        $codeB = $valueX['nombre'];
                    }
                } else {
                    $diagnosB = "No posee diagnostico";
                    $codeB = "0";
                }
                ?>
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4" style="padding-left: 60px;">
                        <span style="font-size: 15px; font-weight: bolder">R.U.T:</span>
                        <span style="font-size: 15px"><?php echo $value['RUT'] . '.' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                        <span style="font-size: 15px; font-weight: bolder">Nombre Completo:</span>
                        <span style="font-size: 15px"><?php echo $value['nombre'] . ' ' . $value['apellido'] . '.' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                        <span style="font-size: 15px; font-weight: bolder">Fecha Nacimiento:</span>
                        <span style="font-size: 15px"><?php echo $fechaNac . '.' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                        <span style="font-size: 15px; font-weight: bolder">Edad:</span>
                        <span style="font-size: 15px"><?php echo $ano . ' años ' . $meses . ' meses.' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                        <span style="font-size: 15px; font-weight: bolder">Diagnostico:</span>
                        <span style="font-size: 15px"><?php echo $diagnos . ' - ' . $codeB . '.' ?></span>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 60px;">
                    <span style="font-size: 15px; font-weight: bolder">Tipo de atención:</span>
                    <span style="font-size: 15px"><?php echo $textAt . '.' ?></span>
                </div>
            </div>
            <div class="row pt-5" id="antece" style="padding-left: 10px;">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h5 style="font-weight: bolder">Antecedentes:</h5>
                </div>
            </div>
            <div class="row px-5" >
                <div class="col-sm-10 col-md-10 col-lg-12" style=" height: auto">
                    <p align="justify"><?php echo $antecedentes; ?></p>
                </div>
            </div>
            <div class="row pt-4" id="obj" style="padding-left: 10px;">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h5 style="font-weight: bolder">Objetivos:</h5>
                </div>
            </div>
            <div class="row px-5" >
                <div class="col-sm-10 col-md-10 col-lg-12" style=" height: auto">
                    <p align="justify"><?php echo $objetivos; ?></p>
                </div>
            </div>
            <div class="row pt-5" id="act" style="padding-left: 10px;">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h5 style="font-weight: bolder">Actividad:</h5>
                </div>
            </div>
            <div class="row px-5" >
                <div class="col-sm-10 col-md-10 col-lg-12" style=" height: auto">
                    <p align="justify" id="antecede"><?php echo $actividad; ?></p>
                </div>
            </div>
            <div class="row pt-4" id="acu" style="padding-left: 10px;">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h5 style="font-weight: bolder">Acuerdo:</h5>
                </div>
            </div>
            <div class="row px-5" >
                <div class="col-sm-10 col-md-10 col-lg-12" style=" height: auto">
                    <p align="justify"><?php echo $acuerdo; ?></p>
                </div>
            </div>
            <div class="row pt-4" id="obs" style="padding-left: 10px;">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h5 style="font-weight: bolder">Observaciones:</h5>
                </div>
            </div>
            <div class="row px-5" >
                <div class="col-sm-10 col-md-10 col-lg-12" style=" height: auto">
                    <p align="justify"><?php echo $observacion; ?></p>
                </div>
            </div>
            <div class="row px-5" id="no">
                <div class="col-sm-10 col-md-10 col-lg-12" style=" height: auto">
                </div>
            </div>
            <?php
            $user = $data->getUserbyRut($usuario);
            foreach ($user as $valueUser) {
                $area = $data->getAreaById($valueUser['a_user']);
                ?>
                <div class="row pt-4">
                    <div class="col-sm-6 col-md-12 col-lg-12" style="display: flex; align-items: center; justify-content: center;">
                        <?php echo '' . $valueUser['nombre'] . ' ' . $valueUser['apellido']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-12 col-lg-12" style="display: flex; align-items: center; justify-content: center;">
                        <?php
                        foreach ($area as $valueA) {
                            echo $valueA['nombre'];
                            $areauser = $valueA['nombre'];
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="row">
                <div class="col-sm-6 col-md-12 col-lg-12" style="display: flex; align-items: center; justify-content: center;">
                    <img src="../IMG/Timbre.png" width="220" height="250" style="opacity: 0.2">
                </div>
            </div>
        </div>
    </body>
    <script>
        $("#cerrar").click(function () {
            window.close();
        });
    </script>
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
                            filename: '<?php echo $beneficiario . '_N' . $id . '_' . $areauser; ?>.pdf',
                            image: {
                                type: 'jpeg',
                                quality: 0.98
                            },
                            html2canvas: {
                                scale: 3, // A mayor escala, mejores gráficos, pero más peso
                                letterRendering: true,
                            }, pagebreak: {
                                mode: 'avoid-all', before: ['#obj']
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
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Excelente',
                    text: 'Se ha generado y descargado el documento con el nombre <?php echo $beneficiario . '_N' . $id . '_' . $areauser; ?>.pdf',
                    showConfirmButton: true
                })
            });
        });
    </script>
</html>
