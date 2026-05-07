<!doctype html>
<html>
<body>
<form action="" method="post">
    Batas Bawah : <input type="number" name="min"><br>
    Batas Atas : <input type="number" name="max"><br>
    <button type="submit" name="cetak">Cetak</button><br>
</form>

<?php
if (isset($_POST['cetak'])) {
    $min = $_POST['min'];
    $max = $_POST['max'];
    $i = $min;
    do {
        if (($i+7) % 5 == 0){
            echo "<img src='star.png' width='10'> ";
        } else {
            echo "$i ";
        }
        $i++;
    } while ($i <= $max);
}
?>
</body>
</html>