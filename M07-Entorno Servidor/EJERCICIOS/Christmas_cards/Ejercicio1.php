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
        //variables
        $imagenes_array= Christmas_img();
        $imagenes_random=Random_Array($imagenes_array);
        
        //mostramos el array
        mostrar_Array_de_img($imagenes_array);

        //mostramos el array random
        mostrar_Array_de_img($imagenes_random);
    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>
