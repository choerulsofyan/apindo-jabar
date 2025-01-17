@extends('layouts.admin')

@section('title', 'Manajemen')

@section('subheader')
    @include('partials.admin.subheader', [
        'title' => 'Manajemen Kepengurusan',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Manajemen Kepengurusan', 'url' => route('managements.index')],
            ['name' => 'Daftar Kepengurusan', 'url' => route('managements.index')],
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

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Daftar Kepengurusan</h3>
                    @can('KEPENGURUSAN_ADD')
                        <a href="{{ route('managements.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                            Tambah Baru</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>No. Anggota</th>
                                <th>Nama</th>
                                <th>Perusahaan</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr class="align-middle">
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ $item->member_number }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->company }}</td>
                                    <td>
                                        @if ($item->status)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @can('KEPENGURUSAN_LIST')
                                            <a class="btn btn-info" href="{{ route('managements.show', $item->id) }}"><i
                                                    class="fa fa-eye"></i></a>
                                        @endcan
                                        @can('KEPENGURUSAN_EDIT')
                                            <a class="btn btn-warning" href="{{ route('managements.edit', $item->id) }}"><i
                                                    class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('KEPENGURUSAN_DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmationModal" data-item-id="{{ $item->id }}"
                                                data-item-name="{{ $item->name }}"
                                                data-delete-route="{{ route('managements.destroy', $item->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="text-muted float-start">
                        Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} results
                    </div>
                    @if ($data->hasPages())
                        <ul class="pagination pagination-sm m-0 float-end">
                            @if ($data->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $data->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                                <li class="page-item {{ $data->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($data->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">&raquo;</a>
                                </li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    @include('components.delete-confirmation-modal')
@endsection
