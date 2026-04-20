<!doctype html>
<html>
<body>

<?php
$suhuVal = $_POST['suhu'] ?? '';
$skalaAwal = $_POST['skala'] ?? '';
$skalaTujuan = $_POST['skalaAkhir' ?? ''];
$output = "";

if (isset($_POST['konversi'])) {
    $suhu = (float)$suhuVal;
    $hasil = 0;

    if ($skalaAwal == "C") {
        if ($skalaTujuan == "C") { $hasil = $suhu; }
        elseif ($skalaTujuan == "F") { $hasil = ($suhu * 9/5) + 32; }
        elseif ($skalaTujuan == "R") { $hasil = $suhu * 4/5; }
        elseif ($skalaTujuan == "K") { $hasil = $suhu + 273.15; }
    }
    elseif ($skalaAwal == "F") {
        if ($skalaTujuan == "C") { $hasil = ($suhu - 32) * 5/9; }
        elseif ($skalaTujuan == "F") { $hasil = $suhu; }
        elseif ($skalaTujuan == "R") { $hasil = ($suhu - 32) * 4/9; }
        elseif ($skalaTujuan == "K") { $hasil = ($suhu - 32) * 5/9 + 273.15; }
    }
    elseif ($skalaAwal == "R") {
        if ($skalaTujuan == "C") { $hasil = $suhu * 5/4; }
        elseif ($skalaTujuan == "F") { $hasil = ($suhu * 9/4) + 32; }
        elseif ($skalaTujuan == "R") { $hasil = $suhu; }
        elseif ($skalaTujuan == "K") { $hasil = ($suhu * 5/4) + 273.15; }
    }
    elseif ($skalaAwal == "K") {
        if ($skalaTujuan == "C") { $hasil = $suhu - 273.15; }
        elseif ($skalaTujuan == "F") { $hasil = ($suhu - 273.15) * 9/5 + 32; }
        elseif ($skalaTujuan == "R") { $hasil = ($suhu - 273.15) * 4/5; }
        elseif ($skalaTujuan == "K") { $hasil = $suhu; }
    }

    $output = "Hasil: " . round($hasil, 2) . " °" . $skalaTujuan;
}
?>

<form action="" method="post">
    Nilai: <input type="number" step="any" name="suhu" value="<?php echo $suhuVal; ?>" required><br><br>

    Dari:<br>
    <input type="radio" name="skala" value="C" <?php echo ($skalaAwal == 'C') ? 'checked' : ''; ?>> Celcius <br>
    <input type="radio" name="skala" value="F" <?php echo ($skalaAwal == 'F') ? 'checked' : ''; ?>> Fahrenheit <br>
    <input type="radio" name="skala" value="R" <?php echo ($skalaAwal == 'R') ? 'checked' : ''; ?>> Rheamur <br>
    <input type="radio" name="skala" value="K" <?php echo ($skalaAwal == 'K') ? 'checked' : ''; ?>> Kelvin <br>
    <br><br>

    Ke:<br>
    <input type="radio" name="skalaAkhir" value="C" <?php echo ($skalaTujuan == 'C') ? 'checked' : ''; ?>> Celcius <br>
    <input type="radio" name="skalaAkhir" value="F" <?php echo ($skalaTujuan == 'F') ? 'checked' : ''; ?>> Fahrenheit <br>
    <input type="radio" name="skalaAkhir" value="R" <?php echo ($skalaTujuan == 'R') ? 'checked' : ''; ?>> Rheamur <br>
    <input type="radio" name="skalaAkhir" value="K" <?php echo ($skalaTujuan == 'K') ? 'checked' : ''; ?>> Kelvin <br>
    <br><br>

    <button type="submit" name="konversi">Konversi</button>
</form>

<?php if ($output != ""): ?>
    <h1><?php echo $output; ?></h1>
<?php endif; ?>

</body>
</html>
