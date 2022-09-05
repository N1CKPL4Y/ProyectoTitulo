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
            function Success() {
                swal({
                    title: "Registro Exitoso",
                    text: "Usuario registrado exitosamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../RNuevoUsuario.php';
                        });
            }
            
            function Error() {
                swal({
                    title: "ERROR",
                    text: "Datos faltantes, incorrectos y/o ya existen en el sistema. Intentelo nuevamente",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../RNuevoUsuario.php';
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
    
    $rut = isset($_POST["txt_rut"]) ? $_POST["txt_rut"] : null;
    $nombre = isset($_POST["txt_nombre"]) ? $_POST["txt_nombre"] : null;
    $apellido = isset($_POST["txt_apellido"]) ? $_POST["txt_apellido"] : null;
    $email = isset($_POST["txt_correo"]) ? $_POST["txt_correo"] : null;
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : null;
    $pass = isset($_POST["txt_pass"]) ? $_POST["txt_pass"] : null;
    $t_user = isset($_POST["cbo_tUser"]) ? $_POST["cbo_tUser"] : null;
    $a_user = isset($_POST["cbo_aUser"]) ? $_POST["cbo_aUser"] : null;
    $cargo = isset($_POST["cbo_cUser"]) ? $_POST["cbo_cUser"] : null;
    
    
    //echo $rut.' '.$nombre.' '.$apellido.' '.$email.' '.$pass.' '.$t_user.' '.$a_user.' '.$cargo;
    if($rut && $nombre && $apellido && $email && $pass && $t_user && $a_user && $cargo){
       $data->addUser($rut, $nombre, $apellido, $email, $passwd, $telefono, $t_user, $a_user, $cargo);
       echo '<script>Success()</script>';
    }else{
       echo '<script>Error()</script>';
    }
?>

