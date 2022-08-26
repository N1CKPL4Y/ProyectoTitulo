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
$carnet = isset($_POST['file_carnet']) ? $_POST['file_carnet'] : null;


//////////////Diagnostico
$condicion = isset($_POST['cbo_condicion']) ? $_POST['cbo_condicion'] : null;
$especialista = isset($_POST['cbo_especialista']) ? $_POST['cbo_especialista'] : null;
$fecha_control = isset($_POST['txt_control']) ? $_POST['txt_control'] : null;
$control = isset($_POST['file_control']) ? $_POST['file_control'] : null;


/////////////////Tutor
$nombreTutor = isset($_POST['txt_ntutor']) ? $_POST['txt_ntutor'] : null;
$parentezco = isset($_POST['cbo_parent']) ? $_POST['cboparent'] : null;
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

if ($equalDir==1) {
    $direTutor=$direccion;
    $comuTutor=$comuna;
} elseif ($equalDir==2) {
    $direTutor = isset($_POST['txt_direTutor']) ? $_POST['txt_direTutor'] : null;
    $comuTutor = isset($_POST['txt_comuTutor']) ? $_POST['txt_comuTutor'] : null;
}

$prevision = isset($_POST['cbo_prevision']) ? $_POST['cbo_prevision'] : null;
$numeroTeleton = isset($_POST['txt_Nteleton']) ? $_POST['txt_Nteleton'] : null;

////////////////////////////Credencial
$numeroCreden = isset($_POST['txt_credencial']) ? $_POST['txt_credencial'] : null;
$origenP = isset($_POST['cbo_origenP']) ? $_POST['cbo_oprigenP'] : null;
$origenS = isset($_POST['cbo_origenS']) ? $_POST['cbo_origenS']  : null;
$porcent = isset($_POST['txt_porcent']) ? $_POST['txt_porcent'] : null;
$grado = isset($_POST['txt'])


/////////////////////////////////Insercion de datos///////////////////////////



?>
