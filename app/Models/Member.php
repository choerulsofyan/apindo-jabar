<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Member extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'company_name',
        'company_address',
        'city',
        'postal_code',
        'phone_number',
        'fax',
        'website',
        'company_email',
        'klbi',
        'other_business_activities',
        'company_status',
        'investment_facilities',
        'number_of_employees',
        'work_regulations',
        'work_regulation_others',
        'bpjs',
        'is_labor_union_exists',
        'monthly_contribution_period',
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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'company_name',
                'company_address',
                'city',
                'postal_code',
                'phone_number',
                'fax',
                'website',
                'company_email',
                'klbi',
                'other_business_activities',
                'company_status',
                'investment_facilities',
                'number_of_employees',
                'work_regulations',
                'work_regulation_others',
                'bpjs',
                'is_labor_union_exists',
                'monthly_contribution_period',
                'how_they_learned_about_apindo',
                'how_they_learned_about_apindo_board_member',
                'how_they_learned_about_apindo_others',
                'contact_person',
                'mobile_number',
                'user_id',
                'is_extraordinary_member',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Keanggotaan')
            ->setDescriptionForEvent(fn(string $eventName) => "Member {$eventName}");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
