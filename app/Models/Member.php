<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_address',
        'city',
        'postal_code',
        'phone_number',
        'fax',
        'website',
        'email',
        'klbi',
        'other_business_activities',
        'company_status',
        'investment_facilities',
        'number_of_employees',
        'work_regulations',
        'work_regulation_others',
        'bpjs',
        'labor_union',
        'contribution_period',
        'how_they_learned_about_apindo',
        'how_they_learned_about_apindo_board_member',
        'how_they_learned_about_apindo_others',
        'declaration_letter',
        'pp_pkb',
        'company_profile',
        'tdp',
        'contact_person',
        'mobile_number',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
