@extends('layouts.admin')

@section('title', 'Dashboard')

@section('subheader')
    @include('partials.admin.subheader', [
        'title' => 'Dashboard', // Dynamic title
        'breadcrumbs' => [['name' => 'Home', 'url' => route('home')], ['name' => 'Dashboard', 'url' => '#']],
    ])
@endsection

@section('content')
    <h1>Welcome to the Admin Dashboard</h1>
@endsection
