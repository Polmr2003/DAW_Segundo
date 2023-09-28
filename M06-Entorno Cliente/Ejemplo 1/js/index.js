/* var numero = 3;
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
let salutacion = () => {
    return "Hola array function";
}

*/
//document
document.getElementById("hello").innerHTML = "hola a tots"; //cojemos el id que tenga de nombre hello en el hmtl i lo machacamos el contenido que tenga esta id con hola a tots

let valors = document.getElementById("h2");//ahora lo hacemos pero con una variable
valors.innerHTML = "h2";

let valors_array = document.getElementsByTagName("h2");//es un array
console.log(valors_array([1].innerHTML))

let classe = document.getElementsByClassName("intro");
console.log(classe);

console.log(document.querySelector("#hello").innerHTML); //accedo al id
console.log(document.querySelector("h2.intro").innerHTML); //accedo la classe
console.log(document.querySelectorAll(".intro")); //accedo a todos los tags con la classe intro


//acceso a los atributos
console.log(document.getElementById("link").href);

//cambio de atributo
document.getElementById("link").href = "http://proven.cat";

//manera alternativa de incrustar una pagina
document.write("hello hello"); // no respeta lo que hubiera antes, te lo mete a saco donde quepa

//recojo un valor de un formulario, le pongo una condicion para hacerlo que es que clicke
document.getElementById("clic").addEventListener("click", function () {

    let my_name = document.getElementById("nom").value;

    if (my_name == "David") {
        alert("HOLA DAVID!!");

    };

});

//recojer el contenido de las cajas
let MyNum=document.getElementById("myNum").value; 
let MyLle=document.getElementById("myLle").value; 

//verificar el contenido de las cajas
if(MyNum.lenght!=8){
    document.getElementById("ErrorNum").innerHTML="Longitud incorrecta";
    document.getElementById("myNum").value=""; 
}else if(isNaN(MyNum)){
    document.getElementById("ErrorNum").innerHTML="Solo se aceptan numeros";
    document.getElementById("myNum").value=""; 
}