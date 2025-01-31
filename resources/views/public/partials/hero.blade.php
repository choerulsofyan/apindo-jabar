<div id="heroCarousel" class="swiper">
    <div class="swiper-wrapper">
        {{-- Static Slide 1 --}}
        <div class="swiper-slide" style="background-image: url('{{ asset('assets/images/hero-pattern.png') }}');">
            <div class="d-flex justify-content-center align-items-center h-100 position-relative">
                <div class="text-left text-white p-4 position-absolute start-50 translate-middle-x" style="z-index: 10;">
                    <h1 class="mb-3 display-4">Selamat datang di website APINDO Jabar</h1>
                    <p class="mb-0 lead">KITA BISA, HARUS BISA, PASTI BISA</p>
                </div>
                <div class="overlay"></div>
            </div>
        </div>

        {{-- Dynamic Slides from News --}}
        @foreach ($newsSlides as $news)
            <div class="swiper-slide"
                style="background-image: url('{{ Storage::url('images/news/' . $news->photo) }}');">
                <div class="d-flex justify-content-center align-items-center h-100 position-relative">
                    <div class="text-left text-white p-4 position-absolute start-50 translate-middle-x"
                        style="z-index: 10;">
                        <h1 class="mb-3 display-4">{{ $news->title }}</h1>
                        <p class="mb-0 lead">{{ $news->short_content }}</p>
                    </div>
                    {{-- <div class="overlay"></div> --}}
                </div>
            </div>
        @endforeach

        {{-- Static Slide 2 --}}
        <div class="swiper-slide" style="background-image: url('{{ asset('assets/images/hero-pattern.png') }}');">
            <div class="d-flex justify-content-center align-items-center h-100 position-relative">
                <div class="text-left text-white p-4 position-absolute start-50 translate-middle-x"
                    style="z-index: 10;">
                    <h1 class="mb-3 display-4">Bergabunglah menjadi anggota untuk mendapatkan info regulasi dan bisnis
                    </h1>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
    </div>

    {{-- Add Pagination --}}
    <div class="swiper-pagination"></div>

    {{-- Add Navigation Arrows --}}
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

@push('styles')
    <style>
        .swiper {
            width: 100%;
            height: 436px;
            /* border: solid 4px red; */
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(2, 126, 182, 0.7);
        }
    </style>
@endpush

@push('scripts')
    @vite(['resources/js/public/swiper.js'])
    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            const carouselItems = document.querySelectorAll('#heroCarousel .carousel-item');
            const imageUrl = "{{ asset('assets/images/hero-pattern.png') }}";

            carouselItems.forEach(item => {
                item.style.backgroundImage =
                    `linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('${imageUrl}')`;
                item.style.height = '436px';
                item.style.backgroundSize = 'cover';
                item.style.backgroundPosition = 'center';
            });

            var swiper = new Swiper('#heroCarousel', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
@endpush
