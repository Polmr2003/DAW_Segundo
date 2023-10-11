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
                <li class="nav-item">
                    <a class="nav-link" href="./Juego_4.php">Juego 4</a>
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
 * $random - hacemos un random con el minimo que nos especifiquen i el maximo con los dos incluidos i retornamos el random
 */
function Random($min, $max): int
{
    return rand($min, $max);
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
