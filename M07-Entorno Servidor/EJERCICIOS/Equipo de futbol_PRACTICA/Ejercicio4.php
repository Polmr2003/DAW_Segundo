<?php
/*
Mostrar cabecera, menú, pie de página y lista con todos los archivos .html de las cartas de cada futbolista
*/

//Llamada a los archivos 
require_once './funciones-estructura.php';
require_once './funciones.php';
require_once './funciones_archivos.php';
require_once './datos.php';
require_once './generator.php';

//Llamada a las funciones
myHeader();
myMenu();
?>
<!------------------------------------------------------------------------------------------------------>

<!------ WEB CODE ----->

<body>
    <div class="container">
        <div class="row align-items-start">
            <h2 class="bi bi-list-ul"> Lista de cartas para los futbolistas</h2>
            <br>
            <br>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="./archivosHTML/Aiden Froste.html" target="_blank">Carta Aiden</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Axel Blaze.html" target="_blank">Carta Axel</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Billy Miller.html" target="_blank">Carta Billy</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Caleb Stonewall.html" target="_blank">Carta Caleb</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Claude Beacons.html" target="_blank">Carta Claude</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Cliff Parker.html" target="_blank">Carta Cliff</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/David Samford.html" target="_blank">Carta David</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Derek Swing.html" target="_blank">Carta Derek</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Heath Moore.html" target="_blank">Carta Heath</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Isabelle Trick.html" target="_blank">Carta Isabelle</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Jim Wraith.html" target="_blank">Carta Jim</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Jordan Greenway.html" target="_blank">Carta Jordan</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Jude Sharp.html" target="_blank">Carta Jude</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Nathan Swift.html" target="_blank">Carta Nathan</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Nino Nango.html" target="_blank">Carta Nino</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Sonny Wright.html" target="_blank">Carta Sonny</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Tao Lu.html" target="_blank">Carta Tao</a>
                </li>
                <li class="list-group-item">
                    <a href="./archivosHTML/Tim Saunders.html" target="_blank">Carta Tim</a>
                </li>
                <li class="list-group-item">
                <a href="./archivosHTML/Willow Proude.html" target="_blank">Carta Willow</a>
                </li>
                <li class="list-group-item">
                <a href="./archivosHTML/Xiao Rau.html" target="_blank">Carta Xiao</a>
                </li>
            </ul>
            <?php
            main($futbolistas);
            ?>
        </div>
    </div>
</body>

<!----- FOOTER ------>
<?php
myFooter();
?>