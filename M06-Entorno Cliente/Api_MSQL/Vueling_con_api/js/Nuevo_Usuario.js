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
    // Cuando le demos al boton myBtn_registro
    document.getElementById("myBtn_registro").addEventListener("click", function () {
        //booleano para saber si estan bien las credenciales
        var flag_registro = true;

        // Obtener los valores del formulario de registro
        var nombre = document.getElementById("new_nombre").value;
        var apellidos = document.getElementById("new_apellido").value;
        var gmail = document.getElementById("new_gmail").value;
        var usuari = document.getElementById("new_usuari").value;
        var password = document.getElementById("new_password").value;

        //--------------------------Realizamos las validaciones aquí para el registro ---------------------------------

        // verifico el nombre
        if (nombre.length < 1) {
            document.getElementById("errorName").innerHTML = "No puede estar vacio";
            document.getElementById("new_nombre").value = "";
            flag_registro = false;
        } else if (!(isNaN(nombre))) {
            document.getElementById("errorName").innerHTML = "Solo puede contener letras";
            document.getElementById("new_nombre").value = "";
            flag_registro = false;
        } else {
            document.getElementById("errorName").innerHTML = "";
        }

        // verifico el apellido
        if (apellidos.length < 1) {
            document.getElementById("errorSubname").innerHTML = "No puede estar vacio";
            document.getElementById("new_apellido").value = "";
            flag_registro = false;
        } else if (!(isNaN(apellidos))) {
            document.getElementById("errorSubname").innerHTML = "Solo puede contener letras";
            document.getElementById("new_apellido").value = "";
            flag_registro = false;
        } else {
            document.getElementById("errorSubname").innerHTML = "";
        }

        // verifico el gmail
        if (gmail.length < 1) {
            document.getElementById("errorGmail").innerHTML = "No puede estar vacio";
            document.getElementById("new_gmail").value = "";
            flag_registro = false;
        } else if (! /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{3,10})+$/.test(gmail)) { //Empezar por el identificador o nombre del usuario ^\w+([.-_+]?\w+)*, Seguido por el símbolo de la arroba @, Por último, el nombre del dominio del correo \w+([.-]?\w+)*(\.\w{2,10})+$, la largaria minima despues de el punto de el arroba es: \w{3,10})
            document.getElementById("errorGmail").innerHTML = "Pon un formato de correo valido";
            document.getElementById("new_gmail").value = "";
            flag_registro = false;
        } else {
            document.getElementById("errorGmail").innerHTML = "";
        }

        // verifico el nombre de usuario
        if (usuari.length < 1) {
            document.getElementById("errorUsuari").innerHTML = "No puede estar vacio";
            document.getElementById("new_usuari").value = "";
            flag_registro = false;
        } else if (usuari.length > 10) {
            document.getElementById("errorUsuari").innerHTML = "No puede tener más de 10 caracteres";
            document.getElementById("new_usuari").value = "";
            flag_registro = false;
        } else {
            document.getElementById("errorUsuari").innerHTML = "";
        }

        // verifico la contraseña
        if (password.length < 1) {
            document.getElementById("errorPassword").innerHTML = "No puede estar vacio";
            document.getElementById("new_password").value = "";
            flag_registro = false;
        } else if (password.length < 5) {
            document.getElementById("errorPassword").innerHTML = "Minimo 5 caracteres";
            document.getElementById("new_password").value = "";
            flag_registro = false;
        } else {
            document.getElementById("errorPassword").innerHTML = "";
        }


        // si las credenciales están bien
        if (flag_registro) {

            // Creación de un objeto userData
            const userData = {
                nom: nombre,
                cognom: apellidos,
                gmail: gmail,
                password: password,
                usuari: usuari
            };

            // Enviar datos al servidor utilizando fetch
            fetch('http://localhost:3000/vueling/register', {
                method: "POST",
                headers: {
                    "Content-type": "application/json;charset=UTF-8"
                },
                body: JSON.stringify(userData)
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
