@extends('public.layouts.app')

@section('title', '404 Not Found')

@section('content')
    <div class="container text-center py-5 vh-100">
        <h1 class="display-1 fw-bold text-primary">404</h1>
        <p class="lead">Oops! Halaman yang Anda cari tidak ditemukan.</p>
        <p>
            <a href="{{ route('home') }}" class="text-decoration-none">Kembali ke Beranda</a>
        </p>
    </div>
@endsection
