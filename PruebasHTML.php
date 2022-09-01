<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title>Menú Secretaria</title>
        <link rel="icon" href="IMG/IconAveFenix.png"/>
        <meta charset="UTF-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="Materialize/css/styleSideBar.css">
        <link rel="stylesheet" href="Materialize/css/materialize.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="js/validarut.js"></script>
        <script src="js/jquery.rut.js"></script>
    </head>
    <body>
        <form name="prueba">
            <div class="row">
                <p class="col s5">
                    <label>
                        <input class="with-gap pension" value="1" id="si" name="t_atencion" type="radio"/>
                        <span>Atención por beneficio (Programas sociales previo evaluación social)</span>
                    </label>
                </p>
                <p class="col s5">
                    <label>
                        <input class="with-gap pension" value="2" id="no" name="t_atencion" type="radio"/>
                        <span>Atención por programa pagado (Costo minimo asociado)</span>
                    </label>
                </p>
            </div>

            <span id="par"></span>

            <div class="row">
                <p class="col s5">
                    <label>
                        <input class="with-gap pension1" value="1" id="pS1" name="pension1" type="radio" disabled/>
                        <span>Atención por beneficio (Programas sociales previo evaluación social)</span>
                    </label>
                </p>
                <p class="col s5">
                    <label>
                        <input class="with-gap pension1" value="2" id="pN1" name="pension1" type="radio" disabled/>
                        <span>Atención por programa pagado (Costo minimo asociado)</span>
                    </label>
                </p>
            </div>

            <span id="par1"></span>
            <div class="row">
                <p class="col s5">
                    <label>
                        <input class="with-gap pension2" value="1" id="pS2" name="pension2" type="radio" disabled/>
                        <span>Atención por beneficio (Programas sociales previo evaluación social)</span>
                    </label>
                </p>
                <p class="col s5">
                    <label>
                        <input class="with-gap pension2" value="2" id="pN2" name="pension2" type="radio" disabled/>
                        <span>Atención por programa pagado (Costo minimo asociado)</span>
                    </label>
                </p>
            </div>

            <span id="par2"></span>
            <div class="row">
                <div class="input-field col s6">
                    <input id="otroP" type="text" name="txt_otroP" class="validate otro" disabled>
                    <label class="active" for="otroP">Otro tipo de pension</label>
                </div>
            </div>

        </form>

        <script type="text/javascript">
            
            function parrafo() {
                
                
                /*$(document).ready(function () {
                 $('button').click(function () {
                 var radio = $("input[type=radio][name=t_atencion]").filter(":checked")[0];
                 if (radio) {
                 alert(radio.value);
                 } else {
                 alert('Nothing is selected');
                 }
                 })
                 });*/
                
                /*var form = document.forms[0];
                 var selectElement = form.querySelector('input[name="t_atencion"]');
                 var selectedValue = selectElement.value;
                 
                 console.log(selectElement.value);
                 
                 var si = document.querySelectorAll(".pension");
                 //var no = document.getElementById("no").value;
                 //console.log(si[0]);
                 var i = 0;
                 si.forEach(function (document) {
                 console.log(si[i]);
                 i++;
                 });*/
                
                
                var radio = $("input[type=radio][name=t_atencion]").filter(":checked")[0];
                var radio1 = $("input[type=radio][name=pension1]").filter(":checked")[0];
                var radio2 = $("input[type=radio][name=pension2]").filter(":checked")[0];
                
                const button = document.querySelectorAll('.pension1');
                const button2 = document.querySelectorAll('.pension2');
                const button3 = document.querySelector('.otro');
                console.log(button);
                
                if (radio.value == 1) {
                    document.getElementById("par").innerHTML = "Hola";
                    document.getElementById("par1").innerHTML = "";
                    document.getElementById("par2").innerHTML = "";
                    
                    var x=0;
                    button.forEach(function (document){
                        button[x].disabled=false;
                        //button[1].checked=false;
                        x++;
                    });
                    var y=0;
                    button2.forEach(function (document){
                        button2[y].disabled=false;
                        //button2[1].checked=false;
                        y++;
                    });
                    if (radio1.value == 2 && radio2.value==2) {
                        document.getElementById("par1").innerHTML="xD";
                        button3.disabled=false;
                    } else {
                        document.getElementById("par1").innerHTML = "nada";
                        button3.disabled=true;
                    }
                } else if (radio.value == 2) {
                    document.getElementById("par").innerHTML = "Adios";
                    document.getElementById("par1").innerHTML = "Adios";
                    document.getElementById("par2").innerHTML = "Adios";
                    //document.getElementById("pN1").checked=true;
                    var x=0;
                    button.forEach(function (document){
                        button[x].disabled=true;
                        button[1].checked=true;
                        x++;
                    });
                    var y=0;
                    button2.forEach(function (document){
                        button2[y].disabled=true;
                        button2[1].checked=true;
                        y++;
                    });
                    button3.disabled=true;
                } else {
                    document.getElementById("par").innerHTML = "nada";
                }
                
            }
            
            $(document).ready(function () {
                $('.pension').change(function () {
                    parrafo();
                });
                $('.pension1').change(function () {
                    parrafo();
                });
                $('.pension2').change(function () {
                    parrafo();
                });
            });
        </script>
    </body>
</html>
