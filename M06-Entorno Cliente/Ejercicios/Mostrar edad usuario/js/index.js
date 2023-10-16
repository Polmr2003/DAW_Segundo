// cuando cargue la paguina
document.addEventListener("DOMContentLoaded", function () {
    // cuando le de click al boton con al id myBtn
    document.getElementById("myBtn").addEventListener("click", function () {
        //booleano para saber si estan bien las variables
        let flag = true;

        //recojemos los campos
        let nom = document.getElementById("nom").value;
        let date = document.getElementById("date").value;

        /*
        //ponemos el contenido de la fehca en un array separado para poderlo verificar
        const fechaArray = date.split('-'); //.split divide la cadena || string.split(separador, limite) string: Es la cadena de texto que se va a dividir, separador: Es el carácter o subcadena por la cual se dividirá la cadena original, limite (opcional): Es un valor numérico que especifica el número máximo de divisiones a realizar. Si se omite, se dividirá la cadena por todas las apariciones del separador.
        console.log(fechaArray);

        //variables del array con el dia, fecha i año
        let año = fechaArray[0];// año
        let mes = fechaArray[1];// mes
        let dia = fechaArray[2];// dia
        */

        // Obtenemos la fecha actual
        let fechaActual = new Date();

        // Convertimos la fecha de el usuario en objeto de fecha
        let fechaUsu = new Date(date);


        //verifico el nom
        if (nom.length < 1) {
            document.getElementById("errorNom").innerHTML = "no puede estar vacio";
            document.getElementById("nom").value = "";
            flag = false;
        } else if (nom.length < 3) {
            document.getElementById("errorNom").innerHTML = "Minimo 3 caracteres";
            document.getElementById("nom").value = "";
            flag = false;
        } else if (!isNaN(nom)) {
            document.getElementById("errorNom").innerHTML = "Tiene que contener caracteres no numeros";
            document.getElementById("nom").value = "";
            flag = false;
        } else if (nom.length > 20) {
            document.getElementById("errorNom").innerHTML = "Maximo 20 caracteres";
            document.getElementById("nom").value = "";
            flag = false;
        } else {
            document.getElementById("errorNom").innerHTML = "";
        }

        //verifico la data
        if (date.length < 1) {
            document.getElementById("errorDate").innerHTML = "no puede estar vacio";
            document.getElementById("date").value = "";
            flag = false;
        } else if (dia > 31 || mes > 12) {
            document.getElementById("errorDate").innerHTML = "Pon una fecha valida";
            document.getElementById("date").value = "";
            flag = false;
        } else if (dia < 1 || año < (current_año - 150) || mes < 1) {
            document.getElementById("errorDate").innerHTML = "Pon una fecha valida";
            document.getElementById("date").value = "";
            flag = false;
        } else if (fechaUsu>fechaActual) {
            document.getElementById("errorDate").innerHTML = "No puedes poner una fecha futura";
            document.getElementById("date").value = "";
            flag = false
        } else {
            document.getElementById("errorDate").innerHTML = "";

            edad = 2023 - año;
            alert("Tienes : " + edad + " años");
        }

    });

});