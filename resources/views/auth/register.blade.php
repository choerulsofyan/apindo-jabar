@extends('public.layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container pt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card bg-primary text-white p-1">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/logo_white.png') }}" alt="APINDO Jawa Barat"
                            class="img-fluid w-75 mb-5" />
                        <h4 class="fw-bold text-white">JENIS KEANGGOTAAN APINDO</h4>
                        <h5 class="mt-4 text-white fw-bold">Anggota Biasa</h5>
                        <p>
                            Anggota Biasa (AB) adalah perusahaan berbentuk persekutuan atau badan hukum milik swasta dan
                            koperasi maupun milik perseorangan yang didirikan dan menjalankan usahanya secara tetap dan
                            terus-menerus
                            serta sudah memenuhi ketentuan sesuai peraturan perundang-undangan yang berlaku. Anggota Biasa
                            mendaftar melalui Dewan Pimpinan Kabupaten/ Kota atau Dewan Pimpinan Provinsi sesuai domisili
                            perusahaan.
                        </p>
                        <h5 class="mt-4 text-white fw-bold">Anggota Luar Biasa</h5>
                        <p>
                            Anggota Luar Biasa (ALB) adalah perusahaan berbentuk persekutuan atau badan hukum milik
                            negara
                            dan
                            milik swasta yang didirikan dan menjalankan usahanya secara tetap dan terus-menerus serta sudah
                            memenuhi
                            ketentuan sesuai peraturan perundang-undangan yang berlaku. ALB mendaftar melalui Dewan Pimpinan
                            Nasional dan/ atau Dewan Pimpinan Provinsi sesuai domisili perusahaan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold">Formulir Pendaftaran Anggota APINDO DPP Jawa Barat</div>
                    <div class="card-body py-4">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                {{-- Tipe Anggota --}}
                                <div class="row mb-3">
                                    <label for="is_extraordinary_member" class="col-md-4 col-form-label text-md-end">
                                        Tipe Anggota
                                    </label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_extraordinary_member"
                                                id="member_type_biasa" value="0" checked>
                                            <label class="form-check-label" for="member_type_biasa">
                                                Anggota Biasa
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_extraordinary_member"
                                                id="member_type_luar_biasa" value="1">
                                            <label class="form-check-label" for="member_type_luar_biasa">
                                                Anggota Luar Biasa
                                            </label>
                                        </div>
                                        @error('is_extraordinary_member')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Nama Perusahaan --}}
                                <div class="row mb-3">
                                    <label for="company_name" class="col-md-4 col-form-label text-md-end">
                                        Nama Perusahaan
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text"
                                            class="form-control @error('company_name') is-invalid @enderror"
                                            id="company_name" name="company_name" value="{{ old('company_name') }}"
                                            required>
                                        @error('company_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Alamat Perusahaan --}}
                                <div class="row mb-3">
                                    <label for="company_address" class="col-md-4 col-form-label text-md-end">
                                        Alamat Perusahaan <br />
                                        <small class="text-muted">
                                            (Akan tercetak di sertifikat anggota dan sebagai korespondensi)
                                        </small>
                                    </label>
                                    <div class="col-md-6">
                                        <textarea class="form-control @error('company_address') is-invalid @enderror" id="company_address"
                                            name="company_address" rows="3" required>{{ old('company_address') }}</textarea>
                                        @error('company_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Kota/Kabupaten --}}
                                <div class="row mb-3">
                                    <label for="city" class="col-md-4 col-form-label text-md-end">
                                        Kota/Kabupaten
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            id="city" name="city" value="{{ old('city') }}" required>
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Kode Pos --}}
                                <div class="row mb-3">
                                    <label for="postal_code" class="col-md-4 col-form-label text-md-end">
                                        Kode Pos
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text"
                                            class="form-control @error('postal_code') is-invalid @enderror" id="postal_code"
                                            name="postal_code" value="{{ old('postal_code') }}" required>
                                        @error('postal_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- No. Telepon --}}
                                <div class="row mb-3">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">
                                        No. Telepon
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                                            required>
                                        @error('phone_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Fax --}}
                                <div class="row mb-3">
                                    <label for="fax" class="col-md-4 col-form-label text-md-end">
                                        Fax
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('fax') is-invalid @enderror"
                                            id="fax" name="fax" value="{{ old('fax') }}">
                                        @error('fax')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Website --}}
                                <div class="row mb-3">
                                    <label for="website" class="col-md-4 col-form-label text-md-end">
                                        Website
                                    </label>
                                    <div class="col-md-6">
                                        <input type="url" class="form-control @error('website') is-invalid @enderror"
                                            id="website" name="website" value="{{ old('website') }}">
                                        @error('website')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Email CP/Email Perusahaan --}}
                                <div class="row mb-3">
                                    <label for="company_email" class="col-md-4 col-form-label text-md-end">
                                        Email CP/Email Perusahaan
                                    </label>
                                    <div class="col-md-6">
                                        <input type="email"
                                            class="form-control @error('company_email') is-invalid @enderror"
                                            id="company_email" name="company_email" value="{{ old('company_email') }}"
                                            required>
                                        @error('company_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- KLBI --}}
                                <div class="row mb-3">
                                    <label for="klbi" class="col-md-4 col-form-label text-md-end">
                                        KLBI <br />
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('klbi') is-invalid @enderror"
                                            id="klbi" name="klbi" value="{{ old('klbi') }}" required>
                                        <div class="form-text">
                                            *) Klasifikasi Baku Lapangan Usaha Kerja
                                        </div>
                                        @error('klbi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Kegiatan Usaha Lainnya --}}
                                <div class="row mb-3">
                                    <label for="other_business_activities" class="col-md-4 col-form-label text-md-end">
                                        Kegiatan Usaha Lainnya
                                    </label>
                                    <div class="col-md-6">
                                        <textarea class="form-control @error('other_business_activities') is-invalid @enderror" id="other_business_activities"
                                            name="other_business_activities" rows="3">{{ old('other_business_activities') }}</textarea>
                                        @error('other_business_activities')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Status Perusahaan --}}
                                <div class="row mb-3">
                                    <label for="company_status" class="col-md-4 col-form-label text-md-end">
                                        Status Perusahaan
                                    </label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="company_status"
                                                id="company_status_bumn" value="BUMN"
                                                {{ old('company_status') == 'BUMN' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="company_status_bumn">
                                                BUMN
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="company_status"
                                                id="company_status_bumd" value="BUMD"
                                                {{ old('company_status') == 'BUMD' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="company_status_bumd">
                                                BUMD
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="company_status"
                                                id="company_status_private_national" value="Swasta Nasional"
                                                {{ old('company_status') == 'Swasta Nasional' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="company_status_private_national">
                                                Swasta Nasional
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="company_status"
                                                id="company_status_foreign_private" value="Swasta Asing"
                                                {{ old('company_status') == 'Swasta Asing' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="company_status_foreign_private">
                                                Swasta Asing
                                            </label>
                                        </div>
                                        @error('company_status')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Fasilitas Investasi --}}
                                <div class="row mb-3">
                                    <label for="investment_facilities" class="col-md-4 col-form-label text-md-end">
                                        Fasilitas Investasi
                                    </label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                name="investment_facilities_pma" id="investment_facilities_PMA"
                                                value="1"
                                                {{ old('investment_facilities_pma') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="investment_facilities_PMA">
                                                PMA
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                name="investment_facilities_pmdn" id="investment_facilities_PMDN"
                                                value="1"
                                                {{ old('investment_facilities_pmdn') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="investment_facilities_PMDN">
                                                PMDN
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                name="investment_facilities_joint_venture"
                                                id="investment_facilities_Joint_Venture" value="1"
                                                {{ old('investment_facilities_joint_venture') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="investment_facilities_Joint_Venture">
                                                Joint Venture
                                            </label>
                                        </div>
                                        @error('investment_facilities_pma')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        @error('investment_facilities_pmdn')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        @error('investment_facilities_joint_venture')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Jumlah Tenaga Kerja --}}
                                <div class="row mb-3">
                                    <label for="number_of_employees" class="col-md-4 col-form-label text-md-end">
                                        Jumlah Tenaga Kerja
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="number"
                                                class="form-control @error('number_of_employees') is-invalid @enderror"
                                                id="number_of_employees" name="number_of_employees" min="0"
                                                value="{{ old('number_of_employees') }}" required>
                                            <span class="input-group-text" id="basic-addon2">orang</span>
                                            @error('number_of_employees')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- Peraturan Kerja --}}
                                <div class="row mb-3">
                                    <label for="work_regulations" class="col-md-4 col-form-label text-md-end">
                                        Peraturan Kerja
                                    </label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input work-regulations-radio" type="radio"
                                                name="work_regulations" id="work_regulations_pp"
                                                value="Peraturan Perusahaan (PP)"
                                                {{ old('work_regulations') == 'Peraturan Perusahaan (PP)' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="work_regulations_pp">
                                                Peraturan Perusahaan (PP)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input work-regulations-radio" type="radio"
                                                name="work_regulations" id="work_regulations_pkb"
                                                value="Perjanjian Kerja Bersama (PKB)"
                                                {{ old('work_regulations') == 'Perjanjian Kerja Bersama (PKB)' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="work_regulations_pkb">
                                                Perjanjian Kerja Bersama (PKB)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input work-regulations-radio" type="radio"
                                                name="work_regulations" id="work_regulations_others" value="Lainnya"
                                                {{ old('work_regulations') == 'Lainnya' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="work_regulations_others">
                                                Lainnya, Sebutkan
                                            </label>
                                            <input type="text"
                                                class="form-control mt-1 @error('work_regulation_others') is-invalid @enderror"
                                                id="work_regulation_others" name="work_regulation_others"
                                                value="{{ old('work_regulation_others') }}"
                                                @if (old('work_regulations') != 'Lainnya') disabled @endif>
                                        </div>
                                        @error('work_regulations')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        @error('work_regulation_others')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- BPJS Kesehatan --}}
                                <div class="row mb-3">
                                    <label for="bpjs" class="col-md-4 col-form-label text-md-end">BPJS</label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="bpjs_kesehatan"
                                                id="bpjs_kesehatan" value="1"
                                                {{ old('bpjs_kesehatan') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="bpjs_kesehatan">
                                                BPJS Kesehatan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="bpjs_ketenagakerjaan"
                                                id="bpjs_ketenagakerjaan" value="1"
                                                {{ old('bpjs_ketenagakerjaan') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="bpjs_ketenagakerjaan">
                                                BPJS Ketenagakerjaan
                                            </label>
                                        </div>
                                        @error('bpjs_kesehatan')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        @error('bpjs_ketenagakerjaan')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Serikat Pekerja --}}
                                <div class="row mb-3">
                                    <label for="is_labor_union_exists" class="col-md-4 col-form-label text-md-end">
                                        Serikat Pekerja
                                    </label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_labor_union_exists"
                                                id="labor_union_Exists" value="1"
                                                {{ old('is_labor_union_exists') == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="labor_union_Exists">
                                                Ada
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_labor_union_exists"
                                                id="labor_union_Does Not Exist" value="0"
                                                {{ old('is_labor_union_exists') == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="labor_union_Does Not Exist">
                                                Belum Ada
                                            </label>
                                        </div>
                                        @error('is_labor_union_exists')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Periode Iuran --}}
                                <div class="row mb-3">
                                    <label for="monthly_contribution_period" class="col-md-4 col-form-label text-md-end">
                                        Periode Iuran
                                    </label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="monthly_contribution_period" id="monthly_contribution_period_1"
                                                value="1"
                                                {{ old('monthly_contribution_period') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="monthly_contribution_period_1">
                                                1 Bulan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="monthly_contribution_period" id="monthly_contribution_period_3"
                                                value="3"
                                                {{ old('monthly_contribution_period') == '3' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="monthly_contribution_period_3">
                                                3 Bulan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="monthly_contribution_period" id="monthly_contribution_period_6"
                                                value="6"
                                                {{ old('monthly_contribution_period') == '6' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="monthly_contribution_period_6">
                                                6 Bulan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="monthly_contribution_period" id="monthly_contribution_period_12"
                                                value="12"
                                                {{ old('monthly_contribution_period') == '12' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="monthly_contribution_period_12">
                                                12 Bulan
                                            </label>
                                        </div>
                                        <div class="form-text">
                                            *) Cut-off periode iuran dilakukan setiap bulan Desember. Invoice untuk periode
                                            6 bulan akan dikirimkan pada bulan Januari dan Juli, dan invoice untuk
                                            periode 12 bulan akan dikirimkan pada bulan Januari.
                                        </div>
                                        @error('monthly_contribution_period')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Sumber Informasi Mengenai Apindo --}}
                                <div class="row mb-3">
                                    <label for="how_they_learned_about_apindo"
                                        class="col-md-4 col-form-label text-md-end">
                                        Sumber Informasi Mengenai Apindo
                                    </label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input how-they-learned-radio" type="radio"
                                                name="how_they_learned_about_apindo"
                                                id="how_they_learned_about_apindo_website" value="Website APINDO"
                                                @if (old('how_they_learned_about_apindo') == 'Website APINDO') checked @endif>
                                            <label class="form-check-label" for="how_they_learned_about_apindo_website">
                                                Website APINDO
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input how-they-learned-radio" type="radio"
                                                name="how_they_learned_about_apindo"
                                                id="how_they_learned_about_apindo_board_member" value="Pengurus APINDO"
                                                @if (old('how_they_learned_about_apindo') == 'Pengurus APINDO') checked @endif>
                                            <label class="form-check-label"
                                                for="how_they_learned_about_apindo_board_member">
                                                Pengurus APINDO, Sebutkan
                                            </label>
                                            <input type="text"
                                                class="form-control mt-1 @error('how_they_learned_about_apindo_board_member') is-invalid @enderror"
                                                id="how_they_learned_about_apindo_board_member_input"
                                                name="how_they_learned_about_apindo_board_member"
                                                value="{{ old('how_they_learned_about_apindo_board_member') }}"
                                                placeholder="Nama Pengurus APINDO"
                                                @if (old('how_they_learned_about_apindo') != 'Pengurus APINDO') disabled @endif>
                                            @error('how_they_learned_about_apindo_board_member')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input how-they-learned-radio" type="radio"
                                                name="how_they_learned_about_apindo"
                                                id="how_they_learned_about_apindo_others" value="Lainnya"
                                                @if (old('how_they_learned_about_apindo') == 'Lainnya') checked @endif>
                                            <label class="form-check-label" for="how_they_learned_about_apindo_others">
                                                Lainnya, Sebutkan
                                            </label>
                                            <input type="text"
                                                class="form-control mt-1 @error('how_they_learned_about_apindo_others') is-invalid @enderror"
                                                id="how_they_learned_about_apindo_others_input"
                                                name="how_they_learned_about_apindo_others"
                                                value="{{ old('how_they_learned_about_apindo_others') }}"
                                                placeholder="Sumber Lainnya"
                                                @if (old('how_they_learned_about_apindo') != 'Lainnya') disabled @endif>

                                            @error('how_they_learned_about_apindo_others')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @error('how_they_learned_about_apindo')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Lampiran Pendukung Pendaftaran --}}
                                <legend class="fs-4 ps-4 pb-1 mt-4 mb-4 border-bottom">
                                    Lampiran Pendukung Pendaftaran
                                </legend>
                                {{-- Surat Pernyataan --}}
                                <div class="row mb-3">
                                    <label for="declaration_letter" class="col-md-4 col-form-label text-md-end">
                                        Surat Pernyataan
                                    </label>
                                    <div class="col-md-6">
                                        <input type="file" accept="application/pdf"
                                            class="form-control @error('declaration_letter') is-invalid @enderror"
                                            id="declaration_letter" name="declaration_letter">
                                        <div class="form-text">
                                            Ukuran Maksimal File: 5MB
                                        </div>
                                        @error('declaration_letter')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        {{-- Download template surat pernyataan --}}
                                        <a href="{{ asset('assets/templates/template_surat_pendaftaran.xlsx') }}"
                                            target="_blank">
                                            Download Template Surat Pernyataan
                                        </a>
                                    </div>
                                </div>
                                {{-- PP & PKB --}}
                                <div class="row mb-3">
                                    <label for="pp_pkb" class="col-md-4 col-form-label text-md-end">
                                        PP & PKB <br />
                                        <small class="text-muted">
                                            (Peraturan Perusahaan & Perjanjian Kerja Bersama)
                                        </small>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="file" accept="application/pdf"
                                            class="form-control @error('pp_pkb') is-invalid @enderror" id="pp_pkb"
                                            name="pp_pkb">
                                        <div class="form-text">
                                            Ukuran Maksimal File: 5MB
                                        </div>
                                        @error('pp_pkb')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Profil Perusahaan --}}
                                <div class="row mb-3">
                                    <label for="company_profile" class="col-md-4 col-form-label text-md-end">
                                        Profil Perusahaan
                                    </label>
                                    <div class="col-md-6">
                                        <input type="file" accept="application/pdf"
                                            class="form-control @error('company_profile') is-invalid @enderror"
                                            id="company_profile" name="company_profile">
                                        <div class="form-text">
                                            Ukuran Maksimal File: 5MB
                                        </div>
                                        @error('company_profile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- TDP --}}
                                <div class="row mb-3">
                                    <label for="tdp" class="col-md-4 col-form-label text-md-end">
                                        TDP <br />
                                        <small class="text-muted">
                                            (Tanda Daftar Perusahaan)
                                        </small>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="file" accept="application/pdf"
                                            class="form-control @error('tdp') is-invalid @enderror" id="tdp"
                                            name="tdp">
                                        <div class="form-text">
                                            Ukuran Maksimal File: 5MB
                                        </div>
                                        @error('tdp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <legend class="fs-4 ps-4 pb-1 mt-4 mb-4 border-bottom">
                                    Profil & Akun PIC (Person in Charge)
                                </legend>
                                {{-- Contact Person --}}
                                <div class="row mb-3">
                                    <label for="contact_person" class="col-md-4 col-form-label text-md-end">
                                        Contact Person
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text"
                                            class="form-control @error('contact_person') is-invalid @enderror"
                                            id="contact_person" name="contact_person"
                                            value="{{ old('contact_person') }}" required>
                                        @error('contact_person')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- No. Handphone --}}
                                <div class="row mb-3">
                                    <label for="mobile_number" class="col-md-4 col-form-label text-md-end">
                                        No. Handphone
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text"
                                            class="form-control @error('mobile_number') is-invalid @enderror"
                                            id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"
                                            required>
                                        @error('mobile_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Email --}}
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">
                                        Email
                                    </label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Password --}}
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">
                                        Password
                                    </label>
                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Konfirmasi Password --}}
                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                                        Konfirmasi Password
                                    </label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary px-4">
                                            Kirim
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                    <div class="card-footer">
                        <div class="text-center">
                            Sudah Punya Akun? <a href="{{ route('login') }}">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Work Regulations Radio Button Logic (Keep this, as it is used for other form)
            const workRegulationsRadios = document.querySelectorAll('.work-regulations-radio');
            const workRegulationOthersTextbox = document.getElementById('work_regulation_others');

            workRegulationsRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    workRegulationOthersTextbox.disabled = this.value !== 'Lainnya';
                    if (this.value !== 'Lainnya') {
                        workRegulationOthersTextbox.value = '';
                    }
                });
            });

            // Initially disable/enable textboxes based on the currently selected radio button (for edit mode)
            const initiallySelectedWorkRegulation = document.querySelector('.work-regulations-radio:checked');
            if (initiallySelectedWorkRegulation) {
                workRegulationOthersTextbox.disabled = initiallySelectedWorkRegulation.value !== 'Lainnya';
            }

            // How They Learned About APINDO Radio Button Logic
            const howTheyLearnedRadios = document.querySelectorAll('.how-they-learned-radio');
            const apindoBoardMemberTextbox = document.getElementById(
                'how_they_learned_about_apindo_board_member_input');
            const apindoOthersTextbox = document.getElementById('how_they_learned_about_apindo_others_input');

            howTheyLearnedRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    apindoBoardMemberTextbox.disabled = this.value !== 'Pengurus APINDO';
                    apindoOthersTextbox.disabled = this.value !== 'Lainnya';

                    // Clear the textbox values when they are disabled
                    if (this.value !== 'Pengurus APINDO') {
                        apindoBoardMemberTextbox.value = '';
                    }
                    if (this.value !== 'Lainnya') {
                        apindoOthersTextbox.value = '';
                    }
                });
            });
            // Initially disable/enable textboxes based on the currently selected radio button (for edit mode)

            const initiallySelectedHowTheyLearned = document.querySelector('.how-they-learned-radio:checked');
            if (initiallySelectedHowTheyLearned) {
                apindoBoardMemberTextbox.disabled = initiallySelectedHowTheyLearned.value !== 'Pengurus APINDO';
                apindoOthersTextbox.disabled = initiallySelectedHowTheyLearned.value !== 'Lainnya';
            }

        });
    </script>
@endpush
