@extends('admin.layouts.app')

@section('title', 'Manajemen Berita')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Berita',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Berita', 'url' => route('mindo.news.index')],
            ['name' => 'Daftar Berita', 'url' => route('mindo.news.index')],
        ],
    ])
@endsection

@section('content')
    @if ($message = Session::get('message'))
        <div class="alert alert-{{ Session::get('alert-type', 'success') }} alert-dismissible fade show" role="alert">
            <i class="fa fa-check"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!--begin::Row-->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Daftar Berita</h3>
                        <div class="d-flex gap-1">
                            {{-- Search Form --}}
                            <form action="{{ route('mindo.news.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control form-control-sm"
                                        placeholder="Search..." value="{{ request('search') }}">
                                    <button class="btn btn-sm btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            @can('BERITA_ADD')
                                <a href="{{ route('mindo.news.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus"></i>
                                    Buat Baru
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center w-5">#</th>
                                <th class="w-45">Judul</th>
                                <th class="w-20 text-center">Tempat</th>
                                <th class="w-15 text-center">Dibuat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr class="align-middle">
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td class="text-center">{{ $item->place }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        @can('BERITA_LIST')
                                            <a class="btn btn-info" href="{{ route('mindo.news.show', $item->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('BERITA_EDIT')
                                            <a class="btn btn-warning" href="{{ route('mindo.news.edit', $item->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('BERITA_DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmationModal" data-item-id="{{ $item->id }}"
                                                data-item-name="{{ $item->title }}"
                                                data-delete-route="{{ route('mindo.news.destroy', $item->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->


                <div class="card-footer clearfix">
                    <div class="text-muted float-start">
                        Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} results
                    </div>
                    @if ($data->hasPages())
                        <ul class="pagination pagination-sm m-0 float-end">
                            {{-- Previous Page Link --}}
                            @if ($data->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $data->appends(request()->query())->previousPageUrl() }}"
                                        rel="prev">&laquo;</a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            {{-- We will use some simple logic to show only a few page numbers around the current page --}}
                            @php
                                $currentPage = $data->currentPage();
                                $lastPage = $data->lastPage();
                                $maxLinks = 5; // Number of links to show (adjust as needed)
                                $halfMaxLinks = floor($maxLinks / 2);

                                $start = max(1, $currentPage - $halfMaxLinks);
                                $end = min($lastPage, $currentPage + $halfMaxLinks);

                                // Adjust if we're near the beginning or end
                                if ($end - $start + 1 < $maxLinks) {
                                    if ($start == 1) {
                                        $end = min($lastPage, $maxLinks);
                                    } elseif ($end == $lastPage) {
                                        $start = max(1, $lastPage - $maxLinks + 1);
                                    }
                                }
                            @endphp

                            @for ($page = $start; $page <= $end; $page++)
                                <li class="page-item {{ $page == $currentPage ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ $data->appends(request()->query())->url($page) }}">{{ $page }}</a>
                                </li>
                            @endfor


                            {{-- Next Page Link --}}
                            @if ($data->hasMorePages())
                                <li class="page-item"><a class="page-link"
                                        href="{{ $data->appends(request()->query())->nextPageUrl() }}"
                                        rel="next">&raquo;</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.col -->
    </div>
    <!--end::Row-->

    <!-- Delete Confirmation Modal -->
    @include('admin.components.delete-confirmation-modal')
@endsection
