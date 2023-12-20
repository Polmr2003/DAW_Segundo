<?php 
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos el archivo functions que hemos creado para utilizar sus funciones
require_once './funcions_estructura.php';
require_once './funcions_archivos.php';
require_once './funcions_array.php';
    myHeader(); 
    myMenu();
    
// creamos la session
session_start();
?>

<html>
<body>
    <?php
    //Function Main
    //----------------------------------------------------------------
    /**
     * $Title - cremaos la variable Title i guardamos el contenido en nuestro caso un titulo i un segundo titulo
     * echo - mostramos el Title para visualizar el contenido en nuestra paguina
     */
    function main(): void
    {
        //contador de visitas de la paguina
        if (isset($_SESSION['Jugador'])) { // isset comprueba una variable i devuelve un booleano (true: si esta creada i tiene valores | falso: si no esta creado o esta null)
            //si esta definida sumamos los puntos anteriores mas los que a sacado ahora
            $_SESSION['Jugador']++;
        } else {
            // Si no está definida, la creamos e inicializamos con los puntos de la primera tirada
            $_SESSION['Jugador'] = 1;
        }

        echo "As visitado esta pagina " . $_SESSION['Jugador'] . " vez/es";
        echo "<br>";
        
        //mostrar los jugadores
        read_info_csv_and_print_layout("../lligaACB - lligaACB.csv", 2);
    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>