<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Registrando Nuevo Beneficiario</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
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

            function Error() {
                swal({
                    title: "ERROR",
                    text: "Intentelo nuevamente",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../MenuSecretaria.php';
                        });
            }
            function ErrorExistencia() {
                swal({
                    title: "ERROR",
                    text: "Datos faltantes, incorrectos y/o ya existen en el sistema. Intentelo nuevamente",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../MenuSecretaria.php';
                        });
            }
        </script>
    </body>
</html>

<?php
include_once '../DB/Model_Data.php';
$data = new Data();

$param = isset($_GET['p']) ? $_GET['p'] : null;

if ($param == 1) {
    $title = isset($_POST['txt_title']) ? $_POST['txt_title'] : null;
    $fecha = isset($_POST['txt_fecha']) ? $_POST['txt_fecha'] : null;
    $color = isset($_POST['txt_color']) ? $_POST['txt_color'] : null;

    echo '<br>' . $title . '<br>' . $fecha . '<br>' . $color . '<br>';

    $data->addEvento($title, $fecha, $color);
//$eventosList=array();
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
      echo '<br>' . $popo;*/
      echo '<script>Success();</script>'; 
} else if ($param == 2) {
    echo 'hola';
    $id = isset($_POST['txt_id']) ? $_POST['txt_id'] : null;
    $title = isset($_POST['txt_title']) ? $_POST['txt_title'] : null;
    $fecha = isset($_POST['txt_fecha']) ? $_POST['txt_fecha'] : null;
    $color = isset($_POST['txt_color']) ? $_POST['txt_color'] : null;

    echo '<br>' . $id . '<br>' . $title . '<br>' . $fecha . '<br>' . $color . '<br>';

    $data->updEvento($id, $title, $fecha, $color);
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
    echo '<script>SuccessUp();</script>';
} else if ($param == 3) {
    echo 'edio';
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $data->delEvento($id);
    echo '<br>' . $id;
    echo '<script>SuccessDel();</script>';
} else if ($param==4){
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null;
    echo '<br>'.$id.'<br>'.$fecha;
    $data->dropEvent($id, $fecha);
    echo '<script>SuccessUp();</script>';
}else {
    echo '<script>Error();</script>';
}
?>
