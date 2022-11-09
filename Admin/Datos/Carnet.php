<?php
include_once '../../DB/Model_Data.php';

$data = new Data();
$conexion = $data->getConnection();

$rut = isset($_GET['rut']) ? $_GET['rut'] : null;
echo $rut;

$query = "SELECT * FROM `beneficiario` WHERE rut = '$rut';";

$resul = $conexion->query($query) or die(mysql_error());

if ($row = $resul->fetch_array()) {
    $rut = $row['RUT'];
    $contenido = $row['c_identidad'];
    $tipo = 'image/jpg';
}
//header("Content-Type: $tipo");
//echo $contenido;


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../IMG/IconAveFenix.png"/>
        <title>Carnet de Identidad</title>
        <link rel="stylesheet" href="../../Bootstrap/css/styleBody.css"/>
        
    </head>
    <body>
        <a href="#" download="carnet.jpeg">
<?php
echo '<img name="hola" width="700" height="400" download="hola" src="data:image/jpeg;charset=utf-8;base64,' . base64_encode($contenido) . '" />';
?>
        </a>
    </body>
</html>


