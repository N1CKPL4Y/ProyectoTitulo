<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Actualizando Usuario</title>
        <link rel="stylesheet" href="../Bootstrap/css/styleBody.css"/>
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

$rut = isset($_POST["txt_rut"]) ? $_POST["txt_rut"] : null;
$nombre = isset($_POST["nombreU"]) ? $_POST["nombreU"] : null;
$apellido = isset($_POST["apellidoU"]) ? $_POST["apellidoU"] : null;
$email = isset($_POST["emailU"]) ? $_POST["emailU"] : null;
$telefono = isset($_POST["telefonoU"]) ? $_POST["telefonoU"] : null;
$t_user = isset($_POST["cbo_tUser"]) ? $_POST["cbo_tUser"] : null;
$a_user = isset($_POST["cbo_aUser"]) ? $_POST["cbo_aUser"] : null;
$cargo = isset($_POST["cbo_cUser"]) ? $_POST["cbo_cUser"] : null;
$activo = isset($_POST['deshabilitar']) ? $_POST['deshabilitar'] : null;

/* var_dump($activo);
  echo $activo; */
$estado = isset($_POST['estado_a']) ? $_POST['estado_a'] : null;
if (!empty($activo)) {
    //echo 'holi<br>';
    //$estado=$activo;
    if ($activo == 2) {
        $activo = 0;
    } else {
        $activo = 1;
    }
    //echo $activo;
} else {
    //echo 'putito <br>';
    //$estado=false;
    $activo = 3;
    //echo $activo."<br>".$estado;
}

//echo '<br>';
//input escondido t_user
if ($t_user == 0) {
    $t_user = isset($_POST["tUser"]) ? $_POST["tUser"] : null;
    //echo $t_user;
} else {
    $t_user = isset($_POST["cbo_tUser"]) ? $_POST["cbo_tUser"] : null;
    //echo $t_user;
}

//echo '<br>';
//input escondido a_user
if ($a_user == 0) {
    $a_user = isset($_POST["aUser"]) ? $_POST["aUser"] : null;
    //echo $a_user;
} else {
    $a_user = isset($_POST["cbo_aUser"]) ? $_POST["cbo_aUser"] : null;
    //echo $a_user;
}

//echo '<br>';
//input escondido cargo
if ($cargo == 0) {
    $cargo = isset($_POST["cUser"]) ? $_POST["cUser"] : null;
    //echo $cargo;
} else {
    $cargo = isset($_POST["cbo_cUser"]) ? $_POST["cbo_cUser"] : null;
    //echo $cargo;
}




if ($rut && $nombre && $apellido && $email && $telefono && $t_user && $a_user && $cargo) {
    //echo $rut.' '.$nombre.' '.$apellido.' '.$email.' '.$passwd.' '.$telefono.' '.$t_user. ' '.$a_user.' '.$cargo.' '.$activo;

    if ($activo == 3) {
        if (empty($_POST["passU"])) {
            $passwd = isset($_POST["pass"]) ? $_POST["pass"] : null;
            $data->updatePUser($rut, $email, $passwd, $telefono, $t_user, $a_user, $cargo, $estado);
            //echo $passwd;
        } else {
            $passwd = isset($_POST["passU"]) ? $_POST["passU"] : null;
            $data->updateUser($rut, $email, $passwd, $telefono, $t_user, $a_user, $cargo, $estado);
            //echo $passwd;
        }
        //$data->updateUser($rut, $email, $passwd, $telefono, $t_user, $a_user, $cargo, $estado);
    } else {
        if (empty($_POST["passU"])) {
            $passwd = isset($_POST["pass"]) ? $_POST["pass"] : null;
            $data->updatePUser($rut, $email, $passwd, $telefono, $t_user, $a_user, $cargo, $activo);
            //echo $passwd;
        } else {
            $passwd = isset($_POST["passU"]) ? $_POST["passU"] : null;
            $data->updateUser($rut, $email, $passwd, $telefono, $t_user, $a_user, $cargo, $activo);
            //echo $passwd;
        }
        //$data->updateUser($rut, $email, $passwd, $telefono, $t_user, $a_user, $cargo, $activo);
    }
    echo '<script>Success()</script>';
} else {
    echo '<script>Error()</script>';
}
?>

