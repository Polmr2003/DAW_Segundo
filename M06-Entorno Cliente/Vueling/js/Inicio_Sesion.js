//cuando cargue la página
document.addEventListener("DOMContentLoaded", function () {
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
    
});