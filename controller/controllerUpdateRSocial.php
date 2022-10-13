<?php
$bene = isset($_POST['rutBene']) ? $_POST['rutBene'] : null;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Ingresando Registro S. Hogares</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            let rut = '<?php echo $bene; ?>';
            function Success() {
                swal({
                    title: "Registro Exitoso",
                    text: "Registro S. Hogares registrado correctamente",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Aceptar"
                },
                        function () {
                            window.location.href = '../Admin/VerDatos.php?rut=' + rut;
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
        </script>
    </body>
</html>

<?php
include_once '../DB/Model_Data.php';
$data = new Data();

$conect = $data->getConnection();
session_start();

$pHogar = isset($_POST['txt_porcentHogar']) ? $_POST['txt_porcentHogar'] : null;

if (!isset($_FILES["file_Hogar"]) || $_FILES["file_Hogar"]["error"] > 0) {
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
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}

//echo $bene.' | '.$pHogar.' | '.$tipoDocu;

if($bene && $pHogar && $hogarFile){
    echo'<script>Success()</script>';
    $data->addRegisSocial($hogarFile, $pHogar, $tipoDocu, $bene);
    $data->updateBeneHogar($bene);
}else{
    echo'<script>Error()</script>';
}
?>

