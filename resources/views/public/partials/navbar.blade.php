<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand my-1" href="#">
            <img src="{{ asset('assets/images/logo_white.png') }}" alt="APINDO Logo" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto d-flex gap-1">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">BERANDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about-section">TENTANG KAMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#news-section">BERITA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#regulation-section">REGULASI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#member-section">ANGGOTA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-section">KONTAK</a>
                </li>
            </ul>
            <div class="d-flex">
                <a class="btn btn-outline-light me-2" href="{{ route('login') }}">Login</a>
                <a class="btn btn-light text-primary" href="{{ route('register') }}">Registrasi</a>
            </div>
        </div>
    </div>
</nav>
