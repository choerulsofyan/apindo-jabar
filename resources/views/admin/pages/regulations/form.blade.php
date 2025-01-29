@extends('admin.layouts.app')

@section('title', isset($regulation) ? 'Edit Regulasi' : 'Buat Regulasi')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Regulasi',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Manajemen Regulasi', 'url' => route('regulations.index')],
            [
                'name' => isset($regulation) ? 'Edit Regulasi' : 'Tambah Regulasi Baru',
                'url' => isset($regulation)
                    ? route('regulations.edit', $regulation->id)
                    : route('regulations.create'),
            ],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form
                action="{{ isset($regulation) ? route('regulations.update', $regulation->id) : route('regulations.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($regulation))
                    @method('PATCH')
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">{{ isset($regulation) ? 'Edit Regulasi' : 'Tambah Regulasi Baru' }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $regulation->title ?? '') }}"
                                    required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                    id="date" name="date" value="{{ old('date', $regulation->date ?? '') }}"
                                    required>
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="file" class="col-sm-2 col-form-label">File</label>
                            <div class="col-sm-10">
                                @if (isset($regulation) && $regulation->file)
                                    @if ($fileUrl)
                                        <a href="{{ $fileUrl }}" target="_blank" class="d-block mb-2">
                                            <i class="fa fa-file-pdf"></i> {{ $regulation->file }}
                                        </a>
                                    @else
                                        <p>File not found.</p>
                                    @endif
                                @endif

                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file" accept="application/pdf">
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('regulations.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
