@extends('layouts.admin')

@section('title', 'Manajemen Grup User')

@section('subheader')
    @include('partials.admin.subheader', [
        'title' => 'Manajemen Grup User',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Manajemen Grup User', 'url' => route('roles.index')],
            [
                'name' => isset($role) ? 'Edit Grup User' : 'Tambah Grup User Baru',
                'url' => isset($role) ? route('roles.edit', $role->id) : route('roles.create'),
            ],
        ],
    ])
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--begin::Row-->
    <div class="row">
        <div class="col-md-12">
            {!! Form::open([
                'route' => isset($role) ? ['roles.update', $role->id] : 'roles.store',
                'method' => isset($role) ? 'PATCH' : 'POST',
                'class' => '',
                'novalidate' => true,
            ]) !!}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">{{ isset($role) ? 'Edit Grup User' : 'Tambah Grup User Baru' }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row mb-3">
                        {!! Form::label('name', 'Nama', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', old('name', $role->name ?? ''), [
                                'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                                'required' => true,
                                'placeholder' => '',
                            ]) !!}
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <!-- Permissions Checkboxes -->
                    <div class="row mb-3">
                        {!! Form::label('permissions', 'Permissions', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            {!! Form::checkbox(
                                                'permissions[]',
                                                $permission->name,
                                                isset($role) && $role->permissions->contains($permission->id),
                                                ['class' => 'form-check-input', 'id' => 'permission-' . $permission->id],
                                            ) !!}
                                            {!! Form::label('permission-' . $permission->id, $permission->name, ['class' => 'form-check-label']) !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1">Simpan</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- /.card -->
        </div>
    </div>
    <!-- /.col -->
    </div>
    <!--end::Row-->

@endsection
