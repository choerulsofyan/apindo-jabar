<section id="news-section" class="py-5 py-lg-7 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bolder text-primary mb-3">BERITA TERBARU</h2>
                <p class="lead text-dark">Informasi terkini tentang kegiatan dan perkembangan APINDO Jawa Barat</p>
            </div>
        </div>

        <!-- News Cards -->
        @if ($latestNews->isEmpty())
            <div class="alert alert-info text-center py-4">
                <i class="bi bi-info-circle me-2"></i> Tidak ada berita saat ini.
            </div>
        @else
            <div class="row g-4">
                @foreach ($latestNews as $news)
                    <div class="col-12 col-md-3 mb-4">
                        <article class="news-post h-100 d-flex flex-column">
                            <!-- News Image with Fixed Aspect Ratio -->
                            <div class="news-image-container mb-3">
                                <a href="{{ route('news.detail', $news->id) }}" class="d-block">
                                    <div class="position-relative" style="padding-top: 75%"> <!-- 4:3 aspect ratio -->
                                        @if ($news->photo)
                                            <img src="{{ $news->photo }}"
                                                class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
                                                alt="{{ $news->title }}">
                                        @else
                                            <img src="{{ asset('assets/images/logo.jpg') }}"
                                                class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
                                                alt="{{ $news->title }}">
                                        @endif
                                    </div>
                                </a>
                            </div>

                            <!-- News Meta -->
                            <div class="news-meta small text-muted mb-2">
                                @if ($news->formatted_date)
                                    <span class="news-date me-3">
                                        <i class="bi bi-calendar3 me-1"></i>{{ $news->formatted_date }}
                                    </span>
                                @endif
                                @if ($news->place)
                                    <span class="news-category">
                                        <i class="bi bi-geo-alt me-1"></i>{{ $news->place }}
                                    </span>
                                @endif
                            </div>

                            <!-- News Title -->
                            <h3 class="news-title h5 mb-2">
                                <a href="{{ route('news.detail', $news->id) }}"
                                    class="text-decoration-none text-dark">{{ $news->title }}</a>
                            </h3>

                            <!-- News Excerpt -->
                            <div class="news-excerpt text-secondary-dark mb-2">{!! $news->short_content_highlight !!}</div>

                            <!-- Read More -->
                            <a href="{{ route('news.detail', $news->id) }}" class="news-read-more text-decoration-none"
                                aria-label="Baca selengkapnya tentang {{ $news->title }}">Baca selengkapnya <i
                                    class="bi bi-arrow-right ms-1 small"></i></a>
                        </article>
                    </div>
                @endforeach
            </div>

            <!-- View All Link -->
            <div class="text-center mt-5">
                <a href="{{ route('news.index') }}" class="btn btn-outline-primary px-4 py-2">
                    Lihat Semua Berita
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        @endif
    </div>
</section>
