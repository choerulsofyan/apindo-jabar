@extends('public.layouts.app')

@section('title', 'Berita - APINDO Jawa Barat')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Berita</h1>

        <div class="row mb-4 g-3 align-items-center">
            {{-- Search Form --}}
            <div class="col-md-8">
                <form method="GET" action="{{ route('news.index') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari berita..."
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            {{-- Sort Section --}}
            <div class="col-md-4 d-flex justify-content-end align-items-center gap-2">
                <span class="me-2">Urutkan tanggal posting:</span>
                <a href="{{ request()->fullUrlWithQuery(['sort' => 'asc']) }}"
                    class="btn btn-outline-secondary {{ request('sort', 'desc') == 'asc' ? 'active' : '' }}"
                    title="Urutkan dari terlama">
                    <i class="bi bi-sort-up"></i>
                </a>
                <a href="{{ request()->fullUrlWithQuery(['sort' => 'desc']) }}"
                    class="btn btn-outline-secondary {{ request('sort', 'desc') == 'desc' ? 'active' : '' }}"
                    title="Urutkan dari terbaru">
                    <i class="bi bi-sort-down"></i>
                </a>
            </div>
        </div>

        {{-- News List --}}
        <div class="row g-4">
            @foreach ($news as $item)
                <div class="col-12">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="row g-0">
                            {{-- Thumbnail --}}
                            @if ($item->photo)
                                <div class="col-md-3">
                                    <img src="{{ $item->photo }}" class="img-fluid rounded-start news-image"
                                        alt="{{ $item->title }}">
                                </div>
                            @endif

                            {{-- Content --}}
                            <div class="col-md-{{ $item->photo ? '9' : '12' }}">
                                <div class="card-body ps-4">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <small class="text-muted">
                                            <i class="bi bi-calendar me-1"></i>
                                            {{ $item->created_at->translatedFormat('d F Y') }}
                                        </small>

                                        @if ($item->place)
                                            <small class="text-muted">
                                                <i class="bi bi-geo-alt me-1"></i>
                                                {{ $item->place }}
                                            </small>
                                        @endif
                                    </div>

                                    <h3 class="card-title h5 mt-2">
                                        <a href="{{ route('news.detail', $item->id) }}"
                                            class="text-decoration-none text-dark fw-bold">
                                            {{ $item->title }}
                                        </a>
                                    </h3>

                                    <div class="card-text text-muted">
                                        {!! $item->shortContent !!}
                                    </div>

                                    <a href="{{ route('news.detail', $item->id) }}"
                                        class="btn btn-link px-0 text-primary mt-2">
                                        Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Showing Results --}}
        {{-- <div class="mt-4 text-center">
            Showing {{ $news->firstItem() }} to {{ $news->lastItem() }} of {{ $news->total() }} results
        </div> --}}

        {{-- Pagination --}}
        <div class="mt-5 d-flex justify-content-center">
            {{ $news->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card:hover {
            transform: translateY(-2px);
            transition: transform 0.2s ease;
        }

        .card {
            transition: transform 0.2s ease;
        }

        .btn-outline-secondary.active {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            color: white;
        }

        .thumbnail-img {
            height: 200px;
            /* Fixed height for consistent thumbnail size */
            object-fit: cover;
            /* Ensures the image covers the area without distortion */
        }
    </style>
@endpush
