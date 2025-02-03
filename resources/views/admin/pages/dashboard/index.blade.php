@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Dashboard', // Dynamic title
        'breadcrumbs' => [['name' => 'Home', 'url' => route('mindo.home')], ['name' => 'Dashboard', 'url' => '#']],
    ])
@endsection

@section('content')
    <h1>Welcome to the Admin Dashboard</h1>
@endsection
