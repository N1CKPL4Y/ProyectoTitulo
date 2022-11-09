<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Cerrando Sesion</title>
        <link rel="stylesheet" href="../Bootstrap/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function Salir() {
                swal({
                    title: "Cerrando Sesion",
                    text: "Has cerrado sesion correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../index.php';
                        });
            }
        </script>
    </body>
</html>
<?php
include_once '../DB/Model_Data.php';

$data = new Data();

$conect = $data->getConnection();

$rut = $_SESSION['rut'];
$log = 0;
$data->updateLog($rut, $log);
session_unset();
session_destroy();
echo '<script>Salir();</script>';
?>

