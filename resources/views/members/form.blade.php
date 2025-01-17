@extends('layouts.admin')

@section('title', isset($member) ? 'Edit Member' : 'Add Member')

@section('subheader')
    @include('partials.admin.subheader', [
        'title' => 'Manajemen Anggota',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Manajemen Anggota', 'url' => route('members.index')],
            [
                'name' => isset($regulation) ? 'Edit Anggota' : 'Tambah Anggota Baru',
                'url' => isset($regulation) ? route('members.edit', $regulation->id) : route('members.create'),
            ],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ isset($member) ? route('members.update', $member->id) : route('members.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if (isset($member))
                    @method('PATCH')
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">{{ isset($member) ? 'Edit Member' : 'Add Member' }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                    id="company_name" name="company_name"
                                    value="{{ old('company_name', $member->company_name ?? '') }}" required>
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company_address" class="col-sm-2 col-form-label">Company Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('company_address') is-invalid @enderror" id="company_address"
                                    name="company_address" rows="3" required>{{ old('company_address', $member->company_address ?? '') }}</textarea>
                                @error('company_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    id="city" name="city" value="{{ old('city', $member->city ?? '') }}" required>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="postal_code" class="col-sm-2 col-form-label">Postal Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                    id="postal_code" name="postal_code"
                                    value="{{ old('postal_code', $member->postal_code ?? '') }}" required>
                                @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                    id="phone_number" name="phone_number"
                                    value="{{ old('phone_number', $member->phone_number ?? '') }}" required>
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fax" class="col-sm-2 col-form-label">Fax</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('fax') is-invalid @enderror" id="fax"
                                    name="fax" value="{{ old('fax', $member->fax ?? '') }}">
                                @error('fax')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="website" class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control @error('website') is-invalid @enderror"
                                    id="website" name="website" value="{{ old('website', $member->website ?? '') }}">
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $member->email ?? '') }}"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="klbi" class="col-sm-2 col-form-label">KLBI</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('klbi') is-invalid @enderror"
                                    id="klbi" name="klbi" value="{{ old('klbi', $member->klbi ?? '') }}" required>
                                @error('klbi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="other_business_activities" class="col-sm-2 col-form-label">Other Business
                                Activities</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('other_business_activities') is-invalid @enderror" id="other_business_activities"
                                    name="other_business_activities" rows="3">{{ old('other_business_activities', $member->other_business_activities ?? '') }}</textarea>
                                @error('other_business_activities')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company_status" class="col-sm-2 col-form-label">Company Status</label>
                            <div class="col-sm-10">
                                @php
                                    $companyStatusOptions = ['BUMN', 'BUMD', 'Private National', 'Foreign Private'];
                                    $selectedCompanyStatus = old('company_status', $member->company_status ?? '');
                                @endphp
                                @foreach ($companyStatusOptions as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="company_status"
                                            id="company_status_{{ $option }}" value="{{ $option }}"
                                            @if ($selectedCompanyStatus == $option) checked @endif>
                                        <label class="form-check-label" for="company_status_{{ $option }}">
                                            {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('company_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="investment_facilities" class="col-sm-2 col-form-label">Investment
                                Facilities</label>
                            <div class="col-sm-10">
                                @php
                                    $investmentOptions = ['PMA', 'PMDN', 'Joint Venture'];
                                    $selectedInvestments = old(
                                        'investment_facilities',
                                        $member->investment_facilities ?? '',
                                    );
                                    $selectedInvestmentsArray = $selectedInvestments
                                        ? explode(', ', $selectedInvestments)
                                        : [];
                                @endphp
                                @foreach ($investmentOptions as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="investment_facilities[]"
                                            id="investment_facilities_{{ $option }}" value="{{ $option }}"
                                            @if (in_array($option, $selectedInvestmentsArray)) checked @endif>
                                        <label class="form-check-label" for="investment_facilities_{{ $option }}">
                                            {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('investment_facilities')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="number_of_employees" class="col-sm-2 col-form-label">Number of Employees</label>
                            <div class="col-sm-10">
                                <input type="number"
                                    class="form-control @error('number_of_employees') is-invalid @enderror"
                                    id="number_of_employees" name="number_of_employees"
                                    value="{{ old('number_of_employees', $member->number_of_employees ?? '') }}" required>
                                @error('number_of_employees')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="work_regulations" class="col-sm-2 col-form-label">Work Regulations</label>
                            <div class="col-sm-10">
                                @php
                                    $workRegulationOptions = [
                                        'Company Regulations (PP)',
                                        'Collective Labor Agreement (PKB)',
                                        'Others',
                                    ];
                                    $selectedWorkRegulation = old('work_regulations', $member->work_regulations ?? '');
                                @endphp
                                @foreach ($workRegulationOptions as $option)
                                    <div class="form-check">
                                        <input class="form-check-input work-regulations-radio" type="radio"
                                            name="work_regulations" id="work_regulations_{{ $option }}"
                                            value="{{ $option }}" @if ($selectedWorkRegulation == $option) checked @endif>
                                        <label class="form-check-label" for="work_regulations_{{ $option }}">
                                            {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                                <input type="text"
                                    class="form-control mt-2 @error('work_regulation_others') is-invalid @enderror"
                                    id="work_regulation_others" name="work_regulation_others"
                                    value="{{ old('work_regulation_others', $member->work_regulation_others ?? '') }}"
                                    @if ($selectedWorkRegulation != 'Others') disabled @endif>
                                @error('work_regulations')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('work_regulation_others')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bpjs" class="col-sm-2 col-form-label">BPJS</label>
                            <div class="col-sm-10">
                                @php
                                    $bpjsOptions = ['BPJS Health', 'BPJS Employment'];
                                    $selectedBpjs = old('bpjs', $member->bpjs ?? '');
                                    $selectedBpjsArray = $selectedBpjs ? explode(', ', $selectedBpjs) : [];
                                @endphp
                                @foreach ($bpjsOptions as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="bpjs[]"
                                            id="bpjs_{{ $option }}" value="{{ $option }}"
                                            @if (in_array($option, $selectedBpjsArray)) checked @endif>
                                        <label class="form-check-label" for="bpjs_{{ $option }}">
                                            {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('bpjs')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="labor_union" class="col-sm-2 col-form-label">Labor Union</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="labor_union"
                                        id="labor_union_Exists" value="Exists"
                                        {{ old('labor_union', $member->labor_union ?? '') == 'Exists' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="labor_union_Exists">
                                        Exists
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="labor_union"
                                        id="labor_union_Does Not Exist" value="Does Not Exist"
                                        {{ old('labor_union', $member->labor_union ?? '') == 'Does Not Exist' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="labor_union_Does Not Exist">
                                        Does Not Exist
                                    </label>
                                </div>
                                @error('labor_union')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contribution_period" class="col-sm-2 col-form-label">Contribution Period</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contribution_period"
                                        id="contribution_period_1" value="1 Month"
                                        {{ old('contribution_period', $member->contribution_period ?? '') == '1 Month' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="contribution_period_1">
                                        1 Month
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contribution_period"
                                        id="contribution_period_3" value="3 Months"
                                        {{ old('contribution_period', $member->contribution_period ?? '') == '3 Months' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="contribution_period_3">
                                        3 Months
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contribution_period"
                                        id="contribution_period_6" value="6 Months"
                                        {{ old('contribution_period', $member->contribution_period ?? '') == '6 Months' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="contribution_period_6">
                                        6 Months
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="contribution_period"
                                        id="contribution_period_12" value="12 Months"
                                        {{ old('contribution_period', $member->contribution_period ?? '') == '12 Months' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="contribution_period_12">
                                        12 Months
                                    </label>
                                </div>
                                @error('contribution_period')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="how_they_learned_about_apindo" class="col-sm-2 col-form-label">How They Learned
                                About APINDO</label>
                            <div class="col-sm-10">
                                @php
                                    $learningSourceOptions = ['APINDO Website', 'APINDO Board Member', 'Others'];
                                    $selectedLearningSource = old(
                                        'how_they_learned_about_apindo',
                                        $member->how_they_learned_about_apindo ?? '',
                                    );
                                    $isBoardMemberSelected = $selectedLearningSource == 'APINDO Board Member';
                                    $isOthersSelected = $selectedLearningSource == 'Others';
                                @endphp
                                @foreach ($learningSourceOptions as $option)
                                    <div class="form-check">
                                        <input class="form-check-input how-they-learned-radio" type="radio"
                                            name="how_they_learned_about_apindo"
                                            id="how_they_learned_about_apindo_{{ $option }}"
                                            value="{{ $option }}" @if ($selectedLearningSource == $option) checked @endif>
                                        <label class="form-check-label"
                                            for="how_they_learned_about_apindo_{{ $option }}">
                                            {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                                <input type="text"
                                    class="form-control mt-2 @error('how_they_learned_about_apindo_board_member') is-invalid @enderror"
                                    id="how_they_learned_about_apindo_board_member"
                                    name="how_they_learned_about_apindo_board_member"
                                    value="{{ old('how_they_learned_about_apindo_board_member', $member->how_they_learned_about_apindo_board_member ?? '') }}"
                                    placeholder="Specific APINDO Board Member Name"
                                    @if (!$isBoardMemberSelected) disabled @endif>
                                <input type="text"
                                    class="form-control mt-2 @error('how_they_learned_about_apindo_others') is-invalid @enderror"
                                    id="how_they_learned_about_apindo_others" name="how_they_learned_about_apindo_others"
                                    value="{{ old('how_they_learned_about_apindo_others', $member->how_they_learned_about_apindo_others ?? '') }}"
                                    placeholder="Specific Other Source" @if (!$isOthersSelected) disabled @endif>
                                @error('how_they_learned_about_apindo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('how_they_learned_about_apindo_board_member')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('how_they_learned_about_apindo_others')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="declaration_letter" class="col-sm-2 col-form-label">Declaration Letter
                                (PDF)</label>
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
                                @error('declaration_letter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pp_pkb" class="col-sm-2 col-form-label">PP & PKB (PDF)</label>
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
                                @error('pp_pkb')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company_profile" class="col-sm-2 col-form-label">Company Profile (PDF)</label>
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
                                @error('company_profile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tdp" class="col-sm-2 col-form-label">TDP (PDF)</label>
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
                                @error('tdp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contact_person" class="col-sm-2 col-form-label">Contact Person</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                                    id="contact_person" name="contact_person"
                                    value="{{ old('contact_person', $member->contact_person ?? '') }}" required>
                                @error('contact_person')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="mobile_number" class="col-sm-2 col-form-label">Mobile Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('mobile_number') is-invalid @enderror"
                                    id="mobile_number" name="mobile_number"
                                    value="{{ old('mobile_number', $member->mobile_number ?? '') }}" required>
                                @error('mobile_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_id" class="col-sm-2 col-form-label">User</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('user_id') is-invalid @enderror" id="user_id"
                                    name="user_id" required>
                                    <option value="">Select User</option>
                                    @foreach ($users as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('user_id', $member->user_id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
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
