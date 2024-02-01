<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos el archivo functions que hemos creado para utilizar sus funciones
require_once './Funtions.php';

//_________Main____________
//-------------------------
function main(): void{
    $cara_jugador_1=jugador_1();
    $cara_jugador_2=jugador_2();

    $mensaje_ganador= ganador($cara_jugador_1 , $cara_jugador_2);
    echo println($mensaje_ganador);
    
}

//Web code
//----------
main()

?>
