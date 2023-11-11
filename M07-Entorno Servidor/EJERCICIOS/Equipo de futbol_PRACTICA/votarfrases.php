<?php
/*
Mostrar cabecera, menú, pie de página y mostrar por pantalla las cartas de todos los futbolistas
*/

//Llamada a los archivos 
require_once './funciones-estructura.php';
require_once './funciones.php';
require_once './funciones_archivos.php';
require_once './datos.php';

//Llamada a las funciones
myHeader();
menuLogin();

// iniciamos session
session_start();

// si la variable de session login no esta creada redirigimos a la pagina de login
if (!isset($_SESSION['login'])) {
    header('Location: Login.php');
}

// creamos las variables para inicializar los votos a 0
$data = read_data_txt_with_return($archivo_frases);
$array_data = convertir_string_in_array($data);

// si aun no hemos inicializado los votos
if (!isset($_SESSION["votos_reiniciados"])) {
    // inicializamos los votos de las frases a 0
    inicializar_votos($array_data);
    $_SESSION["votos_reiniciados"] = "yes";
}

?>
<!------------------------------------------------------------------------------------------------------>

<!------ WEB CODE ----->

<body>
    <div class="container">
        <div class="row align-items-start">
            <h2 class="bi bi-hand-thumbs-up"> Frases motivadoras </h2>
            <br>
            <br>
            <form action="" method="post">
                <?php
                //llamo a la función que muestra los entrenadores
                //read_line_x_line_in_txt($archivo_frases);
                $data = read_data_txt_with_return($archivo_frases);

                $array_data = convertir_string_in_array($data);

                foreach ($array_data as $index => $frase) {
                    echo "<p>";
                    echo "<input type='radio' id='frase$index' name='frase' value='$index'>";
                    echo "&nbsp;" . $index + 1 . "-";
                    echo "<label for='frase$index'>&nbsp;$frase</label><br>";
                    echo "</p>";
                }
                ?>
                <!-- Boton -->
                <button class="btn btn-primary">Votar</button>
            </form>

            <?php

            if (isset($_POST['frase'])) {
                // Si los datos introducidos vienen desde el método POST
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // numero de frase votada
                    $numero_frase = $_POST['frase'];

                    // array con el numero de votos de las frases
                    $votos_frases = read_info_csv_with_return($archivo_votos);

                    // array con el numero de votos de la frase votada
                    $numero_votos_frase = $votos_frases[$numero_frase];

                    // actualizamos los votos
                    foreach ($numero_votos_frase as $value) {
                        //sumamos un 1 a los votos
                        $vaule = $value++;

                        //añadimos los votos actualizados a un array
                        $votos_actualizados = [$value];

                        // actualizamos los votos
                        $votos_frases[$numero_frase] = $votos_actualizados;
                    }

                    echo "<pre>";
                    print_r($votos_frases);
                    echo "</pre>";

                    write_info_in_csv_with_Overwrite("votos.csv", $votos_frases);
                }
            }

            ?>
        </div>
    </div>

    <?php

    ?>
</body>

<!----- FOOTER ------>
<?php
myFooter();
?>