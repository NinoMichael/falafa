<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * Polymorphic with type field of estate class
     * 
     * @return [type]
     */
    public function estate()
    {
        return $this->morphOne(Estate::class,'type');
    }
}
