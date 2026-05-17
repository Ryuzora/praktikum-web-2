<?php
$mahasiswa = array();
$mahasiswa = [
    "mahasiswa_1" => ["Nama" => "Andi", "NIM" => "210001", "Nilai UTS" => 87, "Nilai UAS" => 65],
    "mahasiswa_2" => ["Nama" => "Budi", "NIM" => "210002", "Nilai UTS" => 76, "Nilai UAS" => 79],
    "mahasiswa_3" => [ "Nama" => "Tono", "NIM" => "210003", "Nilai UTS" => 50, "Nilai UAS" => 41],
    "mahasiswa_4" => [ "Nama" => "Jessica", "NIM" => "210004", "Nilai UTS" => 60, "Nilai UAS" => 75]
];
?>
<!doctype html>
<html>
<body>
<table border="1" style="border-collapse: collapse">
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Akhir</th>
        <th>Nilai Huruf</th>
    </tr>
    <?php
    function getLetterGrade($score) {
        if ($score >= 80) return "A";
        if ($score >= 70) return "B";
        if ($score >= 60) return "C";
        if ($score >= 50) return "D";
        return "E";
    }

    foreach ($mahasiswa as $key => $data) {
        $uts = $data["Nilai UTS"] * 0.4;
        $uas = $data["Nilai UAS"] * 0.6;
        $finalScore = $uts + $uas;

        $mahasiswa[$key]["Nilai Akhir"] = $finalScore;
        $mahasiswa[$key]["Nilai Huruf"] = getLetterGrade($finalScore);
    }

    foreach ($mahasiswa as $id => $details){
        echo "<tr>";
        foreach ($details as $key => $value){
            echo "<td>$value</td>";
        }
        echo "</tr>";
    };
    ?>
</table>
</body>
<style>
    th{
        padding: 5px 10px;
    }
</style>
</html>