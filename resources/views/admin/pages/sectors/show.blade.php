@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Bidang</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('mindo.sectors.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $sector->name }}
            </div>
        </div>
    </div>
@endsection
