<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Activity extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'title',
        'start_time',
        'end_time',
        'place',
        'description'
    ];

    protected $casts = [
        'start_time' => 'datetime', // Cast to Carbon objects
        'end_time' => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'title',
                'start_time',
                'end_time',
                'place',
                'description'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Kegiatan')
            ->setDescriptionForEvent(fn(string $eventName) => "Kegiatan {$eventName}");
    }
}
