// Funció que genera camps d'edat segons el nombre de passatgers
const pasajerosInput = document.getElementById("pasajeros");
const edadesPasajerosContainer = document.getElementById("edad_pasajeros_container");

pasajerosInput.addEventListener("input", () => {
    const numPasajeros = pasajerosInput.value;
    if (numPasajeros > 0 && numPasajeros < 21) {
        // Ponemos el campo de error vacio porque estara bien el numero de pasajeros
        document.getElementById("errorNum_pasajeros").innerHTML = "";

        // Mostrem els camps d'edat
        edadesPasajerosContainer.innerHTML = ""; // borramos lo que halla en el container anteriormente
        for (let i = 1; i <= numPasajeros; i++) {
            const edadInput = document.createElement("input"); //creamos un input i le añadimos los valores
            edadInput.type = "number"; // type del input
            edadInput.id = "EdadPasajero_" + i; // id del input
            edadInput.style = "width: 160px;"; // style del input
            edadInput.placeholder = "Pasajero " + i; // placeholder del input
            edadInput.min = 0; // Ajusta els límits de la edad

            // añadimos un texto con informacion para que el usuario ponga la edad del pasajero
            const text = document.createElement("p");

            text.innerHTML = "Edad del pasajero " + i + ":"; //texto que estara en la etiqueta p
            text.style = "text-align: left; margin: 16px 0px"; // lo centramos a al izquierda

            // campo para los errores
            const error = document.createElement("span");

            error.style = "color: red;";
            error.id = "ErrorEdad_" + i; //id del span donde pondremos el error

            // Afegim un salt de línia després de cada input
            const lineBreak = document.createElement("br");

            // Añadimos los inputus, el salt de línia al contenidor i el campo de errores a el html
            edadesPasajerosContainer.appendChild(text);
            edadesPasajerosContainer.appendChild(edadInput);
            edadesPasajerosContainer.appendChild(lineBreak);
            edadesPasajerosContainer.appendChild(error);
        }
        document.getElementById("edades_pasajeros").style.display = "block";
    } else {
        // Amaguem els camps d'edat si el nombre de passatgers és 0, negatiu o mallor a 20
        document.getElementById("edades_pasajeros").style.display = "none";
        document.getElementById("errorNum_pasajeros").innerHTML = "Minimo 1 pasajero, Maximo 20";
    }
});



//importamos el objeto vuelo
//import {Viatge} from "./Model/Viatge.js";

