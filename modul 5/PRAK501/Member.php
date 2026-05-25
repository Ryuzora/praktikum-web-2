<?php
require_once "Koneksi.php";
require_once "Model.php";
$members = getMemberData($conn);

if(isset($_GET['delete'])){
    deleteMemberById($conn, $_GET['delete']);
    header('location: Member.php');
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
            <h1 class="text-2xl font-semibold">Member</h1>
            <p class="text-slate-400 text-sm">List Member Pepustakaan</p>
        </div>
        <a href="FormMember.php" class="bg-indigo-500 hover:bg-indigo-400 text-white text-sm font-semibold px-4 py-2 rounded-lg">+ Tambah Member</a>
    </div>

    <div class="bg-slate-900/60 border border-slate-800 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-900">
            <tr class="text-left text-slate-400">
                <th class="px-6 py-3 font-medium">ID</th>
                <th class="px-6 py-3 font-medium">Nama</th>
                <th class="px-6 py-3 font-medium">Nomor</th>
                <th class="px-6 py-3 font-medium">Alamat</th>
                <th class="px-6 py-3 font-medium">Tanggal Mendaftar</th>
                <th class="px-6 py-3 font-medium">Tanggal Terakhir Bayar</th>
                <th class="px-6 py-3"></th>
                <th class="px-6 py-3"></th>
            </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
            <?php foreach($members as $member): ?>
                <tr>
                    <td class="px-6 py-4 text-slate-300"><?= $member['id_member'] ?></td>
                    <td class="px-6 py-4 text-white"><?= $member['nama_member'] ?></td>
                    <td class="px-6 py-4 text-slate-300"><?= $member['nomor_member'] ?></td>
                    <td class="px-6 py-4 text-slate-300"><?= $member['alamat'] ?></td>
                    <td class="px-6 py-4 text-slate-300"><?= $member['tgl_mendaftar'] ?></td>
                    <td class="px-6 py-4 text-slate-300"><?= $member['tgl_terakhir_bayar'] ?></td>
                    <td class="px-6 py-4 text-right"><a class="text-indigo-400 hover:text-indigo-300" href="FormMember.php?id=<?= $member['id_member'] ?>">Edit</a></td>
                    <td class="px-6 py-4 text-right"><a class="text-red-500 hover:text-red-400" href="Member.php?delete=<?= $member['id_member'] ?>" onclick="return confirm('Hapus Buku Ini')">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>