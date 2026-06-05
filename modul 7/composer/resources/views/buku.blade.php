<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Buku</title>
</head>
<body class="bg-pink-50 text-rose-950">
<div class="max-w-5xl mx-auto px-6 py-12">
    <div class="flex items-center justify-between mb-6">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-white hover:bg-pink-100 border border-pink-200 text-rose-600 text-sm font-semibold px-4 py-2 rounded-lg h-10" type="submit">Logout</button>
        </form>
        <div class="flex flex-col items-center">
            <h1 class="text-2xl font-semibold text-rose-900">Buku</h1>
            <p class="text-rose-500 text-sm">List Buku Perpustakaan</p>
        </div>
        <a href="{{ route('buku.create') }}" class="bg-pink-400 hover:bg-pink-500 text-white text-sm font-semibold px-4 py-2 rounded-lg">+ Tambah Buku</a>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white/80 border border-pink-200 rounded-xl overflow-hidden shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-pink-100">
            <tr class="text-left text-rose-600">
                <th class="px-6 py-3 font-medium">ID</th>
                <th class="px-6 py-3 font-medium">Judul Buku</th>
                <th class="px-6 py-3 font-medium">Penulis</th>
                <th class="px-6 py-3 font-medium">Penerbit</th>
                <th class="px-6 py-3 font-medium">Tahun Terbit</th>
                <th class="px-6 py-3"></th>
                <th class="px-6 py-3"></th>
            </tr>
            </thead>
            <tbody class="divide-y divide-pink-100">
            @foreach($books as $buku)
            <tr>
                <td class="px-6 py-4 text-rose-500">{{ $buku['id'] }}</td>
                <td class="px-6 py-4 text-rose-950 font-medium">{{ $buku['judul'] }}</td>
                <td class="px-6 py-4 text-rose-600">{{ $buku['penulis'] }}</td>
                <td class="px-6 py-4 text-rose-600">{{ $buku['penerbit'] }}</td>
                <td class="px-6 py-4 text-rose-600">{{ $buku['tahun_terbit'] }}</td>
                <td class="px-6 py-4 text-right"><a class="text-pink-500 hover:text-pink-600 font-medium" href="{{route('buku.edit', $buku['id'])}}">Edit</a></td>
                <td class="px-6 py-4 text-right"><a class="text-red-500 hover:text-red-600 font-medium" onclick="return confirm('Hapus buku ini')" href="{{ route('buku.delete', $buku['id']) }}">Delete</a></td>
            </tr>
            @endforeach
            @if($books->isEmpty())
            <tr>
                <td class="px-6 py-8 text-center text-rose-500" colspan="7">Belum ada data buku.</td>
            </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
