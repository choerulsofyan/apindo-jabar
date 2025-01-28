@extends('public.layouts.app')

@section('title', 'APINDO - Home')

@section('content')
    @include('public.partials.hero')
    @include('public.partials.about')
    @include('public.partials.news')
    @include('public.partials.gallery')
    @include('public.partials.contact')
@endsection
