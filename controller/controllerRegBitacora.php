<?php
include_once '../DB/Model_Data.php';
$data = new Data();
session_start();
$rut_bene = isset($_POST['txt_rutB']) ? $_POST['txt_rutB'] : null;
$evento = intval(isset($_POST['txt_evento']) ? $_POST['txt_evento'] : null);
$color = '#03EF1C';
//echo '<br>' . $evento . '<br>';
//var_dump($evento);
$rut_profe = $_SESSION['rut'];
$antecedentes = isset($_POST['txt_ant']) ? $_POST['txt_ant'] : null;
$objetivos = isset($_POST['txt_obs']) ? $_POST['txt_obs'] : null;
$actividad = isset($_POST['txt_act']) ? $_POST['txt_act'] : null;
$acuerdo = isset($_POST['txt_acu']) ? $_POST['txt_acu'] : null;
$observaciones = isset($_POST['txt_obs']) ? $_POST['txt_obs'] : null;

$consultas = $data->getConsEvent($rut_bene, $rut_profe);
$programas = $data->getCountPrograma($rut_bene, $rut_profe);
$cuentaConsu;
$cuentaProgram;
$programa = $data->getPrograma($rut_bene, $rut_profe);
$countP;
//var_dump($programa);
if (mysqli_num_rows($programa) > 0) {
    foreach ($programa as $value) {
        echo '<br>programa existente' . $value['programa'] . '<br>';
        $countP = $value['programa'];
    }
} else {
    $countP = 0;
}
/* foreach ($programa as $value) {
  echo '<br>' . $value['programa'];
  } */

if ($countP == 0) {
    $countP += 1;
    echo 'programa ' . $countP;
} else {
    $countP = $countP;
    echo 'programa ' . $countP;
}
foreach ($consultas as $value) {
    echo '<br> Consultas del mes' . $value['Consultas'];
    $cuentaConsu = $value['Consultas'];
}

foreach ($programas as $value) {
    echo '<br>programa del mes' . $value['Programas'] . '<br>';
    $cuentaProgram = $value['Programas'];
}
if ($cuentaConsu == $cuentaProgram) {
    echo 'se ha actualizado el programa: ' . $countP += 1;
} else {
    echo 'el programa es: ' . $countP;
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <title>Registrando</title>
        <!--<link rel="stylesheet" href="../Materialize/css/styleBody.css"/>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>

    </body>
    <script>
        function registrado() {
            swal({
                title: "Bienvenido",
                text: "Administrador",
                type: "success",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Aceptar"
            },
                    function () {
                        window.location.href = '../MenuInterno.php';
                    });
        }
    </script>
</html>
<?php
if ($evento && $rut_bene) {
    echo '<script>registrado();</script>';
    $data->addBitacora($rut_bene, $rut_profe, $countP, $antecedentes, $objetivos, $actividad, $acuerdo, $observaciones);
    $data->updColorEvento($evento, $color);
    
}
?>