//cuando cargue la página
document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("myBtn").addEventListener("click", function () {

        // booleano para verificar que todas las credenciales estan correctas
        var flag = true;

        // variables del nuevo usuario
        var nombre = document.getElementById("name").value;
        var apellidos = document.getElementById("subname").value;
        var gmail = document.getElementById("gmail").value;
        var usuari = document.getElementById("usuari").value;
        var password = document.getElementById("password").value;

        // verifico el nombre
        if (nombre.length < 1) {
            document.getElementById("errorName").innerHTML = "No puede estar vacio";
            document.getElementById("name").value = "";
            flag = false;
        } else if (!(isNaN(nombre))) {
            document.getElementById("errorName").innerHTML = "Solo puede contener letras";
            document.getElementById("name").value = "";
            flag = false;
        } else {
            document.getElementById("errorName").innerHTML = "";
        }

        // verifico el apellido
        if (apellidos.length < 1) {
            document.getElementById("errorSubname").innerHTML = "No puede estar vacio";
            document.getElementById("subname").value = "";
            flag = false;
        } else if (!(isNaN(apellidos))) {
            document.getElementById("errorSubname").innerHTML = "Solo puede contener letras";
            document.getElementById("subname").value = "";
            flag = false;
        } else {
            document.getElementById("errorSubname").innerHTML = "";
        }

        // verifico el gmail
        if (gmail.length < 1) {
            document.getElementById("errorGmail").innerHTML = "No puede estar vacio";
            document.getElementById("gmail").value = "";
            flag = false;
        } else if (!/@/.test(gmail)) { //verifica si contiene @ en el contenido de el gmail ||  ( /^\S+@\S+\.\S+$/ :: ^ al principio de la expresión regular indica que la cadena debe comenzar con el patrón que sigue a continuación, \S+ representa cualquier carácter que no sea un espacio en blanco)
            document.getElementById("errorGmail").innerHTML = "Pon un formato de correo valida, tiene que contener @";
            document.getElementById("gmail").value = "";
            flag = false;
        } else {
            document.getElementById("errorGmail").innerHTML = "";
        }

        // verifico el nombre de usuario
        if (usuari.length < 1) {
            document.getElementById("errorUsuari").innerHTML = "No puede estar vacio";
            document.getElementById("usuari").value = "";
            flag = false;
        } else if (usuari.length > 10) {
            document.getElementById("errorUsuari").innerHTML = "No puede tener mas de 10 caracteres";
            document.getElementById("usuari").value = "";
            flag = false;
        } else {
            document.getElementById("errorUsuari").innerHTML = "";
        }

        // verifico la contraseña
        if (password.length < 1) {
            document.getElementById("errorPassword").innerHTML = "No puede estar vacio";
            document.getElementById("password").value = "";
            flag = false;
        } else if (password.length >8) {
            document.getElementById("errorPassword").innerHTML = "No puede tener mas de 8 caracteres";
            document.getElementById("password").value = "";
            flag = false;
        } else {
            document.getElementById("errorPassword").innerHTML = "";
        }

        //comprovamos que los campos esten bien
        if(flag==true){ // si las credenciales estan bien
            alert("hola");
        }else{ // si alguna credencial esta mal
            event.preventDefault(); // Evita que se recargue la página
        }

    });
});