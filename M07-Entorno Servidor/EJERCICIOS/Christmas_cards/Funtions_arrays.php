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

/**                                       
 * $array - recojemos un int
 * foreach - recorremos el array i ponemos la etiqueta de img i mostramos las imagenes con el nombre que esten en el array
 */
function mostrar_Array_de_img($array): void{ 
    foreach ($array as $value) {
        echo "<img src='./img/". $value. ".png' width='100' height='100'>";      
    }
};

/**
 * $claves_aleatorias - creamos la variable para almacenar los strings que nos pase el metodo array_rand
 * $imagenes_aletorias - es un array que nos almacena los string de la variable $clave_aleatorias
 * return - retornamos la variable $imagenes_aleatorias con los strings
 */
function Random_Array($array): mixed{ 
    $claves_aleatorias = array_rand($array, 3); // array_rand nos hace un random i nos extrae en este caso como hemos puesto 3 
                                                // -> nos a extraido 3 strings de el array
    
    //añadimos los string que nos a extraido en claves_aleatorias en un array - $variable=[$array[variable que contiene el array_rand[posicion de el string extraido]]...];
    $imagenes_aleatorias=[$array[$claves_aleatorias[0]], $array[$claves_aleatorias[1]], $array[$claves_aleatorias[2]]];

    return $imagenes_aleatorias;
};

// Crear Arrays
//-----------------------------------------------
function Array_indexado(){
    $Array = ['1', '2', '3'];
    return $Array;
};

function Array_Asociativo(){
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

function Christmas_img(){
    $img =['Muñeco_de_nieve', 'Adorno', 'Arbol', 'Chimenea', 'Papa_noel', 'Reno'];
    return $img;
}

?>