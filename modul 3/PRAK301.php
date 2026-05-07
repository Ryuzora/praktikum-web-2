<!doctype html>
<html>
<body>
<form action="" method="post">
    Jumlah Peserta : <input type="number" name="reps"><br>
    <button type="submit" name="Cetak">Cetak</button>
</form>
<?php
if(isset($_POST['Cetak'])) {
    $reps = $_POST['reps'];
    $isOdd = true;
    $i = 1;
    while ($i <= $reps){
        $color = $isOdd ? 'red' : 'green';
        echo "<h2 style='color: $color'>Ini peserta ke-$i</h2>";
        $isOdd = !$isOdd;
        $i++;
    }
}
?>
</body>
</html>