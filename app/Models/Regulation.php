<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Regulation extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'title',
        'date',
        'file',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'date'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Regulasi')->setDescriptionForEvent(fn(string $eventName) => "Regulasi {$eventName}");
    }
}
