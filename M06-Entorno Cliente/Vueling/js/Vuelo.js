// Obtener los parámetros de la URL
const urlParams = new URLSearchParams(window.location.search);

// Obtenemos los valores de los parámetros
const origen = urlParams.get("origen");
const destino = urlParams.get("destino");
const ida = urlParams.get("ida");
const vuelta = urlParams.get("vuelta");
const pasajeros = urlParams.get("pasajeros");
const adultos = urlParams.get("adultos");
const ninos = urlParams.get("nenos");
const bebes = urlParams.get("bebes");

// Cuando cargue la pagina
document.addEventListener("DOMContentLoaded", function () {
    // Mostrar los parametros de la busqueda en los vuelos
    document.getElementById("Origen").innerHTML = origen;
    document.getElementById("Destino").innerHTML = destino;
    document.getElementById("Ida").innerHTML = ida;
    document.getElementById("Adult").innerHTML = adultos;
    document.getElementById("Nen").innerHTML = ninos;
    document.getElementById("Beb").innerHTML = bebes;


    // Miramos si hay bebes o niños
    let ul_Nin_beb = document.getElementById("ul_Nin_beb");
    let li_nin = document.getElementById("li_nin");
    let li_beb = document.getElementById("li_beb");

    if (ninos == "" && bebes == "") {
        // si no hay bebes ni niños
        ul_Nin_beb.style.display = "none"; // ocultamos el ul que contiene el numero de bebes i niños
    } else if (ninos == "") {
        // si no hay niños
        li_nin.style.display = "none"; // ocultamos el li que contiene el numero de niños
    } else if (bebes == "") {
        // si no hay bebes
        li_beb.style.display = "none"; // ocultamos el li que contiene el numero de bebes
    }


    // Miramos si el vuelo es de ida i vuelta
    let info_fecha_vuelta = document.getElementById("info_vue");
    let div_posible_fecha_vuelta = document.getElementById("div_pos_fecha_vue");


    if (vuelta == "") {
        // Si la fecha de vuelta esta vacia (El vuelo es solo de ida)
        info_fecha_vuelta.style.display = "none"; // escondemos la frase con la fecha de vuelta
        div_posible_fecha_vuelta.style.display = "none"; // escondemos la frase con la hora de vuelta
    }

    // Ponemos las fechas de el vuelo 1 con randoms
    let hora_ida_1 = Math.floor(Math.random() * (23 - 0 + 1) + 0); //Math.floor(Math.random() * (max - min + 1) + min) || Math.floor para redondear un numero , Math.random para hacer un random con decimales
    let minutos_ida_1 = Math.floor(Math.random() * (59 - 1 + 1) + 1); //Math.floor(Math.random() * (max - min + 1) + min);

    let hora_vue_1 = Math.floor(Math.random() * (23 - 0 + 1) + 0); //Math.floor(Math.random() * (max - min + 1) + min);
    let minutos_vue_1 = Math.floor(Math.random() * (59 - 1 + 1) + 1); //Math.floor(Math.random() * (max - min + 1) + min);

    // Ponemos las fechas de el vuelo 2 con randoms
    let hora_ida_2 = Math.floor(Math.random() * (23 - 0 + 1) + 0); //Math.floor(Math.random() * (max - min + 1) + min) || Math.floor para redondear un numero , Math.random para hacer un random con decimales
    let minutos_ida_2 = Math.floor(Math.random() * (59 - 1 + 1) + 1); //Math.floor(Math.random() * (max - min + 1) + min);

    let hora_vue_2 = Math.floor(Math.random() * (23 - 0 + 1) + 0); //Math.floor(Math.random() * (max - min + 1) + min);
    let minutos_vue_2 = Math.floor(Math.random() * (59 - 1 + 1) + 1); //Math.floor(Math.random() * (max - min + 1) + min);

    //mostramos la hora de los vuelos
    document.getElementById("Hora_ida_1").innerHTML = hora_ida_1 + ":" + minutos_ida_1;
    document.getElementById("Hora_vue_1").innerHTML = hora_vue_1 + ":" + minutos_vue_1;

    document.getElementById("Hora_ida_2").innerHTML = hora_ida_2 + ":" + minutos_ida_2;
    document.getElementById("Hora_vue_2").innerHTML = hora_vue_2 + ":" + minutos_vue_2;


    // Ponemos el precio
    let precio = (adultos * 100) + (ninos * 50) + (bebes * 25); // Por adulto son 100€, por niños son 50€ i por bebes 25€

    document.getElementById("precio_vuelo").innerHTML = precio + " Euros";
});