@extends('admin.layouts.app')

@section('title', 'Detail Manajemen')

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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $management->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if ($management->photo)
                                <img src="{{ Storage::url($management->photo) }}" alt="Foto Manajemen" class="img-fluid">
                            @else
                                <img src="{{ asset('images/no-image-available.png') }}" alt="No Image Available"
                                    class="img-fluid">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <p><strong>No. Anggota:</strong> {{ $management->member_number }}</p>
                            <p><strong>Nama:</strong> {{ $management->name }}</p>
                            <p><strong>Perusahaan:</strong> {{ $management->company }}</p>
                            <p><strong>Jabatan:</strong>
                                {{ $management->organizationalPosition ? $management->organizationalPosition->name : 'N/A' }}
                            </p>
                            <p><strong>Sektor:</strong> {{ $management->sector ? $management->sector->name : 'N/A' }}
                            </p>
                            <p><strong>Dewan:</strong> {{ $management->council ? $management->council->name : 'N/A' }}
                            </p>
                            <p><strong>Status:</strong>
                                @if ($management->status)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Non-Aktif</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('mindo.managements.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
