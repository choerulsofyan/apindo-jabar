{{-- Wrap both elements in a fixed-top container --}}
<div class="fixed-top shadow-lg" style="z-index: 1030;">
    {{-- Top Bar --}}
    <div class="top-bar py-1" style="background-color: #f5f5f5;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-start">
                    <i class="bi bi-telephone-fill text-primary me-2"></i>
                    <small>+62-812-2360-9501 (Whatsapp Only)</small>
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
                <img src="{{ asset('assets/images/logo_white.png') }}" alt="APINDO Logo" height="50">
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
                        <ul class="dropdown-menu border-0" aria-labelledby="tentangKamiDropdown">
                            <li><a class="dropdown-item" href="#">Sejarah</a></li>
                            <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="#">Bidang</a></li>
                            <li><a class="dropdown-item" href="#">DPK APINDO Jabar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fs-5 dropdown-toggle" href="{{ route('home') }}#member-section"
                            id="mediaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            KEANGGOTAAN
                        </a>
                        <ul class="dropdown-menu border-0" aria-labelledby="mediaDropdown">
                            <li><a class="dropdown-item" href="#">Pendaftaran Anggota</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link fs-5 dropdown-toggle" href="{{ route('home') }}#news-section"
                            id="mediaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            MEDIA
                        </a>
                        <ul class="dropdown-menu border-0" aria-labelledby="mediaDropdown">
                            <li><a class="dropdown-item" href="#">Berita</a></li>
                            <li><a class="dropdown-item" href="#">Galeri</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('home') }}#regulation-section">REGULASI</a>
                    </li>
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
                            <li class="nav-item">
                                <a class="nav-link fs-5" href="{{ route('register') }}">Daftar</a>
                            </li>
                        @endguest

                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
<div style="margin-top: 122px;"></div>
