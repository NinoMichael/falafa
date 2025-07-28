<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agency extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * Relation user with agency
     * 
     * @return BelongsTo
     */
    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
}
