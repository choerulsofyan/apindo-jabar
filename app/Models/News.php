<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class News extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'title',
        'content',
        'photo',
        'place',
    ];
}
