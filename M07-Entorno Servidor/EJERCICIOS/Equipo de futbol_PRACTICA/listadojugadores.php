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
            <h2 class="bi bi-person-vcard"> Lista de jugadores </h2>
            <br>
            <br>
            <?php
            //llamo a la función que muestra los futbolistas 
            $file_name = "jugadores.csv";

            write_info_in_csv($file_name, $futbolistas);
            $data=read_info_csv_with_return($file_name);

            //mostramos formato lista
            listar_jugadores($data);

            ?>
        </div>
    </div>
</body>

<!----- FOOTER ------>
<?php
myFooter();
?>