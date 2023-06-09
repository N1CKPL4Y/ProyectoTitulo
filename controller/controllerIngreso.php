<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Registrando Nuevo Beneficiario</title>
        <link rel="stylesheet" href="../Bootstrap/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            function Success() {
                swal({
                    title: "Registro Exitoso",
                    text: "Beneficiario registrado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../MenuSecretaria.php';
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

$conect = $data->getConnection();

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
$previBene = isset($_POST['cbo_prevision1']) ? $_POST['cbo_prevision1'] : null;
//$existeBene = $data->existBeneficiario($rut);
$existeBene = $data->getExistBen($rut);

//$carnet = isset($_POST['file_carnet']) ? $_POST['file_carnet'] : null;
$tipo_DocuBene = isset($_POST['rd_carnet']) ? $_POST['rd_carnet'] : null;
if ($tipo_DocuBene == 1) {
    if (!isset($_FILES["file_carnetPDF"]) || $_FILES["file_carnetPDF"]["error"] > 0) {
        //echo "Ha ocurrido un error. 1";
    } else {
        // Verificamos si el tipo de archivo es un tipo de imagen permitido.
        // y que el tamaño del archivo no exceda los 16MB
        $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png", "application/pdf");
        $limite_kb = 16384;

        if (in_array($_FILES['file_carnetPDF']['type'], $permitidos) && $_FILES['file_carnetPDF']['size'] <= $limite_kb * 1024) {
            //echo 'carnet bene pdf <br>';
            // Archivo temporal
            $imagen_temporal = $_FILES['file_carnetPDF']['tmp_name'];
            // Tipo de archivo
            $tipoB = $_FILES['file_carnetPDF']['type'];
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
            /* if ($resultado) {
              echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
              } else {
              echo "Ocurrió algun error al copiar el archivo.";
              } */
        } else {
            echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
        }
    }
} else if ($tipo_DocuBene == 2) {
    if (!isset($_FILES["file_carnetImage"]) || $_FILES["file_carnetImage"]["error"] > 0) {
        //echo "Ha ocurrido un error. 1";
    } else {
        // Verificamos si el tipo de archivo es un tipo de imagen permitido.
        // y que el tamaño del archivo no exceda los 16MB
        $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
        $limite_kb = 16384;

        if (in_array($_FILES['file_carnetImage']['type'], $permitidos) && $_FILES['file_carnetImage']['size'] <= $limite_kb * 1024) {
            //echo 'carnet bene imagen<br>';
            // Archivo temporal
            $imagen_temporal = $_FILES['file_carnetImage']['tmp_name'];
            // Tipo de archivo
            $tipoB = $_FILES['file_carnetImage']['type'];
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
            /* if ($resultado) {
              echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
              } else {
              echo "Ocurrió algun error al copiar el archivo.";
              } */
        } else {
            echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
        }
    }
}



//////////////Diagnostico
$havediag = isset($_POST['diagnostico']) ? $_POST['diagnostico'] : null;
$condicion = isset($_POST['cbo_condicion']) ? $_POST['cbo_condicion'] : null;
$otroDiagnos = isset($_POST['txt_otroDiag']) ? $_POST['txt_otroDiag'] : null;
$especialista = isset($_POST['cbo_especialista']) ? $_POST['cbo_especialista'] : null;
$fecha_control = isset($_POST['txt_control']) ? $_POST['txt_control'] : null;
$data_control;
$tipoArchi;

if (!isset($_FILES["file_control"]) || $_FILES["file_control"]["error"] > 0) {
    //echo "Ha ocurrido un error. 2";
    $data_control = null;
    $tipoArchi = null;
} else {
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png", "application/pdf", "application/msword");
    $limite_kb = 16384;

    if (in_array($_FILES['file_control']['type'], $permitidos) && $_FILES['file_control']['size'] <= $limite_kb * 1024) {
        //echo 'informe control <br>';
        // Archivo temporal
        $imagen_temporal = $_FILES['file_control']['tmp_name'];
        //$tipoArchi = $_FILES['file_control']['type'];
        // Tipo de archivo
        $tipoArchi = $_FILES['file_control']['type'];
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
        /* if ($resultado) {
          echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
          } else {
          echo "Ocurrió algun error al copiar el archivo.";
          } */
    } else {
        //echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
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
    //echo "Ha ocurrido un error. 3";
} else {
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['file_tutor']['type'], $permitidos) && $_FILES['file_tutor']['size'] <= $limite_kb * 1024) {
        //echo 'carnet tutor <br>';
        // Archivo temporal
        $imagen_temporal = $_FILES['file_tutor']['tmp_name'];
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
        /* if ($resultado) {
          echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
          } else {
          echo "Ocurrió algun error al copiar el archivo.";
          } */
    } else {
        //echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

$prevision = isset($_POST['cbo_prevision']) ? $_POST['cbo_prevision'] : null;
$teleton = isset($_POST['rd_teleton']) ? $_POST['rd_teleton'] : null;
$numeroTeleton;

if ($teleton == 1) {
    $numeroTeleton = isset($_POST['txt_Nteleton']) ? $_POST['txt_Nteleton'] : null;
} else {
    $numeroTeleton = 0;
}

////////////////////////////Credencial
$haveCreden = isset($_POST['discapacidad']) ? $_POST['discapacidad'] : null;
$numeroCreden = isset($_POST['txt_credencial']) ? $_POST['txt_credencial'] : null;
$origenP = isset($_POST['cbo_origenP']) ? $_POST['cbo_origenP'] : null;
$origenS = isset($_POST['cbo_origenS']) ? $_POST['cbo_origenS'] : null;
$porcent = isset($_POST['txt_porcentaje_d']) ? $_POST['txt_porcentaje_d'] : null;
$grado = isset($_POST['cbo_grado']) ? $_POST['cbo_grado'] : null;
$movilidad = isset($_POST['movilidad']) ? $_POST['movilidad'] : null;
$credenFileFront;
$credenFileBack;

if (!isset($_FILES["file_credenFront"]) || $_FILES["file_credenFront"]["error"] > 0) {
    //echo "Ha ocurrido un error. 4";
    $credenFileFront = null;
} else {
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['file_credenFront']['type'], $permitidos) && $_FILES['file_credenFront']['size'] <= $limite_kb * 1024) {
        //echo 'creden A';
        // Archivo temporal
        $imagen_temporal = $_FILES['file_credenFront']['tmp_name'];
        // Tipo de archivo
        $tipoCredenA = $_FILES['file_credenFront']['type'];
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
        /* if ($resultado) {
          echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
          } else {
          echo "Ocurrió algun error al copiar el archivo.";
          } */
    } else {
        //echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

if (!isset($_FILES["file_credenBack"]) || $_FILES["file_credenBack"]["error"] > 0) {
    //echo "Ha ocurrido un error. 5";
    $credenFileBack = null;
} else {
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['file_credenBack']['type'], $permitidos) && $_FILES['file_credenBack']['size'] <= $limite_kb * 1024) {
        //echo 'archivo creden b';
        // Archivo temporal
        $imagen_temporal = $_FILES['file_credenBack']['tmp_name'];
        // Tipo de archivo
        $tipoCredenB = $_FILES['file_credenBack']['type'];
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
        /* if ($resultado) {
          echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
          } else {
          echo "Ocurrió algun error al copiar el archivo.";
          } */
    } else {
        //echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

/////////////////////////Pensiones
$pension = isset($_POST['cbo_pension']) ? $_POST['cbo_pension'] : null;
$pensionbd;

if ($pension == 5) {
    $pensionbd = 0;
} else {
    $pensionbd = 1;
}
/////////////////Beneficios Sociales
$chSolid = isset($_POST['csolidario']) ? $_POST['csolidario'] : null;
$hogar = isset($_POST['hogares']) ? $_POST['hogares'] : null;
$porcentHogar = isset($_POST['txt_porcentHogar']) ? $_POST['txt_porcentHogar'] : null;
$hogarFile;

if ($hogar == 1) {
    if (!isset($_FILES["file_Hogar"]) || $_FILES["file_Hogar"]["error"] > 0) {
        $hogarFile = null;
        $tipoDocu = null;
        //echo $hogarFile . '<br>';
        //echo $tipoDocu;
        //echo "Ha ocurrido un error. 6";
    } else {
        // Verificamos si el tipo de archivo es un tipo de imagen permitido.
        // y que el tamaño del archivo no exceda los 16MB
        $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png", "application/pdf", "application/msword");
        $limite_kb = 16384;

        if (in_array($_FILES['file_Hogar']['type'], $permitidos) && $_FILES['file_Hogar']['size'] <= $limite_kb * 1024) {
            //echo 'archivo hogar';
            // Archivo temporal
            $imagen_temporal = $_FILES['file_Hogar']['tmp_name'];
            //$tipoArchi = $_FILES['file_control']['type'];
            // Tipo de archivo
            $tipoDocu = $_FILES['file_Hogar']['type'];
            // Leemos el contenido del archivo temporal en binario.
            $fp = fopen($imagen_temporal, 'r+b');
            $hogarFile = fread($fp, filesize($imagen_temporal));
            fclose($fp);
            //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
            // $data=file_get_contents($imagen_temporal);
            // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
            /* @var $data type */

            $hogarFile = mysqli_escape_string($conect, $hogarFile);
            // Insertamos en la base de datos.
            //echo 'aaa '.$data->addBenefi($rut, $nombre, $apellido, $fecha, $genero, $direccion, $comuna, $dataFile, 1, 0, 0, 0, 0, 0, 0, 0);
            //$resultado = mysqli_query($conect, "INSERT INTO `beneficiario` (`ID`, `RUT`, `nombre`, `apellido`, `fecha_nac`, `genero`, `direccion`, `comuna`, `c_identidad`, `teleton`, `pension`, `pension_basicaS`, `subsidioD_mental`, `p_sobrevivencia`, `a_duplo`, `chile_solidario`, `r_s_hogares`) VALUES (NULL, '$rut', '$nombre', '$apellido', '$fecha', '$genero', '$direccion', '$comuna', '$dataFile', '0', '0', '0', '0', '0', '0', '0', '0');");
            /* if ($resultado) {
              echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
              } else {
              echo "Ocurrió algun error al copiar el archivo.";
              } */
        } else {
            //echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
        }
    }
} else {
    $hogarFile = null;
    $tipoDocu = null;
}

/////////////////////////////////Insercion de datos///////////////////////////

if (!$existeBene) {
    if ($rut && $nombre && $apellido && $fecha && $genero && $direccion && $comuna && $pension && $rutTutor && $nombreTutor && $fecha_tutor && $direTutor && $comuTutor && $carnetTutor && $nivelE && $ocupacion && $telefono && $comuTutor && $prevision && $previBene) {
        
        //insert datos generales
        //insert datos beneficiario
        $data->addBenefi($rut, $nombre, $apellido, $fecha, $genero, $direccion, $comuna, $dataFile, $tipoB, $teleton, $haveCreden, $pension, $chSolid, $hogar, $previBene);
        $data->addGeneral($motivo, $derivacion, $tipo_atencion, $rut);
        //insert datos diagnostico beneficiario
        if ($havediag == 1) {
            $data->addDiagnos($especialista, $fecha_control, $data_control, $tipoArchi, $rut, $condicion, $otroDiagnos);
        } else {
            
        }
        //insert datos tutor
        $existTutor = $data->getExistTutor($rutTutor);
        if ($existTutor) {
            $data->addParentezo($parentezco, $rut, $rutTutor);
        } else {
            $data->addTutor($rutTutor, $nombreTutor, $fecha_tutor, $direTutor, $comuTutor, $carnetTutor, $nivelE, $ocupacion, $telefono, $correoTutor, $prevision);
            $data->addParentezo($parentezco, $rut, $rutTutor);
        }

        //insert datos parentesco
        //insert datos credencial d.
        if ($haveCreden == 1) {
            $data->addCredencialD($numeroCreden, $origenP, $origenS, $porcent, $grado, $movilidad, $credenFileFront, $credenFileBack, $rut);
        } else {
            //echo 'hola';
        }
        //insert teleton
        if ($teleton == 1) {
            $data->addTeleton($numeroTeleton, $rut);
        }

        //insert beneficios sociales
        if ($hogar == 1) {
            $data->addRegisSocial($hogarFile, $porcentHogar, $tipoDocu, $rut);
        }

        echo '<script language="javascript">Success()</script>';
        //echo "funciona";
    } else {
        echo '<script language="javascript">Error()</script>';
        //echo "no pasa na";
    }
} else if ($existeBene) {
    echo '<script language="javascript">ErrorExistencia()</script>';
}

//echo $previBene . "<br>";
/*echo "<br>" . $prevision;
//echo $existeBene.'<br>';
echo '<br>' . $rut . " " . $nombre . " " . $apellido . " " . $fecha . " " . $genero . " " . $direccion . " " . $comuna . " " . $teleton . " " . $pension . " " . $chSolid . " " . $hogar . " " . $previBene . " " . $tipoB . "<br>";
echo '<br>' . $rut . " " . $pension;
echo '<br>' . $rutTutor . " " . $nombreTutor . " " . $fecha_tutor . " " . $direTutor . " " . $comuTutor . " " . $nivelE . " " . $ocupacion . " " . $telefono . " " . $correoTutor . " " . $prevision . " ";
echo '<br>' . $parentezco . " " . $rut . " " . $rutTutor;
echo '<br>' . $numeroTeleton . " " . $rut;
echo '<br>' . $numeroCreden . " " . $origenP . " " . $origenS . " " . $porcent . " " . $grado . " " . $movilidad . " " . $rut;
echo '<br>' . $especialista . " " . $fecha_control . " " . $rut . " " . $condicion . " " . $tipoArchi;

echo '<br>' . $haveCreden;*/
//echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>'; */
?>
