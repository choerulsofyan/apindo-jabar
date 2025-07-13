@extends('public.layouts.app')

@section('title', 'Beranda - APINDO Jawa Barat')
@section('meta_description', Str::limit(strip_tags('Beranda APINDO Jawa Barat'), 155))

@section('content')
    @include('public.partials.hero', ['newsSlides' => $newsSlides])
    @include('public.partials.about')
    {{-- <div class="d-flex align-items-center justify-content-center my-5">
        <div class="border border-1 border-primary px-4 py-4 rounded-4 text-center" style="background-color: #EAF5FF;">
            <h4> Bergabunglah dengan APINDO untuk mendapatkan informasi terbaru mengenai regulasi dan isu-isu bisnis </h4>
            <a href="#" class="btn btn-primary mt-2">Bergabung Sekarang</a>
        </div>
    </div> --}}
    @include('public.partials.news', ['latestNews' => $latestNews])
    @include('public.partials.gallery', ['latestImages' => $latestImages])
    @include('public.partials.faq')
    {{-- @include('public.partials.testimoni') --}}
    @include('public.partials.contact')
@endsection
