//____________________________________________________________________Ejercicio1________________________________________________________________________
/*
Programa demana un numero, un cop itroduit calcula el factorial
*/

numero = prompt("Dime un numero enter:",);

if (!isNaN(numero)) {
    let producto  = 1;
    for (let i = 1; i <= numero; i++) {
        producto *= i;
    }
    alert(producto);
} else {
    alert("No es un numero");
}