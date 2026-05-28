<!doctype html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-amber-100 via-orange-100 to-rose-200 p-6">
<div class="mx-auto w-full max-w-5xl">
    <div class="flex flex-col gap-6">
        <div class="bg-white/80 backdrop-blur border border-white/60 shadow-2xl rounded-3xl p-8 md:p-10">
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs uppercase tracking-widest text-gray-500">Profil Mahasiswa</p>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900">{{ $profile['name'] }}</h1>
                    <p class="text-gray-600">NIM: {{ $profile['nim'] }}</p>
                    <p class="text-gray-600">Asal Prodi: {{ $profile['prodi'] }}</p>
                </div>
                <div class="h-24 w-24 rounded-2xl bg-gradient-to-br from-amber-300 to-orange-400 flex items-center justify-center text-white text-3xl font-bold">
                    {{ strtoupper(substr($profile['name'], 0, 1)) }}
                </div>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <div class="rounded-2xl bg-white p-4 border border-gray-100 shadow-sm">
                    <p class="text-xs uppercase tracking-widest text-gray-400">Hobi</p>
                    <p class="font-semibold text-gray-800">{{ implode(', ', $profile['hobi']) }}</p>
                </div>
                <div class="rounded-2xl bg-white p-4 border border-gray-100 shadow-sm">
                    <p class="text-xs uppercase tracking-widest text-gray-400">Skill</p>
                    <p class="font-semibold text-gray-800">{{ implode(', ', $profile['skills']) }}</p>
                </div>
                <div class="rounded-2xl bg-white p-4 border border-gray-100 shadow-sm">
                    <p class="text-xs uppercase tracking-widest text-gray-400">Domisili</p>
                    <p class="font-semibold text-gray-800">{{ $profile['domisili'] }}</p>
                </div>
            </div>

            <div class="mt-6 rounded-2xl bg-white p-4 border border-gray-100 shadow-sm">
                <p class="text-xs uppercase tracking-widest text-gray-400">Kontak</p>
                <p class="font-semibold text-gray-800">{{ $profile['email'] }}</p>
            </div>
        </div>

        <div>
            <h2 class="text-xl font-bold text-gray-900 mb-4">Pengalaman Paling Berkesan</h2>
            <div class="grid gap-4 md:grid-cols-2">
                @foreach ($activities as $activity)
                    <a href="{{ route('activities.show', $activity['slug']) }}" class="block rounded-2xl bg-white/90 border border-white/60 shadow-lg p-5 hover:shadow-xl transition">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $activity['title'] }}</h3>
                                <p class="text-sm text-gray-600">{{ $activity['summary'] }}</p>
                            </div>
                            <span class="text-xs uppercase tracking-widest text-gray-400">{{ $activity['year'] }}</span>
                        </div>
                        <p class="mt-3 text-xs uppercase tracking-widest text-gray-400">Peran</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $activity['role'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="flex gap-4">
            <a href="/" class="px-6 py-3 rounded-xl bg-amber-400 text-amber-950 font-semibold shadow hover:shadow-lg transition">Beranda</a>
        </div>
    </div>
</div>
</body>
</html>

