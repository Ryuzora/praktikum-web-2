<!doctype html>
<html>
<body>
<form method="post">
    Jumlah Bintang : <input type="number" name="jumlah"><br>
    <button type="submit" name="submit">Submit</button><br>
</form>

<?php
$isHidden = true;
if(isset($_POST['submit']) || isset($_POST['tambah']) || isset($_POST['kurang'])){
    $jumlah = $_POST['jumlah'];
    $jumlah < 0 ? $jumlah = 0 : $jumlah = $jumlah;
    if(isset($_POST['tambah'])){ $jumlah++; }
    if(isset($_POST['kurang']) && $jumlah > 0){ $jumlah--; }
    $isHidden = false;

    echo "Jumlah Bintang : $jumlah <br>";
    for ($i = 0; $i < $jumlah; $i++){
        echo "<img src='star.png' width='30'>";
    }
}
if (!$isHidden): ?>
<form method="post"><br>
    <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
    <button type="submit" name="tambah">Tambah</button>
    <button type="submit" name="kurang" style="visibility: <?= $jumlah > 0 ? 'visible' : 'hidden' ?>">Kurang</button>
</form>
<?php endif; ?>
</body>
</html>