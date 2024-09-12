<?php

use App\Http\Controllers\MobileApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function() {
    // Mobile Authentication
    Route::post('/mobile/login', [MobileApiController::class, 'login'])->name('mobile.login');

    // Mobile User Routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/mobile/me', [MobileApiController::class, 'currentUser'])->name('mobile.me');
    });
});
