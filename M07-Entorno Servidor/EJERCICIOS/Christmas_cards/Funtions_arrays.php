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

?>

