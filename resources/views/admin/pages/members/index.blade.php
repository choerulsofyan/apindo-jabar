@extends('admin.layouts.app')

@section('title', 'Members')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Anggota',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Anggota', 'url' => route('mindo.members.index')],
            ['name' => 'Daftar Anggota', 'url' => route('mindo.members.index')],
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
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Daftar Anggota</h3>
                        <div class="d-flex gap-1">
                            <form action="{{ route('mindo.members.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control form-control-sm"
                                        placeholder="Search..." value="{{ request('search') }}">
                                    <button class="btn btn-sm btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            @can('KEANGGOTAAN_ADD')
                                <a href="{{ route('mindo.members.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus"></i>
                                    Buat Baru
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
                                <th class="w-30">
                                    <a href="{{ route('mindo.members.index', ['sort_by' => 'company_name', 'sort_order' => request('sort_by') == 'company_name' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Perusahaan
                                        @if (request('sort_by', 'company_name') == 'company_name')
                                            <i class="fa fa-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="w-25">
                                    <a href="{{ route('mindo.members.index', ['sort_by' => 'contact_person', 'sort_order' => request('sort_by') == 'contact_person' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Contact Person
                                        @if (request('sort_by') == 'contact_person')
                                            <i class="fa fa-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="w-25">
                                    <a href="{{ route('mindo.members.index', ['sort_by' => 'email', 'sort_order' => request('sort_by') == 'email' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Email
                                        @if (request('sort_by') == 'email')
                                            <i class="fa fa-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="text-center w-15">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $member)
                                <tr class="align-middle">
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ $member->company_name }}</td>
                                    <td>{{ $member->contact_person }}</td>
                                    <td>{{ $member->company_email }}</td>
                                    <td class="text-center">
                                        @can('KEANGGOTAAN_LIST')
                                            <a class="btn btn-info" href="{{ route('mindo.members.show', $member->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('KEANGGOTAAN_EDIT')
                                            <a class="btn btn-warning" href="{{ route('mindo.members.edit', $member->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('KEANGGOTAAN_DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmationModal" data-item-id="{{ $member->id }}"
                                                data-item-name="{{ $member->company_name }}"
                                                data-delete-route="{{ route('mindo.members.destroy', $member->id) }}">
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
                                        href="{{ $data->appends(request()->query())->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                                <li class="page-item {{ $data->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ $url . (strpos($url, '?') === false ? '?' : '&') . http_build_query(request()->except('page')) }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            @if ($data->hasMorePages())
                                <li class="page-item"><a class="page-link" 
                                        href="{{ $data->appends(request()->query())->nextPageUrl() }}">&raquo;</a>
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

    @include('admin.components.delete-confirmation-modal')
@endsection
