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

// Utiliza los valores como desees en la página Vuelo.html
console.log("Origen: " + origen);
console.log("Destino: " + destino);
console.log("Fecha de Ida: " + ida);
console.log("Fecha de Vuelta: " + vuelta);
console.log("Número de Pasajeros: " + pasajeros);
console.log("Número de Adultos: " + adultos);
console.log("Número de Niños: " + ninos);
console.log("Número de Bebés: " + bebes);