<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Management extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'member_number',
        'name',
        'company',
        'photo',
        'status',
        'organizational_position_id',
        'sector_id',
        'council_id',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'member_number',
                'name',
                'company',
                'status',
                'organizational_position_id',
                'sector_id',
                'council_id'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Kepengurusan')
            ->setDescriptionForEvent(fn(string $eventName) => "Kepengurusan {$eventName}");
    }

    public function organizationalPosition(): BelongsTo
    {
        return $this->belongsTo(OrganizationalPosition::class);
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function council(): BelongsTo
    {
        return $this->belongsTo(Council::class);
    }
}
