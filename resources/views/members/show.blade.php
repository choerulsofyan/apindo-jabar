@extends('layouts.admin')

@section('title', 'Detail Member')

@section('subheader')
    @include('partials.admin.subheader', [
        'title' => 'Manajemen Anggota',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Manajemen Anggota', 'url' => route('members.index')],
            ['name' => 'Daftar Anggota', 'url' => route('members.index')],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $member->company_name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if ($member->photo)
                                <img src="{{ Storage::url($member->photo) }}" alt="Member Photo" class="img-fluid">
                            @else
                                <img src="{{ asset('images/no-image-available.png') }}" alt="No Image Available"
                                    class="img-fluid">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <p><strong>Company Name:</strong> {{ $member->company_name }}</p>
                            <p><strong>Company Address:</strong> {{ $member->company_address }}</p>
                            <p><strong>City:</strong> {{ $member->city }}</p>
                            <p><strong>Postal Code:</strong> {{ $member->postal_code }}</p>
                            <p><strong>Phone Number:</strong> {{ $member->phone_number }}</p>
                            <p><strong>Fax:</strong> {{ $member->fax ?? 'N/A' }}</p>
                            <p><strong>Website:</strong>
                                @if ($member->website)
                                    <a href="{{ $member->website }}" target="_blank">{{ $member->website }}</a>
                                @else
                                    N/A
                                @endif
                            </p>
                            <p><strong>Email:</strong> {{ $member->email }}</p>
                            <p><strong>KLBI:</strong> {{ $member->klbi }}</p>
                            <p><strong>Other Business Activities:</strong>
                                {{ $member->other_business_activities ?? 'N/A' }}</p>
                            <p><strong>Company Status:</strong> {{ $member->company_status }}</p>

                            <p><strong>Investment Facilities:</strong>
                                @if ($member->investment_facilities)
                                    {{ $member->investment_facilities }}
                                @else
                                    N/A
                                @endif
                            </p>
                            <p><strong>Number of Employees:</strong> {{ $member->number_of_employees }}</p>
                            <p><strong>Work Regulations:</strong> {{ $member->work_regulations }}</p>
                            @if ($member->work_regulations == 'Others' && $member->work_regulation_others)
                                <p><strong>Other Work Regulations:</strong> {{ $member->work_regulation_others }}</p>
                            @endif
                            <p><strong>BPJS:</strong>
                                @if ($member->bpjs)
                                    {{ $member->bpjs }}
                                @else
                                    N/A
                                @endif
                            </p>
                            <p><strong>Labor Union:</strong> {{ $member->labor_union }}</p>
                            <p><strong>Contribution Period:</strong> {{ $member->contribution_period }}</p>
                            <p><strong>How They Learned About APINDO:</strong>
                                {{ $member->how_they_learned_about_apindo }}
                            </p>
                            @if (
                                $member->how_they_learned_about_apindo == 'APINDO Board Member' &&
                                    $member->how_they_learned_about_apindo_board_member)
                                <p><strong>APINDO Board Member:</strong>
                                    {{ $member->how_they_learned_about_apindo_board_member }}</p>
                            @endif
                            @if ($member->how_they_learned_about_apindo == 'Others' && $member->how_they_learned_about_apindo_others)
                                <p><strong>Other Source:</strong> {{ $member->how_they_learned_about_apindo_others }}</p>
                            @endif
                            <p><strong>Contact Person:</strong> {{ $member->contact_person }}</p>
                            <p><strong>Mobile Number:</strong> {{ $member->mobile_number }}</p>
                            <p><strong>User:</strong> {{ $member->user->name ?? 'N/A' }}</p>
                            <p>
                                <strong>Declaration Letter:</strong>
                                @if ($member->declaration_letter)
                                    <a href="{{ Storage::url('public/members/declaration_letter/' . $member->declaration_letter) }}"
                                        target="_blank">
                                        <i class="fa fa-file-pdf"></i> View Declaration Letter
                                    </a>
                                @else
                                    N/A
                                @endif
                            </p>

                            <p>
                                <strong>PP & PKB:</strong>
                                @if ($member->pp_pkb)
                                    <a href="{{ Storage::url('public/members/pp_pkb/' . $member->pp_pkb) }}"
                                        target="_blank">
                                        <i class="fa fa-file-pdf"></i> View PP & PKB
                                    </a>
                                @else
                                    N/A
                                @endif
                            </p>

                            <p>
                                <strong>Company Profile:</strong>
                                @if ($member->company_profile)
                                    <a href="{{ Storage::url('public/members/company_profile/' . $member->company_profile) }}"
                                        target="_blank">
                                        <i class="fa fa-file-pdf"></i> View Company Profile
                                    </a>
                                @else
                                    N/A
                                @endif
                            </p>

                            <p>
                                <strong>TDP:</strong>
                                @if ($member->tdp)
                                    <a href="{{ Storage::url('public/members/tdp/' . $member->tdp) }}" target="_blank">
                                        <i class="fa fa-file-pdf"></i> View TDP
                                    </a>
                                @else
                                    N/A
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('members.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
