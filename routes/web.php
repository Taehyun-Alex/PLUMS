<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Routes that require web middleware
Route::group(['middleware' => ['web']], function () {
    // Login routes
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// Routes that require authentication
Route::middleware('auth')->group(function () {

    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Static views for quizzes, results, and settings
    Route::get('/quizzes', function () {
        return view('quizzes.index');
    })->name('quizzes.index');

    Route::get('/results', function () {
        return view('results.results');
    })->name('results');

    Route::get('/settings', function () {
        return view('settings.settings');
    })->name('settings');

    // Quizzes routes
    Route::prefix('quizzes')->group(function () {
        Route::get('/', [QuizController::class, 'index'])->name('quizzes.index');
        Route::get('/create', [QuizController::class, 'create'])->name('quizzes.create');
        Route::post('/create', [QuizController::class, 'store'])->name('quizzes.store');
        Route::get('/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
        Route::get('/{quiz}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
        Route::put('/{quiz}', [QuizController::class, 'update'])->name('quizzes.update');
        Route::delete('/{quiz}/delete', [QuizController::class, 'delete'])->name('quizzes.delete');
        Route::delete('/{quiz}', [QuizController::class, 'destroy'])->name('quizzes.destroy');

        // Quiz trash routes
        Route::prefix('trash')->group(function () {
            Route::get('/', [QuizController::class, 'trash'])->name('quizzes.trash');
            Route::post('/restore/{quiz}', [QuizController::class, 'restore'])->name('quizzes.trash-restore');
            Route::delete('/remove/{quiz}', [QuizController::class, 'remove'])->name('quizzes.trash-remove');
            Route::post('/restoreAll', [QuizController::class, 'restoreAll'])->name('quizzes.trash-restore-all');
            Route::delete('/empty', [QuizController::class, 'empty'])->name('quizzes.trash-empty');
        });
    });

    // Courses routes
    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('/create', [CourseController::class, 'store'])->name('courses.store');
        Route::get('/{course}', [CourseController::class, 'show'])->name('courses.show');
        Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
        Route::put('/{course}', [CourseController::class, 'update'])->name('courses.update');
        Route::get('/{course}/delete', [CourseController::class, 'delete'])->name('courses.delete');
        Route::delete('/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

        // Course trash routes
        Route::prefix('trash')->group(function () {
            Route::get('/', [CourseController::class, 'trash'])->name('courses.trash');
            Route::patch('/{course}/restore', [CourseController::class, 'restore'])->name('courses.restore');
            Route::delete('/{course}/forceDelete', [CourseController::class, 'forceDelete'])->name('courses.forceDelete');
            Route::post('/restoreAll', [CourseController::class, 'restoreAll'])->name('courses.trash-restore-all');
            Route::delete('/empty', [CourseController::class, 'empty'])->name('courses.trash-empty');
        });
    });

    // Users routes
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}/delete', [UserController::class, 'delete'])->name('users.delete');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        // User trash routes
        Route::prefix('trash')->group(function () {
            Route::get('/', [UserController::class, 'trash'])->name('users.trash');
            Route::post('/restore/{user}', [UserController::class, 'restore'])->name('users.trash-restore');
            Route::delete('/remove/{user}', [UserController::class, 'remove'])->name('users.trash-remove');
            Route::post('/restoreAll', [UserController::class, 'restoreAll'])->name('users.trash-restore-all');
            Route::delete('/empty', [UserController::class, 'empty'])->name('users.trash-empty');
        });
    });
});

// Include authentication routes
require __DIR__ . '/auth.php';
