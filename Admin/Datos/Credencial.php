<?php
include_once '../../DB/Model_Data.php';

$data = new Data();
$conexion = $data->getConnection();

$rut = isset($_GET['rut']) ? $_GET['rut'] : null;
echo $rut;

$query = "SELECT * FROM `c_discapacidad` WHERE beneficiario = '$rut';";

$resul = $conexion->query($query) or die(mysql_error());

if ($row = $resul->fetch_array()) {
    $rut = $row['beneficiario'];
    $contenidoA = $row['c_parte_delantera'];
    $contenidoB = $row['c_parte_trasera'];
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
        <link rel="stylesheet" href="../../Materialize/css/styleBody.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-sm-12 col-md-10 col-lg-6">
                    <img name="hola" width="400" height="700" src="data:<?php echo $tipo;?>;base64,<?php echo base64_encode($contenidoA)?>" style="transform:rotate(-90deg); margin-bottom: -300px;"/>
                </div>
                <div class=" col-sm-12 col-md-10 col-lg-6">
                    <img name="hola" width="400" height="700" src="data:<?php echo $tipo;?>;base64,<?php echo base64_encode($contenidoB)?>" style="transform:rotate(-90deg);"/>
                </div>
            </div>
        </div>    
    </body>
</html>


