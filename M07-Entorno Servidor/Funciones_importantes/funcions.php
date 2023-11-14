<?php

/* ------------------------------------------- Funciones Arrays ---------------------------------------------------------------- */
/**
 * Funcion para mostrar un array multidimensional
 * @param array $array - Array que queremos mostrar
 */
function show_array_multidimensional(array $array)
{
    // Mostrar el array multidimensional
    echo "<pre>";
    foreach ($array as $fila) {
        foreach ($fila as $valor) {
            echo $valor . " ";
        }
        echo "<br>";
    }
    echo "</pre>";
}

?>