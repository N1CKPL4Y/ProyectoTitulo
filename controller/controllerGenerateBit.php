<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Bitacora</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="../js/sweetalert2.all.min.js"></script>
        <link href="../Materialize/css/sweetalert2.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function Generate() {
                let timerInterval
                Swal.fire({
                    title: 'Atención!',
                    html: 'Generando bitacora de atención.',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = '../Admin/Calendario.php';
                    }
                });
            }
        </script>
    </body>
</html>
<?php
echo '<script>Generate();</script>';
?>
