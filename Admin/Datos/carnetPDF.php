<?php
include_once '../../DB/Model_Data.php';

$data = new Data();
$conexion = $data->getConnection();

$rut = isset($_GET['rut']) ? $_GET['rut'] : null;
//echo $rut;
?>
<html>
    <head>
        <title>Copia Carnet Beneficiario - PDF</title>
        <link rel="icon" href="../../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,  shrink-to-fit=no">
        <script src="../../Materialize/js/funciones.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../../Materialize/css/styleSideBar.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="../../js/validarut.js"></script>
        <script src="../../js/jquery.rut.js"></script>
        <link rel="stylesheet" href="../../Materialize/datepick.css">
        <link rel="stylesheet" href="../../Materialize/css/sweetalert2.min.css">
        <script src="../../Materialize/datepicke.js"></script>
        <script src="../../js/sweetalert2.all.min.js"></script>
        <script src="../../js/html2pdf.bundle.min.js"></script>
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
                    <img src="../../IMG/iconEntrevista.png" alt="iconoEntrevista" height="80" width="110" style="padding-left: 10px;"/>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6" style="display: flex; align-items: last; justify-content: right">
                    <img src="../../IMG/iconEntrevista.png" alt="iconoEntrevista" height="80" width="110" style="padding-right: 15px;"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-12 col-lg-12" style="display: flex; align-items: center; justify-content: center;">
                    <h2 class="tituloPDF">Copia Carnet Beneficiario<hr noshade style="border-top: 5px solid black; margin-top: -5px;"/></h2>
                </div>
            </div>
            <?php
            $bene = $data->getBenefi($rut);
            foreach ($bene as $value) {
                ?>
                <div class="row">
                    <p align="justify">
                        Se presenta la copia de la cedula de identidad de: <?php echo $value['RUT']; ?> correspondiente a Don(ña): <?php echo $value['nombre'] . ' ' . $value['apellido'] ?>
                    </p>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12" style="display: flex; align-items: center; justify-content: center;">
                        <img width="500" height="300" src="data:image/*;base64,<?php echo base64_encode($value['c_identidad'])?>">
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </body>
    <script>
        $("#cerrar").click(function () {
            window.close();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Escuchamos el click del botón
            const $boton = document.querySelector("#btn_pdf");
            $boton.addEventListener("click", () => {
                const $elementoParaConvertir = document.querySelector('#cuerpo'); // <-- Aquí puedes elegir cualquier elemento del DOM
                html2pdf()
                        .set({
                            margin: [.5, .5, .5, .5],
                            filename: 'Carnet Identidad - <?php echo $rut ?>.pdf',
                            image: {
                                type: 'jpeg',
                                quality: 0.98
                            },
                            html2canvas: {
                                scale: 2, // A mayor escala, mejores gráficos, pero más peso
                                letterRendering: true,
                            },
                            pagebreak: {mode: 'avoid-all', before: '#postParto'},
                            jsPDF: {
                                unit: "in",
                                format: "letter",
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
                    text: 'Se ha generado y se esta descargando el documento con el nombre "Carnet Identidad <?php echo $rut ?>.pdf"',
                    showConfirmButton: true,
                })
            });
        });
    </script>
</html>
