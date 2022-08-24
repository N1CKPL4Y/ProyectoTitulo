<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fundación Ave Fenix</title>
        <link rel="icon" href="IMG/IconAveFenix.png"/>
        <link href="css/styleLogin.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="forms">
                        <div class="form login">
                            <div class="row" style="justify-content: center; align-content: center">
                                <img src="IMG/Login.png" width="200px" height="110px">
                            </div>
                            <span class="titulo">Iniciar sesión</span>
                            <form name="login" action="controller/controllerLogin.php" method="post">
                                <div class="input-field">
                                    <input type="text" name="txt_rut" placeholder="Ingrese su R.U.T" id="email" required>
                                    <i class="uil uil-envelope icon"></i>
                                </div>
                                <span id="emailVal"></span>
                                <div class="input-field">
                                    <input type="password" name="txt_pass" class="passwd" placeholder="Contraseña" required>
                                    <i class="uil uil-lock icon"></i>
                                    <i class="uil uil-eye-slash mostrarPass"></i>
                                </div>
                                <!--<div class="checkbox-text">
                                    <div class="checkbox-content">
                                        <input type="checkbox" id="remember">
                                        <label for="rememberme" class="text">Recordarme</label>
                                    </div>
                                </div>-->
                                <div class="input-field button">
                                    <input type="submit" value="Iniciar sesión" required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
