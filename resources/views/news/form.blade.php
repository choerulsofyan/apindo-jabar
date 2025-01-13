@extends('layouts.admin')

@section('title', isset($news) ? 'Edit Berita' : 'Buat Berita')

@section('subheader')
    @include('partials.admin.subheader', [
        'title' => 'Manajemen Berita',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Manajemen Berita', 'url' => route('news.index')],
            [
                'name' => isset($news) ? 'Edit Berita' : 'Tambah Berita Baru',
                'url' => isset($news) ? route('news.edit', $news->id) : route('news.create'),
            ],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ isset($news) ? route('news.update', $news->id) : route('news.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if (isset($news))
                    @method('PATCH')
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">{{ isset($news) ? 'Edit Berita' : 'Tambah Berita Baru' }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $news->title ?? '') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5"
                                    required>{{ old('content', $news->content ?? '') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="place" class="col-sm-2 col-form-label">Place</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('place') is-invalid @enderror"
                                    id="place" name="place" value="{{ old('place', $news->place ?? '') }}">
                                @error('place')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                @if (isset($news) && $news->photo)
                                    @if (Storage::disk('public')->exists($news->photo))
                                        <img src="{{ Storage::url($news->photo) }}" alt="Current Photo"
                                            style="max-width: 200px;" class="mb-2">
                                    @else
                                        <img src="{{ asset('assets/images/image-not-found.png') }}" alt="Image Not Found"
                                            style="max-width: 200px;" class="mb-2">
                                    @endif
                                @else
                                    <img src="{{ asset('assets/images/no-image-available.png') }}" alt="No Image Available"
                                        style="max-width: 200px;" class="mb-2">
                                @endif

                                <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                    id="photo" name="photo" accept="image/jpeg,image/jpg,image/png">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('news.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
