{{-- Wrap both elements in a fixed-top container --}}
<div class="fixed-top" style="z-index: 1030;">
    {{-- Top Bar --}}
    <div class="top-bar py-1" style="background-color: #f5f5f5;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-start d-none d-sm-block">
                    <i class="bi bi-whatsapp text-primary me-2"></i>
                    <small>
                        <a href="https://wa.me/+6281223609501" class="link-to-whatsapp">
                            +62-812-2360-9501
                        </a>
                    </small>
                </div>
                <div class="text-end">
                    <div id="google_translate_element"></div>
                    {{-- <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-globe me-1"></i> ID
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">ID</a></li>
                            <li><a class="dropdown-item" href="#">EN</a></li>
                            <li><a class="dropdown-item" href="#">JP</a></li>
                            <li><a class="dropdown-item" href="#">FR</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Main Navigation --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand my-1" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo_white.png') }}" alt="APINDO Jawa Barat" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto d-flex gap-3">
                    <li class="nav-item">
                        <a class="nav-link fs-5 active" aria-current="page" href="{{ route('home') }}">BERANDA</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fs-5 dropdown-toggle" href="{{ route('home') }}#about-section"
                            id="tentangKamiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            TENTANG KAMI
                        </a>
                        <ul class="dropdown-menu border-0 shadow" aria-labelledby="tentangKamiDropdown">
                            <li><a class="dropdown-item" href="{{ route('history') }}">Sejarah</a></li>
                            <li><a class="dropdown-item" href="{{ route('vision-mission') }}">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('sectors') }}">Bidang</a></li>
                            @can('ANGGOTA_MENU_VIEW')
                                <li><a class="dropdown-item" href="{{ route('dpkApindoJabar') }}">DPK APINDO Jabar</a></li>
                                <li><a class="dropdown-item" href="{{ route('calendar.index') }}">Kalender Kegiatan</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fs-5 dropdown-toggle" href="{{ route('home') }}#member-section"
                            id="mediaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            KEANGGOTAAN
                        </a>
                        <ul class="dropdown-menu border-0 shadow" aria-labelledby="mediaDropdown">
                            <li>
                                <a class="dropdown-item {{ Auth::check() ? 'disabled' : '' }}"
                                    href="{{ Auth::check() ? '#' : route('register') }}"
                                    @if (Auth::check()) tabindex="-1" aria-disabled="true" @endif>
                                    Pendaftaran Anggota
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fs-5 dropdown-toggle" href="{{ route('home') }}#news-section"
                            id="mediaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            MEDIA
                        </a>
                        <ul class="dropdown-menu border-0 shadow" aria-labelledby="mediaDropdown">
                            <li><a class="dropdown-item" href="{{ route('home') }}#news-section">Berita</a></li>
                            <li><a class="dropdown-item" href="{{ route('home') }}#gallery-section">Galeri</a></li>
                        </ul>
                    </li>
                    @can('ANGGOTA_MENU_VIEW')
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="{{ route('managements') }}">KEPENGURUSAN</a>
                        </li>
                    @endcan
                    @can('ANGGOTA_MENU_VIEW')
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="{{ route('regulations') }}">REGULASI</a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('home') }}#contact-section">KONTAK</a>
                    </li>
                </ul>
                <div class="d-flex gap-1 fs-5 text-white">
                    <ul class="navbar-nav mx-auto d-flex">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link fs-5" href="{{ route('login') }}">Masuk</a>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu border-0 shadow" aria-labelledby="navbarDropdown">
                                    @can('DASHBOARD')
                                        <li><a class="dropdown-item" href="{{ route('mindo.home') }}">Dashboard</a></li>
                                    @endcan
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

{{-- Spacer to prevent content from being hidden behind fixed header --}}
<div style="margin-top: 115px;"></div>
