<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Galeri extends Model
{
    use HasFactory, HasRoles, LogsActivity;

    protected $fillable = [
        'tanggal',
        'file',
        'deskripsi'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['tanggal', 'file', 'deskripsi'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Galeri')
            ->setDescriptionForEvent(fn(string $eventName) => "Galeri {$eventName}");
    }
}
