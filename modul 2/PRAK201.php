<!DOCTYPE html>
<html>
<body>
<form action="" method="post">
    Nama: 1<input type="text" name="nama_1"><br><br>
    Nama: 2<input type="text" name="nama_2"><br><br>
    Nama: 3<input type="text" name="nama_3"><br><br>
    <button type="submit" name="Sort">Urutkan</button>
</form>
</body>
<?php
if (isset($_POST['Sort'])) {
    $nama1 = $_POST['nama_1'];
    $nama2 = $_POST['nama_2'];
    $nama3 = $_POST['nama_3'];

    if ($nama1<=$nama2 && $nama1<=$nama3) {
            if ($nama2<=$nama3) {
                echo "$nama1<br>$nama2<br>$nama3<br>";
            } else {
                echo "$nama1<br>$nama3<br>$nama2<br>";
            }
        } elseif ($nama2<=$nama1 && $nama2<=$nama3) {
            if ($nama1<=$nama3) {
                echo "$nama2<br>$nama1<br>$nama3<br>";
            } else {
                echo "$nama2<br>$nama3<br>$nama1<br>";
            }
        } else {
            if ($nama1<=$nama2) {
                echo "$nama3<br>$nama1<br>$nama2<br>";
            } else {
                echo "$nama3<br>$nama2<br>$nama1<br>";
            }
        }
}
?>
</html>