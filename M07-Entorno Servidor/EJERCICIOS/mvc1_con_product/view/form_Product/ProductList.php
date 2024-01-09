<div id="content">
    <fieldset>
        <legend>Product list</legend>    
        <?php
            if (isset($content)) {
                echo <<<EOT
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Marca</th>
                            <th>Nom</th>
                            <th>Descripcio</th>
                            <th>Preu</th>
                        </tr>
EOT;
                foreach ($content as $product) {
                    echo <<<EOT
                        <tr>
                            <td>{$product->getId()}</td>
                            <td>{$product->getMarca()}</td>
                            <td>{$product->getNom()}</td>
                            <td>{$product->getDescripcio()}</td>
                            <td>{$product->getPreu()}</td>
                        </tr>
EOT;
                }
                echo <<<EOT
                    </table>
EOT;
            }
        ?>
    </fieldset>
</div>
