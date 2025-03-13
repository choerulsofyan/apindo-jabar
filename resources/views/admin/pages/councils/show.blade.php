@extends('admin.layouts.app')

@section('title', 'Detail Dewan')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Dewan',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Dewan', 'url' => route('mindo.councils.index')],
            ['name' => 'Detail', 'url' => '#'],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Detail Dewan</h3>
                </div>

                <div class="card-body">
                    <dl class="row mb-0">
                        <!-- Name -->
                        <dt class="col-sm-3 text-muted">Nama</dt>
                        <dd class="col-sm-9">{{ $council->name }}</dd>

                        <!-- Timestamps -->
                        {{-- <dt class="col-sm-3 text-muted">Dibuat Pada</dt>
                        <dd class="col-sm-9">
                            {{ $council->created_at->translatedFormat('d F Y H:i') }}
                        </dd>

                        <dt class="col-sm-3 text-muted">Diupdate Pada</dt>
                        <dd class="col-sm-9">
                            {{ $council->updated_at->translatedFormat('d F Y H:i') }}
                        </dd> --}}
                    </dl>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('mindo.councils.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
