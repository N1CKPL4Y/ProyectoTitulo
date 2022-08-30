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
        //echo 'aaa '.$data->addBenefi($rut, $nombre, $apellido, $fecha, $genero, $direccion, $comuna, $dataFile, 1, 0, 0, 0, 0, 0, 0, 0);
        
        //$resultado = mysqli_query($conect, "INSERT INTO `beneficiario` (`ID`, `RUT`, `nombre`, `apellido`, `fecha_nac`, `genero`, `direccion`, `comuna`, `c_identidad`, `teleton`, `pension`, `pension_basicaS`, `subsidioD_mental`, `p_sobrevivencia`, `a_duplo`, `chile_solidario`, `r_s_hogares`) VALUES (NULL, '$rut', '$nombre', '$apellido', '$fecha', '$genero', '$direccion', '$comuna', '$dataFile', '0', '0', '0', '0', '0', '0', '0', '0');");
        /*if ($resultado) {
            echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
        } else {
            echo "Ocurrió algun error al copiar el archivo.";
        }*/
    } else {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

//////////////Diagnostico
$condicion = isset($_POST['cbo_condicion']) ? $_POST['cbo_condicion'] : null;
$especialista = isset($_POST['cbo_especialista']) ? $_POST['cbo_especialista'] : null;
$fecha_control = isset($_POST['txt_control']) ? $_POST['txt_control'] : null;
$data_control;


if (!isset($_FILES["file_control"]) || $_FILES["file_control"]["error"] > 0) {
    echo "Ha ocurrido un error.";
} else {
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['file_control']['type'], $permitidos) && $_FILES['file_control']['size'] <= $limite_kb * 1024) {
        // Archivo temporal
        $imagen_temporal = $_FILES['file_control']['tmp_name'];
        // Tipo de archivo
        $tipo = $_FILES['file_control']['type'];
        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $data_control = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        // $data=file_get_contents($imagen_temporal);
        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        /* @var $data type */
        
        $data_control = mysqli_escape_string($conect, $data_control);
        // Insertamos en la base de datos.
        //echo 'aaa '.$data->addBenefi($rut, $nombre, $apellido, $fecha, $genero, $direccion, $comuna, $dataFile, 1, 0, 0, 0, 0, 0, 0, 0);
        
        //$resultado = mysqli_query($conect, "INSERT INTO `beneficiario` (`ID`, `RUT`, `nombre`, `apellido`, `fecha_nac`, `genero`, `direccion`, `comuna`, `c_identidad`, `teleton`, `pension`, `pension_basicaS`, `subsidioD_mental`, `p_sobrevivencia`, `a_duplo`, `chile_solidario`, `r_s_hogares`) VALUES (NULL, '$rut', '$nombre', '$apellido', '$fecha', '$genero', '$direccion', '$comuna', '$dataFile', '0', '0', '0', '0', '0', '0', '0', '0');");
        /*if ($resultado) {
            echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
        } else {
            echo "Ocurrió algun error al copiar el archivo.";
        }*/
    } else {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

/////////////////Tutor
$nombreTutor = isset($_POST['txt_ntutor']) ? $_POST['txt_ntutor'] : null;
$parentezco = isset($_POST['cbo_parent']) ? $_POST['cbo_parent'] : null;
$rutTutor = isset($_POST['txt_rtutor']) ? $_POST['txt_rtutor'] : null;
$carnetTutor;
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
} elseif ($equalDir == 0) {
    $direTutor = isset($_POST['txt_direTutor']) ? $_POST['txt_direTutor'] : null;
    $comuTutor = isset($_POST['txt_comuTutor']) ? $_POST['txt_comuTutor'] : null;
}

