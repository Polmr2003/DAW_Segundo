var numero = 3;
let nom = "Sara";
const lletra = "M";

alert(numero);
console.log(nom);

if (numero == 3) {
    alert("true")
} else {
    alert("false")
}

let result = numero == 3 ? "Es un 3" : "es otro numero";

var i = 0;

do {
    i++;
} while (!(i = 4));

//console.log
let misstage = "Benviguts";
console.log(misstage);

//NaN = Not a number
alert("No es un numero" / 2);

//pedir cosas al usuario
age = prompt("Dime la edad", 100); //100 es un valor que pondra por defecto

//confirmar continuar
let resul;
resul = confirm("Estas seuro que quieres continuar?")

//conversions de tipus
let number = "1"; //1 es un string
let sum = Number(number) + 21;

//funciones
function shawMessage_1() {
    let misstage = "hello"; //ambit local : dins de la funcio
    alert(misstage);
}

function shawMessage_2() {
    let misstage = "hello"; //ambit local : dins de la funcio
    return misstage;;
}

function shawMessage_3(misstage) {
    return misstage + "A tots";

}

//funciones anonimas
let salutacions = function () {
    return "hola";
}

alert(salutacions());

//funciones fletxa
let salutacion = ()=>{
    return "Hola array function";
}

//document
document.getElementById("hello").innerHTML="hola a tots"; //cojemos el id que tenga de nombre hello en el hmtl i lo machacamos el contenido que tenga esta id con hola a tots