<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\User\ProfileService;
use App\Http\Requests\User\StoreInformationDetailRequest;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Store a newly created information detail
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function store(StoreInformationDetailRequest $request): JsonResponse
    {
        $user = $request->user();
        $profilableType = $user->role === 'visitor' ? 'App\Models\Visitor' : 'App\Models\Promoter';
        $profilableId = $user->{$user->role}->id;

        $data = $request->validated();
        $informationDetail = ProfileService::createInformationDetail($profilableType, $profilableId, $data);

        return response()->json([
            'message' => 'Information detail created successfully',
            'data' => $informationDetail
        ], 201);
    }
}
