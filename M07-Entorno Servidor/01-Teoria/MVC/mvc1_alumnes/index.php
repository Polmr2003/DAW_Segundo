
<?php

/***
 Aquest arxiu inicia l'aplicació i acabarà incloent tota l'aplicació web
 @author Professors/es de l'Ins Provençana 
***/

//no caldrà fer session_start a cap altre lloc/arxiu de la web!!!!
    session_start();
   
//declarem rutes a partir d'aquestes constants i que farem servir al head i al body d'aquesta mateixa pàgina
    define("PATH_CSS", "view/css/");//ruta per als css
    define("PATH_IMG",  "view/img/");//ruta per a les imatges
    define("PATH_JS", "view/js/");//ruta pels JavaScripts
    
//per poder fer la crida al controlador principal
    require_once "controller/MainController.class.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Institut Provençana Exemple-2 MVC</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="<?=PATH_CSS?>header.css">
        <link rel="stylesheet" href="<?=PATH_CSS?>body.css">
        <script src="<?=PATH_JS?>general-fn.js"></script>
    </head>
    <body>
        <div id="page">
            <header>
                <a href="http://www.ies-provensana.com"><img src="<?=PATH_IMG?>proven.jpg" alt="proven.jpg"></a>
                <h1>Institut Provençana Exemple-1 MVC amb PHP</h1>
            </header>
            <?php
            //cridem al controlador principal de l'aplicació
                $controlMain=new MainController();
                $controlMain->processRequest();

            ?>
        </div>
    </body>
</html>