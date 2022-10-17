<?php
session_start();
include_once '../DB/Model_Data.php';
$data = new Data();

$rut_bene = isset($_POST['txt_rutB']) ? $_POST['txt_rutB'] : null;
$evento = intval(isset($_POST['txt_evento']) ? $_POST['txt_evento'] : null);
$color = '#0387EF';
//echo '<br>' . $evento . '<br>';
//var_dump($evento);
$rut_profe = $_SESSION['rut'];
$antecedentes = isset($_POST['txt_ant']) ? $_POST['txt_ant'] : null;
$objetivos = isset($_POST['txt_obs']) ? $_POST['txt_obs'] : null;
$actividad = isset($_POST['txt_act']) ? $_POST['txt_act'] : null;
$acuerdo = isset($_POST['txt_acu']) ? $_POST['txt_acu'] : null;
$observaciones = isset($_POST['txt_obs']) ? $_POST['txt_obs'] : null;
$programa = isset($_POST['txt_program']) ? $_POST['txt_program'] : null;
$t_atencion = isset($_POST['t_atencion']) ? $_POST['t_atencion'] : null;

$user = $data->getUserbyRut($rut_profe);
$areaId;
foreach($user as $value){
    $areaId = $value['a_user'];
}

echo $areaId;

/*$consultas = $data->getConsEvent($rut_bene, $rut_profe);
$programas = $data->getCountPrograma($rut_bene, $rut_profe);
$cuentaConsu;
$cuentaProgram;
$programa = $data->getPrograma($rut_bene, $rut_profe);*/
//var_dump($programa);

/* foreach ($programa as $value) {
  echo '<br>' . $value['programa'];
  } */

/* if  ($programa == 0) {
  $programa += 1;
  echo 'programa ' . $programa;
  } else {

  echo 'programa ' . $programa;
  } */


/*if (mysqli_num_rows($programa) > 0) {
    foreach ($programa as $value) {
        echo '<br>programa existente (Ultimo)' . $value['programa'] . '<br>';
        $programa = $value['programa'];
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
        echo '<br>se ha actualizado el programa: ' . $programa += 1;
        $data->addBitacora($rut_bene, $rut_profe, $programa, $antecedentes, $objetivos, $actividad, $acuerdo, $observaciones);
    } else {
        echo '<br>el programa es: ' . $programa;
        $data->addBitacora($rut_bene, $rut_profe, $programa, $antecedentes, $objetivos, $actividad, $acuerdo, $observaciones);
    }
} else {
    $programa = 1;
    echo 'No existen programas registrado, se definira como: ' . $programa;

    foreach ($consultas as $value) {
        echo '<br> Consultas del mes' . $value['Consultas'];
        $cuentaConsu = $value['Consultas'];
    }

    foreach ($programas as $value) {
        echo '<br>programa del mes' . $value['Programas'] . '<br>';
        $cuentaProgram = $value['Programas'];
    }
    if ($cuentaConsu == $cuentaProgram) {
        echo '<br>se ha actualizado el programa: ' . $programa += 1;
        $data->addBitacora($rut_bene, $rut_profe, $programa, $antecedentes, $objetivos, $actividad, $acuerdo, $observaciones);
    } else {
        echo '<br>el programa es: ' . $programa;
        $data->addBitacora($rut_bene, $rut_profe, $programa, $antecedentes, $objetivos, $actividad, $acuerdo, $observaciones);
    }
}*/
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
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>

    </body>
    <script>
        var cargo =<?php echo $_SESSION['cargo']; ?>;
        function registrado() {
            swal({
                title: "Registrada",
                text: "Bitacora registrada Exitosamente",
                type: "success",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Aceptar"
            },
                    function () {
                        if (cargo == 3) {
                            window.location.href = '../MenuProfesional.php';
                        } else if (cargo == 4) {
                            window.location.href = '../MenuInterno.php';
                        }
                    });
        }
    </script>
</html>
<?php
echo $t_atencion;
if ($evento && $rut_bene) {
    if ($_SESSION['cargo'] == 3) {
        echo '<script>registrado();</script>';
        $data->addBitacora($rut_bene, $rut_profe, $areaId, $programa, $t_atencion, $antecedentes, $objetivos, $actividad, $acuerdo, $observaciones);
        $data->updColorEvento($evento, $color);
    } else if ($_SESSION['cargo'] == 4) {
        echo '<script>registrado();</script>';
        $data->addBitacora($rut_bene, $rut_profe, $areaId, $programa, 1, $antecedentes, $objetivos, $actividad, $acuerdo, $observaciones);
        $data->updColorEvento($evento, $color);
    }
}
?>