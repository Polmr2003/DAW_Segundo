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
            if (!isNaN(texto_input)) {
                $("#Err_Nombre").html("Solo puedes poner Letras");
            }else{
                $("#Err_Nombre").html("");
            }

            // Verifico dni
            if (validarDNI(DNI)) {
                $("#Err_Dni").html("DNI invalido");
            }else{
                $("#Err_Dni").html("");
            }

            //Verfico edad
            if (isNaN(texto_input)) {
                $("#Err_Nombre").html("Solo puedes poner Letras");
            }else{
                $("#Err_Nombre").html("");
            }

        },
    });

});

function validarDNI(dni) {
    // Expresión regular para comprobar que el DNI tiene el formato correcto
    var dniRegex = /^\d{8}[a-zA-Z]$/;

    if (!dniRegex.test(dni)) {
        return false; // El formato no es válido
    }

    var letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    var numero = dni.substr(0, 8);
    var letraUsuario = dni.substr(8, 1).toUpperCase();
    var letraCalculada = letras[numero % 23];

    return letraUsuario === letraCalculada;
}

//JavaScript
//cuando cargue la página
// document.addEventListener("DOMContentLoaded", function () {

// });