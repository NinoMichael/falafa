<?php

use App\Http\Controllers\Estate\EstateController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->prefix('estates')->controller(EstateController::class)->group(function () {
    Route::post('/', 'index');
});