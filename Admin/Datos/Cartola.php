<?php

include_once '../../DB/Model_Data.php';

$data = new Data();
$conexion = $data->getConnection();

$rut = isset($_GET['rut']) ? $_GET['rut'] : null;
echo $rut;

$query = "SELECT * FROM `registro_socialh` WHERE beneficiario = '$rut';";

$resul = $conexion->query($query) or die(mysql_error());

if ($row = $resul->fetch_array()) {
    $rut = $row['beneficiario'];
    $contenido = $row['copia_cartola'];
    $tipo = $row['tipoDocumento'];
}
$nombreArchivo = basename($rut."RegistroSocial.pdf");
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: inline; filename=$nombreArchivo");


//content-disposition 
//inline: abre el archivo pero no lo descarga
//attachment: descarga el archivo automaticamente
header("Content-type: $tipo");
echo $contenido;

?>

