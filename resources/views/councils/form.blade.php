@extends('layouts.admin')

@section('title', isset($council) ? 'Edit Dewan' : 'Buat Dewan')

@section('subheader')
    @include('partials.admin.subheader', [
        'title' => 'Manajemen Dewan',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Manajemen Dewan', 'url' => route('councils.index')],
            [
                'name' => isset($council) ? 'Edit Dewan' : 'Tambah Dewan Baru',
                'url' => isset($council) ? route('councils.edit', $council->id) : route('councils.create'),
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
                'route' => isset($council) ? ['councils.update', $council->id] : 'councils.store',
                'method' => isset($council) ? 'PATCH' : 'POST',
                'class' => '',
                'novalidate' => true,
            ]) !!}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">{{ isset($council) ? 'Edit Dewan' : 'Tambah Dewan Baru' }}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row mb-3">
                        {!! Form::label('name', 'Nama', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', old('name', $council->name ?? ''), [
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
                    <a href="{{ route('councils.index') }}" class="btn btn-danger">Batal</a>
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
