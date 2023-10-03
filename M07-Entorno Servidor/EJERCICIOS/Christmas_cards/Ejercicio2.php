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
        $random=Random();
        $ciudades=Ciudades_array();
        $imagenes_array= Christmas_img(); //variable que nos guarda el array con el nombre de todas las imagenes
        
        $informacion_img=informacion_img($ciudades, $imagenes_array);
        $info_img_par=img_pares($informacion_img);
        $info_img_inpar=img_impares($informacion_img);
        
        //***********************-Mostramos por pantalla-***********************/ //
            print('<h2>' . '<br>' . '*** Array asociativo ***' . '</h2>');
            echo '<hr>';
            //mostramos el array random
            imprimir_img_con_informacion($imagenes_array, $informacion_img);

            print('<h2>' . '<br>' . '*** iconos pares ***' . '</h2>');
            echo '<hr>';   
            //mostramos el array con la imagen quitada
            imprimir_img_con_informacion($imagenes_array, $info_img_par);

            print('<h2>' . '<br>' . '*** iconos impares ***' . '</h2>');
            echo '<hr>';
            //mostramos el array con la imagen añadida
            imprimir_img_con_informacion($imagenes_array, $info_img_inpar);

    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>
