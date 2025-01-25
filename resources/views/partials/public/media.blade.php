<section class="bg-gray-100 py-10 px-4">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-6">MEDIA & BERITA</h2>
        {{-- Placeholder for news items --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @for ($i = 0; $i < 3; $i++)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('images/news-placeholder.jpg') }}" alt="News Image" class="w-full">
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">News Title {{ $i + 1 }}</h3>
                        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
