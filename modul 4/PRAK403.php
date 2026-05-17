<?php
$mahasiswa = [
    "mhs1" => [
        "Nama" => "Ridho",
        "Mata Kuliah" => [
            ["MK1" => "Pemrograman I", "SKS" => 2],
            ["MK2" => "Praktikum Pemrograman I", "SKS" => 1],
            ["MK3" => "Pengantar Lingkungan Lahan Basah", "SKS" => 2],
            ["MK4" => "Arsitektur Komputer", "SKS" => 3]
        ]
    ],
    "mhs2" => [
        "Nama" => "Ratna",
        "Mata Kuliah" => [
            ["MK1" => "Basis Data I", "SKS" => 2],
            ["MK2" => "Praktikum Basis Data I", "SKS" => 1],
            ["MK3" => "Kalkulus", "SKS" => 3]
        ]
    ],
    "mhs3" => [
        "Nama" => "Tono",
        "Mata Kuliah" => [
            ["MK1" => "Rekayasa Perangkat Lunak", "SKS" => 3],
            ["MK2" => "Analisis dan Perancangan Sistem", "SKS" => 3],
            ["MK3" => "Komputasi Awan", "SKS" => 3],
            ["MK4" => "Kecerdasan Bisnis", "SKS" => 3]
        ]
    ]
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar KRS Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: darkgrey;
        }
        .tidak-revisi {
            background-color: green;
        }
        .revisi {
            background-color: red;
        }
    </style>
</head>
<body>
<h2>Hasil Output Data Mahasiswa</h2>
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah Diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach ($mahasiswa as $mhs):
        $courses = $mhs["Mata Kuliah"];
        $totalSKS = array_sum(array_column($courses, 'SKS'));

        $status = ($totalSKS >= 7) ? "Tidak Revisi" : "Revisi KRS";
        $statusClass = ($totalSKS >= 7) ? "tidak-revisi" : "revisi";

        foreach ($courses as $index => $mk): ?>
            <tr>
                <td><?= ($index === 0) ? $no++ : "" ?></td>

                <td><?= ($index === 0) ? $mhs["Nama"] : "" ?></td>

                <td><?= array_values($mk)[0] ?></td>

                <td><?= $mk["SKS"] ?></td>

                <td><?= ($index === 0) ? $totalSKS : "" ?></td>

                <td class="<?= ($index === 0) ? $statusClass : "" ?>">
                    <?= ($index === 0) ? $status : "" ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
