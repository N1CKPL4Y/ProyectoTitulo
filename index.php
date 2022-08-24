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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    <body style="background-image: url(IMG/FondoLogin.png); background-repeat: repeat-x">
        <div class="container">
            <div class="row" style="margin-top: 25%">
                <div class="col">
                </div>
                <div class="col-6">
                    <div class="card text-center">
                        <div class="card-header">
                            <img src="IMG/Login.png" width="300" height="100" alt="Imagen no disponible"/>
                        </div>
                        <div class="card-body">
                            <h2>Iniciar Sesion</h2>
                            <form action="controller/controllerLogin.php" method="post">
                                <div class="mb-3">
                                    <label for="rut" class="form-label">R.U.T</label>
                                    <input type="text" class="form-control" name="txt_rut" id="rut" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="txt_pass" id="password" required>
                                </div>
                                <button type="submit" class="btn" style="background-color: #d4db00">Iniciar Sesion</button>
                            </form>
                        </div>
                        <div class="card-footer text-muted">
                            Fundacion Ave Fenix - Derechos Reservados
                        </div>
                    </div>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
    </body>
</html>
