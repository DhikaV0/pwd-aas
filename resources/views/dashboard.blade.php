<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle("hidden");
            modal.classList.toggle("flex");
        }
    </script>
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
                    <a href="#" onclick="toggleModal('menuModal')" class="text-white hover:text-green-600 font-medium">
                        Daftar Menu
                    </a>
                    <a href="{{ route('menus.create') }}" class="text-white hover:text-green-600 font-medium">
                        Tambah Pesanan
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
        <p>Konten ;v</p>
    </div>

    <!-- Modal Popup Daftar Menu -->
    <div id="menuModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-4/5 max-w-3xl">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 bg-green-500 text-white rounded-t-lg">
                <h2 class="text-lg font-bold">Daftar Menu</h2>
                <button onclick="toggleModal('menuModal')" class="text-white hover:text-gray-300 text-2xl">&times;</button>
            </div>

            <!-- Modal Content -->
            <div class="p-4">
                <table class="table-auto w-full bg-white shadow-md rounded mt-4">
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

            <!-- Modal Footer -->
            <div class="flex justify-end p-4 border-t">
                <button onclick="toggleModal('menuModal')" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Tutup
                </button>
            </div>
        </div>
    </div>

</body>
</html>
