@extends('admin.layouts.app')

@section('title', 'Detail Kegiatan')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Kegiatan',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Kegiatan', 'url' => route('mindo.activities.index')],
            ['name' => 'Detail', 'url' => '#'],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Detail Kegiatan</h3>
                </div>

                <div class="card-body">
                    <dl class="row mb-0">
                        <!-- Title -->
                        <dt class="col-sm-3 text-muted">Judul Kegiatan</dt>
                        <dd class="col-sm-9">{{ $activity->title }}</dd>

                        <!-- Start Time -->
                        <dt class="col-sm-3 text-muted">Waktu Mulai</dt>
                        <dd class="col-sm-9">
                            {{ $activity->start_time->translatedFormat('d F Y H:i') }}
                        </dd>

                        <!-- End Time -->
                        <dt class="col-sm-3 text-muted">Waktu Selesai</dt>
                        <dd class="col-sm-9">
                            {{ $activity->end_time ? $activity->end_time->translatedFormat('d F Y H:i') : '-' }}
                        </dd>

                        <!-- Place -->
                        <dt class="col-sm-3 text-muted">Lokasi</dt>
                        <dd class="col-sm-9">{{ $activity->place }}</dd>

                        <!-- Description -->
                        <dt class="col-sm-3 text-muted">Deskripsi</dt>
                        <dd class="col-sm-9">
                            <div class="border rounded p-3 bg-light">
                                {{ $activity->description }}
                            </div>
                        </dd>

                        <!-- Timestamps -->
                        <dt class="col-sm-3 text-muted">Dibuat Pada</dt>
                        <dd class="col-sm-9">
                            {{ $activity->created_at->translatedFormat('d F Y H:i') }}
                        </dd>

                        <dt class="col-sm-3 text-muted">Diupdate Pada</dt>
                        <dd class="col-sm-9">
                            {{ $activity->updated_at->translatedFormat('d F Y H:i') }}
                        </dd>
                    </dl>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('mindo.activities.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .card-header {
        background-color: #f8f9fa;
    }

    dt {
        font-weight: 500;
    }

    dd {
        margin-bottom: 1rem;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }
</style>
