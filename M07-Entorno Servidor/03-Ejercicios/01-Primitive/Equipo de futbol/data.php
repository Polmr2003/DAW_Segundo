<?php

function loadData()
{
    $data = ['Jug_1', 'Jug_2', 'Jug_3', 'Jug_4', 'Jug_5', 'Jug_6', 'Jug_7', 'Jug_8', 'Jug_9', 'Jug_10', 'Portero'];

    return $data;
}

function loadData_aso()
{
    //numero de jugadores
    $jugadores = 10;

    //array con la informacion de los jugadores
    $data = [];

    //posiciones de los jugadores
    $position = ['Defensa central', 'Defensa lateral', 'centrocampista', 'Delantero centro', 'Extremo'];

    // ciudades de los jugadores
    $city_array= ['Nueva York', 'París', 'Tokio', 'Río de Janeiro', 'Sídney', 'Ciudad del Cabo'];

    // cumpleaños de los jugadores
    $birthday_array= ['10/11/2003', '13/11/2002', '10/12/2003', '30/4/2000', '7/7/2003', '14/1/2006', '16/9/2000', '13/2/2002', '19/12/2006',];

    //añadimos los jugadores
    for ($i = 1; $i <= $jugadores; $i++) {
        //hacemos un random para generar una posicion aleatoria de el array de posiciones, ciudades i cumpleaños
        $rand_position = rand(0, count($position)-1);
        $rand_city = rand(0, count($city_array)-1);
        $rand_birthday= rand(0, count($birthday_array)-1); 

        //añadimos al jugador
        $data += [
            "Jug_$i" => [
                'city' => "$city_array[$rand_city]",
                'num' => $i,
                'birthday' => "$birthday_array[$rand_birthday]",
                'position' => "$position[$rand_position]",
                'Goal' => rand(1, 10),
                'matches' => rand(1, 30),
            ]
        ];
    }

    //añadimos al portero
    $data += [
        'Portero' => [
            'city' => 'Barcelona',
            'num' => '0',
            'birthday' => '10/12/2003',
            'position' => 'Portero',
            'Goal' => '0',
            'matches' => rand(1, 30),
        ]
    ];

    return $data;
}
