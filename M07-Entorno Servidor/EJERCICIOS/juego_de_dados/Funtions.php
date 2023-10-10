<?php
//_______________funciones______________________________
//------------------------------------------------------

function myHeader()
{
    $head = <<<CABECERA
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
                
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Juego de dados</title>
    </head>
    CABECERA;
    echo $head;
}

function myMenu()
{
    $menu = <<<HERE
            <div class="menu">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="./home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Juego_1.php">Juego 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Juego_2.php">Juego 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Juego_3.php">Juego 3</a>
                </li>
            </ul>
            </div>
            HERE;
    echo $menu;
    echo '<hr>';
}

function myFooter()
{
    $footerHTML = <<<MYFOOTER
            <footer>
                <hr>
                <p>
                @Provençana
                </p>
            </footer>
        MYFOOTER;
    echo $footerHTML;
    date_default_timezone_set('Europe/Madrid');

    $fechaActual = date("d-m-Y");
    $horaActual = date("h:i:s");

    echo "La fecha es: $fechaActual y la hora es $horaActual ";
}

/**
 * $someting - es la frase que queremos mostrar
 * return - con el return retornamos la frase con \n para que nos haga un salto de linea
 */
function println($something): string
{
    return "$something\n";
};

/**
 * $random - hacemos un random del 1 al 6 con los dos incluidos i los retornamos
 */
function Random_dado(): int
{
    return $random = rand(1, 6);
}

/**                                       
 * $random - recojemos un int
 * echo - mostramos con la etiqueta <img> de html i ponemos el random para mostrar la imagen con el nombre que tenga
 * -> en este caso es un numero i asi poderlo mostrar con el random
 */
function mostrar_dado($random): void
{
    echo "<img src='./img/" . $random . ".png' alt='" . $random . "'>";
}

/**
 * $cara - guardamos en esta variable lo que hemos capturado de la funcion Random_dado (un int)
 * mostrar_dado - mandamos la variable cara a la funcion mostrar_dado
 * return - retornamos la variable cara 
 */
function jugador_1(): int
{
    $cara = Random_dado();
    mostrar_dado($cara);
    return $cara;
}

/**
 * $cara - guardamos en esta variable lo que hemos capturado de la funcion Random_dado (un int)
 * mostrar_dado - mandamos la variable cara a la funcion mostrar_dado
 * return - retornamos la variable cara 
 */
function jugador_2(): int
{
    $cara = Random_dado();
    mostrar_dado($cara);
    return $cara;
}

/**
 * $cara - guardamos en esta variable lo que hemos capturado de la funcion Random_dado (un int)
 * mostrar_dado - mandamos la variable cara a la funcion mostrar_dado
 * return - retornamos la variable cara 
 */
function jugador_3(): int
{
    $cara = Random_dado();
    mostrar_dado($cara);
    return $cara;
}

/**
 * $cara_jugador_1, $cara_jugador_2 - recojemos las caras de el jugador 1 i jugador 2 (que es un int)
 * $message - creamos una variable vacia para que dependiendo de el resultado tenga un valor o otro
 * if - si el jugador 1 (el int) es mas grande que el del jugador dos, ponemos como mensaje que a ganado el jugador 1 
 * elseif - si es al reves i el jugador 2 es mas grande que el del jugador 1 entonces saldra que el jugador 2 a ganado
 * else - i si son iguales saldra empate
 * return - retornamos el String con el mensaje que hemos programado en las condiciones (is, elseif, else) 
 */
function ganador_2_jugadores($cara_jugador_1, $cara_jugador_2): string
{
    $message = "";
    if ($cara_jugador_1 > $cara_jugador_2) {
        $message = "<h2>Ha ganado el jugador 1</h2>";
    } elseif ($cara_jugador_1 < $cara_jugador_2) {
        $message = "<h2>Ha ganado el jugador 2</h2>";
    } else {
        $message = "<h2>Empate</h2>";
    }
    return $message;
}

/**
 * $cara_jugador_1, $cara_jugador_2, $cara_jugador_3 - recojemos las caras de el jugador 1, jugador 2 i jugador 3(que es un int)
 * $message - creamos una variable vacia para que dependiendo de el resultado tenga un valor o otro
 * if - si el jugador 1 (el int) es mas grande que el del jugador 2 i de el jugador 3, ponemos como mensaje que a ganado el jugador 1 
 * elseif - si el jugador 2 (el int) es mas grande que el del jugador 1 i de el jugador 3, ponemos como mensaje que a ganado el jugador 2
 * elseif - si el jugador 3 (el int) es mas grande que el del jugador 1 i de el jugador 2, ponemos como mensaje que a ganado el jugador 3 
 * elseif - si la cara del jugador 1 (el int) es igual a la del jugador 2 i del 3, ponemos que a habido empate de todos los jugadores
 * elseif - si la cara del jugador 1 (el int) es igual a la del jugador 2 , ponemos que a habido empate entre estos jugadores
 * elseif -  si la cara del jugador 1 (el int) es igual a la del jugador 3, ponemos que a habido empate entre estos jugadores
 * elseif -  si la cara del jugador 2 (el int) es igual a la del jugador 3, ponemos que a habido empate entre estos jugadores
 * return - retornamos el String con el mensaje que hemos programado en las condiciones (is, elseif, elseif, else) 
 */
function ganador_3_jugadores($dado_jug_1_1, $dado_jug_1_2, $dado_jug_2_1, $dado_jug_2_2, $dado_jug_3_1, $dado_jug_3_2): string
{
    //variables
    $message = "";
    $cara_jugador_1 = $dado_jug_1_1 + $dado_jug_1_2;
    $cara_jugador_2 = $dado_jug_2_1 + $dado_jug_2_2;
    $cara_jugador_3 = $dado_jug_3_1 + $dado_jug_3_2;

    //comprovamos quien a ganado
    if ($cara_jugador_1 > $cara_jugador_2 && $cara_jugador_1 > $cara_jugador_3) {
        $message = "<h2>Ha ganado el jugador 1</h2>";
    } elseif ($cara_jugador_2 > $cara_jugador_1 && $cara_jugador_2 > $cara_jugador_3) {
        $message = "<h2>Ha ganado el jugador 2</h2>";
    } elseif ($cara_jugador_3 > $cara_jugador_1 && $cara_jugador_3 > $cara_jugador_2) {
        $message = "<h2>Ha ganado el jugador 3</h2>";
    } elseif ($cara_jugador_1 == $cara_jugador_2 && $cara_jugador_2 == $cara_jugador_3) {
        $message = "<h2>Empate jugador 1, jugador 2 i 3</h2>";
    } elseif ($cara_jugador_1 == $cara_jugador_2) {
        $message = "<h2>Empate jugador 1 i jugador 2</h2>";
    } elseif ($cara_jugador_1 == $cara_jugador_3) {
        $message = "<h2>Empate jugador 1 i jugador 3</h2>";
    } elseif ($cara_jugador_2 == $cara_jugador_3) {
        $message = "<h2>Empate jugador 2 i 3</h2>";
    }
    return $message;
}

function start_session()
{
    return session_start();
};

function remove_session()
{
    // destroy the session
    return session_destroy();
}

function remove_var_session()
{
    // remove all session variables
    return session_unset();
}
