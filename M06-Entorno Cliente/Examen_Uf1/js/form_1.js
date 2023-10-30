// Booleano para saber si las credenciales estan bien
let flag = false;

// variable que contiene el numero de articulos
let num_article;

//cuando cargue la pagina
document.addEventListener("DOMContentLoaded", function () {
    // ------------------------------------------ Añadimos los tipos de articulos ------------------------------------------
    // Array con el nombre de los arituclos
    let article = ["Sports clothes", "Sneakers"];

    // Selector con los arituclos
    let select_article = document.getElementById("Type_article");

    // Añadimos el tipo de articulo al selector 
    for (let i = 0; i < article.length; i++) {
        let option = document.createElement("option");
        option.value = article[i];
        option.innerHTML = article[i];
        option.id = article[i];

        select_article.appendChild(option);
    }

    // Cuando pongamos valores al numero de articulos
    document.getElementById("num_article").addEventListener("input", function () {
        // ------------------------------------------ Validaciones total articles  ------------------------------------------
        num_article = document.getElementById("num_article").value;

        if (num_article < 1) {
            // Si el numero de articulos es menor a 0
            document.getElementById("Error_num_art").innerHTML = "El numero de articulos no puede ser menor a 0";
            flag = false;
        } else if (num_article == 0) {
            // Si el numero de ariticulos tiene decimal
            document.getElementById("Error_num_art").innerHTML = "El numero de articulos no puede ser menor a 0";
            flag = false;
        } else {
            document.getElementById("Error_num_art").innerHTML = "";
            flag = true;
        }

        // ------------------------------------------ Mostramos el boton si los campos estan bien ------------------------------------------
        // Variable con el boton
        let boton = document.getElementById("MyBtn_art");

        if (flag == false) {
            // si los campos estan mal
            boton.style.display = "none";
        } else {
            // si los campos estan bien
            boton.style.display = "block";
        }
    });

    //cuando le demos al boton
    document.getElementById("MyBtn_art").addEventListener("click", function () {
        // Miramos que articulo esta seleccionado
        let select_article_val = document.getElementById("Type_article").value;

        // Crear una URL con parámetros para pasar los datos
        const url = `Form2.html?select=${select_article_val}&num_article=${num_article}`;

        // Redirigir a la página Form2.html con los datos en la URL
        window.location.href = url;
    });

    // ------------------------------------------ Mostramos la fecha actual ------------------------------------------
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

        // Muestro la fecha actual
        actualizarCronometro();
    }

    // Actualiza la hora cada segundo
    cronometro = setInterval(Fecha_actual, 1000);

});
