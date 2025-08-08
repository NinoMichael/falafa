<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * Polymorphic relation
     * 
     * @return [type]
     */
    public function type()
    {
        return $this->morphTo();
    }

    /**
     * Relation with city
     * 
     * @return [type]
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Relation with promoter
     * 
     * @return [type]
     */
    public function promoter()
    {
        return $this->belongsTo(Promoter::class);
    }

    /**
     * Relation with agency
     * 
     * @return [type]
     */
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    /**
     * Relation with visitor
     * 
     * @return [type]
     */
    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
