@extends('public.layouts.app')

@section('title', 'Kepengurusan - APINDO Jawa Barat')
@section('meta_description', Str::limit(strip_tags('Kepengurusan APINDO Jawa Barat'), 155))

@section('content')
    <section class="management-page py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="text-center fw-bold">Kepengurusan APINDO Jawa Barat</h1>
                    <p class="text-center text-muted">Daftar pengurus aktif APINDO Jawa Barat</p>
                </div>
            </div>

            <!-- Search Form -->
            <div class="row mb-4 justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('managements') }}" method="GET" class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari nama atau perusahaan..."
                                name="search" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @if ($managements->isEmpty())
                <div class="alert alert-info text-center">
                    <i class="bi bi-info-circle me-2"></i> Tidak ada data pengurus yang ditemukan.
                </div>
            @else
                <!-- Management Staff Grid -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                    @foreach ($managements as $management)
                        <div class="col">
                            <div class="card h-100 management-card shadow-sm">
                                <div class="position-relative">
                                    @if ($management->photo && Storage::disk('public')->exists('images/management/' . $management->photo))
                                        <img src="{{ Storage::url('images/management/' . $management->photo) }}"
                                            class="card-img-top management-photo" alt="{{ $management->name }}">
                                    @else
                                        <img src="{{ asset('assets/images/profile-placeholder.png') }}"
                                            class="card-img-top management-photo" alt="{{ $management->name }}">
                                    @endif
                                    {{-- @if ($management->status)
                                        <span
                                            class="position-absolute top-0 end-0 badge bg-{{ $management->status == 'Active' ? 'success' : 'secondary' }} m-2">
                                            {{ $management->status }}
                                        </span>
                                    @endif --}}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-1">{{ $management->name }}</h5>
                                    @if ($management->organizationalPosition)
                                        <p class="card-subtitle mb-2 text-primary fw-semibold">
                                            {{ $management->organizationalPosition->name }}</p>
                                    @endif
                                    <p class="card-text mb-0">{{ $management->company }}</p>
                                    @if ($management->sector)
                                        <small class="text-muted d-block">Sektor: {{ $management->sector->name }}</small>
                                    @endif
                                    @if ($management->council)
                                        <small class="text-muted d-block">Dewan: {{ $management->council->name }}</small>
                                    @endif
                                    @if ($management->member_number)
                                        <small class="text-muted d-block">No. Anggota:
                                            {{ $management->member_number }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $managements->appends(['search' => request('search'), 'sort_by' => request('sort_by'), 'sort_order' => request('sort_order')])->links() }}
                </div>
            @endif
        </div>
    </section>

    <style>
        .management-photo {
            height: 250px;
            object-fit: cover;
            object-position: center top;
        }

        .management-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .management-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        @media (max-width: 767.98px) {
            .management-photo {
                height: 200px;
            }
        }
    </style>
@endsection
