@extends('public.layouts.app')

@section('title', 'Pendaftaran Anggota - APINDO Jawa Barat')
@section('meta_description', Str::limit(strip_tags('Pendaftaran anggota baru APINDO Jawa Barat'), 155))

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Formulir Pendaftaran Anggota</div>

                    <div class="card-body">
                        {{-- Keanggotaan Description --}}
                        <div class="mb-4">
                            <h3 class="mb-3">Keanggotaan APINDO</h3>
                            <p>Jenis Keanggotaan:</p>
                            <ol>
                                <li>
                                    <strong>Anggota Biasa (AB)</strong> adalah perusahaan berbentuk persekutuan atau badan
                                    hukum milik swasta dan koperasi maupun milik perseorangan yang didirikan dan menjalankan
                                    usahanya secara tetap dan terus-menerus serta sudah memenuhi ketentuan sesuai peraturan
                                    perundang-undangan yang berlaku. Anggota Biasa mendaftar melalui Dewan Pimpinan
                                    Kabupaten/
                                    Kota atau Dewan Pimpinan Provinsi sesuai domisili perusahaan.
                                </li>
                                <li>
                                    <strong>Anggota Luar Biasa (ALB)</strong> adalah perusahaan berbentuk persekutuan atau
                                    badan hukum milik negara dan milik swasta yang didirikan dan menjalankan usahanya
                                    secara
                                    tetap dan terus-menerus serta sudah memenuhi ketentuan sesuai peraturan
                                    perundang-undangan yang berlaku. ALB mendaftar melalui Dewan Pimpinan Nasional dan/
                                    atau Dewan Pimpinan Provinsi sesuai domisili perusahaan.
                                </li>
                            </ol>
                        </div>

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- Member Type --}}
                            <div class="row mb-3">
                                <label for="member_type" class="col-md-4 col-form-label text-md-end">Jenis
                                    Keanggotaan</label>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="member_type"
                                            id="member_type_biasa" value="biasa" checked>
                                        <label class="form-check-label" for="member_type_biasa">
                                            Anggota Biasa
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="member_type"
                                            id="member_type_luar_biasa" value="luar_biasa">
                                        <label class="form-check-label" for="member_type_luar_biasa">
                                            Anggota Luar Biasa
                                        </label>
                                    </div>
                                    @error('member_type')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Other fields --}}

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
