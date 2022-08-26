<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

    </body>
</html>
<?php
include_once '../Model_Data.php';
$data = new Data();

$conect = $data->getConnection();
session_start();

/////////////Datos Generales
$motivo = isset($_POST['txt_motivo']) ? $_POST['txt_motivo'] : null;
$derivacion = isset($_POST['txt_derivacion']) ? $_POST['txt_derivacion'] : null;
$tipo_atencion = isset($_POST['t_atencion']) ? $_POST['t_atencion'] : null;

////////////Datos beneficiario
$nombre = isset($_POST['txt_nombre']) ? $_POST['txt_nombre'] : null;
$apellido = isset($_POST['txt_apellido']) ? $_POST['txt_apellido'] : null;
$rut = isset($_POST['txt_rut']) ? $_POST['txt_rut'] : null;
$fecha = isset($_POST['txt_Fnac']) ? $_POST['txt_Fnac'] : null;
$genero = isset($_POST['cbo_genero']) ? $_POST['cbo_genero'] : null;
$direccion = isset($_POST['txt_direccion']) ? $_POST['txt_direccion'] : null;
$comuna = isset($_POST['txt_comuna']) ? $_POST['txt_comuna'] : null;
//$carnet = isset($_POST['file_carnet']) ? $_POST['file_carnet'] : null;

if (!isset($_FILES["file_carnet"]) || $_FILES["file_carnet"]["error"] > 0) {
    echo "Ha ocurrido un error.";
} else {
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['file_carnet']['type'], $permitidos) && $_FILES['file_carnet']['size'] <= $limite_kb * 1024) {
        // Archivo temporal
        $imagen_temporal = $_FILES['file_carnet']['tmp_name'];
        // Tipo de archivo
        $tipo = $_FILES['file_carnet']['type'];
        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $dataFile = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        // $data=file_get_contents($imagen_temporal);
        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        /* @var $data type */
        $dataFile = mysqli_escape_string($conect, $dataFile);
        // Insertamos en la base de datos.
        $data->addBenefi($rut, $nombre, $apellido, $fecha, $genero, $direccion, $comuna, $dataFile, '0', '0', '0', '0', '0', '0', '0', '0');
        //$resultado = mysqli_query($conect, "INSERT INTO 'beneficiario' ('id', 'nombre', 'capacidad', 'direccion', 'valor_hora', 'id_tipo', 'estado', 'imagen', 'activo') VALUES ('$nuevoId', '$nomLocal', '$capaLocal', '$direLocal', '$valorLocal', '$selected', '1','$data','1')");
        if ($data) {
            echo '<script language="javascript">alert("Excelente");window.location.href="Home.php"</script>';
        } else {
            echo "Ocurrió algun error al copiar el archivo.";
        }
    } else {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}


//////////////Diagnostico
$condicion = isset($_POST['cbo_condicion']) ? $_POST['cbo_condicion'] : null;
$especialista = isset($_POST['cbo_especialista']) ? $_POST['cbo_especialista'] : null;
$fecha_control = isset($_POST['txt_control']) ? $_POST['txt_control'] : null;
$control = isset($_POST['file_control']) ? $_POST['file_control'] : null;

/////////////////Tutor
$nombreTutor = isset($_POST['txt_ntutor']) ? $_POST['txt_ntutor'] : null;
$parentezco = isset($_POST['cbo_parent']) ? $_POST['cbo_parent'] : null;
$rutTutor = isset($_POST['txt_rtutor']) ? $_POST['txt_rtutor'] : null;
$carnetTutor = isset($_POST['file_tutor']) ? $_POST['file_tutor'] : null;
$fecha_tutor = isset($_POST['txt_nacTutor']) ? $_POST['txt_nacTutor'] : null;
$nivelE = isset($_POST['cbo_nivel']) ? $_POST['cbo_nivel'] : null;
$ocupacion = isset($_POST['txt_ocupacion']) ? $_POST['txt_ocupacion'] : null;
$telefono = isset($_POST['txt_telefono']) ? $_POST['txt_telefono'] : null;
$correoTutor = isset($_POST['txt_correo']) ? $_POST['txt_correo'] : null;
$equalDir = isset($_POST['direccTutor']) ? $_POST['direccTutor'] : null;
$direTutor;
$comuTutor;

