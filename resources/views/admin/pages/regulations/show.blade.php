@extends('admin.layouts.app')

@section('title', 'Detail Regulasi')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Regulasi',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Regulasi', 'url' => route('mindo.regulations.index')],
            ['name' => 'Detail', 'url' => '#'],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Detail Regulasi</h3>
                </div>

                <div class="card-body">
                    <dl class="row mb-4">
                        <!-- Title -->
                        <dt class="col-sm-3 text-muted">Judul Regulasi</dt>
                        <dd class="col-sm-9">{{ $regulation->title }}</dd>

                        <!-- Date -->
                        <dt class="col-sm-3 text-muted">Tanggal</dt>
                        <dd class="col-sm-9">
                            {{ \Carbon\Carbon::parse($regulation->date)->translatedFormat('d F Y') }}
                        </dd>

                        <!-- Timestamps -->
                        {{-- <dt class="col-sm-3 text-muted">Dibuat Pada</dt>
                        <dd class="col-sm-9">
                            {{ $regulation->created_at->translatedFormat('d F Y H:i') }}
                        </dd>

                        <dt class="col-sm-3 text-muted">Diupdate Pada</dt>
                        <dd class="col-sm-9">
                            {{ $regulation->updated_at->translatedFormat('d F Y H:i') }}
                        </dd> --}}
                    </dl>

                    <!-- File Preview -->
                    <div class="mt-4">
                        <h5 class="mb-3">File Regulasi</h5>
                        @if ($regulation->file)
                            <iframe src="{{ Storage::url('public/regulations/' . $regulation->file) }}" width="100%"
                                height="800px" class="border rounded" style="background-color: #f8f9fa;"></iframe>
                        @else
                            <div class="alert alert-info mb-0">
                                <i class="fas fa-info-circle me-2"></i> Tidak ada file yang tersedia.
                            </div>
                        @endif
                    </div>
                </div>


                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('mindo.regulations.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
