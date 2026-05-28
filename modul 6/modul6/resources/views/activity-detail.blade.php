<!doctype html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-amber-100 via-orange-100 to-rose-200 p-6">
<div class="mx-auto w-full max-w-3xl">
    <div class="bg-white/85 backdrop-blur border border-white/60 shadow-2xl rounded-3xl p-8 md:p-10">
        <p class="text-xs uppercase tracking-widest text-gray-500">Detail Pengalaman</p>
        <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900">{{ $activity['title'] }}</h1>
        <p class="text-gray-600">{{ $activity['summary'] }}</p>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            <div class="rounded-2xl bg-white p-4 border border-gray-100 shadow-sm">
                <p class="text-xs uppercase tracking-widest text-gray-400">Peran</p>
                <p class="font-semibold text-gray-800">{{ $activity['role'] }}</p>
            </div>
            <div class="rounded-2xl bg-white p-4 border border-gray-100 shadow-sm">
                <p class="text-xs uppercase tracking-widest text-gray-400">Tahun</p>
                <p class="font-semibold text-gray-800">{{ $activity['year'] }}</p>
            </div>
        </div>

        <div class="mt-6 rounded-2xl bg-white p-4 border border-gray-100 shadow-sm">
            <p class="text-xs uppercase tracking-widest text-gray-400">Highlight</p>
            <ul class="mt-2 list-disc list-inside text-gray-800">
                @foreach ($activity['highlights'] as $highlight)
                    <li>{{ $highlight }}</li>
                @endforeach
            </ul>
        </div>

        <div class="mt-8 flex flex-wrap gap-4">
            <a href="{{ route('profile') }}" class="px-6 py-3 rounded-xl bg-amber-400 text-amber-950 font-semibold shadow hover:shadow-lg transition">Kembali ke Profil</a>
            <a href="/" class="px-6 py-3 rounded-xl bg-gray-900 text-white font-semibold shadow hover:shadow-lg transition">Beranda</a>
        </div>
    </div>
</div>
</body>
</html>

