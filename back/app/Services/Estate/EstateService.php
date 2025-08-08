<?php

namespace App\Services\Estate;

use App\Models\Estate;

class EstateService 
{
    public static function list (array $filters = [])
    {
        $query = Estate::with(['type', 'city', 'promoter']);

        return $query->paginate(12);
    }
}