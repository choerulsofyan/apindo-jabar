@extends('admin.layouts.app')

@section('title', isset($management) ? 'Edit Manajemen' : 'Tambah Manajemen')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Kepengurusan',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Manajemen Kepengurusan', 'url' => route('managements.index')],
            [
                'name' => isset($council) ? 'Edit Kepengurusan' : 'Tambah Kepengurusan Baru',
                'url' => isset($council) ? route('managements.edit', $council->id) : route('managements.create'),
            ],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form
                action="{{ isset($management) ? route('managements.update', $management->id) : route('managements.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($management))
                    @method('PATCH')
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">{{ isset($management) ? 'Edit Manajemen' : 'Tambah Manajemen' }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="member_number" class="col-sm-2 col-form-label">No. Anggota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('member_number') is-invalid @enderror"
                                    id="member_number" name="member_number"
                                    value="{{ old('member_number', $management->member_number ?? '') }}" required>
                                @error('member_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $management->name ?? '') }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="company" class="col-sm-2 col-form-label">Perusahaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('company') is-invalid @enderror"
                                    id="company" name="company" value="{{ old('company', $management->company ?? '') }}"
                                    required>
                                @error('company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="organizational_position_id" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('organizational_position_id') is-invalid @enderror"
                                    id="organizational_position_id" name="organizational_position_id">
                                    <option value="">Pilih Jabatan</option>
                                    @foreach ($organizationalPositions as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('organizational_position_id', $management->organizational_position_id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('organizational_position_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sector_id" class="col-sm-2 col-form-label">Sektor</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('sector_id') is-invalid @enderror" id="sector_id"
                                    name="sector_id">
                                    <option value="">Pilih Sektor</option>
                                    @foreach ($sectors as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('sector_id', $management->sector_id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('sector_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="council_id" class="col-sm-2 col-form-label">Dewan</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('council_id') is-invalid @enderror" id="council_id"
                                    name="council_id">
                                    <option value="">Pilih Dewan</option>
                                    @foreach ($councils as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('council_id', $management->council_id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('council_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <img id="imagePreview" src="{{ $imageSrc }}" alt="Image Preview"
                                    style="max-width: 200px;" class="mb-2">

                                <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                    id="photo" name="photo" accept="image/jpeg,image/jpg,image/png">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="1"
                                        {{ old('status', $management->status ?? '') == 1 ? 'selected' : '' }}>
                                        Aktif</option>
                                    <option value="0"
                                        {{ old('status', $management->status ?? '') == 0 ? 'selected' : '' }}>
                                        Non-Aktif</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('managements.index') }}" class="btn btn-secondary">Cancel</a>
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
        let originalImageSrc = imagePreview.src;

        photoInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = originalImageSrc;
            }
        });
    </script>
@endpush
