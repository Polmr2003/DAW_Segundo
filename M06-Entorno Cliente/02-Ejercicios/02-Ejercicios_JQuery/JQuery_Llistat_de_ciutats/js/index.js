// Este código se ejecuta una vez que el documento HTML ha sido completamente cargado y está listo para ser manipulado.
$(document).ready(function () {
    //array con las ciudades
    let ciutats = ["Barcelona", "Girona", "Tarragona", "Lleida", "Valencia"];

    //selector en el HTML donde vamos a poner las ciudades
    let ciudades = $("#ciudades");

    //añadir las ciudades al selector en el HTML
    let posicion_ciudad = 0;

    // Añadir un elemento al final de la lista, con append
    $("#end_list").click(function () {
        // let nuevaCiudad = prompt("Introduce el nombre de la ciudad:");
        // if (nuevaCiudad) {
        //     ciudades_origen.prepend($("<li>").text(nuevaCiudad));
        // }

        // verficamos si aun hay ciudades en el array
        if (posicion_ciudad < ciutats.length) {
            // si aun no se an añadido todas las ciudades
            ciudades.append($("<li>").text(ciutats[posicion_ciudad]));
            posicion_ciudad++;
        }
    });

    // Añadir un elemento al comienzo de la lista, con prepend
    $("#start_list").click(function () {
        // verficamos si aun hay ciudades en el array
        if (posicion_ciudad < ciutats.length) {
            // si aun no se an añadido todas las ciudades
            ciudades.prepend($("<li>").text(ciutats[posicion_ciudad]));
            posicion_ciudad++;
        }
    });

    // Eliminar el último elemento de la lista
    $("#del_end").click(function () {
        ciudades.children("li:last").remove();
    });

    // Eliminar el primer y segundo elemento de la lista
    $("#del_first_and_second").click(function () {
        ciudades.children("li:first").remove();
        ciudades.children("li:first").remove();
    });
});
