<?php
/*
Mostrar cabecera, menú, pie de página y mostrar por pantalla las cartas de todos los futbolistas
*/

//Llamada a los archivos 
require_once './funciones-estructura.php';
require_once './funciones.php';
require_once './funciones_archivos.php';
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
            <h2 class="bi bi-person-square"> Entrenadores</h2>
            <br>
            <br>
            <?php
            //llamo a la función que muestra los entrenadores
            read_info_csv_with_table_list($archivo_entrenadores, false);
            ?>
        </div>
    </div>
</body>

<!----- FOOTER ------>
<?php
myFooter();
?>