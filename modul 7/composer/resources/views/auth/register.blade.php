<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Register</title>
</head>
<body class="min-h-screen bg-pink-50 text-rose-950">
<div class="min-h-screen flex items-center justify-center px-6 py-12">
    <div class="w-full max-w-md">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-semibold text-rose-900">Register</h1>
            <p class="text-rose-500 text-sm mt-1">Buat akun untuk mengakses CRUD buku</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 text-sm p-4 rounded-lg mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white/80 border border-pink-200 rounded-xl p-6 shadow-sm">
            <form class="space-y-5" action="{{ route('register.store') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-sm text-rose-700 mb-2" for="name">Nama</label>
                    <input class="w-full bg-pink-50 border border-pink-200 rounded-lg px-4 py-2 text-rose-950 focus:outline-none focus:ring-2 focus:ring-pink-300" id="name" name="name" type="text" placeholder="Nama lengkap" value="{{ old('name') }}" required autofocus />
                </div>
                <div>
                    <label class="block text-sm text-rose-700 mb-2" for="email">Email</label>
                    <input class="w-full bg-pink-50 border border-pink-200 rounded-lg px-4 py-2 text-rose-950 focus:outline-none focus:ring-2 focus:ring-pink-300" id="email" name="email" type="email" placeholder="nama@email.com" value="{{ old('email') }}" required />
                </div>
                <div>
                    <label class="block text-sm text-rose-700 mb-2" for="password">Password</label>
                    <input class="w-full bg-pink-50 border border-pink-200 rounded-lg px-4 py-2 text-rose-950 focus:outline-none focus:ring-2 focus:ring-pink-300" id="password" name="password" type="password" placeholder="Minimal 8 karakter" required />
                </div>
                <div>
                    <label class="block text-sm text-rose-700 mb-2" for="password_confirmation">Konfirmasi Password</label>
                    <input class="w-full bg-pink-50 border border-pink-200 rounded-lg px-4 py-2 text-rose-950 focus:outline-none focus:ring-2 focus:ring-pink-300" id="password_confirmation" name="password_confirmation" type="password" placeholder="Ulangi password" required />
                </div>
                <button class="w-full bg-pink-400 hover:bg-pink-500 text-white text-sm font-semibold px-4 py-2 rounded-lg" type="submit">Register</button>
            </form>
            <p class="text-sm text-rose-500 text-center mt-5">
                Sudah punya akun?
                <a class="font-semibold text-pink-500 hover:text-pink-600" href="{{ route('login') }}">Login</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
