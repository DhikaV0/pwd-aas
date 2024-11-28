<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 min-h-screen flex flex-col">

    <nav class="bg-green-500 border-gray-200 shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="#" class="text-xl font-bold text-white">RestoGw</a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('create') }}" class="text-white hover:text-green-600 font-medium">
                        Tambah Pesanan
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="ml-4">
                        @csrf
                        <button type="submit"
                                class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md transition duration-300 ease-in-out">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container mx-auto p-4 flex-grow">
        <h2 class="text-green-600 text-xl font-bold mb-4">Dashboard Pesanan</h2>

        <!-- Tabel Pesanan -->
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow-md rounded-lg">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Nama Makanan</th>
                        <th class="py-2 px-4">Harga</th>
                        <th class="py-2 px-4">Kategori</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($menus as $index => $menu)
                        <tr>
                            <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 text-center">{{ $menu->name }}</td>
                            <td class="py-2 px-4 text-center">Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                            <td class="py-2 px-4 text-center">{{ $menu->category->name ?? 'Tanpa Kategori' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <footer class="bg-green-600 text-white text-center py-2">
        <p>&copy; 2024 Pemesanan Makanan</p>
    </footer>
</body>
</html>
