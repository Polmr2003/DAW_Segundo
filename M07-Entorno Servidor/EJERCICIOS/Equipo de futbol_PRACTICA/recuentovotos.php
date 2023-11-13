<?php
/*
Mostrar cabecera, menú, pie de página recuento votos y frases
*/

//Llamada a los archivos 
require_once './funciones-estructura.php';
require_once './funciones.php';
require_once './datos.php';

//Llamada a las funciones
myHeader();
session_start();

// si la variable de session login no esta creada redirigimos a la pagina de login
if (isset($_SESSION['login'])) {
    menuLogin();
} else {
    myMenu();
}

// array con el numero de frases para votar
$data = read_data_txt_with_return($archivo_frases);
$frases_length = convertir_string_in_array($data);

// array con el numero de votos de frases para votar inicializadas
$num_votos_frases_inicializadas = inicializar_votos_with_return($frases_length);

// si aun no hemos inicializado los votos o an añadido nuevas frases
if (!isset($_SESSION["votos_reiniciados"])) {
    // inicializamos los votos de las frases a 0
    inicializar_votos($frases_length);
    $_SESSION["votos_reiniciados"] = "yes";
} else if ($num_votos_frases_inicializadas < $frases_length) {
    echo "<h1>adiosssssss</h1>";
    // si an añadido mas frases inicializamos el numero de votos para esa frase
    $data = [];

    for ($i = $num_votos_frases_inicializadas; $i <= count($frases_length); $i++) {
        $data[] = [0];
    }

    write_info_in_csv("votos.csv", $data);
}



?>
<!------------------------------------------------------------------------------------------------------>

<!------ WEB CODE ----->

<body>
    <div class="container">
        <div class="row align-items-start">
            <h2 class="bi bi-star"> Votos totales</h2>
            <br>
            <br>
            <?php
            $votos_archivo = read_info_csv_with_return($archivo_votos); //leemos el archivo con los votos
            
            $frases = explode("\n", $data); //convertimos el string frases en un array 
            
            $votos = array_map('current', $votos_archivo); //convertimos array multidimensional en array unidimensional
            
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th>Frases:</th>";
            echo "<th>Votos:</th>";
            echo "</tr>";

            for ($i = 0; $i < count($frases); $i++) {
                echo "<tr>";
                echo "<td>" . $frases[$i] . "</td>";
                echo "<td>" . $votos[$i] . "</td>";
                echo "</tr>";
            }

            echo "</table>";


            ?>
        </div>
    </div>
</body>



<!----- FOOTER ------>
<?php
myFooter();
?>