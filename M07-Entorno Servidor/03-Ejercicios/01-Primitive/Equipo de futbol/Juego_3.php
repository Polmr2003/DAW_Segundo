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
        // Cargamos la base de datos i lo guardamos en otro array
        $data = loadData();

        //leemos el fichero index.view.html donde esta la plantilla de la carta
        $file_read=leer_contenido_archivo('index.view.html');

        //recorremos el array con la base de datos
        for ($i = 0; $i < count($data); $i++) { //count para mirar el tamaño del array
            // cambiamos el contenido {{name}} de la  carta por el nombre de el jugador
            $carta = Strtr_function($file_read, "{{name}}", "$data[$i]");

            //mostramos las cartas con las etiquetas <pre> para sapararlas
            echo "<pre>";
            echo "$carta";
            echo "</pre>";
        }

        /* ---------------------------------- Leer un fichero txt i mostrarlo -----------------------------------------
        // Recorremos el array con la base de datos
        for ($i = 0; $i < count($data); $i++) { // count para mirar el tamaño del array
            // Ruta del archivo que estan guardadas las cartas i que vamos a leer
            $rutaArchivo = "cartas/$data[$i].txt"; // $data[$i]: nombre de el jugador .txt

            // Leemos el fichero con file_get_contents i guardamos el contenido a una variable
            $file_read=file_get_contents($rutaArchivo);

            // Mostramos el fichero leido
            echo "<pre>";
            echo "$file_read";
            echo "</pre>";
        }
        */
    }

    //Web Code
    //----------------------------------------------------------------
    main();

    ?>
</body>

</html>