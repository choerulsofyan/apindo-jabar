@extends('admin.layouts.app')

@section('title', 'Manajemen Bidang')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Bidang',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Bidang', 'url' => route('mindo.sectors.index')],
            ['name' => 'Daftar Bidang', 'url' => route('mindo.sectors.index')],
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
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Daftar Bidang</h3>
                    @can('BIDANG_ADD')
                        <a href="{{ route('mindo.sectors.create') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                            Buat Baru
                        </a>
                    @endcan
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center w-5">#</th>
                                <th class="w-75">Nama</th>
                                <th class="text-center w-20">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $sector)
                                <tr class="align-middle">
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ $sector->name }}</td>
                                    <td class="text-center">
                                        @can('BIDANG_LIST')
                                            <a class="btn btn-info" href="{{ route('mindo.sectors.show', $sector->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('BIDANG_EDIT')
                                            <a class="btn btn-warning" href="{{ route('mindo.sectors.edit', $sector->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('BIDANG_DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmationModal" data-item-id="{{ $sector->id }}"
                                                data-item-name="{{ $sector->name }}"
                                                data-delete-route="{{ route('mindo.sectors.destroy', $sector->id) }}">
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
            <!-- /.card -->
        </div>
    </div>
    <!-- /.col -->
    </div>
    <!--end::Row-->

    <!-- Delete Confirmation Modal -->
    @include('admin.components.delete-confirmation-modal')
@endsection
