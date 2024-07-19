<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::get('/course/edit', function () {
    $course = [
        "id"=>1,
        "title"=>"Certificate IV in IT (Programming)",
        "description"=>"Advanced programming concepts with Python and Java."
    ];

    return view('courses.edit', compact(['course']));
})->name('course.edit');

Route::get('/course/delete', function () {
    $course = [
        "id"=>1,
        "title"=>"Certificate IV in IT (Programming)",
        "description"=>"Advanced programming concepts with Python and Java."
    ];

    return view('courses.delete', compact(['course']));
})->name('course.delete');
