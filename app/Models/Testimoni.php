<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_pekerjaan',
        'deskripsi'
    ];

    public function getDeskripsiAttribute($value)
    {
        return ucfirst($value);
    }

}
