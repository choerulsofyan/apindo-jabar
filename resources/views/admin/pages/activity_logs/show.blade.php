@extends('admin.layouts.app')

@section('title', 'Detail Log Aktivitas')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Log Aktivitas',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Log Aktivitas', 'url' => route('mindo.activity-logs.index')],
            ['name' => 'Detail', 'url' => '#'],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Detail Log Aktivitas</h3>
                </div>

                <div class="card-body">
                    <dl class="row mb-4">
                        <!-- Log Name -->
                        <dt class="col-sm-3 text-muted">Nama Log</dt>
                        <dd class="col-sm-9">{{ $activity->log_name }}</dd>

                        <!-- Description -->
                        <dt class="col-sm-3 text-muted">Deskripsi</dt>
                        <dd class="col-sm-9">{{ $activity->description }}</dd>

                        <!-- Causer -->
                        <dt class="col-sm-3 text-muted">Pemicu</dt>
                        <dd class="col-sm-9">
                            @if ($activity->causer)
                                {{ $activity->causer->name }}
                            @else
                                Sistem
                            @endif
                        </dd>

                        <!-- Email -->
                        <dt class="col-sm-3 text-muted">Email</dt>
                        <dd class="col-sm-9">
                            @if ($activity->causer)
                                {{ $activity->causer->email }}
                            @else
                                -
                            @endif
                        </dd>

                        <!-- Timestamp -->
                        <dt class="col-sm-3 text-muted">Waktu</dt>
                        <dd class="col-sm-9">
                            {{ $activity->created_at->translatedFormat('d F Y H:i') }}
                            <small class="text-muted">({{ $activity->created_at->diffForHumans() }})</small>
                        </dd>
                    </dl>

                    <!-- Properties Table -->
                    @if ($activity->log_name === 'authentication' && $activity->properties && $activity->properties->count() > 0)
                        <div class="mt-4">
                            <h5 class="mb-3">Properti</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kunci</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activity->properties as $key => $value)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>
                                                    @if (is_array($value))
                                                        {{ json_encode($value) }}
                                                    @else
                                                        {{ $value }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    <!-- Changes Table -->
                    @if ($activity->changes && $activity->changes->has('attributes'))
                        <div class="mt-4">
                            <h5 class="mb-3">Perubahan</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Atribut</th>
                                            <th>Nilai Lama</th>
                                            <th>Nilai Baru</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activity->changes['attributes'] as $attribute => $newValue)
                                            <tr>
                                                <td>{{ $attribute }}</td>
                                                <td>
                                                    @if (isset($activity->changes['old'][$attribute]))
                                                        @if (is_array($activity->changes['old'][$attribute]))
                                                            {{ json_encode($activity->changes['old'][$attribute]) }}
                                                        @else
                                                            {{ $activity->changes['old'][$attribute] }}
                                                        @endif
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (is_array($newValue))
                                                        {{ json_encode($newValue) }}
                                                    @else
                                                        {{ $newValue }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('mindo.activity-logs.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
