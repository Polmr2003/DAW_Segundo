<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//_______________funciones______________________________
//------------------------------------------------------

/**
 * $someting - es la frase que queremos mostrar
 * return - con el return retornamos la frase con \n para que nos haga un salto de linea
 */
function println($something){
    return "$something\n";
};

/**
 * $random - hacemos un random del 1 al 6 con los dos incluidos i los retornamos
 */
function Random_dado(){
    return $random= rand(1,6);
}

/**
 * $random - recojemos un int
 * echo - mostramos con la etiqueta <img> de html i ponemos el random para mostrar la imagen con el nombre que tenga
 * -> en este caso es un numero i asi poderlo mostrar con el random
 */
function mostrar_dado($random){
    echo "<img src='./". $random. ".png' alt='".$random."'>";
}

/**
 * $cara - guardamos en esta variable lo que hemos capturado de la funcion Random_dado (un int)
 * mostrar_dado - mandamos la variable cara a la funcion mostrar_dado
 * return - retornamos la variable cara 
 */
function jugador_1(){
    $cara = Random_dado();
    mostrar_dado($cara);
    return $cara;
}

/**
 * $cara - guardamos en esta variable lo que hemos capturado de la funcion Random_dado (un int)
 * mostrar_dado - mandamos la variable cara a la funcion mostrar_dado
 * return - retornamos la variable cara 
 */
function jugador_2(){
    $cara = Random_dado();
    mostrar_dado($cara);
    return $cara;
}

/**
 * 
 */
function ganador($cara_jugador_1 , $cara_jugador_2){
    $message;
    if($cara_jugador_1 > $cara_jugador_2){
        $message="<h2>A ganado el jugador 1</h2>";
    }elseif($cara_jugador_1 < $cara_jugador_2){
        $message="<h2>A ganado el jugador 2</h2>";
    }
    else{
        $message="<h2>Empate</h2>";
    }
    return $message;
}
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
