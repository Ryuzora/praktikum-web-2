<?php
require_once __DIR__ . "/Koneksi.php";
require_once __DIR__ . "/Model.php";

$editId = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
$editPeminjaman = $editId > 0 ? getPeminjamanById($conn, $editId) : null;
$isEdit = $editId > 0;
$members = getMemberData($conn);
$books = getBukuData($conn);
$defaultTglPeminjaman = date("Y-m-d");
$defaultTglKembali = date("Y-m-d", strtotime("+7 days"));
$todayDate = date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tgl_pinjam = trim($_POST["tgl_pinjam"] ?? "");
    $tgl_kembali = trim($_POST["tgl_kembali"] ?? "");
    $id_member = (int) ($_POST["id_member"] ?? 0);
    $id_buku = (int) ($_POST["id_buku"] ?? 0);

    $isValidDates = $tgl_pinjam !== "" && $tgl_kembali !== "";
    if ($isValidDates) {
        $isValidDates = $tgl_pinjam <= $todayDate && $tgl_kembali >= $tgl_pinjam;
    }

    if ($isValidDates && $id_member > 0 && $id_buku > 0) {
        if ($editId > 0) {
            updatePeminjamanData($conn, $editId, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku);
        } else {
            addPeminjamanData($conn, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku);
        }
        header("Location: Peminjaman.php");
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
    <title>Form Peminjaman</title>
</head>
<body class="bg-slate-950 text-slate-100">
<div class="max-w-3xl mx-auto px-6 py-12">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Form Peminjaman</h1>
            <p class="text-slate-400 text-sm"><?= $isEdit ? "Edit data peminjaman" : "Tambah data peminjaman" ?></p>
        </div>
        <a class="bg-slate-800 hover:bg-slate-700 text-slate-200 text-sm font-semibold px-4 py-2 rounded-lg" href="Peminjaman.php">Back</a>
    </div>

    <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-6">
        <form class="space-y-5" action="" method="post">
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="tgl_pinjam">Tgl Peminjaman</label>
                <input class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="tgl_pinjam" name="tgl_pinjam" type="date" max="<?= $todayDate ?>" value="<?= htmlspecialchars($editPeminjaman["tgl_pinjam"] ?? $defaultTglPeminjaman, ENT_QUOTES) ?>" required />
            </div>
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="tgl_kembali">Tgl Kembali</label>
                <input class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="tgl_kembali" name="tgl_kembali" type="date" min="<?= htmlspecialchars($editPeminjaman["tgl_pinjam"] ?? $defaultTglPeminjaman, ENT_QUOTES) ?>" value="<?= htmlspecialchars($editPeminjaman["tgl_kembali"] ?? $defaultTglKembali, ENT_QUOTES) ?>" required />
            </div>
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="id_member">Member</label>
                <select class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="id_member" name="id_member" required>
                    <option value="" disabled <?= ($editPeminjaman["id_member"] ?? 0) ? "" : "selected" ?>>Pilih Member</option>
                    <?php foreach ($members as $member): ?>
                        <option value="<?= $member["id_member"] ?>" <?= ($editPeminjaman["id_member"] ?? 0) == $member["id_member"] ? "selected" : "" ?>>
                            <?= htmlspecialchars($member["id_member"] . " - " . $member["nama_member"], ENT_QUOTES) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="id_buku">Buku</label>
                <select class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="id_buku" name="id_buku" required>
                    <option value="" disabled <?= ($editPeminjaman["id_buku"] ?? 0) ? "" : "selected" ?>>Pilih Buku</option>
                    <?php foreach ($books as $book): ?>
                        <option value="<?= $book["id_buku"] ?>" <?= ($editPeminjaman["id_buku"] ?? 0) == $book["id_buku"] ? "selected" : "" ?>>
                            <?= htmlspecialchars($book["id_buku"] . " - " . $book["judul_buku"], ENT_QUOTES) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
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
