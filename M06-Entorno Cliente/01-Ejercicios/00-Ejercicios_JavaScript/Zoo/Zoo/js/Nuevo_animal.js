// ------------------------------------------ Mostramos la fecha actual ------------------------------------------
function Fecha_actual() {
    // Crear un objeto Date para obtener la fecha y hora actual
    let now = new Date();

    // Recoger los valores de las cajas
    let dia_semana = now.getDay(); // dia de la semana
    let dia = now.getDate(); // dia del mes
    let mes = now.getMonth(); // mes || getMonth() devuelve valores indexados (0-11) donde el 0 es enero y el 11 es diciembre.
    let any = now.getFullYear(); // año
    let hora = now.getHours(); // hora
    let minutos = now.getMinutes(); // minutos
    let segundos = now.getSeconds(); // segundos

    // Definir los nombres de los meses y días de la semana
    let mesos = ["Gener", "Febrer", "Març", "Abril", "Maig", "Juny", "Juliol", "Agost", "Setembre", "Octubre", "Novembre", "Desembre"];
    let dies = ["Dilluns", "Dimarts", "Dimecres", "Dijous", "Divendres", "Dissabte", "Diumenge"];

    // Formatear la fecha y hora final
    segundos = segundos < 10 ? "0" + segundos : segundos; // para que salgan los segundos como en el ordenador (01)

    let current_data = `Avui es ${dies[dia_semana - 1]} dia ${dia} de ${mesos[mes]} de ${any}, ${hora}:${minutos}:${segundos}`; // ${dies[dia - 1]} : nombre de el dia ||  ${dia} : numero del dia || ${mesos[mes]} : nombre del mes ...

    // Función para actualizar la fecha y mostrarla
    function actualizarCronometro() {
        document.getElementById("hora").innerHTML = current_data;
    }

    // Muestro la fecha actual
    actualizarCronometro();
}

// Actualiza la hora cada segundo
cronometro = setInterval(Fecha_actual, 1000);




//--------------------------------------------------- Mostramos el mensaje de las Cookies ---------------------------------------------------
// var cookieMessage = document.getElementById("cookie-message");
// var acceptButton = document.getElementById("accept-cookie");

// var formulario = document.getElementById("formulario");

// // Comprobar si la cookie de aceptación ya existe
// if (getCookie("usuari") !== "Acepteda la cookie") {
//     // Si no se ha aceptado la cookie
//     // Deshabilitar todos los elementos del formulario
//     const formElements = formulario.elements;
//     for (let i = 0; i < formElements.length; i++) {
//         formElements[i].disabled = true;
//     }

//     // Mostramos el mensaje de aceptar la cookie
//     cookieMessage.style.display = "block";
// }

// if (getCookie("contador")) {
//     checkCookie("contador");
// }

// // Si el usario a echo click a el boton de aceptar la cookie
// document.getElementById("accept-cookie").addEventListener("click", function () {
//     // Configurar una cookie que expire en un año
//     setCookie("usuari", "Acepteda la cookie", 365);

//     setCookie("contador", "1", 365);

//     // Habilito todos los elementos del formulario
//     const formElements = formulario.elements;
//     for (let i = 0; i < formElements.length; i++) {
//         formElements[i].disabled = false;
//     }

//     // Ocultar el mensaje de cookies
//     cookieMessage.style.display = "none";
// });

// // Si el usario a echo click a el boton de aceptar la cookie
// document.getElementById("rechazar-cookie").addEventListener("click", function () {

// });

// // Si el usario a echo click a el boton de aceptar la cookie
// document.getElementById("minim-cookie").addEventListener("click", function () {
//     // Configurar una cookie que expire en un año
//     setCookie("usuari", "Acepteda la cookie", 365);

//     // Habilito todos los elementos del formulario
//     const formElements = formulario.elements;
//     for (let i = 0; i < formElements.length; i++) {
//         formElements[i].disabled = false;
//     }

//     // Ocultar el mensaje de cookies
//     cookieMessage.style.display = "none";
// });




