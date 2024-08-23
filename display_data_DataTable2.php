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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Data Display with DataTables</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0 6px;
            margin: 0 2px;
        }
    </style>
</head>
<body>
    <h1>Most Recent Data from CSV</h1>
    <div>
        <button id="jumpToFirst">Jump to First Page</button>
        <button id="jumpToLast">Jump to Last Page</button>
    </div>
    <table id="dataTable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Job</th>
                <th>Date Birthday</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['Name']); ?></td>
                    <td><?php echo htmlspecialchars($row['Job']); ?></td>
                    <td><?php echo htmlspecialchars($row['Date birthday']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                "order": [[2, "desc"]], // Default sort by Date Birthday column
                "paging": true,
                "searching": true,
                "info": true
            });

            // Jump to First Page
            $('#jumpToFirst').on('click', function() {
                table.page('first').draw('page');
            });

            // Jump to Last Page
            $('#jumpToLast').on('click', function() {
                table.page('last').draw('page');
            });
        });
    </script>
</body>
</html>
