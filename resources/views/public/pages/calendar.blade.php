@extends('public.layouts.app')

@section('title', 'Calendar of Activities - APINDO Jawa Barat')

@section('content')
    <div class="container my-5 pt-5 pb-5">
        <h1>Kalender Kegiatan</h1>

        {{-- Add a data attribute to store the events --}}
        <div id='calendar' data-events="{{ json_encode($events) }}"></div>
    </div>
@endsection
