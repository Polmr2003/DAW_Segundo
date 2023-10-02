//cuando cargue la página
document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("myBtn").addEventListener("click", function () {

        //recoger los valores de las cajas
        let myNum = document.getElementById("myNum").value;
        let myLle = document.getElementById("myLle").value;
        let patron = /[a-zA-ZñÑ]/;
        let correcte = 0;

        //verifico el número
        if (myNum.length != 8) {
            document.getElementById("errorNum").innerHTML = "Longitud incorrecta";
            document.getElementById("myNum").value = "";
        } else if (isNaN(myNum)) {
            document.getElementById("errorNum").innerHTML = "Només ha de contenir números";
            document.getElementById("myNum").value = "";
        } else {
            document.getElementById("errorNum").innerHTML = "";
            correcte++;
        }
        //verifico lletra
        if (myLle.length != 1) {
            document.getElementById("errorLletra").innerHTML = "Longitud incorrecta";
            document.getElementById("myLle").value = "";
        } else if (!patron.test(myLle)) {
            document.getElementById("errorLletra").innerHTML = "Només ha de contenir una lletra";
            document.getElementById("myLle").value = "";
        } else {
            document.getElementById("errorLletra").innerHTML = "";
            correcte++;
        }

        //ejereci clase dni 2/10/23
        if (correcte == 2) {
            if (verificaDNI(myNum, myLle)) {
                document.getElementById("correcte").style.color = "green";
                document.getElementById("incorrecte").style.color = "red";
                correcte = 0;
            } else {
                document.getElementById("correcte").style.color = "red";
                document.getElementById("incorrecte").style.color = "green";
                correcte = 0;
            }
            document.getElementById("myLle").value = "";
            document.getElementById("myNum").value = "";
            document.getElementById("errorLletra").innerHTML = "";
            document.getElementById("errorNum").innerHTML = "";
        }

        //-------------------------------------------------------------------------------//
        // if (correcte == 2) {
        //     if (verificaDNI(myNum, myLle)) {
        //         document.getElementById("resultat").innerHTML = "El teu DNI és cert";
        //         correcte = 0;

        //     } else {
        //         document.getElementById("resultat").innerHTML = "El teu DNI és fals";

        //     }
        //     document.getElementById("myLle").value = "";
        //     document.getElementById("myNum").value = "";
        //     document.getElementById("errorLletra").innerHTML = "";
        //     document.getElementById("errorNum").innerHTML = "";
        // }

    });


});

function verificaDNI(num, lle) {

    let flag = false;
    let lletres = "TRWAGMYFPDXBNJZSQVHLCKE";

    let residu = num % 23;
    let lletraBona = lletres[residu];

    if (lletraBona == lle.toUpperCase()) {
        flag = true;
    }

    return flag;

}