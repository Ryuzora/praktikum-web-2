<?php
require_once "Koneksi.php";
require_once "Model.php";
$peminjamanList = getPeminjamanData($conn);
$members = getMemberData($conn);
$books = getBukuData($conn);
$memberNames = [];
$bookTitles = [];
foreach ($members as $member) {
    $memberNames[$member["id_member"]] = $member["nama_member"];
}
foreach ($books as $book) {
    $bookTitles[$book["id_buku"]] = $book["judul_buku"];
}

if (isset($_GET["delete"])) {
    deletePeminjamanById($conn, (int) $_GET["delete"]);
    header("Location: Peminjaman.php");
    exit;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Peminjaman</title>
</head>
<body class="bg-slate-950 text-slate-100">
<div class="max-w-5xl mx-auto px-6 py-12">
    <div class="flex items-center justify-between mb-6">
        <a href="index.php" class="bg-indigo-500 hover:bg-indigo-400 text-white text-sm font-semibold px-4 py-2 rounded-lg h-10">< Back</a>
        <div class="flex flex-col items-center">
            <h1 class="text-2xl font-semibold">Peminjaman</h1>
            <p class="text-slate-400 text-sm">List Peminjaman Perpustakaan</p>
        </div>
        <a href="FormPeminjaman.php" class="bg-indigo-500 hover:bg-indigo-400 text-white text-sm font-semibold px-4 py-2 rounded-lg">+ Tambah Peminjaman</a>
    </div>

    <div class="bg-slate-900/60 border border-slate-800 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-900">
            <tr class="text-left text-slate-400">
                <th class="px-6 py-3 font-medium">ID</th>
                <th class="px-6 py-3 font-medium">Tgl Peminjaman</th>
                <th class="px-6 py-3 font-medium">Tgl Kembali</th>
                <th class="px-6 py-3 font-medium">Member</th>
                <th class="px-6 py-3 font-medium">Buku</th>
                <th class="px-6 py-3"></th>
                <th class="px-6 py-3"></th>
            </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
            <?php foreach ($peminjamanList as $pinjam): ?>
                <tr>
                    <td class="px-6 py-4 text-slate-300"><?= $pinjam["id_peminjaman"] ?></td>
                    <td class="px-6 py-4 text-white"><?= $pinjam["tgl_pinjam"] ?></td>
                    <td class="px-6 py-4 text-slate-300"><?= $pinjam["tgl_kembali"] ?></td>
                    <td class="px-6 py-4 text-slate-300"><?= htmlspecialchars($memberNames[$pinjam["id_member"]] ?? "-", ENT_QUOTES) ?></td>
                    <td class="px-6 py-4 text-slate-300"><?= htmlspecialchars($bookTitles[$pinjam["id_buku"]] ?? "-", ENT_QUOTES) ?></td>
                    <td class="px-6 py-4 text-right"><a class="text-indigo-400 hover:text-indigo-300" href="FormPeminjaman.php?id=<?= $pinjam["id_peminjaman"] ?>">Edit</a></td>
                    <td class="px-6 py-4 text-right"><a class="text-red-500 hover:text-red-400" onclick="return confirm('Hapus peminjaman ini')" href="Peminjaman.php?delete=<?= $pinjam["id_peminjaman"] ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
