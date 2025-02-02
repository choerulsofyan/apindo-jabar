@extends('public.layouts.app')

@section('title', $news->title)

@section('content')
    <div class="container my-5 pt-5 pb-5">
        <div class="row">
            <div class="col-lg-8">
                {{-- Main Content --}}
                <article class="news-detail">
                    <h1 class="news-title mb-3 pe-2">{{ $news->title }}</h1>
                    <p class="news-info">
                        <i class="bi bi-geo-alt-fill me-2 text-primary"></i>
                        <span class="text-muted">{{ $news->place }},</span>
                        <i class="bi bi-calendar ms-4 me-2 text-primary"></i>
                        <span class="text-muted">{{ $news->formatted_date }}</span>
                    </p>
                    @if ($news->photo)
                        @if (Storage::disk('public')->exists('images/news/' . $news->photo))
                            <img src="{{ Storage::url('images/news/' . $news->photo) }}" class="img-fluid mb-4"
                                alt="{{ $news->title }}">
                        @else
                            <img src="{{ asset('assets/images/placeholder.png') }}" class="img-fluid mb-4"
                                alt="Placeholder Image">
                        @endif
                    @else
                        <img src="{{ asset('assets/images/placeholder.png') }}" class="img-fluid mb-4"
                            alt="Placeholder Image">
                    @endif

                    <div class="news-content">
                        <strong>{{ $news->place }}</strong> -
                        {!! $news->content !!}
                    </div>
                </article>
            </div>

            <div class="col-lg-4">
                {{-- Related News --}}
                @if ($relatedNews->isNotEmpty())
                    <div class="related-news">
                        <h4 class="mb-3">Berita Lainnya</h4>
                        <ul class="list-group">
                            @foreach ($relatedNews as $item)
                                <li class="list-group-item border-top-0 border-start-0 border-end-0 pb-3 mb-3">
                                    <div class="d-flex">
                                        @if ($item->photo)
                                            @if (Storage::disk('public')->exists('images/news/' . $item->photo))
                                                <img src="{{ Storage::url('images/news/' . $item->photo) }}"
                                                    alt="{{ $item->title }}" class="related-news-img me-3">
                                            @else
                                                <img src="{{ asset('assets/images/logo_blue.png') }}"
                                                    alt="Placeholder Image" class="related-news-img me-3">
                                            @endif
                                        @else
                                            <img src="{{ asset('assets/images/logo_blue.png') }}" alt="Placeholder Image"
                                                class="related-news-img me-3">
                                        @endif
                                        <div class="flex-grow-1">
                                            <h5 class="related-news-title">{{ $item->title }}</h5>
                                            <p class="related-news-info">
                                                <small class="text-muted">{{ $item->place }}</small>
                                                <small class="text-muted">| {{ $item->formatted_date }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <h5>
                            <a href="{{ route('home') }}" class="text-decoration-none">
                                Lihat Semua Berita
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </h5>

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
