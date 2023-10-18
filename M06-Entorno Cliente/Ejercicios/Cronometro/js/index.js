//alemcenamos el intervalo que nos muetra que actualiza los segundos
let cronometro;

// cuando cargue la paguina
document.addEventListener("DOMContentLoaded", function () {
    // cuando le de click al boton con al id myBtn
    document.getElementById("Parar").addEventListener("click", function () {
        //paramos el cronometro
        clearInterval(cronometro); //se utiliza para detener o borrar un intervalo de tiempo previamente configurado con setInterval

        // Crear un objeto Date para obtener la fecha y hora actual
        let now = new Date();

        // Recoger los valores de las cajas
        let dia = now.getDay();
        let mes = now.getMonth();
        let año = now.getFullYear();
        let hora = now.getHours();
        let minutos = now.getMinutes();
        let segundos = now.getSeconds();

        // Definir los nombres de los meses y días de la semana
        let mesos = ["Gener", "Febrer", "Març", "Abril", "Maig", "Juny", "Juliol", "Agost", "Setembre", "Octubre", "Novembre", "Desembre"];
        let dies = ["Dilluns", "Dimarts", "Dimecres", "Dijous", "Divendres", "Dissabte", "Diumenge"];

        // Formatear la fecha y hora final
        let current_data = `${dies[dia - 1]} dia ${dia} de ${mesos[mes]} de ${año}, ${hora}:${minutos}:${segundos}`; // ${dies[dia - 1]} : nombre de el dia ||  ${dia} : numero del dia || ${mesos[mes]} : nombre del mes ...

        // Mostrar la fecha final en un cuadro de diálogo
        alert(current_data);

    });

    document.getElementById("iniciar").addEventListener("click", function () {
        let segundos = 0;
        // Función para actualizar y mostrar el contador de segundos
        function actualizarCronometro() {
            segundos++;
            document.getElementById("contador").innerHTML = segundos + " segundos";
        }

        // Actualiza el cronómetro cada segundo (1000 milisegundos)
        cronometro =setInterval(actualizarCronometro, 1000);

    });

});
