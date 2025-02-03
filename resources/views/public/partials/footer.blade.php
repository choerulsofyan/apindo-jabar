<footer class="footer mt-auto py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex flex-column gap-3">
                <a href="#">
                    <img src="{{ asset('assets/images/logo_blue.png') }}" alt="APINDO Jabar" height="80">
                </a>
                <p class="text-left mt-2">&copy; Copyright <strong> APINDO Jabar </strong>. All rights reserved</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bolder">HUBUNGI KAMI</h5>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li>
                        <i class="bi bi-geo-alt-fill"></i>
                        Jl. Merdeka No.2 Lantai 2 Unit 12 C, Braga, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40111
                    </li>
                    <li>
                        <i class="bi bi-telephone-fill"></i>
                        +62-812-2360-9501 (Whatsapp only)
                    </li>
                    <li>
                        <i class="bi bi-envelope-fill"></i>
                        <a href="mailto:apindojabarhebat@gmail.com" class="text-decoration-none">
                            apindojabarhebat@gmail.com
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5 class="fw-bolder">SITEMAP</h5>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="#" class="text-decoration-none">Beranda</a></li>
                    <li><a href="#" class="text-decoration-none">Tentang Kami</a></li>
                    <li><a href="#" class="text-decoration-none">Berita</a></li>
                    <li><a href="#" class="text-decoration-none">Regulasi</a></li>
                    <li><a href="#" class="text-decoration-none">Anggota</a></li>
                    <li><a href="#" class="text-decoration-none">Kontak</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5 class="fw-bolder">KEANGGOTAAN</h5>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="{{ route('login') }}" class="text-decoration-none">Login</a></li>
                    <li><a href="{{ route('register') }}" class="text-decoration-none">Registrasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
