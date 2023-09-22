<? php 
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos el archivo functions que hemos creado para utilizar sus funciones
require_once './Funtions.php';
    myHeader(); 
    myMenu();

?>

<body>
    <?php
    //Main
    //----------------------------------------------------------------
    function main(): void
    {
        echo "<h2>Jugador 1</h2>";
        $num1 = Random_dado();
        echo "<img src=" . mostrar_dado($num1) . " stlye='width 250px' alt='Dado'>";
        
        echo "<h2>Jugador 2</h2>";
        $num2 = Random_dado();
        echo "<img src=" . mostrar_dado($num2) . " alt='Dado'>";
        
        echo ganador($num1, $num2);
    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>