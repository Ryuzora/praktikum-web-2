<?php
require_once "Koneksi.php";
require_once "Model.php";
$books = getBukuData($conn);

if(isset($_GET['delete'])){
    deleteBukuById($conn, $_GET['delete']);
    header('location: Buku.php');
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Users</title>
</head>
<body class="bg-slate-950 text-slate-100">
<div class="max-w-5xl mx-auto px-6 py-12">
    <div class="flex items-center justify-between mb-6">
        <a href="index.php" class="bg-indigo-500 hover:bg-indigo-400 text-white text-sm font-semibold px-4 py-2 rounded-lg h-10">< Back</a>
        <div class="flex flex-col items-center">
            <h1 class="text-2xl font-semibold">Buku</h1>
            <p class="text-slate-400 text-sm">List Buku Perpustakaan</p>
        </div>
        <a href="FormBuku.php" class="bg-indigo-500 hover:bg-indigo-400 text-white text-sm font-semibold px-4 py-2 rounded-lg">+ Tambah Buku</a>
    </div>

    <div class="bg-slate-900/60 border border-slate-800 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-900">
            <tr class="text-left text-slate-400">
                <th class="px-6 py-3 font-medium">ID</th>
                <th class="px-6 py-3 font-medium">Judul Buku</th>
                <th class="px-6 py-3 font-medium">Penulis</th>
                <th class="px-6 py-3 font-medium">Penerbit</th>
                <th class="px-6 py-3 font-medium">Tahun Terbit</th>
                <th class="px-6 py-3"></th>
                <th class="px-6 py-3"></th>
            </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
            <?php foreach($books as $buku): ?>
                <tr>
                    <td class="px-6 py-4 text-slate-300"><?= $buku['id_buku'] ?></td>
                    <td class="px-6 py-4 text-white"><?= $buku['judul_buku'] ?></td>
                    <td class="px-6 py-4 text-slate-300"><?= $buku['penulis'] ?></td>
                    <td class="px-6 py-4 text-slate-300"><?= $buku['penerbit'] ?></td>
                    <td class="px-6 py-4 text-slate-300"><?= $buku['tahun_terbit'] ?></td>
                    <td class="px-6 py-4 text-right"><a class="text-indigo-400 hover:text-indigo-300" href="FormBuku.php?id=<?= $buku['id_buku'] ?>">Edit</a></td>
                    <td class="px-6 py-4 text-right"><a class="text-red-500 hover:text-red-400" onclick="return confirm('Hapus buku ini')" href="Buku.php?delete=<?= $buku['id_buku'] ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
