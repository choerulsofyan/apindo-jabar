@extends('admin.layouts.app')
@section('title', isset($testimoni) ? 'Edit Testimoni' : 'Buat Testimoni')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Testimoni',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Testimoni', 'url' => route('mindo.testimoni.index')],
            [
                'name' => isset($testimoni) ? 'Edit Testimoni' : 'Tambah Testimoni',
                'url' => isset($testimoni) ? route('mindo.testimoni.edit', $testimoni->id) : route('mindo.testimoni.create'),
            ],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ isset($testimoni) ? route('mindo.testimoni.update', $testimoni->id) : route('mindo.testimoni.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($testimoni))
                    @method('PATCH')
                @endif

                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">{{ isset($testimoni) ? 'Edit Testimoni' : 'Tambah Data Baru' }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" placeholder="Masukan nama" value="{{ old('title', $testimoni->nama ?? '') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jenis_pekerjaan" class="col-sm-2 col-form-label">Jenis Pekerjaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('jenis_pekerjaan') is-invalid @enderror"
                                    id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="Masukan jenis pekerjaan" value="{{ old('title', $testimoni->jenis_pekerjaan ?? '') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5"
                                    placeholder="Masukan deskripsi testimoni" required>{{ old('deskripsi', $testimoni->deskripsi ?? '') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('mindo.testimoni.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
   
@endpush
