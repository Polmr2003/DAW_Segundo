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
    //Main
    //----------------------------------------------------------------
    function main(): void
    {
        $arrayAsociativo=Array_Asociativo();
        printArray_Asociativo_ByPHPFunctions($arrayAsociativo);
    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>