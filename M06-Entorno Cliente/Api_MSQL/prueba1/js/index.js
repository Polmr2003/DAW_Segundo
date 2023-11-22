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



// Cuando cargue la pagina
document.addEventListener("DOMContentLoaded", function () {
  // ------------------------------------------ Login usuario ------------------------------------------
  // Inicio de sesión
  document.getElementById("myBtn_login").addEventListener("click", function () {
    let email = document.getElementById("login_usuario").value;
    let password = document.getElementById("login_password").value;

    // Creación de un objeto userData
    const userData = {
      usuari: email,
      password: password
  };

      // Realizar la solicitud POST usando fetch
      fetch('http://localhost:3000/vueling/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(userData)
      })
        .then(response => response.json())
        .then(data => {
          // Manejar la respuesta del servidor
          if (data.success) {
            document.getElementById("LoginMessage").innerHTML = "USUARI CORRECTE";
            sessionStorage.setItem('logueado', true);
            
            // Redirigir a la página de inicio o realizar alguna acción adicional
          } else {
            document.getElementById("LoginMessage").innerHTML = "CREDENCIALS INCORRECTES";
            // Mostrar un mensaje de error al usuario o realizar alguna acción adicional
          }
        })
        .catch(error => {
          console.error('Error al realizar la solicitud:', error);
        });
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
