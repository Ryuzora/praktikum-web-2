<!doctype html>
<html>
<body>
<form method="post">
    <input type="text" name="kata">
    <button type="submit" name="submit">submit</button>
</form>

<?php
if(isset($_POST['submit'])){
    $kata = $_POST['kata'];
    $jumlah = strlen($kata);
?>
<h2>Input:</h2>
<?= $kata ?>
<h2>Output:</h2>

<?php
    for ($i = 0; $i < $jumlah; $i++){
        for ($j = 0; $j < $jumlah; $j++){
            if($j==0){
                echo strtoupper($kata[$i]);
            } else {
                echo strtolower($kata[$i]);
            }
        }
    }
}
?>
</body>
</html>