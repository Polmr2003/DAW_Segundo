<?php
//Llamada al archivo con todos los datos (variables) 
require_once './datos.php';

/** 
 *Función que sobreescribe el contenido de un fichero csv i lo pone vacio
 * @param string $filename -  nombre de el fichero csv que queremos dejar vacio
 */
function clear_csv(string $filename)
{
    // open csv file for writing
    $f_write = fopen($filename, 'w'); // w: write | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/

    // Creamos un array vacio que luego utilizaremos para sobreescribir el csv
    $data = [];

    // write data in csv
    foreach ($data as $row) {
        fputcsv($f_write, $row);
    }

    // close the file
    fclose($f_write);
}

/** 
 *Función que lee contenido de un fichero csv i lo muestra
 * @param string $filename - nombre de el fichero csv en el que queremos leer la informacion
 * @param boolean $table - booleano donde decimos si queremos mostrarlo en tabla o no
 */
function read_info_csv(string $filename, bool $table)
{
    // Leemos los datos que habian anteriormente para no sobreescibir el fichero
    $f = fopen($filename, 'r'); // r: read | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/

    // Si no a podido abrir el fichero
    if ($f === false) {
        die('Error opening the file ' . $filename);
    }

    // array donde guardaremos la informacion de el csv
    $data = [];

    // Leemos el fihcero csv i ponemos los datos en el array data para luego mostrarlos o usarlos
    while (($row = fgetcsv($f)) !== false) {
        $data[] = $row;
    }

    if ($table) {
        // Mostramos el contenido del csv en formato tabla
        //Formato tabla 
        echo "<table class='table'>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Equipo</th>";
        echo "<th>Fecha de nacimiento</th>";
        echo "<th>Años de entrenamiento</th>";
        echo "<th>Nivel de liderazgo</th>";
        echo "<th>País</th>";
        echo "</tr>";

        foreach ($data as $entrenador) {
            echo "<tr>";
            echo "<td>" . $entrenador[0] . "</td>";
            echo "<td>" . $entrenador[1] . "</td>";
            echo "<td>" . $entrenador[2] . "</td>";
            echo "<td>" . $entrenador[3] . "</td>";
            echo "<td>" . $entrenador[4] . "</td>";
            echo "<td>" . $entrenador[5] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        // Mostramos el contenido del csv en formato lista 
        foreach ($data as $entrenador) {
            echo "<ul>";
            echo "<li><b>Nombre:</b> " . $entrenador[0] . "</li>";
            echo "<li><b>Equipo:</b> " . $entrenador[1] . "</li>";
            echo "<li><b>Fecha de nacimiento:</b> " . $entrenador[2] . "</li>";
            echo "<li><b>Años de entrenamiento:</b> " . $entrenador[3] . "</li>";
            echo "<li><b>Nivel de liderazgo:</b> " . $entrenador[4] . "</li>";
            echo "<li><b>País:</b> " . $entrenador[5] . "</li>";
            echo "</ul>";
            echo "<hr>";
        }
    }

    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";

    // close the file
    fclose($f);

    //retornamos el contenido
    //return $data;
}

/** 
 *Función que lee contenido de un fichero csv i retorna el contenido
 * @param string $filename - nombre de el fichero csv en el que queremos leer la informacion
 */
function read_info_csv_with_return(string $filename)
{
    // Leemos los datos que habian anteriormente para no sobreescibir el fichero
    $f = fopen($filename, 'r'); // r: read | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/

    // Si no a podido abrir el fichero
    if ($f === false) {
        die('Error opening the file ' . $filename);
    }

    // array donde guardaremos la informacion de el csv
    $data = [];

    // Leemos el fihcero csv i ponemos los datos en el array data para luego mostrarlos o usarlos
    while (($row = fgetcsv($f)) !== false) {
        $data[] = $row;
    }

    // Mostramos el contenido de el csv
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";

    // close the file
    fclose($f);

    //retornamos el contenido
    return $data;
}

/** 
 *Función que escribe contenido en un fichero csv
 * @param string $filename - nombre de el fichero csv en el que queremos escribir informacion
 * @param array $data - array con la informacion de el fichero
 * @param string $data_input - array con la informacion que querenos ponerle al fichero
 */
function write_info_in_csv(string $filename, array $data_input)
{
    if (!empty($data_input)) {
        // Leemos los datos que habian anteriormente para no sobreescibir el fichero
        $f = fopen($filename, 'r'); // r: read | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/


        // Si no a podido abrir el fichero
        if ($f === false) {
            die('Error opening the file ' . $filename);
        }


        // array donde guardaremos la informacion de el csv
        $data = [];


        // Leemos el fihcero csv i ponemos los datos en el array data para luego mostrarlos o usarlos
        while (($row = fgetcsv($f)) !== false) {
            $data[] = $row;
        }


        // close the file
        fclose($f);


        // Escribimos el nuevo usuario i contraseña con los que ya habian
        // open csv file for writing
        $f_write = fopen($filename, 'w'); // w: write | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/


        // Fusionamos los datos que ya habian mas los de ahora
        $data = array_merge($data, $data_input);


        // Mostramos el array que nos escribira en el fichero
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";


        // write data in csv
        foreach ($data as $row) {
            fputcsv($f_write, $row);
        }


        // close the file
        fclose($f_write);
    }
}


/** 
 *Función que lee contenido de un fichero txt linea a linea
 * @param string $filename - nombre de el fichero txt en el que queremos leer la informacion
 */
function read_line_x_line_in_txt(string $filename)
{
    // Leemos los datos que habian anteriormente para no sobreescibir el fichero
    $f = fopen($filename, 'r'); // r: read | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/

    // Si no a podido abrir el fichero
    if (!$f) {
        die('Error opening the file ' . $filename);
    }

    // array donde guardaremos la informacion de cada linea de el txt
    $data = [];

    // Leemos el fihcero txt i mientras que no halla acabado (feof mira si es el final) añade las lineas al array $data
    while (!feof($f)) {
        //si no a acabado el contenido de el txt
        $data[] = fgets($f); // añadimos las lineas a la varible con la informacion de el txt
    }

    // mostramos el contenido de el txt
    print_r($data);

    // cerramos el fichero
    fclose($f);

    // retornamos la informacion
    return $data;
}

/** 
 *Función que lee contenido de un fichero txt linea a linea
 * @param string $filename - nombre de el fichero txt en el que queremos leer la informacion
 */
function read_data_txt(string $filename)
{
    // Leemos los datos que habian anteriormente para no sobreescibir el fichero
    $f = fopen($filename, 'r'); // r: read | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/

    // Si no a podido abrir el fichero
    if (!$f) {
        die('Error opening the file ' . $filename);
    }

    // array donde guardaremos la informacion de cada linea de el txt
    $data = "";

    $data = fread($f, filesize($filename)); //fread --> leer todo el contenido || filesize --> mira el tamaño del archivo

    // cerramos el fichero
    fclose($f);

    // mostramos el contenido
    echo nl2br($data); //nl2br --> convierte caracteres de nueva línea en <br>

    // retornamos la informacion
    //return $data;
}

/** 
 *Función que lee contenido de un fichero txt linea a linea i lo devuelve
 * @param string $filename - nombre de el fichero txt en el que queremos leer la informacion
 */
function read_data_txt_with_return(string $filename)
{
    // Leemos los datos que habian anteriormente para no sobreescibir el fichero
    $f = fopen($filename, 'r'); // r: read | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/

    // Si no a podido abrir el fichero
    if (!$f) {
        die('Error opening the file ' . $filename);
    }

    // array donde guardaremos la informacion de cada linea de el txt
    $data = [];

    $data = fread($f, filesize($filename)); //fread --> leer todo el contenido || filesize --> mira el tamaño del archivo

    // cerramos el fichero
    fclose($f);

    // mostramos el contenido
    //echo nl2br($data); //nl2br --> convierte caracteres de nueva línea en <br>

    // retornamos la informacion
    return $data;
}

/** 
 * Función que escribe contenido en un fichero
 * @param string $filename - nombre de el fichero txt en el que queremos leer la informacion
 * @param string $data - contenido de el fichero que queremos añadir
 */
function write_data_in_txt(string $filename, string $data)
{
    // abrimos el fichero con el permiso 'a'
    $f = fopen($filename, 'a'); // a: no overwrite | view all the permission of the file: https://codigoroot.net/blog/escribir-archivos-de-texto-txt-con-php/ 

    // Si no a podido abrir el fichero
    if (!$f) {
        die('Error opening the file ' . $filename);
    }

    // Hacemos un salto de linea para escribir la nueva frase
    fwrite($f, PHP_EOL); // PHP_EOL = salto de linea

    // Escribimos el contenido en el fichero
    fwrite($f, $data);

    // Cerramos el fichero
    fclose($f);

    // Redirigimos a la misma paguina para que se actualize i se muestre el texto
    header('Location: frases.php'); //

}

/**
 * Funcion para convertir un string en un array (cada salto de linea en el string es una nueva posicion del array)
 * @param string $data - String que queremos pasar para convertirlo
 * @return mixed $data - string convertido en array
 */
function convertir_string_in_array(string $data): array
{
    $data = preg_split('/\R/', $data); /// \R/ --> salto de linea 
    return $data;
}





?>