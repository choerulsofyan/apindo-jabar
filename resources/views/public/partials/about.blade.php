<section id="about-section" class="py-5 py-lg-7">
    <div class="container">
        <div class="row align-items-center gy-5">
            <!-- Video Column -->
            <div class="col-lg-6">
                <div class="ratio ratio-16x9 shadow-sm rounded overflow-hidden">
                    <iframe src="https://www.youtube.com/embed/w_dbSeBom0Y?si=yKcfrlrVZvZAbuXS"
                        title="APINDO Jawa Barat Video" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
            
            <!-- Content Column -->
            <div class="col-lg-6">
                <div class="ps-lg-5">
                    <h2 class="section-title fw-bolder mb-4 text-primary">TENTANG APINDO JABAR</h2>
                    <p class="lead mb-4">
                        Apindo adalah perkumpulan yang beranggotakan Pengusaha dan atau Perusahaan yang
                        berdomisili di Indonesia, bersifat demokratis, bebas, mandiri, dan bertanggung jawab yang menangani
                        kegiatan dunia usaha dalam arti yang luas.
                    </p>
                    
                    <!-- Buttons -->
                    <div class="d-flex flex-wrap gap-2 gap-md-3 mt-4">
                        <a href="{{ route('history') }}" class="btn btn-outline-primary">
                            <i class="bi-fingerprint me-2"></i>Sejarah
                        </a>
                        <a href="{{ route('vision-mission') }}" class="btn btn-outline-primary">
                            <i class="bi bi-send me-2"></i>Visi & Misi
                        </a>
                        <a href="{{ route('sectors') }}" class="btn btn-outline-primary">
                            <i class="bi bi-file-text me-2"></i>Bidang
                        </a>
                        @can('ANGGOTA_MENU_VIEW')
                            <a href="{{ route('dpkApindoJabar') }}" class="btn btn-outline-primary">
                                <i class="bi bi-building me-2"></i>DPK APINDO
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
