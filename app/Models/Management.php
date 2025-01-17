<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Management extends Model
{
    use HasFactory;

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

    /**
     * Get the organizational position that the management belongs to.
     */
    public function organizationalPosition(): BelongsTo
    {
        return $this->belongsTo(OrganizationalPosition::class);
    }

    /**
     * Get the sector that the management belongs to.
     */
    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    /**
     * Get the council that the management belongs to.
     */
    public function council(): BelongsTo
    {
        return $this->belongsTo(Council::class);
    }
}
