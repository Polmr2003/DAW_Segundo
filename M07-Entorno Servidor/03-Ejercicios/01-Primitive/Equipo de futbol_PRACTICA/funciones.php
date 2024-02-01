<?php

//Archivo con todas las funciones 

//Llamada al archivo con todos los datos (variables) 
require_once './datos.php';
require_once './funciones_archivos.php';

//---------------------------------------------------------------------------------------------

/* ------------------------------------------- Funciones para crear el array futbolistas ---------------------------------------------------------------- */


/** 
 *Función que selecciona y devuelve una posición de jugador al azar del array position
 *@return: $posicion_aleatoria 
 */
function random_posicion()
{
    //posiciones de los jugadores
    $position = ['Defensa central', 'Defensa lateral', 'centrocampista', 'Delantero centro', 'Extremo'];

    //generamos un número aleatorio entre 0 y el índice del último elemento(-1) del array position
    $rand_position = rand(0, count($position) - 1);

    //usamos el número aleatorio para seleccionar un valor del array position
    $posicion_aleatoria = $position[$rand_position];
    return $posicion_aleatoria;
}


/** 
 *Función que selecciona y devuelve un país al azar del array pais_array
 *@return: $pais_aleatorio 
 */
function random_pais()
{
    //países de los jugadores
    $pais_array = ['Nueva York', 'París', 'Tokio', 'Río de Janeiro', 'Sídney', 'Ciudad del Cabo'];

    //generamos un número aleatorio entre 0 y el índice del último elemento(-1) del array pais_array
    $rand_pais = rand(0, count($pais_array) - 1);

    //usamos el número aleatorio para seleccionar un valor del array
    $pais_aleatorio = $pais_array[$rand_pais];
    return $pais_aleatorio;
}


/** 
 *Función que genera un número aleatorio entre 1 y 200
 *@return: $random 
 */
function random_goles()
{
    $random = rand(1, 200);

    return $random;
}


/** 
 *Función que genera un número aleatorio entre 1 y 45
 *@return: $random 
 */
function random_camisetas()
{
    $random = rand(1, 45);

    return $random;
}


/** 
 *Función que selecciona y devuelve una fecha al azar del array birthday_array
 *@return: $cumpleaños_random 
 */
function random_cumple()
{
    // cumpleaños de los jugadores
    $birthday_array = ["10/11/2003", "13/11/2002", "10/12/2003", "30/4/2000", "7/7/2003", "14/1/2006", "16/9/2000", "13/2/2002", "19/12/2006"];

    //generamos un número aleatorio entre 0 y el índice del último elemento(-1) del array birthday_array
    $rand_birthday = rand(0, count($birthday_array) - 1);

    //usamos el número aleatorio para seleccionar un valor del array 
    $cumpleaños_random = $birthday_array[$rand_birthday];
    return $cumpleaños_random;
}



/** 
 *Función que genera un número aleatorio entre 1 y 300
 *@return: $random 
 */
function random_partidos()
{
    $random = rand(1, 300);

    return $random;
}



/** 
 *Función que recibe una fecha de nacimiento(string), la formatea a tipo fecha y calcula la edad 
 *@param: $fechaNacimiento string 
 *@return: $edad calculo entre la $fechaNacimiento y la fecha actual
 */
function calcularEdad($fechaNacimiento)
{
    //Formatear string a tipo Date con el formato día/mes/año
    $fechaNacimiento = DateTime::createFromFormat('d/m/Y', $fechaNacimiento);
    //Crear variable que almacena la fecha actual
    $hoy = new DateTime();
    //Calcular la edad
    $edad = $hoy->diff($fechaNacimiento);

    return $edad->y;
}


/* ------------------------------------------- Funciones para los ejercicios (1,2,3 y 4) ---------------------------------------------------------------- */

/** 
 *Función que recibe un array y muestra la información de los futbolistas desde un archivo jugadoresTemplate.view.html
 *@param: $array con todos los futbolistas
 */
function mostrarJugadoresPlantilla(array $array)
{

    foreach ($array as $futbolista) {

        $plantilla_carta = file_get_contents('jugadoresTemplate.view.html'); //cogemos el contenido que hay en el archivo 

        //creamos un array asociativo --> clave = marca lo que queremos cambiar en la plantilla  | valor = datos del array
        $reemplazo = array(
            "{{nombre}}" => $futbolista['nombre'],
            "{{pais}}" => $futbolista['pais'],
            "{{numCamisa}}" => $futbolista['numCamisa'],
            "{{fechaNacimiento}}" => calcularEdad($futbolista['fechaNacimiento']),
            "{{rol}}" => $futbolista['rol'],
            "{{numGoles}}" => $futbolista['numGoles'],
            "{{numPartidos}}" => $futbolista['numPartidos']
        );

        //reemplazamos las claves con los valores y lo guardamos todo en la variable $jugador
        $jugador = strtr($plantilla_carta, $reemplazo);

        echo $jugador;
    }
}



/** 
 *Función que recibe un array, obtiene sus claves y devuelve un nuevo array con solo las claves 
 *@param: $array futbolistas 
 *@return: nuevo array con las claves 
 */
