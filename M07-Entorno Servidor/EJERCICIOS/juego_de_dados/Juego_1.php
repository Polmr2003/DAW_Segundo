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
    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>