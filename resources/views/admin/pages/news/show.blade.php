@extends('admin.layouts.app')

@section('title', 'Detail Berita')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Berita',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Berita', 'url' => route('mindo.news.index')],
            ['name' => 'Detail', 'url' => '#'],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Detail Berita</h3>
                </div>

                <div class="card-body">
                    <dl class="row mb-0">
                        <!-- Title -->
                        <dt class="col-sm-3 text-muted">Judul</dt>
                        <dd class="col-sm-9">{{ $news->title }}</dd>

                        <!-- Place -->
                        <dt class="col-sm-3 text-muted">Lokasi</dt>
                        <dd class="col-sm-9">{{ $news->place }}</dd>

                        <!-- Content -->
                        <dt class="col-sm-3 text-muted">Konten</dt>
                        <dd class="col-sm-9">
                            <div class="border rounded p-3 bg-light">
                                {!! $news->content !!}
                            </div>
                        </dd>

                        <!-- Photo -->
                        <dt class="col-sm-3 text-muted">Gambar</dt>
                        <dd class="col-sm-9">
                            <img src="{{ $imageSrc }}" alt="Gambar Berita" class="img-fluid rounded"
                                style="max-width: 100%; height: auto;">
                        </dd>

                        <!-- Timestamps -->
                        <dt class="col-sm-3 text-muted">Dibuat Pada</dt>
                        <dd class="col-sm-9">
                            {{ $news->created_at->translatedFormat('d F Y H:i') }}
                        </dd>

                        <dt class="col-sm-3 text-muted">Diupdate Pada</dt>
                        <dd class="col-sm-9">
                            {{ $news->updated_at->translatedFormat('d F Y H:i') }}
                        </dd>
                    </dl>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('mindo.news.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
