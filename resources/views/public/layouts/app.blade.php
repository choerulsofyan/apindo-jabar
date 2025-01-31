<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <title>@yield('title', config('app.name'))</title>

    {{-- Include your public CSS and JS files here --}}
    @vite(['resources/sass/public/app.scss', 'resources/js/public/app.js'])

    {{-- Add any other CSS or meta tags here --}}
</head>

<body class="bg-light"> {{-- Assuming a light background for the body --}}
    {{-- <div id="app"> --}}
    @include('public.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('public.partials.footer')
    {{-- </div> --}}

    @stack('styles')
    @stack('scripts')
</body>

</html>
