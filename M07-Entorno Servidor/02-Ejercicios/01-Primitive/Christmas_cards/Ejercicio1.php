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
        $random=Random(); //
        $imagenes_array= Christmas_img(); //variable que nos guarda el array con el nombre de todas las imagenes
        $imagenes_random=Random_contenido_de_Array($imagenes_array,$random); //variable que le pasamos el nombre con todas las imagenes a la funcion Random_contenido_de_Array
        $quitada_primera_img=quitar_primera_img($imagenes_random);//
        $añadida_img=Añadir_img($imagenes_random);//
        
        //***********************-Mostramos por pantalla-***********************/ //
            print('<h2>' . '<br>' . '*** Array Random ***' . '</h2>');
            echo '<hr>';
            //mostramos el array random
            mostrar_Array_de_img($imagenes_random);

            print('<h2>' . '<br>' . '*** Quitamos la primera imagen ***' . '</h2>');
            echo '<hr>';   
            //mostramos el array con la imagen quitada
            mostrar_Array_de_img($quitada_primera_img);

            print('<h2>' . '<br>' . '*** añadimos una imagen ***' . '</h2>');
            echo '<hr>';
            //mostramos el array con la imagen añadida
            mostrar_Array_de_img($añadida_img);

    }

    //Web Code
    //----------------------------------------------------------------
    main();
    
    ?>
</body>

</html>
