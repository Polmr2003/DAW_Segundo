<?php

$data = [];

$filename = 'archivo.csv';

// Comprovar las variables si existen
if (isset($_POST['nombre'], $_POST['password'])) {
	// sanear los datos
	$nombre = htmlspecialchars($_POST['nombre']);
	$contraseña = htmlspecialchars($_POST['password']);

	/*------------------------ Escribimos los datos en el archivo csv ------------------------ */
	// Leemos los datos que habian anteriormente para no sobreescibir el fichero
	$f = fopen($filename, 'r'); // r: read | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/

	if ($f === false) {
		die('Error opening the file ' . $filename);
	}

	// leemos el fihcero csv i ponemos los datos en el array data para luego mostrarlos o usarlos
	while (($row = fgetcsv($f)) !== false) {
		$data[] = $row;
	}

	// close the file
	fclose($f);

	// Escribimos el nuevo usuario i contraseña con los que ya habian
	// open csv file for writing
	$f_write = fopen($filename, 'w'); // w: write | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/

	// Array con los datos del usuario
	$data_usu = [
		[$nombre , $contraseña]
	];

	//fusionamos los datos que ya habian mas los de ahora
	$data = array_merge($data, $data_usu);

	// mostramos el array que nos escribira en el fichero
	echo "<pre>";
	print_r($data);
	echo "</pre>";

	// write data in csv
	foreach ($data as $row) {
		fputcsv($f_write, $row);
	}

	// close the file
	fclose($f_write);
}

?>

<!-- ------------------------------------------- HTML ---------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Fichero csv</title>
	</head>

	<body>
		<form action="" method="post">
			<label for="nombre" class="info_usu">Nombre usuario:</label>
			<input type="text" class="input_usu" id="nombre" name="nombre" required>
			<br>
			<label for="password" class="info_usu">contraseña:</label>
			<input type="password" class="input_usu" id="contraseña" name="password" required>
			<br>
			<button class="my_Btn">
				<p class="txt_my_Btn">click</p>
			</button>
		</form>
	</body>

	</html>

</body>

</html>