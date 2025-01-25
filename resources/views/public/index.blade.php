@extends('layouts.public')

@section('title', 'Home Page')

@section('content')
    @include('partials.public.hero')
    @include('partials.public.video')
    @include('partials.public.media')
    @include('partials.public.agenda')
    @include('partials.public.ruang_anggota')
    @include('partials.public.afiliasi')
@endsection
