<?php

use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('profile')->controller(ProfileController::class)->group(function () {
    Route::post('/info-detail/store', 'store');
});