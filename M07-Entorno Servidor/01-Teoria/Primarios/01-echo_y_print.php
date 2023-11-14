<?php
header('Content-Type: text/plain', true); //para que respete el texto plano i se ponga como lo hemos puesto aqui
// echo 'Cadena simple';
// echo 'HOLA
//     que tal estoy en DAW2
//     En ingles "don not" se ouede escribir "don\'t"'; // \= esto es para decir que no acaba la linea cuando pongas la '
    $years=10;
    
    $cadena ="Nuria tiene $years años \n"; // \n para salto de linea
    print($cadena);
    
    $cadena2= 'Nuria tiene ' . $years . ' Años';
    echo "Mi cadena 2 es $cadena2";
?>