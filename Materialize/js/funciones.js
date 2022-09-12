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
    d = datos.split('||');
    console.log(d[0]);
    $('#rutU').val(d[0]);
    $('#nombresU').val(d[1]);
    $('#apellidosU').val(d[2]);
    $('#emailU').val(d[3]);
    $('#passU').val(d[4]);
    $('#telefonoU').val(d[5]);
    $('#tipoU').val(d[6]);
    $('#telefonoU').val(d[4]);
    area=0;
    console.log(d[5]);
    /*switch (d[5]) {
        case 1:
            area="bodega";
            break;
        case "seguridad":
            area=2;
            break;
        case "RRHH":
            area=3;
            break;
        case "zona_espera":
            area=4;
            break;
        case "g_vuelos":
            area=5;
            break;
        default:
            area=0;
            break;
    }*/
    $('#areaE').val(d[5]);
    



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
