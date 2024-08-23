<?php
// Path to your CSV file
$csvFile = 'data.csv';

// Read the CSV file
if (($handle = fopen($csvFile, 'r')) !== FALSE) {
    // Get the header row
    $header = fgetcsv($handle);
    
    // Read the remaining rows
    $data = [];
    while (($row = fgetcsv($handle)) !== FALSE) {
        $data[] = array_combine($header, $row);
    }
    fclose($handle);
    
    // Sort the data by 'Date birthday' in descending order
    usort($data, function($a, $b) {
        return strtotime($b['Date birthday']) - strtotime($a['Date birthday']);
    });
} else {
    die('Error: Unable to open the CSV file.');
}
