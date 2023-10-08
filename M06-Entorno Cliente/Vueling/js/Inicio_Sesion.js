//cuando cargue la página
document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("myBtn").addEventListener("click", function () {
        //ejercicio vueling 9/10/2023
        let usuaris = ["usu01", "usu02", "usu03"];
        let contrasenyes = ["pass01", "pass02", "pass03"];
        
        //variables
        var usuari = document.getElementById("gmail").value;
        var password = document.getElementById("password").value;
        
        alert(usuari+ " " +password);
        
        for (let i = 0; i < usuaris.length; i++) {

            //comprovamos si el usuario i su contraseña estan bien
            if(usuari==usuaris[i] && password==contrasenyes[i]){ // Si el usuario que a puesto i la contraseña estan en la misma posicion que en los arrays entrara
                alert("correcto");
                break; // salimos de el bucle cuando entre en el if

            }else{ // si no es asi entrara en el else
                alert("incorrecto");
            }
        }

    });
});