function seleccionarNombresFutbolistas(array $array): array
{

    $nombres_futbolistas = array_keys($array);
    return $nombres_futbolistas;
}


/**
 * Función que recibe un array y una plantilla y reemplaza el {{name}} con los nombres de los futbolistas a partir del array de claves
 * @param  string $letter_template plantilla de carta
 * @param  array  $array con los nombres de los futbolistas (claves del array)
 * @return array  $carta(strings) de los futbolistas que recibirán las cartas
 */
function reemplazarPlantillaCarta(string $letter_template, array $array): array
{

    $carta = []; //creación de un array vacío 

    //Recorrer array de claves 
    foreach ($array as $nombre) {
        //cadena a reemplazar "{{name}}" = texto que hay que reemplazar del $letter_template por $nombre = claves del array (nombre futbolistas)
        $reemplazo = array("{{name}}" => $nombre);
        //método strtr para hacer el reemplazo de la carta que devuelve un string
        $nombres_carta = strtr($letter_template, $reemplazo);
        //Array con el nombre del jugador como clave y el valor como carta
        $carta[] = ['nombre' => $nombre, 'carta' => $nombres_carta];
    }

    return $carta;
}



/** 
 *Función que recibe un array y genera archivos txt  
 *@param: $array con todas las cartas 
 */
function generarArchivostxtCartas(array $array): void
{

    //Carpeta donde se generan los archivos .txt
    $ruta_carpeta = './archivosTXT/';

    //Si la carpeta no está en el proyecto, crearla
    if (!is_dir($ruta_carpeta)) {
        mkdir($ruta_carpeta, 0755, true);
    }

    //Recorrer el array de las cartas
    foreach ($array as $carta) {
        $nombre_archivo = $carta['nombre'] . ".txt"; //nombre futbolista + .txt 
        $ruta_archivos = $ruta_carpeta . $nombre_archivo; //ruta de la carpeta + nombre fichero
        $datos = $carta['carta']; //la carta de cada futbolista
        //Se generan los archivos .txt pasando como argumento ruta + carta
        file_put_contents($ruta_archivos, $datos);

        //Mensaje que se muestra en la pantalla
        echo '<div class="col-md-4">';
        echo "Archivo " . $nombre_archivo . " generado";
        echo "</div>";
    }
}



/** 
 *Función que recibe un array y muestra el contenido 
 *@param: $array con todas las cartas 
 */
function mostrarCartasFutbolistas(array $array): void
{
    foreach ($array as $carta) {
        $nombre_futbolista = $carta['nombre'];
        $datos = $carta['carta'];
        echo '<div class="col-md-3">';
        echo "<br>";
        echo "<p><b>$nombre_futbolista</b></p>";
        echo "<pre>" . print_r($datos) . "</pre>";
        echo "<hr>";
        echo "</div>";
    }
}

/** 
 *Función que recibe un array y genera las cartas desde un archivo index.view.html
 *@param: $array con todas las cartas 
 */
function generarArchivosDesdeIndex(array $array): void
{
    foreach ($array as $carta) {
        $nombre_futbolista = $carta['nombre'];

        //Coger contenido que hay en archivo index.view.html
        $plantilla_carta = file_get_contents('index.view.html');

        //Reemplazar del archivo index.view.html el {{name}} por el nombre de cada futbolista
        $reemplazo = array("{{name}}" => $nombre_futbolista);

        //método strtr para hacer el reemplazo de la carta que devuelve un string
        $nombres_carta = strtr($plantilla_carta, $reemplazo);

        //Mostrar en pantalla
        echo '<div class="col-md-5">';
        echo "<p><b>$nombre_futbolista</b></p>";
        echo $nombres_carta;
        echo "<hr>";
        echo "</div>";
    }
}




/** 
 *Función que recibe un array e inicializa los votos en el archivo csv a 0
 *@param: $array_lenght_frases con todas lass frases
 */
function inicializar_votos(array $array_lenght_frases)
{
    $data = []; //inicializamos un arrau vacío

    //recorremos el array de las frases
    for ($i=0; $i < count($array_lenght_frases); $i++) { 
        $data[] = [0]; //añadimos al array data los votos a 0
    }

    //cuando añadimos todos los votos a 0 de todas las frases
    write_info_in_csv_with_Overwrite("votos.csv", $data); //escribimos el array data en el archivo
}

/** 
 *Función que recibe un array y muestra los jugadores
 * @param array $data : $array con los datos (jugadores)
 */
function listar_jugadores($data)
{
    //mostramos formato lista
    foreach ($data as $jugador) {
        echo "<ul>";
        echo "<li><b>Nombre:</b> " . $jugador[0] . "</li>";
        echo "<li><b>País:</b> " . $jugador[1] . "</li>";
        echo "<li><b>Dorsal:</b> " . $jugador[2] . "</li>";
        echo "<li><b>Fecha nacimiento:</b> " . $jugador[3] . "</li>";
        echo "<li><b>Posición:</b> " . $jugador[4] . "</li>";
        echo "<li><b>Goles marcados:</b> " . $jugador[5] . "</li>";
        echo "<li><b>Partidos jugados:</b> " . $jugador[6] . "</li>";
        echo "</ul>";
        echo "<hr>";
    }
}



?>
