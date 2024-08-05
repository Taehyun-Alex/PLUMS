<?php

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
        return view('quiz'); // Assuming 'quizzes.blade.php' is your quizzes view
    })->name('quizzes');

    Route::get('/quizzeslist', function () {
        return view('quizzeslist'); // Assuming 'quizzes.blade.php' is your quizzes view
    })->name('quizzeslist');

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

    Route::get('/results', function () {
        return view('results'); // Assuming 'results.blade.php' is your results view
    })->name('results');

    Route::get('/users', function () {
        return view('users'); // Assuming 'users.blade.php' is your users view
    })->name('users');

    Route::get('/settings', function () {
        return view('settings'); // Assuming 'settings.blade.php' is your settings view
    })->name('settings');
});

require __DIR__ . '/auth.php';
