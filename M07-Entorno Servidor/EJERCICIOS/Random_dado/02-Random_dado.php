<?php

function Random_dado(){
    return $random= rand(1,6);
}

function mostrar_dado($random){
    echo "<img src='./". $random. ".png' alt='".$random."'>";
}

//Main
//-------------------
function main(): void{
    $cara = Random_dado();
    mostrar_dado($cara);
}

//Web code
//----------
main();

?>