//cuando cargue la página
document.addEventListener("DOMContentLoaded", function () {

    // Miramos si el radio "Ida" está seleccionado
    let idaRadio = document.getElementById("ida");

    // Miramos si el radio "Ida i vuelta" está seleccionado
    let idaVueltaRadio = document.getElementById("ida_vuelta");

    // Div con el fomrulario de la fecha de vuelta
    let fechaVueltaDiv = document.getElementById("div_fecha_vuelta");

    // Agregar un controlador de eventos para el cambio en el radio "Ida"
    idaRadio.addEventListener("change", function () {
        if (idaRadio.checked) {
            // Si la opción "Ida" está seleccionada, oculta el div de fecha de vuelta
            fechaVueltaDiv.style.display = "none";
        }
    });

    // Agregar un controlador de eventos para el cambio en el radio "Ida i vuelta"
    idaVueltaRadio.addEventListener("change", function () {
        if (idaVueltaRadio.checked) {
            // Si la opción "Ida i vuelta" está seleccionada, muestra el div de fecha de vuelta
            fechaVueltaDiv.style.display = "block";
        }
    });


    //array con las ciudades
    let ciutats = ["Barcelona", "Girona", "Tarragona", "Lleida", "Valencia"];

    //selectores en el html que vamos a poner las ciudades
    let ciudades_origen = document.getElementById("ciudades_origen");
    let ciudades_destino = document.getElementById("ciudades_destino");

    //añadir las ciudades_origen al selector de el html
    for (let i = 0; i < ciutats.length; i++) {
        let option = document.createElement("option");
        option.value = ciutats[i];
        option.innerHTML = ciutats[i];

        ciudades_origen.appendChild(option);
    }

    //añadir las ciudades_destino al selector de el html
    for (let i = 0; i < ciutats.length; i++) {
        let option = document.createElement("option");
        option.value = ciutats[i];
        option.innerHTML = ciutats[i];

        ciudades_destino.appendChild(option);
    }


    // Buscamos un vuelo
    document.getElementById("myBtn_bus").addEventListener("click", function () {
        //booleano para saber si estan bien las credenciales
        var flag_reserva = true;

        //recojemos los valores
        let OrigenSelect = document.getElementById("ciudades_origen").value; //agafo id del select_origen
        let DestinoSelect = document.getElementById("ciudades_destino").value; //agafo id del select_destino
        let fecha_ida = document.getElementById("ida_date").value;
        let fecha_vuelta = document.getElementById("vuelta_date").value;
        let numero_pasajeros = document.getElementById("pasajeros").value;

        // creamos un array para almacenar las edades de los pasajeros
        let edades_pasajeros = [];

        // hacemos un bucle con el numero de pasajeros i añadimos sus edades
        for (let i = 1; i <= numero_pasajeros; i++) {
            // leemos el valor
            let edad_pasajero = document.getElementById("EdadPasajero_" + i).value;
            // hacemos un push con la edad de el usuario al array
            edades_pasajeros.push(edad_pasajero);
        }

        // Obtenemos la fecha actual
        let fechaActual = new Date();

        // Convertimos las fechas de ida y vuelta en objetos de fecha
        let ob_fechaIda = new Date(fecha_ida);
        let ob_fechaVuelta = new Date(fecha_vuelta);

        //-------------------------------Realizar validaciones para la recerca ----------------------------------------

        // verificacion de origen/destino
        if (OrigenSelect == DestinoSelect) {
            // el origen i el destino son los mismos
            document.getElementById("errorOrigen").innerHTML = "El origen i el destino no pueden ser los mismos";
            document.getElementById("errorDestino").innerHTML = "El origen i el destino no pueden ser los mismos";
            document.getElementById("ciudades_origen").value = ciutats[0]; // ponemos la primera posicion del array para que cuando halla un error no este en blanco el campo origen
            document.getElementById("ciudades_destino").value = ciutats[0]; // ponemos la primera posicion del array para que cuando halla un error no este en blanco el campo destino
            flag_reserva = false;
        }
        if (OrigenSelect == DestinoSelect) {
            // el origen i el destino son los mismos
            document.getElementById("errorOrigen").innerHTML = "El origen i el destino no pueden ser los mismos";
            document.getElementById("errorDestino").innerHTML = "El origen i el destino no pueden ser los mismos";
            document.getElementById("ciudades_origen").value = ciutats[0]; // ponemos la primera posicion del array para que cuando halla un error no este en blanco el campo origen
            document.getElementById("ciudades_destino").value = ciutats[0]; // ponemos la primera posicion del array para que cuando halla un error no este en blanco el campo destino
            flag_reserva = false;
        } else {
            document.getElementById("errorOrigen").innerHTML = "";
            document.getElementById("errorDestino").innerHTML = "";
        }

        // verificacion de fecha ida i vuelta
        if (fecha_ida="") {
            // La fecha de ida es del pasado
            document.getElementById("errorIda_date").innerHTML = "La fecha no puede estar en blaco";
            document.getElementById("ida_date").value = "";
            flag_reserva = false;
        } else if (ob_fechaIda.getMonth() > (fechaActual.getMonth() + 6)) {
            // La fecha de ida es mallor a 6 messes
            document.getElementById("errorIda_date").innerHTML = "La fecha de ida no puede ser mallor a 6 meses";
            document.getElementById("ida_date").value = "";
            flag_reserva = false;
        } else if (ob_fechaVuelta < fechaActual) {
            // La fecha de vuelta es del pasado
            document.getElementById("errorVuelta_date").innerHTML = "La fecha de vuelta no puede ser del pasado";
            document.getElementById("vuelta_date").value = "";
            flag_reserva = false;
        } else if (ob_fechaVuelta < ob_fechaIda) {
            // La fecha de vuelta es menor que la ida
            document.getElementById("errorVuelta_date").innerHTML = "La fecha de vuelta no puede ser menor que la de ida";
            document.getElementById("vuelta_date").value = "";
            flag_reserva = false;
        } else if (ob_fechaVuelta.getMonth() > (fechaActual.getMonth() + 6)) {
            // La fecha de ida es mallor a 6 messes
            document.getElementById("errorVuelta_date").innerHTML = "La fecha de vuelta no puede ser mallor a 6 meses";
            document.getElementById("vuelta_date").value = "";
            flag_reserva = false;
        } else {
            document.getElementById("errorIda_date").innerHTML = "";
            document.getElementById("errorVuelta_date").innerHTML = "";
        }


        //verificacion de edad pasajeros
        //--------------------------
        // variable con el numero de adults, nens
        let num_adult = 0;
        let num_nen = 0;

        //hacemos un bucle para recorrer el array con las edades i verificarlas
        for (let i = 1; i <= numero_pasajeros; i++) {
            // verificamos las edades
            if (edades_pasajeros[i - 1] <= 0) {
                document.getElementById("ErrorEdad_" + i).innerHTML = "No puede tener una edad menor a 1 ";
                document.getElementById("EdadPasajero_" + i).value = "";
                flag_reserva = false;
            }
            else if (edades_pasajeros[i - 1] > 100) {
                document.getElementById("ErrorEdad_" + i).innerHTML = "No puede tener una edad mallor a 100";
                document.getElementById("EdadPasajero_" + i).value = "";
                flag_reserva = false;
            } else {
                document.getElementById("ErrorEdad_" + i).innerHTML = "";
            }

            //contamos los adultos i niños
            if (edades_pasajeros[i - 1] >= 16) {
                num_adult++;
            }
            else if (edades_pasajeros[i - 1] <= 15) {
                num_nen++;
            }

            //verificamos el numero de adultos i niños
            if (num_adult < 1) {
                document.getElementById("errorNum_edad_adult").innerHTML = "Minimo tiene que haber un adulto";
                flag_reserva = false;
            }
            else if (num_nen > 9) {
                document.getElementById("errorNum_edad_nen").innerHTML = "Maximo tiene que haber 9 niños";
                flag_reserva = false;
            } else {
                document.getElementById("errorNum_edad_adult").innerHTML = "";
                document.getElementById("errorNum_edad_nen").innerHTML = "";
            }

        }

        //comprovamos que los campos esten bien
        if (flag_reserva) { // si las credenciales estan bien
            //creamos la variable con el objeto de viatge i con la informacion de la reserva
            //let reserva = new Viatge(OrigenSelect, DestinoSelect, fecha_ida, fecha_vuelta);

            //mostramos la informacion de la reserva
            //console.log(reserva.printing_ida());

            //abrimos 
            window.open("Vuelo.html");

            //alert("Reserva echa");
        } else { // si alguna credencial esta mal
            event.preventDefault(); // Evita que se recargue la página || event.preventDefault() se utiliza en el controlador de eventos del botón para prevenir la acción predeterminada del formulario
        }
    });

});

