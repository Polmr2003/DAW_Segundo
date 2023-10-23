// Leer la información del vuelo desde localStorage
const vueloJSON = localStorage.getItem("vuelo");

if (vueloJSON) {
    // Convertir el JSON del vuelo de nuevo a un objeto (en este caso, una instancia de Viatge)
    const vuelo = JSON.parse(vueloJSON);

    // Realizar alguna acción con la información del vuelo, como mostrarla en la consola
    if (vuelo.data_vuelta) {
        console.log(vuelo.printing_ida_vuelta());
    } else {
        console.log(vuelo.printing_ida());
    }
} else {
    console.log("No se encontró información del vuelo.");
}

//selectores en el html que vamos a poner las ciudades
let obj_vuelo = document.getElementById("obj_vuelo");

//añadir las ciudades_origen al selector de el html
for (let i = 0; i < obj_vuelo.length; i++) {
    let input = document.createElement("input");
    option.value = ciutats[i];
    option.innerHTML = ciutats[i];

    ciudades_origen.appendChild(option);
}