<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fundación Ave Fénix</title>
        <link rel="icon" href="IMG/IconAveFenix.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/validarut.js"></script>
        <script src="js/jquery.rut.js"></script>
        <link rel="stylesheet" href="Materialize/css/styleSideBar.css">
    </head>
    <body style="background-image: url(IMG/5.jpg); background-attachment: fixed; background-size: cover">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container" style="display: flex; align-items: center; justify-content: center;">
                <a class="navbar-brand"><img src="IMG/Login.png" width="350" height="110" alt="Login"/></a>
            </div>
        </nav>
        <div class="container-fluid" style="margin-top: 30px">
            <div class="row" style="display: flex; align-items: center; justify-content: center;">
                <div class="col-sm-12 col-md-10 col-lg-6 w-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Iniciar Sesión</h4>
                        </div>
                        <div class="card-body">
                            <form action="controller/controllerLogin.php" method="post">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-10 ">
                                        <label for="exampleInputEmail1">R.U.T del usuario</label>
                                        <div class="input-group mb-3">      
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                                            </div> 
                                            <input type="text" placeholder="Ej: 15.111.222-3" autocomplete="off" name="txt_rut" class="form-control" id="rut" required="">
                                        </div>  
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña del usuario</label>
                                    <div class="input-group mb-3">      
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                                        </div> 
                                        <input type="password" placeholder="Ingrese su contraseña" name="txt_pass" class="form-control" id="passwd" required="">
                                    </div>
                                    <span style="color: grey">¿Has olvidado tu contraseña? Contacta al Administrador.</span>
                                    <br>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-10" style="display: flex; align-items: center; justify-content: center;">
                                        <button type="submit" class="btn submit btn-lg">Iniciar Sesión</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center" style="background-color: #0B4C5F; color: white">
                            Fundacion Ave Fenix © Derechos Reservados - 2022
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
