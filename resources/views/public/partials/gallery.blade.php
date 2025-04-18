<section id="gallery-section" class="py-5 py-lg-7">
    <div class="container">
        <!-- Section Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bolder text-primary mb-3">GALERI FOTO</h2>
                <p class="lead text-dark">Dokumentasi kegiatan dan acara APINDO Jawa Barat</p>
            </div>
        </div>

        <!-- Gallery Grid -->
        @if ($latestImages->isEmpty())
            <div class="alert alert-info text-center py-4">
                <i class="bi bi-info-circle me-2"></i> Tidak ada foto dalam galeri saat ini.
            </div>
        @else
            <div class="row g-3 g-md-4">
                @php $count = 0; @endphp
                @foreach ($latestImages as $image)
                    @php $count++; @endphp
                    <div class="{{ $count <= 2 ? 'col-12 col-md-6' : 'col-6 col-md-4 col-lg-3' }}">
                        <div class="card gallery-card border-0 shadow-sm h-100 position-relative overflow-hidden">
                            <a href="{{ Storage::url('images/galeri/' . $image->file) }}" data-lightbox="gallery-images"
                                data-title="<h5 class='text-white'>{{ $image->deskripsi }}</h5> <br> <small>{{ $image->formatted_date }}</small>"
                                class="gallery-link position-relative d-block">

                                <!-- Aspect Ratio Box Technique -->
                                <div class="position-relative" style="padding-top: 75%"> <!-- 4:3 aspect ratio -->
                                    <img src="{{ Storage::url('images/galeri/' . $image->file) }}"
                                        class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
                                        alt="{{ $image->deskripsi }}">
                                </div>

                                <!-- Image Overlay with Title -->
                                <div class="gallery-overlay position-absolute start-0 bottom-0 w-100 p-3 d-flex align-items-end"
                                    style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%); height: 50%;">
                                    <div class="text-white">
                                        <p class="m-0 small">{{ Str::limit($image->deskripsi, 60) }}</p>
                                        <small class="opacity-75">{{ $image->formatted_date }}</small>
                                    </div>
                                </div>

                                <!-- Zoom Icon Overlay -->
                                <div class="zoom-icon position-absolute top-50 start-50 translate-middle">
                                    <i class="bi bi-zoom-in text-white fs-2 opacity-0"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Link -->
            <div class="text-center mt-5">
                <a href="{{ route('gallery.all') }}" class="btn btn-outline-primary px-4 py-2">
                    Lihat Semua Galeri
                    <i class="bi bi-images ms-2"></i>
                </a>
            </div>
        @endif
    </div>
</section>

@push('styles')
    <style>
        .gallery-link {
            transition: all 0.3s ease;
        }

        .gallery-link:hover img {
            transform: scale(1.05);
            transition: transform 0.5s ease;
        }

        .gallery-link:hover .zoom-icon i {
            opacity: 1 !important;
            transition: opacity 0.3s ease;
        }

        .zoom-icon i {
            filter: drop-shadow(0px 0px 5px rgba(0, 0, 0, 0.5));
            transition: opacity 0.3s ease;
        }

        .gallery-card {
            transition: all 0.3s ease;
        }

        .gallery-card:hover {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }
    </style>
@endpush
