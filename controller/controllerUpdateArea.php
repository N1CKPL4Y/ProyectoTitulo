<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Actualizando Area</title>
        <link rel="stylesheet" href="../Bootstrap/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function habilitar() {
                swal({
                    title: "Habilitación Exitosa",
                    text: "Area habilitada exitosamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/EditarDatos.php';
                        });
            }
            
            function deshabilitar() {
                swal({
                    title: "Deshabilitación Exitosa",
                    text: "Area deshabilitada exitosamente",
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
                    text: "No se puede realizar esta acción",
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

    $area = $_GET['id'];
    $p = $_GET['p'];
    //echo $area.' '.$p;
    
    if($p == 0){
        $data->updateArea($area, $p);
        echo '<script>deshabilitar()</script>';
        //echo 'hola';
    }else if ($p ==1){
        $data->updateArea($area, $p);
        echo '<script>habilitar()</script>';
        //echo 'adios';
    }else{
        //echo 'no llega na oe';
    }
?>


