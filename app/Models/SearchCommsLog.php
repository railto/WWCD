<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SearchCommsLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function search(): BelongsTo
    {
        return $this->belongsTo(Search::class);
    }
}
