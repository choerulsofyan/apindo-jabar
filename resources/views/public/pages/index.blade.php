@extends('public.layouts.app')

@section('title', 'APINDO - Home')

@section('content')
    @include('public.partials.hero', ['newsSlides' => $newsSlides])
    @include('public.partials.about')
    @include('public.partials.news', ['latestNews' => $latestNews])
    @include('public.partials.gallery', ['latestImages' => $latestImages])
    @include('public.partials.contact')
    @include('public.partials.faq')
@endsection
