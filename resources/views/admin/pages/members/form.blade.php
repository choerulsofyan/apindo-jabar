@extends('admin.layouts.app')

@section('title', isset($member) ? 'Edit Member' : 'Add Member')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Anggota',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Anggota', 'url' => route('mindo.members.index')],
            [
                'name' => isset($regulation) ? 'Edit Anggota' : 'Tambah Anggota Baru',
                'url' => isset($regulation)
                    ? route('mindo.members.edit', $regulation->id)
                    : route('mindo.members.create'),
            ],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ isset($member) ? route('mindo.members.update', $member->id) : route('mindo.members.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($member))
                    @method('PATCH')
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">{{ isset($member) ? 'Edit Member' : 'Add Member' }}</h3>
                    </div>
                    <div class="card-body">
                        {{-- Tipe Anggota --}}
                        <div class="row mb-3">
                            <label for="is_extraordinary_member" class="col-sm-2 text-md-end col-form-label">
                                Tipe Anggota
                            </label>
                            <div class="col-sm-10">
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
                            <label for="company_name" class="col-sm-2 text-md-end col-form-label">
                                Nama Perusahaan
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                    id="company_name" name="company_name"
                                    value="{{ old('company_name', $member->company_name ?? '') }}" required>
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Alamat Perusahaan --}}
                        <div class="row mb-3">
                            <label for="company_address" class="col-sm-2 text-md-end col-form-label">
                                Alamat Perusahaan <br />
                                <small class="text-muted">
                                    (Akan tercetak di sertifikat anggota dan sebagai korespondensi)
                                </small>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('company_address') is-invalid @enderror" id="company_address"
                                    name="company_address" rows="3" required>{{ old('company_address', $member->company_address ?? '') }}</textarea>
                                @error('company_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Kota/Kabupaten --}}
                        <div class="row mb-3">
                            <label for="city" class="col-sm-2 text-md-end col-form-label">
                                Kota/Kabupaten
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    id="city" name="city" value="{{ old('city', $member->city ?? '') }}" required>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Kode Pos --}}
                        <div class="row mb-3">
                            <label for="postal_code" class="col-sm-2 text-md-end col-form-label">
                                Kode Pos
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                    id="postal_code" name="postal_code"
                                    value="{{ old('postal_code', $member->postal_code ?? '') }}" required>
                                @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- No. Telepon --}}
                        <div class="row mb-3">
                            <label for="phone_number" class="col-sm-2 text-md-end col-form-label">
                                No. Telepon
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                    id="phone_number" name="phone_number"
                                    value="{{ old('phone_number', $member->phone_number ?? '') }}" required>
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Fax --}}
                        <div class="row mb-3">
                            <label for="fax" class="col-sm-2 text-md-end col-form-label">
                                Fax
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('fax') is-invalid @enderror" id="fax"
                                    name="fax" value="{{ old('fax', $member->fax ?? '') }}">
                                @error('fax')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Website --}}
                        <div class="row mb-3">
                            <label for="website" class="col-sm-2 text-md-end col-form-label">
                                Website
                            </label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control @error('website') is-invalid @enderror"
                                    id="website" name="website" value="{{ old('website', $member->website ?? '') }}">
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Email CP/Email Perusahaan --}}
                        <div class="row mb-3">
                            <label for="company_email" class="col-sm-2 text-md-end col-form-label">
                                Email CP/Email Perusahaan
                            </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control @error('company_email') is-invalid @enderror"
                                    id="company_email" name="company_email"
                                    value="{{ old('company_email', $member->company_email ?? '') }}" required>
                                @error('company_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- KLBI --}}
                        <div class="row mb-3">
                            <label for="klbi" class="col-sm-2 text-md-end col-form-label">
                                KLBI
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('klbi') is-invalid @enderror"
                                    id="klbi" name="klbi" value="{{ old('klbi', $member->klbi ?? '') }}"
                                    required>
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
                            <label for="other_business_activities" class="col-sm-2 text-md-end col-form-label">
                                Kegiatan Usaha Lainnya
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('other_business_activities') is-invalid @enderror" id="other_business_activities"
                                    name="other_business_activities" rows="3">{{ old('other_business_activities', $member->other_business_activities ?? '') }}</textarea>
                                @error('other_business_activities')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Status Perusahaan --}}
                        <div class="row mb-3">
                            <label for="company_status" class="col-sm-2 text-md-end col-form-label">Status
                                Perusahaan</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="company_status"
                                        id="company_status_bumn" value="BUMN"
                                        {{ old('company_status', $member->company_status ?? '') == 'BUMN' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="company_status_bumn">
                                        BUMN
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="company_status"
                                        id="company_status_bumd" value="BUMD"
                                        {{ old('company_status', $member->company_status ?? '') == 'BUMD' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="company_status_bumd">
                                        BUMD
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="company_status"
                                        id="company_status_swasta_nasional" value="Swasta Nasional"
                                        {{ old('company_status', $member->company_status ?? '') == 'Swasta Nasional' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="company_status_swasta_nasional">
                                        Swasta Nasional
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="company_status"
                                        id="company_status_swasta_asing" value="Swasta Asing"
                                        {{ old('company_status', $member->company_status ?? '') == 'Swasta Asing' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="company_status_swasta_asing">
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
                            <label for="investment_facilities" class="col-sm-2 text-md-end col-form-label">
                                Fasilitas Investasi
                            </label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="investment_facilities[]"
                                        id="investment_facilities_PMA" value="PMA"
                                        {{ in_array('PMA', old('investment_facilities', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="investment_facilities_PMA">
                                        PMA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="investment_facilities[]"
                                        id="investment_facilities_PMDN" value="PMDN"
                                        {{ in_array('PMDN', old('investment_facilities', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="investment_facilities_PMDN">
                                        PMDN
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="investment_facilities[]"
                                        id="investment_facilities_Joint_Venture" value="Joint Venture"
                                        {{ in_array('Joint Venture', old('investment_facilities', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="investment_facilities_Joint_Venture">
                                        Joint Venture
                                    </label>
                                </div>
                                @error('investment_facilities')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Jumlah Tenaga Kerja --}}
                        <div class="row mb-3">
                            <label for="number_of_employees" class="col-sm-2 text-md-end col-form-label">
                                Jumlah Tenaga Kerja
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="number"
                                        class="form-control @error('number_of_employees') is-invalid @enderror"
                                        id="number_of_employees" name="number_of_employees"
                                        value="{{ old('number_of_employees', $member->number_of_employees ?? '') }}"
                                        required>
                                    <span class="input-group-text" id="basic-addon2">orang</span>
                                    @error('number_of_employees')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Peraturan Kerja --}}
                        <div class="row mb-3">
                            <label for="work_regulations" class="col-sm-2 text-md-end col-form-label">
                                Peraturan Kerja
                            </label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input work-regulations-radio" type="radio"
                                        name="work_regulations" id="work_regulations_pp"
                                        value="Peraturan Perusahaan (PP)"
                                        {{ old('work_regulations', $member->work_regulations ?? '') == 'Peraturan Perusahaan (PP)' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="work_regulations_pp">
                                        Peraturan Perusahaan (PP)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input work-regulations-radio" type="radio"
                                        name="work_regulations" id="work_regulations_pkb"
                                        value="Perjanjian Kerja Bersama (PKB)"
                                        {{ old('work_regulations', $member->work_regulations ?? '') == 'Perjanjian Kerja Bersama (PKB)' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="work_regulations_pkb">
                                        Perjanjian Kerja Bersama (PKB)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input work-regulations-radio" type="radio"
                                        name="work_regulations" id="work_regulations_others" value="Lainnya"
                                        {{ old('work_regulations', $member->work_regulations ?? '') == 'Lainnya' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="work_regulations_others">
                                        Lainnya, Sebutkan
                                    </label>
                                    <input type="text"
                                        class="form-control mt-1 @error('work_regulation_others') is-invalid @enderror"
                                        id="work_regulation_others" name="work_regulation_others"
                                        value="{{ old('work_regulation_others', $member->work_regulation_others ?? '') }}"
                                        @if (old('work_regulations', $member->work_regulations ?? '') != 'Lainnya') disabled @endif>
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
                            <label for="bpjs" class="col-sm-2 text-md-end col-form-label">BPJS</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="bpjs[]" id="bpjs_kesehatan"
                                        value="BPJS Kesehatan"
                                        {{ in_array('BPJS Kesehatan', old('bpjs', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bpjs_kesehatan">
                                        BPJS Kesehatan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="bpjs[]"
                                        id="bpjs_ketenagakerjaan" value="BPJS Ketenagakerjaan"
                                        {{ in_array('BPJS Ketenagakerjaan', old('bpjs', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bpjs_ketenagakerjaan">
                                        BPJS Ketenagakerjaan
                                    </label>
                                </div>
                                @error('bpjs')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Serikat Pekerja --}}
                        <div class="row mb-3">
                            <label for="is_labor_union_exists" class="col-sm-2 text-md-end col-form-label">
                                Serikat Pekerja
                            </label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_labor_union_exists"
                                        id="labor_union_Exists" value="Ada"
                                        {{ old('is_labor_union_exists', $member->is_labor_union_exists ?? '') == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="labor_union_Exists">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_labor_union_exists"
                                        id="labor_union_Does Not Exist" value="Belum Ada"
                                        {{ old('is_labor_union_exists', $member->is_labor_union_exists ?? '') == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="labor_union_Does Not Exist">
                                        Belum Ada
                                    </label>
                                </div>
                                @error('is_labor_union_exists')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Periode Iuran --}}
                        <div class="row mb-3">
                            <label for="monthly_contribution_period" class="col-sm-2 text-md-end col-form-label">
                                Periode Iuran
                            </label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="monthly_contribution_period"
                                        id="contribution_period_1" value="1"
                                        {{ old('monthly_contribution_period', $member->monthly_contribution_period ?? '') == '1 Bulan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="contribution_period_1">
                                        1 Bulan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="monthly_contribution_period"
                                        id="contribution_period_3" value="3"
                                        {{ old('monthly_contribution_period', $member->monthly_contribution_period ?? '') == '3 Bulan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="contribution_period_3">
                                        3 Bulan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="monthly_contribution_period"
                                        id="contribution_period_6" value="6"
                                        {{ old('monthly_contribution_period', $member->monthly_contribution_period ?? '') == '6 Bulan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="contribution_period_6">
                                        6 Bulan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="monthly_contribution_period"
                                        id="contribution_period_12" value="12"
                                        {{ old('monthly_contribution_period', $member->monthly_contribution_period ?? '') == '12 Bulan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="contribution_period_12">
                                        12 Bulan
                                    </label>
                                </div>
                                <div class="form-text">
                                    *) Cut-off periode iuran dilakukan setiap bulan Desember. Invoice untuk periode
                                    6 bulan akan dikirimkan pada bulan Januari dan Juli, dan invoice untuk
                                    periode 12 bulan akan dikirimkan pada bulan Januari.
                                </div>
                                @error('monthly_contribution_period')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Sumber Informasi Mengenai Apindo --}}
                        <div class="row mb-3">
                            <label for="how_they_learned_about_apindo" class="col-sm-2 text-md-end col-form-label">
                                Sumber Informasi Mengenai Apindo
                            </label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input how-they-learned-radio" type="radio"
                                        name="how_they_learned_about_apindo" id="how_they_learned_website"
                                        value="Website APINDO"
                                        {{ old('how_they_learned_about_apindo') == 'Website APINDO' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="how_they_learned_website">
                                        Website APINDO
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input how-they-learned-radio" type="radio"
                                        name="how_they_learned_about_apindo" id="how_they_learned_board"
                                        value="Pengurus APINDO"
                                        {{ old('how_they_learned_about_apindo') == 'Pengurus APINDO' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="how_they_learned_board">
                                        Pengurus APINDO, Sebutkan
                                    </label>
                                    <input type="text"
                                        class="form-control mt-1 @error('how_they_learned_about_apindo_board_member') is-invalid @enderror"
                                        id="how_they_learned_about_apindo_board_member"
                                        name="how_they_learned_about_apindo_board_member"
                                        value="{{ old('how_they_learned_about_apindo_board_member') }}"
                                        placeholder="Nama Pengurus APINDO"
                                        @if (old('how_they_learned_about_apindo') != 'Pengurus APINDO') disabled @endif>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input how-they-learned-radio" type="radio"
                                        name="how_they_learned_about_apindo" id="how_they_learned_others" value="Lainnya"
                                        {{ old('how_they_learned_about_apindo') == 'Lainnya' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="how_they_learned_others">
                                        Lainnya, Sebutkan
                                    </label>
                                    <input type="text"
                                        class="form-control mt-1 @error('how_they_learned_about_apindo_others') is-invalid @enderror"
                                        id="how_they_learned_about_apindo_others"
                                        name="how_they_learned_about_apindo_others"
                                        value="{{ old('how_they_learned_about_apindo_others') }}"
                                        placeholder="Sumber Lainnya" @if (old('how_they_learned_about_apindo') != 'Lainnya') disabled @endif>
                                </div>

                                @error('how_they_learned_about_apindo')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @error('how_they_learned_about_apindo_board_member')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @error('how_they_learned_about_apindo_others')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Lampiran Pendukung Pendaftaran --}}
                        <legend class="fs-4 pb-1 mt-4 mb-4 border-bottom">
                            Lampiran Pendukung Pendaftaran
                        </legend>
                        {{-- Surat Pernyataan --}}
                        <div class="row mb-3">
                            <label for="declaration_letter" class="col-sm-2 text-md-end col-form-label">
                                Surat Pernyataan
                            </label>
                            <div class="col-sm-10">
                                @if (isset($member) && $member->declaration_letter)
                                    @if ($declaration_letter_url)
                                        <a href="{{ $declaration_letter_url }}" target="_blank" class="d-block mb-2">
                                            <i class="fa fa-file-pdf"></i>
                                            {{ $member->declaration_letter }}
                                        </a>
                                    @else
                                        <p>File not found.</p>
                                    @endif
                                @endif
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
                            <label for="pp_pkb" class="col-sm-2 text-md-end col-form-label">
                                PP & PKB <br />
                                <small class="text-muted">
                                    (Peraturan Perusahaan & Perjanjian Kerja Bersama)
                                </small>
                            </label>
                            <div class="col-sm-10">
                                @if (isset($member) && $member->pp_pkb)
                                    @if ($pp_pkb_url)
                                        <a href="{{ $pp_pkb_url }}" target="_blank" class="d-block mb-2">
                                            <i class="fa fa-file-pdf"></i>
                                            {{ $member->pp_pkb }}
                                        </a>
                                    @else
                                        <p>File not found.</p>
                                    @endif
                                @endif
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
                            <label for="company_profile" class="col-sm-2 text-md-end col-form-label">
                                Profil Perusahaan
                            </label>
                            <div class="col-sm-10">
                                @if (isset($member) && $member->company_profile)
                                    @if ($company_profile_url)
                                        <a href="{{ $company_profile_url }}" target="_blank" class="d-block mb-2">
                                            <i class="fa fa-file-pdf"></i>
                                            {{ $member->company_profile }}
                                        </a>
                                    @else
                                        <p>File not found.</p>
                                    @endif
                                @endif
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
                            <label for="tdp" class="col-sm-2 text-md-end col-form-label">
                                TDP <br />
                                <small class="text-muted">
                                    (Tanda Daftar Perusahaan)
                                </small>
                            </label>
                            <div class="col-sm-10">
                                @if (isset($member) && $member->tdp)
                                    @if ($tdp_url)
                                        <a href="{{ $tdp_url }}" target="_blank" class="d-block mb-2">
                                            <i class="fa fa-file-pdf"></i>
                                            {{ $member->tdp }}
                                        </a>
                                    @else
                                        <p>File not found.</p>
                                    @endif
                                @endif
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
                        <legend class="fs-4 pb-1 mt-4 mb-4 border-bottom">
                            Profil & Akun PIC (Person in Charge)
                        </legend>
                        {{-- Contact Person --}}
                        <div class="row mb-3">
                            <label for="contact_person" class="col-sm-2 text-md-end col-form-label">Contact Person</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                                    id="contact_person" name="contact_person"
                                    value="{{ old('contact_person', $member->contact_person ?? '') }}" required>
                                @error('contact_person')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- No. Handphone --}}
                        <div class="row mb-3">
                            <label for="mobile_number" class="col-sm-2 text-md-end col-form-label">
                                No. Handphone
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror"
                                    id="mobile_number" name="mobile_number"
                                    value="{{ old('mobile_number', $member->mobile_number ?? '') }}" required>
                                @error('mobile_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="create_new_user" value="1">

                        {{-- Email --}}
                        <div class="row mb-3">
                            <label for="new_user_email" class="col-sm-2 text-md-end col-form-label">
                                Email
                            </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control @error('new_user_email') is-invalid @enderror"
                                    id="new_user_email" name="new_user_email"
                                    value="{{ old('new_user_email', $user->email ?? '') }}">
                                @error('new_user_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Password --}}
                        <div class="row mb-3">
                            <label for="new_user_password" class="col-sm-2 text-md-end col-form-label">
                                Password
                            </label>
                            <div class="col-sm-10">
                                <input type="password"
                                    class="form-control @error('new_user_password') is-invalid @enderror"
                                    id="new_user_password" name="new_user_password">
                                @error('new_user_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">Save</button>
                    <a href="{{ route('mindo.members.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Work Regulations Radio Button Logic
            const workRegulationsRadios = document.querySelectorAll('.work-regulations-radio');
            const workRegulationOthersTextbox = document.getElementById('work_regulation_others');

            workRegulationsRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    workRegulationOthersTextbox.disabled = this.value !== 'Others';
                    if (this.value !== 'Others') {
                        workRegulationOthersTextbox.value = '';
                    }
                });
            });

            // How They Learned About APINDO Radio Button Logic
            const howTheyLearnedRadios = document.querySelectorAll('.how-they-learned-radio');
            const apindoBoardMemberTextbox = document.getElementById('how_they_learned_about_apindo_board_member');
            const apindoOthersTextbox = document.getElementById('how_they_learned_about_apindo_others');

            howTheyLearnedRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    apindoBoardMemberTextbox.disabled = this.value !== 'Others';
                    apindoOthersTextbox.disabled = this.value !== 'Others';

                    // Clear the textbox values when they are disabled
                    if (this.value !== 'Others') {
                        apindoOthersTextbox.value = '';
                        apindoBoardMemberTextbox.value = '';
                    }
                });
            });

            // Initially disable/enable textboxes based on the currently selected radio button (for edit mode)
            const initiallySelectedWorkRegulation = document.querySelector('.work-regulations-radio:checked');
            if (initiallySelectedWorkRegulation) {
                workRegulationOthersTextbox.disabled = initiallySelectedWorkRegulation.value !== 'Others';
            }

            const initiallySelectedHowTheyLearned = document.querySelector('.how-they-learned-radio:checked');
            if (initiallySelectedHowTheyLearned) {
                apindoBoardMemberTextbox.disabled = initiallySelectedHowTheyLearned.value !== 'Others';
                apindoOthersTextbox.disabled = initiallySelectedHowTheyLearned.value !== 'Others';
            }
        });
    </script>
@endpush
