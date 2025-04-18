<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#19385e">
    <meta name="format-detection" content="telephone=no">
    <meta name="color-scheme" content="light">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}">

    <title>@yield('title', config('app.name', 'APINDO Jawa Barat'))</title>
    <meta name="description" content="@yield('meta_description', Str::limit(strip_tags('APINDO adalah perkumpulan yang beranggotakan Pengusaha dan atau Perusahaan yang berdomisili di Indonesia, bersifat demokratis, bebas, mandiri, dan bertanggung jawab yang menangani kegiatan dunia usaha dalam arti yang luas.'), 155))">

    <!-- Vite Assets -->
    @vite(['resources/sass/public/public-app.scss', 'resources/js/public/app.js'])

    <!-- Custom Styles -->
    @stack('styles')
</head>

<body class="bg-light">
    <!-- Navbar -->
    @include('public.partials.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('public.partials.footer')

    <!-- Scripts -->
    @stack('scripts')

    <!-- Google Translate Implementation -->
    <script type="text/javascript">
        // Define initialization function
        function googleTranslateElementInit() {
            try {
                if (typeof google !== 'undefined' &&
                    typeof google.translate !== 'undefined' &&
                    typeof google.translate.TranslateElement !== 'undefined') {

                    new google.translate.TranslateElement({
                        pageLanguage: 'id',
                        autoDisplay: false,
                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                    }, 'google_translate_element');
                }
            } catch (error) {
                console.log('Google Translate initialization error:', error);
            }
        }

        // Load Google Translate script dynamically
        document.addEventListener('DOMContentLoaded', function() {
            var translateScript = document.createElement('script');
            translateScript.src =
                'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
            translateScript.async = true;
            translateScript.defer = true;

            // Handle script loading errors
            translateScript.onerror = function() {
                console.log('Failed to load Google Translate script');
            };

            document.body.appendChild(translateScript);
        });
    </script>
</body>

</html>
