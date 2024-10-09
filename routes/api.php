<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MobileApiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function() {
    Route::post('/mobile/login', [MobileApiController::class, 'login'])->name('mobile.login');
    Route::post('/mobile/register', [MobileApiController::class, 'register'])->name('mobile.register');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/mobile/logout', [MobileApiController::class, 'logout'])->name('mobile.logout');
        Route::get('/mobile/profile', [MobileApiController::class, 'currentUser'])->name('mobile.profile');
        Route::post('/mobile/profile', [MobileApiController::class, 'updateUser'])->name('mobile.updateUser');
        Route::post('/mobile/profile/photo', [MobileApiController::class, 'updatePhoto'])->name('mobile.updatePhoto');

        // Course routes
        Route::get('mobile/courses', [CourseController::class, 'index'])->name('mobile.courses.index');
        Route::post('mobile/courses', [CourseController::class, 'store'])->name('mobile.courses.store');
        Route::get('mobile/courses/{course}', [CourseController::class, 'show'])->name('mobile.courses.show');
        Route::put('mobile/courses/{course}', [CourseController::class, 'update'])->name('mobile.courses.update');
        Route::delete('mobile/courses/{course}', [CourseController::class, 'destroy'])->name('mobile.courses.destroy');

        // Certificate routes
        Route::get('mobile/certificates', [CertificateController::class, 'index'])->name('mobile.certificates.index');
        Route::post('mobile/certificates', [CertificateController::class, 'store'])->name('mobile.certificates.store');
        Route::get('mobile/certificates/{certificate}', [CertificateController::class, 'show'])->name('mobile.certificates.show');
        Route::put('mobile/certificates/{certificate}', [CertificateController::class, 'update'])->name('mobile.certificates.update');
        Route::delete('mobile/certificates/{certificate}', [CertificateController::class, 'destroy'])->name('mobile.certificates.destroy');

        // Section routes
        Route::get('mobile/sections', [SectionController::class, 'index'])->name('mobile.sections.index');
        Route::post('mobile/sections', [SectionController::class, 'store'])->name('mobile.sections.store');
        Route::get('mobile/sections/{section}', [SectionController::class, 'show'])->name('mobile.sections.show');
        Route::put('mobile/sections/{section}', [SectionController::class, 'update'])->name('mobile.sections.update');
        Route::delete('mobile/sections/{section}', [SectionController::class, 'destroy'])->name('mobile.sections.destroy');

        // Question routes
        Route::get('mobile/questions', [QuestionController::class, 'index'])->name('mobile.questions.index');
        Route::post('mobile/questions', [QuestionController::class, 'store'])->name('mobile.questions.store');
        Route::get('mobile/questions/{question}', [QuestionController::class, 'show'])->name('mobile.questions.show');
        Route::put('mobile/questions/{question}', [QuestionController::class, 'update'])->name('mobile.questions.update');
        Route::delete('mobile/questions/{question}', [QuestionController::class, 'destroy'])->name('mobile.questions.destroy');
    });
});
