<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prak104</title>
    <style>
        table {
            border: 2px double black; 
            font-family: serif;
        }
        th, td {
            border: 1px double black;
            padding: 4px 8px;
            text-align: left;
        }
        th {
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
$daftar_smartphone = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
];
?>

<table>
    <thead>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($daftar_smartphone as $smartphone) {
            echo "<tr>";
            echo "<td>" . $smartphone . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>