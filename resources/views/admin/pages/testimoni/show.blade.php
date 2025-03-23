@extends('admin.layouts.app')

@section('title', 'Detail Testimoni')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Testimoni',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Testimoni', 'url' => route('mindo.testimoni.index')],
            ['name' => 'Daftar Testimoni', 'url' => route('mindo.testimoni.index')],
        ],
    ])
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Detail Testimoni</h3>
            </div>

            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-3 text-muted">Nama</dt>
                    <dd class="col-sm-9">{{ $testimoni->nama }}</dd>

                    <dt class="col-sm-3 text-muted">Jenis Pekerjaan</dt>
                    <dd class="col-sm-9">{{ $testimoni->jenis_pekerjaan }}</dd>

                    <dt class="col-sm-3 text-muted">Deskripsi</dt>
                        <dd class="col-sm-9">
                            <div class="border rounded p-3 bg-light">
                                {{ Str::limit($testimoni->deskripsi, 200) }}
                                @if (strlen($testimoni->deskripsi) > 200)
                                    <span class="moreText" style="display: none;">{{ substr($testimoni->deskripsi, 200) }}</span>
                                    <a href="javascript:void(0);" class="toggleText text-primary">Lihat lebih banyak</a>
                                @endif
                            </div>
                        </dd>

                    <dt class="col-sm-3 text-muted">Dibuat Pada</dt>
                    <dd class="col-sm-9">
                        {{ $testimoni->created_at->translatedFormat('d F Y H:i') }}
                    </dd>
                    <dt class="col-sm-3 text-muted">Diupdate Pada</dt>
                    <dd class="col-sm-9">
                        {{ $testimoni->updated_at->translatedFormat('d F Y H:i') }}
                    </dd>
                </dl>
            </div>

            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('mindo.testimoni.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".toggleText").forEach(function (toggle) {
            toggle.addEventListener("click", function () {
                var moreText = this.previousElementSibling;
                if (moreText.style.display === "none" || moreText.style.display === "") {
                    moreText.style.display = "inline";
                    this.textContent = "Lihat lebih sedikit";
                } else {
                    moreText.style.display = "none";
                    this.textContent = "Lihat lebih banyak";
                }
            });
        });
    });
</script>
@endpush
