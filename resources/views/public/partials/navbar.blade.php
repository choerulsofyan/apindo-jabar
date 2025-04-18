<header class="fixed-top">
    <!-- Top Bar -->
    <div class="top-bar py-1 bg-light border-bottom">
        <div class="container-fluid container-lg">
            <div class="d-flex justify-content-between align-items-center">
                <div class="contact-item">
                    <a href="https://wa.me/+6281223609501" class="text-decoration-none text-body small">
                        <i class="bi bi-whatsapp text-primary me-1"></i> +62-812-2360-9501
                    </a>
                </div>
                <div class="ms-auto">
                    <div id="google_translate_element" class="d-inline-block"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-2">
        <div class="container-fluid container-lg">
            <!-- Brand -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo_white.png') }}" alt="APINDO Jawa Barat" height="50"
                    class="d-inline-block align-text-top">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Home -->
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold' : '' }}"
                            href="{{ route('home') }}">
                            <span class="d-inline-block py-2">BERANDA</span>
                        </a>
                    </li>

                    <!-- About -->
                    <li class="nav-item dropdown mx-lg-2">
                        <a class="nav-link dropdown-toggle" href="{{ route('home') }}#about-section"
                            id="tentangKamiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-inline-block py-2">TENTANG KAMI</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm"
                            aria-labelledby="tentangKamiDropdown">
                            <li><a class="dropdown-item py-2" href="{{ route('history') }}">Sejarah</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('vision-mission') }}">Visi & Misi</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('sectors') }}">Bidang</a></li>
                            @can('ANGGOTA_MENU_VIEW')
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item py-2" href="{{ route('dpkApindoJabar') }}">DPK APINDO Jabar</a>
                                </li>
                                <li><a class="dropdown-item py-2" href="{{ route('calendar.index') }}">Kalender Kegiatan</a>
                                </li>
                            @endcan
                        </ul>
                    </li>

                    <!-- Membership -->
                    <li class="nav-item dropdown mx-lg-2">
                        <a class="nav-link dropdown-toggle" href="{{ route('home') }}#member-section"
                            id="keanggotaanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-inline-block py-2">KEANGGOTAAN</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm"
                            aria-labelledby="keanggotaanDropdown">
                            <li>
                                <a class="dropdown-item py-2 {{ Auth::check() ? 'disabled' : '' }}"
                                    href="{{ Auth::check() ? '#' : route('register') }}"
                                    @if (Auth::check()) tabindex="-1" aria-disabled="true" @endif>
                                    Pendaftaran Anggota
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Media -->
                    <li class="nav-item dropdown mx-lg-2">
                        <a class="nav-link dropdown-toggle" href="{{ route('home') }}#news-section" id="mediaDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-inline-block py-2">MEDIA</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm" aria-labelledby="mediaDropdown">
                            <li><a class="dropdown-item py-2" href="{{ route('home') }}#news-section">Berita</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('home') }}#gallery-section">Galeri</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Management (Members Only) -->
                    @can('ANGGOTA_MENU_VIEW')
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link {{ request()->routeIs('managements') ? 'active fw-semibold' : '' }}"
                                href="{{ route('managements') }}">
                                <span class="d-inline-block py-2">KEPENGURUSAN</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Regulations (Members Only) -->
                    @can('ANGGOTA_MENU_VIEW')
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link {{ request()->routeIs('regulations') ? 'active fw-semibold' : '' }}"
                                href="{{ route('regulations') }}">
                                <span class="d-inline-block py-2">REGULASI</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Contact -->
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link" href="{{ route('home') }}#contact-section">
                            <span class="d-inline-block py-2">KONTAK</span>
                        </a>
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
</header>

{{-- No spacer needed - using proper CSS in public-app.scss instead --}}
