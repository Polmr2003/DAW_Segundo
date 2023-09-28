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

        echo "<h2>Jugador 1</h2>";
        $num1 = Random_dado();
        echo "<img src=" . mostrar_dado($num1) . ">";
        
        echo "<h2>Jugador 2</h2>";
        $num2 = Random_dado();
        echo "<img src=" . mostrar_dado($num2) . ">";
        
        echo ganador($num1, $num2);
    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>