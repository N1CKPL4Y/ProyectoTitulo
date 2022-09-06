<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fundacion Ave Fenix</title>
        <link rel="icon" href="IMG/IconAveFenix.png"/>
        <!-- CSS only -->
        <link href="Materialize/css/styleLogin.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/validarut.js"></script>
        <script src="js/jquery.rut.js"></script>
    </head>
    <body style="background-image: url(IMG/5.jpg); background-attachment: fixed; background-size: cover">
        <header class="header">
            <div class="nav-cont logo-nav">
                <img src="IMG/Login.png" width="500px" height="150px">
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col s8 m6 l4">
                    <div class="forms">
                        <div class="form login">
                            <span class="titulo">Iniciar sesión</span>
                            <form name="login" action="controller/controllerlogin.php" method="post" name="datosUser">
                                <div class="input-field">
                                    <input id="rut" type="text" name="txt_rut" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="javascript:return Rut(document.datosUser.txt_rut.value)" placeholder="Rut"  required >
                                    <i class="uil uil-envelope icon"></i>
                                </div>
                                <span id="emailVal"></span>
                                <div class="input-field">
                                    <input type="password" name="txt_pass" class="passwd" placeholder="Contraseña" required>
                                    <i class="uil uil-lock icon"></i>
                                    <i class="uil uil-eye-slash mostrarPass"></i>
                                </div>
                                <div class="input-field button">
                                    <input type="submit" value="Iniciar sesión" required>
                                </div>
                            </form>
                            <div class="login-singup">
                                <span class="text">¿Olvidaste tu contraseña?
                                </span>
                                <br>
                                <span class="text">Contacta al administrador
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <span>
                Fundacion Ave Fenix © Derechos Reservados - 2022
            </span>
        </footer>
        <script>
            const container = document.querySelector(".container");
            passwdShowHide = document.querySelectorAll(".mostrarPass");
            passwdFields = document.querySelectorAll(".passwd");
            login = document.querySelector(".login-link");

            passwdShowHide.forEach(eyeIcon => {
                eyeIcon.addEventListener("click", () => {
                    passwdFields.forEach(passwdFields => {
                        if (passwdFields.type === "password") {
                            passwdFields.type = "text";
                            passwdShowHide.forEach(icon => {
                                icon.classList.replace("uil-eye-slash", "uil-eye");
                            })
                        } else {
                            passwdFields.type = "password";
                            passwdShowHide.forEach(icon => {
                                icon.classList.replace("uil-eye", "uil-eye-slash");
                            })
                        }
                    })
                })
            })


        </script>
        <script>
            $(function () {
                $("input#rut").rut({
                    formatOn: 'keyup',
                    minimumLength: 8, // validar largo mínimo; default: 2
                    validateOn: 'change' // si no se quiere validar, pasar null
                });

                var input = document.getElementById('rut');
                input.addEventListener('input', function () {
                    if (this.value.length >= 13)
                        this.value = this.value.slice(0, 12);
                })
            })
        </script>
    </body>
</html>
