<?php
header('Content-Type: text/plain', true);
/*
Ejercicio:

Asignaa una variable una cadena y muestra por pantalla:
- cadena invertida:
- cuantas palabras tiene:
-cuantas 'a' contiene la cadena
- reemplazar las 'a' por 'A'

*/

$cadena ="Hola mundo";
$contador_a=0;

//cuantas palabras tiene
//-----------------------------
print "La cadena tiene: " . strlen ($cadena) /* strelen sirve para contar los caracteres*/ . " caracteres\n"; // los . son como los + en java

//frase al reves 
//------------------------------
print "Frase al reves: " . strrev ($cadena) /* strev sirve para poner al reves el string*/ . "\n"; //

//contar a
//-----------------------------
// for ($i=0; $i <$c ; $i++) { 
//     cadena
// } 
?>