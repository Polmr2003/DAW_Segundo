// VARIABLES
const textoarea = document.getElementById("texto");
const contadorVocales = document.getElementById("contadorVocales");
const longitudTexto = document.getElementById("longitudTexto");
const contadorPalabras = document.getElementById("contadorPalabras");
textoarea.value="";//quan carreguem el textarea estarà net

textoarea.addEventListener('keyup', actualizarContenedores); //fem servir l'esdeveniment keyup o input

// Funcion para alctualizar los Contadores
function actualizarContenedores(){

    const texto =textoarea.value;
    const vocales =contarVocales(texto);
    const palabras =contarPalabras(texto);
    const caracteres =texto.length;

    contadorVocales.innerHTML = vocales;
    longitudTexto.innerHTML = caracteres;
    contadorPalabras.innerHTML = palabras;
    
}

// Funcion para contar las Vocales
function contarVocales(texto) {
    const totalVocales = texto.match(/[aeiouàáèéíòóú]/gi); //hem de ficar totes les vocals en català
   
    return totalVocales ? totalVocales.length : 0;
}

// Funcion para contar las Palabras
function contarPalabras(texto) {

    let totalParaules =texto.match(/[ ]/g);

    return totalParaules ? totalParaules.length :0;
    
  
}