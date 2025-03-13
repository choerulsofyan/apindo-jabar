{{-- resources/views/admin/activities/form.blade.php --}}

@extends('admin.layouts.app')

@section('title', isset($activity) ? 'Edit Kegiatan' : 'Add Kegiatan')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Kegiatan',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Kegiatan', 'url' => route('mindo.activities.index')],
            [
                'name' => isset($activity) ? 'Edit Kegiatan' : 'Add Kegiatan',
                'url' => isset($activity)
                    ? route('mindo.activities.edit', $activity)
                    : route('mindo.activities.create'),
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

    <div class="row">
        <div class="col-md-12">
            @if (isset($activity))
                {{-- Edit Form --}}
                {!! Form::model($activity, [
                    'route' => ['mindo.activities.update', $activity],
                    'method' => 'PUT',
                    'class' => '',
                    'novalidate' => true,
                ]) !!}
            @else
                {{-- Create Form --}}
                {!! Form::open(['route' => 'mindo.activities.store', 'method' => 'POST', 'class' => '', 'novalidate' => true]) !!}
            @endif
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">{{ isset($activity) ? 'Edit Kegiatan' : 'Add New Kegiatan' }}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        {!! Form::label('title', 'Judul Kegiatan:', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('title', old('title'), [
                                'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''),
                                'required' => true,
                                'placeholder' => 'Judul Kegiatan',
                            ]) !!}
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        {!! Form::label('start_time', 'Waktu Mulai:', ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::datetimeLocal('start_time', old('start_time'), [
                                'class' => 'form-control' . ($errors->has('start_time') ? ' is-invalid' : ''),
                                'required' => true,
                                'min' => now()->format('Y-m-d\TH:i'), // Set the 'min' attribute
                            ]) !!}
                            @error('start_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="end_time" class="col-sm-2 col-form-label">
                            Waktu Selesai <br />
                            <small class="text-muted">
                                (Opsional)
                            </small>
                        </label>
                        <div class="col-sm-10">
                            {!! Form::datetimeLocal('end_time', old('end_time'), [
                                'class' => 'form-control' . ($errors->has('end_time') ? ' is-invalid' : ''),
                                'min' => now()->format('Y-m-d\TH:i'), //  Add min attribute here too
                            ]) !!}
                            @error('end_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="place" class="col-sm-2 col-form-label">
                            Tempat <br />
                            <small class="text-muted">
                                (Opsional)
                            </small>
                        </label>
                        <div class="col-sm-10">
                            {!! Form::text('place', old('place'), [
                                'class' => 'form-control' . ($errors->has('place') ? ' is-invalid' : ''),
                                'placeholder' => 'Lokasi Kegiatan',
                            ]) !!}
                            @error('place')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">
                            Deskripsi <br />
                            <small class="text-muted">
                                (Opsional)
                            </small>
                        </label>
                        <div class="col-sm-10">
                            {!! Form::textarea('description', old('description'), [
                                'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),
                                'rows' => 5,
                                'placeholder' => 'Deskripsi Kegiatan',
                            ]) !!}
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1">{{ isset($activity) ? 'Update' : 'Save' }}</button>
                    <a href="{{ route('mindo.activities.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
@endsection
