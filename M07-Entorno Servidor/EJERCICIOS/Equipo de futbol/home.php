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
        //cargamos el contenido de la data i lo guardamos en otro array
        $data = loadData();

        //random
        $numero_random = Random(Random_min, Random_max);
    }

    //Web Code
    //----------------------------------------------------------------
    main();

    ?>
</body>

</html>