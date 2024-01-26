<!--
Plantilla bàsica per a tota l'aplicació
-->


<?php
//obrim aquí la possibilitat de fer servir sessions ja que tot el que veurem estarà contingut a index.php
//no caldrà fer session_start a cap altre lloc/arxiu de la web!!!!

session_start(); // SESSION START ONLY NEEDS TO BE CALLED IN INDEX ---> Esta practica no requiere login, pero _SESSION se usará para mostrar errores e informacion

//declarem una sèrie de constants

$host = $_SERVER['HTTP_HOST']; // localhost
//echo $host; 

$path = rtrim(dirname($_SERVER['PHP_SELF']), "/"); //carpeta del projecte
// echo "<br/>".$path;

$base = "https://" . $host . $path . "/";

//declarem rutes a partir d'aquestes constants i que farem servir al head i al body d'aquesta mateixa pàgina
define("PATH_CSS", $base . "view/css/");
define("PATH_IMG", $base . "view/img/");
define("PATH_JS", $base . "view/js/");

//per poder fer la crida al controlador principal
require_once "controller/MainController.class.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clínica Veterinaria</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= PATH_CSS ?>header.css">
    <link rel="stylesheet" href="<?= PATH_CSS ?>body.css">
    <script src="<?= PATH_JS ?>general-fn.js"></script>

    <!-- Enlaces a Bootstrap (localmente) -->
    <link rel="stylesheet" href="./Vendors/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="./Vendors/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>

    <!-- Enlaces a jQuery y jQuery UI (localmente) -->
    <script src="Vendors/jquery-3.7.1.min.js"></script>
    <script src="Vendors/jquery-ui-1.13.2.custom/jquery-ui.min.js"></script>

</head>

<body>
    <div id="page">
        <header>
            <a href="https://www.ies-provensana.com"><img src="<?= PATH_IMG ?>proven.jpg" alt="proven.jpg"></a>
            <h1>Clínica Veterinaria</h1>
        </header>
        <?php
        $controlMain = new MainController();
        //únic mètode del controlador principal que es pregunta per l'opció del menú
        $controlMain->processRequest();

        //manera també correcta d'instanciar un objecte de la classe MainController i cridar el mètode processRequest
        //(new MainController())->processRequest();
        ?>
    </div>
</body>

</html>