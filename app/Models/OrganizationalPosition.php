<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class OrganizationalPosition extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Jabatan')
            ->setDescriptionForEvent(fn(string $eventName) => "Jabatan {$eventName}");
    }
}
