<?php

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

    Route::get('/quizzes', function () {
        return view('quizzes.quiz');
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
    Route::get('/courses', function () {
        $courses = [
            ["id" => 1, "title" => "Certificate III in IT (Web Development)", "description" => "Introduction to web development with HTML, CSS, and JavaScript.", "quizzes" => 3],
            ["id" => 2, "title" => "Certificate IV in IT (Programming)", "description" => "Advanced programming concepts with Python and Java.", "quizzes" => 5],
            ["id" => 3, "title" => "Diploma of IT (Advanced Programming)", "description" => "Advanced software development skills with focus on backend frameworks.", "quizzes" => 7],
        ];

        return view('courses.index', compact(['courses']));
    })->name('courses');

    Route::get('/courses/edit', function () {
        $course = [
            "id" => 1,
            "title" => "Certificate IV in IT (Programming)",
            "description" => "Advanced programming concepts with Python and Java."
        ];

        return view('courses.edit', compact(['course']));
    })->name('courses.edit');

    Route::get('/courses/delete', function () {
        $course = [
            "id" => 1,
            "title" => "Certificate IV in IT (Programming)",
            "description" => "Advanced programming concepts with Python and Java."
        ];

        return view('courses.delete', compact(['course']));
    })->name('courses.delete');

    Route::get('/courses/trash', function () {
        $courses = [
            ["id" => 1, "title" => "Certificate III in IT (Web Development)", "description" => "Introduction to web development with HTML, CSS, and JavaScript.", "quizzes" => 3],
            ["id" => 2, "title" => "Certificate IV in IT (Programming)", "description" => "Advanced programming concepts with Python and Java.", "quizzes" => 5],
            ["id" => 3, "title" => "Diploma of IT (Advanced Programming)", "description" => "Advanced software development skills with focus on backend frameworks.", "quizzes" => 7],
        ];

        return view('courses.trash', compact(['courses']));
    });
});

// Users
Route::middleware('auth')->group(function () {

    Route::get('/users/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::post('/users/trash/restore/{user}', [UserController::class, 'restore'])->name('users.trash-restore');
    Route::delete('/users/trash/remove/{user}', [UserController::class, 'remove'])->name('users.trash-remove');
    Route::post('/users/trash/restoreAll', [UserController::class, 'restoreAll'])->name('users.trash-restore-all');
    Route::delete('/users/trash/empty', [UserController::class, 'empty'])->name('users.trash-empty');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{users}', [UserController::class, 'show'])->name('users.show'); // Show user details
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Edit user form
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // Update user
    Route::delete('/users/{user}/delete', [UserController::class, 'delete'])->name('users.delete'); // Show delete confirmation
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete user




});

require __DIR__ . '/auth.php';
