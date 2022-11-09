<?php
session_start();
$bene = isset($_POST['rutBene']) ? $_POST['rutBene'] : null;
$dis = isset($_GET['dis']) ? $_GET['dis'] : null;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Ingresando Credencial</title>
        <link rel="stylesheet" href="../Bootstrap/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            let rut = '<?php echo $bene; ?>';
            function Success() {
                swal({
                    title: "Registro Exitoso",
                    text: "Datos de Credencial registrados correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/VerDatos.php?rut=' + rut;
                        });
            }
            
            function SuccessDir() {
                swal({
                    title: "Registro Exitoso",
                    text: "Datos de Credencial registrados correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Direccion/DirVerDatos.php?rut=' + rut;
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
                            window.location.href = '../Admin/VerDatos.php?rut=' + rut;
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
                            window.location.href = '../Direccion/DirVerDatos.php?rut=' + rut;
                        });
            }
        </script>
    </body>
</html>

<?php
include_once '../DB/Model_Data.php';
$data = new Data();

$conect = $data->getConnection();

$numCrede = isset($_POST['txt_credencial']) ? $_POST['txt_credencial'] : null;
$origenP = isset($_POST['cbo_origenP']) ? $_POST['cbo_origenP'] : null;
$origenS = isset($_POST['cbo_origenS']) ? $_POST['cbo_origenS'] : null;
$pDisc = isset($_POST['txt_porcentaje_d']) ? $_POST['txt_porcentaje_d'] : null;
$gDisc = isset($_POST['cbo_grado']) ? $_POST['cbo_grado'] : null;
$movilidad = isset($_POST['movilidad']) ? $_POST['movilidad'] : null;

if (!isset($_FILES["file_credenFront"]) || $_FILES["file_credenFront"]["error"] > 0) {
    //echo "Ha ocurrido un error. 4";
    $credenFileFront = null;
} else {
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['file_credenFront']['type'], $permitidos) && $_FILES['file_credenFront']['size'] <= $limite_kb * 1024) {
        echo 'creden A';
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
        /* if ($resultado) {
          echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
          } else {
          echo "Ocurrió algun error al copiar el archivo.";
          } */
    } else {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

if (!isset($_FILES["file_credenBack"]) || $_FILES["file_credenBack"]["error"] > 0) {
    echo "Ha ocurrido un error. 5";
    $credenFileBack = null;
} else {
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['file_credenBack']['type'], $permitidos) && $_FILES['file_credenBack']['size'] <= $limite_kb * 1024) {
        echo 'creden b';
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
        /* if ($resultado) {
          echo '<script language="javascript">alert("Excelente");window.location.href="../MenuSecretaria.php"</script>';
          } else {
          echo "Ocurrió algun error al copiar el archivo.";
          } */
    } else {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

//echo $bene.' | '.$numCrede.' | '.$origenP.' | '.$origenS.' | '.$pDisc.' | '.$gDisc.' | '.$movilidad.' | '.$credenFileFront.' | '.$credenFileBack;
if ($bene && $numCrede && $origenP && $origenS && $pDisc && $gDisc && $movilidad && $credenFileFront && $credenFileBack){
    
    $data->addCredencialD($numCrede, $origenP, $origenS, $pDisc, $gDisc, $movilidad, $credenFileFront, $credenFileBack, $bene);
    $data->updateBeneCred($bene);
    if($dis == 1){
        echo'<script>Success()</script>';
    }else if($dis == 2){
        echo'<script>SuccessDir()</script>';
    }
}else{
    if($dis == 1){
        echo'<script>Error()</script>';
    }else if($dis == 2){
        echo'<script>ErrorDir()</script>';
    }
    
}
?>

