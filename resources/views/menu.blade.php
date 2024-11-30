<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col justify-center items-center">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-center text-green-600 mb-6">Daftar Menu</h1>

        @if ($menus->isEmpty())
            <div class="bg-yellow-100 text-yellow-700 p-4 rounded shadow text-center">
                Tidak ada menu yang tersedia saat ini.
            </div>
        @else
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-green-500 text-white">
                        <tr>
                            <th class="py-3 px-4">No</th>
                            <th class="py-3 px-4">Nama Menu</th>
                            <th class="py-3 px-4">Harga</th>
                            <th class="py-3 px-4">Kategori</th>
                            <th class="py-3 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($menus as $key => $menu)
                            <tr class="border-b">
                                <td class="py-2 px-4 text-center">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4">{{ $menu->name }}</td>
                                <td class="py-2 px-4">Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                                <td class="py-2 px-4">{{ $menu->category->category_name ?? 'Tanpa Kategori' }}</td>
                                <td class="py-2 px-4 text-center">
                                    <a href="{{ route('menus.edit', $menu->id) }}"
                                       class="text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>
