@extends('admin.layouts.app')

@section('title', 'Detail Kepengurusan')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Kepengurusan',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Kepengurusan', 'url' => route('mindo.managements.index')],
            ['name' => 'Detail', 'url' => '#'],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Detail Kepengurusan</h3>
                    {{-- <a href="{{ route('mindo.managements.edit', $management) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a> --}}
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Photo Column -->
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="border rounded p-2 bg-light text-center">
                                @if ($management->photo)
                                    <img src="{{ Storage::url($management->photo) }}" alt="Foto Kepengurusan"
                                        class="img-fluid rounded">
                                @else
                                    <img src="{{ asset('images/no-image-available.png') }}" alt="Tidak Ada Gambar"
                                        class="img-fluid rounded">
                                @endif
                            </div>
                        </div>

                        <!-- Details Column -->
                        <div class="col-md-8">
                            <dl class="row mb-0">
                                <!-- Member Number -->
                                <dt class="col-sm-4 text-muted">No. Anggota</dt>
                                <dd class="col-sm-8">{{ $management->member_number }}</dd>

                                <!-- Name -->
                                <dt class="col-sm-4 text-muted">Nama</dt>
                                <dd class="col-sm-8">{{ $management->name }}</dd>

                                <!-- Company -->
                                <dt class="col-sm-4 text-muted">Perusahaan</dt>
                                <dd class="col-sm-8">{{ $management->company }}</dd>

                                <!-- Organizational Position -->
                                <dt class="col-sm-4 text-muted">Jabatan</dt>
                                <dd class="col-sm-8">
                                    {{ $management->organizationalPosition ? $management->organizationalPosition->name : 'N/A' }}
                                </dd>

                                <!-- Sector -->
                                <dt class="col-sm-4 text-muted">Sektor</dt>
                                <dd class="col-sm-8">
                                    {{ $management->sector ? $management->sector->name : 'N/A' }}
                                </dd>

                                <!-- Council -->
                                <dt class="col-sm-4 text-muted">Dewan</dt>
                                <dd class="col-sm-8">
                                    {{ $management->council ? $management->council->name : 'N/A' }}
                                </dd>

                                <!-- Status -->
                                <dt class="col-sm-4 text-muted">Status</dt>
                                <dd class="col-sm-8">
                                    @if ($management->status)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Non-Aktif</span>
                                    @endif
                                </dd>

                                <!-- Timestamps -->
                                <dt class="col-sm-4 text-muted">Dibuat Pada</dt>
                                <dd class="col-sm-8">
                                    {{ $management->created_at->translatedFormat('d F Y H:i') }}
                                </dd>

                                <dt class="col-sm-4 text-muted">Diupdate Pada</dt>
                                <dd class="col-sm-8">
                                    {{ $management->updated_at->translatedFormat('d F Y H:i') }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('mindo.managements.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
