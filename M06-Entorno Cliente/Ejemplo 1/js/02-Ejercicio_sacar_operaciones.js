//____________________________________________________________________Ejercicio2________________________________________________________________________
/*
El programa cojera 2 numeros i validara que son numeros i luego sacara la suma, resta, division, multiplicacion. Todo esto dentro de una funcion
*/


//Funciones
//------------------
function suma(num1, num2){
    return Number (num1) + Number (num2);
}

function resta(num1, num2){
    return num1 - num2;
}

function multiplicacion(num1, num2){
    return num1 * num2;
}

function division(num1, num2){
    return num1 / num2;
}


//pedir cosas al usuario
//----------------------------
num1 = prompt("Pon un numero");
num2 = prompt("Pon el segundo numero");

//verificar que son numeros
//-------------------------------
if(!(isNaN(num1) || isNaN(num2))){
    suma_numeros=suma(num1, num2); 
    resta_numeros=resta(num1, num2); 
    division_numeros=division(num1, num2); 
    multiplicacion_numeros=multiplicacion(num1, num2); 

    alert("La suma es:" + suma_numeros + ", La resta es: "+ resta_numeros + ", La division es: "+ division_numeros + ", La multiplicacion es: "+ multiplicacion_numeros );

}else{
    console.log("Uno o los dos valores que as introducido estan mal");
}

