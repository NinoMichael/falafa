<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->prefix('cities')->controller(CityController::class)->group(function () {
    Route::get('/', 'index');
});