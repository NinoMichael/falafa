<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mail\EmailVerificationController;

Route::middleware([SetLocale::class])->group(function () {
    require __DIR__.'/modules/auth.php';
});

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth:sanctum', 'signed']);
