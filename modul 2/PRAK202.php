<!doctype html>
<html>
<body>
<?php
$nim_err = $nama_err = $jenisKelamin_err = "";
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jenisKelamin = $_POST['gender'] ?? "";

    if(empty($nama)){
        $nama_err = "Nama tidak boleh kosong";
    }
    if(empty($nim)){
        $nim_err = "nim tidak boleh kosong";
    }
    if(empty($jenisKelamin)){
        $jenisKelamin_err = "Jenis Kelamin tidak boleh kosong";
    }
}
?>
<form action="" method="post">
    <div>
        Nama: <input type="text" name="nama">
        <span class="error">* <?php echo $nama_err?></span><br>
    </div>
    <div>
        Nim: <input type="text" name="nim">
        <span class="error">* <?php echo $nim_err?></span><br>
    </div>
    <div>
        Jenis Kelamin:
        <span class="error">* <?php echo $jenisKelamin_err?></span><br>
        <input type="radio" name="gender" value="male"> Laki-laki<br>
        <input type="radio" name="gender" value="female"> Perempuan<br>
        <button type="submit" name="submit">Submit</button>
    </div>
</form>
<?php
if(!empty($nama) && !empty($nim) && !empty($jenisKelamin)){
    echo "<h2>Output:</h2><p>$nama<br>$nim<br>$jenisKelamin</p>";
}
?>
</body>
<style>
    .error{
        color: red;
    }
</style>
</html>