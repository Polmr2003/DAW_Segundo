// ------------------------------------------ Recojemos los valores de el form anterior ------------------------------------------
// Obtener los parámetros de la URL
const urlParams = new URLSearchParams(window.location.search);

// Obtenemos los valores de los parámetros
const article = urlParams.get("select");
const num_article = urlParams.get("num_article");


let div_Clothes = document.getElementById("div_clothes");
let div_Sneakers = document.getElementById("div_sneakers");

// ------------------------------------------ Mostramos la informacion de el articulo seleccionado ------------------------------------------
// Array con los productos de clothes
let products_clothes = ["Chicago Bulls T-shirt", "Chicago Bulls pants"];

// Array con los productos de Sneakers
let products_Sneakers = ["Air Jordan sneakers", "Nike Air sneakers"];


if (article == "Sports clothes") {
    // Si el articulo es Sports clothes, mostramos el div con su informacion
    div_Clothes.style.display = "block";

    // -------- Productos de Sports clothes --------
    // Div donde estaran los productos
    let div_product_clothes = document.getElementById("div_product_clothes");

    // Añadimos el prodcuto al div
    for (let i = 0; i < products_clothes.length; i++) {
        // Input de los productos
        let input = document.createElement("input");
        input.type = "text";
        input.value = products_clothes[i];
        input.innerHTML = products_clothes[i];
        input.id = products_clothes[i];

        //chekbox para seleccionar el producto
        let input_chekbox = document.createElement("input");
        input_chekbox.type = "checkbox";
        input_chekbox.id = products_clothes[i] + "_chekbox";

        // Salto de linea
        let line_break = document.createElement("br");

        // Añadimos el input al div nbsp
        div_product_clothes.appendChild(input);
        div_product_clothes.appendChild(input_chekbox);
        div_product_clothes.appendChild(line_break);
    }


} else if (article == "Sneakers") {
    // Si el articulo Sneakers, mostramos el div con su informacion
    div_Sneakers.style.display = "block";

    // -------- Productos de Sneakers --------
    // Div donde estaran los productos
    let div_product_sneakers = document.getElementById("div_product_sneakers");

    // Añadimos el prodcuto al div
    for (let i = 0; i < prodcuts.length; i++) {
        // Input de los productos
        let input = document.createElement("input");
        input.type = "text";
        input.value = products_Sneakers[i];
        input.innerHTML = products_Sneakers[i];
        input.id = products_Sneakers[i];

        //chekbox para seleccionar el producto
        let input_chekbox = document.createElement("input");
        input_chekbox.type = "checkbox";
        input_chekbox.id = products_Sneakers[i] + "_chekbox";

        // Salto de linea
        let line_break = document.createElement("br");

        // Añadimos el input al div
        div_product_sneakers.appendChild(input);
        div_product_sneakers.appendChild(input_chekbox);
        div_product_sneakers.appendChild(line_break);
    }

}

// ------------------------------------------ Miramos a que boton clicka el usuario ------------------------------------------
//cuando le demos al Prepare_invoice
document.getElementById("prepare_invoice").addEventListener("click", function () {
    // Variable con el contador de los productos seleccionados
    let cont = 0;

    if (article == "Sports clothes") {
        //si estamos en el prodcuto article
        for (let i = 0; i < products_clothes.length; i++) {
            //miramos cuantos productos estan marcados en su checkbox
            let product = document.getElementById(products_clothes[i] + "_chekbox").checked;

            if (product) {
                //si esta marcado añadimos un uno a el contador
                cont++;
            }
        }

        if (cont > num_article) {
            document.getElementById("errors").innerHTML = "no puedes poner mas productos que el numero que pusiste en la pagina anterior";
        } else if (cont < num_article) {
            document.getElementById("errors").innerHTML = "no puedes poner menos productos que el numero que pusiste en la pagina anterior";
        } else {
            document.getElementById("errors").innerHTML = "";
        }

    }

    else if (article == "Sneakers") {
        //si estamos en el prodcuto article
        for (let i = 0; i < products_Sneakers.length; i++) {
            //miramos cuantos productos estan marcados en su checkbox
            let product = document.getElementById(products_Sneakers[i] + "_chekbox").checked;

            if (product) {
                //si esta marcado añadimos un uno a el contador
                cont++;
            }
        }

        if (cont > num_article) {
            document.getElementById("errors").innerHTML = "No puedes poner mas productos que el numero que pusiste en la pagina anterior";
        } else if (cont < num_article) {
            document.getElementById("errors").innerHTML = "No puedes poner menos productos que el numero que pusiste en la pagina anterior";
        } else {
            document.getElementById("errors").innerHTML = "";
        }
    }

});


//cuando le demos al boton Cancel
document.getElementById("cancel").addEventListener("click", function () {
    // Redirigimos a la página index.html
    window.location.href = "./index.html";
});

// ------------------------------------------ Mostramos la fecha actual ------------------------------------------
// Cuando cargemos la paguina
document.addEventListener("DOMContentLoaded", function () {
    //creamos una funcion para ver la fecha actual
    function Fecha_actual() {
        // Crear un objeto Date para obtener la fecha y hora actual
        let now = new Date();

        // Recoger los valores de las cajas
        let dia = now.getDay();
        let mes = now.getMonth();
        let año = now.getFullYear();
        let hora = now.getHours();
        let minutos = now.getMinutes();
        let segundos = now.getSeconds();

        // Definir los nombres de los meses y días de la semana
        let mesos = ["Gener", "Febrer", "Març", "Abril", "Maig", "Juny", "Juliol", "Agost", "Setembre", "Octubre", "Novembre", "Desembre"];
        let dies = ["Dilluns", "Dimarts", "Dimecres", "Dijous", "Divendres", "Dissabte", "Diumenge"];

        // Formatear la fecha y hora final
        let current_data = `Avui es ${dies[dia - 1]} dia ${dia} de ${mesos[mes]} de ${año}, ${hora}:${minutos}:${segundos}`; // ${dies[dia - 1]} : nombre de el dia ||  ${dia} : numero del dia || ${mesos[mes]} : nombre del mes ...

        // Función para actualizar la fecha y mostrarla
        function actualizarCronometro() {
            document.getElementById("hora").innerHTML = current_data;
        }

        // Actualizamos la fecha actual
        actualizarCronometro();
    }

    // Actualiza la hora cada segundo
    cronometro = setInterval(Fecha_actual, 1000);

});