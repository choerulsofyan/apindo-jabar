<section id="about-section" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 mt-5 pe-5">
                <div class="ratio ratio-16x9">
                    <iframe class="" src="https://www.youtube.com/embed/w_dbSeBom0Y?si=yKcfrlrVZvZAbuXS"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6 cold-md-6 d-flex align-items-center">
                <div>
                    <h2 class="section-title fw-bolder mb-4 text-primary">TENTANG APINDO JABAR</h2>
                    <p class="lead">
                        Apindo adalah perkumpulan yang beranggotakan Pengusaha dan atau Perusahaan yang
                        berdomisili di
                        Indonesia, bersifat demokratis, bebas, mandiri, dan bertanggung jawab yang menangani
                        kegiatan
                        dunia
                        usaha dalam arti yang luas.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('history') }}" class="btn btn-outline-primary">
                            <i class="bi-fingerprint me-2 "></i>
                            Sejarah
                        </a>
                        <a href="{{ route('vision-mission') }}" class="btn btn-outline-primary">
                            <i class="bi bi-send me-2"></i>
                            Visi & Misi
                        </a>
                        <a href="{{ route('sectors') }}" class="btn btn-outline-primary">
                            <i class="bi bi-file-text me-2"></i>
                            Bidang-bidang
                        </a>
                        @can('ANGGOTA_MENU_VIEW')
                            <a href="{{ route('dpkApindoJabar') }}" class="btn btn-outline-primary">
                                <i class="bi bi-building me-2"></i>
                                DPK APINDO Jabar
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
