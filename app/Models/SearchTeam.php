<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SearchTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'search_id', 'name', 'team_leader', 'medic', 'responder_1', 'responder_2', 'responder_3',
    ];

    public function search(): BelongsTo
    {
        return $this->belongsTo(Search::class);
    }
}
