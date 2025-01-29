@extends('public.layouts.app')

@section('title', $news->title)

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                @if ($news->photo)
                    <img src="{{ Storage::url('/images/news/' . $news->photo) }}" class="card-img-top mb-3"
                        alt="{{ $news->title }}">
                @endif

                <h1 class="card-title">{{ $news->title }}</h1>

                <p class="card-text">
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    <small class="text-muted">{{ $news->place }}</small>
                </p>
                <p class="card-text">
                    <small class="text-muted">{{ $news->formatted_date }}</small>
                </p>

                <div class="card-text">
                    {!! $news->content !!} {{-- Display the full content --}}
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('home') }}" class="btn btn-secondary">Back to News</a>
            </div>
        </div>

        {{-- Related News Section --}}
        @if ($relatedNews->isNotEmpty())
            <h3 class="mt-5">Related News</h3>
            <div class="row">
                @foreach ($relatedNews as $item)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            @if ($item->photo)
                                <img src="{{ Storage::url('/images/news/' . $item->photo) }}" class="card-img-top"
                                    alt="{{ $item->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">
                                    <i class="bi bi-geo-alt-fill me-2"></i>
                                    <small class="text-muted">{{ $item->place }}</small>
                                </p>
                                <p class="card-text">{{ $item->short_content }}</p>
                                <a href="{{ route('public.news.detail', $item->id) }}" class="btn btn-primary">Read
                                    More</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ $item->formatted_date }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
