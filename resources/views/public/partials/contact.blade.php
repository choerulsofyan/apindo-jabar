<section id="contact-section" class="py-5 py-lg-7 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bolder text-primary mb-3">KONTAK KAMI</h2>
                <p class="lead text-dark">Hubungi kami untuk informasi lebih lanjut atau kirim pesan langsung
                    melalui form di bawah ini</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Contact Form Column -->
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <form action="{{ route('mindo.pesan.store') }}" method="POST" class="needs-validation"
                            novalidate>
                            @csrf
                            <div class="row g-4">
                                <!-- Name Field -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control form-control-lg" id="name"
                                        name="name" placeholder="Nama lengkap" required>
                                    <div class="invalid-feedback">Nama wajib diisi</div>
                                </div>

                                <!-- Email Field -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-lg" id="email"
                                        name="email" placeholder="email@example.com" required>
                                    <div class="invalid-feedback">Email wajib diisi dengan format yang benar</div>
                                </div>

                                <!-- Subject Field -->
                                <div class="col-12">
                                    <label for="subject" class="form-label">Judul Pesan</label>
                                    <input type="text" class="form-control form-control-lg" id="subject"
                                        name="subject" placeholder="Topik pesan" required>
                                    <div class="invalid-feedback">Judul pesan wajib diisi</div>
                                </div>

                                <!-- Message Field -->
                                <div class="col-12">
                                    <label for="message" class="form-label">Isi Pesan</label>
                                    <textarea class="form-control form-control-lg" id="message" name="message" rows="5"
                                        placeholder="Tulis pesan Anda di sini..." required></textarea>
                                    <div class="invalid-feedback">Pesan wajib diisi</div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary py-3 px-5 fw-medium">
                                        Kirim Pesan
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Social Media -->
                        <div class="mt-4 pt-3 border-top">
                            <p class="text-center mb-3 fw-medium">Ikuti kami di media sosial</p>
                            <div class="text-center d-flex justify-content-center gap-3">
                                <a href="https://x.com/ApindoJabar" target="_blank" class="social-icon"
                                    aria-label="Twitter">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a href="https://web.facebook.com/profile.php?id=100068335279955" target="_blank"
                                    class="social-icon" aria-label="Facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://www.youtube.com/@dppapindojabar6482" target="_blank"
                                    class="social-icon" aria-label="YouTube">
                                    <i class="bi bi-youtube"></i>
                                </a>
                                <a href="https://www.instagram.com/apindo.jabar/?hl=en" target="_blank"
                                    class="social-icon" aria-label="Instagram">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map & Contact Info Column -->
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <!-- Contact Information -->
                        <h4 class="fw-bold mb-4">Informasi Kontak</h4>
                        <ul class="list-unstyled contact-info mb-4">
                            <li class="mb-4">
                                <div class="d-flex">
                                    <div class="icon-square text-primary me-3">
                                        <i class="bi bi-geo-alt-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-2 fw-semibold">Alamat</h5>
                                        <p class="mb-0 text-secondary-dark">
                                            Jl. Merdeka No.2 Lantai 2 Unit 12 C, Braga, Kec. Sumur Bandung, Kota
                                            Bandung, Jawa Barat 40111
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="d-flex">
                                    <div class="icon-square text-primary me-3">
                                        <i class="bi bi-telephone-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-2 fw-semibold">Telepon</h5>
                                        <p class="mb-0 text-secondary-dark">+62-812-2360-9501</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="d-flex">
                                    <div class="icon-square text-primary me-3">
                                        <i class="bi bi-envelope-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-2 fw-semibold">Email</h5>
                                        <p class="mb-0 text-secondary-dark">sekretariat@apindojabar.org</p>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <!-- Google Map -->
                        <div class="map-container rounded overflow-hidden mt-4" style="height: 314px;">
                            <iframe class="w-100 h-100" style="border:0;" loading="lazy" allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7858168847392!2d107.61061190000001!3d-6.916191599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c2a64a624ce5%3A0x3d949e3a8fff5643!2sApindo%20Jabar!5e0!3m2!1sen!2sid!4v1742526841176!5m2!1sen!2sid">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        // Form validation script
        (function() {
            'use strict'

            // Fetch all forms we want to apply validation to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endpush
