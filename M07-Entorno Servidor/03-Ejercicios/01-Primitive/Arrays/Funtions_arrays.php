<?php 
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//Funtions print Array
//------------------------------------------------------------------------------------------------------------

/**
 * $array - recojemos el array para mostrarlo
 * print - mostramos como titulo 2 lo que hallamos puesto en este caso es *** Print ...
 * echo - ponemos la etiqueta hr para añadir una linea debajo de el print
 * print_Array_Asociativo_Pretty - llamamos esta funcion para recorrer el array i mostrarlo debajo de lo que hemos puesto en el print i el echo 
 */
function printArray_Asociativo_ByPHPFunctions($array)
{
    print('<h2>' . '<br>' . '*** Print Array Asociativo (print_r) ***' . '</h2>');
    echo '<hr>';
    print_Array_Asociativo_Pretty($array);
}

/**
 * $array - recojemos un array para mostrarlo
 * echo - recorremos i mostramos con el metodo print_r el array i en cada lado ponemos la etiqueta <pre> para mostrar el array de forma bonita 
 * -> ni que se ponga una linea de texto detras de la otra
 */
function print_Array_Asociativo_Pretty(mixed $array)
{
    echo "<pre>" . print_r($array, true) . "</pre>";
}

/**
 * $array - recojemos el array para mostrarlo
 * print - mostramos como titulo 2 lo que hallamos puesto en este caso es *** Print ...
 * echo - ponemos la etiqueta hr para añadir una linea debajo de el print
 * print_Array_Indexado - llamamos esta funcion para recorrer el array i mostrarlo debajo de lo que hemos puesto en el print i el echo 
 */
function printArray_Indexado_ByPHPFunctions($array)
{
    print('<h2>' . '<br>' . '*** Print Array Indexado ***' . '</h2>');
    echo '<hr>';
    print_Array_Indexado($array);
}

/**
 * $array - recojemos el array para mostrarlo
 * foreach - recorremos el array con esta opcion i lo mostramos con el echo
 */
function print_Array_Indexado($array){
    //para mostrar el array
    foreach ($array as $value) {
        echo $value . '<br>';
    };
};

/**
 * $array - recojemos el array para mostrarlo
 * print - mostramos como titulo 2 lo que hallamos puesto en este caso es *** Print ...
 * echo - ponemos la etiqueta hr para añadir una linea debajo de el print
 * print_Array_Multidimensional - llamamos esta funcion para recorrer el array i mostrarlo debajo de lo que hemos puesto en el print i el echo 
 */
function printArray_Multidimensional_ByPHPFunctions($array)
{
    print('<h2>' . '<br>' . '*** Print Array Multidimensional (print_r) ***' . '</h2>');
    echo '<hr>';
    print_Array_Multidimensional_pretty($array);
}

/**
 * $array - recojemos un array para mostrarlo
 * echo - recorremos i mostramos con el metodo print_r el array i en cada lado ponemos la etiqueta <pre> para mostrar el array de forma bonita 
 * -> ni que se ponga una linea de texto detras de la otra
 */
function print_Array_Multidimensional_pretty($array)
{
    echo "<pre>" . print_r($array, true) . "</pre>";
};

// Crear Arrays
//-----------------------------------------------
function Array_indexado(){
    $Array = ['1', '2', '3'];
    return $Array;
};

function Array_Asociativo(){
    /*$html = array();

    //ponemos las variables
    $html['title'] = 'PHP Associative Arrays';
    $html['description'] = 'Learn how to use associative arrays in PHP';
    return $html;
    */

    $Array= [
        '1'=>'Numero 1',
        '2'=>'Numero 2', 
        '3'=>'Numero 3'       
    ];
    return $Array;
};

function Array_Multidimensional(){
    $Array= [
	    ['Numero_1', 1],
	    ['Numero_2', 2],
	    ['Numero_3', 3],
	    ['Numero_4', 4],
    ];
    return $Array;
}

?>

