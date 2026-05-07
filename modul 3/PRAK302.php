<!doctype html>
<html>
<body>
<form action="" method="post">
    Tinggi : <input type="number" name="tinggi"><br>
    Alamat Gambar : <input type="text" name="img" value="https://cdn0.iconfinder.com/data/icons/web-and-mobile-icons-volume-2/128/52-512.png"><br>
    <button type="submit" name="cetak">Cetak</button> <br><br>
</form>

<?php
if (isset($_POST['cetak'])) {
    $tinggi = $_POST['tinggi'];
    $img = $_POST['img'];

    echo "<div style='text-align: right; width: fit-content'>";
    $i = $tinggi;
    while($i > 0){
        $j = $i;
        while($j > 0){
            echo "<img src='$img' width='30'>";
            $j--;
        }
        echo "<br>";
        $i--;
    }
    echo "</div>";
}
?>
</body>
</html>