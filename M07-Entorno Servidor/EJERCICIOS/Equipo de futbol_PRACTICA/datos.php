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


// $futbolistas =["Aiden Froste" => ['nombre'=> "Aiden Froste", 'pais'=> "Japón", 'numCamisa' => 12, 'fechaNacimiento' => "22/2/2000", 'rol' => "delantero", 'numGoles' => 20, 'numPartidos' => 100],
//             "Axel Blaze" => ['nombre'=> "Axel Blaze", 'pais'=> "Japón", 'numCamisa' => 10, 'fechaNacimiento' => "30/5/1999", 'rol' => "delantero", 'numGoles' => 70, 'numPartidos' => 200],
//             "Billy Miller" => ['nombre'=> "Billy Miller", 'pais'=> "Japón", 'numCamisa' => 2, 'fechaNacimiento' => "8/6/1997", 'rol' => "defensa", 'numGoles' => 14, 'numPartidos' => 52],
//             "Caleb Stonewall" => ['nombre'=> "Caleb Stonewall", 'pais'=> "Japón", 'numCamisa' => 8, 'fechaNacimiento' => "8/2/2002", 'rol' => "centrocampista", 'numGoles' => 22, 'numPartidos' => 65],
//             "Claude Beacons" => ['nombre'=> "Claude Beacons", 'pais'=> "Corea", 'numCamisa' => 10, 'fechaNacimiento' => "9/5/2001", 'rol' => "delantero", 'numGoles' => 10, 'numPartidos' => 40],
//             "Cliff Parker" => ['nombre'=> "Cliff Parker", 'pais'=> "Japón", 'numCamisa' => 17, 'fechaNacimiento' => "3/3/2000", 'rol' => "defensa", 'numGoles' => 5, 'numPartidos' => 160],
//             "David Samford" => ['nombre'=> "David Samford", 'pais'=> "Japón", 'numCamisa' => 11, 'fechaNacimiento' => "24/1/1998", 'rol' => "delantero", 'numGoles' => 16, 'numPartidos' => 32],
//             "Derek Swing" => ['nombre'=> "Derek Swing", 'pais'=> "Japón", 'numCamisa' => 8, 'fechaNacimiento' => "8/9/2003", 'rol' => "centrocampista", 'numGoles' => 0, 'numPartidos' => 100],
//             "Heath Moore" => ['nombre'=> "Heath Moore", 'pais'=> "Japón", 'numCamisa' => 14, 'fechaNacimiento' => "5/2/2004", 'rol' => "delantero", 'numGoles' => 3, 'numPartidos' => 20],
//             "Isabelle Trick" => ['nombre'=> "Isabelle Trick", 'pais'=> "Japón", 'numCamisa' => 6, 'fechaNacimiento' => "16/7/1994", 'rol' => "centrocampista", 'numGoles' => 20, 'numPartidos' => 160],
//             "Jim Wraith" => ['nombre'=> "Jim Wraith", 'pais'=> "Japón", 'numCamisa' => 50, 'fechaNacimiento' => "28/10/1999", 'rol' => "defensa", 'numGoles' => 20, 'numPartidos' => 100],
//             "Jordan Greenway" => ['nombre'=> "Jordan Greenway", 'pais'=> "Japón", 'numCamisa' => 13, 'fechaNacimiento' => "26/9/1998", 'rol' => "centrocampista", 'numGoles' => 13, 'numPartidos' => 300],
//             "Jude Sharp" => ['nombre'=> "Jude Sharp", 'pais'=> "Japón", 'numCamisa' => 19, 'fechaNacimiento' => "14/4/2000", 'rol' => "centrocampista", 'numGoles' => 19, 'numPartidos' => 100],
//             "Nathan Swift" => ['nombre'=> "Nathan Swift", 'pais'=> "Japón", 'numCamisa' => 2, 'fechaNacimiento' => "22/11/2004", 'rol' => "defensa", 'numGoles' => 0, 'numPartidos' => 4],
//             "Nino Nango" => ['nombre'=> "Nino Nango", 'pais'=> "Japón", 'numCamisa' => 4, 'fechaNacimiento' => "4/12/1999", 'rol' => "centrocampista", 'numGoles' => 62, 'numPartidos' => 200],
//             "Sonny Wright" => ['nombre'=> "Sonny Wright", 'pais'=> "Japón", 'numCamisa' => 8, 'fechaNacimiento' => "3/11/1995", 'rol' => "delantero", 'numGoles' => 70, 'numPartidos' => 300],
//             "Tao Lu" => ['nombre'=> "Tao Lu", 'pais'=> "China", 'numCamisa' => 2, 'fechaNacimiento' => "15/3/2003", 'rol' => "defensa", 'numGoles' => 15, 'numPartidos' => 54],
//             "Tim Saunders" => ['nombre'=> "Tim Saunders", 'pais'=> "Japón", 'numCamisa' => 7, 'fechaNacimiento' => "7/7/1997", 'rol' => "portero", 'numGoles' => 0, 'numPartidos' => 203],
//             "Willow Proude" => ['nombre'=> "Willow Proude", 'pais'=> "Japón", 'numCamisa' => 7, 'fechaNacimiento' => "23/1/2001", 'rol' => "centrocampista", 'numGoles' => 5, 'numPartidos' => 14],
//             "Xiao Rau" => ['nombre'=> "Xiao Rau", 'pais'=> "China", 'numCamisa' => 3, 'fechaNacimiento' => "15/8/1998", 'rol' => "defensa", 'numGoles' => 15, 'numPartidos' => 43]
// ];

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


//variable con la plantilla de la carta 
$letter_template = <<<TEMPLATE
Dear {{name}},
Congratulations! You has been selected to be part of the Spanish national football team. 
I wish you the best!
TEMPLATE;
