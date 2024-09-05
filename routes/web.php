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

    // Static views for results and settings
    Route::get('/results', function () {
        return view('results.index');
    })->name('results');

    Route::get('/settings', function () {
        return view('settings.settings');
    })->name('settings');




    // Quiz trash routes
    Route::get('quizzes/trash', [QuizController::class, 'trash'])->name('quizzes.trash');
    Route::patch('quizzes/restore/{quiz}', [QuizController::class, 'restore'])->name('quizzes.trash-restore');
    Route::delete('quizzes/remove/{quiz}', [QuizController::class, 'remove'])->name('quizzes.trash-remove');
    Route::post('quizzes/restoreAll', [QuizController::class, 'restoreAll'])->name('quizzes.trash-restore-all');
    Route::delete('quizzes/empty', [QuizController::class, 'empty'])->name('quizzes.trash-empty');

    // Quizzes routes
    Route::get('quizzes/', [QuizController::class, 'index'])->name('quizzes.index');
    Route::get('quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
    Route::post('quizzes/create', [QuizController::class, 'store'])->name('quizzes.store');
    Route::get('quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
    Route::get('quizzes/{quiz}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
    Route::put('quizzes/{quiz}', [QuizController::class, 'update'])->name('quizzes.update');
    Route::delete('quizzes/{quiz}/delete', [QuizController::class, 'delete'])->name('quizzes.delete');
    Route::delete('quizzes/{quiz}', [QuizController::class, 'destroy'])->name('quizzes.destroy');


    // Course trash routes
    Route::get('courses/trash', [CourseController::class, 'trash'])->name('courses.trash');
    Route::patch('courses/{course}/restore', [CourseController::class, 'restore'])->name('courses.restore');
    Route::delete('courses/{course}/forceDelete', [CourseController::class, 'forceDelete'])->name('courses.forceDelete');
    Route::post('courses/restoreAll', [CourseController::class, 'restoreAll'])->name('courses.trash-restore-all');
    Route::delete('courses/empty', [CourseController::class, 'empty'])->name('courses.trash-empty');

    // Courses routes
    Route::get('courses/', [CourseController::class, 'index'])->name('courses.index');
    Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('courses/create', [CourseController::class, 'store'])->name('courses.store');
    Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::get('courses/{course}/delete', [CourseController::class, 'delete'])->name('courses.delete');
    Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');


    // User trash routes
    Route::get('/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::post('/restore/{user}', [UserController::class, 'restore'])->name('users.trash-restore');
    Route::delete('/remove/{user}', [UserController::class, 'remove'])->name('users.trash-remove');
    Route::post('/restoreAll', [UserController::class, 'restoreAll'])->name('users.trash-restore-all');
    Route::delete('/empty', [UserController::class, 'empty'])->name('users.trash-empty');

    // Users routes
    Route::get('users/', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/create', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


});

// Include authentication routes
require __DIR__ . '/auth.php';
