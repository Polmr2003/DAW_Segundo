//
if (localStorage.getItem("user")) {
    console.log("hola");
    //
    let Menu_login=document.getElementById("Menu_login");
    let Menu_register=document.getElementById("Menu_register");
    let Menu_vuelo=document.getElementById("Menu_vuelo");

    //
    Menu_login.style.display="none";
    Menu_register.style.display="none";
    Menu_vuelo.style.display="block";
}else{
    console.log("adios");
    //
    let Menu_login=document.getElementById("Menu_login");
    let Menu_register=document.getElementById("Menu_register");
    let Menu_vuelo=document.getElementById("Menu_vuelo");

    //
    Menu_login.style.display="block";
    Menu_register.style.display="block";
    Menu_vuelo.style.display="none";
}