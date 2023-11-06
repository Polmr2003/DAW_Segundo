<?php
/*
Mostrar cabecera, menú, pie de página y mostrar por pantalla las cartas de todos los futbolistas desde el archivo index.view.html
*/

//Llamada a los archivos 
require_once './funciones-estructura.php';
require_once './funciones.php';
require_once './datos.php';

//Llamada a las funciones
myHeader();
myMenu();
?>
<!------------------------------------------------------------------------------------------------------>

<!------ WEB CODE ----->

<body>
    <div class="container">
        <div class="row align-items-start">
            <h2 class="bi bi-filetype-html"> Cartas para los futbolistas</h2>
            <br>
            <br>
            <?php
            //llamo a la función que genera un array con todas las claves de los futbolistas
            $futbolistas_keys = seleccionarNombresFutbolistas($futbolistas);

            //llamo a la función que reemplaza los nombres de la plantilla por las claves de los futbolistas.
            $cartas = reemplazarPlantillaCarta($letter_template, $futbolistas_keys);

            //llamo a la función que genera las cartas desde el archivo index.view.html
            generarArchivosDesdeIndex($cartas);
            ?>
        </div>
    </div>
</body>

<!----- FOOTER ------>
<?php
myFooter();
?>