<!-- only a div -->
<div id="content">
    <h2>Pets</h2>
    <table class="table">

        <!-- table headers -->
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Owner's NIF</th>
            <th>Pet Name</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Update</th>
            <th>Delete</th>
      <!--      <th>Modify</th>-->
        </tr>
        </thead>

        <!-- table content -->
        <tbody>
        <?php
        foreach ($content as $element)
        {
            echo "<form method='post' actio=''>";
            echo "<input style='display: none;' type='text' name='id' value={$element->getId()}>";
            // Each element of the array $content is a owner
            echo "<tr>";
            echo "<td>{$element->getId()}</td>";
            echo "<td>{$element->getIdOwner()}</td>";
            echo "<td>{$element->getName()}</td>";
            echo '<td><button class="btn btn-warning"><a href="http://localhost/M07-PHP/UF3/Practica_mascotas_ampliacion/index.php?menu=pet&option=update&id=' . $element->getId() . '" style="text-decoration: none;">Update</a></button></td>';
            echo '<td><button class="btn btn-danger"><a href="http://localhost/M07-PHP/UF3/Practica_mascotas_ampliacion/index.php?menu=pet&option=delete&id=' . $element->getId() . '" style="text-decoration: none;">Delete</a></button></td>';
            echo "</tr>";
            
            echo "</form>";
        }
        ?>
        </tbody>

    </table>
</div>