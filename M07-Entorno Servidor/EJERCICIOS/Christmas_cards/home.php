<?php 
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos el archivo functions que hemos creado para utilizar sus funciones
require_once './Funtions_arrays.php';
require_once './Funtions.php';
    myHeader(); 
    myMenu();
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
        $Title = <<< TITULO
        <h1>Welcome</h1>
        <h2>Christmas</h2>
        <h2>Cards</h2>
        TITULO;

        echo $Title;
    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>