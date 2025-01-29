<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:KEANGGOTAAN_LIST|KEANGGOTAAN_ADD|KEANGGOTAAN_EDIT|KEANGGOTAAN_DELETE', ['only' => ['index', 'show']]);
        $this->middleware('permission:KEANGGOTAAN_ADD', ['only' => ['create', 'store']]);
        $this->middleware('permission:KEANGGOTAAN_EDIT', ['only' => ['edit', 'update']]);
        $this->middleware('permission:KEANGGOTAAN_DELETE', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $perPage = 20;
        $data = Member::orderBy('company_name', 'asc')->paginate($perPage);
        return view('admin.pages.members.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::pluck('name', 'id')->all();

        return view('admin.pages.members.form', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'phone_number' => 'required',
            'fax' => 'nullable',
            'website' => 'nullable|url',
            'email' => 'required|email',
            'klbi' => 'required',
            'other_business_activities' => 'nullable',
            'company_status' => 'required',
            'investment_facilities' => 'nullable',
            'number_of_employees' => 'required|integer',
            'work_regulations' => 'required',
            'work_regulation_others' => 'nullable',
            'bpjs' => 'nullable',
            'labor_union' => 'required|in:Exists,Does Not Exist',
            'contribution_period' => 'required|in:1 Month,3 Months,6 Months,12 Months',
            'how_they_learned_about_apindo' => 'required',
            'how_they_learned_about_apindo_board_member' => 'nullable',
            'how_they_learned_about_apindo_others' => 'nullable',
            'declaration_letter' => 'required|file|mimes:pdf|max:5120',
            'pp_pkb' => 'required|file|mimes:pdf|max:5120',
            'company_profile' => 'required|file|mimes:pdf|max:5120',
            'tdp' => 'required|file|mimes:pdf|max:5120',
            'contact_person' => 'required',
            'mobile_number' => 'required',
            'new_user_name' => 'required|string|max:255',
            'new_user_email' => 'required|string|email|max:255|unique:users,email',
            'new_user_password' => 'required|string|min:8',
        ]);

        // Create new user
        $user = User::create([
            'name' => $request->new_user_name,
            'email' => $request->new_user_email,
            'password' => Hash::make($request->new_user_password),
        ]);

        $user->assignRole('Member'); // Assign the "Member" role

        $memberData = $request->except([
            '_token',
            'declaration_letter',
            'pp_pkb',
            'company_profile',
            'tdp',
            'new_user_name',
            'new_user_email',
            'new_user_password'
        ]);

        $memberData['user_id'] = $user->id; // Set the user_id for the new member

        // Convert array fields to comma-separated strings
        $memberData['investment_facilities'] = is_array($request->investment_facilities)
            ? implode(', ', $request->investment_facilities)
            : $request->investment_facilities;
        $memberData['bpjs'] = is_array($request->bpjs)
            ? implode(', ', $request->bpjs)
            : $request->bpjs;

        // Handle file uploads
        $files = ['declaration_letter', 'pp_pkb', 'company_profile', 'tdp'];
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                $uploadedFile = $request->file($file);
                $filename = time() . '_' . $uploadedFile->getClientOriginalName();
                $path = $uploadedFile->storeAs('public/members/' . $file, $filename);

                $memberData[$file] = $filename;
            }
        }

        Member::create($memberData);

        return redirect()->route('members.index')
            ->with('message', 'Member created successfully.')
            ->with('alert-type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member): View
    {
        return view('admin.pages.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member): View
    {
        // Get the associated user data
        $user = $member->user;

        // Get file URLs only if they exist
        $declaration_letter_url = $member->declaration_letter
            ? (Storage::disk('public')->exists('members/declaration_letter/' . $member->declaration_letter)
                ? Storage::url('public/members/declaration_letter/' . $member->declaration_letter)
                : null)
            : null;

        $pp_pkb_url = $member->pp_pkb
            ? (Storage::disk('public')->exists('members/pp_pkb/' . $member->pp_pkb)
                ? Storage::url('public/members/pp_pkb/' . $member->pp_pkb)
                : null)
            : null;

        $company_profile_url = $member->company_profile
            ? (Storage::disk('public')->exists('members/company_profile/' . $member->company_profile)
                ? Storage::url('public/members/company_profile/' . $member->company_profile)
                : null)
            : null;

        $tdp_url = $member->tdp
            ? (Storage::disk('public')->exists('members/tdp/' . $member->tdp)
                ? Storage::url('public/members/tdp/' . $member->tdp)
                : null)
            : null;

        $imageSrc = $member->photo
            ? (Storage::disk('public')->exists($member->photo)
                ? Storage::url($member->photo)
                : asset('images/image-not-found.png'))
            : asset('images/no-image-available.png');

        // Pass the user to the view along with the member
        return view('admin.pages.members.form', compact('member', 'declaration_letter_url', 'pp_pkb_url', 'company_profile_url', 'tdp_url', 'imageSrc', 'user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member): RedirectResponse
    {
        $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'phone_number' => 'required',
            'fax' => 'nullable',
            'website' => 'nullable|url',
            'email' => 'required|email',
            'klbi' => 'required',
            'other_business_activities' => 'nullable',
            'company_status' => 'required',
            'investment_facilities' => 'nullable',
            'number_of_employees' => 'required|integer',
            'work_regulations' => 'required',
            'work_regulation_others' => 'nullable',
            'bpjs' => 'nullable',
            'labor_union' => 'required|in:Exists,Does Not Exist',
            'contribution_period' => 'required|in:1 Month,3 Months,6 Months,12 Months',
            'how_they_learned_about_apindo' => 'required',
            'how_they_learned_about_apindo_board_member' => 'nullable',
            'how_they_learned_about_apindo_others' => 'nullable',
            'declaration_letter' => 'sometimes|file|mimes:pdf|max:5120',
            'pp_pkb' => 'sometimes|file|mimes:pdf|max:5120',
            'company_profile' => 'sometimes|file|mimes:pdf|max:5120',
            'tdp' => 'sometimes|file|mimes:pdf|max:5120',
            'contact_person' => 'required',
            'mobile_number' => 'required',
            'new_user_name' => 'required|string|max:255',
            'new_user_email' => 'required|string|email|max:255|unique:users,email,' . $member->user_id,
            'new_user_password' => 'nullable|string|min:8',
        ]);

        $memberData = $request->except(['_token', 'declaration_letter', 'pp_pkb', 'company_profile', 'tdp', 'new_user_name', 'new_user_email', 'new_user_password']);

        // Convert array fields to comma-separated strings
        $memberData['investment_facilities'] = is_array($request->investment_facilities)
            ? implode(', ', $request->investment_facilities)
            : $request->investment_facilities;
        $memberData['bpjs'] = is_array($request->bpjs)
            ? implode(', ', $request->bpjs)
            : $request->bpjs;

        // Update or create the associated user
        if ($member->user) {
            // Update existing user
            $member->user->update([
                'name' => $request->new_user_name,
                'email' => $request->new_user_email,
                'password' => $request->filled('new_user_password') ? Hash::make($request->new_user_password) : $member->user->password,
            ]);
        } else {
            // Create a new user
            $user = User::create([
                'name' => $request->new_user_name,
                'email' => $request->new_user_email,
                'password' => Hash::make($request->new_user_password),
            ]);

            $user->assignRole('Member');
            $memberData['user_id'] = $user->id;
        }

        // Handle file uploads
        $files = ['declaration_letter', 'pp_pkb', 'company_profile', 'tdp'];
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                // Delete old file if it exists
                if ($member->$file && Storage::disk('public')->exists('members/' . $file . '/' . $member->$file)) {
                    Storage::disk('public')->delete('members/' . $file . '/' . $member->$file);
                }

                $uploadedFile = $request->file($file);
                $filename = time() . '_' . $uploadedFile->getClientOriginalName();
                $path = $uploadedFile->storeAs('public/members/' . $file, $filename);

                $memberData[$file] = $filename;
            }
        }

        $member->update($memberData);

        return redirect()->route('members.index')
            ->with('message', 'Member updated successfully.')
            ->with('alert-type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member): RedirectResponse
    {
        // Delete associated files if they exist
        $files = ['declaration_letter', 'pp_pkb', 'company_profile', 'tdp'];
        foreach ($files as $file) {
            if ($member->$file && Storage::disk('public')->exists('members/' . $file . '/' . $member->$file)) {
                Storage::disk('public')->delete('members/' . $file . '/' . $member->$file);
            }
        }

        $member->delete();

        return redirect()->route('members.index')
            ->with('message', 'Member deleted successfully.')
            ->with('alert-type', 'success');
    }
}
