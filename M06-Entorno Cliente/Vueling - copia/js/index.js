document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("myBtn").addEventListener("click", function () {
        // booleano para verificar que todas las credenciales estan correctas
        var flag_exist_usu = false;
        var flag_new_usu = true;

        // Array con los usuarios existentes
        let usuaris = ["usu01", "usu02", "usu03"];
        let contrasenyes = ["pass01", "pass02", "pass03"];

        // variables para verficar cuando iniciamos sesion si existe el usuario
        var usuari = document.getElementById("gmail").value;
        var password = document.getElementById("password").value;

        alert("asd");
        // variables cuando creamos un nuevo usuario
        var new_nombre = document.getElementById("new_nombre").value;
        var new_apellidos = document.getElementById("new_apellido").value;
        var new_gmail = document.getElementById("new_gmail").value;
        var new_usuari = document.getElementById("new_usuari").value;
        var new_password = document.getElementById("new_password").value;

        //----------------------------- Verificamos las variables de el nuevo usuario -----------------------------------
        if (new_nombre.length < 1) {
            document.getElementById("errorName").innerHTML = "No puede estar vacio";
            document.getElementById("new_nombre").value = "";
            flag_new_usu = false;
        } else if (!(isNaN(new_nombre))) {
            document.getElementById("errorName").innerHTML = "Solo puede contener letras";
            document.getElementById("new_nombre").value = "";
            flag_new_usu = false;
        } else {
            document.getElementById("errorName").innerHTML = "";
        }

        // verifico el apellido
        if (new_apellidos.length < 1) {
            document.getElementById("errorSubname").innerHTML = "No puede estar vacio";
            document.getElementById("new_apellido").value = "";
            flag_new_usu = false;
        } else if (!(isNaN(new_apellidos))) {
            document.getElementById("errorSubname").innerHTML = "Solo puede contener letras";
            document.getElementById("new_apellido").value = "";
            flag_new_usu = false;
        } else {
            document.getElementById("errorSubname").innerHTML = "";
        }

        // verifico el gmail
        if (new_gmail.length < 1) {
            document.getElementById("errorGmail").innerHTML = "No puede estar vacio";
            document.getElementById("new_gmail").value = "";
            flag_new_usu = false;
        } else if (!/@/.test(new_gmail)) { //verifica si contiene @ en el contenido de el gmail ||  ( /^\S+@\S+\.\S+$/ :: ^ al principio de la expresión regular indica que la cadena debe comenzar con el patrón que sigue a continuación, \S+ representa cualquier carácter que no sea un espacio en blanco)
            document.getElementById("errorGmail").innerHTML = "Pon un formato de correo valida, tiene que contener @";
            document.getElementById("new_gmail").value = "";
            flag_new_usu = false;
        } else {
            document.getElementById("errorGmail").innerHTML = "";
        }

        // verifico el nombre de usuario
        if (new_usuari.length < 1) {
            document.getElementById("errorUsuari").innerHTML = "No puede estar vacio";
            document.getElementById("new_usuari").value = "";
            flag_new_usu = false;
        } else if (new_usuari.length > 10) {
            document.getElementById("errorUsuari").innerHTML = "No puede tener mas de 10 caracteres";
            document.getElementById("new_usuari").value = "";
            flag_new_usu = false;
        } else {
            document.getElementById("errorUsuari").innerHTML = "";
        }

        // verifico la contraseña
        if (new_password.length < 1) {
            document.getElementById("errorPassword").innerHTML = "No puede estar vacio";
            document.getElementById("new_password").value = "";
            flag_new_usu = false;
        } else if (new_password.length > 8) {
            document.getElementById("errorPassword").innerHTML = "No puede tener mas de 8 caracteres";
            document.getElementById("new_password").value = "";
            flag_new_usu = false;
        } else {
            document.getElementById("errorPassword").innerHTML = "";
        }

        //comprovamos que los campos esten bien
        if (flag_new_usu == true) { // si las credenciales estan bien
            alert("USUARI ENREGISTRAT CORRECTAMENT");
        } else { // si alguna credencial esta mal
            event.preventDefault(); // Evita que se recargue la página || event.preventDefault() se utiliza en el controlador de eventos del botón para prevenir la acción predeterminada del formulario
        }


        //----------------------------- Miramos si existe el usuario al iniciar session -----------------------------------
        for (let i = 0; i < usuaris.length; i++) {

            //comprovamos si el usuario i su contraseña estan bien
            if (usuari == usuaris[i] && password == contrasenyes[i]) { // Si el usuario que a puesto i la contraseña estan en la misma posicion que en los arrays entrara
                flag_exist_usu = true;
                break; // salimos de el bucle cuando entre en el if
            }
        }

        if (flag_exist_usu == true) {
            alert("USUARI CORRECTE");
        } else {
            alert("CREDENCIALS INCORRECTES");
        }
    });
    
});