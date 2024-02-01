<?php
/*
Archivo con todos los datos del programa
*/

/*
Array con los siguientes datos de cada jugador (20 en total): clave = nombre imagen => valor = todos los datos 
    -nombre (string)
    -país (string)
    -número de camiseta (number)
    -fecha de nacimiento (string)
    -rol de jugador (string)
    -Número de goles marcados (number)
    -Número de partidos jugados (number)

*/

$futbolistas = [
    "Aiden Froste" => ['nombre' => "Aiden Froste", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' =>  random_partidos()],
    "Axel Blaze" => ['nombre' => "Axel Blaze", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' =>  random_partidos()],
    "Billy Miller" => ['nombre' => "Billy Miller", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' => random_partidos()],
    "Caleb Stonewall" => ['nombre' => "Caleb Stonewall", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' => random_partidos()],
    "Claude Beacons" => ['nombre' => "Claude Beacons", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' => random_partidos()],
    "Cliff Parker" => ['nombre' => "Cliff Parker", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' =>  random_partidos()],
    "David Samford" => ['nombre' => "David Samford", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' => random_partidos()],
    "Derek Swing" => ['nombre' => "Derek Swing", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' =>  random_partidos()],
    "Heath Moore" => ['nombre' => "Heath Moore", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' => random_partidos()],
    "Isabelle Trick" => ['nombre' => "Isabelle Trick", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' =>  random_partidos()],
    "Jim Wraith" => ['nombre' => "Jim Wraith", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' =>  random_partidos()],
    "Jordan Greenway" => ['nombre' => "Jordan Greenway", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' =>  random_partidos()],
    "Jude Sharp" => ['nombre' => "Jude Sharp", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' =>  random_partidos()],
    "Nathan Swift" => ['nombre' => "Nathan Swift", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' => random_partidos()],
    "Nino Nango" => ['nombre' => "Nino Nango", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' =>  random_partidos()],
    "Sonny Wright" => ['nombre' => "Sonny Wright", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' =>  random_partidos()],
    "Tao Lu" => ['nombre' => "Tao Lu", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' => random_partidos()],
    "Tim Saunders" => ['nombre' => "Tim Saunders", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' =>  random_partidos()],
    "Willow Proude" => ['nombre' => "Willow Proude", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' => random_partidos()],
    "Xiao Rau" => ['nombre' => "Xiao Rau", 'pais' => random_pais(), 'numCamisa' => random_camisetas(), 'fechaNacimiento' => random_cumple(), 'rol' => random_posicion(), 'numGoles' => random_goles(), 'numPartidos' => random_partidos()]
];

//Archivos csv
$archivo_entrenadores = "entrenadores.csv";
$archivo_paises = "paises.csv";
$archivo_usuarios = "usuarios.csv";
$archivo_jugadores = "jugadores.csv";
$archivo_votos="votos.csv";

//Archivo txt
$archivo_frases = "frasesMotivadoras.txt";


//variable con la plantilla de la carta 
$letter_template = <<<TEMPLATE
Dear {{name}},
Congratulations! You has been selected to be part of the Spanish national football team. 
I wish you the best!
TEMPLATE;
