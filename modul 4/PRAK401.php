<!doctype html>
<html>
<body>
<form action="" method="post">
    Panjang : <input type="number" name="panjang"><br>
    Lebar : <input type="number" name="lebar"><br>
    Nilai : <input type="text" name="nilai"><br>
    <button type="submit" name="cetak">Cetak</button>
</form>
<?php
if(isset($_POST['cetak'])){
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $nilai = $_POST['nilai'];

    $item = explode(" ", $nilai);
    if(count($item) == $panjang*$lebar){
        echo "<table border=1 style='border-collapse: collapse'>";
        for ($i=0; $i < $panjang; $i++) {
            echo "<tr>";
            for ($j=0; $j < $lebar; $j++) {
                echo "<td style='width: 30px; height: 30px; text-align: center'>";
                echo $item[$j+$i*$lebar];
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Panjang nilai tidak sesuai dengan ukuran matriks";
    }
}
?>
</body>
</html>