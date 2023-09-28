<?php
//_______________funciones______________________________
//------------------------------------------------------

function myHeader(){
    $head = <<<CABECERA
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
                
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Juego de dados</title>
    </head>
    CABECERA;
    echo $head;
};

function myMenu(){
            $menu=<<<HERE
            <div class="menu">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="./home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Ejercicio1.php">Exercici 1</a>
                </li>
            </ul>
            </div>
            HERE;
            echo $menu;
            echo '<hr>';
};

?>