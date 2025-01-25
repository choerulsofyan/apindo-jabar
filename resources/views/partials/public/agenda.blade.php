<section class="py-10 px-4">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-6">AGENDA</h2>
        {{-- Placeholder for agenda items --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @for ($i = 0; $i < 3; $i++)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="font-bold text-lg mb-2">Agenda Item {{ $i + 1 }}</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            @endfor
        </div>
    </div>
</section>
