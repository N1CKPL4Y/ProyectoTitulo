<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Actualizando Usuario</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function Success() {
                swal({
                    title: "Actualización Exitosa",
                    text: "Usuario actualizado exitosamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../MenuAdmin.php';
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
                            window.location.href = '../MenuAdmin.php';
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
$nombre = isset($_POST["nombreU"]) ? $_POST["nombreU"] : null;
$apellido = isset($_POST["apellidoU"]) ? $_POST["apellidoU"] : null;
$email = isset($_POST["emailU"]) ? $_POST["emailU"] : null;
$telefono = isset($_POST["telefonoU"]) ? $_POST["telefonoU"] : null;
$t_user = isset($_POST["cbo_tUser"]) ? $_POST["cbo_tUser"] : null;
$a_user = isset($_POST["cbo_aUser"]) ? $_POST["cbo_aUser"] : null;
$cargo = isset($_POST["cbo_cUser"]) ? $_POST["cbo_cUser"] : null;
$activo = isset($_POST['deshabilitar']) ? $_POST['deshabilitar'] : null;

/*var_dump($activo);
echo $activo;*/
$estado;
if (!empty($activo)){
    echo 'holi<br>';
    echo $activo;
    $estado=$activo;
}else{
    echo 'putito <br>';
    $estado=false;
}

//input escondido pass
if(empty($_POST["passU"])){
    $passwd = isset($_POST["pass"]) ? $_POST["pass"]: null;
    //echo $passwd;
}else{
    $passwd = isset($_POST["passU"]) ? $_POST["passU"] : null;
    //echo $passwd;
}

//echo '<br>';

//input escondido t_user
if($t_user == 0){
    $t_user = isset($_POST["tUser"]) ? $_POST["tUser"]: null;
    //echo $t_user;
}else{
    $t_user = isset($_POST["cbo_tUser"]) ? $_POST["cbo_tUser"] : null;
    //echo $t_user;
}

//echo '<br>';

//input escondido a_user
if($a_user == 0){
    $a_user = isset($_POST["aUser"]) ? $_POST["aUser"]: null;
    //echo $a_user;
}else{
    $a_user = isset($_POST["cbo_aUser"]) ? $_POST["cbo_aUser"]: null;
    //echo $a_user;
}

//echo '<br>';

//input escondido cargo
if($cargo == 0){
    $cargo = isset($_POST["cUser"]) ? $_POST["cUser"]: null;
    //echo $cargo;
}else{
    $cargo = isset($_POST["cbo_cUser"]) ? $_POST["cbo_cUser"]: null;
    //echo $cargo;
}




if($rut && $nombre && $apellido && $email && $passwd && $telefono && $t_user && $a_user && $cargo && $estado !== false){
    //echo $rut.' '.$nombre.' '.$apellido.' '.$email.' '.$passwd.' '.$telefono.' '.$t_user. ' '.$a_user.' '.$cargo.' '.$activo;
    echo '<script>Success()</script>';
    if ($activo==2){
        $data->updateUser($rut, $email, $passwd, $telefono, $t_user, $a_user, $cargo, 0);
    } else {
        $data->updateUser($rut, $email, $passwd, $telefono, $t_user, $a_user, $cargo, $activo);
    }
}else{
    echo '<script>Error()</script>';
}







?>

