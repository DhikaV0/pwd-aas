<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-sm w-full">
        <h2 class="text-green-600 text-center text-2xl font-bold mb-4">Login</h2>

        <!-- Menampilkan Pesan Error -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-green-700 text-sm font-bold mb-2" for="username">Username</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="username" value="{{ old('username') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-green-700 text-sm font-bold mb-2" for="password">Password</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="password" name="password" required>
            </div>
            <button
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                type="submit">
                Login
            </button>
        </form>

        <p class="text-center text-gray-600 text-sm mt-4">
            Belum punya akun? <a href="{{ route('register') }}" class="text-green-500 hover:underline">Daftar</a>
        </p>
    </div>
</body>
</html>
