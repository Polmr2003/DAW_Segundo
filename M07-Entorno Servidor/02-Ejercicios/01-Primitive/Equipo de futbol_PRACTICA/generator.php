<?php
/*
Main que genera los archivos .html de las cartas de cada futbolista
*/

//Llamada a los archivos 
require_once './funciones.php';
require_once './datos.php';

//Main
//------------------------------------------------------------

/** 
*Función que recibe un array y genera archivos .html con todas las cartas 
*@param: $array futbolistas
*/
function main($futbolistas): void {

    //Carpeta donde se generan los archivos .html
    $ruta_carpeta = './archivosHTML/';

    //Si la carpeta no está en el proyecto, crearla
    if (!is_dir($ruta_carpeta)) {
        mkdir($ruta_carpeta, 0755, true); 
    }

    //Coger contenido que hay en archivo letterTemplate.view.html
    $plantilla_carta = file_get_contents('letterTemplate.view.html');

    //Llamar a las funciones para seleccionar las claves del array futbolistas y para reemplazar los nombres en las plantillas
    $cartas = reemplazarPlantillaCarta($plantilla_carta, seleccionarNombresFutbolistas($futbolistas));
    
    //Recorrer array de cartas
    foreach($cartas as $carta){
        $nombre_archivo= $carta['nombre'].".html";
        $ruta_archivos = $ruta_carpeta . $nombre_archivo;
        $datos= $carta['carta'];

        //Se generan los archivos .html pasando como argumento ruta + carta
        file_put_contents($ruta_archivos, $datos);
    }

    //print_r($cartas);

}


?>