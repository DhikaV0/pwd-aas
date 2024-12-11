<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu - RestoGw</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen flex flex-col">

    <nav class="bg-green-500 border-gray-200 shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="#" class="text-xl font-bold text-white">RestoGw</a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-green-600 font-medium">
                        Back
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="ml-4">
                        @csrf
                        <button type="submit"
                                class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md transition duration-300 ease-in-out">
                            Log Out
                        </button>
                    </form>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex md:hidden">
                    <button type="button" class="text-gray-700 hover:text-gray-900 focus:outline-none" id="menu-toggle">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container mx-auto p-4 flex-grow">
        <h2 class="text-green-600 text-xl font-bold mb-4">Tambah Menu Baru</h2>

        <!-- Form Tambah Menu -->
        <div class="bg-green-100 shadow-md rounded-lg p-6">
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nama Menu</label>
                    <input type="text" name="name" id="name" required
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
                           style="height: 60px">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                              class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"></textarea>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 font-medium mb-2">Harga</label>
                    <input type="number" name="price" id="price" required min="0"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
                           style="height: 60px">
                </div>

                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 font-medium mb-2">Kategori</label>
                    <select name="category_id" id="category_id" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
                            style="height: 60px">
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                        @endforeach
                        <option value="add-new">Tambahkan Kategori Baru</option>
                    </select>
                </div>

                <!-- Input kategori baru -->
                <div id="newCategoryInput" class="mb-4 hidden">
                    <label for="new_category" class="block text-gray-700 font-medium mb-2">Kategori Baru</label>
                    <input type="text" name="new_category" id="new_category"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
                           style="height: 60px">
                </div>

                <script>
                    document.getElementById('category_id').addEventListener('change', function () {
                        const newCategoryInput = document.getElementById('newCategoryInput');
                        if (this.value === 'add-new') {
                            newCategoryInput.classList.remove('hidden');
                        } else {
                            newCategoryInput.classList.add('hidden');
                        }
                    });
                </script>

                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
