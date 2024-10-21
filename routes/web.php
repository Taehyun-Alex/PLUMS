<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/results', function () {
        return view('results.index');
    })->name('results');

    Route::get('/settings', function () {
        return view('settings.settings');
    })->name('settings');

    Route::get('/quizzes/trash', [QuizController::class, 'trash'])->name('quizzes.trash');
    Route::patch('/quizzes/restore/{quiz}', [QuizController::class, 'restore'])->name('quizzes.trash-restore');
    Route::delete('/quizzes/remove/{quiz}', [QuizController::class, 'remove'])->name('quizzes.trash-remove');
    Route::post('/quizzes/restoreAll', [QuizController::class, 'restoreAll'])->name('quizzes.trash-restore-all');
    Route::delete('/quizzes/empty', [QuizController::class, 'empty'])->name('quizzes.trash-empty');

    Route::get('/quizzes/', [QuizController::class, 'index'])->name('quizzes.index');
    Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
    Route::post('/quizzes/create', [QuizController::class, 'store'])->name('quizzes.store');
    Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
    Route::get('/quizzes/{quiz}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
    Route::put('/quizzes/{quiz}', [QuizController::class, 'update'])->name('quizzes.update');
    Route::delete('/quizzes/{quiz}/delete', [QuizController::class, 'delete'])->name('quizzes.delete');
    Route::delete('/quizzes/{quiz}', [QuizController::class, 'destroy'])->name('quizzes.destroy');

    Route::get('/courses/trash', [CourseController::class, 'trash'])->name('courses.trash');
    Route::patch('/courses/{course}/restore', [CourseController::class, 'restore'])->name('courses.restore');
    Route::delete('/courses/{course}/forceDelete', [CourseController::class, 'forceDelete'])->name('courses.forceDelete');
    Route::post('/courses/restoreAll', [CourseController::class, 'restoreAll'])->name('courses.trash-restore-all');
    Route::delete('/courses/empty', [CourseController::class, 'empty'])->name('courses.trash-empty');

    Route::get('/courses/', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/create', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::get('/courses/{course}/delete', [CourseController::class, 'delete'])->name('courses.delete');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

    Route::get('/questions/index', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions/create', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{question}/delete', [QuestionController::class, 'delete'])->name('questions.delete');
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

    Route::get('/questions/trash', [QuestionController::class, 'trash'])->name('questions.trash');
    Route::post('/questions/restore/{user}', [QuestionController::class, 'restore'])->name('questions.trash-restore');
    Route::delete('/questions/remove/{user}', [QuestionController::class, 'remove'])->name('questions.trash-remove');
    Route::post('/questions/restoreAll', [QuestionController::class, 'restoreAll'])->name('questions.trash-restore-all');
    Route::delete('/questions/empty', [QuestionController::class, 'empty'])->name('questions.trash-empty');

    Route::post('/answers', [AnswerController::class, 'store'])->name('answers.store');
    Route::get('/answers/{answer}/edit', [AnswerController::class, 'edit'])->name('answers.edit');
    Route::put('/answers/{answer}', [AnswerController::class, 'update'])->name('answers.update');

    Route::get('/users/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::post('/users/restore/{user}', [UserController::class, 'restore'])->name('users.trash-restore');
    Route::delete('/users/remove/{user}', [UserController::class, 'remove'])->name('users.trash-remove');
    Route::post('/users/restoreAll', [UserController::class, 'restoreAll'])->name('users.trash-restore-all');
    Route::delete('/users/empty', [UserController::class, 'empty'])->name('users.trash-empty');

    Route::get('/users/', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Include authentication routes
require __DIR__ . '/auth.php';
