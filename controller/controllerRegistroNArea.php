<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Registrando Nueva Area</title>
        <link rel="stylesheet" href="../Bootstrap/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function Registrado() {
                swal({
                    title: "Registrado!",
                    text: "Nueva area registrada correctamente",
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
                    text: "Esta area ya existe, compruebe si es que está habilitada",
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


$nombre = isset($_POST["txt_narea"]) ? $_POST["txt_narea"] : null;
//echo $nombre;
$existe = $data->existArea($nombre);

if($nombre == $existe){
    echo '<script>Error()</script>';
}else if($nombre != $existe){
    $data->addArea($nombre);
    echo '<script>Registrado()</script>';
}
?>



