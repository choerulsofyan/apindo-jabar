@extends('public.layouts.app')

@section('title', 'Bidang-bidang APINDO')

@section('content')
    <section class="sectors-page py-5">
        <div class="container pt-3">
            <div class="row">
                <div class="col-lg-4">
                    @include('public.partials.sidebar')
                </div>
                <div class="col-lg-8">
                    <div class="accordion" id="sectorsAccordion">
                        @php
                            $sectors = [
                                [
                                    'number' => '01',
                                    'name' => 'Bidang Organisasi, Keanggotaan dan Pembinaan Daerah',
                                    'tasks' => [
                                        'Meningkatkan kualitas komunikasi antara DPP dengan Pengurus dari 27 DPK se-Jawa Barat.',
                                        'Melakukan pengawasan dan/atau pembinaan terhadap tata laksana dan tata kelola kepengurusan provinsi dan daerah yang sesuai dengan AD/ART APINDO.',
                                    ],
                                ],
                                [
                                    'number' => '02',
                                    'name' => 'Bidang Ketenagakerjaan dan Jaminan Sosial Ketenagakerjaan',
                                    'tasks' => [
                                        'Menjalin kemitraan aktif dengan regulator di bidang ketenagakerjaan dan jaminan sosial ketenagakerjaan yaitu DISNAKER Jawa Barat dan BPJS Ketenagakerjaan Jawa Barat.',
                                        'Menjalin kemitraan aktif dengan seluruh serikat pekerja yang ada di Jawa Barat.',
                                        'Menjadi fasilitator sekaligus mediator bagi para Anggota yang memerlukan informasi tentang urusan ketenagakerjaan.',
                                        'Melakukan pengawasan dan pembinaan terhadap peran serta DPP APINDO Jawa Barat di LKS Tripartit Jawa Barat, Dewan Pengupahan Provinsi Jawa Barat serta lembaga lainnya menyangkut urusan ketenagakerjaan.',
                                        'Membangun data base berisi informasi ketenagakerjaan di Jawa Barat, sebarannya dan dinamika yang berkembang.',
                                    ],
                                ],
                                [
                                    'number' => '03',
                                    'name' => 'Bidang Industri',
                                    'tasks' => [
                                        'Menjadi fasilitator kepentingan para Anggota yang bergerak dalam sektor industry',
                                        'Membangun data base berisi peta, klasifikasi dan zonasi perindustrian di Jawa Barat.',
                                        'Melakukan update berkesinambungan terhadap seluruh isu berkenaan dengan dinamika perindustrian di Jawa Barat.',
                                    ],
                                ],
                                [
                                    'number' => '04',
                                    'name' => 'Bidang Perdagangan, Perhubungan dan Logistik',
                                    'tasks' => [
                                        'Menjadi fasilitator kepentingan para Anggota yang bergerak dalam sektor perdagangan.',
                                        'Melakukan update berkesinambungan terhadap seluruh isu berkenaan dengan dinamika perdagangan di Jawa Barat.',
                                        'Menjadi fasilitator kepentingan para Anggota yang bergerak dalam sektor industri dan perdagangan sehubungan dengan jalur distribusi dan logistik.',
                                        'Melakukan update berkesinambungan terhadap seluruh isu berkenaan perhubungan dan logistik.',
                                    ],
                                ],
                                [
                                    'number' => '05',
                                    'name' => 'Bidang Pariwisata, Ekonomi Kreatif, IKM, UKM dan Koperasi',
                                    'tasks' => [
                                        'Melakukan pembinaan; baik terhadap Anggota maupun non Anggota yang bergerak di sektor pariwisata, IKM, UMKM dan koperasi.',
                                        'Membangun data base berisi peta, klasifikasi dan zonasi pariwisata, IKM, UMKM dan koperasi di Jawa Barat.',
                                    ],
                                ],
                                [
                                    'number' => '06',
                                    'name' => 'Bidang Pertanian, Perkebunan, Kehutanan dan Bina Lingkungan',
                                    'tasks' => [
                                        'Menjadi fasilitator kepentingan para Anggota yang bergerak dalam sektor pertanian, perkebunan dan kehutanan..',
                                        'Membangun data base berisi peta, klasifikasi dan zonasi pertanian, perkebunan dan kehutanan di Jawa Barat.',
                                        'Melakukan update berkesinambungan terhadap seluruh isu berkenaan dengan dinamika pertanian, perkebunan dan kehutanan di Jawa Barat.',
                                    ],
                                ],
                                [
                                    'number' => '07',
                                    'name' => 'Bidang Perbankan, Jasa Keuangan dan Perpajakan',
                                    'tasks' => [
                                        'Menjalin kemitraan aktif dengan seluruh regulator di bidang perbankan, jasa keuangan dan perpajakan; termasuk di dalamnya Bank Indonesia KPW Jawa Barat, OJK Kantor Regional 2 Jawa Barat dan Kantor Wilayah Pajak Jawa Barat 1 & 2.',
                                        'Melakukan update berkesinambungan terhadap seluruh isu berkenaan dengan dinamika perbankan, jasa keuangan dan perpajakan.',
                                    ],
                                ],
                                [
                                    'number' => '08',
                                    'name' => 'Bidang Infrastruktur, Properti dan Konstruksi',
                                    'tasks' => [
                                        'Menjalin kemitraan aktif dengan regulator di bidang perencanaan pembangunan yaitu BAPPEDA Jawa Barat.',
                                        'Melakukan update berkesinambungan terhadap seluruh isu berkenaan dengan arah serta rencana jangka pendek dan/atau jangka panjang pembangunan fisik di Jawa Barat sehingga APINDO dapat berkontribusi dalam cetak biru zonasi yang menjadi masa depan Jawa Barat.',
                                    ],
                                ],
                                [
                                    'number' => '09',
                                    'name' => 'Bidang Pengembangan Usaha dan Kemitraan',
                                    'tasks' => [
                                        'Menjadi fasilitator sekaligus mediator bagi para Anggota ingin melakukan pengembangan usaha dan/atau bermitra dengan pihak lain.',
                                        'Membangun kanal-kanal kemitraan dengan berbagai pihak.',
                                    ],
                                ],
                                [
                                    'number' => '10',
                                    'name' => 'Bidang Investasi dan Hubungan Internasional',
                                    'tasks' => [
                                        'Menjadi fasilitator bagi siapa pun yang ingin berinvestasi/membuka usaha di Jawa Barat, maupun yang ingin berinvestasi di luar Jawa Barat.',
                                        'Membangun serta mengembangkan jaringan kemitraan dengan para investor potensial dari manca negara.',
                                    ],
                                ],
                                [
                                    'number' => '11',
                                    'name' => 'Bidang Advokasi dan Kebijakan Publik',
                                    'tasks' => [
                                        'Menjalin kemitraan aktif dengan Pengadilan Hubungan Industrial Jawa Barat, Pengadilan Tata Usaha Negara serta Humas Pemerintah Provinsi Jawa Barat untuk dapat melakukan antisipasi awal terhadap regulasi dan/atau kebijakan publik yang dikeluarkan Pemerintah.',
                                        'Menjalin kemitraan aktif dengan seluruh serikat pekerja yang ada di Jawa Barat.',
                                        'Menjalin komunikasi aktif dengan Hakim Ad-Hoc dari Unsur APINDO di dalam Pengadilan Hubungan Industrial',
                                        'Melakukan update dari seluruh isu dan dinamika dari unsur APINDO dalam LKS Tripartit Jawa Barat, Dewan Pengupahan Provinsi Jawa Barat serta lembaga lainnya menyangkut urusan ketenagakerjaan',
                                    ],
                                ],
                                [
                                    'number' => '12',
                                    'name' => 'Bidang Diklat, Litbang, Produktivitas, K3 dan Sertifikasi',
                                    'tasks' => [
                                        'Menjalin kemitraan aktif dengan BPSDM (Badan Pengembangan Sumber Daya Manusia) Jawa Barat, Balai K3 Jawa Barat Badan Koordinasi Sertifikasi Profesi Jawa Barat, Balai K3 Jawa Barat dan lembaga-lembaga terkait.',
                                        'Melakukan sosialisasi program K3 kepada Anggota.',
                                        'Menjadi fasilitator program-program sertifikasi profesi karena itu akan menjadi isu utama ketenagakerjaan di Jawa Barat',
                                    ],
                                ],
                                [
                                    'number' => '13',
                                    'name' => 'Bidang Hubungan dan Kerjasama Antar Lembaga',
                                    'tasks' => [
                                        'Menjalin kemitraan aktif dengan seluruh stake holders dalam bentuk lembaga/organisasi/asosiasi yang memiliki kesamaan kepentingan dengan APINDO.',
                                        'Menjadi fasilitator APINDO JABAR dalam melakukan kemitraan dengan lembaga lain.',
                                        'Membangun data base berisi lembaga/organisasi/asosiasi yang berpotensi untuk melakukan kemitraan dengan APINDO',
                                    ],
                                ],
                                // Add more sectors as needed
                            ];
                        @endphp

                        @foreach ($sectors as $index => $sector)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                        aria-controls="collapse{{ $index }}">
                                        <span class="me-2">{{ $sector['number'] }}</span>
                                        {{ $sector['name'] }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#sectorsAccordion">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            @foreach ($sector['tasks'] as $task)
                                                <li class="list-group-item">
                                                    <i class="bi bi-dot me-2"></i> {{ $task }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('styles')
    <style>
        .sectors-page .accordion-button:not(.collapsed) {
            color: #fff;
        }

        .sectors-page .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }
    </style>
@endpush
