<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Registrando/Actualizando Evento</title>
        <link rel="stylesheet" href="../Bootstrap/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function Success() {
                swal({
                    title: "Registro Exitoso",
                    text: "Evento registrado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/Calendario.php';
                        });
            }

            function SuccessDir() {
                swal({
                    title: "Registro Exitoso",
                    text: "Evento registrado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Direccion/DirCalendario.php';
                        });
            }

            function SuccessUp() {
                swal({
                    title: "Actualización Exitosa",
                    text: "Evento actualizado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/Calendario.php';
                        });
            }

            function SuccessUpSec() {
                swal({
                    title: "Actualización Exitosa",
                    text: "Evento actualizado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Calendario/CalendarioSecretaria.php';
                        });
            }

            function SuccessUpDir() {
                swal({
                    title: "Actualización Exitosa",
                    text: "Evento actualizado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Direccion/DirCalendario.php';
                        });
            }

            function SuccessUpSec() {
                swal({
                    title: "Actualización Exitosa",
                    text: "Evento actualizado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Secretaria/CalendarioSecretaria.php';
                        });
            }

            function SuccessDel() {
                swal({
                    title: "Eliminación Exitosa",
                    text: "Evento eliminado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/Calendario.php';
                        });
            }

            function SuccessDelDir() {
                swal({
                    title: "Eliminación Exitosa",
                    text: "Evento eliminado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Direccion/DirCalendario.php';
                        });
            }
            function SuccessDelSec() {
                swal({
                    title: "Eliminación Exitosa",
                    text: "Evento eliminado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Secretaria/CalendarioSecretaria.php';
                        });
            }

            function Error() {
                swal({
                    title: "ERROR",
                    text: "Intentelo nuevamente",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/Calendario.php';
                        });
            }

            function ErrorBene() {
                swal({
                    title: "ERROR",
                    text: "No existe un beneficiario asociado al rut indicado, favor verificar",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/Calendario.php';
                        });
            }
            
            function vacio() {
                swal({
                    title: "ERROR",
                    text: "Verifique el ingreso de todos los campos",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/Calendario.php';
                        });
            }

            function ErrorDir() {
                swal({
                    title: "ERROR",
                    text: "Intentelo nuevamente",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Direccion/DirCalendario.php';
                        });
            }

            function ErrorSec() {
                swal({
                    title: "ERROR",
                    text: "Intentelo nuevamente",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Secretaria/CalendarioSecretaria.php';
                        });
            }

            function ErrorSec() {
                swal({
                    title: "ERROR",
                    text: "Intentelo nuevamente",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Secretaria/CalendarioSecretaria.php';
                        });
            }

            function SuccessUpProfeInt() {
                swal({
                    title: "Actualización Exitosa",
                    text: "Evento actualizado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
<?php
if ($_SESSION['cargo'] == 3) {
    ?>
                                window.location.href = '../MenuProfesional.php';
    <?php
} else if ($_SESSION['cargo'] == 4) {
    ?>
                                window.location.href = '../MenuInterno.php';
    <?php
}
?>

                        });
            }

        </script>
    </body>
</html>

<?php
include_once '../DB/Model_Data.php';
$data = new Data();

$param = isset($_GET['p']) ? $_GET['p'] : null;
$ar = isset($_GET['a']) ? $_GET['a'] : null;

