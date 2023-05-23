<?php
session_start();
$rut = isset($_GET['rut']) ? $_GET['rut'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

$cargo = $_SESSION['cargo'];
//echo $cargo;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Bitácora</title>
        <link rel="stylesheet" href="../Bootstrap/css/styleBody.css"/>
        <script src="../js/sweetalert2.all.min.js"></script>
        <link href="../Bootstrap/css/sweetalert2.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            let rut = '<?php echo $rut; ?>';
            let id = <?php echo $id; ?>;
            function Generate() {
                let timerInterval
                Swal.fire({
                    title: 'Atención!',
                    html: 'Generando bitácora de atención.',
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
                        let cargo =<?php echo $cargo; ?>;
                        if (cargo == 4) {
                            window.location.href = '../ProfeInterno/Bitacora.php?rut=' + rut + '&id=' + id;
                        } else if (cargo == 3) {
                            window.location.href = '../ProfeInterno/BitacoraProfesional.php?rut=' + rut + '&id=' + id;
                        }
                    }
                });
            }
        </script>
    </body>
</html>
<?php
echo '<script>Generate();</script>';
?>
