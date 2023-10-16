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
        
        //recorremos los arrays buscando el usuario i su contraseña
        for (let i = 0; i < usuaris.length; i++) {
            // Comprobar si el usuario y la contraseña coinciden
            if (usuari_login == usuaris[i] && password_login == contrasenyes[i]) {
                // Si el usuario que a puesto i la contraseña estan en la misma posicion que en los arrays
                flag_login = true;
                break;//salimos de el bucle cuando entre en el if
            }else if (usuari_login.length<1) {
                // Si ponen vacio el campo usuario
                document.getElementById("errorLogin_gmail").innerHTML = "No puede estar vacio";
                document.getElementById("login_gmail").value = "";

            }else if (!(usuaris.includes(usuari_login))) { 
                // Si en el array no existe el usuario que hemos puesto
                
                //ponemos errorLogin_password vacio porque si entra en este else if es que el usuario esta mal
                document.getElementById("errorLogin_password").innerHTML = "";

                //ponemos que el usuario no existe porque no lo a encontrado en el array
                document.getElementById("errorLogin_gmail").innerHTML = "Usuario/gmail no esta registrado";
                document.getElementById("login_gmail").value = "";
            }else if (usuari_login == usuaris[i] && !(password_login == contrasenyes[i])) { 
                // Si el usuario esta bien pero la contraseña no                   
                
                //ponemos errorLogin_gmail vacio porque si entra en este else if es que solo la contraseña esta mal
                document.getElementById("errorLogin_gmail").innerHTML = "";
                
                //ponemos que la contraseña es incorrecta
                document.getElementById("errorLogin_password").innerHTML = "Contraseña incorrecta";
                document.getElementById("login_password").value = "";
            }
        }


        if (flag_login) {
            alert("USUARIO CORRECTO");
        } else { // si alguna credencial esta mal
            event.preventDefault(); // Evita que se recargue la página || event.preventDefault() se utiliza en el controlador de eventos del botón para prevenir la acción predeterminada del formulario
        }
    });
    
});