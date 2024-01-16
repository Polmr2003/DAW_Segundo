<div id="content">
        <?php
        echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">';

        if (isset($content)) {
            foreach ($content as $jugador) {
                echo '<div style="width: 16.66%; margin: 10px; text-align: center; background-color: white; padding: 10px; border-radius: 8px;">';
                echo "<img src='/Daw_segundo/mvc1-juego-Jugadores/view/home/JugadorHome/img/{$jugador->getFoto()}' width='150px' height=''>";
                echo "<div>";
                echo "<span>Id: {$jugador->getId()}</span> <br>";
                echo "<span>Nombre: {$jugador->getNombre()}</span> <br>";
                echo "<span>País: {$jugador->getPais()}</span> <br>";
                echo "<span>Dorsal: {$jugador->getNumCamiseta()}</span> <br>";
                echo "<span>DOB: {$jugador->getFNacimiento()}</span> <br>";
                echo "<span>Edad: {$jugador->calculate_age()}</span> <br>";
                echo "<span>Role: {$jugador->getRolJugador()}</span> <br>";
                echo "<span>Goals: {$jugador->getNumGoles()}</span> <br>";
                echo "<span>Partidos: {$jugador->getNumPartidos()}</span> <br>";
                echo "</div>";
                echo '</div>';
            }
        }

        echo '</div>';
        ?>
</div>
