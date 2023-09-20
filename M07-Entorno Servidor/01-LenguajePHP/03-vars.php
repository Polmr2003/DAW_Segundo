<?php
header('Content-Type: text/plain', true); //para que respete el texto plano i se ponga como lo hemos puesto aqui
$x = "Hello world!";
$y = 'Hello world!';

echo $x;
echo "<br>";
echo $y . "<br>";

$x=10.365;
var_dump($x); //var_dump pone el valor de la variable i el tipo

$cadena1 = "Hello World!\n";
echo "Longitud cadena : " .strlen ($cadena1); // .strlen  cuenta los caracteres


?>