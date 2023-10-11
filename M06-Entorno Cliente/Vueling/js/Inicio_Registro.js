// Base de datos
let usuaris = ["usu01", "usu02", "usu03"];
let contrasenyes = ["pass01", "pass02", "pass03"];

//hacer push a las variables de la base de datos
function push(usuari, password) {
    usuaris.push(usuari);
    contrasenyes.push(password);
}

//cuando cargue la pagina
document.addEventListener("DOMContentLoaded", function () {
    // Obtener la URL actual
    var currentPage = window.location.href;
    
    // si en la URL actual inluye:
    if (currentPage.includes("Inicio_Sesion.html")) { // si estamos en la paguina de Inicio_Sesion.html entrara
        // Inicio de sesión
        document.getElementById("myBtn_login").addEventListener("click", function () {
            //booleano para saber si estan bien las credenciales
            var flag_login = false;

            // Obtener los valores del formulario de inicio de sesión
            var usuari_login = document.getElementById("login_gmail").value;
            var password_login = document.getElementById("login_password").value;

            //recorremos los arrays buscando el usuario i su contraseña
            for (let i = 0; i < usuaris.length; i++) {
                // Comprobar si el usuario y la contraseña coinciden
                if (usuari_login == usuaris[i] && password_login == contrasenyes[i]) { // Si el usuario que a puesto i la contraseña estan en la misma posicion que en los arrays entrara
                    flag_login = true;
                    break;//salimos de el bucle cuando entre en el if
                } else if (usuari_login.length < 1) { // Si ponen vacio el campo usuario entrara
                    document.getElementById("errorLogin_gmail").innerHTML = "No puede estar vacio";
                    document.getElementById("login_gmail").value = "";

                } else if (!(usuaris.includes(usuari_login))) { // Si en el array no existe el usuario que hemos puesto
                    //ponemos errorLogin_password vacio porque si entra en este else if es que el usuario esta mal asi que en la contraseña no ponemos nada
                    document.getElementById("errorLogin_password").innerHTML = "";

                    //ponemos que el usuario no existe porque no lo a encontrado en el array
                    document.getElementById("errorLogin_gmail").innerHTML = "Usuario/gmail no esta registrado";
                    document.getElementById("login_gmail").value = "";
                } else if (usuari_login == usuaris[i] && !(password_login == contrasenyes[i])) { // Si el usuario esta bien pero la contraseña no                   
                    //ponemos errorLogin_gmail vacio porque si entra en este else if es que solo la contraseña esta mal
                    document.getElementById("errorLogin_gmail").innerHTML = "";

                    //ponemos que la contraseña es incorrecta
                    document.getElementById("errorLogin_password").innerHTML = "Contraseña incorrecta";
                    document.getElementById("login_password").value = "";
                }
            }

            if (flag_login) {
                alert("Hola " + usuari_login);
            } else { // si alguna credencial esta mal
                event.preventDefault(); // Evita que se recargue la página || event.preventDefault() se utiliza en el controlador de eventos del botón para prevenir la acción predeterminada del formulario
            }
        });


    } else if (currentPage.includes("Nuevo_Usuario.html")) { // si estamos en la paguina de Nuevo_Usuario.html entrara
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

            //comprovamos que los campos esten bien
            if (flag_registro) { // si las credenciales estan bien
                //hacemos un push par poner en el array las credenciales del usuario
                push(usuari, password);

                // Mostramos que el usuario se a registrado correctamente
                alert("USUARI ENREGISTRAT CORRECTAMENT");
            } else { // si alguna credencial esta mal
                event.preventDefault(); // Evita que se recargue la página || event.preventDefault() se utiliza en el controlador de eventos del botón para prevenir la acción predeterminada del formulario
            }

        });

    }


/*
// Función que contiene la base de datos
    function setupDatabase() {
        let usuaris = ["usu01", "usu02", "usu03"];
        let contrasenyes = ["pass01", "pass02", "pass03"];

        function push(usuari, password) {
            usuaris.push(usuari);
            contrasenyes.push(password);
        }

        return { usuaris, contrasenyes, push };
    }

    // Llama a la función para configurar la base de datos
    const { usuaris, contrasenyes, push } = setupDatabase();
*/


});
