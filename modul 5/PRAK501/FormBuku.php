<?php
require_once __DIR__ . "/Koneksi.php";
require_once __DIR__ . "/Model.php";

$editId = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
$editBuku = $editId > 0 ? getBukuById($conn, $editId) : null;
$isEdit = $editId > 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $judul_buku = trim($_POST["judul_buku"] ?? "");
    $penulis = trim($_POST["penulis"] ?? "");
    $penerbit = trim($_POST["penerbit"] ?? "");
    $tahun_terbit = trim($_POST["tahun_terbit"] ?? "");

    if ($judul_buku !== "" && $penulis !== "" && $penerbit !== "" && $tahun_terbit !== "") {
        if ($editId > 0) {
            updateBukuData($conn, $editId, $judul_buku, $penulis, $penerbit, $tahun_terbit);
        } else {
            addBukuData($conn, $judul_buku, $penulis, $penerbit, $tahun_terbit);
        }
        header("Location: Buku.php");
        exit;
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Form Buku</title>
</head>
<body class="bg-slate-950 text-slate-100">
<div class="max-w-3xl mx-auto px-6 py-12">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Form Buku</h1>
            <p class="text-slate-400 text-sm"><?= $isEdit ? "Edit data buku" : "Tambah data buku baru" ?></p>
        </div>
        <a class="bg-slate-800 hover:bg-slate-700 text-slate-200 text-sm font-semibold px-4 py-2 rounded-lg" href="Buku.php">Back</a>
    </div>

    <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-6">
        <form class="space-y-5" action="" method="post">
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="judul_buku">Judul Buku</label>
                <input class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="judul_buku" name="judul_buku" type="text" placeholder="Bagaikan Langit" value="<?= htmlspecialchars($editBuku["judul_buku"] ?? "", ENT_QUOTES) ?>" required />
            </div>
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="penulis">Penulis</label>
                <input class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="penulis" name="penulis" type="text" placeholder="Agung Hercules" value="<?= htmlspecialchars($editBuku["penulis"] ?? "", ENT_QUOTES) ?>" required />
            </div>
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="penerbit">Penerbit</label>
                <input class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="penerbit" name="penerbit" type="text" placeholder="di sore hari" value="<?= htmlspecialchars($editBuku["penerbit"] ?? "", ENT_QUOTES) ?>" required />
            </div>
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="tahun_terbit">Tahun Terbit</label>
                <input class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="tahun_terbit" name="tahun_terbit" type="number" placeholder="2013" value="<?= htmlspecialchars($editBuku["tahun_terbit"] ?? "", ENT_QUOTES) ?>" required />
            </div>
            <div class="flex items-center justify-end gap-3 pt-2">
                <button class="bg-slate-800 hover:bg-slate-700 text-slate-200 text-sm font-semibold px-4 py-2 rounded-lg" type="reset">Reset</button>
                <button class="bg-indigo-500 hover:bg-indigo-400 text-white text-sm font-semibold px-4 py-2 rounded-lg" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
