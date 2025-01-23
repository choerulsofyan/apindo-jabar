<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class News extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'title',
        'content',
        'photo',
        'place',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'content', 'photo', 'place'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Berita')
            ->setDescriptionForEvent(fn(string $eventName) => "Berita {$eventName}");
    }
}
