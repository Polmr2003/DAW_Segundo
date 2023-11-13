//array con los cursos
let cursos = ["daw", "dam", "asix"];

//selectores en el html que vamos a poner las ciudades
let cursos_select = document.getElementById("cursos");

//añadir las ciudades_origen al selector de el html
for (let i = 0; i < cursos.length; i++) {
    let option = document.createElement("option");
    option.value = cursos[i];
    option.innerHTML = cursos[i];

    cursos_select.appendChild(option);
}

// ------------------------------------------ borramos la localStorage ------------------------------------------
//cuando le demos al boton Cancel
document.getElementById("myBtn_logout").addEventListener("click", function () {
    // borramos la localStorage
    localStorage.removeItem("user");

    // cerramos esta paguina
    window.close(this);

    // redirigimos a la paguina con los cursos
    window.open("./index.html");
});