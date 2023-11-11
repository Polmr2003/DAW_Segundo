<?php
/*
Mostrar cabecera, menú, pie de página y mostrar por pantalla las frases
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
            <h2 class="bi bi-blockquote-right"> Frases motivadoras </h2>
            <br>
            <?php
            //llamamos a la función que lee las frases del archivo txt
            read_data_txt($archivo_frases);
            ?>
            <br>
            <br>
            <form action="" method="post">
                <textarea id="texto" rows="2" cols="50" name="texto"></textarea>
                <br>
                <button class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['texto'])) {
        //Si los datos introducidos vienen desde el método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $frase = $_POST['texto'];

            //Sanear 
            $frase = trim(htmlspecialchars(strip_tags($frase ?? '')));
            
    
            // // Miramos si la frase contiene caracteres alfanumericos
            if (ctype_alnum($frase)) {
                //Escribir frase en el archivo txt
                write_data_in_txt($archivo_frases, $frase);
            }else{
                // si no tiene caracteres alfanumericos
                echo '<span style="color: red;">Solo se acepta caracteres alfanuméricos</span>';
            }

        }

    }
    ?>
</body>

<!----- FOOTER ------>
<?php
myFooter();
?>