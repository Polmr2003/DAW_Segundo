// Si en la localStorage esta la variable user (Nos hemos logeado)
if (localStorage.getItem("user")) {
    //Si existe (Nos hemos logeado), cojemos los id de el menu
    let Menu_login=document.getElementById("Menu_login");
    let Menu_register=document.getElementById("Menu_register");
    let Menu_vuelo=document.getElementById("Menu_vuelo");
    let Menu_cerrar_sesion=document.getElementById("Menu_cerrar_sesion");

    // escondemos el menu con la paguina de inicio de sesion, registro i mostramos el de buscar vuelo
    Menu_login.style.display="none";
    Menu_register.style.display="none";

    Menu_vuelo.style.display="block";
    Menu_cerrar_sesion.style.display="block";

}else{
    //Si no existe (No nos hemos logeado), cojemos los id de el menu
    let Menu_login=document.getElementById("Menu_login");
    let Menu_register=document.getElementById("Menu_register");
    let Menu_vuelo=document.getElementById("Menu_vuelo");
    let Menu_cerrar_sesion=document.getElementById("Menu_cerrar_sesion");

    // escondemos el menu con la paguina de buscar vuelo, mostramos el menu de registro i de login
    Menu_login.style.display="block";
    Menu_register.style.display="block";

    Menu_vuelo.style.display="none";
    Menu_cerrar_sesion.style.display="none";

}