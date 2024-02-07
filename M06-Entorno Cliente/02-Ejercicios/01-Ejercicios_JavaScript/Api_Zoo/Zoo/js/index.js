// Cuando cargue la paguina
document.addEventListener('DOMContentLoaded', function () {
// Realizar una solicitud para obtener la lista de ciudades
fetch('http://localhost:3001/zoo/listar', {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json'
        // Puedes agregar otras cabeceras si es necesario
    }
})
    .then(response => response.json())
    .then(data => {
        // Verificar si hay errores en la respuesta
        if (data.error) {
            console.error('Error al obtener la lista de ciudades:', data.message);
            return;
        }

        // Obtener la lista de ciudades desde la respuesta
        let id= data.id;
        let especie= data.especie;
        let sexe= data.sexe;
        let any_naicement= data.any_naicement;
        let pais= data.pais;
        let continent= data.continent;

        // Select de las ciudades
        let table= document.getElementById("table");

        for (let i = 0; i < id.length; i++) {
            let id_option = document.createElement("tr");
            id_option.id = 'colum'+[i];

            table.appendChild(id_option);
        }

        for (let index = 0; index < id.length; index++) {
            let colum= document.getElementById("colum"+index);

            let id_option = document.createElement("td");
            id_option.value = id[index];
            id_option.innerHTML = id[index];

            colum.appendChild(id_option);

            let especie_option = document.createElement("td");
            especie_option.value = especie[index];
            especie_option.innerHTML = especie[index];

            colum.appendChild(especie_option);

            let sexe_option = document.createElement("td");
            sexe_option.value = sexe[index];
            sexe_option.innerHTML = sexe[index];

            colum.appendChild(sexe_option);

            let any_naicement_option = document.createElement("td");
            any_naicement_option.value = any_naicement[index];
            any_naicement_option.innerHTML = any_naicement[index];

            colum.appendChild(any_naicement_option);

            let pais_option = document.createElement("td");
            pais_option.value = pais[index];
            pais_option.innerHTML = pais[index];

            colum.appendChild(pais_option);
            

            let continent_option = document.createElement("td");
            continent_option.value = continent[index];
            continent_option.innerHTML = continent[index];

            colum.appendChild(continent_option);

        }
        
        
    })
    .catch(error => {
        console.error('Error al realizar la solicitud de ciudades:', error.message);
    });

});