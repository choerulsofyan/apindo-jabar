@extends('layouts.admin')

@section('title', 'Manajemen User')

@section('subheader')
    @include('partials.admin.subheader', [
        'title' => 'Manajemen User',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Manajemen User', 'url' => route('users.index')],
            ['name' => 'Daftar User', 'url' => route('users.index')],
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
                    <h3 class="card-title">Daftar User</h3>
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
                        Baru</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="w-5">#</th>
                                <th class="w-35">Nama</th>
                                <th class="w-25">Email</th>
                                <th class="text-center w-15">Grup User</th>
                                <th class="text-center w-20">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr class="align-middle">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge text-bg-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}"><i
                                                class="fa fa-edit"></i></a>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!} --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.col -->
    </div>
    <!--end::Row-->
    {!! $data->render() !!}


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus <strong id="deleteUserName"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
