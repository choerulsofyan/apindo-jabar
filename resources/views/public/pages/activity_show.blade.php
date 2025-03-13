@extends('public.layouts.app')

@section('title', $activity->title)

@section('content')
    <div class="container my-5">
        <h1>{{ $activity->title }}</h1>
        <p><strong>Start Date:</strong> {{ $activity->start_time->format('F j, Y, g:i a') }}</p>
        @if ($activity->end_time)
            <p><strong>End Date:</strong> {{ $activity->end_time->format('F j, Y, g:i a') }}</p>
        @endif
        <p><strong>Place:</strong> {{ $activity->place ?? '-' }}</p>
        <p><strong>Description:</strong></p>
        <p>{{ $activity->description ?? '-' }}</p>

        <a href="{{ route('calendar.index') }}" class="btn btn-primary">Back to Calendar</a>
    </div>
@endsection
