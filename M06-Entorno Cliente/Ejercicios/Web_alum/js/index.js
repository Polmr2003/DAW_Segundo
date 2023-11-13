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
var cookieMessage = document.getElementById("cookie-message");
var acceptButton = document.getElementById("accept-cookie");

var formulario = document.getElementById("formulario");

// Comprobar si la cookie de aceptación ya existe
if (getCookie("cookieAccepted") !== "true") {
    // Si no se ha aceptado la cookie
    // Deshabilitar todos los elementos del formulario
    const formElements = formulario.elements;
    for (let i = 0; i < formElements.length; i++) {
        formElements[i].disabled = true;
    }

    // Mostramos el mensaje de aceptar la cookie
    cookieMessage.style.display = "block";
}

// Si el usario a echo click a el boton de aceptar la cookie
acceptButton.addEventListener("click", function () {
    // Configurar una cookie que expire en una semana
    setCookie("cookieAccepted", "true", 7);

    // Habilito todos los elementos del formulario
    const formElements = formulario.elements;
    for (let i = 0; i < formElements.length; i++) {
        formElements[i].disabled = false;
    }

    // Ocultar el mensaje de cookies
    cookieMessage.style.display = "none";
});




// Cuando cargue la pagina
document.addEventListener("DOMContentLoaded", function () {
    // ------------------------------------------ Login usuario ------------------------------------------
    // Base de datos
    let usuaris = ["usu01", "usu02", "usu03"];
    let contrasenyes = ["pass01", "pass02", "pass03"];

    // Inicio de sesión
    document.getElementById("myBtn_login").addEventListener("click", function () {
        //booleano para saber si estan bien las credenciales
        var flag_login = false;

        // Obtener los valores del formulario de inicio de sesión
        var usuari_usuari = document.getElementById("login_usuario").value;
        var password_login = document.getElementById("login_password").value;

        //recorremos los arrays buscando el usuario i su contraseña
        for (let i = 0; i < usuaris.length; i++) {
            // Comprobar si el usuario y la contraseña coinciden
            if (usuari_usuari == usuaris[i] && password_login == contrasenyes[i]) {
                // Si el usuario que a puesto i la contraseña estan en la misma posicion que en los arrays
                flag_login = true;
                break;//salimos de el bucle cuando entre en el if
            } else if (usuari_usuari.length < 1) {
                // Si ponen vacio el campo usuario
                document.getElementById("errorLogin_usuario").innerHTML = "No puede estar vacio";
                document.getElementById("login_usuario").value = "";

            } else if (!(usuaris.includes(usuari_usuari))) {
                // Si en el array no existe el usuario que hemos puesto
                //ponemos errorLogin_password vacio porque si entra en este else if es que el usuario esta mal asi que en la contraseña no ponemos nada
                document.getElementById("errorLogin_password").innerHTML = "";

                //ponemos que el usuario no existe porque no lo a encontrado en el array
                document.getElementById("errorLogin_usuario").innerHTML = "Usuario/gmail no esta registrado";
                document.getElementById("login_usuario").value = "";
            } else if (usuari_usuari == usuaris[i] && !(password_login == contrasenyes[i])) {
                // Si el usuario esta bien pero la contraseña no                   
                //ponemos errorLogin_gmail vacio porque si entra en este else if es que solo la contraseña esta mal
                document.getElementById("errorLogin_usuario").innerHTML = "";

                //ponemos que la contraseña es incorrecta
                document.getElementById("errorLogin_password").innerHTML = "Contraseña incorrecta";
                document.getElementById("login_password").value = "";
            }
        }

        if (flag_login) {
            // si estan bien las credenciales
            alert("Hola " + usuari_usuari);
        } else {
            // si alguna credencial esta mal
            event.preventDefault(); // Evita que se recargue la página || event.preventDefault() se utiliza en el controlador de eventos del botón para prevenir la acción predeterminada del formulario
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
        document.cookie = "Comptador=" + cookie;
    } else {
        //si no existe
        document.cookie = "Comptador= 1";
    }
}
