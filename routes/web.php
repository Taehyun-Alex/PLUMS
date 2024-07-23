<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::get('/courses', function () {
    $courses = [
        ["id"=>1,"title"=>"Certificate III in IT (Web Development)", "description"=>"Introduction to web development with HTML, CSS, and JavaScript.", "quizzes"=>3],
        ["id"=>2,"title"=>"Certificate IV in IT (Programming)", "description"=>"Advanced programming concepts with Python and Java.", "quizzes"=>5],
        ["id"=>3,"title"=>"Diploma of IT (Advanced Programming)", "description"=>"Advanced software development skills with focus on backend frameworks.", "quizzes"=>7],
    ];

    return view('courses.index', compact(['courses']));
})->name('courses');

Route::get('/courses/edit', function () {
    $course = [
        "id"=>1,
        "title"=>"Certificate IV in IT (Programming)",
        "description"=>"Advanced programming concepts with Python and Java."
    ];

    return view('courses.edit', compact(['course']));
})->name('courses.edit');

Route::get('/courses/delete', function () {
    $course = [
        "id"=>1,
        "title"=>"Certificate IV in IT (Programming)",
        "description"=>"Advanced programming concepts with Python and Java."
    ];

    return view('courses.delete', compact(['course']));
})->name('courses.delete');

Route::get('/courses/trash', function () {
    $courses = [
        ["id"=>1,"title"=>"Certificate III in IT (Web Development)", "description"=>"Introduction to web development with HTML, CSS, and JavaScript.", "quizzes"=>3],
        ["id"=>2,"title"=>"Certificate IV in IT (Programming)", "description"=>"Advanced programming concepts with Python and Java.", "quizzes"=>5],
        ["id"=>3,"title"=>"Diploma of IT (Advanced Programming)", "description"=>"Advanced software development skills with focus on backend frameworks.", "quizzes"=>7],
    ];

    return view('courses.trash', compact(['courses']));
});
