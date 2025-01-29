@extends('admin.layouts.app')

@section('title', isset($organizationalPosition) ? 'Edit Jabatan' : 'Buat Jabatan')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Jabatan',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Jabatan', 'url' => route('mindo.organizational-positions.index')],
            [
                'name' => isset($organizationalPosition) ? 'Edit Jabatan' : 'Tambah Jabatan Baru',
                'url' => isset($organizationalPosition)
                    ? route('mindo.organizational-positions.edit', $organizationalPosition->id)
                    : route('mindo.organizational-positions.create'),
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
                'route' => isset($organizationalPosition)
                    ? ['mindo.organizational-positions.update', $organizationalPosition->id]
                    : 'mindo.organizational-positions.store',
                'method' => isset($organizationalPosition) ? 'PATCH' : 'POST',
                'class' => '',
                'novalidate' => true,
            ]) !!}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">{{ isset($organizationalPosition) ? 'Edit Jabatan' : 'Tambah Jabatan Baru' }}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row mb-3">
                        {!! Form::label('name', 'Nama', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', old('name', $organizationalPosition->name ?? ''), [
                                'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                                'required' => true,
                                'placeholder' => '',
                            ]) !!}
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1">Simpan</button>
                    <a href="{{ route('mindo.organizational-positions.index') }}" class="btn btn-danger">Batal</a>
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
