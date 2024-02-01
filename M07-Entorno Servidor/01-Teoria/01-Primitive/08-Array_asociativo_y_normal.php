<?php

//funciones
//-------------------------
function println($something){
    echo "$something\n";
};

function array_asociativo(){
    $capitals = [
        'Japan' => 'Tokyo',
        'France' => 'Paris',
        'Germany' => 'Berlin',
        'United Kingdom' => 'London',
        'United States' => 'Washington D.C.'
    ];
    
    foreach ($capitals as $country => $capital) {
        echo "The capital city of {$country} is $capital" . '<br>';
    };
};

function array_indexado (){ /*Array normal*/
    $colors = ['red', 'green', 'blue'];

    //para mostrar el array
    foreach ($colors as $color) {
	echo $color . '<br>';
    };
};

//Main
//-------------------------
function main() : void{
    echo "<h2> array asociativo </h2>";
    array_asociativo();
    
    echo "<h2> array normal </h2>";
    array_normal();
};

//mostrar Main
//-------------------------
main();
?>