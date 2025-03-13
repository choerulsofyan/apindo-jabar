@extends('admin.layouts.app')

@section('title', 'Detail Anggota')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Anggota',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Anggota', 'url' => route('mindo.members.index')],
            ['name' => 'Detail', 'url' => '#'],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Detail Anggota</h3>
                </div>

                <div class="card-body">
                    <dl class="row mb-0">
                        <!-- Company Information -->
                        <dt class="col-sm-3 text-muted">Nama Perusahaan</dt>
                        <dd class="col-sm-9">{{ $member->company_name }}</dd>

                        <dt class="col-sm-3 text-muted">Alamat Perusahaan</dt>
                        <dd class="col-sm-9">{{ $member->company_address }}</dd>

                        <dt class="col-sm-3 text-muted">Kota</dt>
                        <dd class="col-sm-9">{{ $member->city }}</dd>

                        <dt class="col-sm-3 text-muted">Kode Pos</dt>
                        <dd class="col-sm-9">{{ $member->postal_code }}</dd>

                        <dt class="col-sm-3 text-muted">Nomor Telepon</dt>
                        <dd class="col-sm-9">{{ $member->phone_number }}</dd>

                        <dt class="col-sm-3 text-muted">Fax</dt>
                        <dd class="col-sm-9">{{ $member->fax ?? 'N/A' }}</dd>

                        <dt class="col-sm-3 text-muted">Website</dt>
                        <dd class="col-sm-9">
                            @if ($member->website)
                                <a href="{{ $member->website }}" target="_blank">{{ $member->website }}</a>
                            @else
                                N/A
                            @endif
                        </dd>

                        <dt class="col-sm-3 text-muted">Email</dt>
                        <dd class="col-sm-9">{{ $member->email }}</dd>

                        <!-- Business Information -->
                        <dt class="col-sm-3 text-muted">KLBI</dt>
                        <dd class="col-sm-9">{{ $member->klbi }}</dd>

                        <dt class="col-sm-3 text-muted">Aktivitas Bisnis Lainnya</dt>
                        <dd class="col-sm-9">{{ $member->other_business_activities ?? 'N/A' }}</dd>

                        <dt class="col-sm-3 text-muted">Status Perusahaan</dt>
                        <dd class="col-sm-9">{{ $member->company_status }}</dd>

                        <dt class="col-sm-3 text-muted">Fasilitas Investasi</dt>
                        <dd class="col-sm-9">{{ $member->investment_facilities ?? 'N/A' }}</dd>

                        <dt class="col-sm-3 text-muted">Jumlah Karyawan</dt>
                        <dd class="col-sm-9">{{ $member->number_of_employees }}</dd>

                        <!-- Work Regulations -->
                        <dt class="col-sm-3 text-muted">Peraturan Kerja</dt>
                        <dd class="col-sm-9">{{ $member->work_regulations }}</dd>

                        @if ($member->work_regulations == 'Others' && $member->work_regulation_others)
                            <dt class="col-sm-3 text-muted">Peraturan Kerja Lainnya</dt>
                            <dd class="col-sm-9">{{ $member->work_regulation_others }}</dd>
                        @endif

                        <!-- BPJS and Labor Union -->
                        <dt class="col-sm-3 text-muted">BPJS</dt>
                        <dd class="col-sm-9">{{ $member->bpjs ?? 'N/A' }}</dd>

                        <dt class="col-sm-3 text-muted">Serikat Pekerja</dt>
                        <dd class="col-sm-9">{{ $member->labor_union }}</dd>

                        <!-- Contribution and Learning About APINDO -->
                        <dt class="col-sm-3 text-muted">Periode Kontribusi</dt>
                        <dd class="col-sm-9">{{ $member->contribution_period }}</dd>

                        <dt class="col-sm-3 text-muted">Cara Mengetahui APINDO</dt>
                        <dd class="col-sm-9">{{ $member->how_they_learned_about_apindo }}</dd>

                        @if (
                            $member->how_they_learned_about_apindo == 'APINDO Board Member' &&
                                $member->how_they_learned_about_apindo_board_member)
                            <dt class="col-sm-3 text-muted">Anggota Dewan APINDO</dt>
                            <dd class="col-sm-9">{{ $member->how_they_learned_about_apindo_board_member }}</dd>
                        @endif

                        @if ($member->how_they_learned_about_apindo == 'Others' && $member->how_they_learned_about_apindo_others)
                            <dt class="col-sm-3 text-muted">Sumber Lainnya</dt>
                            <dd class="col-sm-9">{{ $member->how_they_learned_about_apindo_others }}</dd>
                        @endif

                        <!-- Contact Person -->
                        <dt class="col-sm-3 text-muted">Kontak Person</dt>
                        <dd class="col-sm-9">{{ $member->contact_person }}</dd>

                        <dt class="col-sm-3 text-muted">Nomor HP</dt>
                        <dd class="col-sm-9">{{ $member->mobile_number }}</dd>

                        <!-- User -->
                        <dt class="col-sm-3 text-muted">Pengguna</dt>
                        <dd class="col-sm-9">{{ $member->user->name ?? 'N/A' }}</dd>

                        <!-- Documents -->
                        <dt class="col-sm-3 text-muted">Surat Pernyataan</dt>
                        <dd class="col-sm-9">
                            @if ($member->declaration_letter)
                                <a href="{{ Storage::url('public/members/declaration_letter/' . $member->declaration_letter) }}"
                                    target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-pdf me-2"></i> Lihat Surat Pernyataan
                                </a>
                            @else
                                N/A
                            @endif
                        </dd>

                        <dt class="col-sm-3 text-muted">PP & PKB</dt>
                        <dd class="col-sm-9">
                            @if ($member->pp_pkb)
                                <a href="{{ Storage::url('public/members/pp_pkb/' . $member->pp_pkb) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-pdf me-2"></i> Lihat PP & PKB
                                </a>
                            @else
                                N/A
                            @endif
                        </dd>

                        <dt class="col-sm-3 text-muted">Profil Perusahaan</dt>
                        <dd class="col-sm-9">
                            @if ($member->company_profile)
                                <a href="{{ Storage::url('public/members/company_profile/' . $member->company_profile) }}"
                                    target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-pdf me-2"></i> Lihat Profil Perusahaan
                                </a>
                            @else
                                N/A
                            @endif
                        </dd>

                        <dt class="col-sm-3 text-muted">TDP</dt>
                        <dd class="col-sm-9">
                            @if ($member->tdp)
                                <a href="{{ Storage::url('public/members/tdp/' . $member->tdp) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-pdf me-2"></i> Lihat TDP
                                </a>
                            @else
                                N/A
                            @endif
                        </dd>

                        <!-- Timestamps -->
                        <dt class="col-sm-3 text-muted">Dibuat Pada</dt>
                        <dd class="col-sm-9">
                            {{ $member->created_at->translatedFormat('d F Y H:i') }}
                        </dd>

                        <dt class="col-sm-3 text-muted">Diupdate Pada</dt>
                        <dd class="col-sm-9">
                            {{ $member->updated_at->translatedFormat('d F Y H:i') }}
                        </dd>
                    </dl>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('mindo.members.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
