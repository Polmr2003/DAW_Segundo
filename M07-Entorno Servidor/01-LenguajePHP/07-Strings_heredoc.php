<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//Strings heredoc
//----------------
$he = 'Bob';
$she = 'Alice';

$text = <<<TEXT
$he said "PHP is awesome".
"Of course" $she agreed."
TEXT;

echo $text;

//Ejemplo 2
//--------------------------------
$title ='My site';
$header= <<<HEADER
<header>
    <h1>$title</h1>
</header>
HEADER;
echo $header;
?>