<!doctype html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-amber-100 via-orange-100 to-rose-200 flex items-center justify-center p-6">
<div class="w-full max-w-2xl flex justify-center">
    <div class="bg-white/80 backdrop-blur border border-white/60 shadow-2xl rounded-3xl p-8 justify-center flex flex-col">
        <div class="flex items-center gap-6">
            <div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900">{{ $name }}</h1>
                <p class="text-gray-600">NIM: {{ $nim }}</p>
            </div>
        </div>

        <div class="mt-8 grid gap-4 justify-center place-items-center grid-cols-2">
            <div class="rounded-2xl bg-white p-4 border border-gray-100 shadow-sm w-50">
                <p class="text-xs uppercase tracking-widest text-gray-400">Kelas</p>
                <p class="font-semibold text-gray-800">Prak Web 2</p>
            </div>
            <div class="rounded-2xl bg-white p-4 border border-gray-100 shadow-sm w-50">
                <p class="text-xs uppercase tracking-widest text-gray-400">Modul</p>
                <p class="font-semibold text-gray-800">6</p>
            </div>
        </div>

        <div class="mt-10 flex gap-4 justify-center">
            <a href="/profil" class="px-6 py-3 rounded-xl bg-amber-400 text-amber-950 font-semibold shadow hover:shadow-lg transition">Profil</a>
            <a href="/" class="px-6 py-3 rounded-xl bg-gray-900 text-white font-semibold shadow hover:shadow-lg transition">Beranda</a>
        </div>
    </div>
</div>
</body>
</html>
