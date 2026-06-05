<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Form Buku</title>
</head>
<body class="bg-pink-50 text-rose-950">
<div class="max-w-3xl mx-auto px-6 py-12">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-rose-900">Form Buku</h1>
            <p class="text-rose-500 text-sm">{{ isset($buku) ? "Edit data buku" : "Tambah data buku baru" }}</p>
        </div>
        <a class="bg-white hover:bg-pink-100 border border-pink-200 text-rose-600 text-sm font-semibold px-4 py-2 rounded-lg" href="{{ route('buku.index') }}">Back</a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 text-sm p-4 rounded-lg mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white/80 border border-pink-200 rounded-xl p-6 shadow-sm">
        <form class="space-y-5" action="{{ isset($buku) ? route('buku.update', $buku['id']) : route('buku.store') }}" method="POST">
            @csrf
            @if(isset($buku))
                @method('PUT')
            @endif
            <div>
                <label class="block text-sm text-rose-700 mb-2" for="judul">Judul Buku</label>
                <input class="w-full bg-pink-50 border border-pink-200 rounded-lg px-4 py-2 text-rose-950 focus:outline-none focus:ring-2 focus:ring-pink-300" id="judul" name="judul" type="text" placeholder="Bagaikan Langit" value="{{ old('judul', $buku['judul'] ?? '') }}"  />
            </div>
            <div>
                <label class="block text-sm text-rose-700 mb-2" for="penulis">Penulis</label>
                <input class="w-full bg-pink-50 border border-pink-200 rounded-lg px-4 py-2 text-rose-950 focus:outline-none focus:ring-2 focus:ring-pink-300" id="penulis" name="penulis" type="text" placeholder="Agung Hercules" value="{{ old('penulis', $buku['penulis'] ?? '') }}"  />
            </div>
            <div>
                <label class="block text-sm text-rose-700 mb-2" for="penerbit">Penerbit</label>
                <input class="w-full bg-pink-50 border border-pink-200 rounded-lg px-4 py-2 text-rose-950 focus:outline-none focus:ring-2 focus:ring-pink-300" id="penerbit" name="penerbit" type="text" placeholder="di sore hari" value="{{ old('penerbit', $buku['penerbit'] ?? '') }}"  />
            </div>
            <div>
                <label class="block text-sm text-rose-700 mb-2" for="tahun_terbit">Tahun Terbit</label>
                <input class="w-full bg-pink-50 border border-pink-200 rounded-lg px-4 py-2 text-rose-950 focus:outline-none focus:ring-2 focus:ring-pink-300" id="tahun_terbit" name="tahun_terbit" type="number" min="1800" max="2026" placeholder="2013" value="{{ old('tahun_terbit', $buku['tahun_terbit'] ?? '') }}"  />
            </div>
            <div class="flex items-center justify-end gap-3 pt-2">
                <button class="bg-white hover:bg-pink-100 border border-pink-200 text-rose-600 text-sm font-semibold px-4 py-2 rounded-lg" type="reset">Reset</button>
                <button class="bg-pink-400 hover:bg-pink-500 text-white text-sm font-semibold px-4 py-2 rounded-lg" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
