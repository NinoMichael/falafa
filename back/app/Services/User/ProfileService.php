<?php

namespace App\Services\User;

use App\Models\InformationDetail;

class ProfileService 
{
    /**
     * Create information detail for visitor/promoter
     * 
     * @param string $profilableType
     * @param int $profilableId
     * @param array $data
     * 
     * @return [type]
     */
    public static function createInformationDetail(string $profilableType, int $profilableId, array $data)
    {
        return InformationDetail::create(array_merge($data, [
            'profilable_type' => $profilableType,
            'profilable_id' => $profilableId,
        ]));
    }
}