//Jquery
//cuando cargue la página
$(document).ready(function () {
    //cuando clicken a MyBtn || # -> id, . -> class
    // $("#MyBtn").click(function () {
    //     alert("hola Jquery!!!");
    // });

    //Si queremos asociar mas de un evento
    $("#MyBtn").on({
        // si hacemos click
        click: function () {
            // recogemos los valores de los input
            let texto_input = $("#nombre").val();
            let DNI = $("#dni").val();
            let edad = $("#edad").val();

            //-------------------------- Realizar validaciones aquí ---------------------------------

            // Verifico nombre
            if (texto_input.length < 1) {
                $("#Err_Nombre").html("No puede estar vacio");
            } else if (!isNaN(texto_input)) {
                $("#Err_Nombre").html("Solo puedes poner Letras");
            } else {
                $("#Err_Nombre").html("");
            }

            // Verifico dni
            if (DNI.length < 1) {
                $("#Err_Dni").html("No puede estar vacio");
            } else if (!validarDNI(DNI)) {
                $("#Err_Dni").html("DNI invalido");
            } else {
                $("#Err_Dni").html("");
            }

            //Verfico edad
            if (edad.length < 1) {
                $("#Err_Edad").html("No puede estar vacio");
            } else if (isNaN(edad)) {
                $("#Err_Edad").html("Solo puedes poner Numeros");
            } else {
                $("#Err_Edad").html("");
            }

        },
    });

});

function validarDNI(dni) {
    // Expresión regular para comprobar que el DNI tiene el formato correcto, que tenga exactamente 8 dígitos seguidos por una letra 
    var dniRegex = /^\d{8}[a-zA-Z]$/;

    // Si el formato no es válido
    if (!dniRegex.test(dni)) {
        return false; 
    }

    // Esta cadena contiene las letras de control correspondientes a los números del DNI.
    var letras = "TRWAGMYFPDXBNJZSQVHLCKE";

    // Extrae los primeros 8 dígitos del DNI
    var numero = dni.substr(0, 8);

    // Extrae la letra del DNI y la convierte a mayúscula
    var letraUsuario = dni.substr(8, 1).toUpperCase();

    // Calculamos la letra del DNI como si fuera un DNI real de España
    var letraCalculada = letras[numero % 23];

    // Miramos si la letra que a puesto el usuario es la que hemos calculado para saber si el dni es real
    return letraUsuario === letraCalculada;
}

//JavaScript
//cuando cargue la página
// document.addEventListener("DOMContentLoaded", function () {

// });