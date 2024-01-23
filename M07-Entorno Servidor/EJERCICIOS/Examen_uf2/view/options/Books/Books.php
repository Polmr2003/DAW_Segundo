<?php
require_once "../../../util/Funciones_importantes/funcions_archivos.php";
require_once "../../../util/Funciones_importantes/funcions_array.php";
?>
<h1>Books</h1>
<?php

//leemos el fichero con los libros
$csv = read_info_csv_with_return("../../../model/users/resources/books.csv");
//los mostramos
print_Array_layout($csv, 1);

if ($_SESSION["Rol"] == "admin") {
    echo '<div id="content">';
    echo '<form method="post" action="">';
    echo '<fieldset>';

    echo '<input type="submit" name="action" value="Add a book" />';
    echo '</fieldset>';
}
?>
</body>

</html>