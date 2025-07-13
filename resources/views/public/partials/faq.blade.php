<section id="faq-section" class="py-5 py-lg-7 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bolder text-primary mb-3">PERTANYAAN UMUM</h2>
                <p class="lead text-dark">Temukan jawaban atas pertanyaan yang sering diajukan tentang APINDO Jawa Barat
                </p>
            </div>
        </div>

        <!-- FAQ Accordion -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion accordion-flush shadow-sm" id="faqAccordion">
                    <!-- Accordion Item 1 -->
                    <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-semibold collapsed bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                aria-controls="collapseOne">
                                <i class="bi bi-question-circle-fill text-primary me-3"></i>
                                APINDO dibawah naungan siapa?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body py-4 bg-white">
                                <p class="mb-0">APINDO berdiri di bawah naungan Dewan Pimpinan Nasional (DPN) yang
                                    berada di Jakarta,
                                    dan Dewan Pimpinan Provinsi (DPP) yang berada di setiap provinsi di Indonesia.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 2 -->
                    <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button fw-semibold collapsed bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                <i class="bi bi-question-circle-fill text-primary me-3"></i>
                                APINDO bergerak di bidang apa saja?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body py-4 bg-white">
                                <p class="mb-0">APINDO bergerak di bidang perburuhan, pengusaha, dan pemerintahan.
                                    APINDO juga memiliki
                                    program-program yang bergerak di bidang sosial, pendidikan, dan kesehatan.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 3 -->
                    <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button fw-semibold collapsed bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                <i class="bi bi-question-circle-fill text-primary me-3"></i>
                                Apa peran APINDO?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body py-4 bg-white">
                                <p class="mb-0">APINDO memiliki peran yakni sebagai wadah bagi pengusaha Indonesia
                                    untuk berkumpul dan
                                    bertukar pikiran tentang perkembangan dunia usaha di Indonesia, sebagai wadah untuk
                                    menyalurkan aspirasi dunia usaha kepada pemerintah, dan juga menjadi jembatan antara
                                    pengusaha dan pemerintah, serta sebagai rumah bagi pengusaha untuk mendapatkan
                                    informasi terkait dengan dunia usaha, pengusaha dan perburuhan.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 4 -->
                    <div class="accordion-item border-0 mb-3 rounded overflow-hidden">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button fw-semibold collapsed bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour">
                                <i class="bi bi-question-circle-fill text-primary me-3"></i>
                                Arti logo APINDO?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body py-4 bg-white">
                                <p class="mb-0">Logo APINDO terdiri dari huruf A yang diartikan sebagai APINDO, huruf
                                    P yang diartikan sebagai Pengusaha dan huruf I yang diartikan sebagai Indonesia.
                                    Serta melambangkan tangan yang saling menggenggam yang menunjukan sikap memberi
                                    bantuan kepada pihak lainnya dalam Hubungan Industrial.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
    <style>
        /* Custom styles for FAQ accordion */
        #faqAccordion .accordion-button:not(.collapsed) {
            color: var(--bs-primary);
            background-color: rgba(25, 56, 94, 0.05);
            box-shadow: none;
        }

        #faqAccordion .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(25, 56, 94, 0.1);
        }

        #faqAccordion .accordion-item {
            transition: all 0.3s ease;
        }

        #faqAccordion .accordion-item:hover {
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
