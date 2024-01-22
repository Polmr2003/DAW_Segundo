<?php

//function that makes letters by a template using strtr() and saves all the templates with the players name in a associative array
function make_letters($names_array)
{

    $letter_template = <<<TEMPLATE
    Dear {{name}},
    Congratulations! You have been selected to be part of the Spanish national football team. 
    I wish you the best!
    TEMPLATE;


    $letters = [];

    foreach ($names_array as $key => $value) {
        $strParams = [
            '{{name}}' => $value,
        ];
        $letter =  strtr($letter_template, $strParams);
        $letters[] = $letter;
    }


    return $letters;
}

?>