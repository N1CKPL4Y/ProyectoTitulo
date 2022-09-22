<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Actualizando Beneficiario</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function Success() {
                swal({
                    title: "Actualización Exitosa",
                    text: "Beneficiario actualizado exitosamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/VisBeneficiario.php';
                        });
            }
            
            function Error() {
                swal({
                    title: "ERROR",
                    text: "Algun dato es incorrecto, reintente",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/VisBeneficiario.php';
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

$rut = isset($_POST["txt_rut"]) ? $_POST["txt_rut"] : null;
$nombre = isset($_POST["nombreB"]) ? $_POST["nombreB"] : null;
$apellido = isset($_POST["apellidoB"]) ? $_POST["apellidoB"] : null;

if(empty($_POST["comunaB"])){
    $comunaB = isset($_POST["comunaA"]) ? $_POST["comunaA"] : null;
}else{
    $comunaB = isset($_POST["comunaB"]) ? $_POST["comunaB"] : null;
}

if(empty($_POST["direccionB"])){
    $direccionB = isset($_POST["direccionA"]) ? $_POST["direccionA"] : null;
}else{
    $direccionB = isset($_POST["direccionB"]) ? $_POST["direccionB"] : null; 
}

//echo $comunaB." ".$direccionB;

if($comunaB && $direccionB){
    echo '<script>Success()</script>';
    $data->updateBene($rut, $direccionB, $comunaB);
}else{
    echo '<script>Error()</script>';
}
?>

