<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Tambahkan Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-green-500 border-gray-200 shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="#" class="text-xl font-bold text-white">RestoGw</a>
                </div>

                <!-- Links dan Tombol Logout -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-green-600 font-medium">
                        Dashboard
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
        <!-- Mobile Menu -->
        <div class="hidden md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <a href="{{ route('dashboard') }}" class="block text-gray-700 hover:bg-green-600 rounded-md px-3 py-2 text-base font-medium">
                    Dashboard
                </a>
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="block w-full text-left text-white bg-red-500 hover:bg-red-600 px-3 py-2 rounded-md text-base font-medium">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Isi Halaman -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <h1 class="text-2xl font-bold text-gray-800">Masih Kosong :)</h1>
    </div>

    <!-- Script untuk Mobile Menu -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
