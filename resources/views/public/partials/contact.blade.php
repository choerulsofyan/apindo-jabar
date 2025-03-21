<section id="contact-section" class="py-5">
    <div class="container">
        <h2 class="text-center fw-bolder mb-4 text-primary">KONTAK KAMI</h2>
        <div class="row">
            <!-- Kolom Form -->
            <div class="col-md-6">
                <form action="{{ route('mindo.pesan.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                placeholder="Nama" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                placeholder="Email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-lg" id="subject" name="subject"
                            placeholder="Judul Pesan" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control form-control-lg" id="message" name="message" rows="5"
                            placeholder="Isi Pesan" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100 py-3">Kirim</button>
                    </div>
                    <!-- Media Sosial -->
                    <div class="text-center mt-3">
                        <a href="https://x.com/ApindoJabar" target="_blank" class="mx-2">
                            <i class="bi bi-twitter fs-3 text-primary"></i>
                        </a>
                        <a href="https://web.facebook.com/profile.php?id=100068335279955" target="_blank" class="mx-2">
                            <i class="bi bi-facebook fs-3 text-primary"></i>
                        </a>
                        <a href="https://www.youtube.com/@dppapindojabar6482" target="_blank" class="mx-2">
                            <i class="bi bi-youtube fs-3 text-primary"></i>
                        </a>
                        <a href="https://www.instagram.com/apindo.jabar/?hl=en" target="_blank" class="mx-2">
                            <i class="bi bi-instagram fs-3 text-primary"></i>
                        </a>
                    </div>                    
                </form>
            </div>
            <!-- Kolom Map -->
            <div class="col-md-6">
                <iframe width="100%" height="100%" style="border:0; min-height: 400px;" loading="lazy"
                    allowfullscreen referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7858168847392!2d107.61061190000001!3d-6.916191599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c2a64a624ce5%3A0x3d949e3a8fff5643!2sApindo%20Jabar!5e0!3m2!1sen!2sid!4v1742526841176!5m2!1sen!2sid">
                </iframe>
            </div>
        </div>
    </div>
</section>
