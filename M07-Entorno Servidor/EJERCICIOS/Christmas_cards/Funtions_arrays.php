<?php 
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//Funtions print Array
//------------------------------------------------------------------------------------------------------------
function printArray_Asociativo_ByPHPFunctions($array)
{
    print('<h2>' . '<br>' . '*** Print Array Asociativo (print_r) ***' . '</h2>');
    echo '<hr>';
    print_Array_Asociativo_Pretty($array);
}

function print_Array_Asociativo_Pretty(mixed $array)
{
    echo "<pre>" . print_r($array, true) . "</pre>";
}

function printArray_Indexado_ByPHPFunctions($array)
{
    print('<h2>' . '<br>' . '*** Print Array Indexado ***' . '</h2>');
    echo '<hr>';
    print_Array_Indexado($array);
}

function print_Array_Indexado($array){
    //para mostrar el array
    foreach ($array as $value) {
        echo $value . '<br>';
    };
};

function printArray_Multidimensional_ByPHPFunctions($array)
{
    print('<h2>' . '<br>' . '*** Print Array Multidimensional (print_r) ***' . '</h2>');
    echo '<hr>';
    print_Array_Multidimensional($array);
}

function print_Array_Multidimensional($array)
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
 * $random - hacemos un random del 1 al 6 con los dos incluidos i los retornamos
 */
function Random_Array($array): mixed{ 
    $random_array=array_rand($array, 3); //nos hace un random i nos devuelve 3 valores (int)
    
    return $random_array;
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

