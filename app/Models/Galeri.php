<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Galeri extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'tanggal',
        'file',
        'deskripsi'
    ];
}
