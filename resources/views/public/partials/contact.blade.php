<section id="contact-section" class="py-5">
    <div class="container">
        <h2 class="text-center fw-bolder mb-4 text-primary">KONTAK KAMI</h2>
        <form action="{{ route('mindo.pesan.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    {{-- <label for="name" class="form-label">Full Name</label> --}}
                    <input type="text" class="form-control form-control-lg" id="name" name="name"
                        placeholder="Nama" required>
                </div>
                <div class="col-md-6 mb-3">
                    {{-- <label for="email" class="form-label">Email Address</label> --}}
                    <input type="email" class="form-control form-control-lg" id="email" name="email"
                        placeholder="Email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    {{-- <label for="subject" class="form-label">Message Title</label> --}}
                    <input type="text" class="form-control form-control-lg" id="subject" name="subject"
                        placeholder="Judul Pesan" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    {{-- <label for="message" class="form-label">Message</label> --}}
                    <textarea class="form-control form-control-lg" id="message" name="message" rows="5" placeholder="Isi Pesan"
                        required></textarea>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Kirim</button>
            </div>
        </form>
    </div>
</section>
