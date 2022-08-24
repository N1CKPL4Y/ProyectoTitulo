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
        <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="forms">
                <div class="form login">
                    <div class="row" style="justify-content: center; align-content: center">
                        <img src="IMG/Login.png" width="250px" height="110px">
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
        <footer>
            <span>
                SGV © Derechos Reservados - 2022
            </span>
        </footer> 

    </body>
</html>
