<?php 
    require_once './Funtions.php';
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
        echo "<h2>Jugador 1</h2>";
        $num1 = Random_dado();
        echo "<img src=" . mostrar_dado($num1) . ">";
        
        echo "<h2>Jugador 2</h2>";
        $num2 = Random_dado();
        echo "<img src=" . mostrar_dado($num2) . ">";
        
        echo ganador_2_jugadores($num1, $num2); 
    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>