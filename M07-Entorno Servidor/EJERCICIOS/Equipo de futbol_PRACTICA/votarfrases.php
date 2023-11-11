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
                    //variables para escribir en el csv
                    $data_input = $_POST['frase'] + 1;

                    // preparamos la variable para añadirla al fichero csv (hay que meterla en un array)
                    $data = read_data_txt_with_return($archivo_frases);
                    $array_data = convertir_string_in_array($data);

                    //$voto=contar_votos($data_input, $array_data);


                    //$array = [[$voto]];




                    //escribimos en el csv
                    //write_info_in_csv($archivo_votos, $array);
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