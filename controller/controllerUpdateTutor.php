<?php
$rutBen = isset($_GET['rut']) ? $_GET['rut'] : null;
$dis = isset($_GET['dis']) ? $_GET['dis'] : null;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Actualizando Beneficiario</title>
        <link rel="stylesheet" href="../Materialize/css/styleBody.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    </head>
    <body>
        <script>
            let rut = '<?php echo $rutBen; ?>';
            function Success() {
                swal({
                    title: "Actualización Exitosa",
                    text: "Tutor actualizado exitosamente",
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
                    title: "Actualización Exitosa",
                    text: "Tutor actualizado exitosamente",
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
                    text: "Algun dato es incorrecto, reintente",
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
                    text: "Algun dato es incorrecto, reintente",
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
session_start();

$rut = isset($_POST["rutT"]) ? $_POST["rutT"] : null;

if (empty($_POST["direccionT"])) {
    $direccionT = isset($_POST["direccionA"]) ? $_POST["direccionA"] : null;
} else {
    $direccionT = isset($_POST["direccionT"]) ? $_POST["direccionT"] : null;
}

if (empty($_POST["comunaT"])) {
    $comunaT = isset($_POST["comunaAT"]) ? $_POST["comunaAT"] : null;
} else {
    $comunaT = isset($_POST["comunaT"]) ? $_POST["comunaT"] : null;
}

if (empty($_POST["ocupacionT"])) {
    $ocupacionT = isset($_POST["ocupacionAT"]) ? $_POST["ocupacionAT"] : null;
} else {
    $ocupacionT = isset($_POST["ocupacionT"]) ? $_POST["ocupacionT"] : null;
}

if (empty($_POST["telefonoT"])) {
    $telefonoT = isset($_POST["telefonoAT"]) ? $_POST["telefonoAT"] : null;
} else {
    $telefonoT = isset($_POST["telefonoT"]) ? $_POST["telefonoT"] : null;
}

if (empty($_POST["emailT"])) {
    $emailT = isset($_POST["emailAT"]) ? $_POST["emailAT"] : null;
} else {
    $emailT = isset($_POST["emailT"]) ? $_POST["emailT"] : null;
}

//echo $direccionT.' '.$comunaT.' '.$ocupacionT.' '.$telefonoT.' '.$emailT;
if ($direccionT && $comunaT && $ocupacionT && $telefonoT && $emailT) {
    
    $data->updateTutor($rut, $direccionT, $comunaT, $ocupacionT, $telefonoT, $emailT);
    if ($ar == 1) {
        echo '<script>Success();</script>';
    } else if ($ar == 2) {
        echo '<script>SuccessDir();</script>';
    }
} else {
    if ($dis == 1) {
        echo '<script>Error();</script>';
    } else if ($dis == 2) {
        echo '<script>ErrorDir();</script>';
    }
}
?>

