@extends('admin.layouts.app')
@section('title', isset($galeri) ? 'Edit Galeri' : 'Buat Galeri')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Galeri',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Galeri', 'url' => route('mindo.galeri.index')],
            [
                'name' => isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri',
                'url' => isset($galeri) ? route('mindo.galeri.edit', $galeri->id) : route('mindo.galeri.create'),
            ],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ isset($galeri) ? route('mindo.galeri.update', $galeri->id) : route('mindo.galeri.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($galeri))
                    @method('PATCH')
                @endif

                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">{{ isset($galeri) ? 'Edit Galeri' : 'Tambah Data Baru' }}</h3>
                    </div>
                    <div class="card-body">
                        <!-- Tanggal -->
                        <div class="row mb-3">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal" name="tanggal" value="{{ now()->format('Y-m-d H:i:s') }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5"
                                    required>{{ old('deskripsi', $galeri->deskripsi ?? '') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Photo -->
                        <div class="row mb-3">
                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <img id="imagePreview" src="{{ $imageSrc ?? asset('images/default-image.jpg') }}"
                                    alt="Image Preview" style="max-width: 200px;" class="mb-2">
                                <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                    id="photo" name="photo" accept=".jpeg,.jpg,.png"
                                    {{ isset($galeri) ? '' : 'required' }}>
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('mindo.galeri.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const photoInput = document.getElementById('photo');
        const imagePreview = document.getElementById('imagePreview');
        const originalImageSrc = imagePreview.src; // Store the initial image source

        // Event listener for file input change
        photoInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                // Create a URL for the selected file and update the image preview
                imagePreview.src = URL.createObjectURL(file);
            } else {
                // If no file selected, reset to the original image
                imagePreview.src = originalImageSrc;
            }
        });
    </script>
@endpush
