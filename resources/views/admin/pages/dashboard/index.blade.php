@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Dashboard', // Dynamic title
        'breadcrumbs' => [['name' => 'Home', 'url' => route('mindo.home')], ['name' => 'Dashboard', 'url' => '#']],
    ])
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <!-- Member Statistics -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Anggota Biasa</span>
                        <span class="info-box-number">{{ $totalNonExtraordinaryMembers }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-user-friends"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Anggota Luar Biasa</span>
                        <span class="info-box-number">{{ $totalExtraordinaryMembers }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Anggota</span>
                        <span class="info-box-number">{{ $totalMembers }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Content Statistics -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-newspaper"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Berita</span>
                        <span class="info-box-number">{{ $totalNews }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pesan Kontak</span>
                        <span class="info-box-number">{{ $totalPesan }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fa fa-calendar-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Kegiatan</span>
                        <span class="info-box-number">{{ $totalActivities }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main row -->
        {{-- <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- Summary Card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Website Summary</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td width="30%">Extraordinary Members</td>
                                        <td>{{ $totalExtraordinaryMembers }}</td>
                                    </tr>
                                    <tr>
                                        <td>Non-Extraordinary Members</td>
                                        <td>{{ $totalNonExtraordinaryMembers }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Members</td>
                                        <td>{{ $totalMembers }}</td>
                                    </tr>
                                    <tr>
                                        <td>Published News</td>
                                        <td>{{ $totalNews }}</td>
                                    </tr>
                                    <tr>
                                        <td>Messages Received</td>
                                        <td>{{ $totalPesan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Scheduled Activities</td>
                                        <td>{{ $totalActivities }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right col -->
            <div class="col-md-4">
                <!-- Doughnut Chart -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Member Types</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex flex-column align-items-center">
                                <!-- Simplified pie-chart representation using colored divs -->
                                <div class="d-flex p-3">
                                    <div class="position-relative" style="width: 200px; height: 200px;">
                                        @php
                                            $extraordinaryPercentage =
                                                $totalMembers > 0
                                                    ? ($totalExtraordinaryMembers / $totalMembers) * 100
                                                    : 0;
                                            $nonExtraordinaryPercentage = 100 - $extraordinaryPercentage;
                                        @endphp
                                        <div
                                            class="position-absolute top-0 start-0 w-100 h-100 rounded-circle overflow-hidden">
                                            <div class="d-flex h-100">
                                                <div class="bg-warning h-100"
                                                    style="width: {{ $extraordinaryPercentage }}%"></div>
                                                <div class="bg-primary h-100"
                                                    style="width: {{ $nonExtraordinaryPercentage }}%"></div>
                                            </div>
                                        </div>
                                        <div class="position-absolute top-50 start-50 translate-middle bg-white rounded-circle d-flex justify-content-center align-items-center"
                                            style="width: 100px; height: 100px;">
                                            <span>{{ $totalMembers }} Total</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Legend -->
                                <div class="mt-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="mr-2"
                                            style="width: 20px; height: 20px; background-color: var(--warning);"></div>
                                        <span class="ms-2">Extraordinary ({{ $totalExtraordinaryMembers }})</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="mr-2"
                                            style="width: 20px; height: 20px; background-color: var(--primary);"></div>
                                        <span class="ms-2">Non-Extraordinary ({{ $totalNonExtraordinaryMembers }})</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
