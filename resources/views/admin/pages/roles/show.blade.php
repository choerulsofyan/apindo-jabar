@extends('admin.layouts.app')

@section('title', 'Detail Role')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Grup User',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Grup User', 'url' => route('mindo.roles.index')],
            ['name' => 'Detail', 'url' => '#'],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Detail Grup User</h3>
                </div>

                <div class="card-body">
                    <dl class="row mb-0">
                        <!-- Role Name -->
                        <dt class="col-sm-3 text-muted">Nama Grup User</dt>
                        <dd class="col-sm-9">{{ $role->name }}</dd>

                        <!-- Permissions -->
                        <dt class="col-sm-3 text-muted">Hak Akses</dt>
                        <dd class="col-sm-9">
                            <div class="d-flex flex-wrap gap-2">
                                @forelse($rolePermissions as $permission)
                                    <span class="badge bg-primary">
                                        {{ $permission->name }}
                                    </span>
                                @empty
                                    <span class="text-muted">Tidak ada hak akses</span>
                                @endforelse
                            </div>
                        </dd>

                        <!-- Timestamps -->
                        <dt class="col-sm-3 text-muted">Dibuat Pada</dt>
                        <dd class="col-sm-9">
                            {{ $role->created_at->translatedFormat('d F Y H:i') }}
                        </dd>

                        <dt class="col-sm-3 text-muted">Diupdate Pada</dt>
                        <dd class="col-sm-9">
                            {{ $role->updated_at->translatedFormat('d F Y H:i') }}
                        </dd>
                    </dl>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('mindo.roles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
