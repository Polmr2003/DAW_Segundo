<!-- only a div -->
<div id="content">
    <table class="table">

        <!-- table headers -->
        <thead class="thead-light">
        <tr>
            <th>Nif</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>

        <!-- table content -->
        <tbody>
        <?php
        foreach ($content as $element)
        {
            // Each element of the array $content is an owner
            echo "<tr>";
            echo "<td>{$element->getNif()}</td>";
            echo "<td>{$element->getName()}</td>";
            echo "<td>{$element->getEmail()}</td>";
            echo "<td>{$element->getPhone()}</td>";
            echo '<td><input type="submit" class="btn btn-warning" name="action" value="Update" /></td>';
            echo '<td><input type="submit" class="btn btn-danger" name="action" value="Delete" /></td>';
            echo "</tr>";
        }
        ?>
        </tbody>

    </table>
</div>