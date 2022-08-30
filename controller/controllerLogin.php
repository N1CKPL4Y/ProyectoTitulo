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
                    text: "Gerente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../index.php';
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

            function Practicante() {
                swal({
                    title: "Bienvenido",
                    text: "Practicante",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../MenuPracticante.php';
                        });
            }

            function Error() {
                swal({
                    title: "ERROR",
                    text: "El R.U.T y/o contraseña incorrectas, intentelo de nuevo",
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
        }

        //echo '<script language="javascript">alert("Bienvenida");window.location.href="../MenuPrincipal.php"</script>';

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
                        echo '<script>Practicante();</script>';
                        break;
                    default :
                        break;
                }
                break;
            default:
                echo 'header("location: ../index.php");';
                break;
        }
    } else if (!$valid) {
        echo '<script>Error();</script>';
    }
} else {
    header("location: ../index.php");
}
?>

