<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Registrando/Actualizando Evento</title>
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
    $rutBene= isset($_POST['txt_beneFI']) ? $_POST['txt_beneFI'] : null;
    $rutProfe= isset($_POST['cbo_profesional']) ?$_POST['cbo_profesional'] : null;
    $color = '#000000';
    $date=$fecha." ".$hora;
    echo '<br>' . $title . '<br>' . $fecha .'<br>'.$hora.'<br>' . $color . '<br>';
    echo '<br>'.$date." ".$rutProfe;

    $data->addEvento($title, $date, $color);
    
    $id1 = $data->getLimitEvent();
    foreach ($id1 as $value) {
        echo '<br>'.$value['id'];
        $id1=$value['id'];
    }
    echo $id1;
    $data->addConsulta($id1, $rutBene, $rutProfe);
    $eventosList=array();
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
} else if ($param == 2) {
    echo 'hola';
    $id = isset($_POST['txt_id']) ? $_POST['txt_id'] : null;
    $title = isset($_POST['txt_title']) ? $_POST['txt_title'] : null;
    $fecha = isset($_POST['txt_fecha']) ? $_POST['txt_fecha'] : null;
    $hora = isset($_POST['txt_hora']) ? $_POST['txt_hora'] : null;
    $color = '#000000';

    $date=$fecha." ".$hora;
    echo '<br>' . $title . '<br>' . $fecha .'<br>'.$hora.'<br>' . $color . '<br>';
    echo '<br>'.$date;

    $data->updEvento($id, $title, $date, $color);
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
        echo '<script>SuccessUp();</script>';
    } else if ($ar == 2) {
        echo '<script>SuccessUpDir();</script>';
    }
} else if ($param == 3) {
    echo 'edio';
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $data->delEvento($id);
    echo '<br>' . $id;
    if ($ar==1){
       echo '<script>SuccessDel();</script>'; 
   }else if($ar==2){
       echo '<script>SuccessDelDir();</script>'; 
   }
} else if ($param == 4) {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null;
    echo '<br>' . $id . '<br>' . $fecha;
    $data->dropEvent($id, $fecha);
    
    if ($ar == 1) {
        echo '<script>SuccessUp();</script>';
    } else if ($ar == 2) {
        echo '<script>SuccessUpDir();</script>';
    }
    
} else {
    
    if ($ar == 1) {
        echo '<script>Error();</script>';
    } else if ($ar == 2) {
        echo '<script>ErrorDir();</script>';
    }
}
?>
