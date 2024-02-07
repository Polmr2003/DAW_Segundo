<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos los archivos que hemos creado para utilizar sus funciones
require_once './Funtions.php';
myHeader();
myMenu();

//variables
$numero = $_GET;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form get & post</title>
</head>

<body>

    <?php

    function verificar_numero()
    {
        if (isset($_GET["numero"])) {
            if ($_GET["numero"] < 1 || $_GET["numero"] > 20) {
                echo '<p style="color: red;">Numero incorrecto</p>';
                return false;
            }
            return true;
        }
    }

    if (isset($_GET["numero"]) && verificar_numero()) {
        echo ("el formulario se envio con exito <br>");
        echo "<pre>";
        print_r($_GET);
        echo "</pre>";
    }
    ?>

    <form action="" method="get">

        <div>
            Dime un numero entre 1 i 20 : <input type="text" name="numero" placeholder="NUMERO">
        </div>

        <div>
            <input type="submit" value="calcular">
        </div>

    </form>
</body>

</html>