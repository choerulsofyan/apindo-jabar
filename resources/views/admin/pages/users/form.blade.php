@extends('admin.layouts.app')

@section('title', 'Manajemen User')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen User',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen User', 'url' => route('mindo.users.index')],
            [
                'name' => isset($user) ? 'Edit User' : 'Tambah User Baru',
                'url' => isset($user) ? route('mindo.users.edit', $user->id) : route('mindo.users.create'),
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

    <!--begin::Row-->
    <div class="row">
        <div class="col-md-12">
            {!! Form::open([
                'route' => isset($user) ? ['users.update', $user->id] : 'users.store',
                'method' => isset($user) ? 'PATCH' : 'POST',
                'class' => '',
                'novalidate' => true,
            ]) !!}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">{{ isset($user) ? 'Edit User' : 'Tambah User Baru' }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row mb-3">
                        {!! Form::label('name', 'Nama', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', old('name', $user->name ?? ''), [
                                'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                                'required' => true,
                                'placeholder' => '',
                            ]) !!}
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        {!! Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::email('email', old('email', $user->email ?? ''), [
                                'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
                                'required' => true,
                                'placeholder' => '',
                            ]) !!}
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        {!! Form::label('password', 'Password', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::password('password', [
                                'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
                                'required' => true,
                            ]) !!}
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        {!! Form::label('confirm-password', 'Confirm Password', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::password('confirm-password', [
                                'class' => 'form-control' . ($errors->has('confirm-password') ? ' is-invalid' : ''),
                                'required' => true,
                            ]) !!}
                            @if ($errors->has('confirm-password'))
                                <div class="invalid-feedback">{{ $errors->first('confirm-password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        {!! Form::label('roles', 'Grup User', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::select('roles[]', $roles, old('roles', $user->roles ?? []), [
                                'class' => 'form-control' . ($errors->has('roles') ? ' is-invalid' : ''),
                                'multiple' => true,
                                'required' => true,
                            ]) !!}
                            @if ($errors->has('roles'))
                                <div class="invalid-feedback">{{ $errors->first('roles') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1">Simpan</button>
                    <a href="{{ route('mindo.users.index') }}" class="btn btn-danger">Batal</a>
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
