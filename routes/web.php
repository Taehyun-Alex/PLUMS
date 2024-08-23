<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::group(['middleware' => ['web']], function () {
    // Route for showing the login form
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

    // Route for handling login form submission
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



Route::middleware('auth')->group(function () {

    // Quiz Trash Routes
    Route::get('/quizzes/trash', [QuizController::class, 'trash'])->name('quizzes.trash');
    Route::post('/quizzes/trash/restore/{user}', [QuizController::class, 'restore'])->name('quizzes.trash-restore');
    Route::delete('/quizzes/trash/remove/{user}', [QuizController::class, 'remove'])->name('quizzes.trash-remove');
    Route::post('/quizzes/trash/restoreAll', [QuizController::class, 'restoreAll'])->name('quizzes.trash-restore-all');
    Route::delete('/quizzes/trash/empty', [QuizController::class, 'empty'])->name('quizzes.trash-empty');

    // User management Routes
    Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
    Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
    Route::post('/quizzes/create', [QuizController::class, 'store'])->name('quizzes.store');
    Route::get('/quizzes/{users}', [QuizController::class, 'show'])->name('quizzes.show'); // Show user details
    Route::get('/quizzes/{user}/edit', [QuizController::class, 'edit'])->name('quizzes.edit'); // Edit user form
    Route::put('/quizzes/{user}', [QuizController::class, 'update'])->name('quizzes.update'); // Update user
    Route::delete('/quizzes/{user}/delete', [QuizController::class, 'delete'])->name('quizzes.delete'); // Show delete confirmation
    Route::delete('/quizzes/{user}', [QuizController::class, 'destroy'])->name('quizzes.destroy'); // Delete user

});

    Route::get('/quizzes', function () {
        return view('quizzes.index');
    })->name('quizzes');

    Route::get('/quizzeslist', function () {
        return view('quizzes.quizzeslist');
    })->name('quizzeslist');

    Route::get('/results', function () {
        return view('results.results');
    })->name('results');

    Route::get('/settings', function () {
        return view('settings.settings');
    })->name('settings');
});

// Courses
Route::middleware('auth')->group(function () {
    Route::resource('courses', \App\Http\Controllers\CourseController::class);
    Route::get('/courses/{course}/delete', [\App\Http\Controllers\CourseController::class, 'delete'])->name('courses.delete');
    Route::delete('/courses/{course}', [\App\Http\Controllers\CourseController::class, 'destroy'])->name('courses.destroy');
    Route::get('/course/trash', [\App\Http\Controllers\CourseController::class, 'trash'])->name('courses.trash');
    Route::patch('/courses/{course}/restore', [CourseController::class, 'restore'])->name('courses.restore');
    Route::delete('/courses/{course}/forceDelete', [CourseController::class, 'forceDelete'])->name('courses.forceDelete');

});

// Users
Route::middleware('auth')->group(function () {


    // Trash Routes

    Route::get('/users/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::post('/users/trash/restore/{user}', [UserController::class, 'restore'])->name('users.trash-restore');
    Route::delete('/users/trash/remove/{user}', [UserController::class, 'remove'])->name('users.trash-remove');
    Route::post('/users/trash/restoreAll', [UserController::class, 'restoreAll'])->name('users.trash-restore-all');
    Route::delete('/users/trash/empty', [UserController::class, 'empty'])->name('users.trash-empty');

    // User management Routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{users}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__ . '/auth.php';
