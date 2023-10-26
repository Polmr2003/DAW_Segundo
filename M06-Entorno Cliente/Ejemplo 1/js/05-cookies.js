//cuando cargue la página
document.addEventListener("DOMContentLoaded", function () {
    //cookies navegador
    //crear una cookie de nom user i de contingut Marga1989

    //el temps de vida si és per max-age es calcula en segons
    //document.cookie="user=Marga1989;max-age=86400";//temps en GMT

    //expires: anem a crear la data
    // const d = new Date(); //el dia d'avui en milisegons des de 1/1/1970
    // d.setTime(d.getTime() + (3*24*60*60*1000));//afegim 3 dies
    // console.log(d.toUTCString());
    //document.cookie="user=Marga1989;expires="+ d.toUTCString();

    //expires: ficant la data directament
    //document.cookie="user=Marga1989;expires=Thu, 18 Dec 2023 12:00:00 UTC"; 

    //esborrem la cookie user
    //document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

    //crear 3 cookies amb temps de vida el que duri la sessió 
    document.cookie = "color=green";
    document.cookie = "lletra=gran";
    document.cookie = "fons=clar";

    console.log(document.cookie); //imprimeixo totes les cookies

    //manipular la cookie, 
    //la tornas a crear  
    document.cookie = "lletra= normal";

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
    function checkCookie(cname) {
        let cookie = getCookie(cname);
        if (cookie != "") {
            // si existe
            alert("La cookie esta creda");
        } else {
            //si no existe
            alert("La cookie NO esta creda");
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

});