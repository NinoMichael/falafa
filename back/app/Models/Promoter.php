<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promoter extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * Relation user with promoter
     * 
     * @return BelongsTo
     */
    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Polymorphic relation with information detail
     * 
     * @return [type]
     */
    public function informationDetail()
    {
        return $this->morphOne(InformationDetail::class, 'profilable');
    }
}
