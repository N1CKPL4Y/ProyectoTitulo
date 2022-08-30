<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once './Model_Data.php';

$data = new Data();
$conexion = $data->getConnection();

$query = "SELECT * FROM `diagnostico` WHERE ID=2;";

$resul = $conexion->query($query) or die(mysql_error());

if ($row = $resul->fetch_array()) {
    $rut = $row['beneficiario'];
    $contenido = $row['informe_diagnostico'];
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

