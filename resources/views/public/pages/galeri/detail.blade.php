@extends('public.layouts.app')

@section('title', 'galeri detail')

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                @if ($galeri->file)
                    <img src="{{ Storage::url('/images/galeri/' . $galeri->file) }}" class="card-img-top mb-3">
                @endif

                <p class="card-text">
                    <small class="text-muted">{{ $galeri->formatted_date }}</small>
                </p>

                <div class="card-text">
                    {!! $galeri->deskripsi !!} {{-- Display the full deskripsi --}}
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('home') }}" class="btn btn-secondary">Back to Galeri</a>
            </div>
        </div>

        {{-- Related News Section --}}
        @if ($relatedGaleri->isNotEmpty())
            <h3 class="mt-5">Related Galeri</h3>
            <div class="row">
                @foreach ($relatedGaleri as $item)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            @if ($item->file)
                                <img src="{{ Storage::url('/images/galeri/' . $item->file) }}" class="card-img-top">
                            @endif
                            <div class="card-body">
                                <p class="card-text">{{ $item->short_content }}</p>
                                <a href="{{ route('public.galeri.detail', $item->id) }}" class="btn btn-primary">Read
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
