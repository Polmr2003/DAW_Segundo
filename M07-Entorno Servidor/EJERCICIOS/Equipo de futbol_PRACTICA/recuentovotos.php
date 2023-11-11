<?php
/*
Mostrar cabecera, menú, pie de página votos y frases
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
            
            ?>
        </div>
    </div>
</body>

<!----- FOOTER ------>
<?php
myFooter();
?>