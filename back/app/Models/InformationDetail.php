<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformationDetail extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    public function profilable()
    {
        return $this->morphTo();
    }
}
