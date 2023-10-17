<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos el archivo functions que hemos creado para utilizar sus funciones
require_once './data.php';
require_once './Funtions.php';

//mostramos el header i el menu
myHeader();
myMenu();

//maximo i minimo de jugadores
const Random_min = 1; // minimo jugaores
const Random_max = 10; // maximo jugadores

//$letters_array= make_letters($letter_template, $data); strtr
?>

<html>

<body>
    <?php
    //Main
    //----------------------------------------------------------------
    function main(): void
    {
        // cargamos el contenido de la data i lo guardamos en otro array
        $data_aso = loadData_aso();

        // titulo
        echo "<h2>bienvenida a la selección</h2>";

        // Contenedor flex para imágenes, la cremos para poner las imagenes una al lado de otra
        echo '<div style="display: flex; flex-wrap: wrap;">';
        // Recorremos el array
        foreach ($data_aso as $key => $value) {
            // Creamos un contenedor para guardar las imagenes con la informacion
            echo '<div style="margin: 10px; text-align: center;">';

            // Mostramos las imagenes con los nombres
            mostrar_img($key);
            echo "<br>";
            echo "<strong> Name: </strong> $key <br>";
            echo "<strong> City: </strong> {$value['city']}<br>";
            echo "<strong> Número </strong> {$value['num']}<br>";
            echo "<strong> Fecha de Nacimiento: </strong> {$value['birthday']}<br>";
            echo "<strong> Posición: </strong> {$value['position']}<br>";
            echo "<strong> Goles: </strong> {$value['Goal']}<br>";
            echo "<strong>Partidos jugados: </strong> {$value['matches']}<br>";

            echo '</div>'; // Cierre del contenedor
        }
        echo '</div>'; // Cierre del contenedor flex
    }

    //Web Code
    //----------------------------------------------------------------
    main();

    ?>
</body>

</html>