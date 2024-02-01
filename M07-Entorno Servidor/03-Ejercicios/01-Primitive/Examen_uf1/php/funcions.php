<?php
/*
Archivo con las funciones generales
*/
//---------------------------------------------------------------------------------------------------




/* ------------------------------------------- Calcular edad ---------------------------------------------------------------- */
/**
 * Funcion para calcular la edad de una persona
 * @param string $date - recojemos la fecha de su nacimiento
 * $fechaNacimiento - cremos la variable $fechaNacimiento para guardar la fecha que nacio la persona, pasandole la fecha que recojimos
 * $hoy - creamos el objeto con DateTime para ver la fecha actual
 * $edad - usamos el metodo diff i vemos la diferencia entre la fecha que nacio i la de ahora para saber cuantos años tiene, cuantos meses an pasado...
 * @return $edad -> y, - retornamos los años de diferencia (los años que tiene la persona)
 */
function calculate_age(string $date)
{
    // Formateamos la cadena a tipo Date con el formato día/mes/año
    $fechaNacimiento = DateTime::createFromFormat('d/m/Y', $date);

    // Creamos una variable que almacena la fecha actual
    $hoy = new DateTime();

    // Calculamos la edad usando el método diff de DateTime || diff -> Devuelve la diferencia entre dos objetos DateTime
    $edad = $hoy->diff($fechaNacimiento);

    // Devolvemos solo el componente de años de la diferencia (y) || y -> year, m -> month, d -> day
    return $edad->y;
}




/* ------------------------------------------- Funcion para hacer un salto de linea ---------------------------------------------------------------- */
/**
 * Funcion para hacer un salto de linea
 * @param string $someting - es la frase que queremos mostrar
 * return - con el return retornamos la frase con \n para que nos haga un salto de linea
 */
function println($something): string
{
    return "$something\n";
};




/* ------------------------------------------- Funcion para reemplazar un string por otro ---------------------------------------------------------------- */
/**
 * Funcion 
 * @param string $string - string al que le queremos reemplazar texto
 * @param string $From - texto que queremos cambiar
 * @param string $To - texto al que queremos cambiar
 * $string_strtr - guardamos el string que nos retorna el metodo
 * @return - retornamos el string con el que hemos utilizado el strtr
 */
function Strtr_function($string, $From, $To)
{
    //Reemplazamos el contenido de el string a otro
    $string_strtr = strtr($string, [$From => $To]); // strtr: metodo para reemplazar una cadena de caracteres por otra

    /*
    //strtr con dos argumentos
    strtr($String, [$From_1 => $To_1], [$From_2 => $To_2])
    */

    return $string_strtr;
}




/* ------------------------------------------- Funcion para mostrar contenido con display flex ---------------------------------------------------------------- */
/**
 * Funcion de muestra para poner el display flex
 * @param array $array - recojemos el array con el nombre de las imagenes
 * foreach - recorremos el array, ponemos la etiqueta de img i mostramos las imagenes con el nombre que esten en el array
 */
function print_content_with_display_flex($array)
{
    // Contenedor flex
    echo '<div style="display: flex; flex-wrap: wrap;">';

    //creamos un contenedor para guardar la informacion con las imagenes
    echo '<div style="margin: 10px; text-align: center;">';

    /*
        CONTENT
    */

    // Cierre del contenedor
    echo '</div>';

    // Cierre del contenedor flex
    echo '</div>';
}