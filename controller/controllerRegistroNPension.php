<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Iniciando Sesion</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function Registrado() {
                swal({
                    title: "Registrado!",
                    text: "Nueva Pensión registrada correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../EditarDatos.php';
                        });
            }

            function Error() {
                swal({
                    title: "ERROR",
                    text: "Esta Pensión ya existe",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../EditarDatos.php';
                        });
            }
        </script>
    </body>
</html>

<?php
include_once '../Model_Data.php';
$data = new Data();

$conect = $data->getConnection();
session_start();

$pension = isset($_POST["txt_nPension"]) ? $_POST["txt_nPension"] : null;
//echo $pension;
$existe = $data->existPension($pension);
if ($pension == $existe){
    echo '<script>Error()</script>';
}else if($pension != $existe){
    $data->addPension($pension);
    echo '<script>Registrado()</script>';

}
?>

