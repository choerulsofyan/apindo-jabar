@extends('admin.layouts.app')

@section('title', 'Detail Pengguna')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen User',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen User', 'url' => route('mindo.users.index')],
            ['name' => 'Detail', 'url' => '#'],
        ],
    ])
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Detail User</h3>
                </div>

                <div class="card-body">
                    <dl class="row mb-0">
                        <!-- Name -->
                        <dt class="col-sm-3 text-muted">Nama</dt>
                        <dd class="col-sm-9">{{ $user->name }}</dd>

                        <!-- Email -->
                        <dt class="col-sm-3 text-muted">Email</dt>
                        <dd class="col-sm-9">{{ $user->email }}</dd>

                        <!-- Roles -->
                        <dt class="col-sm-3 text-muted">Grup User</dt>
                        <dd class="col-sm-9">
                            <div class="d-flex flex-wrap gap-2">
                                @forelse($user->roles as $roles)
                                    <span class="badge bg-primary">
                                        {{ $roles->name }}
                                    </span>
                                @empty
                                    <span class="text-muted">Tidak ada izin akses</span>
                                @endforelse
                            </div>
                        </dd>

                        <!-- Registration Date -->
                        <dt class="col-sm-3 text-muted">Tanggal Daftar</dt>
                        <dd class="col-sm-9">
                            {{ $user->created_at->translatedFormat('d F Y H:i') }}
                        </dd>

                        <!-- Last Updated -->
                        <dt class="col-sm-3 text-muted">Terakhir Diupdate</dt>
                        <dd class="col-sm-9">
                            {{ $user->updated_at->translatedFormat('d F Y H:i') }}
                        </dd>
                    </dl>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('mindo.users.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
