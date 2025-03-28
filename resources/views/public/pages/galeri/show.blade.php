@extends('public.layouts.app')

@section('title', 'Galeri - APINDO Jawa Barat')
@section('meta_description', Str::limit(strip_tags('Galeri APINDO Jawa Barat'), 155))

@section('content')
    <section id="gallery-section" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bolder mb-4 text-primary">GALERI</h2>

            @if ($latestImages->isEmpty())
                <div class="alert alert-info text-center">
                    Tidak ada galeri.
                </div>
            @else
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-4">
                    @foreach ($latestImages as $image)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <a href="{{ Storage::url('images/galeri/' . $image->file) }}" 
                                   data-lightbox="gallery-images" 
                                   data-title="<h5 class='text-white'>{{ $image->deskripsi }}</h5> <br> <small>{{ $image->formatted_date }}</small>">
                                    <div class="gallery-image-container">
                                        <img src="{{ Storage::url('images/galeri/' . $image->file) }}"
                                             class="card-img-top gallery-image" 
                                             alt="{{ $image->deskripsi }}">
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $latestImages->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
