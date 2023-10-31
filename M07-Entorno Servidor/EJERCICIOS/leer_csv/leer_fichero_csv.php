<?php

$data = [
	
];

$filename = 'archivo.csv';

// open csv file for writing
$f = fopen($filename, 'w'); // w: write | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/

if ($f === false) {
	die('Error opening the file ' . $filename);
}

// read each line in CSV file at a time
while (($row = fgetcsv($f)) !== false) {
	$data[] = $row;
}

// close the file
fclose($f);

// show data
echo "<pre>";
print_r($data);
echo "</pre>";

