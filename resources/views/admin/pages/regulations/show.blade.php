@extends('admin.layouts.app')

@section('title', 'Detail Regulasi')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Regulasi',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Regulasi', 'url' => route('mindo.regulations.index')],
            [
                'name' => isset($regulation) ? 'Edit Regulasi' : 'Tambah Regulasi Baru',
                'url' => isset($regulation)
                    ? route('mindo.regulations.edit', $regulation->id)
                    : route('mindo.regulations.create'),
            ],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $regulation->title }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Tanggal:</strong> {{ $regulation->date }}</p>
                    <p><strong>File:</strong></p>
                    @if ($regulation->file)
                        <iframe src="{{ Storage::url('public/regulations/' . $regulation->file) }}" width="100%"
                            height="1000px"></iframe>
                    @else
                        <p>No file available.</p>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('mindo.regulations.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
