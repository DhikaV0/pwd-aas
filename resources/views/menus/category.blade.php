<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - RestoGw</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen flex flex-col">

    <nav class="bg-green-500 border-gray-200 shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="#" class="text-xl font-bold text-white">RestoGw</a>
                </div>
                <div class="hidden md:flex items-center ml-auto space-x-8">  <!-- Align items to the right -->
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-green-600 font-medium mr-4">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </nav>


    <!-- Konten -->
    <div class="container mx-auto p-4 flex-grow">
        <h2 class="text-green-600 text-xl font-bold mb-4">Tambah Kategori Baru</h2>

        <!-- Form Tambah Kategori -->
        <div class="bg-green-100 shadow-md rounded-lg p-6">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nama Kategori</label>
                    <input type="text" name="name" id="name" required
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
                           style="height: 60px">
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

        <!-- Daftar Kategori -->
        <h3 class="text-green-600 text-lg font-bold mt-8 mb-4">Daftar Kategori</h3>
        <ul>
            @foreach ($categories as $category)
                <li class="mb-2">
                    <span class="text-gray-700">{{ $category->name }}</span>
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>
