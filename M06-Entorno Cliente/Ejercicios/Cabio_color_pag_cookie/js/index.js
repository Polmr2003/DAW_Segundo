//--------------------------------------------------- Funciones ---------------------------------------------------
// funcion para crear una cookie
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
};

//funcion para leer una cookie
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
};

//funcion para chekear si una cookie esta creada
function checkCookie_cname(getCookie) {
    let cookie = getCookie(cname);
    if (cookie != "") {
        // si existe
        alert("Esta creada");
    } else {
        //si no existe
        setCookie(cname, cookie, 1);
    }
}

//funcion para ver cuantas veces a visitado el usuario una paguina
function checkCookie(cname) {
    let cookie = getCookie(cname);
    if (cookie != "") {
        // si existe
        cookie++;
        document.cookie = "Comptador=" + cookie;
    } else {
        //si no existe
        document.cookie = "Comptador= 1";
    }
}

//--------------------------------------------------- Miramos cual color esta seleccionado en los radio butons ---------------------------------------------------
//cuando cargue la página
document.addEventListener("DOMContentLoaded", function () {
    // Pulsamos el boton
    document.getElementById("myBtn").addEventListener("click", function () {
        //--------------------Color de fons--------------------
        let colorFons;

        //miramos cual color de fons esta seleccionado
        if (document.getElementsByName("Color_fons")[0].checked) {
            //si esta en la posicion 0 (Verde)
            colorFons = "Verde";

        }
        if (document.getElementsByName("Color_fons")[1].checked) {
            //si esta en la posicion 1 (Amarillo)
            colorFons = "Amarillo";

        }

        /*
        for (let i = 0; i < document.getElementsByName("Color_fons").length; index++) {
            if (document.getElementsByName("Color_fons")[i].checked) {
                colorFons = document.getElementsByName("Color_fons").value;
            }

        }
        */

        //--------------------Color de lletra--------------------
        let colorLletra;

        //miramos cual color de lletra esta seleccionado
        if (document.getElementsByName("Color_lle")[0].checked) {
            //si esta en la posicion 0 (Blanco)
            colorLletra = "Blanco";

        }
        if (document.getElementsByName("Color_lle")[1].checked) {
            //si esta en la posicion 1 (Rosa)
            colorLletra = "Rosa";

        }

        /*
        for (let i = 0; i < document.getElementsByName("Color_lle").length; index++) {
            if (document.getElementsByName("Color_lle")[i].checked) {
                colorFons = document.getElementsByName("Color_lle").value;
            }

        }
        */

        //-------------------- Creamos la cookie --------------------
        setCookie("ColorFondo", colorFons, 1);
        setCookie("ColorLetra", colorLletra, 1);

    });
});