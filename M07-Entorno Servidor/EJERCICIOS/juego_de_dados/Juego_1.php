<?php
//Forzar a que sea estricto en poner los datos --- tiene que estar antes que cualquier linea de codigo
declare(strict_types=1);

//importamos los archivos que hemos creado para utilizar sus funciones
require_once './Funtions.php';
myHeader();
myMenu();

//funciones
start_session();

//variables
const max_tiradas=3;

?>

<html>

<body>
    <?php
    //Main
    //----------------------------------------------------------------
    function main(): void
    {

        //contamos las tiradas de el jugador
        if (isset($_SESSION['tiradas'])) { // isset comprueba una variable i devuelve un booleano (true: si esta creada i tiene valores | falso: si no esta creado o esta null)
            $_SESSION['tiradas']++;
        } else {
            // Si no está definida, la creamos e inicializamos en 1
            $_SESSION['tiradas'] = 1;
        }

        if ($_SESSION['tiradas'] < max_tiradas+1) {
            //tiramos el dado i mostramos la imagen
            echo "<h2>Jugador 1</h2>";
            $num1 = Random_dado();
            echo "<img src=" . mostrar_dado($num1) . ">";

            // Comprobamos si la variable de sesión puntos está definida
            if (isset($_SESSION['puntos_jug_1'])) { // isset comprueba una variable i devuelve un booleano (true: si esta creada i tiene valores | falso: si no esta creado o esta null)
                //si esta definida sumra los puntos anteriores mas los que a sacado ahora
                $_SESSION['puntos_jug_1'] += $num1;
            } else {
                // Si no está definida, la creamos e inicializamos en 1
                $_SESSION['puntos_jug_1'] = $num1;
            }
            echo "</br>";
            echo "Total: " . $_SESSION['puntos_jug_1'] . " Puntos";
        } else {
            //eliminamos las variables de esta sesion
            remove_var_session();
            
            //mostramos que se an reiniciado los puntos
            echo"<h2><strong>Puntos Reiniciados</strong></h2>";
        }
    }

    //Web Code
    //----------------------------------------------------------------
    main();

    ?>
</body>

</html>