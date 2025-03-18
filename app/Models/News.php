<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    public function shortContent(): Attribute
    {
        return Attribute::make(
            get: fn() => Str::words(strip_tags(Purifier::clean($this->content), '<p><strong><em><ul><ol><li><a>'), 25, '...')
        );
    }
}
