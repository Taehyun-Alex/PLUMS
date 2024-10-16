<?php


use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MobileApiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TelemetryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Grouping all API routes under the 'v1' prefix
Route::group(['prefix' => 'v1'], function () {
    // Mobile authentication routes
    Route::post('/mobile/login', [MobileApiController::class, 'login'])->name('mobile.login');
    Route::post('/mobile/register', [MobileApiController::class, 'register'])->name('mobile.register');

    // Quiz Questions route
    Route::get('/quiz-questions', [QuizQuestionController::class, 'index']);

    // Protected routes requiring authentication
    Route::middleware('auth:sanctum')->group(function () {
        // Telemetry route
        Route::post('/telemetry', [TelemetryController::class, 'log'])->name('telemetry');

        // Mobile profile routes
        Route::post('/mobile/logout', [MobileApiController::class, 'logout'])->name('mobile.logout');
        Route::get('/mobile/profile', [MobileApiController::class, 'currentUser'])->name('mobile.profile');
        Route::post('/mobile/profile', [MobileApiController::class, 'updateUser'])->name('mobile.updateUser');
        Route::post('/mobile/profile/photo', [MobileApiController::class, 'updatePhoto'])->name('mobile.updatePhoto');

        // Course routes
        Route::prefix('mobile/courses')->name('mobile.courses.')->group(function () {
            Route::get('/', [CourseController::class, 'index'])->name('index');
            Route::post('/', [CourseController::class, 'store'])->name('store');
            Route::get('{course}', [CourseController::class, 'show'])->name('show');
            Route::put('{course}', [CourseController::class, 'update'])->name('update');
            Route::delete('{course}', [CourseController::class, 'destroy'])->name('destroy');
        });

        // Certificate routes
        Route::prefix('mobile/certificates')->name('mobile.certificates.')->group(function () {
            Route::get('/', [CertificateController::class, 'index'])->name('index');
            Route::post('/', [CertificateController::class, 'store'])->name('store');
            Route::get('{certificate}', [CertificateController::class, 'show'])->name('show');
            Route::put('{certificate}', [CertificateController::class, 'update'])->name('update');
            Route::delete('{certificate}', [CertificateController::class, 'destroy'])->name('destroy');
        });

        // Section routes
        Route::prefix('mobile/sections')->name('mobile.sections.')->group(function () {
            Route::get('/', [SectionController::class, 'index'])->name('index');
            Route::post('/', [SectionController::class, 'store'])->name('store');
            Route::get('{section}', [SectionController::class, 'show'])->name('show');
            Route::put('{section}', [SectionController::class, 'update'])->name('update');
            Route::delete('{section}', [SectionController::class, 'destroy'])->name('destroy');
        });

        // Question routes
        Route::prefix('mobile/questions')->name('mobile.questions.')->group(function () {
            Route::get('/', [QuestionController::class, 'index'])->name('index');
            Route::post('/', [QuestionController::class, 'store'])->name('store');
            Route::get('{question}', [QuestionController::class, 'show'])->name('show');
            Route::put('{question}', [QuestionController::class, 'update'])->name('update');
            Route::delete('{question}', [QuestionController::class, 'destroy'])->name('destroy');
        });
    });
});
