<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos los archivos que hemos creado para utilizar sus funciones
require_once './Funtions.php';
myHeader();
myMenu();

//funciones
start_session();

function puntos_ganadores($string)
{
    //comprovamos quien a ganado
    if ($string == "<h2>Ha ganado el jugador 1</h2>") {
        $_SESSION['puntos_jug_1']++;
    } elseif ($string == "<h2>Ha ganado el jugador 2</h2>") {
        $_SESSION['puntos_jug_2']++;
    } elseif ($string == "<h2>Ha ganado el jugador 3</h2>") {
        $_SESSION['puntos_jug_3']++;
    } elseif ($string == "<h2>Empate jugador 1, jugador 2 i 3</h2>") {
        $_SESSION['puntos_jug_1']++;
        $_SESSION['puntos_jug_2']++;
        $_SESSION['puntos_jug_3']++;
    } elseif ($string == "<h2>Empate jugador 1 i jugador 2</h2>") {
        $_SESSION['puntos_jug_1']++;
        $_SESSION['puntos_jug_2']++;
    } elseif ($string == "<h2>Empate jugador 1 i jugador 3</h2>") {
        $_SESSION['puntos_jug_1']++;
        $_SESSION['puntos_jug_3']++;
    } elseif ($string == "<h2>Empate jugador 2 i 3</h2>") {
        $_SESSION['puntos_jug_2']++;
        $_SESSION['puntos_jug_3']++;
    }
}

//variables
const max_tiradas = 5;

?>
<html>

<body>
    <?php
    //Main
    //----------------------------------------------------------------
    function main(): void
    {
        //contador de visitas de la paguina
        if (isset($_SESSION['visitas_juego_3'])) { // isset comprueba una variable i devuelve un booleano (true: si esta creada i tiene valores | falso: si no esta creado o esta null)
            //si esta definida sumamos los puntos anteriores mas los que a sacado ahora
            $_SESSION['visitas_juego_3']++;
        } else {
            // Si no está definida, la creamos e inicializamos con los puntos de la primera tirada
            $_SESSION['visitas_juego_3']=1;
        }

        echo "As visitado esta pagina " .$_SESSION['visitas_juego_3'] . " veces";


        //-------------------------------------------Juego de dados----------------------------------------

        //contamos las tiradas de el jugador
        if (isset($_SESSION['tiradas'])) { // isset comprueba una variable i devuelve un booleano (true: si esta creada i tiene valores | falso: si no esta creado o esta null)
            $_SESSION['tiradas']++;
        } else {
            // Si no está definida, la creamos e inicializamos en 1
            $_SESSION['tiradas'] = 1;
        }

        if ($_SESSION['tiradas'] <= max_tiradas) {
            //tiramos el dado i mostramos la imagen
            echo "<h2>Jugador 1</h2>";
            $num1_1 = Random_dado();
            echo "<img src=" . mostrar_dado($num1_1) . ">";
            $num1_2 = Random_dado();
            echo "<img src=" . mostrar_dado($num1_2) . ">";

            echo "<h2>Jugador 2</h2>";
            $num2_1 = Random_dado();
            echo "<img src=" . mostrar_dado($num2_1) . ">";
            $num2_2 = Random_dado();
            echo "<img src=" . mostrar_dado($num2_2) . ">";

            echo "<h2>Jugador 3</h2>";
            $num3_1 = Random_dado();
            echo "<img src=" . mostrar_dado($num3_1) . ">";
            $num3_2 = Random_dado();
            echo "<img src=" . mostrar_dado($num3_2) . ">";

            //guardamos el string con el ganador
            $ganador = ganador_3_jugadores($num1_1, $num1_2, $num2_1, $num2_2, $num3_1, $num3_2,);
            //la mostramos
            echo $ganador;

            // Comprobamos si la variable de sesión puntos está definida
            if (isset($_SESSION['puntos_jug_1']) && isset($_SESSION['puntos_jug_2'])  && isset($_SESSION['puntos_jug_3'])) { // isset comprueba una variable i devuelve un booleano (true: si esta creada i tiene valores | falso: si no esta creado o esta null)
                //si esta definida sumra los puntos anteriores mas los que a sacado ahora
                puntos_ganadores($ganador);
            } else {
                // Si no están definidas, las creamos e inicializamos a 0
                $_SESSION['puntos_jug_1'] = 0;
                $_SESSION['puntos_jug_2'] = 0;
                $_SESSION['puntos_jug_3'] = 0;

                //ponemos los puntos a el ganador/es de la primera tirada
                puntos_ganadores($ganador);
            }

            //mostramos los puntos de los jugadores
            echo "</br>";
            echo "Total Jugador 1: " . $_SESSION['puntos_jug_1'] . " Puntos";
            echo "</br>";
            echo "Total Jugador 2: " . $_SESSION['puntos_jug_2'] . " Puntos";
            echo "</br>";
            echo "Total Jugador 3: " . $_SESSION['puntos_jug_3'] . " Puntos";

            //mostramos cuantas tiradas llevamos
            echo "<br>";
            echo "<strong>As tirado: </strong>" . $_SESSION['tiradas'] . " veces";
        } else {
            //eliminamos las variables de sesion con los puntos
            unset($_SESSION['puntos_jug_1']);
            unset($_SESSION['puntos_jug_2']);
            unset($_SESSION['puntos_jug_3']);
            
            //eliminamos la variable con las tiradas
            unset($_SESSION['tiradas']);

            /*
            //eliminamos las variables de esta sesion
            remove_var_session();
            */

            //mostramos que se an reiniciado los puntos
            echo "<h2><strong>Puntos Reiniciados</strong></h2>";
        }
    }

    //Web Code
    //----------------------------------------------------------------
    main();

    ?>
</body>

</html>