<?php 
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos los archivos que hemos creado para utilizar sus funciones
require_once './Funtions_arrays.php';
require_once './Funtions.php';
    myHeader(); 
    myMenu();

//funciones
inicio_sesion();
$_SESSION['visita']=0;
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
        //printamos el titulo
        echo(title());

        //
        $_SESSION['visitasd']++;


        print_r($_SESSION);
    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>