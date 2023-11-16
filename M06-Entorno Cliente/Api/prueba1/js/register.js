 //--------------------------------------------------- Mostramos el mensaje de las Cookies ---------------------------------------------------
var cookieMessage = document.getElementById("cookie-message");
var acceptButton = document.getElementById("accept-cookie");

var formulario = document.getElementById("formulario");

// Comprobar si la cookie de aceptación ya existe
if (getCookie("usuari") !== "Acepteda la cookie") {
  // Si no se ha aceptado la cookie
  // Deshabilitar todos los elementos del formulario
  const formElements = formulario.elements;
  for (let i = 0; i < formElements.length; i++) {
      formElements[i].disabled = true;
  }

  // Mostramos el mensaje de aceptar la cookie
  cookieMessage.style.display = "block";
}

if(getCookie("contador")){
  checkCookie("contador");
}

// Si el usario a echo click a el boton de aceptar la cookie
document.getElementById("accept-cookie").addEventListener("click", function () {
  // Configurar una cookie que expire en un año
  setCookie("usuari", "Acepteda la cookie", 365);

  setCookie("contador", "1", 365);

  // Habilito todos los elementos del formulario
  const formElements = formulario.elements;
  for (let i = 0; i < formElements.length; i++) {
      formElements[i].disabled = false;
  }

  // Ocultar el mensaje de cookies
  cookieMessage.style.display = "none";
});

// Si el usario a echo click a el boton de aceptar la cookie
document.getElementById("rechazar-cookie").addEventListener("click", function () {
  
});

// Si el usario a echo click a el boton de aceptar la cookie
document.getElementById("minim-cookie").addEventListener("click", function () {
  // Configurar una cookie que expire en un año
  setCookie("usuari", "Acepteda la cookie", 365);

  // Habilito todos los elementos del formulario
  const formElements = formulario.elements;
  for (let i = 0; i < formElements.length; i++) {
      formElements[i].disabled = false;
  }

  // Ocultar el mensaje de cookies
  cookieMessage.style.display = "none";
});
 
 
 
 // Registro de un nuevo usuario
 document.getElementById("myBtn_registro").addEventListener("click", function () {
    //booleano para saber si estan bien las credenciales
    var flag_registro = true;

    // Obtener los valores del formulario de registro
    var nombre = document.getElementById("new_nombre").value;
    var apellidos = document.getElementById("new_apellido").value;
    var gmail = document.getElementById("new_gmail").value;
    var usuari = document.getElementById("new_usuari").value;
    var password = document.getElementById("new_password").value;

    //--------------------------Realizar validaciones aquí para el registro ---------------------------------

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

    if (flag_registro) { // si las credenciales están bien

        // Creación de un objeto userData
        const userData = {
            nom: nombre,
            cognom: apellidos,
            gmail: gmail,
            password: password,
            usuari: usuari
        };

        // Enviar datos al servidor utilizando fetch
        fetch('http://localhost:3000/vueling/login', {
            method: "POST",
            headers: {
                "Content-type": "application/json;charset=UTF-8"
            },
            body: JSON.stringify(userData)
        })

        //Manejo de la Respuesta del Servidor
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error("Error en la inserción de usuario:", data.mensaje);
            } else {
                alert("USUARIO REGISTRADO CORRECTAMENTE");
                window.location.reload();
            }
        })
        .catch(err => console.log(err));
    } else { // si alguna credencial está mal
        event.preventDefault();
    }
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
  