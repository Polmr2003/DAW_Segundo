
//cuando cargue la paguina
document.addEventListener("DOMContentLoaded", function () {
    //cuando le de click al boton con al id myBtn
    document.getElementById("myBtn").addEventListener("click", function () {

        //recojemos el valor de las cajas
        let temperaturas=[];// creamos el array
        for (let i = 1; i <= 10; i++) {
            if(!(isNaN(document.getElementById("temp"+i).value))){ // si es un numero
                temperaturas.push(document.getElementById("temp"+i).value);//hacemos un array push para poner los valores en el array
            }else{ //si no es un numero
                document.getElementById("temp"+i).value="";//ponermos la caja con el valor vacio
                document.getElementById("error"+i).hidden=false; // quitamos el hidden (oculto) el mensaje de error

                // alert("Hay que poner numeros");
            }
        }

        let contador=[]; // contendra las repeticiones de cada temperatura
        let uniques=[]; // contendra las teperaturas sin repetir
        //recorremos el array
        for (let i = 1; i <=temperaturas.length; i++) {
            if(uniques.includes(temperaturas[i])){ //si contiene la temperatura
                //alert("ya tengo la temperatura");
                let posicion=uniques.indexOf(temperaturas[i]);
                contador[posicion]+=1;
            }else{ //si no contiene esa temperatura (es nueva)
                uniques.push(temperaturas[i]);
                contador.push(1);
            }
            
        }

        console.log(temperaturas);//vemos si nos a guardado bien las temperaturas en el array
        console.log(contador);//vemos si nos a guardado bien 
        console.log(uniques);//vemos si nos a guardado bien
    });
});