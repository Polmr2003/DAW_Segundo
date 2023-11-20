/*------------------------------------------------------------------------------------*/
/*EJERCICIO 2*/
let exercici2 = []; //al principi de tot, quan carrega la pàgina, aquest array està buit

// Evento para validar el Input donde se introducen los valores
document.getElementById("introducirValores").addEventListener("blur", function() {
   
    // VARIABLES
    let valores = document.getElementById("introducirValores").value;
    let opcionesSelect = document.getElementById("opciones").value; //agafo id del select
    
    //comprovacions
    console.log(valores);
    console.log(opcionesSelect);
   

    // Validaciones
    if (valores >=-99 && valores<=99) { //si miro valores.length<3 els negatius de 2 xifres donarien que són de 3 xifres
        document.getElementById("error").innerHTML = "Tiene que tener mas de 3 valores";
        document.getElementById("introducirValores").value = "";
    }else if (isNaN(valores)) { 
        document.getElementById("error").innerHTML = "Solamente tiene que tener números";
        document.getElementById("introducirValores").value = "";
    }else{
        document.getElementById("error").innerHTML = "";

        if (opcionesSelect =="inicio") {
            exercici2.unshift(valores);
        }else{
            exercici2.push(valores);
        }
    }

    // Mostrem l'Array de  dues maneres
    console.log(exercici2);
    document.getElementById("valoresArray").innerHTML=exercici2;

})
