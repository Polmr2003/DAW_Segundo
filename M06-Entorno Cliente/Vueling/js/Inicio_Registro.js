document.addEventListener("DOMContentLoaded", function () {
    // Obtener la URL actual
    var currentPage = window.location.href;

    if (currentPage.includes("Inicio_Sesion.html")) {
        // Inicio de sesión
        document.getElementById("myBtn_login").addEventListener("click", function () {
            //booleano para saber si estan bien las credenciales
            var flag_login = false;

            // Ejercicio Vueling 9/10/2023
            let usuaris = ["usu01", "usu02", "usu03"];
            let contrasenyes = ["pass01", "pass02", "pass03"];

            // Obtener los valores del formulario de inicio de sesión
            var usuari_login = document.getElementById("login_gmail").value;
            var password_login = document.getElementById("login_password").value;

            for (let i = 0; i < usuaris.length; i++) {
                // Comprobar si el usuario y la contraseña coinciden
                if (usuari_login == usuaris[i] && password_login == contrasenyes[i]) { // Si el usuario que a puesto i la contraseña estan en la misma posicion que en los arrays entrara
                    flag_login = true;
                    break;//salimos de el bucle cuando entre en el if
                }
            }

            if (flag_login) {
                alert("USUARIO CORRECTO");
            } else {
                alert("CREDENCIALES INCORRECTAS");
            }
        });
    } else if (currentPage.includes("Nuevo_Usuario.html")) {
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
            } else if (!/@/.test(gmail)) {
                document.getElementById("errorGmail").innerHTML = "Pon un formato de correo válido, debe contener @";
                document.getElementById("new_gmail").value = "";
                flag_registro = false;
            } else {
                document.getElementById("errorGmail").innerHTML = "";
            }

            // verifico el nombre de usuario
            if (usuari.length < 1) {
                document.getElementById("errorUsuari").innerHTML = "No puede estar vacío";
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
                document.getElementById("errorPassword").innerHTML = "No puede estar vacío";
                document.getElementById("new_password").value = "";
                flag_registro = false;
            } else if (password.length > 8) {
                document.getElementById("errorPassword").innerHTML = "No puede tener más de 8 caracteres";
                document.getElementById("new_password").value = "";
                flag_registro = false;
            } else {
                document.getElementById("errorPassword").innerHTML = "";
            }

            //comprovamos que los campos esten bien
            if (flag_registro) { // si las credenciales estan bien
                alert("USUARI ENREGISTRAT CORRECTAMENT");
            } else { // si alguna credencial esta mal
                event.preventDefault(); // Evita que se recargue la página || event.preventDefault() se utiliza en el controlador de eventos del botón para prevenir la acción predeterminada del formulario
            }

        });

    }


});
