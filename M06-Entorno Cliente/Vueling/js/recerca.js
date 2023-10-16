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
    let ciudades = [];

    // Buscamos un vuelo
    document.getElementById("myBtn_rec").addEventListener("click", function () {
        //booleano para saber si estan bien las credenciales
        var flag_recerca = true;

        //recojemos los valores
        let origen = document.getElementById("origen").value;
        let destino = document.getElementById("destino").value;
        let fecha_ida = document.getElementById("ida_date").value;
        let fecha_vuelta = document.getElementById("vuelta_date").value;

        // Obtenemos la fecha actual
        let fechaActual = new Date();

        // Convertimos las fechas de ida y vuelta en objetos de fecha
        let fechaIda = new Date(fecha_ida);
        let fechaVuelta = new Date(fecha_vuelta);


        //-------------------------------Realizar validaciones para la recerca ----------------------------------------

        // verificacion de origen/destino
        if (origen == destino) {
            // el origen i el destino son los mismos
            document.getElementById("errorOrigen").innerHTML = "El origen i el destino no pueden ser los mismos";
            document.getElementById("errorDestino").innerHTML = "El origen i el destino no pueden ser los mismos";
            document.getElementById("origen").value = "";
            document.getElementById("destino").value = "";
            flag_recerca = false;
        } else {
            document.getElementById("errorOrigen").innerHTML = "";
            document.getElementById("errorDestino").innerHTML = "";
        }

        // verificacion de fecha ida i vuelta
        if (fechaIda < fechaActual) {
            // La fecha de ida es del pasado
            document.getElementById("errorIda_date").innerHTML = "La fecha de ida no puede ser del pasado";
            document.getElementById("ida_date").value = "";
            flag_recerca = false;
        } else if (fechaIda.getMonth() > (fechaActual.getMonth() + 6)) {
            // La fecha de ida es mallor a 6 messes
            document.getElementById("errorIda_date").innerHTML = "La fecha de ida no puede ser mallor a 6 meses";
            document.getElementById("ida_date").value = "";
            flag_recerca = false;
        } else if (fechaVuelta < fechaActual) {
            // La fecha de vuelta es del pasado
            document.getElementById("errorVuelta_date").innerHTML = "La fecha de vuelta no puede ser del pasado";
            document.getElementById("vuelta_date").value = "";
            flag_recerca = false;
        } else if (fechaVuelta < fechaIda) {
            // La fecha de vuelta es menor que la ida
            document.getElementById("errorVuelta_date").innerHTML = "La fecha de vuelta no puede ser menor que la de ida";
            document.getElementById("vuelta_date").value = "";
            flag_recerca = false;
        } else if (fechaVuelta.getMonth() > (fechaActual.getMonth() + 6)) {
            // La fecha de ida es mallor a 6 messes
            document.getElementById("errorVuelta_date").innerHTML = "La fecha de vuelta no puede ser mallor a 6 meses";
            document.getElementById("vuelta_date").value = "";
            flag_recerca = false;
        } else {
            document.getElementById("errorIda_date").innerHTML = "";
            document.getElementById("errorVuelta_date").innerHTML = "";
        }

        //comprovamos que los campos esten bien
        if (flag_recerca) { // si las credenciales estan bien
            alert("Recerca feta");
        } else { // si alguna credencial esta mal
            event.preventDefault(); // Evita que se recargue la página || event.preventDefault() se utiliza en el controlador de eventos del botón para prevenir la acción predeterminada del formulario
        }
    });

});

