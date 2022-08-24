<?php

include_once '../Model_Data.php';
session_start();

$rut = isset($_POST["txt_rut"]) ? $_POST["txt_rut"] : null;
$pass = isset($_POST["txt_pass"]) ? $_POST["txt_pass"] : null;

$data = new Data();

if ($rut && $pass) {

    $valid = $data->isUserPassValid($rut, $pass);
    if ($valid) {
        $rs = $data->getUserbyRut($rut);
        foreach ($rs as $key) {
            $_SESSION['id'] = $key['id'];
            $_SESSION['rut'] = $key['RUT'];
            $_SESSION['nombre'] = $key['nombre'];
            $_SESSION['apellido'] = $key['apellido'];
            $_SESSION['email'] = $key['email'];
            $_SESSION['passwd'] = $key['passwd'];
            $_SESSION['telefono'] = $key['telefono'];
            $_SESSION['tipo_u'] = $key['t_user'];
            $_SESSION['area_u'] = $key['a_user'];
            $_SESSION['cargo'] = $key['cargo'];
        }
        
        echo '<script language="javascript">alert("Bienvenida");window.location.href="../Home.php"</script>';
        
    } else if (!$valid) {
        echo 'ERROR';
    }
} else {
    header("location: ../index.php");
}
?>

