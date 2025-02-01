<section id="gallery-section" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bolder mb-4 text-primary">GALERI</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-4">
            @forelse ($latestImages as $image)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <a href="{{ Storage::url('images/galeri/' . $image->file) }}" data-lightbox="gallery-images"
                            data-title="<h5 class='text-white'>{{ $image->deskripsi }}</h5> <br> <small>{{ $image->formatted_date }}</small>">
                            <div class="gallery-image-container">
                                <img src="{{ Storage::url('images/galeri/' . $image->file) }}"
                                    class="card-img-top gallery-image" alt="{{ $image->deskripsi }}">
                            </div>
                        </a>
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
