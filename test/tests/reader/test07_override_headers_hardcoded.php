<?php

use gugglegum\CsvRw\CsvFormat;
use gugglegum\CsvRw\CsvReader;
use gugglegum\CsvRw\Exception;

require_once __DIR__ . '/../../../src/CsvFormat.php';
require_once __DIR__ . '/../../../src/CsvReader.php';
require_once __DIR__ . '/../../../src/Exception.php';

$options = [
    'delimiter' => ',',
    'enclosure' => '"',
    'escape' => '\\',
];

$csv = new CsvReader(new CsvFormat($options));

try{
    $csv->open(__DIR__ . '/../../samples/sample-10.with-header.csv', CsvReader::WITH_HEADERS, [
        "firstName","lastName","companyName","address","city","county","state","zip","phone1","phone2","email","web"
    ]);

    foreach ($csv as $index => $row) {
        echo "{$index}: Line {$csv->getLineNumber()}\n";
        var_dump($row);
    }

    $csv->close();

} catch (Exception $e) {
    echo "ERROR: {$e->getMessage()}\n";
    exit;
}
