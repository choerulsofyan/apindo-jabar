<section class="bg-blue-500 text-white py-16 px-4 relative">
    {{-- Background Image --}}
    <img src="{{ asset('images/hero-background.jpg') }}" alt="Hero Background"
        class="absolute inset-0 w-full h-full object-cover">

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black opacity-50"></div>

    <div class="container mx-auto relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 text-center">Selamat datang di <br> Website APINDO JAWA BARAT</h1>
        <p class="text-lg mb-8 text-center">Kita Bisa, Harus Bisa, Pasti Bisa</p>
        <div class="flex justify-center">
            <button class="bg-white hover:bg-gray-100 text-blue-500 font-bold py-2 px-6 rounded-full">
                <i class="fa fa-whatsapp mr-2"></i> Hubungi Kami Via Whatsapp
            </button>
        </div>
    </div>
</section>
