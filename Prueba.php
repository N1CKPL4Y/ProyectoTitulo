<?php
session_start();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Acceso Denegado</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="IMG/IconAveFenix.png"/>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <script src="js/validarut.js"></script>
        <script src="js/jquery.rut.js"></script>
        <link rel="stylesheet" href="Materialize/css/styleBody.css">
        <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-sm-12 col-md-10 col-lg-10" style="padding-top: 15px">
                    <div class="card text-center">
                        <div class="card-header">
                            Lo sentimos
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Mantenimiento</h5>
                            <p class="card-text">La página que deseas visitar esta en mantenimiento o estan en fase de pruebas.</p>
                            <?php
                            if ($_SESSION['tipo_u'] == '1' && $_SESSION['cargo'] == '1') {
                                ?>
                                <a href="MenuAdmin.php" class="btn btn-primary"><i class="bi bi-arrow-left"></i>Volver</a>
                                <?php
                            } else if ($_SESSION['tipo_u'] == '2' && $_SESSION['cargo'] == '1') {
                                ?>
                                <a href="MenuDireccion.php" class="btn btn-primary"><i class="bi bi-arrow-left"></i>Volver</a>
                                <?php
                            } else if ($_SESSION['tipo_u'] == '2' && $_SESSION['cargo'] = '2') {
                                ?>
                                <a href="MenuSecretaria.php" class="btn btn-primary"><i class="bi bi-arrow-left"></i>Volver</a>
                                <?php
                            } else if ($_SESSION['tipo_u'] == '2' && $_SESSION['cargo'] == '3') {
                                ?>
                                <a href="MenuProfesional.php" class="btn btn-primary"><i class="bi bi-arrow-left"></i>Volver</a>
                                <?php
                            } else if ($_SESSION['tipo_u'] == '2' && $_SESSION['cargo'] == '4') {
                                ?>
                                <a href="MenuInterno.php" class="btn btn-primary"><i class="bi bi-arrow-left"></i>Volver</a>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="card-footer text-muted">
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