if (!isset($_FILES["file_tutor"]) || $_FILES["file_tutor"]["error"] > 0) {
    echo "Ha ocurrido un error.";
} else {
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['file_tutor']['type'], $permitidos) && $_FILES['file_tutor']['size'] <= $limite_kb * 1024) {
        // Archivo temporal
        $imagen_temporal = $_FILES['file_control']['tmp_name'];
        // Tipo de archivo
        $tipo = $_FILES['file_tutor']['type'];
        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $carnetTutor = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        // $data=file_get_contents($imagen_temporal);
        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        /* @var $data type */
        
        $carnetTutor = mysqli_escape_string($conect, $carnetTutor);
        // Insertamos en la base de datos.
        //echo 'aaa '.$data->addBenefi($rut, $nombre, $apellido, $fecha, $genero, $direccion, $comuna, $dataFile, 1, 0, 0, 0, 0, 0, 0, 0);
        
        //$resultado = mysqli_query($conect, "INSERT INTO `beneficiario` (`ID`, `RUT`, `nombre`, `apellido`, `fecha_nac`, `genero`, `direccion`, `comuna`, `c_identidad`, `teleton`, `pension`, `pension_basicaS`, `subsidioD_mental`, `p_sobrevivencia`, `a_duplo`, `chile_solidario`, `r_s_hogares`) VALUES (NULL, '$rut', '$nombre', '$apellido', '$fecha', '$genero', '$direccion', '$comuna', '$dataFile', '0', '0', '0', '0', '0', '0', '0', '0');");
        /*if ($resultado) {
            echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
        } else {
            echo "Ocurrió algun error al copiar el archivo.";
        }*/
    } else {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

$prevision = isset($_POST['cbo_prevision']) ? $_POST['cbo_prevision'] : null;
$teleton = isset($_POST['rd_teleton']) ? $_POST['rd_teleton'] : null;
$numeroTeleton = isset($_POST['txt_Nteleton']) ? $_POST['txt_Nteleton'] : null;

////////////////////////////Credencial
$numeroCreden = isset($_POST['txt_credencial']) ? $_POST['txt_credencial'] : null;
$origenP = isset($_POST['cbo_origenP']) ? $_POST['cbo_origenP'] : null;
$origenS = isset($_POST['cbo_origenS']) ? $_POST['cbo_origenS'] : null;
$porcent = isset($_POST['txt_porcentaje_d']) ? $_POST['txt_porcentaje_d'] : null;
$grado = isset($_POST['cbo_grado']) ? $_POST['cbo_grado'] : null;
$movilidad = isset($_POST['cbo_movilidad']) ? $_POST['cbo_movilidad'] : null;
$credenFileFront;
$credenFileBack;


if (!isset($_FILES["file_credenFront"]) || $_FILES["file_credenFront"]["error"] > 0) {
    echo "Ha ocurrido un error.";
} else {
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['file_credenFront']['type'], $permitidos) && $_FILES['file_credenFront']['size'] <= $limite_kb * 1024) {
        // Archivo temporal
        $imagen_temporal = $_FILES['file_credenFront']['tmp_name'];
        // Tipo de archivo
        $tipo = $_FILES['file_credenFront']['type'];
        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $credenFileFront = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        // $data=file_get_contents($imagen_temporal);
        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        /* @var $data type */
        
        $credenFileFront = mysqli_escape_string($conect, $credenFileFront);
        // Insertamos en la base de datos.
        //echo 'aaa '.$data->addBenefi($rut, $nombre, $apellido, $fecha, $genero, $direccion, $comuna, $dataFile, 1, 0, 0, 0, 0, 0, 0, 0);
        
        //$resultado = mysqli_query($conect, "INSERT INTO `beneficiario` (`ID`, `RUT`, `nombre`, `apellido`, `fecha_nac`, `genero`, `direccion`, `comuna`, `c_identidad`, `teleton`, `pension`, `pension_basicaS`, `subsidioD_mental`, `p_sobrevivencia`, `a_duplo`, `chile_solidario`, `r_s_hogares`) VALUES (NULL, '$rut', '$nombre', '$apellido', '$fecha', '$genero', '$direccion', '$comuna', '$dataFile', '0', '0', '0', '0', '0', '0', '0', '0');");
        /*if ($resultado) {
            echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
        } else {
            echo "Ocurrió algun error al copiar el archivo.";
        }*/
    } else {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

if (!isset($_FILES["file_credenBack"]) || $_FILES["file_credenBack"]["error"] > 0) {
    echo "Ha ocurrido un error.";
} else {
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['file_credenBack']['type'], $permitidos) && $_FILES['file_credenBack']['size'] <= $limite_kb * 1024) {
        // Archivo temporal
        $imagen_temporal = $_FILES['file_credenBack']['tmp_name'];
        // Tipo de archivo
        $tipo = $_FILES['file_credenBack']['type'];
        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $credenFileBack = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        // $data=file_get_contents($imagen_temporal);
        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        /* @var $data type */
        
        $credenFileBack = mysqli_escape_string($conect, $credenFileBack);
        // Insertamos en la base de datos.
        //echo 'aaa '.$data->addBenefi($rut, $nombre, $apellido, $fecha, $genero, $direccion, $comuna, $dataFile, 1, 0, 0, 0, 0, 0, 0, 0);
        
        //$resultado = mysqli_query($conect, "INSERT INTO `beneficiario` (`ID`, `RUT`, `nombre`, `apellido`, `fecha_nac`, `genero`, `direccion`, `comuna`, `c_identidad`, `teleton`, `pension`, `pension_basicaS`, `subsidioD_mental`, `p_sobrevivencia`, `a_duplo`, `chile_solidario`, `r_s_hogares`) VALUES (NULL, '$rut', '$nombre', '$apellido', '$fecha', '$genero', '$direccion', '$comuna', '$dataFile', '0', '0', '0', '0', '0', '0', '0', '0');");
        /*if ($resultado) {
            echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
        } else {
            echo "Ocurrió algun error al copiar el archivo.";
        }*/
    } else {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

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

$data->addBenefi($rut, $nombre, $apellido, $fecha, $genero, $direccion, $comuna, $dataFile, $teleton, $pension, $penBase, $subMental, $penSobre, $asgDuplo, $chSolid, $hogar);
$data->addDiagnos($especialista, $fecha_control, "0", "application/pdf", $rut, 3);
$data->addTutor($rutTutor, $nombreTutor, $fecha_tutor, $direTutor, $comuTutor, $carnetTutor, $nivelE, $ocupacion, $telefono, $correoTutor, $prevision);
$data->addTeleton($numeroTeleton, $rut);
$data->addCredencialD($numeroCreden, $origenP, $origenS, $porcent, $grado, $movilidad, $credenFileFront, $credenFileBack, $rut);
$data->addParentezo($parentezco, $rut, $rutTutor);
$data->addRegisSocial("0", "application/pdf", $rut);

echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';

?>
