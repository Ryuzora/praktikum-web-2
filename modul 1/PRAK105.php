<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>prak105</title>
    <style>
        table {
            border-spacing: 2px;
            border: 1px solid black;
            font-family: Arial, sans-serif;
        }
        th {
            background-color: red;
            color: black;
            border: 1px solid black;
            padding: 15px;
            font-size: 20px;
            text-align: left;
        }
        td {
            border: 1px solid black;
            padding: 5px 10px;
        }
    </style>
</head>
<body>

<?php
$smartphones = [
    "1" => "Samsung Galaxy S22",
    "2" => "Samsung Galaxy S22+",
    "3" => "Samsung Galaxy A03",
    "4" => "Samsung Galaxy Xcover 5"
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
        foreach ($smartphones as $key => $nama) {
            echo "<tr>";
            echo "<td>" . $nama . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>