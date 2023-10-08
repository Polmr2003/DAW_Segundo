//cuando cargue la página
document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("myBtn").addEventListener("click", function () {
        
        // booleano para verificar que todas las credenciales estan correctas
        var flag = false;
        
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
                flag = true;
                break; // salimos de el bucle cuando entre en el if
            }
        }

        if(flag == true){
            alert("USUARI CORRECTE");
        }else{
            alert("CREDENCIALS INCORRECTES");
        }
    });
});