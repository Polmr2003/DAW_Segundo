<?php 
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos el archivo functions que hemos creado para utilizar sus funciones
require_once './Funtions.php';
    myHeader(); 
    myMenu();

//funciones
function menu(){
    $menu=<<<HERE
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
        menu();
    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>