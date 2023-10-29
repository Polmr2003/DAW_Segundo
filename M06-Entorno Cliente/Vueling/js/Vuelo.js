// Obtener los parámetros de la URL
const urlParams = new URLSearchParams(window.location.search);

// Obtener los valores de los parámetros
const origen = urlParams.get("origen");
const destino = urlParams.get("destino");
const ida = urlParams.get("ida");
const vuelta = urlParams.get("vuelta");
const pasajeros = urlParams.get("pasajeros");
const adultos = urlParams.get("adultos");
const ninos = urlParams.get("nenos");
const bebes = urlParams.get("bebes");

