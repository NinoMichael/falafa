<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mail\EmailVerificationController;

Route::middleware([SetLocale::class])->group(function () {
    require __DIR__.'/modules/auth.php';
    require __DIR__.'/modules/profile.php';

    Route::prefix('email')->middleware('auth:sanctum')->group(function () {
        Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verifyUser'])
            ->middleware('signed')
            ->name('verification.verify');
    
        Route::middleware('auth:sanctum')->post('resend', [EmailVerificationController::class, 'resend'])
            ->name('verification.resend');
    });
});


