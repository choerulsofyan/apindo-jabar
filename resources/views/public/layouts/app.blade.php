<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <title>@yield('title', config('app.name', 'APINDO Jawa Barat'))</title>
    <meta name="description" content="@yield('meta_description', Str::limit(strip_tags('APINDO adalah perkumpulan yang beranggotakan Pengusaha dan atau Perusahaan yang berdomisili di Indonesia, bersifat demokratis, bebas, mandiri, dan bertanggung jawab yang menangani kegiatan dunia usaha dalam arti yang luas.'), 155))">

    {{-- Include your public CSS and JS files here --}}
    @vite(['resources/sass/public/public-app.scss', 'resources/js/public/app.js'])

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
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
            }, 'google_translate_element');
        }
    </script>
</body>

</html>
