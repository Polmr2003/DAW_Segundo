<?php

$data = [
	['Symbol', 'Company', 'Price'],
	['GOOG', 'Google Inc.', '800'],
	['AAPL', 'Apple Inc.', '500'],
	['AMZN', 'Amazon.com Inc.', '250'],
	['YHOO', 'Yahoo! Inc.', '250'],
	['FB', 'Facebook, Inc.', '30'],
];

$filename = 'stock.csv';

// open csv file for writing
$f = fopen($filename, 'w'); // w: write | view all the permission: https://www.phptutorial.net/php-tutorial/php-open-file/

if ($f === false) {
	die('Error opening the file ' . $filename);
}

// read each line in CSV file at a time
while (($row = fgetcsv($f)) !== false) {
	$data[] = $row;
}

// write each row at a time to a file
foreach ($data as $row) {
	fputcsv($f, $row);
}

// close the file
fclose($f);

