<?php 
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//Funtions print Array
//------------------------------------------------------------------------------------------------------------

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
 * $array - recojemos el array con todas las imagenes
 * $num_img - variable para indicar cuantas imagnes random queremos extraer
 * $claves_aleatorias - creamos la variable para almacenar los strings que nos pase el metodo array_rand
 * $imagenes_aletorias[] - es un array que nos almacena los string de la variable $clave_aleatorias con el nombre de la imagen
 * return - retornamos el array $imagenes_aleatorias[] con los strings de los nombres de las imagenes
 */
function Random_contenido_de_Array($array): mixed{ 
    $num_img=4;
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



// Crear Array
//-----------------------------------------------
function Christmas_img(){
    $img =['Muñeco_de_nieve', 'Adorno', 'Arbol', 'Chimenea', 'Papa_noel', 'Reno'];
    return $img;
}

?>