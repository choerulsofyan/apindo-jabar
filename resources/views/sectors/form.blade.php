@extends('layouts.admin')

@section('title', isset($sector) ? 'Edit Bidang' : 'Buat Bidang')

@section('subheader')
    @include('partials.admin.subheader', [
        'title' => 'Manajemen Bidang',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Manajemen Bidang', 'url' => route('sectors.index')],
            [
                'name' => isset($sector) ? 'Edit Bidang' : 'Tambah Bidang Baru',
                'url' => isset($sector) ? route('sectors.edit', $sector->id) : route('sectors.create'),
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
                'route' => isset($sector) ? ['sectors.update', $sector->id] : 'sectors.store',
                'method' => isset($sector) ? 'PATCH' : 'POST',
                'class' => '',
                'novalidate' => true,
            ]) !!}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">{{ isset($sector) ? 'Edit Bidang' : 'Tambah Bidang Baru' }}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row mb-3">
                        {!! Form::label('name', 'Nama', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', old('name', $sector->name ?? ''), [
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
                    <a href="{{ route('sectors.index') }}" class="btn btn-danger">Batal</a>
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
