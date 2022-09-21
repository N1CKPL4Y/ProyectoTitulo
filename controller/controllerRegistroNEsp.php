<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Registrando Nueva Area de especialista</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function Registrado() {
                swal({
                    title: "Registrado!",
                    text: "Nueva area de especialista registrada correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/EditarDatos.php';
                        });
            }

            function Error() {
                swal({
                    title: "ERROR",
                    text: "Esta area de especialista ya existe",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/EditarDatos.php';
                        });
            }
        </script>
    </body>
</html>

<?php
include_once '../DB/Model_Data.php';
$data = new Data();

$conect = $data->getConnection();
session_start();

$nombre = isset($_POST["txt_nEsp"]) ? $_POST["txt_nEsp"] : null;
//echo $nombre;
$existe = $data->existEsp($nombre);
if ($nombre == $existe) {
    echo '<script>Error()</script>';
} else if ($nombre != $existe) {
    $data->addEsp($nombre);
    echo '<script>Registrado()</script>';
}
?>


