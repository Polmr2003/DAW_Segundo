//hacer push a las variables de la base de datos
function push(usuari, password) {
    usuaris.push(usuari);
    contrasenyes.push(password);
}

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