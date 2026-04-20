<!doctype html>
<html lang="id">
<body>

<?php
$output = "";
$nilaiInput = $_POST['nilai'] ?? '';

if (isset($_POST['konversi']) && $nilaiInput !== '') {
    $angka = (int)$nilaiInput;

    if ($angka < 0 || $angka > 999) {
        $output = "Anda Menginput Melebihi Limit Bilangan";
    } elseif ($angka == 0) {
        $output = "Nol";
    } elseif ($angka >= 1 && $angka <= 9) {
        $output = "Satuan";
    } elseif ($angka >= 11 && $angka <= 19) {
        $output = "Belasan";
    } elseif (($angka >= 20 && $angka <= 99) || $angka == 10) {
        $output = "Puluhan";
    } elseif ($angka >= 100 && $angka <= 999) {
        $output = "Ratusan";
    }
}
?>
<form action="" method="post">
    Nilai : <input type="number" name="nilai" value="<?php echo $nilaiInput; ?>" required><br><br>
    <button type="submit" name="konversi">Konversi</button>
</form>

<?php if ($output !== ""): ?>
    <h2>Hasil: <?php echo $output; ?></h2>
<?php endif; ?>

</body>
</html>
