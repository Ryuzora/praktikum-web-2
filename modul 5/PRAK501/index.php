<!doctype html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<?php
$links = [
    "Member.php" => "List Member",
    "Peminjaman.php" => "List Peminjaman",
    "Buku.php" => "List Buku"
];
?>
<body class="bg-slate-950">
<h1 class="text-3xl font-bold font-serif text-slate-100 text-center py-75"> Web Perpustakaan </h1>
<div class="flex items-center justify-around max-w-4xl mx-auto">
    <?php foreach($links as $url => $label){
        echo "<a href='$url' class='w-40 py-5 bg-slate-700 text-center rounded-2xl text-slate-100 '> $label </a>";
    }
    ?>
</div>
</body>
</html>