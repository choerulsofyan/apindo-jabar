<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', 'Admin Dashboard')</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="APINDO JAWA BARAT | Dashboard" />
    <meta name="author" content="APINDO JAWA BARAT" />
    <meta name="robots" content="noindex, nofollow">

    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains">
    <!--end::Primary Meta Tags-->

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">

    @vite(['resources/sass/admin/app.scss'])
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        @include('partials.admin.header')
        <!--end::Header-->

        <!--begin::Sidebar-->
        @include('partials.admin.sidebar')
        <!--end::Sidebar-->

        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Breadcrumb-->
                    @yield('subheader')
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content Header-->
            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Content-->
                    @yield('content')
                    <!--end::Content-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->
        <!--begin::Footer-->
        @include('partials.admin.footer')
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector('.sidebar-wrapper');
            if (sidebarWrapper) {
                OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: 'os-theme-light',
                        autoHide: 'leave',
                        clickScroll: true,
                    },
                });
            }
        });
    </script>
    @vite(['resources/js/admin/app.js'])
    @stack('scripts')
    <!--end::Script-->
</body>
<!--end::Body-->

</html>
