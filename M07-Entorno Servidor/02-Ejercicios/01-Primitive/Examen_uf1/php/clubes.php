<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos el archivo functions que hemos creado para utilizar sus funciones
require_once './funcions_estructura.php';
require_once './funcions_archivos.php';
require_once './funcions_array.php';

// funciones
myHeader();
myMenu();


// creamos la session
session_start();
?>

<html>

<body>
    <?php
    //Main
    //----------------------------------------------------------------
    function main(): void
    {
        //contador de visitas de la paguina
        if (isset($_SESSION['clubes'])) { // isset comprueba una variable i devuelve un booleano (true: si esta creada i tiene valores | falso: si no esta creado o esta null)
            //si esta definida sumamos los puntos anteriores mas los que a sacado ahora
            $_SESSION['clubes']++;
        } else {
            // Si no está definida, la creamos e inicializamos con los puntos de la primera tirada
            $_SESSION['clubes'] = 1;
        }

        echo "As visitado esta pagina " . $_SESSION['clubes'] . " vez/es";
        echo "<br>";


        // recojemos los valores de el fichero clubs.txt
        $data_txt=read_info_txt_with_return("../clubs.txt");

        // pasamos los strings de los valores de el fichero a array para poder mostrar sus imagenes
        $array_content_txt=convert_string_in_array($data_txt);

        // hacemos un echo con las imagenes
        print_Array_with_img($array_content_txt);

    }

    //Web Code
    //----------------------------------------------------------------
    main();

    ?>
</body>

</html>