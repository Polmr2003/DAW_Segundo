<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos el archivo functions que hemos creado para utilizar sus funciones
require_once './Funtions.php';
myHeader();
myMenu();

//funciones
start_session();

function menu()
{
    $menu = <<<HERE
    <ul>
    </li>
            <li class="nav-item">
                <a class="nav-link" href="./Juego_1.php">Juego 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./Juego_2.php">Juego 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./Juego_3.php">Juego 3</a>
            </li>
        </ul>
    HERE;
    echo $menu;
}
?>

<html>

<body>
    <?php
    //Main
    //----------------------------------------------------------------
    function main(): void
    {
        //contador de visitas de la paguina
        if (isset($_SESSION['visitas_home'])) { // isset comprueba una variable i devuelve un booleano (true: si esta creada i tiene valores | falso: si no esta creado o esta null)
            //si esta definida sumamos los puntos anteriores mas los que a sacado ahora
            $_SESSION['visitas_home']++;
        } else {
            // Si no está definida, la creamos e inicializamos con los puntos de la primera tirada
            $_SESSION['visitas_home'] = 1;
        }

        echo "As visitado esta pagina " . $_SESSION['visitas_home'] . " vez/es";
        
        menu();

    }

    //Web Code
    //----------------------------------------------------------------
    main();

    ?>
</body>

</html>