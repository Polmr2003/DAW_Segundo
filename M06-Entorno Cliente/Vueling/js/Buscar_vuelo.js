//importamos el objeto vuelo
//import { Viatge } from "./Model/Viatge.js";

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
        let numero_adult = document.getElementById("Adultos").value;
        let numero_nen = document.getElementById("Nens").value;
        let numero_bebe = document.getElementById("Bebes").value;

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
        } else {
            document.getElementById("errorOrigen").innerHTML = "";
            document.getElementById("errorDestino").innerHTML = "";
        }

        // verificacion de fecha ida i vuelta
        if (fecha_ida == "") {
            // La fecha de ida esta en blanco
            document.getElementById("errorIda_date").innerHTML = "La fecha de ida no puede estar en blanco";
            document.getElementById("ida_date").value = "";
            flag_reserva = false;
        } else if (ob_fechaIda.getMonth() > (fechaActual.getMonth() + 6)) {
            // La fecha de ida es mallor a 6 messes
            document.getElementById("errorIda_date").innerHTML = "La fecha de ida no puede ser mallor a 6 meses";
            document.getElementById("ida_date").value = "";
            flag_reserva = false;
        } else if (ob_fechaIda < fechaActual) {
            // La fecha de ida es del pasado
            document.getElementById("errorIda_date").innerHTML = "La fecha de ida no puede ser del pasado";
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

        // Verficacion numero de pasajeros
        let Num_total_pas = Number(numero_adult) + Number(numero_nen) + Number(numero_bebe); //contamos cuantos adultos, niños i bebes a puesto el usuario

        if (numero_pasajeros < 1) {
            // si el numero de pasajeros es menor a 0
            document.getElementById("errorNum_pasajeros").innerHTML = "Minimo 1 persona";
        }
        else if (numero_pasajeros < Num_total_pas) {
            // si el numero de pasajeros es menor a el numero que a puesto el usuario
            document.getElementById("errorNum_pasajeros").innerHTML = "El numero con el total de pasajeros no puede ser menor que el total de Edad de los pasajeross";
        } else if (numero_pasajeros > Num_total_pas) {
            // si el numero de pasajeros es mallor a el numero que a puesto el usuario
            document.getElementById("errorNum_pasajeros").innerHTML = "Faltan personas por poner en Edad de los pasajeros";

        } else {
            document.getElementById("errorNum_pasajeros").innerHTML = "";
        }

        // Verificacion de edad pasajeros
        if (numero_adult < 1) {
            //si no hay ningun adulto
            document.getElementById("errorNum_edad_adult").innerHTML = "Minimo tiene que haber un adulto ";
            document.getElementById("Adultos").value = "";
            flag_reserva = false;
        } else {
            document.getElementById("errorNum_edad_adult").innerHTML = "";
        }

        if (numero_nen > 9) {
            //Si hay mas de 9 niños
            document.getElementById("errorNum_edad_nen").innerHTML = "Maximo 9 niños";
            document.getElementById("Nens").value = "";
            flag_reserva = false;
        } else {
            document.getElementById("errorNum_edad_nen").innerHTML = "";
        }

        if (numero_bebe > 9) {
            //si hay mas de 9 bebes
            document.getElementById("errorNum_edad_bebes").innerHTML = "Maximo 9 bebes";
            document.getElementById("Bebes").value = "";
            flag_reserva = false;
        } else {
            document.getElementById("errorNum_edad_bebes").innerHTML = "";
        }
        event.preventDefault();
        //comprovamos que los campos esten bien
        if (flag_reserva) { // si las credenciales estan bien
            // Crear una URL con parámetros para pasar los datos
            const url = `Vuelo.html?origen=${OrigenSelect}&destino=${DestinoSelect}&ida=${fecha_ida}&vuelta=${fecha_vuelta}&pasajeros=${numero_pasajeros}&adultos=${numero_adult}&nenos=${numero_nen}&bebes=${numero_bebe}`;

            // Redirigir a la página Vuelo.html con los datos en la URL
            window.location.href = url;
            //alert("Reserva echa");
        } else { // si alguna credencial esta mal
            event.preventDefault(); // Evita que se recargue la página || event.preventDefault() se utiliza en el controlador de eventos del botón para prevenir la acción predeterminada del formulario
        }
    });

});

