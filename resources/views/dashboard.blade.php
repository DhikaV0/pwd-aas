<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-green-500 border-gray-200 shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="#" class="text-xl font-bold text-white">RestoGw</a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('menus.create') }}" class="text-white hover:text-green-600 font-medium">
                        Tambah Pesanan
                    </a>
                    <a href="{{ route('menus.category') }}" class="text-white hover:text-green-600 font-medium">
                        Kategori Makanan
                    </a>
                    <a href="{{ route('home') }}" class="text-white hover:text-green-600 font-medium">
                        Kembali
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

    <!-- Konten Dashboard -->
    <div class="container mx-auto p-4 flex-grow">
        <h2 class="text-green-600 text-xl font-bold mb-4">Dashboard Pesanan</h2>

        <!-- Daftar Menu -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-bold text-gray-700 mb-4">Daftar Menu</h3>
            <table class="table-auto w-full bg-white shadow-md rounded">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama Menu</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menu)
                        <tr class="text-center">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $menu->name }}</td>
                            <td class="px-4 py-2">Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $menu->category->category_name ?? 'Tanpa Kategori' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Tidak ada data menu.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
