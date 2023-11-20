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
            // cambiamos el color de fondo
            $(this).css("background-color", "yellow");

            // recoger el valor de un input
            let texto_input = $("#texto_input").val();
            alert(texto_input);
        },

        // mouseleave = onblur || Onblur se activa cuando el usuario retira el foco de un elemento de la página
        mouseleave: function () {
            $(this).css("background-color", "lightblue");
        }

    });

    // Recoger el texto
    let texto = $("#texto").html();
    console.log(texto);

    // Sobreescribir el texto
    $("#texto").html("hola");

});

//JavaScript
//cuando cargue la página
// document.addEventListener("DOMContentLoaded", function () {

// });