if ($param == 1) {
    $title = isset($_POST['txt_title1']) ? $_POST['txt_title1'] : null;
    $fecha = isset($_POST['txt_fecha1']) ? $_POST['txt_fecha1'] : null;
    $hora = isset($_POST['txt_hora1']) ? $_POST['txt_hora1'] : null;
    $rutBene = isset($_POST['txt_rut']) ? $_POST['txt_rut'] : null;
    $rutProfe = isset($_POST['cbo_profesional']) ? $_POST['cbo_profesional'] : null;
    $color = '#000000';
    $date = $fecha . " " . $hora;
    //echo '<br>' . $title . '<br>' . $fecha . '<br>' . $hora . '<br>'. $rutBene .'<br>'. $color . '<br>';
    //echo '<br>' . $date . " " . $rutProfe;
    $existeBene = $data->getExistBen($rutBene);
    //echo $existeBene;

    if ($title == '' || $fecha == '' || $hora == '' || $rutBene == '' || $rutProfe == '') {
        echo '<script>vacio();</script>';
    } else {
        if ($existeBene == 1) {
            $data->addEvento($title, $date, $color);
            //echo'existe beneficiario';
            $id1 = $data->getLimitEvent();
            foreach ($id1 as $value) {
                echo '<br>' . $value['id'];
                $id1 = $value['id'];
            }
            //echo $id1;
            $data->addConsulta($id1, $rutBene, $rutProfe);
            $eventosList = array();
            $eventoA = array();
            $eventos = $data->getAllEvent();

            foreach ($eventos as $value) {
                $value['title'] . '<br>';
                $value['start'] . '<br>';
                $value['color'] . '<br>';
                array_push($eventoA, $value);
            }
            /* print_r($eventoA);
              $popo = json_encode($eventoA);
              echo '<br>' . $popo; */
            if ($ar == 1) {
                echo '<script>Success();</script>';
            } else if ($ar == 2) {
                echo '<script>SuccessDir();</script>';
            }
        } else {
            //echo 'no existe beneficiario';
            echo '<script>ErrorBene();</script>';
        }
    }
} else if ($param == 2) {
    echo 'hola';
    $id = isset($_POST['txt_id']) ? $_POST['txt_id'] : null;
    $title = isset($_POST['txt_title']) ? $_POST['txt_title'] : null;
    $fecha = isset($_POST['txt_fecha']) ? $_POST['txt_fecha'] : null;
    $hora = isset($_POST['txt_hora']) ? $_POST['txt_hora'] : null;
    $evento = isset($_POST['cbo_evento']) ? $_POST['cbo_evento'] : null;
    $color = '#000000';

    $date = $fecha . " " . $hora;
    //echo '<br>' . $title . '<br>' . $fecha . '<br>' . $hora . '<br>' . $color . '<br>';
    //echo '<br>' . $date . '<br>' . $evento;
//$eventosList=array();
    /* $eventoA = array();
      $eventos = $data->getAllEvent();
      foreach ($eventos as $value) {
      $value['title'] . '<br>';
      $value['start'] . '<br>';
      $value['color'] . '<br>';
      array_push($eventoA, $value);
      }
      print_r($eventoA);
      $popo = json_encode($eventoA); */
//echo '<br>' . $popo;
    if ($ar == 1) {
        $data->updEvento($id, $title, $date, $color);
        echo '<script>SuccessUp();</script>';
    } else if ($ar == 2) {
        $data->updEvento($id, $title, $date, $color);
        echo '<script>SuccessUpDir();</script>';
    } else if ($_SESSION['cargo'] == '2') {
        $data->updEvento($id, $title, $date, $evento);
        $evento = isset($_POST['cbo_evento']) ? $_POST['cbo_evento'] : null;
        echo '<script>SuccessUpSec();</script>';
    }
} else if ($param == 3) {
    //echo 'edio';
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $data->delEvento($id);
    //echo '<br>' . $id;
    if ($ar == 1) {
        echo '<script>SuccessDel();</script>';
    } else if ($ar == 2) {
        echo '<script>SuccessDelDir();</script>';
    }
} else if ($param == 4) {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null;
    $evento = isset($_GET['colorEvent']) ? $_GET['colorEvent'] : null;
    $evento = '#' . $evento;
    $data->dropEvent($id, $fecha, $evento);
    //echo '<br>' . $id . '<br>' . $fecha . '<br>' . $evento;

    if ($ar == 1) {
        echo 'x';

        echo '<script>SuccessUp();</script>';
    } else if ($ar == 2) {
        //echo 'ahsdhash';
        echo '<script>SuccessUpDir();</script>';
    } else if ($_SESSION['cargo'] == 2) {
        echo '<script>SuccessUpSec();</script>';
    }
} else if ($param == 5) {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $color = '#ff0000';
    $data->updColorEvento($id, $color);
    echo '<script>SuccessUpProfeInt()</script>';
} else {

    if ($ar == 1) {
        echo '<script>Error();</script>';
    } else if ($ar == 2) {
        echo '<script>ErrorDir();</script>';
    } else if ($_SESSION['cargo'] == 2) {
        echo '<script>ErrorSec();</script>';
    }
}
?>
