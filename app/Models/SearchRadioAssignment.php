<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchRadioAssignment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function search(): BelongsTo
    {
        return $this->belongsTo(Search::class);
    }
}
