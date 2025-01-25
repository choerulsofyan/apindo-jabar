<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'APINDO')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    @vite(['resources/css/public.css', 'resources/js/public.js'])
</head>

<body class="bg-gray-100 font-sans">
    <div id="app">
        @include('partials.public.navbar')

        <main class="py-4">
            @yield('content')
        </main>

        @include('partials.public.footer')
    </div>

    @stack('scripts')
</body>

</html>
