// Este código se ejecuta una vez que el documento HTML ha sido completamente cargado y está listo para ser manipulado.
$(document).ready(function () {
    //array con las ciudades
    let ciutats = ["Barcelona", "Girona", "Tarragona", "Lleida", "Valencia"];

    //selector en el HTML donde vamos a poner las ciudades
    let ciudades_origen = $("#ciudades");

    //añadir las ciudades al selector en el HTML
    for (let i = 0; i < ciutats.length; i++) {
        ciudades_origen.append($("<li>").text(ciutats[i]));
    }

    // Añadir un elemento al final de la lista
    $("#end_list").click(function () {
        let nuevaCiudad = prompt("Introduce el nombre de la ciudad:");
        if (nuevaCiudad) {
            ciudades_origen.append($("<li>").text(nuevaCiudad));
        }
    });

    // Añadir un elemento al comienzo de la lista
    $("#start_list").click(function () {
        let nuevaCiudad = prompt("Introduce el nombre de la ciudad:");
        if (nuevaCiudad) {
            ciudades_origen.prepend($("<li>").text(nuevaCiudad));
        }
    });

    // Eliminar el último elemento de la lista
    $("#del_end").click(function () {
        ciudades_origen.children("li:last").remove();
    });

    // Eliminar el primer y segundo elemento de la lista
    $("#del_first_and_second").click(function () {
        ciudades_origen.children("li:first").remove();
        ciudades_origen.children("li:first").remove();
    });
});
