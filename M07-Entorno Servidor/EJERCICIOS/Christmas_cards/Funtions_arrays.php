<?php 
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//Funtions print Array
//------------------------------------------------------------------------------------------------------------

/**
 * return - retornamos un numero aleatorio entre 1 i 10
 */
function Random(): int{
    return $random= rand(2,6);
}

/**                                       
 * $array - recojemos un int
 * foreach - recorremos el array, ponemos la etiqueta de img i mostramos las imagenes con el nombre que esten en el array
 */
function mostrar_Array_de_img($array): void{ 
    foreach ($array as $value) {
        echo "<img src='./img/". $value. ".png' width='100' height='100'>";      
    }
};

/**
 * 
 */
function imprimir_img_con_informacion($imagenes_array, $img_asociativo) {
    echo '<div style="display: flex; flex-wrap: wrap;">'; // ponemos un display flex para ponerlo una img al lado de otra

    foreach ($img_asociativo as $key_aso => $value_aso) {
        foreach ($imagenes_array as $value_array) {
            if ($value_array == $value_aso['nombre de archivo']) {
                // Contenedor para cada par de imagen e información, la ponemos para crear un contenedor para cada img i ponerlo bonito
                echo '<div style="margin: 10px; text-align: center;">';
                
                //mostramos img
                echo "<img src='./img/" . $value_aso['nombre de archivo'] . ".png' width='100' height='100'>";

                //mostramos info
                echo "<p> <strong>Tagname</strong> ={$value_aso['tagname']}</p>";
                echo "<p> <strong>Likes</strong> ={$value_aso['likes']}</p>";
                echo "<p> <strong>Nombre de archivo </strong> ={$value_aso['nombre de archivo']}</p>";
                echo "<p> <strong>ciudad</strong> ={$value_aso['ciudad']}</p>";

                echo '</div>'; // Cierre del contenedor
            }
        }
    }

    echo '</div>'; // Cierre del contenedor flex
}

/**
 * $array - recojemos el array con todas las imagenes
 * $random - recojermos un int, que cada vez nos dara uno diferente
 * $num_img - variable para indicar cuantas imagnes random queremos extraer i la asociamos a la variable $random
 * $claves_aleatorias - creamos la variable para almacenar los strings que nos pase el metodo array_rand
 * $imagenes_aletorias[] - es un array que nos almacena los string de la variable $clave_aleatorias con el nombre de la imagen
 * return - retornamos el array $imagenes_aleatorias[] con los strings de los nombres de las imagenes
 */
function Random_contenido_de_Array($array, $random): mixed{ 
    $num_img =$random;
    $claves_aleatorias = array_rand($array, $num_img); // array_rand nos extrae de manera random contenido de el string, en este caso como hemos puesto num_img que es 4, nos a 
                                                       // -> extraido 4 posiciones de el array con el nombre de las imagenes
    
    //añadimos los string que nos a extraido en claves_aleatorias que es un array - $variable=[$array[variable que contiene el array_rand[posicion de el string extraido]]...];
    for ($i = 0; $i < $num_img; $i++) { 
        //$imagenes_aleatorias=[$array[$claves_aleatorias[0]], $array[$claves_aleatorias[1]], $array[$claves_aleatorias[2]]];
        $imagenes_aleatorias[] = $array[$claves_aleatorias[$i]];
    }

    return $imagenes_aleatorias;
};

/**
 * $array - recojemos el array con todas las imagenes
 * $first_img - guardamos la primera img de el array
 * return - retornamos el array que le hemos quitado la primera img
 */
function quitar_primera_img($array): mixed{ 
    $first_img = array_shift($array); //array_shift quita el primer elemento de el array i lo devuevle

    return $array;
};

/**
 * $array - recojemos el array con todas las imagenes
 * $clave_aleatoria - creamos la variable para almacenar el string que nos pase el metodo array_rand
 * $imagen_aleatoria - es un array que nos almacena el string de la variable $clave_aleatorias con el nombre de la imagen
 * $array_con_imagen_añadida - variable para almacenar los dos arrays fusionados para que contenga el nombre de las imagenes que ya habia con la nueva que hemos añadido
 * return - retornamos la variable $array_con_imagen_añadida que contiene las 4 imagnes anteriores mas otra imagen random
 */
function Añadir_img($array): mixed{ 
    $clave_aleatoria = array_rand($array, 1); // array_rand nos extrae de manera random contenido de el string, en este caso como hemos puesto 1, nos a 
                                                       // -> extraido 1 posicion de el array con el nombre de las imagenes
    
    //añadimos el string que nos a extraido en imagen_aleatoria que es un array                                               
    $imagen_aleatoria=[$array[$clave_aleatoria]]; //en este caso como solo es un string no hace falta poner nada mas ([$i]) depues de $clave_aleatoria como en la funcion Random_contenido_de_Array
    
    //fusionamos los strings en uno solo
    $array_con_imagen_añadida = array_merge($array, $imagen_aleatoria); // array_merge fusiona dos arrays i los guarda en uno solo
    return $array_con_imagen_añadida;
};

