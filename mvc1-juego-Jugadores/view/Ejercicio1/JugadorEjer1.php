<div id="content">
        <?php
        echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">';

        if (isset($content)) {
            foreach ($content as $jugador) {
                echo '<div style="width: 16.66%; margin: 10px; text-align: center; background-color: white; padding: 10px; border-radius: 8px;">';
                echo "<span></span> <br>";
                echo '</div>';
            }
        }

        echo '</div>';
        ?>
</div>