//--------------------------------------------------- Registro de un nuevo usuario ---------------------------------------------------
// Cuando cargue la pagina
document.addEventListener("DOMContentLoaded", function () {

    var continent = document.getElementById("continent");

    //array con las ciudades
    let continentes = ["Europa", "America", "Africa", "Asia", "Oceania"];

    //añadir las ciudades_origen al selector de el html
    for (let i = 0; i < continentes.length; i++) {
        let option = document.createElement("option");
        option.value = continentes[i];
        option.innerHTML = continentes[i];

        continent.appendChild(option);
    }

    // Cuando le demos al boton myBtn_registro
    document.getElementById("myBtn_registro").addEventListener("click", function () {
        //booleano para saber si estan bien las credenciales
        var flag_registro = true;

        // Obtener los valores del formulario de registro
        var Especie = document.getElementById("Especie").value;
        var any_naixement = document.getElementById("any_naixement").value;
        var Pais_de_origen = document.getElementById("Pais_origen").value;


        // Miramos si el radio "Ida" está seleccionado
        let mascle = document.getElementById("Mascle");

        // Obtenemos la fecha actual
        let fechaActual = new Date();

        // // Convertimos las fechas de ida y vuelta en objetos de fecha
        let any_naixement_Obj = new Date(any_naixement);

        //--------------------------Realizamos las validaciones aquí para el registro ---------------------------------

        // verifico la especie
        if (Especie.length < 1) {
            document.getElementById("errorEspecie").innerHTML = "No puede estar vacio";
            document.getElementById("Especie").value = "";
            flag_registro = false;
        } else if (!(isNaN(Especie))) {
            document.getElementById("errorEspecie").innerHTML = "Solo puede contener letras";
            document.getElementById("Especie").value = "";
            flag_registro = false;
            
        }else if (Especie.length > 50) {
            document.getElementById("errorEspecie").innerHTML = "NO puede contener mas de 50 caracteres";
            document.getElementById("Especie").value = "";
            flag_registro = false;
        } else {
            document.getElementById("errorEspecie").innerHTML = "";
        }

        // verifico el any de naicement
        if (any_naixement == "") {
            // La fecha de ida esta en blanco
            document.getElementById("errorAny_naixement").innerHTML = "La fecha de ida no puede estar en blanco";
            document.getElementById("any_naixement").value = "";
            flag_reserva = false;
        } else if (any_naixement_Obj.getFullYear() < (fechaActual.getFullYear() -50 )) {
            // La fecha de ida es mallor a 6 messes
            document.getElementById("errorAny_naixement").innerHTML = "La fecha de ida no puede ser 50 años del pasado";
            document.getElementById("any_naixement").value = "";
            flag_reserva = false;
        } else if (any_naixement_Obj > fechaActual) {
            // La fecha de ida es del pasado
            document.getElementById("errorAny_naixement").innerHTML = "La fecha de ida no puede ser del futuro";
            document.getElementById("any_naixement").value = "";
            flag_reserva = false;
        } else {
            document.getElementById("errorAny_naixement").innerHTML = "";
        }

        // verifico el Pais de origen
        if (Pais_de_origen.length < 1) {
            document.getElementById("errorPais_origen").innerHTML = "No puede estar vacio";
            document.getElementById("Pais_origen").value = "";
            flag_registro = false;
        } else if (Pais_de_origen.length > 30) {
            document.getElementById("errorPais_origen").innerHTML = "No puede tener más de 30 caracteres";
            document.getElementById("Pais_origen").value = "";
            flag_registro = false;
        } else {
            document.getElementById("errorPais_origen").innerHTML = "";
        }

        
        // si las credenciales están bien
        if (flag_registro) {

            // verificamos si es un mascle o una femella
            sexe_animal="";
            if(mascle.checked){
                sexe_animal="mascle";
            }else{
                sexe_animal="femella";
            }

            // creamos el Objeto que le pasaremos a la consulta
            const Animal = {
                especie: Especie,
                sexe: sexe_animal,
                any_naixement: any_naixement,
                pais: Pais_de_origen,
                continent: continent
            };

            // Enviar datos al servidor utilizando fetch
            fetch('http://localhost:3001/zoo/register', {
                method: "POST",
                headers: {
                    "Content-type": "application/json;charset=UTF-8"
                },
                body: JSON.stringify(Animal)
            })
                //Manejo de la Respuesta del Servidor
                .then(response => response.json())
                .then(data => {
                    // Mostramos el menssaje que nos a enviado el servidor
                    alert(data.message);
                })
                // Si no se a podido conectar al servidor
                .catch(error => {
                    console.error('Error al realizar la solicitud:', error);
                });
        } else { // si alguna credencial está mal
            event.preventDefault();
        }
    });

});

//--------------------------------------------------- Funciones Cookies ---------------------------------------------------
// funcion para crear una cookie
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
};

//funcion para leer una cookie
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
};

//funcion para chekear si una cookie esta creada
function checkCookie_cname(getCookie) {
    let cookie = getCookie(cname);
    if (cookie != "") {
        // si existe
        alert("Esta creada");
    } else {
        //si no existe
        setCookie(cname, cookie, 1);
    }
}

//funcion para ver cuantas veces a visitado el usuario una paguina
function checkCookie(cname) {
    let cookie = getCookie(cname);
    if (cookie != "") {
        // si existe
        cookie++;

        console.log("contador=" + cookie);
        document.cookie = "contador=" + cookie;
    } else {
        //si no existe
        document.cookie = "contador= 1";
    }
}