/**
 * $img - recojemos el array con todas nuestras img con los valores
 * foreach - recorremos el array con el valor como nombre $icono
 * $tagname - cojemos las variables de el array con identificador de tagname
 * $numero - hacemos un filter_var para filtar el contenido de el tagname i lo almacene en la variable $numero
 * if - si el numero que hemos almecenado en la variable $numero es par entonces hara lo que pongamos dentro de el if
 * $img_par[] - guardamos en esta variable que es un array que contendra todas las imagenes que sean pares
 * return - retornamos todas las imagenes que esten en la variable $img_par
 */
function img_pares(mixed $img): mixed{
    foreach ($img as $icono) {
        $tagname = $icono["tagname"];
        // Extraer el número del identificador "tagname"
        $numero = filter_var($tagname, FILTER_SANITIZE_NUMBER_INT);//FILTER_SANITIZE_NUMBER_INT coje los numeros en la varible que hallas puesto
        
        if ($numero %2 == 0) {
            $img_par[] = $icono;
        }
    }
    return $img_par;
}

/**
 * $img - recojemos el array con todas nuestras img con los valores
 * foreach - recorremos el array con el valor como nombre $icono
 * $tagname - cojemos las variables de el array con identificador de tagname
 * $numero - hacemos un filter_var para filtar el contenido de el tagname i lo almacene en la variable $numero
 * if - si el numero que hemos almecenado en la variable $numero es inpar entonces hara lo que pongamos dentro de el if
 * $img_inpar[] - guardamos en esta variable que es un array que contendra todas las imagenes que sean inpares
 * return - retornamos todas las imagenes que esten en la variable $img_inpar
 */
function img_impares(mixed $img){
    foreach ($img as $icono) {
        $tagname = $icono["tagname"];
        // Extraer el número del identificador "tagname"
        $numero = filter_var($tagname, FILTER_SANITIZE_NUMBER_INT); //FILTER_SANITIZE_NUMBER_INT coje los numeros en la varible que hallas puesto
        
        if ($numero % 2 != 0) {
            $img_inpar[] = $icono;
        }
    }
    return $img_inpar;
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

// Crear Array
//-----------------------------------------------
function Christmas_img(){
    $img_array =['Muñeco_de_nieve', 'Adorno', 'Arbol', 'Chimenea', 'Papa_noel', 'Reno'];
    return $img_array;
}

/**
 * $ciudad - recojemos el array con las ciudades
 * $img_array - recojemos el array con las imagenes de las fotos
 * $ciudades_utilizadas - 
 * $ciudad_aleatoria -
 * while - Verificar si la ciudad ya se ha utilizado mirando si el resultado de $ciudad_aleatoria esta en el array $ciudades_utilizadas
 * $ciudades_utilizadas[] - 
 * $info_img - creamos un array de la informacion de una imagen
 * $iconos[] - cremoas la variable para guardar todos los array con la informacion de todas las imagenes 
 * rturn - retornamos el array con todos los iconos i identificadores con las variables
 */
function informacion_img($ciudad, $img_array){
    $ciudades_utilizadas = array(); // Para guardar las ciudades utilizadas

    for ($i = 0; $i < 6; $i++) {
        //cojemos una ciudad aleatoria
        $ciudad_aleatoria = $ciudad[array_rand($ciudad)];

        // Verificar si la ciudad ya se ha utilizado en otro icono
        while (in_array($ciudad_aleatoria, $ciudades_utilizadas)) { // in_array busca si existe un elemento en un array, si encuentra el elemento hara lo que le indiquemos abajo
            $ciudad_aleatoria = $ciudad[array_rand($ciudad)]; //vuelve a hacer un array_rand para cojer una ciudad aleatoria
        }

        // Agregar la ciudad al array de ciudades utilizadas
        $ciudades_utilizadas[] = $ciudad_aleatoria;

        //creamos la informacion de la img
        $info_img = array(
            "tagname" => "Icono " . ($i + 1), //ponemos el nombre de icono mas un numero que valla aumentando
            "likes" => rand(1, 100), // ponemos en likes un numero aleatorio entre 1 i 100
            "nombre de archivo" => "$img_array[$i]", //ponemos el nombre de la imagen que tenemos en el array de la variable $img_array i la posicion que ira aumentando
            "ciudad" => $ciudad_aleatoria // ponemos la ciudad aleatoria que halla salido con el array_rand
        );
        
        //añadimos el array $info_img en este array para guardar todos los que creemos
        $info_imgs[] = $info_img;
    }
    return $info_imgs;
}


function Ciudades_array(){
    $ciudades_array= ['Nueva York', 'París', 'Tokio', 'Río de Janeiro', 'Sídney', 'Ciudad del Cabo'];
    return $ciudades_array;
}

?>
