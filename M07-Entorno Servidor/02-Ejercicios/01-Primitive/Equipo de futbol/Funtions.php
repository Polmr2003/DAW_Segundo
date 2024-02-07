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
        <title>Equipo de futbol</title>
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
function mostrar_img($img): void
{
    echo "<img src='./img/" . $img . ".png' alt='" . $img . "'>";
}

/**
 * $String, $From, $To - Recojemos las variables que queremos utilizar en el metodo strtr
 * $string_strtr - guardamos el string que nos retorna el metodo
 * return - retornamos el string con el que hemos utilizado el strtr
 */
function Strtr_function($String, $From, $To)
{
    //Reemplazamos el contenido de el string a otro
    $string_strtr = strtr($String, [$From => $To]); // strtr: metodo para reemplazar una cadena de caracteres por otra a un string, $String es el string que queremos editar con el metodo, $From caracter que queremos cambiar, $To caracter al que queremos cambiar

    /*
    //strtr con dos argumentos
    strtr($String, [$From_1 => $To_1], [$From_2 => $To_2])
    */

    return $string_strtr;
}

/**
 * $letter_template - creamos el string con el contenido de la carta
 * return - retornamos el string
 */
function letter_template(): string
{
    $letter_template = <<<TEMPLATE
    Dear {{name}},
    Congratulations! You has been selected to be part of the Spanish national football team. 
    I wish you the best!
    TEMPLATE;

    return $letter_template;
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
 * $ruta_archivo - recivimos la ruta del archivo que queremos eliminar el contenido
 */
function limpiar_archivo($ruta_archivo)
{
    // Utiliza file_put_contents con una cadena vacía para borrar el contenido del archivo i poner el nuevo contenido
    return file_put_contents($ruta_archivo, '');
}

/**
 * $ruta_archivo, $contenido - recivimos la ruta del archivo i el contenido que queremos añadir al archivo
 */
function añadir_contenido($ruta_archivo, $contenido)
{
    // Utiliza file_put_contents para añadir contenido que le digamos a la ruta que le especifiquemos
    return file_put_contents($ruta_archivo, $contenido);
}

/**
 * $ruta_archivo, $contenido - recivimos la ruta del archivo i el contenido que queremos añadir al archivo
 * if - si se a añadido nos mostrara un mensaje de verificacion
 * else - si no se a añadido nos mostrara un mensaje de error
 */
function añadir_contenido_Con_verificacion($rutaArchivo, $contenido)
{
    if (file_put_contents($rutaArchivo, $contenido)) {
        //se a guardado el contenido
        echo "Los datos se han guardado exitosamente en el fichero '$rutaArchivo' .";
        echo "<br>";
    } else {
        //no se a guardado el contenido
        echo "Ha ocurrido un error al guardar los datos en el archivo.";
    }
}

/**
 * $rutaArchivo - recivimos la ruta del archivo que queremos leer
 * return - retornamos el fichero leido con el string
 */
function leer_contenido_archivo($rutaArchivo)
{
    // file_get_contents lee el contenido de un fichero i te devuelve un string con el contenido
    $file_read = file_get_contents($rutaArchivo);

    return $file_read;
}
