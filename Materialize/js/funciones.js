/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

function agregarUsuario(rut, nombre, apellido, email, telefono, area, tipo, passwT) {

    cadena = "rut=" + rut + "&nombre=" + nombre + "&apellido=" + apellido + "&email=" + email + "&telefono=" + telefono + "&area=" + area + "&tipo=" + tipo + "&passwT=" + passwT;

    $.ajax({
        type: "POST",
        url: "Controller/agregarUsuario.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                alertify.success("agregado con exito :)");
            } else {
                alertify.error("Fallo el servidor");
            }
        }
    });
}


function cargarDatos(datos) {
    d = datos.split('..');
    console.log(d);
    $('#rutU').val(d[0]);
    $('#nombreU').val(d[1]);
    $('#apellidoU').val(d[2]);
    $('#emailU').val(d[3]);
    $('#pass').val(d[4]);
    $('#telefonoU').val(d[5]);
    $('#tipoU').val(d[6]);
    $('#tUser').val(d[7]);
    $('#areaU').val(d[8]);
    $('#aUser').val(d[9]);
    $('#cargoU').val(d[10]);
    $('#cUser').val(d[11]);
    
    if (d[12]==1) {
        $('#estadoU').val("Activo");
        $('#labelDes').text("¿Desea desactivar el usuario?");
        $('#desA').val(2);
        $('#desB').val(1);
        //$('#estado').prepend('<label for="deshabilitar" id="deshabilitar" class="col-sm-10 col-form-label" >¿Desea desactivar el usuario?</label>');
    }else{
        $('#estadoU').val("Inactivo");
        $('#labelDes').text("¿Desea activar el usuario?");
        $('#desA').val(1);
        $('#desB').val(2);
        //$('#estado').prepend('<label for="deshabilitar" id="deshabilitar" class="col-sm-10 col-form-label" >¿Desea activar el usuario?</label>');
    }

}

function actualizarUsuario() {

    rut = $('#rutEdite').val();
    nombre = $('#nombreE').val();
    apellido = $('#apellidoE').val();
    email = $('#emailE').val();
    telefono = $('#telefonoE').val();
    area = $('#areaN').val();
    
    
    cadena = "rut=" + rut + "&nombre=" + nombre + "&apellido=" + apellido + "&email=" + email + "&telefono=" + telefono + "&area=" + area + "&tipo=" + tipo;
    
    console.log(cadena);

    $.ajax({
        type: "POST",
        url: "Controller/actualizaDatos.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                alert("Fallo el servidor");
            } else {
                alert("Actualizado con exito :)");
                
            }
        }
    });
}
