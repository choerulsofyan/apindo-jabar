<section id="news-section" class="py-5">
    <div class="container">
        <h2 class="text-center fw-bolder mb-4 text-primary">BERITA</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @forelse ($latestNews as $news)
                <div class="col">
                    <div class="card h-100 border-0">
                        <img src="{{ $news->photo ? Storage::url('images/news/' . $news->photo) : asset('assets/images/sample.jpg') }}"
                            class="card-img-top" alt="{{ $news->title }}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $news->title }}</h5>
                            <p class="card-text">
                                <small class="text-muted">{{ $news->place }}, {{ $news->formatted_date }}</small>
                            </p>
                            <p class="card-text">{{ $news->short_content }}</p>
                            <a href="#" class="btn btn-primary stretched-link">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p class="text-center">No news available.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
