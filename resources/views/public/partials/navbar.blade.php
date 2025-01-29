<div class="top-bar py-1" style="background-color: #f5f5f5;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-start">
                <i class="bi bi-telephone-fill text-primary me-2"></i>
                <small>+62-812-2360-9501 (Whatsapp Only)</small>
            </div>
            <div class="text-end">
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-globe me-1"></i> ID
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">ID</a></li>
                        <li><a class="dropdown-item" href="#">EN</a></li>
                        <li><a class="dropdown-item" href="#">JP</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

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
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#about-section">TENTANG KAMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#news-section">BERITA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#regulation-section">REGULASI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#member-section">ANGGOTA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#contact-section">KONTAK</a>
                </li>
            </ul>
            <div class="d-flex gap-1 fs-5 text-white">
                <ul class="navbar-nav mx-auto d-flex">
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('register') }}">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
