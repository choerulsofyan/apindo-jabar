<section id="testimoni-section" class="py-5">
    <div class="container">
        <h2 class="text-center fw-bolder mb-4 text-primary">TESTIMONI</h2>

        @if ($testimonis->isEmpty())
            <div class="alert alert-info text-center">
                <p class="text-center text-muted">Testimoni belum tersedia.</p>
            </div>
        @else
            <div id="carouselExampleControls" class="carousel slide text-center carousel-dark" data-mdb-carousel-init data-mdb-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($testimonis as $index => $testimoni)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <h5 class="mb-3">{{ $testimoni->nama }}</h5>
                                    <p>{{ $testimoni->jenis_pekerjaan }}</p>
                                    <p class="text-muted">
                                        <i class="fas fa-quote-left pe-2"></i>
                                        {{ $testimoni->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="prev">
                    <span class="carousel-control-prev-icon text-body" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
                    <span class="carousel-control-next-icon text-body" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif
    </div>
</section>

<script src="{{ asset('js/mdb.umd.min.js') }}"></script>