if ($equalDir == 1) {
    $direTutor = $direccion;
    $comuTutor = $comuna;
} elseif ($equalDir == 2) {
    $direTutor = isset($_POST['txt_direTutor']) ? $_POST['txt_direTutor'] : null;
    $comuTutor = isset($_POST['txt_comuTutor']) ? $_POST['txt_comuTutor'] : null;
}

$prevision = isset($_POST['cbo_prevision']) ? $_POST['cbo_prevision'] : null;
$numeroTeleton = isset($_POST['txt_Nteleton']) ? $_POST['txt_Nteleton'] : null;

////////////////////////////Credencial
$numeroCreden = isset($_POST['txt_credencial']) ? $_POST['txt_credencial'] : null;
$origenP = isset($_POST['cbo_origenP']) ? $_POST['cbo_origenP'] : null;
$origenS = isset($_POST['cbo_origenS']) ? $_POST['cbo_origenS'] : null;
$porcent = isset($_POST['txt_porcent']) ? $_POST['txt_porcent'] : null;
$grado = isset($_POST['cbo_grado']) ? $_POST['cbo_grado'] : null;
$movilidad = isset($_POST['cbo_movilidad']) ? $_POST['cbo_movilidad'] : null;
$credenFileFront = isset($_POST['file_credenFront']) ? $_POST['file_credenFront'] : null;
$credenFileBack = isset($_POST['file_credenBack']) ? $_POST['file_credenBack'] : null;

/////////////////////////Pensiones
$pension = isset($_POST['pension']) ? $_POST['pension'] : null;
$penBase = isset($_POST['pension1']) ? $_POST['pension1'] : null;
$subMental = isset($_POST['pension2']) ? $_POST['pension2'] : null;
$penSobre = isset($_POST['pension3']) ? $_POST['pension3'] : null;
$asgDuplo = isset($_POST['pension4']) ? $_POST['pension4'] : null;
$otraPen = isset($_POST['txt_otroP']) ? $_POST['txt_otroP'] : null;

/////////////////Beneficios Sociales
$chSolid = isset($_POST['csolidario']) ? $_POST['csolidario'] : null;
$hogar = isset($_POST['hogares']) ? $_POST['hogares'] : null;
$porcentHogar = isset($_POST['txt_porcentHogar']) ? $_POST['txt_porcentHogar'] : null;
$hogarFile = isset($_POST['file_Hogar']) ? $_POST['file_Hogar'] : null;

/////////////////////////////////Insercion de datos///////////////////////////

echo $nombre . " " . $apellido . " " . $rut . " " . $fecha . " " . $genero . " " . $motivo . " " . $derivacion . " " . $tipo_atencion . " " . $direccion . " " . $comuna . " " . $carnet;
echo '<br>' . $condicion . " " . $especialista . " " . $fecha_control . " " . $control . "<br>";
echo $nombreTutor . " " . $parentezco . " " . $rut . " " . $carnetTutor . " " . $fecha_tutor . " " . $nivelE . " " . $ocupacion . " " . $telefono . " " . $correoTutor . " " . $direTutor . " " . $comuTutor . " " . $prevision . " " . $numeroTeleton;
echo '<br>' . $numeroCreden . " " . $origenP . " " . $origenS . " " . $porcent . " " . $grado . " " . $movilidad . " " . $credenFileFront . " " . $credenFileBack . "<br>";
echo $pension . " " . $penBase . " " . $subMental . " " . $penSobre . " " . $asgDuplo . " " . $otraPen . "<br>";
echo $chSolid . " " . $hogar . " " . $porcentHogar . " " . $hogarFile;
?>
