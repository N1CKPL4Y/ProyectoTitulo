<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <title>Iniciando Sesion</title>
        <link rel="stylesheet" href="../Bootstrap/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function Admin() {
                swal({
                    title: "Bienvenido",
                    text: "Administrador",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../MenuAdmin.php';
                        });
            }

            function Gerencia() {
                swal({
                    title: "Bienvenido",
                    text: "Dirección",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../menuDireccion.php';
                        });
            }

            function Secretaria() {
                swal({
                    title: "Bienvenida",
                    text: "Secretaria",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../MenuSecretaria.php';
                        });
            }

            function Profesional() {
                swal({
                    title: "Bienvenido",
                    text: "Profesional",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../MenuProfesional.php';
                        });
            }

            function Interno() {
                swal({
                    title: "Bienvenido",
                    text: "Interno",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../MenuInterno.php';
                        });
            }

            function Error() {
                swal({
                    title: "ERROR",
                    text: " Usuario desactivado o el R.U.T y/o contraseña incorrectas, intentelo de nuevo",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../index.php';
                        });
            }

            function ErrorLog() {
                swal({
                    title: "ERROR",
                    text: "Este usuario ya ha iniciado sesión en el sistema",
                    type: "error",
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

$rut = isset($_POST["txt_rut"]) ? $_POST["txt_rut"] : null;
$pass = isset($_POST["txt_pass"]) ? $_POST["txt_pass"] : null;
//echo '<br>' . $rut . '<br>' . $pass;
$data = new Data();


if ($rut && $pass) {

    $valid = $data->isUserPassValid($rut, $pass);

    if ($valid) {
        $rs = $data->getUserbyRut($rut);
        foreach ($rs as $key) {
            $_SESSION['id'] = $key['ID'];
            $_SESSION['rut'] = $key['RUT'];
            $_SESSION['nombre'] = $key['nombre'];
            $_SESSION['apellido'] = $key['apellido'];
            $_SESSION['email'] = $key['email'];
            $_SESSION['passwd'] = $key['passwd'];
            $_SESSION['telefono'] = $key['telefono'];
            $_SESSION['tipo_u'] = $key['t_user'];
            $_SESSION['area_u'] = $key['a_user'];
            $_SESSION['cargo'] = $key['cargo'];
            $_SESSION['activo'] = $key['activo'];
            $_SESSION['logged'] = $key['logged'];
        }
        //echo '<br>' . $_SESSION['activo'];
        //echo '<script language="javascript">alert("Bienvenida");window.location.href="../MenuPrincipal.php"</script>';
        if ($_SESSION['logged'] == 1) {
            echo '<script>ErrorLog();</script>';
        } else {
            $rut = $_SESSION['rut'];
            $log = 1;
            //echo $rut.' // '.$log;
            $data->updateLog($rut, $log);
            $_SESSION['logged'] = $log;
            switch ($_SESSION['activo']) {
                case 1:
                    switch ($_SESSION['tipo_u']) {
                        case 1:
                            echo '<script>Admin();</script>';
                            break;
                        case 2:
                            switch ($_SESSION['cargo']) {
                                case 1:
                                    echo '<script>Gerencia();</script>';
                                    break;
                                case 2:
                                    echo '<script>Secretaria();</script>';
                                    break;
                                case 3:
                                    echo '<script>Profesional();</script>';
                                    break;
                                case 4:
                                    echo '<script>Interno();</script>';
                                    break;
                                default :
                                    break;
                            }
                            break;
                        default:
                            echo 'header("location: ../index.php");';
                            break;
                    }
                    break;
                case 0:
                    echo '<script>Error();</script>';
                    break;
                default:
                    echo 'header("location: ../index.php");';
            }
        }
    } else if (!$valid) {
        echo '<script>Error();</script>';
    }
} else {
    header("location: ../index.php");
}
?>

