<?php
session_start();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
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
                            window.location.href = '../C_Administrativo/Administrativo.php';
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
                            window.location.href = '../C_Administrativo/Administrativo.php';
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
                            window.location.href = '../C_Administrativo/Administrativo.php';
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
                            window.location.href = '../C_Administrativo/Administrativo.php';
                        });
            }
            
            function Vacio() {
                swal({
                    title: "ERROR",
                    text: "Verifique el ingreso/selección de los campos",
                    type: "error",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../C_Administrativo/Administrativo.php';
                        });
            }
        </script>
    </body>
</html>
<?php
include_once '../DB/Model_Data.php';
$data = new Data();

function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

$param = isset($_GET['p']) ? $_GET['p'] : null;

if ($param == 1) {
    $title = isset($_POST['txt_title1']) ? $_POST['txt_title1'] : null;
    $start = isset($_POST['txt_fecha1']) ? $_POST['txt_fecha1'] : null;
    $detalle = isset($_POST['txt_detalles']) ? $_POST['txt_detalles'] : null;

    $tipEvent = isset($_POST['tipo']) ? $_POST['tipo'] : null;
    $color = rand_color();

    if ($title == '' || $start == '' || $tipEvent == '') {
        echo'<script>Vacio()</script>';
    } else {
        if ($tipEvent == 1) {
            $data->addEventAdminDefault($title, $start, $color, $detalle);
        } else if ($tipEvent == 2) {
            $startHour = isset($_POST['txt_hora1']) ? $_POST['txt_hora1'] : null;
            $data->addEventAdminSpecific($title, $start, $startHour, $color, $detalle);
        } else if ($tipEvent == 3) {
            $end = isset($_POST['txt_fechaend']) ? $_POST['txt_fechaend'] : null;
            $data->addEventAdminEnd($title, $start, $end, $color, $detalle);
        } else if ($tipEvent == 4) {
            $startHour = isset($_POST['txt_hora1']) ? $_POST['txt_hora1'] : null;
            $endHour = isset($_POST['txt_hora1End']) ? $_POST['txt_hora1End'] : null;
            $data->addEventAdminEndHour($title, $start, $startHour, $start, $endHour, $color, $detalle);
        }

        echo '<script>Success();</script>';
    }


    /* if ($ar == 1) {

      } else if ($ar == 2) {
      echo '<script>SuccessDir();</script>';
      } */
} else if ($param == 2) {
    $id = isset($_POST['txt_id']) ? $_POST['txt_id'] : null;
    $title = isset($_POST['txt_title']) ? $_POST['txt_title'] : null;
    $start = isset($_POST['txt_fecha']) ? $_POST['txt_fecha'] : null;
    $startHour = isset($_POST['txt_hora']) ? $_POST['txt_hora'] : null;
    $end = isset($_POST['txt_fecha2']) ? $_POST['txt_fecha2'] : null;
    $endHour = isset($_POST['txt_horaend2']) ? $_POST['txt_horaend2'] : null;
    $description = isset($_POST['txt_detalles2']) ? $_POST['txt_detalles2'] : null;
    $color = isset($_POST['txt_color2']) ? $_POST['txt_color2'] : null;

    $data->updEventAdmin($id, $title, $start, $startHour, $end, $endHour, $color, $description);
    echo '<script>SuccessUp();</script>';
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
    /* if ($ar == 1) {
      echo '<script>SuccessUp();</script>';
      } else if ($ar == 2) {
      echo '<script>SuccessUpDir();</script>';
      } else if ($_SESSION['cargo'] == '2') {
      echo '<script>SuccessUpSec();</script>';
      } */
} else if ($param == 3) {

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $data->delEventAdmin($id);
    echo '<script>SuccessDel();</script>';
    //echo '<br>' . $id;
    /* if ($ar == 1) {

      } else if ($ar == 2) {
      echo '<script>SuccessDelDir();</script>';
      } */
} else if ($param == 4) {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $title = isset($_GET['title']) ? $_GET['title'] : null;
    $start = isset($_GET['start']) ? $_GET['start'] : null;
    $startHour = isset($_GET['startHour']) ? $_GET['startHour'] : null;
    $end = isset($_GET['end']) ? $_GET['end'] : null;
    $endHour = isset($_GET['endHour']) ? $_GET['endHour'] : null;
    $color = isset($_GET['color']) ? $_GET['color'] : null;
    $description = isset($_GET['description']) ? $_GET['description'] : null;

    $color = '#' . $color;
    //$data->dropEvent($id, $fecha, $evento);
    //echo '<br>' . $id . '<br>' . $title . '<br>' . $start . '<br>' . $startHour . '<br>' . $end . '<br>' . $endHour . '<br>' . $color . '<br>' . $description;
    $data->dropEventAdmin($id, $title, $start, $startHour, $end, $endHour, $color, $description);
    echo '<script>SuccessUp();</script>';
    /* if ($ar == 1) {
      echo 'x';

      } else if ($ar == 2) {
      echo 'ahsdhash';
      echo '<script>SuccessUpDir();</script>';
      } else if ($_SESSION['cargo'] == 2) {
      echo '<script>SuccessUpSec();</script>';
      } */
} else {
    echo '<script>Error();</script>';
    /* if ($ar == 1) {

      } else if ($ar == 2) {
      echo '<script>ErrorDir();</script>';
      } else if ($_SESSION['cargo'] == 2) {
      echo '<script>ErrorSec();</script>';
      } */
}
?>