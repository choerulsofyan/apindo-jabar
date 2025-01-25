<nav class="bg-white shadow-md py-2">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('assets/images/logo-apindo.jpg') }}" alt="APINDO Logo" class="h-16">
        </div>
        <div class="hidden md:flex space-x-6">
            {{-- Assuming these are your primary navigation links --}}
            <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
            <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Tentang Kami</a>
            <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Berita</a>
            <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Galeri</a>
            <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Kepengurusan</a>
            <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Anggota</a>
            <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Regulasi</a>
            <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Kontak</a>
            <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Masuk/Daftar</a>
        </div>
        {{-- Search and Login --}}
        <div class="flex items-center space-x-4">
            <input type="text" placeholder="Search..." class="px-4 py-2 border rounded-md">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Login
            </button>
        </div>
    </div>
</nav>
