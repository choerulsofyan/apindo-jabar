@extends('admin.layouts.app')

@section('title', 'Kegiatan')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Activity Management',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Kegiatan', 'url' => route('mindo.activities.index')],
            ['name' => 'Daftar Kegiatan', 'url' => route('mindo.activities.index')],
        ],
    ])
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Daftar Kegiatan</h3>
                        <div class="d-flex gap-1">
                            <form action="{{ route('mindo.activities.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control form-control-sm"
                                        placeholder="Search..." value="{{ request('search') }}">
                                    <button class="btn btn-sm btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            @can('KEGIATAN_ADD')
                                <a href="{{ route('mindo.activities.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus"></i> Buat Baru
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center w-5">#</th>
                                <th class="w-25">
                                    <a href="{{ route('mindo.activities.index', ['sort_by' => 'title', 'sort_order' => request('sort_by') == 'title' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Judul
                                        @if (request('sort_by', 'title') == 'title')
                                            <i class="fa fa-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="w-20">
                                    <a href="{{ route('mindo.activities.index', ['sort_by' => 'start_time', 'sort_order' => request('sort_by') == 'start_time' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Waktu Mulai
                                        @if (request('sort_by') == 'start_time')
                                            <i class="fa fa-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="w-20">
                                    <a href="{{ route('mindo.activities.index', ['sort_by' => 'end_time', 'sort_order' => request('sort_by') == 'end_time' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Waktu Selesai
                                        @if (request('sort_by') == 'end_time')
                                            <i class="fa fa-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="w-15">
                                    <a href="{{ route('mindo.activities.index', ['sort_by' => 'place', 'sort_order' => request('sort_by') == 'place' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Tempat
                                        @if (request('sort_by') == 'place')
                                            <i class="fa fa-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="text-center w-15">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($activities as $activity)
                                <tr class="align-middle">
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ $activity->title }}</td>
                                    <td>{{ $activity->start_time->format('Y-m-d H:i') }}</td>
                                    <td>{{ $activity->end_time ? $activity->end_time->format('Y-m-d H:i') : '-' }}</td>
                                    <td>{{ $activity->place }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('mindo.activities.destroy', $activity) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            @can('KEGIATAN_LIST')
                                                <a class="btn btn-info" href="{{ route('mindo.activities.show', $activity) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endcan
                                            @can('KEGIATAN_EDIT')
                                                <a class="btn btn-warning"
                                                    href="{{ route('mindo.activities.edit', $activity) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('KEGIATAN_DELETE')
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteConfirmationModal"
                                                    data-item-id="{{ $activity->id }}" data-item-name="{{ $activity->title }}"
                                                    data-delete-route="{{ route('mindo.activities.destroy', $activity) }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="text-muted float-start">
                        Showing {{ $activities->firstItem() }} to {{ $activities->lastItem() }} of
                        {{ $activities->total() }} results
                    </div>
                    @if ($activities->hasPages())
                        <ul class="pagination pagination-sm m-0 float-end">
                            {{-- Previous Page Link --}}
                            @if ($activities->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $activities->appends(request()->query())->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($activities->getUrlRange(1, $activities->lastPage()) as $page => $url)
                                <li class="page-item {{ $activities->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ $url . (strpos($url, '?') === false ? '?' : '&') . http_build_query(request()->except('page')) }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($activities->hasMorePages())
                                <li class="page-item"><a class="page-link"
                                        href="{{ $activities->appends(request()->query())->nextPageUrl() }}">&raquo;</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('admin.components.delete-confirmation-modal') {{-- Include modal --}}
@endsection
