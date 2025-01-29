<section id="gallery-section" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bolder mb-4 text-primary">GALLERY</h2>
        <div class="row">
            @forelse ($latestImages as $image)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url('images/galeri/' . $image->file) }}" class="card-img-top"
                            alt="Gallery Image">
                        <div class="card-body">
                            <p class="card-text">
                                <small class="text-muted">{{ $image->formatted_date }}</small>
                            </p>
                            <p class="card-text">
                                {{ $image->short_description }}
                                <a href="#">Read More</a>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p class="text-center">No images found.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
