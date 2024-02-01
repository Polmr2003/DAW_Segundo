<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos el archivo functions que hemos creado para utilizar sus funciones
require_once './data.php';
require_once './Funtions.php';

//mostramos el header i el menu
myHeader();
myMenu();

?>

<html>

<body>
    <?php
    //Main
    //----------------------------------------------------------------
    function main(): void
    {
        //cargamos la base de datos i lo guardamos en otro array
        $data = loadData();

        //recorremos el array con la base de datos
        for ($i = 0; $i < count($data); $i++) { //count para mirar el tamaño del array
            // cambiamos el contenido {{name}} de la  carta por el nombre de el jugador
            $carta = Strtr_function(letter_template(), "{{name}}", "$data[$i]");

            //mostramos las cartas con las etiquetas <pre> para sapararlas
            echo "<pre>";
            echo "$carta";
            echo "</pre>";
        }
    }

    //Web Code
    //----------------------------------------------------------------
    main();

    ?>
</body>

</html>