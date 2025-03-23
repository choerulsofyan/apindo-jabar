@extends('admin.layouts.app')

@section('title', 'Detail Pesan')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Pesan',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Pesan', 'url' => route('mindo.pesan.index')],
            ['name' => 'Daftar Pesan', 'url' => route('mindo.pesan.index')],
        ],
    ])
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Detail Pesan</h3>
            </div>

            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-3 text-muted">Judul</dt>
                    <dd class="col-sm-9">{{ $pesan->judul }}</dd>

                    <dt class="col-sm-3 text-muted">Nama Pengirim</dt>
                    <dd class="col-sm-9">{{ $pesan->name }}</dd>

                    <dt class="col-sm-3 text-muted">Email Pengirim</dt>
                    <dd class="col-sm-9">{{ $pesan->email }}</dd>

                    <dt class="col-sm-3 text-muted">Isi Pesan</dt>
                        <dd class="col-sm-9">
                            <div class="border rounded p-3 bg-light">
                                {!! $pesan->pesan !!}
                            </div>
                        </dd>

                    <dt class="col-sm-3 text-muted">Dibuat Pada</dt>
                    <dd class="col-sm-9">
                        {{ $pesan->created_at->translatedFormat('d F Y H:i') }}
                    </dd>
                    <dt class="col-sm-3 text-muted">Diupdate Pada</dt>
                    <dd class="col-sm-9">
                        {{ $pesan->updated_at->translatedFormat('d F Y H:i') }}
                    </dd>
                </dl>
            </div>

            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('mindo.pesan.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        document.getElementById('toggleText').addEventListener('click', function() {
            // Menampilkan teks yang tersembunyi
            var moreText = document.getElementById('moreText');
            var toggleText = document.getElementById('toggleText');

            if (moreText.style.display === "none") {
                moreText.style.display = "inline";
                toggleText.textContent = "Lihat lebih sedikit"; // Mengubah teks tautan
            } else {
                moreText.style.display = "none";
                toggleText.textContent = "Lihat lebih"; // Mengubah teks tautan kembali
            }
        });
    </script>
@endpush
