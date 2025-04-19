<section class="hero-section position-relative">
    <div id="heroCarousel" class="swiper">
        <div class="swiper-wrapper">
            <!-- Static Slide 1 -->
            <div class="swiper-slide" style="background-image: url('{{ asset('assets/images/hero-pattern.png') }}');">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center text-center">
                        <div class="col-12 col-md-10 col-lg-8 position-relative" style="z-index: 2;">
                            <h1 class="display-4 fw-bolder text-white mb-3">
                                Selamat datang di website APINDO Jabar
                            </h1>
                            <p class="lead fw-bold text-white mb-4">
                                KITA BISA, HARUS BISA, PASTI BISA
                            </p>
                            <a href="#about-section" class="btn btn-outline-light btn-lg px-4 py-2">
                                <i class="bi bi-arrow-down-circle me-2"></i>Pelajari Lebih Lanjut
                            </a>
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>

            <!-- Dynamic Slides from News -->
            @foreach ($newsSlides as $news)
                <div class="swiper-slide"
                    style="background-image: url('{{ Storage::url('images/news/' . $news->photo) }}');">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-center">
                            <div class="col-12 col-md-10 col-lg-8 position-relative" style="z-index: 2;">
                                <div class="bg-dark bg-opacity-50 p-3 p-md-4 rounded-3">
                                    <h2 class="display-5 fw-bold text-white mb-3">{{ $news->title }}</h2>
                                    <div class="lead text-white mb-3">{!! $news->short_content !!}</div>
                                    <div class="d-flex justify-content-start mt-4">
                                        <a href="{{ route('news.detail', $news->id) }}"
                                            class="btn btn-primary rounded-pill px-4">
                                            Baca Selengkapnya <i class="bi bi-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay-black"></div>
                </div>
            @endforeach

            <!-- Static Slide 2 -->
            <div class="swiper-slide" style="background-image: url('{{ asset('assets/images/hero-pattern.png') }}');">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center text-center">
                        <div class="col-12 col-md-10 col-lg-8 position-relative" style="z-index: 2;">
                            <h1 class="display-4 fw-bolder text-white mb-4">
                                Bergabunglah menjadi anggota untuk mendapatkan info regulasi dan bisnis
                            </h1>
                            @if (!Auth::check())
                                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4 py-2">
                                    <i class="bi bi-person-plus-fill me-2"></i>Daftar Sekarang
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Navigation -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

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
            background-color: rgba(2, 126, 182, 0.75);
        }

        .overlay-black {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
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
