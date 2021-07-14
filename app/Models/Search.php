<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Search extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function searchTeams(): HasMany
    {
        return $this->hasMany(SearchTeam::class);
    }

    public function radioAssignments(): HasMany
    {
        return $this->hasMany(SearchRadioAssignment::class);
    }
}
