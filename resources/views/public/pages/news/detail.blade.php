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
    </div>
@endsection
