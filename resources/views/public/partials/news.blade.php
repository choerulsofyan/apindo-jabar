<section id="news-section" class="py-5">
    <div class="container">
        <h2 class="text-center fw-bolder mb-4 text-primary">BERITA</h2>
        @if ($latestNews->isEmpty())
            <div class="alert alert-info">
                Tidak ada berita.
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @foreach ($latestNews as $news)
                    <div class="col">
                        <div class="card h-100 shadow-sm d-flex flex-column">
                            <div class="news-image-container">
                                @if ($news->photo)
                                    <img src="{{ $news->photo }}" class="card-img-top news-image"
                                        alt="{{ $news->title }}">
                                @else
                                    <img src="{{ asset('assets/images/logo.jpg') }}" class="card-img-top news-image"
                                        alt="{{ $news->title }}">
                                @endif
                            </div>
                            <div class="card-body d-flex flex-column">
                                <div class="card-text mt-0 mb-0">
                                    @if ($news->place)
                                        <i class="bi bi-geo-alt-fill me-1"></i>
                                        <small class="text-muted">{{ $news->place }}</small>
                                    @endif
                                    @if ($news->formatted_date)
                                        <i class="bi bi-calendar{{ $news->place ? ' ms-3' : '' }} me-1"></i>
                                        <small class="text-muted">{{ $news->formatted_date }}</small>
                                    @endif
                                </div>
                                <hr>
                                <h5 class="card-title fw-bold">{{ $news->title }}</h5>
                                <div class="card-text flex-grow-1">{!! $news->short_content !!}</div>
                                <a href="{{ route('news.detail', $news->id) }}"
                                    class="btn btn-outline-primary stretched-link mt-auto">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-start mt-5">
                <h5>
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        Lihat Semua Berita
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </h5>
            </div>
        @endif
    </div>
</section>
