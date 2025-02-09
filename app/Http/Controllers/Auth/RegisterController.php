<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member; // Import the Member model
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; // Import Request
use Illuminate\Auth\Events\Registered; // Import Registered event
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Facades\Log; // Import for error logging

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home'; // Or wherever you want to redirect after registration

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Override the showRegistrationForm method
    public function showRegistrationForm()
    {
        // You can pass any data needed for the form here.
        // for now, just return the view
        return view('auth.register');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'is_extraordinary_member' => ['required', 'boolean'],
            'company_name' => ['required', 'string'],
            'company_address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'fax' => ['nullable', 'string'],
            'website' => ['nullable', 'url'],
            'company_email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'klbi' => ['required', 'string'],
            'other_business_activities' => ['nullable', 'string'],
            'company_status' => ['required', 'string'],
            'investment_facilities' => ['nullable', 'string'],
            'number_of_employees' => ['required', 'numeric'],
            'work_regulations' => ['required', 'string'],
            'work_regulation_others' => ['nullable', 'string'],
            'bpjs' => ['nullable', 'string'],
            'is_labor_union_exists' => ['required', 'boolean'],
            'monthly_contribution_period' => ['required', 'integer'],
            'how_they_learned_about_apindo' => ['required', 'string'],
            'how_they_learned_about_apindo_board_member' => ['nullable', 'string'],
            'how_they_learned_about_apindo_others' => ['nullable', 'string'],
            'declaration_letter' => ['required', 'file', 'mimes:pdf', 'max:5120'],
            'pp_pkb' => ['required', 'file', 'mimes:pdf', 'max:5120'],
            'company_profile' => ['required', 'file', 'mimes:pdf', 'max:5120'],
            'tdp' => ['required', 'file', 'mimes:pdf', 'max:5120'],
            'contact_person' => ['required', 'string'],
            'mobile_number' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }



    protected function create(array $data)
    {
        DB::beginTransaction(); // Start the transaction

        try {
            // Create the user
            $user = User::create([
                'name' => $data['contact_person'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // Assign the 'Member' role to the newly created user
            $user->assignRole('Member'); // Make sure you have a 'Member' role!

            // Prepare member data
            $memberData = [
                'is_extraordinary_member' => $data['is_extraordinary_member'],
                'company_name' => $data['company_name'],
                'company_address' => $data['company_address'],
                'city' => $data['city'],
                'postal_code' => $data['postal_code'],
                'phone_number' => $data['phone_number'],
                'fax' => $data['fax'],
                'website' => $data['website'],
                'company_email' => $data['company_email'],
                'klbi' => $data['klbi'],
                'other_business_activities' => $data['other_business_activities'],
                'company_status' => $data['company_status'],
                'investment_facilities' => $data['investment_facilities'],
                'number_of_employees' => $data['number_of_employees'],
                'work_regulations' => $data['work_regulations'],
                'work_regulation_others' => isset($data['work_regulation_others']) ? $data['work_regulation_others'] : null,
                // 'bpjs' => $data['bpjs'],
                'is_labor_union_exists' => $data['is_labor_union_exists'],
                'monthly_contribution_period' => $data['monthly_contribution_period'],
                'how_they_learned_about_apindo' => $data['how_they_learned_about_apindo'],
                'how_they_learned_about_apindo_board_member' => isset($data['how_they_learned_about_apindo_board_member']) ? $data['how_they_learned_about_apindo_board_member'] : null,
                'how_they_learned_about_apindo_others' => isset($data['how_they_learned_about_apindo_others']) ? $data['how_they_learned_about_apindo_others'] : null,
                // 'declaration_letter' => $data['declaration_letter'],
                // 'pp_pkb' => $data['pp_pkb'],
                // 'company_profile' => $data['company_profile'],
                // 'tdp' => $data['tdp'],
                'contact_person' => $data['contact_person'],
                'mobile_number' => $data['mobile_number'],
                'user_id' => $user->id, // Associate the member with the newly created user
            ];
            // dd($memberData);

            // Handle 'investment_facilities'
            if (isset($data['investment_facilities']) && is_array($data['investment_facilities'])) {
                $memberData['investment_facilities'] = implode(', ', $data['investment_facilities']);
            } else {
                $memberData['investment_facilities'] = ''; // or null
            }
            // Handle 'bpjs'
            if (isset($data['bpjs']) && is_array($data['bpjs'])) {
                $memberData['bpjs'] = implode(', ', $data['bpjs']);
            } else {
                $memberData['bpjs'] = ''; // or null
            }

            // Handle file uploads
            $files = ['declaration_letter', 'pp_pkb', 'company_profile', 'tdp'];
            foreach ($files as $file) {
                if (array_key_exists($file, $data) && $data[$file] instanceof \Illuminate\Http\UploadedFile) {
                    $uploadedFile = $data[$file];
                    $filename = time() . '_' . $uploadedFile->getClientOriginalName();
                    $path = $uploadedFile->storeAs('public/members/' . $file, $filename);

                    $memberData[$file] = $filename; // Store only filename
                }
            }

            Member::create($memberData); // Create the member record

            DB::commit(); // Commit the transaction
            return $user; // Return the newly created user

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction on any exception

            // Log the error (very important for debugging!)
            Log::error('User registration and member creation failed: ' . $e->getMessage(), [
                'request_data' => $data,
                'exception' => $e,
            ]);

            echo "<pre>";
            print_r($data);
            print_r($e->getMessage()); // For debugging
            echo "</pre>";
            exit();
            // Return a user-friendly error.  Crucially, *don't* expose the raw exception.
            return back()->withInput()->withErrors(['registration' => 'An error occurred during registration. Please try again.']);
        }
    }

    // Override the registration logic
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
