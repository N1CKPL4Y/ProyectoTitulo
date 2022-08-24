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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    </head>
    <body>
        <div class="ui container centrado" style="position: relative">
            <div class="ui segment"style="position: absolute; margin: auto">
                <div class="ui two column very relaxed stackable grid">
                    <div class="column">
                        <img src="IMG/Login.png" alt="No disponible" width="500" height="200"/>
                    </div>
                    <div class="middle aligned column">
                        <div class="ui form">
                            <form name="login" action="controller/controllerLogin.php" method="post">
                                <div class="field">
                                    <label>Username</label>
                                    <div class="ui left icon input">
                                        <input type="text" placeholder="Username" name="txt_rut">
                                        <i class="user icon"></i>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Password</label>
                                    <div class="ui left icon input">
                                        <input type="password" name="txt_pass">
                                        <i class="lock icon"></i>
                                    </div>
                                </div>
                                <div class="ui blue submit button">Login</div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="ui vertical divider">
                </div>
            </div>
        </div>

    </body>
</html>
