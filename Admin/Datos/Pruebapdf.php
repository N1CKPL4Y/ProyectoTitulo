<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title>Prueba PDF</title>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
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
        <link rel="stylesheet" href="../Materialize/datepick.css">
        <link rel="stylesheet" href="../../Materialize/css/sweetalert2.min.css">
        <script src="../../Materialize/datepicke.js"></script>
        <script src="../../js/sweetalert2.all.min.js"></script>
        <script src="../../js/html2pdf.bundle.min.js"></script>
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <h2>Mi primer PDF</h2>
        <br>
        <h3>With javascript</h3>
        <img src="../../IMG/quokka.jpg">
        <button class="btn btn-primary" id="btn_pdf">Descargar pdf</button>
    </body>
    <script>
        Swal.fire({
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
                const $boton = document.querySelector("#btn_pdf");
                $boton.addEventListener("click", () => {
                    const $elementoParaConvertir = document.body; // <-- Aquí puedes elegir cualquier elemento del DOM
                    html2pdf()
                            .set({
                                margin: 1,
                                filename: 'Prueba.pdf',
                                image: {
                                    type: 'jpeg',
                                    quality: 0.98
                                },
                                html2canvas: {
                                    scale: 3, // A mayor escala, mejores gráficos, pero más peso
                                    letterRendering: true,
                                },
                                jsPDF: {
                                    unit: "in",
                                    format: "a4",
                                    orientation: 'portrait' // landscape o portrait
                                }
                            })
                            .from($elementoParaConvertir)
                            .save()
                            .catch(err => console.log(err));
                });
            }
        });
        function generatePDF() {

            /*document.addEventListener("DOMContentLoaded", () => {
             // Escuchamos el click del botón
             
             });*/
        }
    </script>
</html>
