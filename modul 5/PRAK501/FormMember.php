<?php
require_once __DIR__ . "/Koneksi.php";
require_once __DIR__ . "/Model.php";

function normalizeDateTimeValue($value) {
    $value = trim($value);
    if ($value === "") {
        return "";
    }
    if (strpos($value, "T") !== false) {
        $value = str_replace("T", " ", $value);
    }
    if (strlen($value) === 16) {
        $value .= ":00";
    }
    return $value;
}

function formatDateTimeForInput($value) {
    if ($value === null || $value === "") {
        return "";
    }
    $timestamp = strtotime($value);
    if ($timestamp === false) {
        return "";
    }
    return date("Y-m-d\TH:i", $timestamp);
}

$editId = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
$editMember = $editId > 0 ? getMemberById($conn, $editId) : null;
$isEdit = $editId > 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nomor = trim($_POST["nomor"] ?? "");
    $alamat = trim($_POST["alamat"] ?? "");
    $tglMendaftar = normalizeDateTimeValue($_POST["tgl_mendaftar"] ?? "");
    $tglTerakhirBayar = trim($_POST["tgl_terakhir_bayar"] ?? "");

    if (!$isEdit) {
        $tglMendaftar = date("Y-m-d H:i:s");
        $tglTerakhirBayar = date("Y-m-d");
    }

    if ($nama !== "" && $nomor !== "" && $alamat !== "" && $tglMendaftar !== "" && $tglTerakhirBayar !== "") {
        if ($editId > 0) {
            updateMemberData($conn, $editId, $nama, $nomor, $alamat, $tglMendaftar, $tglTerakhirBayar);
        } else {
            addMemberData($conn, $nama, $nomor, $alamat, $tglMendaftar, $tglTerakhirBayar);
        }
        header("Location: Member.php");
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
    <title>Form Member</title>
</head>
<body class="bg-slate-950 text-slate-100">
<div class="max-w-3xl mx-auto px-6 py-12">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Form Member</h1>
            <p class="text-slate-400 text-sm"><?= $isEdit ? "Edit data member" : "Tambah data member baru" ?></p>
        </div>
        <a class="bg-slate-800 hover:bg-slate-700 text-slate-200 text-sm font-semibold px-4 py-2 rounded-lg" href="Member.php">Back</a>
    </div>

    <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-6">
        <form class="space-y-5" action="" method="post">
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="nama">Nama</label>
                <input class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="nama" name="nama" type="text" placeholder="Melon Xzrev" value="<?= htmlspecialchars($editMember["nama_member"] ?? "", ENT_QUOTES) ?>" required />
            </div>
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="nomor">Nomor Telepon</label>
                <input class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="nomor" name="nomor" type="text" placeholder="08xxxxxxxxxx" value="<?= htmlspecialchars($editMember["nomor_member"] ?? "", ENT_QUOTES) ?>" required />
            </div>
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="alamat">Alamat</label>
                <input class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="alamat" name="alamat" type="text" placeholder="Jalan yang lurus" value="<?= htmlspecialchars($editMember["alamat"] ?? "", ENT_QUOTES) ?>" required />
            </div>
            <?php if ($isEdit): ?>
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="tgl_mendaftar">Tanggal Mendaftar</label>
                <input class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="tgl_mendaftar" name="tgl_mendaftar" type="datetime-local" value="<?= htmlspecialchars(formatDateTimeForInput($editMember["tgl_mendaftar"] ?? ""), ENT_QUOTES) ?>" required />
            </div>
            <div>
                <label class="block text-sm text-slate-300 mb-2" for="tgl_terakhir_bayar">Tanggal Terakhir Bayar</label>
                <input class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="tgl_terakhir_bayar" name="tgl_terakhir_bayar" type="date" value="<?= htmlspecialchars($editMember["tgl_terakhir_bayar"] ?? "", ENT_QUOTES) ?>" required />
            </div>
            <?php endif; ?>
            <div class="flex items-center justify-end gap-3 pt-2">
                <button class="bg-slate-800 hover:bg-slate-700 text-slate-200 text-sm font-semibold px-4 py-2 rounded-lg" type="reset">Reset</button>
                <button class="bg-indigo-500 hover:bg-indigo-400 text-white text-sm font-semibold px-4 py-2 rounded-lg" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
