@extends('public.layouts.app')

@section('title', '404 Not Found')

@section('content')
    <div class="container text-center py-5">
        <h1 class="display-1 fw-bold text-primary">404</h1>
        <p class="lead">Oops! The page you're looking for could not be found.</p>
        <p>
            <a href="{{ route('home') }}" class="btn btn-primary">Go Back to Homepage</a>
        </p>
    </div>
@endsection
