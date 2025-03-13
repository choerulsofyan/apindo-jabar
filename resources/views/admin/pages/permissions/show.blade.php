@extends('admin.layouts.app')

@section('title', 'Detail Hak Akses')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Hak Akses',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Hak Akses', 'url' => route('mindo.permissions.index')],
            ['name' => 'Detail', 'url' => '#'],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Detail Hak Akses</h3>
                </div>

                <div class="card-body">
                    <dl class="row mb-0">
                        <!-- Permission Name -->
                        <dt class="col-sm-3 text-muted">Nama Izin</dt>
                        <dd class="col-sm-9">{{ $permission->name }}</dd>

                        <!-- Roles with this Permission -->
                        <dt class="col-sm-3 text-muted">Grup User yang Memiliki Izin Ini</dt>
                        <dd class="col-sm-9">
                            <div class="d-flex flex-wrap gap-2">
                                @forelse($permission->getRoleNames() as $roleName)
                                    <span class="badge bg-primary">
                                        {{ $roleName }}
                                    </span>
                                @empty
                                    <span class="text-muted">Tidak ada grup user yang memiliki izin ini</span>
                                @endforelse
                            </div>
                        </dd>

                        <!-- Timestamps -->
                        <dt class="col-sm-3 text-muted">Dibuat Pada</dt>
                        <dd class="col-sm-9">
                            {{ $permission->created_at->translatedFormat('d F Y H:i') }}
                        </dd>

                        <dt class="col-sm-3 text-muted">Diupdate Pada</dt>
                        <dd class="col-sm-9">
                            {{ $permission->updated_at->translatedFormat('d F Y H:i') }}
                        </dd>
                    </dl>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('mindo.permissions.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
