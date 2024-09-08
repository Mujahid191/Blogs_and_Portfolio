<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Define the relationship to Category model
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
}
