<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//Type casts
//----------------
function convert_to_int($input) : void{
    var_dump($input);

    var_dump($input + 3);

    //casting
    var_dump((int) $input); //convertimos el string en int
    var_dump((float) $input); //convertimos el string en float
}

//Main
//-------------------
function main(): void{
    convert_to_int("456");
}

//Web code
//----------
main();
?>