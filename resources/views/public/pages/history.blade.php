@extends('public.layouts.app')

@section('title', 'Sejarah - APINDO Jawa Barat')
@section('meta_description', Str::limit(strip_tags('Sejarah APINDO Jawa Barat'), 155))

@section('content')
    <div class="container pt-3">
        <div class="row">
            <div class="col-lg-4">
                @include('public.partials.sidebar')
            </div>
            <div class="col-lg-8">
                <section id="sejarah"
                    class="history-page py-5 d-flex flex-column justify-content-center align-items-center mx-auto">
                    {{-- <h1 class="text-center mb-4 fw-bold">Tentang Kami</h1> --}}
                    <img src="{{ asset('assets/images/logo_blue.png') }}" alt="APINDO Jawa Barat" class="img-fluid mb-5 w-50">
                    <div class="content" style="line-height: 30px;font-size: 1rem;font-weight: 400;text-align: justify;">
                        <p>
                            Asosiasi Pengusaha Indonesia (APINDO) awalnya berdiri dengan nama Badan Permusyawaratan Urusan
                            Sosial Seluruh Indonesia. Terlahir pada 31 Januari 1952. Pasca perjuangan kemerdekaan usai,
                            pembangunan di segala bidang mulai menjadi perhatian, salah satunya pada bidang sosial ekonomi.
                            Bidang ini pula yang merupakan hal baru di dunia usaha.
                        </p>
                        <p>
                            Permasalahan terkait dunia usaha mulai muncul, seperti isu hubungan industrial dan
                            ketenagakerjaan, serta perburuhan. Tuntutan yang diperjuangkan para buruh mengalami perubahan,
                            dimana sebelum kemerdekaan, tuntunan kaum buruh menjadi pergerakan dalam rangka mencapai
                            kemerdekaan. Di era pasca kemerdekaan, telah muncul tuntutan untuk mendapatkan hak perlindungan
                            kerja yang lebih baik sehingga hal ini memicu munculnya permasalahan hubungan kerja yang
                            melibatkan buruh dengan majikan.
                        </p>
                        <p>
                            Seiring dengan meningkatnya isu di bidang perburuhan dan hubungan industrial, para majikan
                            mempertimbangkan pentingnya satu wadah yang mampu menjadi forum komunikasi dan bertukar pikiran
                            untuk menyelesaikan berbagai permasalahan yang muncul dalam bidang hubungan industrial dan
                            buruh. kepentingan pemerintah dan para majikan. Dalam lingkup yang lebih luas, forum tersebut
                            bisa menyuarakan aspirasi para majikan kepada pemerintah maupun organisasi lain, baik di dalam
                            dan luar negeri, yang terkait dalam dunia hubungan industrial dan perburuhan.
                        </p>
                        <p>
                            Forum ini mengalami beberapa kali perubahan nama, hingga pada 31 Januari 1952, tercetus Badan
                            Permusyawaratan Sosial Ekonomi Pengusaha Seluruh Indonesia (PUSPI). Sesuai dengan tuntutan
                            perkembangan jaman, PUSPI kembali berubah nama menjadi Asosiasi Pengusaha Indonesia (APINDO)
                            melalui Musyawarah Nasional (Munas) APINDO II di Surabaya, tahun 1985.
                        </p>
                        <p>
                            Seiring dengan perkembangan teknologi dan liberalisasi perdagangan yang membawa pengaruh
                            signifikan bagi kehidupan masyarakat dunia, kompetisi efisiensi, produktivitas, dan jejaring
                            menjadi kata kunci keberhasilan negara-negara dalam menghadapi perubahan global tersebut.
                            Sebaliknya, perekonomian negara yang tidak dikelola secara efisien dan efektif tidak akan mampu
                            berkompetisi sehingga akan tertinggal dalam perubahan global.
                        </p>
                        <p>
                            Sementara itu, krisis multidimensi sangat mempengaruhi kondisi perekonomian nasional. Tingginya
                            angka korupsi, kolusi, dan nepotisme, birokrasi yang tidak efisien, peraturan yang tidak
                            konsisten dan rendahnya produktivitas serta maraknya tuntutan buruh, menyebabkan ekonomi biaya
                            tinggi yang pada akhirnya mendorong terjadinya pelarian modal secara besar-besaran.
                        </p>
                        <p>
                            Konsekuensi dari kondisi seperti ini adalah semakin meningkatnya penggangguran dan tingginya
                            angka kemiskinan. Salah satu upaya untuk penanganan tekanan berat terhadap perekonomian Nasional
                            adalah membangun hubungan industrial yang sehat, aman, dan harmonis. Asosiasi Pengusaha
                            Indonesia (APINDO) merupakan sarana perjuangan dunia usaha untuk merealisasikan hubungan
                            industrial yang harmonis, dan berkesinambungan.
                        </p>
                    </div>
                </section>
                <h1 class="text-center mb-4</p>
<h1 class="</<h</div>
                    </section>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .public-page .card {
            box-shadow: none !important;
        }
    </style>
@endpush
